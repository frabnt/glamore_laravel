


   




@extends('layouts.default')

@section('content')


        
        <!-- COLUMN RIGHT -->
        
            <div class="container-fluid primary-content">
                <!-- PRIMARY CONTENT HEADING -->
                <div class="primary-content-heading clearfix">
                    <h2>Messages</h2>
                    <ul class="breadcrumb pull-left">
                        <li><i class="icon ion-home"></i><a href="#">Home</a></li>
                        <li class="active">Messages</li>
                    </ul>
                    <div class="sticky-content pull-right">
                        <a class="btn btn-default btn-sm btn-quick-task" href="{{ URL::to('messages/create') }}"><i class="icon ion-edit"></i>Create Message</a>
                        
                    </div>

                    <!-- end quick task modal -->
                </div>
                <!-- END PRIMARY CONTENT HEADING -->

               <div class="col-md-6">
                   <h1>{!! $thread->subject !!}</h1>

                   @foreach($thread->messages as $message)
                       <div class="media">
                           <a class="pull-left" href="#">
                               <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->name !!}" class="img-circle">
                           </a>
                           <div class="media-body">
                               <h5 class="media-heading">{!! $message->user->name !!}</h5>
                               <p>{!! $message->body !!}</p>
                               <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                           </div>
                       </div>
                   @endforeach

                   <h2>Add a new message</h2>
                   {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                   <!-- Message Form Input -->
                   <div class="form-group">
                       {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                   </div>

                   @if($users->count() > 0)
                   <div class="checkbox">
                       @foreach($users as $user)
                           <label title="{!! $user->name !!}"><input type="checkbox" name="recipients[]" value="{!! $user->id !!}">{!! $user->name !!}</label>
                       @endforeach
                   </div>
                   @endif

                   <!-- Submit Form Input -->
                   <div class="form-group">
                       {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                   </div>
                   {!! Form::close() !!}
               </div>


        @stop
        <!-- END COLUMN RIGHT -->
</body>

</html>