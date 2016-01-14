<?php $count = Auth::user()->newMessagesCount(); ?>
@if($count > 0)
<span class="count">{!! $count !!}</span>
@endif
