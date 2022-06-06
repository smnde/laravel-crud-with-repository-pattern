<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use App\Interfaces\PurchasingInterface;
use App\Models\Product;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use Illuminate\Http\Request;
use Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchasingsController extends Controller
{
	protected $purchasingRepository, $productRepository;

	public function __construct(PurchasingInterface $purchasingInterface, ProductInterface $productInterface)
	{
		$this->purchasingRepository = $purchasingInterface;
		$this->productRepository = $productInterface;
	}

    public function index()
	{
		$products = $this->productRepository->getAll();
		$items = $this->purchasingRepository->showCart();
		return view('pages.purchasings.index', compact('products', 'items'));
	}

	public function addToCart($productId)
	{
		$item = $this->productRepository->getById($productId);
		$this->purchasingRepository->addItem($item);
		return redirect()->back();
	}

	public function removeFromCart($rowId)
	{
		$this->purchasingRepository->removeItem($rowId);
		return redirect()->back();
	}

	public function clearCart()
	{
		$this->purchasingRepository->clearCart();
		return redirect()->back();
	}

	public function increaseQty($rowId)
	{
		$item = $this->purchasingRepository->getItem($rowId);
		$this->purchasingRepository->increase($item);
		return redirect()->back();
	}

	public function decreaseQty($rowId)
	{
		$item = $this->purchasingRepository->getItem($rowId);
		$this->purchasingRepository->decrease($item);
		return redirect()->back();
	}

	public function saveTransaction()
	{
		$cart = $this->purchasingRepository->showCart();
		$this->purchasingRepository->create($cart);
		return redirect()->back();
	}
}
