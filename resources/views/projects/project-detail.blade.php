@extends('layouts.default')



@section('content')




<!-- COLUMN RIGHT -->


		<div id="col-right" class="col-right ">
			<div class="container-fluid primary-content">
				<!-- PRIMARY CONTENT HEADING -->
				<div class="primary-content-heading clearfix">
					<h2><a  class="editable" models="projects" value="<%= tittle %>" name="title" data-type="text" data-url="" data-pk= "{{$project->id}}" >{{$project->title}} </a></h2>
					<ul class="breadcrumb pull-left">
						<li><i class="icon ion-home"></i><a href="#">Home</a></li>
						<li><a href="#">Pages</a></li>
						<li class="active">Project Detail</li>
					</ul>
					<div class="sticky-content pull-right">
						<button type="button" class="btn btn-default btn-sm btn-quick-task" data-toggle="modal" data-target="#quick-task-modal"><i class="icon ion-edit"></i> Quick Task</button>
					</div>
					<!-- quick task modal -->
					<div class="modal fade" id="quick-task-modal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Quick Task</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label for="task-title" class="control-label sr-only">Title</label>
											<div class="col-sm-12">
												<input type="text" class="form-control" id="task-title" placeholder="Title">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label sr-only">Description</label>
											<div class="col-sm-12">
												<textarea class="form-control" name="task-description" rows="5" cols="30" placeholder="Description"></textarea>
											</div>
										</div>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save Task</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- end quick task modal -->
					<!-- quick add user -->
					<div class="modal fade" id="add_user_to_team" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Add User</h4>
								</div>
								<div class="modal-body">
									<form action="{{URL::to('project-detail')}}/{{$project->id}}" method="post" class="form-horizontal" role="form">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="user_action" value="add">

										<!-- SCROLLING DATA TABLE -->
										<div class="widget">
											<div class="widget-header clearfix">
												<h3><i class="icon ion-ios-grid-view-outline"></i> <span>Users List</span></h3>
												<div class="btn-group widget-header-toolbar visible-lg">
													<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
													<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
												</div>
											</div>
											<div class="widget-content">
												<div class="table-responsive">
													<table id="datatable-basic-scrolling" class="table table-sorting table-hover datatable">
														<thead>
															<tr>
																<th>Name</th>
																<th>Surname</th>
																<th>Add</th>
															</tr>
														</thead>
														<tbody>
														@if($user_to_add)
														@foreach ($user_to_add as $u)
															<tr>
																<td>{{ $u->name }}</td>
																<td>{{ $u->last_name }}</td>
																<td>
																<label class="fancy-checkbox">
																	<input type="checkbox" name="user.team.{{ $u->id }}" value="{{ $u->id }}">
																	<span class="todo-text"></span>
																</label>
  																</td>
															</tr>
															@endforeach
														@endif	
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- END SCROLLING DATA TABLE -->
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save Task</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- end quick add user -->
										<!-- quick add user -->
										<div class="modal fade" id="del_user_to_team" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Remove User</h4>
													</div>
													<div class="modal-body">
														<form action="{{URL::to('project-detail')}}/{{$project->id}}" method="post" class="form-horizontal" role="form">
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<input type="hidden" name="user_action" value="rm">

															<!-- SCROLLING DATA TABLE -->
															<div class="widget">
																<div class="widget-header clearfix">
																	<h3><i class="icon ion-ios-grid-view-outline"></i> <span>Users List</span></h3>
																	<div class="btn-group widget-header-toolbar visible-lg">
																		<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
																		<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
																	</div>
																</div>
																<div class="widget-content">
																	<div class="table-responsive">
																		<table id="datatable-basic-scrolling" class="table table-sorting table-hover datatable">
																			<thead>
																				<tr>
																					<th>Name</th>
																					<th>Surname</th>
																					<th>Add</th>
																				</tr>
																			</thead>
																			<tbody>
																			@if($user_to_del)
																			@foreach ($user_to_del as $u)
																				<tr>
																					<td>{{ $u->name }}</td>
																					<td>{{ $u->last_name }}</td>
																					<td>
																					<label class="fancy-checkbox">
																						<input type="checkbox" name="user.team.{{ $u->id }}" value="{{ $u->id }}">
																						<span class="todo-text"></span>
																					</label>
					  																</td>
																				</tr>
																				@endforeach
																			@endif	
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
															<!-- END SCROLLING DATA TABLE -->
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Save Task</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- end quick add user -->

				</div>
				<!-- END PRIMARY CONTENT HEADING -->
				<div class="row">
					<div class="col-md-8">
					<div id="editProject"></div>


				<script id="editProjectTemplate" type="text/template">
						<div class="project-section general-info">
							<h3>General Info</h3>
							
							<p> <a  class="editable" models="projects" name="description" data-type="textarea" data-pk="<%=id%>"><%= description %></a> </p>
							<div class="row">
								<div class="col-sm-9">
									<dl class="dl-horizontal">
										<dt>Date:</dt>
										<dd> <a  class="editable combodate" models="projects" value="<%= date_start %>" name="date_start" data-type="combodate" data-url="" data-pk= "<%=id%>" ><%= date_start %> </a> - <a  class="editable combodate" models="projects" value="<%= date_end %>" name="date_end" data-type="combodate" data-url="" data-pk= "<%=id%>" ><%= date_end %> </a></dd>
										<dt>Duration:</dt>
										<dd><a  class="editable" models="projects" value="<%= duration_day %>" name="duration_day" data-type="number" data-url="" data-pk= "<%=id%>" ><%= duration_day  %> </a> days <span class="text-muted"><small>(50 days remaining)</small></span></dd>
										<dt>Client:</dt>
										<dd><a  class="editable" models="projects" value="<%= client %>" name="client" data-type="text" data-url="" data-pk= "<%=id%>" ><%= client  %> </a></dd>
										<dt>Priority:</dt>
										<dd><a  id="priority" class="editable" models="projects" value="<%= priority %>" name="priority" data-type="select" data-url="" data-pk= "<%=id%>" ><%= priority %> </a></dd>
										<dt>Status:</dt>
										<dd><a  id="status" class="editable" models="projects" value="<%= status %>" name="status" data-type="select" data-url="" data-pk= "<%=id%>" ><%= status %> </a></dd>
										<dt>Team:</dt>
										<dd>
											<ul class="list-inline team-list">
											@if($users_in_team)
											@foreach ($users_in_team as $u_in_team)
												<li>
													<img src="{{ asset('/assets/upload/img/user')}}/{{ $u_in_team->profile_image or 'avatar.png' }}" class="img-circle" alt="Avatar" />
													<p><a href="#"><strong>{{ $u_in_team->name }} {{ $u_in_team->last_name }}</strong></a></p>
													
												</li>
											@endforeach
											@endif	
												
												<li class="team-add">
													<i class="icon ion-person"></i>
													<button type="button" data-toggle="modal" data-target="#add_user_to_team" class="btn btn-sm btn-default"><i class="icon ion-plus-circled"></i> Add</button>
												</li>
											</ul>
										</dd>
									</dl>
								</div>
								<div class="col-sm-3">
									<div class="status-chart project-progress bottom-30px">
										<div class="pie-chart" data-percent="<%= progress %>"><span class="percent"><%= progress %>%</span></div>
										<span class="chart-title">OVERALL PROGRESS</span>
									</div>
								</div>
							</div>
						</div>
						</script>
