@extends('layouts.app')
@section('content')
	
	<h3 class="text-2xl mb-2">Pembelian</h3>

	<button onclick="toggleModal()" class="block mb-4 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="modal">
		Cari produk
	</button>

	@component('components.table')
		@slot('tableId')
			cart
		@endslot
		@slot('thead')
			<th scope="col" class="px-6 py-4">Name</th>
			<th scope="col" class="px-6 py-4">Qty</th>
			<th scope="col" class="px-6 py-4">Harga satuan</th>
			<th scope="col" class="px-6 py-4">
				<span class="sr-only">Edit</span>
			</th>
			<th scope="col" class="px-6 py-4 text-right">
				<form action="{{ route('purchasings.saveTransaction') }}" method="POST">
					@csrf
					<button id="btnTrigger" class="text-white bg-red-500 peer hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Simpan transaksi</button>
				</form>
			</th>
		@endslot
	
		@slot('tbody')
			@forelse ($items as $item)
				<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
					<td class="w-4 p-4">
						<div class="flex items-center">
							<input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
							<label for="checkbox-table-1" class="sr-only">checkbox</label>
						</div>
					</td>
					<td	td class="px-6 py-2">{{ $item->name }}</td>
					<td	td class="px-6 py-2">
						<input type="text" name="qty" class="py-1 px-1 w-10 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600" value="{{ $item->qty }}">
					</td>
					<td	td class="px-6 py-2">Rp. {{ $item->price }}</td>
					<td colspan="2" class="py-2 px-6 text-right">
						<form action="{{ route('purchasings.removeFromCart', $item->rowId)}}" method="POST">
							@csrf
							<button type="submit" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Batal</button>
						</form>
					</td>
				</tr>
			@empty
				<tr></tr>
			@endforelse	
		@endslot
	@endcomponent

	@component('components.modal')
	
		@slot('modalId')
			modal
		@endslot
		@slot('size')
			
		@endslot
		@slot('modalTitle')
			List produk
		@endslot
		@slot('closeModal')
			toggleModal()
		@endslot

			<table class="w-full table-auto overflow-y-auto text-sm text-left text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-sky-500 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
					<tr>
						<th scope="col" class="px-6 py-4">Kode</th>
						<th scope="col" class="px-6 py-4">Nama</th>
						<th scope="col" class="px-6 py-4">Stok</th>
						<th scope="col" class="px-6 py-4">Harga beli</th>
						<th scope="col" class="px-6 py-4">Harga jual</th>
						<th scope="col" class="px-6 py-4">
							<span class="sr-only">Edit</span>
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
						<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
							<th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $product->code }}</th>
							<td	td class="px-6 py-2">{{ $product->name }}</td>
							<td	td class="px-6 py-2">{{ $product->stock }}</td>
							<td	td class="px-6 py-2">{{ $product->purchase_price }}</td>
							<td	td class="px-6 py-2">{{ $product->sales_price }}</td>
							<td class="py-2 text-right">
								<form action="{{ route('purchasings.addToCart', $product->id)}}" method="POST">
									@csrf
									<button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Tambah</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

	@endcomponent

@endsection


@push('script')
	<script>

		const modal = document.getElementById("modal");

		const toggleModal = () => {
			modal.classList.toggle("opacity-0");
			modal.classList.toggle("pointer-events-none");
		}
		
	</script>
@endpush
