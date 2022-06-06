{{-- Modal --}}
<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true" class="opacity-0 pointer-events-none flex transition-opacity duration-200 delay-75 ease-in-out overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
	{{-- Change width and heigt modal here --}}
	<div class="relative p-4 {{ $size }} md:h-auto">
		{{-- Change bg modal, etc. here --}}
		<div class="relative bg-white rounded-lg shadow-xl dark:bg-gray-700">
			{{-- Modal header --}}
			<div class="flex justify-between bg-sky-400 items-start p-4 rounded-t border-b dark:border-gray-600">
				<h3 id="modalTitle" class="text-xl font-semibold text-white dark:text-white">{{ $modalTitle }}</h3>
				<button tabindex="-1" onclick="{{ $closeModal }}" id="btnClose" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
					</svg>
				</button>
			</div>
			{{-- Modal header end --}}
			
			{{-- Modal body --}}
			<div class="p-6 space-y-6">
				{{-- This is card content, you can remove it --}}
				{{-- <div id="card" class="p-4 max-w-xl bg-white rounded-lg border shadow-lg sm:p-6 dark:bg-gray-800 dark:border-gray-700"> --}}
					{{-- Content here --}}
					{{ $slot }}
				{{-- </div> --}}
				{{-- Card end --}}
			</div>
			{{-- Modal body end --}}
		</div>
	</div>
</div>