<!-- 						<div class="project-section activity">
							<h3>Activity</h3>
							<ul class="list-unstyled project-activity-list">
								<li>
									<div class="media activity-item">
										<i class="icon ion-checkmark-circled pull-left text-success"></i>
										<div class="media-body">
											<p class="activity-title">All project tasks are on schedule</p>
											<small class="text-muted">2m ago</small>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<a href="#" class="pull-left">
											<img src="assets/img/user2.png" alt="Avatar" class="media-object avatar" />
										</a>
										<div class="media-body">
											<p class="activity-title"><a href="#">Michael</a> has achieved 80% of his completed tasks</p>
											<small class="text-muted">36m ago</small>
										</div>
										<div class="btn-group pull-right activity-actions">
											<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
												<i class="icon ion-ios-arrow-down"></i>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#">Message Michael</a></li>
												<li><a href="#">Assign Task</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<i class="icon ion-unlocked pull-left text-danger"></i>
										<div class="media-body">
											<p class="activity-title">You have unsecure file permission on this project. Go to <a href="">File Manager</a> to fix it</p>
											<small class="text-muted">1h ago</small>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<a href="#" class="pull-left">
											<img src="assets/img/user5.png" alt="Avatar" class="media-object avatar" />
										</a>
										<div class="media-body">
											<p class="activity-title"><a href="#">Jason</a> has been added to the team</p>
											<small class="text-muted">2h ago</small>
										</div>
										<div class="btn-group pull-right activity-actions">
											<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
												<i class="icon ion-ios-arrow-down"></i>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#">Message Jason</a></li>
												<li><a href="#">Assign Task</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<i class="fa fa-file-word-o pull-left"></i>
										<div class="media-body">
											<p class="activity-title">New file <a href="#">Project Proposalv2.docx</a> has been uploaded by <a href="#">Antonius</a></p>
											<small class="text-muted">3h ago</small>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<i class="icon ion-printer pull-left text-warning"></i>
										<div class="media-body">
											<p class="activity-title">You have <a href="#">pending documents</a> on the printer server</p>
											<small class="text-muted">23h ago</small>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<i class="icon ion-flag pull-left text-success"></i>
										<div class="media-body">
											<p class="activity-title">Project: <a href="#">Phase 1</a> has been flagged as completed by <a href="#">Antonius</a></p>
											<small class="text-muted">Yesterday</small>
										</div>
									</div>
								</li>
								<li>
									<div class="media activity-item">
										<a href="#" class="pull-left">
											<img src="assets/img/user4.png" alt="Avatar" class="media-object avatar" />
										</a>
										<div class="media-body">
											<p class="activity-title"><a href="#">Jane Doe</a> has updated file <a href="#">Marketing Campaign.docx</a></p>
											<small class="text-muted">Yesterday</small>
											<div class="activity-attachment">
												<div class="well well-sm">
													<strong>Revision Note:</strong>
													<p>Professionally evolve corporate services without ethical leadership. Proactively re-engineer client-focused infrastructures before alternative potentialities. Competently predominate just in time e-tailers for leveraged solutions.</p>
												</div>
											</div>
										</div>
										<div class="btn-group pull-right activity-actions">
											<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
												<i class="icon ion-ios-arrow-down"></i>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#">Message Jane Doe</a></li>
												<li><a href="#">Assign Task</a></li>
											</ul>
										</div>
									</div>
								</li>
							</ul>
							<button type="button" class="btn btn-default center-block"><i class="icon ion-ios-refresh"></i> Load more</button>
						</div> -->
					</div>
					<div class="col-md-4">
						<!-- MY TODO LIST -->
						<div class="widget">
							<div class="widget-header clearfix">
								<h3><i class="icon ion-calendar"></i> <span>MY TODO LIST</span></h3>
								<div class="btn-group widget-header-toolbar">
									<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
									<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
								</div>
							</div>
							<div class="widget-content">
								<ul class="list-unstyled simple-todo-list">
									<li>
										<label class="fancy-checkbox">
											<input type="checkbox" checked="checked">
											<span class="todo-text">Upload new revision</span>
										</label>
									</li>
									<li>
										<label class="fancy-checkbox">
											<input type="checkbox">
											<span class="todo-text">Responsive test</span>
										</label>
									</li>
									<li>
										<label class="fancy-checkbox">
											<input type="checkbox" checked="checked">
											<span class="todo-text">Cross-browser check</span>
										</label>
									</li>
									<li>
										<label class="fancy-checkbox">
											<input type="checkbox">
											<span class="todo-text">Social media research</span>
										</label>
									</li>
									<li>
										<label class="fancy-checkbox">
											<input type="checkbox">
											<span class="todo-text">Conduct A/B test</span>
										</label>
									</li>
								</ul>
							</div>
						</div>
						<!-- END MY TODO LIST -->
						<!-- RECENT FILES -->
						<div class="widget">
							<div class="widget-header clearfix">
								<h3><i class="icon ion-document"></i> <span>RECENT FILES</span></h3>
								<div class="btn-group widget-header-toolbar">
									<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
									<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
								</div>
							</div>
							<div class="widget-content">
								<ul class="fa-ul recent-file-list bottom-30px">
									<li><i class="fa-li fa fa-file-pdf-o"></i><a href="#">Project Requirements.pdf</a></li>
									<li><i class="fa-li fa fa-file-word-o"></i><a href="#">[DRAFT] System Specifications.docx</a></li>
									<li><i class="fa-li fa fa-file-picture-o"></i><a href="#">Marketing Content-v2.jpg</a></li>
									<li><i class="fa-li fa fa-file-zip-o"></i><a href="#">All-files-backup.zip</a></li>
								</ul>
								<button type="button" class="btn btn-sm btn-primary"><i class="icon ion-upload"></i> Upload</button> <a href="#" class="btn btn-sm btn-default"><i class="icon ion-folder"></i> See all files</a>
							</div>
						</div>
						<!-- END RECENT FILES -->
					</div>
				</div>
			</div>
		</div>
		<!-- END COLUMN RIGHT -->



   

				@stop
				<!-- END COLUMN RIGHT -->
				@section('footer_script')


