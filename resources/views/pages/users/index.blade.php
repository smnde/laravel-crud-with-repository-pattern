@extends('layouts.app')

@section('content')
	
	<h3 class="text-2xl mb-4">User</h3>

	<div class="flex justify-between gap-6">
		<div>
			<div class="overflow-hidden p-2 px-5 bg-sky-400 rounded-t-lg text-white text-2xl max-w-xs">
				Tambah user
			</div>
			<div id="card" class="overflow-hidden p-4 max-w-xs bg-white rounded-b-lg border shadow-lg sm:p-6 dark:bg-gray-800 dark:border-gray-700 w-64 h-[320px]">
				<form action="{{ route('users.store') }}" id="formUser" method="POST">
					@csrf
					<div class="relative z-0 w-full mb-6 group">
						<input type="text" id="name" name="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
						<label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
						<label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
					</div>
					<div class="relative z-0 w-full mb-10 group">
						<input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
						<label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
					</div>
					<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
				</form>
			</div>
		</div>

		<div class="w-full">
			@component('components.table')
				@slot('tableId')
					tableUser
				@endslot
	
				@slot('thead')
					<th scope="col" class="px-6 py-4">Nama</th>
					<th scope="col" class="px-6 py-4">Username</th>
					<th scope="col" class="px-6 py-4">Role</th>
					<th scope="col" class="px-6 py-4">
						<span class="sr-only">Edit</span>
					</th>
				@endslot
	
				@slot('tbody')
					@foreach ($users as $user)
						<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
							<td class="w-4 p-4">
								<div class="flex items-center">
								<input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
								<label for="checkbox-table-1" class="sr-only">checkbox</label>
							</div>
							</td>
							<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $user->name }}</th>
							<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $user->username }}</th>
							<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $user->is_admin == true ? "Admin" : "Kasir" }}</th>
							<td class="px-6 py-2 text-right flex gap-2 justify-end items-center">
								<form action="{{ route('users.destroy', $user->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<a href="{{ route('users.edit', $user->id) }}" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Edit</a>
									<button type="submit" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				@endslot
			@endcomponent
		</div>
	
	</div>

@endsection