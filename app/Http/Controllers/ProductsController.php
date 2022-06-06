<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;

class ProductsController extends Controller
{
	protected $productRepository, $categoryRepository;

	public function __construct(ProductInterface $productInterface, CategoryInterface $categoryInterface)
	{
		$this->productRepository = $productInterface;
		$this->categoryRepository = $categoryInterface;
	}

    public function index()
	{
		$products = $this->productRepository->getAll();
		$categories = $this->categoryRepository->getAll();
		return view('pages.products.index', compact('products', 'categories'));
	}

	public function store(StoreProductRequest $request)
	{
		$this->productRepository->create($request->all());
		return redirect()->back();
	}

	public function edit($id)
	{
		$categories = $this->categoryRepository->getAll();
		$product = $this->productRepository->getById($id);
		return view('pages.products.edit', compact('categories', 'product'));
	}

	public function update(UpdateProductRequest $request, $id)
	{
		$this->productRepository->update($request->all(), $id);
		return redirect()->route('products.index');
	}

	public function destroy($id)
	{
		$this->productRepository->delete($id);
		return redirect()->back();
	}
}
