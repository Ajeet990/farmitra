<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl ">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Edit Employee Attendence</h1>
        <a href="{{ route('list.category') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
    </div>
    {{-- grid --}}
    <form>
    <div class="tw-grid tw-grid-cols-3  tw-gap-5 tw-bg-white tw-p-4">
       
        <div class="  ">
            <p>User Name</p>
            <select type="text" placeholder="" wire:model="user_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($userAll as $item)    
                <option value="{{$item->id}}">{{ $item->name }}</option>
              @endforeach
            </select>
          @error('user_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
            <p>Employee</p>
            <select type="text" placeholder="" wire:model="employee_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($userAll as $item)    
                <option value="{{$item->id}}">{{ $item->name }}</option>
              @endforeach
            </select>
          @error('employee_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
            <p>Employee Attendence Days</p>
            <select type="text" placeholder="" wire:model="attendance_days_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($calender_month_infos as $item)    
                <option value="{{$item->id}}">{{ $item->day }}</option>
              @endforeach
            </select>
          @error('attendance_days_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
           <p>clock_in</p>
           <input type="text" wire:model="clock_in" placeholder="clock_in" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('clock_in')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>clock_out</p>
           <input type="text" wire:model="clock_out" placeholder="clock_out" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('clock_out')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>total_work_hours</p>
           <input type="text" wire:model="total_work_hours" placeholder="total_work_hours" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('total_work_hours')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
       
        <div class="  ">
            <p>Is Active</p>
            <select type="text" placeholder="" wire:model="status" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                <option value="1">present</option>
                <option value="2">absent</option>
                <option value="3">half</option>
                <option value="4">leave</option>
            </select>
            @error('status')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
            <p>is_paid_leave</p>
            <input type="text" wire:model="is_paid_leave" placeholder="is_paid_leave" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('total_work_hours')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        
    </div>
    <div class="tw-my-2">
        <button wire:click.prevent="update" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>

    </div>
</form>
   
</div>
