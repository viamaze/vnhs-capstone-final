<div>
    @php
        $scheduleItems = $getRecord()->scheduleItems->pluck('day')
    @endphp
    
    @foreach($scheduleItems as $item)
        <p class="leading-none">
        @foreach($item as $subitem)
            <small>{{ $subitem }}</small>
        @endforeach
        </p>
    @endforeach
</div>
