@extends('layouts.default')



@section('content')




<!-- COLUMN RIGHT -->

<style>
	.team_image{

		width: 40px;
		height: 40px;
	}
	.todolist{
		margin-top: 22px;
	}
		.cropArea {
		  background: #E4E4E4;
		  overflow: hidden;
		  width:333px;
		  height:333px;
		}
		#cropped_image{
	      overflow: hidden;
		  width:100%;
		  height:100%;
		}
</style>

<div ng-controller="projectCtrl" ng-init='currentProject(); uploadProfileImage(); uploadBackgroundImage()' ng-show="!projects.isLoading" id="col-right" class="col-right ">
	<div class="container-fluid primary-content">
		<!-- PRIMARY CONTENT HEADING -->
		<div class="primary-content-heading clearfix">


			                    <style>
			                    .profile-header-background{
			                    height: 210px;
			                    background: url("{{ asset('/assets/upload/img/project')}}/<% projects.project.background_image || 'city.jpg' %>");
			                    background-repeat:no-repeat;
			                    background-size: cover;
			                    }
			                    .profile-info-left{
			                    	height: 170px;
			                    }
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

			                    <div class="profile-header-background">
			                        <div id="imgbackground" class="ion-ios-reverse-camera hide"></div>
			                    </div>

			                    <input class='hide' id="profile_image" type="file" >
			            		<input class='hide' id="background_image" type="file"   name="background_image" > 

			            		<!-- profile modal crop image -->
			            		<div class="modal fade" id="crop_profile_image" tabindex="-1" role="dialog" aria-hidden="true">
			            		    <div class="modal-dialog">
			            		        <div class="modal-content">
			            		            <div class="modal-header">
			            		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			            		                <h4 class="modal-title" id="myModalLabel">Crop Image</h4>
			            		            </div>
			            		            <div class="modal-body">

			            		            <div>Image crop:</div>
			            		            <div class="cropArea">
			            		              <img-crop image="myImage" area-type="square"  result-image="myCroppedImage"></img-crop>
			            		            </div>
			            		            <div>Preview:</div>
			            		            <div><img id="cropped_image" ng-src="<%myCroppedImage%>" /></div>								            

			            		                    <button type="button" id="close_project" class="btn btn-default" data-dismiss="modal">Close</button>
			            		                    <button type="button" ng-click="save_cropped_image(projects.project)" class="btn btn-primary">Save image</button>
			            		               
			            		            </div>
			            		        </div>
			            		    </div>
			            		</div>
			            		<!-- end profile modal crop image -->

			                    <div class="row">
			                        <div class="col-md-4">
			                            
			                            <div   class="profile-info-left">
			                                <div  class="text-center">
			                    <!--                            <div class="spinner"
			                                                     ng-show="user.isLoading" >
			                                                    <span us-spinner="{radius:8, width:5, length: 3, lines:9}" ></span >

			                                                    <p >Loading...</p >
			                                                    </div > -->
			                             <div id="imgprofile" class="ion-ios-reverse-camera hide"></div>
			                             <img   ng-src="{{ asset('/assets/upload/img/project')}}/<% projects.project.profile_image || 'avatar.png' %>" alt="Avatar" class="avatar" />
			                             <h2><a href="#" editable-text="projects.project.title"  onaftersave="projects.updateProject(projects.project)" ><% projects.project.title|| "empty" %></a></h2>
			                                                </div>
			    </div>
			</div>
			
	

		</div>
		<!-- END PRIMARY CONTENT HEADING -->
	
			<div class="col-md-8">

				<div  class="project-section general-info">
					<h3>General Info</h3>

					<p> <a href="#" editable-textarea="projects.project.description"  onaftersave="projects.updateProject(projects.project)" ><% projects.project.description || "empty" %></a> </p>
					<div class="row">
						<div class="col-sm-9">
							<dl class="dl-horizontal">
								<dt>Date:</dt>
								<dd> <a href="#" editable-date="projects.project.date_start" data-format="yy-mm-dd" data-viewformat="dd/mm/yyyy" onaftersave="projects.updateProject(projects.project)" ><% projects.project.date_start  || "empty" | date:"dd/MM/yyyy" %></a></dd>
								<dt>Duration:</dt>
								<dd><a href="#" editable-number="projects.project.duration_day"  onaftersave="updateProject(projects.project)"><% projects.project.duration_day || "empty"%></a> days <span class="text-muted"><small>( <% projects.project.remaining_day %> days remaining)</small></span></dd>
								<dt>Client:</dt>
								<dd><a href="#" editable-text="projects.project.client"  onaftersave="projects.updateProject(projects.project)" ><% projects.project.client || "empty" %></a></dd>
								<dt>Priority:</dt>
								<dd><a href="#" class="label " ng-class="{'label-warning':projects.project.priority=='MEDIUM','label-success':projects.project.priority=='LOW','label-danger':projects.project.priority=='HIGH' }" editable-select="projects.project.priority" e-ng-options="s.value as s.text for s in projects.priority"  onaftersave="projects.updateProject(projects.project)" ><% showPriority() %></a></dd>
								<dt>Status:</dt>
								<dd><a href="#" ng-class="{'label-warning': projects.project.status=='PENDING','label-success': projects.project.status=='ACTIVE','label-default': projects.project.status=='CLOSED' }" class="label " editable-select="projects.project.status" e-ng-options="s.value as s.text for s in projects.status"  onaftersave="projects.updateProject(projects.project)" ><% showStatus() %></a></dd>
								<dt>Team:</dt>
								<div ng-controller="userCtrl" ng-init='loadUsersInTeam(); loadUsersNotInTeam()'>
								<dd>
									<ul class="list-inline team-list">
										
										<li ng-repeat='user in users.usersInTeam'>
											<img ng-src="{{ asset('/assets/upload/img/user')}}/<% user.profile_image || 'avatar.png' %>" class="img-circle team_image" alt="Avatar" />
											<p><a href="#"><strong><% user.name %> <% user.last_name %></strong></a></p>
											<p ng-if="user.user_id==projects.project.user_id" class="text-muted">Project Owner</p>
											<p ng-if="!(user.user_id==projects.project.user_id)" class="text-muted">Partecipant</p>
											

										</li>
		

										<li class="team-add">
											<i class="icon ion-person"></i>
											<button type="button" data-toggle="modal" data-target="#add_user_to_team" class="btn btn-sm btn-default"><i class="icon ion-plus-circled"></i> Invite</button>
											<button type="button" data-toggle="modal" data-target="#del_user_to_team" class="btn btn-sm btn-default"><i class="icon ion-minus-circled"></i>Disable</button>

										</li>
									</ul>
								</dd>

								<!-- quick add user -->
								<div class="modal fade" id="add_user_to_team" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Invite User</h4>
											</div>
											<div class="modal-body">
												<form action="{{URL::to('project-detail')}}/{{$project->id}}" method="post" class="form-horizontal" role="form">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="user_action" value="add">

													<!-- SCROLLING DATA TABLE -->
													<div class="widget">
														<div class="widget-content">
														<label>Search:<input type="search" class="form-control input-sm" ng-model="searchBox" aria-controls="datatable-column-interactive"></label>
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
																		
																		<tr ng-repeat='user in users.usersNotInTeam | filter:searchBox'>
																			<td><% user.name %> </td>
																			<td><% user.last_name %></td>
																			<td ng-if="user.id==projects.project.user_id">
																				<p  class="text-muted">Project Owner</p>

																			</td>																				
																			<td ng-if="user.notification_accepted==1 && !(user.id==projects.project.user_id)">
																				<p  class="text-muted">Partecipant</p>

																			</td>
																			<td ng-if="!(user.id==projects.project.user_id) && (user.notification_rejected==null && user.notification_accepted==null && user.notification_title == null  && user.notification_read==null)">
																				<label class="fancy-checkbox">
																					<input type="checkbox" ng-click="sendInvite(user, projects.project.id)">
																					<span class="todo-text"></span>
																				</label>
																			</td>
																			<td ng-if="user.notification_rejected==1 && user.notification_accepted==0">
																				<p  class="text-muted">Invitation rejected</p>
											
																			</td>
																			<td ng-if="user.notification_rejected==0 && user.id != projects.project.user_id && user.notification_accepted==0 && user.notification_title != ''">
																				<p  class="text-muted">Invitation sent</p>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<!-- END SCROLLING DATA TABLE -->
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
												<h4 class="modal-title" id="myModalLabel">Disable User</h4>
											</div>
											<div class="modal-body">
												<form action="#" method="post" class="form-horizontal" role="form">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="user_action" value="rm">

													<!-- SCROLLING DATA TABLE -->
													<div class="widget">
														<div class="widget-content">
														<label>Search:<input type="search" class="form-control input-sm" ng-model="searchBox" aria-controls="datatable-column-interactive"></label>
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
																		
																		<tr ng-repeat='user in users.usersInTeam | filter: searchBox'>
																			<td ng-if="user.user_id!=projects.project.user_id" class="text-muted"><% user.name %> </td>
																			<td ng-if="user.user_id!=projects.project.user_id"><% user.last_name %></td>
																			<td ng-if="user.user_id!=projects.project.user_id">
																				<label class="fancy-checkbox">
																					<input type="checkbox" ng-click="removeUserInTeam(user)">
																					<span class="todo-text"></span>
																				</label>
																			</td>
																		</tr>
																		
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<!-- END SCROLLING DATA TABLE -->
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- end quick add user -->
								</div>
							</dl>
						</div>
						<div  class="col-sm-3">
							<div class="status-chart project-progress bottom-30px">
								<span class="chart-title">OVERALL PROGRESS</span>
								<span class="chart" data-percent="<% projects.project.progress %>">
									<span class="percent"></span><span>%</span>
								</span>										
							</div>
						</div>






					</div>
				</div>

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
						<div ng-controller="todoCtrl" ng-init='loadMyTodosOfCurrentProject()' >
							<div class="row">
								<div class="sticky-content pull-right col-md-4">
									<button type="button" class="btn btn-default btn-sm btn-quick-task" data-toggle="modal" data-target="#quick-task-modal"><i class="icon ion-edit"></i> New Todo</button>
								</div>
							</div>
							<div class="widget todolist">
								<div class="widget-header clearfix">
									<h3><i class="icon ion-calendar"></i> <span>MY TODO LIST</span></h3>
									<div class="btn-group widget-header-toolbar">
										<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
										<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
									</div>
								</div>
								<div class="widget-content">
									<ul class="list-unstyled simple-todo-list" >

										<li ng-repeat='todo in todos.todos'>
											<label class="fancy-checkbox">
												<input type="checkbox" checked ng-click="updateTodo(todo)" ng-if="todo.done==1">
												<input type="checkbox" ng-click="updateTodo(todo)" ng-if="todo.done==0">
												<span class="todo-text"><% todo.title%></span>
											</label>
										</li>

									</ul>

								</div>
							</div>
							<!-- END MY TODO LIST -->
							<!-- quick task modal -->
							<div class="modal fade" id="quick-task-modal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Todo</h4>
										</div>
										<div class="modal-body">
											<form novalidate  ng-submit="createTodo(todos.todo)" id="addTodo" class="form-horizontal" role="form">
												<div class="form-group">
													<label for="task-title" class="control-label sr-only">Title</label>
													<div class="col-sm-12">
														<input type="text" required ng-model="todos.todo.title" class="form-control" id="title" placeholder="Title">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label sr-only">Description</label>
													<div class="col-sm-12">
														<textarea  ng-model="todos.todo.description" class="form-control" name="task-description" rows="5" cols="30" placeholder="Description"></textarea>
													</div>
												</div>
												<button type="button" id="close_todo_dialog" class="btn btn-default" data-dismiss="modal">Close</button>
												<button id="submitTodoButton" type="submit" class="btn btn-primary">Save Todo</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- end quick task modal -->
						</div>



						<!-- RECENT FILES -->
						<div  ng-controller="fileCtrl" ng-init='loadFilesOfProject(); uploadFile()' class="widget">
							<div class="widget-header clearfix">
								<h3><i class="icon ion-document"></i> <span>RECENT FILES</span></h3>
								<div class="btn-group widget-header-toolbar">
									<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
									<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
								</div>
							</div>

							<input class='hide' id="upload_file" type="file" >

							<div class="widget-content">

								<ul  class="fa-ul recent-file-list bottom-30px">
									<li ng-repeat='file in files.files' onaftersave="updateFile(file)"><a href="{{ asset('/assets/upload/file/project')}}/<% file.path %>"><% file.name %></a></li>
								</ul>
								<button id="upload_file_button" type="button" class="btn btn-sm btn-primary"><i class="icon ion-upload"></i> Upload</button> <a href="#" class="btn btn-sm btn-default"><i class="icon ion-folder"></i> See all files</a>
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
		@section('footer_script')@parent

		<script src={{ asset('assets/js/plugins/stat/jquery-easypiechart/jquery.easypiechart.min.js') }}></script>

		@stop


		@section('script')
		<script>
		window.user_id = {!! auth()->user()->id !!}; 
		window.project_id={{$project->id}};
		window.team_id={{$project->team_id}};


		</script>
		<script>

			$( document ).ready(function() {

				//Change profile image



				 	//abilito e disabilito la visualizzazione dell'icona image change sul background profile
				 	$('.profile-header-background').mouseleave(function() {

				 		$('#imgbackground').addClass("hide");
				 		$('#imgbackground').removeClass("show");
					});	

					$('.profile-header-background').mouseenter(function() {

				 		$('#imgbackground').addClass("show");
				 		$('#imgbackground').removeClass("hide");
					});	




				    //abilito e disabilito la visualizzazione dell'icona image change sul profile
					$('.avatar').mouseleave(function() {

				 		$('#imgprofile').addClass("hide");
				 		$('#imgprofile').removeClass("show");
				 		});	

					$('.avatar').mouseenter(function() {

				 		$('#imgprofile').addClass("show");
				 		$('#imgprofile').removeClass("hide");
					});	
					


				 	$('.profile-header-background').click(function() {
				 		
				 		$("#background_image").click();
				 	});	

				 	$('.avatar').click(function() {
				 		$("#profile_image").click();
				 		
				 	});	

				$('#upload_file_button').click(function() {
					
					$("#upload_file").click();
				});	

			});

		</script>
		@stop        