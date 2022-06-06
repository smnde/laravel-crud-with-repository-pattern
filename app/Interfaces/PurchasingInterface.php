<?php

namespace App\Interfaces;

interface PurchasingInterface extends CartInterface
{
	public function getById($id);
	public function getAll();
	public function create($data);
}