<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl tw-text-center">{{ session('success') }}</span>
    @endif
    <h1>Vendor Information List</h1>
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
             placeholder="Search by user store name"
             class="border rounded px-4 py-2 w-full"/>
         </div>
         <a href="{{ route("add.vendor.information") }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md tw-whitespace-nowrape">Add +</a>
      </div>
   </div>

    <div class="overflow-x-auto wt-mt-2">
        <table class="tw-min-w-full tw-divide-y tw-divide-gray-200">
          <thead class="tw-bg-gray-50">
            <tr>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">ID</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Store Name</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Store Description</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Store Logo</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Store Banner</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Store Inside Photo</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Store Outside Photo</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody class="tw-bg-white tw-divide-y tw-divide-gray-200">
            @foreach ($vendorInformationAll as $item)
            <tr>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $loop->index+1 }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->store_name }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->store_description }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->store_logo)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->store_banner)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->store_inside_photo)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->store_outside_photo)}}" class="tw-h-10"></td>
                <td>
                    <a href="{{ route('edit.vendor.information',$item->id )}}" class="tw-bg-green-100 tw-text-blue-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">edit</a>
                    <button wire:click.prevent="delete('{{ $item->id }}')" class="tw-bg-green-100 tw-text-red-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">delete</button>
                </td>
              
            </tr>
            @endforeach
           
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
   <div>
      {{ $vendorInformationAll->links() }}
   </div>
    
</div>
