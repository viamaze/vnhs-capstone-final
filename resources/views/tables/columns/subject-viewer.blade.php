<div>
    @php
        $scheduleItems = $getRecord()->scheduleItems->pluck('day')
    @endphp
    
    @foreach($scheduleItems as $item)
        <p>
        @foreach($item as $subitem)
            <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">{{ $subitem }}</span>
        @endforeach
        </p>
    @endforeach
</div>
