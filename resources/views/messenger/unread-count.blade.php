<?php $count = \Illuminate\Support\Facades\Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="label label-danger">{{ $count }}</span>
@endif