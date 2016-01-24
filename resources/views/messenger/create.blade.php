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

               <h1>Create a new message</h1>
               {!! Form::open(['route' => 'messages.store']) !!}
               <div class="col-md-6">
                   <!-- Subject Form Input -->
                   <div class="form-group">
                       {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
                       {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                   </div>

                   <!-- Message Form Input -->
                   <div class="form-group">
                       {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                       {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                   </div>

                   @if($users->count() > 0)
                   <div class="checkbox">
                       @foreach($users as $user)
                           <label title="{!!$user->name!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->name!!}</label>
                       @endforeach
                   </div>
                   @endif
                   
                   <!-- Submit Form Input -->
                   <div class="form-group">
                       {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                   </div>
               </div>
               {!! Form::close() !!}



        @stop
        <!-- END COLUMN RIGHT -->
</body>

</html>