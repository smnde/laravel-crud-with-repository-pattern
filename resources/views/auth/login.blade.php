<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="/css/app.css" rel="stylesheet">
	<title>Laravel App</title>
</head>
<body class="bg-slate-100">
	
	<main class="flex h-screen">
		<div class="flex-1 flex flex-col overflow-hidden">
			{{-- navbar --}}
			@include('../components/navbar')
			<div className="flex-1 overflow-x-hidden overflow-y-auto">
				<div class="px-6 py-14 flex justify-center items-center">
					<div class="">
						@if (session('status'))
							<div class="p-3 mb-4 text-sm text-white shadow-lg bg-red-500 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
								<span class="font-medium"> {{ session('status') }} </span>
							</div>
						@endif
						<div class="bg-sky-500 p-4 rounded-t-lg text-white text-2xl text-center overflow-hidden">
							Login
						</div>
						<div class="py-8 px-10 bg-white shadow-lg rounded-b-lg h-auto overflow-hidden">
							<form action="{{ route('login') }}" method="POST">
								@csrf
								<div class="relative z-0 w-full mb-10 group">
									<input type="text" name="username" id="username" class="@error('username') peer-focus:border-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
									<label for="username" class="@error('username') peer-focus:border-red-600 @enderror peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
								</div>
								<div class="relative z-0 w-full mb-10 group">
									<input type="password" name="password" id="password" class="@error('password') peer-focus:border-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
									<label for="password" class="@error('password') peer-focus:border-red-600 @enderror peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
								</div>
								<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	{{-- <script src="../path/to/flowbite/dist/flowbite.js"></script><script src="../path/to/flowbite/dist/flowbite.js"></script> --}}
	<script src="{{ asset("js/app.js") }}"></script>
	<script src="{{ asset("js/script.js") }}"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	@stack('script')
</body>
</html>