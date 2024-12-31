<x-app-layout>
    <div class=" grid grid-cols-4 gap-3">
        <x-mary-stat
    title="Users"
    description="All Users"
    value="0"
    icon="o-users"
    tooltip-bottom="There" />
 
<x-mary-stat
    title="Experts"
    description="This month"
    value="0"
    icon="o-hand-raised"
    tooltip-left="Ops!" />
 
<x-mary-stat
    title="Sales"
    description="This month"
    value="22.124"
    icon="o-arrow-trending-down"
    class="text-orange-500"
    color="text-pink-500"
    tooltip-right="Gosh!" />
    
    <x-mary-stat
    title="Lost"
    description="This month"
    value="34"
    icon="o-arrow-trending-down"
    tooltip-left="Ops!" />
    </div>
</x-app-layout>
