<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
	public function getById($id)
	{
		return Category::findOrFail($id);
	}

	public function getAll()
	{
		return Category::orderBy('name', 'ASC')->paginate(10);
	}

	public function create($data)
	{
		return Category::create(["name" => $data["name"]]);
	}

	public function update($data, $id)
	{
		return Category::where('id', $id)->update(["name" => $data["name"]]);
	}

	public function delete($id)
	{
		return Category::destroy($id);
	}
}