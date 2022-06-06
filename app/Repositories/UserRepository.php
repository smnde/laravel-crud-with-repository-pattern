<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
	public function getById($id)
	{
		return User::findOrFail($id);
	}

	public function getAll()
	{
		return User::orderBy('name', 'ASC')->get();
	}

	public function create($data)
	{
		return User::create([
			"name" => $data["name"],
			"username" => $data["username"],
			"password" => Hash::make($data["password"]),
			"is_admin" => false,
		]);
	}
	
	public function update($data, $id)
	{
		return User::where('id', $id)->update([
			"name" => $data["name"],
			"username" => $data["username"],
			"is_admin" => $data["is_admin"],
		]);
	}

	public function delete($id)
	{
		return User::destroy($id);
	}
}