<?php

namespace App\Repositories;

use App\Interfaces\PurchasingInterface;
use App\Models\Product;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use Exception;
use Illuminate\Support\Facades\DB;
use Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class PurchasingRepository implements PurchasingInterface
{
	public function getById($id)
	{
		return Purchasing::findOrFail($id);
	}

	public function getAll()
	{
		return Purchasing::with('details')->orderBy('date', 'DESC')->paginate(10);
	}

	public function showCart()
	{
		return Cart::content();
	}

	public function getItem($rowId)
	{
		return Cart::get($rowId);
	}

	public function addItem($item)
	{
		return Cart::add($item->id, $item->name, 1, $item->purchase_price);
	}

	public function removeItem($item)
	{
		return Cart::remove($item);
	}

	public function increase($item)
	{
		return Cart::update($item->rowId, ["qty" => $item->qty + 1]);
	}

	public function decrease($item)
	{
		return Cart::update($item->rowId, ["qty" => $item->qty - 1]);
	}

	public function clearCart()
	{
		return Cart::destroy();
	}

	public function create($data)
	{
		DB::beginTransaction();
		try {
			$invoice = IdGenerator::generate([
				"table" => "purchasings",
				"length" => 10,
				"prefix" => "INV-",
				"field" => "invoice",
			]);
			
			$items = $data->map(function($item) {
				return [
					"id" => $item->id,
					'name' => $item->name,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'subtotal' => $item->subtotal,
				];
			});

			$purchasings = Purchasing::create([
				"invoice" => $invoice,
				"user_id" => Auth::id(),
				"total_amount" => Cart::count(),
				"grand_total" => Cart::total(),
				"status" => "selesai",
				"date" => date("Y-m-d:H-i"),
			]);

			foreach($items as $key => $item) {
				$details[$key] = [
					"purchasing_id" => $purchasings->id,
					"product_id" => $item["id"],
					"amount" => $item["qty"],
					"price" => $item["price"],
					"total" => $item["subtotal"],
				];

				$product = Product::findOrFail($item["id"])->increment("stock", $item["qty"]);
			}

			PurchasingDetail::insert($details);	

			DB::commit();
			Cart::destroy();

		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Transaksi gagal');
		}
	}
}
