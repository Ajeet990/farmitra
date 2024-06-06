<div >
    <div wire:ignore.self id="hs-overlay-body-scrolling"
        class=" translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s dark:bg-neutral-800 dark:border-neutral-700 "
        tabindex="-1">

        @if ($component)
        @livewire($component,['params' => $params])
        @endif
    </div>



</div>