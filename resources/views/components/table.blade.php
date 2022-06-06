<div class="relative overflow-x-auto sm:rounded-md mb-5 h-[380px] shadow-lg">
	<table id="{{ $tableId }}" class="w-full table-auto overflow-y-auto text-sm text-left text-gray-500 dark:text-gray-400">
		<thead class="text-xs text-white uppercase bg-sky-400 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
			<tr>
				<th scope="col" class="p-4">
					<div class="flex items-center">
						<input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
						<label for="checkbox-all" class="sr-only">checkbox</label>
					</div>
				</th>
				{{ $thead }}
			</tr>
		</thead>
		<tbody>
			{{ $tbody }}
		</tbody>
	</table>
</div>