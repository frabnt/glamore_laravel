@extends('layouts.default')

@section('content')


        
        <!-- COLUMN RIGHT -->
        
            <div class="container-fluid primary-content">
                <!-- PRIMARY CONTENT HEADING -->
                <div class="primary-content-heading clearfix">
                    <h2>THREADS</h2>
                    <ul class="breadcrumb pull-left">
                        <li><i class="icon ion-home"></i><a href="{{URL::to('home')}}">Home</a></li>
                        <li class="active">Messages</li> 
                    </ul>
                    <div class="sticky-content pull-right">
                        <a class="btn btn-default btn-sm btn-quick-task" href="{{ URL::to('messages/create') }}"><i class="icon ion-edit"></i>Create Message</a>
                        
                    </div>

                    <!-- end quick task modal -->
                </div>
                <!-- END PRIMARY CONTENT HEADING -->

                @if (Session::has('error_message'))
                    <div class="alert alert-danger" role="alert">
                        {!! Session::get('error_message') !!}
                    </div>
                @endif
                @if($threads->count() > 0)
                    @foreach($threads as $thread)
                    <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                    <div class="media alert {!!$class!!}">
                        <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                        <p>{!! $thread->latestMessage->body !!}</p>
                        <p><small><strong>Creator:</strong> {!! $thread->creator()->name !!}</small></p>
                        <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p>
                    </div>
                    @endforeach
                @else
                    <p>Sorry, no threads.</p>
                @endif



        @stop
        <!-- END COLUMN RIGHT -->
</body>

</html>









    
