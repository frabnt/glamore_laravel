@extends('layouts.default')



@section('content')




<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right ">
			<div class="container-fluid primary-content">
				<!-- PRIMARY CONTENT HEADING -->
				<div class="primary-content-heading clearfix">
					<h2>PROJECT 123GO</h2>
					<ul class="breadcrumb pull-left">
						<li><i class="icon ion-home"></i><a href="#">Home</a></li>
						<li><a href="#">Pages</a></li>
						<li class="active">Project Detail</li>
					</ul>
					<div class="sticky-content pull-right">
						<div class="btn-group btn-dropdown">
							<button type="button" class="btn btn-default btn-sm btn-favorites" data-toggle="dropdown"><i class="icon ion-android-star"></i> Favorites</button>
							<ul class="dropdown-menu dropdown-menu-right list-inline">
								<li><a href="#"><i class="icon ion-pie-graph"></i> <span>Statistics</span></a></li>
								<li><a href="#"><i class="icon ion-email"></i> <span>Inbox</span></a></li>
								<li><a href="#"><i class="icon ion-chatboxes"></i> <span>Chat</span></a></li>
								<li><a href="#"><i class="icon ion-help-circled"></i> <span>Help</span></a></li>
								<li><a href="#"><i class="icon ion-gear-a"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="icon ion-help-buoy"></i> <span>Support</span></a></li>
							</ul>
						</div>
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
				</div>
				<!-- END PRIMARY CONTENT HEADING -->
				<div class="row">
					<div class="col-md-8">
						<div class="project-section general-info">
							<h3>General Info</h3>
							<button type="button" class="btn btn-sm btn-default pull-right"><i class="icon ion-compose"></i> Edit Project</button>
							<p>Rapidiously monetize orthogonal platforms with 24/7 convergence. Uniquely create error-free alignments for customized users. Credibly facilitate just in time benefits rather than user friendly imperatives. Continually promote extensible process improvements whereas virtual. Enthusiastically pontificate proactive infrastructures vis-a-vis value-added products. Enthusiastically coordinate pandemic platforms rather than team building best practices. Globally facilitate plug-and-play materials and interoperable interfaces. Enthusiastically.</p>
							<div class="row">
								<div class="col-sm-9">
									<dl class="dl-horizontal">
										<dt>Date:</dt>
										<dd>20-09-2014 - 20-12-2014</dd>
										<dt>Duration:</dt>
										<dd>90 days <span class="text-muted"><small>(50 days remaining)</small></span></dd>
										<dt>Client:</dt>
										<dd><a href="#">ZenArt</a></dd>
										<dt>Priority:</dt>
										<dd><span class="label label-danger">HIGH</span></dd>
										<dt>Status:</dt>
										<dd><span class="label label-success">ACTIVE</span></dd>
										<dt>Team:</dt>
										<dd>
											<ul class="list-inline team-list">
												<li>
													<img src="assets/img/user1.png" class="img-circle" alt="Avatar" />
													<p><a href="#"><strong>Antonius</strong></a></p>
													<span class="text-muted">Project Leader</span>
												</li>
												<li>
													<img src="assets/img/user2.png" class="img-circle" alt="Avatar" />
													<p><a href="#"><strong>Michael</strong></a></p>
													<span class="text-muted">Art Director</span>
												</li>
												<li>
													<img src="assets/img/user3.png" class="img-circle" alt="Avatar" />
													<p><a href="#"><strong>Stella Ray</strong></a></p>
													<span class="text-muted">Account Executive</span>
												</li>
												<li>
													<img src="assets/img/user4.png" class="img-circle" alt="Avatar" />
													<p><a href="#"><strong>Jane Doe</strong></a></p>
													<span class="text-muted">Marketing</span>
												</li>
												<li>
													<img src="assets/img/user5.png" class="img-circle" alt="Avatar" />
													<p><a href="#"><strong>Jason</strong></a></p>
													<span class="text-muted">Operational</span>
												</li>
												<li class="team-add">
													<i class="icon ion-person"></i>
													<button type="button" class="btn btn-sm btn-default"><i class="icon ion-plus-circled"></i> Add</button>
												</li>
											</ul>
										</dd>
									</dl>
								</div>
								<div class="col-sm-3">
									<div class="status-chart project-progress bottom-30px">
										<div class="pie-chart" data-percent="60"><span class="percent">60%</span></div>
										<span class="chart-title">OVERALL PROGRESS</span>
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


	<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>



	<script src={{ asset('assets/js/main.js') }}></script>
	<script src={{ asset('assets/js/models.js') }}></script>
	<script src={{ asset('assets/js/collections.js') }}></script>
	<script src={{ asset('assets/js/router.js') }}></script>
	<script src={{ asset('assets/js/jquery/jquery-2.1.0.min.js') }}></script>"></script>
	<script src={{ asset('assets/js/bootstrap/bootstrap.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}></script>"></script>
	<script src={{ asset('assets/js/queen-common.js') }}></script>"></script>
	<script src={{ asset('assets/js/plugins/stat/jquery-easypiechart/jquery.easypiechart.min.js') }}></script>"></script>
	<script src={{ asset('assets/js/queen-page.js') }}></script>"></script>


 
	<script src={{ asset('assets/js/plugins/jquery.confirm.min.js') }}></script>

 




@stop


@section('script')
 <script >
    
   





 
</script>
@stop        