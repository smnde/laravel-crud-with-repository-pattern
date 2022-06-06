@extends('layouts.app')
@section('content')
	
	<h3 class="text-2xl mb-4">Edit Kategori</h3>
	
	<div class="overflow-hidden p-2 px-5 bg-sky-400 rounded-t-lg text-white text-2xl max-w-xs">
		Edit category
	</div>

	<div id="card" class="overflow-hidden max-w-xs p-4 bg-white rounded-b-lg border shadow-lg sm:p-6 dark:bg-gray-800 dark:border-gray-700">
		<form action="{{ route('categories.update', $category->id) }}" id="formcategory" method="POST">
			@csrf
			@method('PUT')
			<div class="relative z-0 w-full mb-6 group">
				<input type="text" id="name" name="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="" value="{{ old('name', $category->name) }}">
				<label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
			</div>
			<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
		</form>
	</div>

@endsection