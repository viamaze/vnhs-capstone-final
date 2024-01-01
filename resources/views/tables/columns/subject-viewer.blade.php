<div>
    {{ $scheduleItems = $getRecord()->scheduleItems->pluck('day','subject_id')->flatten() }}
</div>
