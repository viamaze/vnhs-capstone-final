<div>
    @php
        $scheduleItems = $getRecord()->scheduleItems->pluck('day')
    @endphp
    <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">Day</span>
    @foreach($scheduleItems as $item)
        <p class="leading-none">
        @foreach($item as $subitem)
            <small>{{ $subitem }}</small>
        @endforeach
        </p>
    @endforeach
</div>
