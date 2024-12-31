<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl tw-text-center">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
       <h1>Vendor Documents List</h1>
       <a href="{{ route('add.vendor.documents') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md">Add +</a>
    </div>
    <div class="overflow-x-auto wt-mt-2">
        <table class="tw-min-w-full tw-divide-y tw-divide-gray-200">
          <thead class="tw-bg-gray-50">
            <tr>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">ID</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">User</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">LegalDocuments</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Document Number</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Document</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">is_resubmit</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">status</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">remark</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody class="tw-bg-white tw-divide-y tw-divide-gray-200">
            @foreach ($vendorDocuments as $item)
            <tr>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $loop->index+1 }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->users->name }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->legalDocuments->name }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->document_number }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->document)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->is_resubmit }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->status }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->remark }}</td>
                <td>
                    <a href="{{ route('edit.vendor.documents',$item->id )}}" class="tw-bg-green-100 tw-text-blue-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">edit</a>
                    <button wire:click.prevent="delete('{{ $item->id }}')" class="tw-bg-green-100 tw-text-red-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">delete</button>
                </td>
              
            </tr>
            @endforeach
           
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
   
    
</div>
