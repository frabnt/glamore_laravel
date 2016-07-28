@extends('layouts.default')



@section('content')

<style>
    .avatar{
        height: 22px;
        width:22px;
    }

.progress.active .progress-bar {
    -webkit-transition: none !important;
    transition: none !important;
}
</style>

<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right" ng-controller="projectCtrl" ng-init="loadMyProject(); loadJoinedProject()">
			<div class="container-fluid primary-content">
				<!-- PRIMARY CONTENT HEADING -->
				<div  class="primary-content-heading clearfix">
					<h2>MY PROJECTS</h2>
					<ul class="breadcrumb pull-left">
						<li><i class="icon ion-home"></i><a href="#">Home</a></li>
						<li><a href="#">Pages</a></li>
						<li class="active">My Projects</li>
					</ul>

				</div>
					<!-- quick task modal -->
                    <!-- <div class="modal fade" id="new-project-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Create Project</h4>
                                </div>
                                <div class="modal-body">
                                    <form novalidate  ng-submit="createProject(projects.project)" id="addProject" class="form-horizontal" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="title" class="control-label sr-only">Title</label>
                                            <div class="col-sm-12">
                                                <input type="text" ng-model="projects.project.title" ng-init="projects.project.title=''" required class="form-control" id="title" placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                                <input type="number" ng-model="projects.project.duration_day" required ng-init="projects.project.duration_day=''" class="form-control" id="duration_day" placeholder="Days to Deadline">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label sr-only">Description</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" ng-model="projects.project.description" ng-init="projects.project.description=''" id="description" name="task-description" rows="5" cols="30" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                        <button type="button" id="close_project" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit"  class="btn btn-primary">Save Project</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- end quick task modal -->
				<!-- END PRIMARY CONTENT HEADING -->
				<div class="project-list-subheading">
					<p class="lead">You're involved in <span class="label label-success"><% projects.active %> active</span> projects, <span class="label label-warning"><% projects.pending %> pending</span> and <span class="label label-default"><% projects.closed %> closed</span></p>
					<button type="button" data-toggle="modal" data-target="#new-project-modal" class="btn btn-primary pull-right btn-new-project"><i class="icon ion-compose"></i> POST A NEW PROJECT</button>
				</div>

				<div class="table-responsive">
					<table id="allProjects" class="table colored-header datatable project-list">
						<thead>
							<tr>
								<th>Title</th>
								<th>Date Start</th>
								<th>Days to Deadline</th>
								<th>Progress</th>
								<th>Priority</th>
								<th>Leader</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
                        <tbody ng-controller="userCtrl" ng-init='currentUser()'>
                        <tr ng-repeat='project in projects.myProjects'>
                            <td><a href="{{URL::to('project-detail/')}}/<% project.id %>"><% project.title %></a></td>
                            <td><% project.date_start | date:"dd/MM/yyyy" %></td>
                            <td><% project.duration_day %> days</td>
                            <td><div class="progress">
                                <div class="progress-bar" percent="<% project.progress %>" style="width: 0%"><% project.progress %>%</div>
                            </td>
                            <td><span ng-class="{'label-warning': project.priority=='MEDIUM','label-success': project.priority=='LOW','label-danger': project.priority=='HIGH' }" class="label "><% project.priority %></span></td>
                            <td><img src="{{ asset('/assets/upload/img/user')}}/<% users.user.profile_image || 'avatar.png' %>" alt="Avatar" class="avatar"> <a href="#"><%users.user.name %> </a></td>
                            <td><span ng-class="{'label-warning': project.status=='PENDING','label-success': project.status=='ACTIVE','label-default': project.status=='CLOSED' }" class="label "><% project.status %></span></td>
                            <td><a ng-click="deleteProject(project)" class="prj_delete btn btn-primary btn-block" >Delete </a></td>
                        </tr>
                        </tbody>
					</table>
				</div>
                            <div class="project-list-subheading">
                <p class="lead">Joined Projects</p>
                                <div class="table-responsive">
                                    <table id="allProjects" class="table colored-header datatable project-list">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date Start</th>
                                                <th>Days to Deadline</th>
                                                <th>Progress</th>
                                                <th>Priority</th>
                                                <th>Leader</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody ng-controller="userCtrl">
                                        <tr ng-repeat='project in projects.joinedProjects'>
                                            <td><a href="{{URL::to('project-detail/')}}/<% project.id %>"><% project.title %></a></td>
                                            <td><% project.date_start | date:"dd/MM/yyyy" %></td>
                                            <td><% project.duration_day %> days</td>
                                            <td><div class="progress">
                                                <div class="progress-bar" percent="<% project.progress %>" style="width: 0%"><% project.progress %>%</div>
                                            </td>
                                            <td><span ng-class="{'label-warning': project.priority=='MEDIUM','label-success': project.priority=='LOW','label-danger': project.priority=='HIGH' }" class="label "><% project.priority %></span></td>
                                            <td><img src="{{ asset('/assets/upload/img/user')}}/<% project.user_profile_image || 'avatar.png' %>" alt="Avatar" class="avatar"> <a href="#"><%project.user_name%> </a></td>
                                            <td><span ng-class="{'label-warning': project.status=='PENDING','label-success': project.status=='ACTIVE','label-default': project.status=='CLOSED' }" class="label "><% project.status %></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
            </div>
			</div>




		</div>



		<!-- END COLUMN RIGHT -->



   

				@stop
				<!-- END COLUMN RIGHT -->
				@section('footer_script')@parent

	
	<script src={{ asset('assets/js/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}></script>



@stop


@section('script')
<script> window.user_id = {!! auth()->user()->id !!}; </script>
 <script >
 $( document ).ready(function() {


 });


</script>
@stop        