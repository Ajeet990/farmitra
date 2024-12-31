<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl tw-text-center">{{ session('success') }}</span>
    @endif
    <h1>Employee List</h1>
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
              placeholder="Search by user name, aadhar, or pan"
              class="border rounded px-4 py-2 w-full"/>
          </div>
          <a href="{{ route("add.employee") }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md tw-whitespace-nowrape">Add +</a>
       </div>
    </div>
    <div class="tw-overflow-x-auto wt-mt-2">
        <table class="tw-min-w-full tw-divide-y tw-divide-gray-200">
          <thead class="tw-bg-gray-50">
            <tr>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">ID</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">User Name</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">profile_photo</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">aadhar_number</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">aadhaar_front_upload</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">aadhaar_back_upload</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">pan_number</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">pan_upload</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">address</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">alternate_number</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">city</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">state</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">country</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">pincode</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">blood_group</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">emergency_contact_number</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">emergency_contact_name</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">emergency_contact_relation</th>
              <th class="tw-px-6 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody class="tw-bg-white tw-divide-y tw-divide-gray-200">
            @foreach ($employee as $item)
            <tr>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $loop->index+1 }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->users->name }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->profile_photo)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->aadhar_number }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->aadhaar_front_upload)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->aadhaar_back_upload)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->pan_number }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap"><img src="{{ URL::to('storage/'.$item->pan_upload)}}" class="tw-h-10"></td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->address }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->alternate_number }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->city }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->state }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->country }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->pincode }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->blood_group }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->emergency_contact_number }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->emergency_contact_name }}</td>
                <td class="tw-px-6 tw-py-4 tw-whitespace-nowrap">{{ $item->emergency_contact_relation }}</td>
                <td>
                    <a href="{{ route('edit.employee',$item->id )}}" class="tw-bg-green-100 tw-text-blue-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">edit</a>
                    <button wire:click.prevent="delete('{{ $item->id }}')" class="tw-bg-green-100 tw-text-red-800 tw-text-xs tw-font-semibold tw-px-2 tw-rounded-full tw-uppercase ">delete</button>
                </td>
              
            </tr>
            @endforeach
           
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>

      <div>
        {{ $employee->links() }}
      </div>
   
    
</div>

