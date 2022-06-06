<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	protected $userRepository;

	public function __construct(UserInterface $userInterface)
	{
		$this->userRepository = $userInterface;
	}

    public function index()
	{
		$users = $this->userRepository->getAll();
		return view('pages.users.index', compact('users'));
	}

	public function store(StoreUserRequest $request)
	{
		$this->userRepository->create($request->all());
		return redirect()->back();
	}

	public function edit($id)
	{
		$user = $this->userRepository->getById($id);
		return view('pages.users.edit', compact('user'));
	}

	public function update(UpdateUserRequest $request, $id)
	{
		$this->userRepository->update($request->all(), $id);
		return redirect()->route('users.index');
	}

	public function destroy($id)
	{
		$this->userRepository->delete($id);
		return redirect()->back();
	}
}
