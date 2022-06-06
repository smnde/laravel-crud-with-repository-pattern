<?php

namespace App\Interfaces;

interface CategoryInterface
{
	public function getById($id);
	public function getAll();
	public function create($data);
	public function update($data, $id);
	public function delete($id);
}