<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl tw-text-center">{{ session('success') }}</span>
    @endif
    <h1>App And Web Feature List</h1>
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
       
      <div>
       <select wire:model.live="perPage" class="tw-border tw-rounded tw-py-2">
         <option value="10">10 per page</option>
         <option value="20">20 per page</option>
         <option value="50">50 per page</option>
         <option value="100">100 per page</option>
     </select>
      </div>
      <div class="tw-flex tw-justify-content-end tw-items-center">
         <div class="">
           <input type="text" wire:model.live="search"
             placeholder="Search by name"
             class="border rounded px-4 py-2 w-full"/>
         </div>
         <a href="{{ route("add.app.web.feature") }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md tw-whitespace-nowrape">Add +</a>
      </div>
   </div>

    <div class="overflow-x-auto wt-mt-2">
        <table class="tw-min-w-full tw-divide-y tw-divide-gray-200">
          <thead class="tw-bg-gray-50">
            <tr>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">ID</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Name</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Description</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Icon</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">is_active</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">available_non_premium</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody class="tw-bg-white tw-divide-y tw-divide-gray-200">
            @foreach ($appWebFeature as $item)
            <tr>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $loop->index+1 }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->name }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->description }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->icon)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->is_active }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->available_non_premium }}</td>
                <td>
                    <a href="{{ route('edit.app.web.feature',$item->id )}}" class="tw-bg-green-100 tw-text-blue-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">edit</a>
                    <button wire:click.prevent="delete('{{ $item->id }}')" class="tw-bg-green-100 tw-text-red-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">delete</button>
                </td>
              
            </tr>
            @endforeach
           
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
      <div>
        {{ $appWebFeature->links() }}
      </div>
    
</div>
