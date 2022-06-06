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
		{{-- sidebar --}}
		@include('../components.sidebar')
		<div class="flex-1 flex flex-col overflow-hidden">
			{{-- navbar --}}
			@include('../components/navbar')
			<div className="flex-1 overflow-x-hidden overflow-y-auto">
				<main class="px-6 py-5">
					@yield('content')
				</main>
			</div>
		</div>
	</main>

	{{-- <script src="../path/to/flowbite/dist/flowbite.js"></script><script src="../path/to/flowbite/dist/flowbite.js"></script> --}}
	<script src="{{ asset("js/app.js") }}"></script>
	@stack('script')
</body>
</html>