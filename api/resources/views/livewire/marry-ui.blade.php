<div>
    <x-mary-tabs wire:model="selectedTab">
        <x-mary-tab name="users-tab" label="Users" icon="o-users">
            <div>
                Users <x-mary-loading />
            </div>
        </x-mary-tab>
        <x-mary-tab name="tricks-tab" label="Tricks" icon="o-sparkles">
            <div>Tricks</div>
        </x-mary-tab>
        <x-mary-tab name="musics-tab" label="Musics" icon="o-musical-note">
            <div>Musics</div>
        </x-mary-tab>
    </x-mary-tabs>
    <hr class="my-5">
    <x-mary-button label="Change to Musics" @click="$wire.selectedTab = 'musics-tab'" />
    <x-mary-signature wire:model="signature1" hint="Please, sign it." />
    @php
        $config1 = ['altFormat' => 'm/d/Y'];
        $config2 = ['mode' => 'range'];
    @endphp

    <x-mary-datepicker label="Date" wire:model="myDate1" icon="o-calendar" hint="Hi!" />
    <x-mary-datepicker label="Alt" wire:model="myDate2" icon="o-calendar" :config="$config1" />
    <x-mary-datepicker label="Range" wire:model="myDate3" icon="o-calendar" :config="$config2" inline />

<x-mary-modal wire:model="myModal1" class="backdrop-blur">
    <div class="mb-5">Press `ESC`, click outside or click `CANCEL` to close.</div>
    <x-mary-button label="Cancel" @click="$wire.myModal1 = false" />
</x-mary-modal>
 
<x-mary-button label="Open" @click="$wire.myModal1 = true" />

</div>
