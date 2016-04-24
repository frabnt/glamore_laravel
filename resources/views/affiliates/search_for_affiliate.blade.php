@extends('layouts.default')



@section('content')

{{--content: url({{ asset('assets/img/camera.svg') }}); --}}
<style type="text/css"> 
.profile-header-background:hover{
    opacity: 0.3; 
}

.avatar:hover{
opacity: 0.1;
}

.hide{
	display: none;
}

.show{
	display: block;
}

.profile-header-background{
height: 310px;
background: url("{{ asset('/assets/upload/img/user')}}/{{ $user->background_image or 'city.jpg' }}");
background-repeat:no-repeat;
background-size: cover;
}

.avatar{
	height: 150px;
	width:150px;
}

#imgprofile.ion-ios-reverse-camera {
  font-size: 90px;
  color: white;
  margin-bottom: -144px;
   
}

#imgbackground.ion-ios-reverse-camera {
  font-size: 190px;
  margin-left: 50%;
  color: white;
}

</style>



<!-- COLUMN RIGHT -->
<div ng-controller="userCtrl" ng-init='users.loadUsersAffiliatesPage()' id="col-right" class="col-right inplace-editing">
	<div class="container-fluid primary-content ">
	
	<!-- SHOW HIDE COLUMNS -->
	<div class="widget">
		<div class="widget-header clearfix">
			<h3><i class="icon ion-ios-grid-view-outline"></i> <span>AFFILIATES LIST</span></h3>
			<div class="btn-group widget-header-toolbar visible-lg">
				<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
				<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
			</div>
		</div>
		<div class="widget-content">
			<div class="alert alert-info fade in">
				<button class="close" data-dismiss="alert">&times;</button>
				<i class="icon ion-information-circled"></i> Try to show/hide column visibility and drag the column to another position to reorder it.
			</div>
			<div class="table-responsive">
			


<table id="datatable-column-interactive" class="table table-sorting table-hover table-bordered colored-header datatable">
    <thead>
        <tr>
           <th>Name</th>
           <th>Surname</th>
           <th>Birthday</th>
           <th>Marital status</th>
           <th>Email</th>
           <th>Twitter</th>
           <th>Facebook</th>
        </tr>
    </thead>
    <tbody>
    <tr ng-repeat='user in users.users'>
        <td><% user.name %></td>
        <td><% user.last_name %></td>
        <td><% user.birthday_date %></td>
        <td><% user.marital_status %></td>
        <td><% user.email %></td>
        <td><% user.twitter_page %></td>
        <td><% user.facebook_page %></td>
    </tr>
    </tbody>
</table>
			


				<!-- <table id="datatable-column-interactive" class="table table-sorting table-hover table-bordered colored-header datatable"> -->
					

			</div>
		</div>
	</div>
	<!-- END SHOW HIDE COLUMNS -->

	</div>
	
</div>
		<!-- END COLUMN RIGHT -->



   

				@stop
				<!-- END COLUMN RIGHT -->
				@section('footer_script')@parent
 
<script src={{ asset('assets/js/plugins/jquery.confirm.min.js') }}></script>
<script src={{ asset("assets/js/plugins/datatable/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatable/exts/dataTables.colVis.bootstrap.js") }}></script>
<script src={{ asset("assets/js/plugins/datatable/exts/dataTables.colReorder.min.js") }}></script>	
<script src={{ asset("assets/js/plugins/datatable/exts/dataTables.tableTools.min.js") }}></script>	
<script src={{ asset("assets/js/plugins/datatable/dataTables.bootstrap.js") }}></script>	
  
@stop


@section('script')

@stop        