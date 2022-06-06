<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	protected $categoryRepository;

	public function __construct(CategoryInterface $categoryInterface)
	{
		$this->categoryRepository = $categoryInterface;	
	}

    public function index(Request $request)
	{
		$categories = $this->categoryRepository->getAll();
		if($request->ajax()) {
			return $categories;
		}
		return view('pages.categories.index', compact('categories'));
	}

	public function store(CategoryRequest $request)
	{
		$this->categoryRepository->create($request->all());
		return redirect()->back();
	}

	public function edit($id)
	{
		$category = $this->categoryRepository->getById($id);
		return view('pages.categories.edit', compact('category'));
	}

	public function update(CategoryRequest $request, $id)
	{
		$category = $this->categoryRepository->getById($id);
		$this->categoryRepository->update($category, $request->all());
		return redirect()->route('categories.index');
	}

	public function destroy($id)
	{
		$this->categoryRepository->delete($id);
		return redirect()->back();
	}
}