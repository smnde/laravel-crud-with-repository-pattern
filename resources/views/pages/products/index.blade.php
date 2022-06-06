@extends('layouts.app')

@section('content')
	
<h3 class="text-2xl mb-4">Produk</h3>

<div class="flex justify-between gap-6">
	<div>
		<div class="overflow-hidden p-2 px-5 bg-sky-400 rounded-t-lg text-white text-2xl max-w-xs">
			Tambah produk
		</div>
		<div id="card" class="overflow-hidden p-4 max-w-xs bg-white rounded-b-lg border shadow-lg sm:p-6 dark:bg-gray-800 dark:border-gray-700 w-64">
			<form action="{{ route('products.store') }}" id="formProduct" method="POST">
				@csrf
				<div class="relative z-0 w-full mb-6 group">
					<select type="text" id="category_id" name="category_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
						<option value="">Pilih kategori</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					<label for="category_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
				</div>
				<div class="relative z-0 w-full mb-6 group">
					<input type="text" id="name" name="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
					<label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
				</div>
				<div class="relative z-0 w-full mb-6 group">
					<input type="text" id="purchase_price" name="purchase_price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
					<label for="purchase_price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Purchase price</label>
				</div>
				<div class="relative z-0 w-full mb-6 group">
					<input type="text" id="sales_price" name="sales_price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
					<label for="sales_price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sales price</label>
				</div>
				<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
			</form>
		</div>
	</div>

	<div class="w-full">
		@component('components.table')
			@slot('tableId')
				tableProduct
			@endslot

			@slot('thead')
				<th scope="col" class="px-6 py-4">Code</th>
				<th scope="col" class="px-6 py-4">Name</th>
				<th scope="col" class="px-6 py-4">Stok</th>
				<th scope="col" class="px-6 py-4">
					<span class="sr-only">Edit</span>
				</th>
			@endslot

			@slot('tbody')
				@foreach ($products as $product)
					<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
						<td class="w-4 p-4">
							<div class="flex items-center">
							<input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
							<label for="checkbox-table-1" class="sr-only">checkbox</label>
						</div>
						</td>
						<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $product->code }}</th>
						<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $product->name }}</th>
						<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $product->stock }}</th>
						<td class="px-6 py-2 text-right flex gap-2 justify-end items-center">
							<form action="{{ route('products.destroy', $product->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="button" onclick="detail({{ $product }})" class="text-white bg-sky-500 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800">Detail</button>
								<a href="{{ route('products.edit', $product->id) }}" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Edit</a>
								<button type="submit" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			@endslot
		@endcomponent
	</div>
</div>

@component('components.modal')
	
	@slot('modalId')
		modal
	@endslot
	@slot('size')
		max-w-xl
	@endslot
	@slot('modalTitle')
		Detail produk
	@endslot
	@slot('closeModal')
		toggleModal()
	@endslot
		<div class="grid xl:grid-cols-2 xl:gap-6">
			<div class="relative z-0 w-full mb-6 group">
				<input type="hidden" id="productId">
				<input name="productCategory_id" id="productCategory_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
				<label for="productCategory_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
			</div>
			<div class="relative z-0 w-full mb-6 group">
				<input type="text" name="productCode" id="productCode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
				<label for="productCode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code</label>
			</div>
		</div>
		<div class="grid xl:grid-cols-2 xl:gap-6">
			<div class="relative z-0 w-full mb-6 group">
				<input type="text" name="productName" id="productName" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
				<label for="productName" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
			</div>
			<div class="relative z-0 w-full mb-6 group">
				<input type="text" name="productStock" id="productStock" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
				<label for="productStock" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock</label>
			</div>
		</div>
		<div class="grid xl:grid-cols-2 xl:gap-6">
			<div class="relative z-0 w-full mb-6 group">
				<input type="number" name="productPurchase_price" id="productPurchase_price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
				<label for="productPurchase_price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Purchase price</label>
			</div>
			<div class="relative z-0 w-full mb-6 group">
				<input type="number" name="productSales_price" id="productSales_price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
				<label for="productSales_price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sales price</label>
			</div>
		</div>

@endcomponent

@endsection

@push('script')
	<script>

		const getElId = val => {
			return document.getElementById(val);
		}

		const elements = [
			productId = getElId("productId"),
			productCategory_id = getElId("productCategory_id"),
			productCode = getElId("productCode"),
			productName = getElId("productName"),
			productStock = getElId("productStock"),
			productPurchase_price = getElId("productPurchase_price"),
			productSales_price = getElId("productSales_price"),
		]
		
		const modal = getElId("modal");
		const toggleModal = () => {
			modal.classList.toggle('opacity-0');
			modal.classList.toggle('pointer-events-none');
		}

		const detail = product => {
			toggleModal();

			for(i = 0; i < elements.length; i++) {
				elements[i].setAttribute("disabled", true);
			}

			productId.value = product.id;
			productCategory_id.value = product.category.name;
			productCode.value = product.code;
			productName.value = product.name;
			productStock.value = product.stock;
			productPurchase_price.value = product.purchase_price;
			productSales_price.value = product.sales_price;
		}

		const edit = product => {
			
		}

	</script>
@endpush