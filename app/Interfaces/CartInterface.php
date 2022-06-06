<?php

namespace App\Interfaces;

interface CartInterface
{
	public function showCart();
	public function getItem($rowId);
	public function addItem($item);
	public function removeItem($rowId);
	public function increase($item);
	public function decrease($item);
	public function clearCart();
}