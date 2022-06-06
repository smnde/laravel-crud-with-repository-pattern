<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductRepository implements ProductInterface
{
	public function getById($id)
	{
		return Product::findOrFail($id);
	}

	public function getAll()
	{
		return Product::with('category')->orderBy('code', 'ASC')->paginate(10);
	}

	public function create($data)
	{
		$code = IdGenerator::generate([
			"table" => "products",
			"length" => 9,
			"prefix" => "BA-",
			"field" => "code",
		]);

		return Product::create([
			"code" => $code,
			"name" => $data["name"],
			"category_id" => $data["category_id"],
			"stock" => 0,
			"purchase_price" => $data["purchase_price"],
			"sales_price" => $data["sales_price"],
		]);
	}

	public function update($data, $id)
	{
		return Product::where('id', $id)->update([
			"name" => $data["name"],
			"category_id" => $data["category_id"],
			"purchase_price" => $data["purchase_price"],
			"sales_price" => $data["sales_price"],
		]);
	}

	public function delete($id)
	{
		return Product::destroy($id);
	}
}