<script src={{ asset('assets/js/jquery/jquery-2.1.0.min.js') }}></script>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>



	<script src={{ asset('assets/js/main.js') }}></script>
	<script src={{ asset('assets/js/models.js') }}></script>
	<script src={{ asset('assets/js/collections.js') }}></script>
	<script src={{ asset('assets/js/router.js') }}></script>
	
	<script src={{ asset('assets/js/bootstrap/bootstrap.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}></script>"></script>
	<script src={{ asset('assets/js/queen-common.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/stat/jquery-easypiechart/jquery.easypiechart.min.js') }}></script>"></script>
	<script src={{ asset('assets/js/queen-page.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/moment/moment.min.js') }}></script>"></script>


 
	<script src={{ asset('assets/js/plugins/jquery.confirm.min.js') }}></script>

 <script src={{ asset('assets/js/plugins/jquery-maskedinput/jquery.masked-input.min.js') }}></script>
	<script src={{ asset('assets/js/queen-charts.js') }}></script>
	<script src={{ asset('assets/js/queen-maps.js') }}></script>
	<script src={{ asset('assets/js/queen-elements.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/jquery.mockjax.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/moment/moment.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/bootstrap-editable.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/typeahead/typeahead.js') }}></script>
   <script src={{ asset('assets/js/plugins/typeahead/typeaheadjs.1.5.1.js') }}></script>
   <script src={{ asset('assets/js/plugins/select2/select2.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/address.custom.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/demo-mock.js') }}></script>

   	<script src={{ asset('assets/js/plugins/datatable/jquery.dataTables.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/datatable/exts/dataTables.colVis.bootstrap.js') }}></script>
	<script src={{ asset('assets/js/plugins/datatable/exts/dataTables.colReorder.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/datatable/exts/dataTables.tableTools.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/datatable/dataTables.bootstrap.js') }}></script>
	<script src={{ asset('assets/js/queen-table.js') }}></script>


@stop


@section('script')
<script> window.user_id = {!! auth()->user()->id !!}; </script>
<script>window.project_id={{$project->id}}; </script>
 <script >
    
   //Collections   	**********************************************************************************************************************************

   //User collection	


   App.Collections.Projects= Backbone.Collection.extend({
   	model:App.Models.Project,
   	url:'{{Config::get('app.url')}}{{Config::get('backbone.collection_projects')}}'
   });






   // //Router 

           new App.Router;
          
           Backbone.history.start();


           // Carico il project by user id
           $.getJSON("{{Config::get('app.url')}}{{Config::get('backbone.collection_projects')}}/"+project_id, function(data) {
  
           	   var project= new App.Models.Project(data);
           	   var editProject= new App.Views.EditProject({ model: project});
           	   $('#editProject').html(editProject.el);
           		

            App.projects= new App.Collections.Projects(data);
           });
          
           App.projects= new App.Collections.Projects;
           App.projects.fetch().then(function(){

           new App.Views.App({collection: App.projects});    

           });






   //VIEWS  **********************************************************************************************************************************



   // MAIN VIEW *******************************************************************************************************************************


   App.Views.App=Backbone.View.extend({

       initialize: function(){	
       vent.on('project:edit', this.editProject, this);
       //var addProjectsView= new App.Views.AddProject({ collection: App.projects});
       //var allProjectsView = new App.Views.Projects({ collection: App.projects}).render();
       //$('#allProjects').append(allProjectsView.el); // appendo la lista dei contatti nella tabella



       },


       
       });


           

      //USER VIEWS************************************************************************************************************************************************************************************

   //Edit user View

   // App.Views.EditUser = Backbone.View.extend({
   //     template: template('editUserTemplate'),

   //     initialize: function(){
   //         this.render();
   //     },

   //     events:{
           
   //     },

   //     render: function(){
   //         var html =this.template(this.model.toJSON());

   //         this.$el.html(html);
   //         return this;
   //     }

   // });

   //Single user view

   // App.Views.Project= Backbone.View.extend({
   //     tagName:'tr',

   //     template: template('allProjectsTemplate'),

   //     initialize: function(){
   //         this.model.on('destroy', this.unrender, this);
   //         this.model.on('change', this.render, this); 
   //     },

   //     events:{
   //         'click a.prj_delete': 'deleteProject',
   //         'click a.edit': 'editProject'
   //     },

   //     editProject: function(){
   //         vent.trigger('project:edit', this.model);


   //     },


       
       
   //     deleteProject: function(){

       
   //     var self=this;
       

   //     $.confirm({
   //         text: "Are you sure you want to delete that project?",
   //         title: "Confirmation required",
   //         confirmButton: "Yes I am",
   //         cancelButton: "No",
   //         post: false,
   //         confirmButtonClass: "btn-danger",
   //         cancelButtonClass: "btn-default",
   //         dialogClass: "modal-dialog modal-lg",
   //         confirm: function() {
   //             //this.model.destroy();
   //             self.model.destroy();
   //         },
   //         cancel: function() {
   //             // nothing to do
   //         }
   //     });

   //     },

   //     render: function(){
   //         this.$el.html(this.template(this.model.toJSON()));

   //         return this;
   //     },

   //     unrender: function(){
   //         this.remove(); //this.$el.remove();
   //     }
   // });

   // // Add project View

   // App.Views.AddProject= Backbone.View.extend({
   //     el:'#addProject',

   //     initialize: function(){

   //         this.title = $('#title');
   //         this.description = $('#description');
   //         this.date_start = moment();
   //         this.duration_day=$('#duration_day');
   //         this.progress="";
   //         this.priority="";
   //         //this.client=$('#client');
   //         this.status="";
   //         this.date_end = "";
   //         //this.team_id=;
   //         this.user_id="";

   //     },

   //     getProgress:function(){

   //     	return "50";
   //     },
   //     getEndDate:function(date, amount){
       	
       	
   // 		return moment(date).add(amount, 'day');
   //     },

   //     events:{
   //         'submit':'addProject'
   //     },

   //     addProject: function(e){
   //         e.preventDefault();

   //         //Create contact 
   //         this.collection.create({

   //         title: this.title.val(),
   //         description: this.description.val(),
   //         date_start: this.date_start.format("YYYY-MM-DD"),
   //         date_end: this.getEndDate(this.date_start, this.duration_day),
   //         duration_day: this.duration_day.val(),
   //         progress: this.getProgress(),
   //         priority: "LOW",
   //         //client: this.client.val(),
   //         status: "ACTIVE",
   //         //team_id: this.team_id.val(),
   //         user_id: user_id,

               

   //         }, {wait: true}); //wait the server for save id in attribute
   //         this.clearForm();
   //     },

   //     clearForm: function(){

           
   //         this.title.val('');
   //         this.description.val('');
   //         //this.date_start.val('');
   //         //this.date_end.val('');
   //         this.duration_day.val('');
   //         // this.progress.val('');
   //         // this.priority.val('');
   //         //this.client.val('');
   //         // this.status.val('');
   //         // this.team_id.val('');
   //         // this.user_id.val('');

   //     }
   // });


   // //All project View

   // App.Views.Projects=Backbone.View.extend({
       
   //     tagName: 'tbody',

   //     initialize: function(){
   //         this.collection.on('add', this.addOne, this); // sync when return data from server

   //     },

   //     render: function(){
   //         //this.$el.empty();
   //         this.collection.each(this.addOne, this);
   //         return this;
   //     },

   //     addOne: function(project){
   //         var projectView= new App.Views.Project({ model:project});
   //         this.$el.append(projectView.render().el);
   //     }

   // });


//Edit user View

App.Views.EditProject = Backbone.View.extend({
    template: template('editProjectTemplate'),

    initialize: function(){

       
        
        this.render();
    },

    events:{
       
    },

    render: function(){


    	




        var html =this.template(this.model.toJSON());

        this.$el.html(html);
        return this;
    }

});

 $(document).ready(function() {

 
// Imposto i campi editabili
    window.editableEnabler = function(){
    	//var newValue=$(this).val();
    	

        setTimeout(function(){ 

        	 	     
	
      
        	// get file data


			$.fn.editable.defaults.mode = 'inline';


			$('#priority').editable({
        	        value: '',    
        	        source: [
        	              {value: 'LOW', text: 'LOW'},
        	              {value: 'MEDIUM', text: 'MEDIUM'},
        	              {value: 'HIGH', text: 'HIGH'}
        	           ],
        	         success: function(response, newValue) {  
        	          	      
        	                 var id=$(this).attr('data-pk');
        	                 var name=$(this).attr('name');
        	                 var modelsName= $(this).attr('models');
        	                 var model= App.projects.models[0].attributes;
        	                if(newValue=="LOW"){
        	                 model.class_priority='label-success';
        	                 model.priority= newValue;
        	                 App.projects.models[0].save();
        	                // App.projects.models[0].save("priority",newValue);
        	                // App.projects.models[0].save("class_priority",'label-success');
        	                // App.projects.models[0].save("title",'probva');
        	                
        	                }else if(newValue=='MEDIUM'){
        	                model.class_priority='label-warning';
        	                model.priority= newValue;
        	                App.projects.models[0].save();
        	                // App.projects.models[0].save("priority",newValue);
        	                // App.projects.models[0].save("class_priority",'label-warning');
        	               
        	                }else{	
        	                	model.class_priority='label-danger';
        	                	model.priority= newValue;
        	                	App.projects.models[0].save();
        	                	// App.projects.models[0].save("priority",newValue);
        	                	// App.projects.models[0].save("class_priority",'label-danger');

        	               
        	                }



 						     //console.log(id, name,modelsName, newValue);
        	                 
        	                 editableEnabler();
        	            }
        	    });
			
						$('#status').editable({
			        	        value: '',    
			        	        source: [
			        	              {value: 'ACTIVE', text: 'ACTIVE'},
			        	              {value: 'PENDING', text: 'PENDING'},
			        	              {value: 'CLOSED', text: 'CLOSED'}
			        	           ],
			        	         success: function(response, newValue) {   

			        	                 
			        	                 var id=$(this).attr('data-pk');
			        	                 var name=$(this).attr('name');
			        	                 var modelsName= $(this).attr('models');
			        	                 var model= App.projects.get(id).set(name, newValue);



			 						     console.log(id, name,modelsName, newValue);
			        	                 model.save(name, newValue);
			        	                 editableEnabler();
			        	            }
			        	    });

        		// date fields	    
        		date = new Date();	   

        		$('.combodate').editable({
                     
                     combodate: {
                             minYear: date.getFullYear()-116,
                             maxYear: date.getFullYear(),
                             //minuteStep: 1,
                             
                             yearDescending: true,

                             format: 'YYYY-MM-DD',      
                             //in this format items in dropdowns are displayed
                             template: 'YYYY / MMM /D',
                             //initial value, can be `new Date()`    
                             errorClass: null,
                             roundTime: false, // whether to round minutes and seconds if step > 1
                             smartDays: true, // whether days in combo depend on selected month: 31, 30, 28
                        },
                                        success: function(response, newValue) {   

                        var id=$(this).attr('data-pk');
                        var name=$(this).attr('name');
                        var modelsName= $(this).attr('models');
                  
                  var mese = parseInt(newValue._i[1])+1;

                  var dataForBb=newValue._i[0]+'-'+mese+'-'+newValue._i[2];

                  var dataForBbFormatted= moment(dataForBb).format('YYYY-MM-DD');

                         switch (modelsName){
                            case 'users':
                                var model= App.users.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'educations':
                                var model= App.educations.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'experiences':
                                var model= App.experiences.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'industries':
                                var model= App.industries.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'projects':
                                var model= App.projects.get(id).set(name, dataForBbFormatted);
                            break;
                        }

                        model.save(name, dataForBbFormatted);
                        editableEnabler();
                   },
                   error: function(response, newValue) {
                       if(response.status === 500) {
                           return 'Service unavailable. Please try later.';
                       } else {
                           return response.responseText;
                       }
                   }
                     
                 });


        	// tutti gli altri campi		
            $('.editable').editable({

                success: function(response, newValue) {   
                        var id=$(this).attr('data-pk');
                        var name=$(this).attr('name');
                        var modelsName= $(this).attr('models');
                  //console.log(id, name,modelsName, newValue);

                        switch (modelsName){
                            case 'users':
                                var model= App.users.get(id).set(name, newValue);
                            break;

                            case 'educations':
                                var model= App.educations.get(id).set(name, newValue);
                            break;

                            case 'experiences':
                                var model= App.experiences.get(id).set(name, newValue);
                            break;

                            case 'industries':
                                var model= App.industries.get(id).set(name, newValue);
                            break;

                            case 'projects':
                                var model= App.projects.get(id).set(name, newValue);
                            break;
                        }

                        model.save(name, newValue);
                        editableEnabler();
                   },
                   error: function(response, newValue) {
                       if(response.status === 500) {
                           return 'Service unavailable. Please try later.';
                       } else {
                           return response.responseText;
                       }
                   }
            });

        }, 500);
    }   



//toggle enable 

function enableToggle(){
    setTimeout(function(){

    	    //Abilito e disabilito l'editable
    	    $( "#enable" ).click(function() {
    	
    	        $('.editable').editable('toggleDisabled');
    	        var text=$('#enable').text();
    	        if(text=='Enable Edit'){
    	            $('#enable').text('Disable Edit');
    	        }else{
    	            $('#enable').text('Enable Edit');
    	        }
    	 
    	});


    }, 1000);

}


editableEnabler();
enableToggle();





});



 
</script>
@stop        