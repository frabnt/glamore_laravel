@extends('layouts.default')

@section('content')

		<style>

            .bold {
                font-weight: bold;
            }

            .italic-underline-bold {
                font-style: italic;
                border-bottom: 1px grey dotted;
                font-weight: bold;

            }

            .chart {
                position: relative;
                display: inline-block;
                width: 110px;
                height: 110px;
                text-align: center;
            }
            .chart canvas {
                position: absolute;
                top: 0;
                left: 0;
            }
            .percent {
                display: inline-block;
                line-height: 110px;
                z-index: 2;
            }
            .percent:after {
                content: '%';
                margin-left: 0.1em;
                font-size: .8em;
            }

            .chart-container {
                display: table-cell;
                vertical-align: middle;
                width: 30%;
                padding-left: 1em;

            }

            .chart-info {
                display: table-cell;
                vertical-align: middle;
                width: 70%;
                padding-left: 1em;
                padding-right: 3em;
                font-size: 80%
            }

            .chart-info h5 {
                overflow-wrap: break-word;
                word-wrap: break-word;

                -ms-word-break: break-all;
                /* This is the dangerous one in WebKit, as it breaks things wherever */
                word-break: break-all;
                /* Instead use this non-standard one: */
                word-break: break-word;

                /* Adds a hyphen where the word breaks, if supported (No Blink) */
                -ms-hyphens: auto;
                -moz-hyphens: auto;
                -webkit-hyphens: auto;
                hyphens: auto;
                margin: 0;
            }

            @media screen and (max-width: 360px) {
                .chart-info {
                    padding-left: 1.5em;
                }

                .chart-container {
                    padding-left: 2%;
                }
                .div-center-align {
                    position: relative;
                    left: -4%;
                }
            }

            @media screen and (max-width: 300px) {
                .div-center-align {
                    position: relative;
                    left: -9%;
                    width: 70%;
                }
                .chart-info {
                    padding-left: 0.5em;
                }
            }

        </style>
		
		<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right ">
			<div class="container-fluid primary-content">
				<!-- PRIMARY CONTENT HEADING -->
				<div class="primary-content-heading clearfix">
					<h2>DASHBOARD</h2>
					<ul class="breadcrumb pull-left">
						<li><i class="icon ion-home"></i><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li class="active">Dashboard v1</li>
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
				
				<!-- <div class="widget widget-no-header widget-transparent bottom-30px"> -->
					<!-- QUICK SUMMARY INFO -->
					<!-- <div class="widget-content">
						<h3 class="sr-only">QUICK SUMMARY INFO</h3>
						<div class="row">
							<div class="col-sm-3 text-center">
								<div class="quick-info horizontal">
									<i class="icon ion-thumbsup pull-left bg-seagreen"></i>
									<p>3700 <span>LIKES</span></p>
								</div>
							</div>
							<div class="col-sm-3 text-center">
								<div class="quick-info horizontal">
									<i class="icon ion-arrow-graph-up-right pull-left bg-orange"></i>
									<p>27% <span>GROWTH</span></p>
								</div>
							</div>
							<div class="col-sm-3 text-center">
								<div class="quick-info horizontal">
									<i class="icon ion-cash pull-left bg-green"></i>
									<p>$5,400 <span>PROFIT</span></p>
								</div>
							</div>
							<div class="col-sm-3 text-center">
								<div class="quick-info horizontal">
									<i class="icon ion-person-stalker pull-left bg-blue"></i>
									<p>7285 <span>USERS</span></p>
								</div>
							</div>
						</div>
					</div> -->
					<!-- END QUICK SUMMARY INFO -->
				<!-- </div> -->
				<!-- <div class="row">
					<div class="col-md-8"> -->
						<!-- CHART WITH JUSTIFIED TAB -->
						<!-- <div class="widget">
							<div class="widget-header clearfix no-padding">
								<h3 class="sr-only"><span>SALES AND VISITS STAT</span></h3>
								<ul id="dashboard-stat-tab" class="nav nav-pills nav-justified">
									<li class="active"><a href="#tab-sales" data-cid="#dashboard-sales-chart">Sales</a></li>
									<li class=""><a href="#tab-visits" data-cid="#dashboard-visits-chart">Visits</a></li>
								</ul>
							</div>
							<div id="dashboard-stat-tab-content" class="widget-content tab-content">
								<div class="tab-pane fade in active" id="tab-sales">
									<div class="flot-chart" id="dashboard-sales-chart"></div>
								</div>
								<div class="tab-pane fade" id="tab-visits">
									<div class="flot-chart" id="dashboard-visits-chart"></div>
								</div>
							</div>
						</div> -->
						<!-- END CHART WITH JUSTIFIED TAB -->
					<!-- </div> -->
					<!-- <div class="col-md-4"> -->
						<!-- ORDER STATUS -->
						<!-- <div class="widget">
							<div class="widget-header clearfix">
								<h3><i class="icon ion-bag"></i> <span>ORDER STATUS</span></h3>
								<div class="btn-group widget-header-toolbar">
									<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
									<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>Status</th>
											<th>Order Number</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><span class="label label-warning">Pending</span></td>
											<td><a href="#">ORD834580</a></td>
											<td>$320</td>
										</tr>
										<tr>
											<td><span class="label label-success">Completed</span></td>
											<td><a href="#">ORD834565</a></td>
											<td>$400</td>
										</tr>
										<tr>
											<td><span class="label label-warning">Pending</span></td>
											<td><a href="#">ORD834577</a></td>
											<td>$80</td>
										</tr>
										<tr>
											<td><span class="label label-danger">Error</span></td>
											<td><a href="#">ORD834543</a></td>
											<td>$307</td>
										</tr>
										<tr>
											<td><span class="label label-info">On-Process</span></td>
											<td><a href="#">ORD834528</a></td>
											<td>$160</td>
										</tr>
										<tr>
											<td><span class="label label-success">Completed</span></td>
											<td><a href="#">ORD834565</a></td>
											<td>$122</td>
										</tr>
										<tr>
											<td><span class="label label-success">Completed</span></td>
											<td><a href="#">ORD834512</a></td>
											<td>$760</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> -->
						<!-- END ORDER STATUS -->
					<!-- </div> -->

                    <div ng-controller="projectCtrl" ng-cloak ng-init="projects.hasProjects();">
                        
						<!-- new project modal -->
						<div class="modal fade" id="new-project-modal" tabindex="-1" role="dialog" aria-hidden="true">   
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Create Project</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form novalidate ng-submit="createProject(projects.project);" id="addProject" class="form-horizontal" role="form">
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
                                            <button type="submit" class="btn btn-primary">Save Project</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- end new project modal -->
				
                        <!-- new-project widget -->
                        <div class="row" ng-show="projects.noProjects">
                            <div class="col-md-8">
                                <div class="widget">
                                    <div class="widget-header clearfix">
                                        <h3><i class="icon ion-clock"></i> <span>PROJECT</span></h3>
                                        <div class="btn-group widget-header-toolbar">
                                            <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
                                            <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="project-list-subheading">
                                            <p id="new-project-label" class="lead">You have <span class="label label-warning">no projects</span> yet. Start by creating <span class="label label-success">a new one!</span></p>
                                            <button id="new-project-btn" type="button" data-toggle="modal" data-target="#new-project-modal" class="btn btn-primary" ><i class="icon ion-compose"></i> CREATE NEW PROJECT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end new-project widget -->
                    </div>
				
                    <div class="row">
                        <!-- <div class="col-md-8"> -->
                            <!-- MAP -->
                            <!-- <div class="widget">
                                <div class="widget-header clearfix">
                                    <h3><i class="icon ion-location"></i> <span>SALES ORIGINS</span></h3>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
                                        <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="data-visualization-map">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="map"></div>
                                                <p class="text-muted"><i class="icon ion-android-information"></i> Click the text legend to see interactivity in action.</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="areaLegend legend-right"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- END MAP -->
                        <!-- </div> -->

                        <!-- TASK PROGRESS -->
                        <div class="col-md-4" ng-controller="projectCtrl">
                            <div class="widget">
                                <div class="widget-header clearfix">
                                    <h3><i class="icon ion-android-list"></i> <span>MY PROJECTS STATUS</span></h3>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
                                        <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content" ng-cloak>
                                    <ul class="task-list list-unstyled">

                                        <p ng-if="projects.noProjects">No projects to show</p>

                                        <li class="project-animated-list" ng-repeat="project in projects.myProjects | limitTo:6">
                                            <p><a href="{{URL::to('project-detail/')}}/<% project.id %>"><% project.title | limitTo:30 %><% project.title.length > 24 ? '...' : '' %>&emsp;&emsp;&emsp;&nbsp;</a><span ng-class="{'label-danger': project.progress < 30, 'label-warning': (project.progress > 30 && project.progress < 60), 'label-success': project.progress > 60}" class="label"><% project.progress || "0" %> %</span></p>
                                            <div class="progress progress-xs">
                                                <div ng-class="{'progress-bar-danger': project.progress < 30, 'progress-bar-warning': (project.progress > 30 && project.progress < 60), 'progress-bar-success': project.progress > 60}" class="progress-bar" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:<% project.progress %>%">
                                                    <!-- <span class="sr-only">23% Complete</span> -->
                                                </div>
                                            </div>
                                        </li>
										
										
                                        <!-- <li>
                                            <p>Load &amp; Stress Test <span class="label label-success">80%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Data Duplication Check <span class="label label-success">100%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">Success</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Server Check <span class="label label-warning">45%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                    <span class="sr-only">45% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Mobile App Development <span class="label label-danger">10%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                                    <span class="sr-only">10% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Ticket <a href="#">#7465</a> <span class="label label-warning">35%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                                                    <span class="sr-only">35% Complete</span>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="widget-footer">
                                    <a href="{{ url('/my-project') }}/{!! auth()->user()->id !!}">View My Projects</a> <span ng-cloak class="badge"><% projects.myProjects.length %></span>
                                </div>
                            </div>
                            <!-- END TASK PROGRESS -->
                        </div>

                        <!-- <div class="col-md-4">
                            <div class="widget"> -->
                                <!-- Employee-of-the-month widget -->
                                <!-- <div class="widget-header clearfix">
                                    <h3><i class="icon ion-person"></i> <span>EMPLOYEE OF THE MONTH</span></h3>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Refresh" class="btn btn-link"><i class="icon ion-ios-refresh-empty"></i></a>
                                        <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
                                        <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content text-center">
                                    <img ng-src="{{ asset('/assets/upload/img/user')}}/avatar.png" class="img-circle" alt="Avatar" />
                                    <h4>Name Surname</h4>
                                    <hr class="dashed" />
                                    <ul class="list-unstyled text-muted">
                                        <li>Most on-time</li>
                                        <li>Most attitude, talkative and independent</li>
                                        <li>Most fit and healthy</li>
                                        <li>Most hard worker</li>
                                    </ul>
                                    <hr class="dashed" />
                                    <button type="button" class="btn btn-large btn-primary"><i class="icon ion-thumbsup"></i> Appreciate!</button>
                                </div> -->
                                <!-- end Employee-of-the-month widget -->
                            <!-- </div>
                        </div> -->

                        <div ng-controller="projectCtrl" ng-show="!projects.noProjects" ng-cloak>
                            <!-- last-project widget -->
							<!-- <div class="row" > -->
								<div class="col-md-4"  >
									<div class="widget">
										<div class="widget-header clearfix">
											<h3><i class="icon ion-pin"></i> <span>LAST PROJECT CREATED</span></h3>
											<div class="btn-group widget-header-toolbar">
												<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
												<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
											</div>
										</div>
										<div class="widget-content div-center-align">
                                            <div class="chart-container">
                                                <span class="chart" data-percent="<% projects.lastProject.progress %>">
                                                    <span class="percent"></span>
                                                </span>
                                            </div>
                                            <div class="chart-info">
                                                <h5>
                                                    <span class="label-default-bg">Title:</span> <a href="{{URL::to('project-detail/')}}/<% projects.lastProject.id %>"><span class="bold"><% projects.lastProject.title | limitTo:24 %><% projects.lastProject.title.length > 24 ? '...' : '' %></span></a>
                                                </h5>
                                                <br>
                                                <h5><span class="label-default-bg">Duration:</span> <span class="bold"><% projects.lastProject.duration_day %> days</span></h5>
                                            </div>
										</div>
										<div class="widget-footer">
											<a href="{{ url('/my-project') }}/{!! auth()->user()->id !!}">My Projects</a>
										</div>
									</div>
								</div>
							<!-- </div> -->
							<!-- end last-project widget -->
						</div>

						<div class="col-md-4">
							<div class="widget">
								<!-- profile-summary widget -->
								<div class="widget-header clearfix">
									<h3><i class="icon ion-person"></i> <span>MY PROFILE</span></h3>
									<div class="btn-group widget-header-toolbar">
										<a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
										<a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
									</div>
								</div>
								<div class="widget-content">
									<div class="completeness-meter">
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-info completeness-progress" data-transitiongoal="0"></div>
										</div>
										<div ng-controller="userProfileSummaryCtrl" ng-init="loadCurrentUser();" ng-show="user.name" ng-cloak>
											<p class="complete-info">Your profile is <strong id = "pbar-percentage" class="completeness-percentage">0%</strong> complete, please provide information below:</p>
											<p>First Name: <span ng-class="{'bold': user.name, 'italic-underline-bold': !user.name}"><% user.name || "empty"  %></span></p>
											<p>Last Name: <span ng-class="{'bold': user.last_name, 'italic-underline-bold': !user.last_name}"><% user.last_name  || "empty"%></span></p>
											<p>Birthdate: <span ng-class="{'bold': user.birthday_date, 'italic-underline-bold': !user.birthday_date}"><% user.birthday_date || "empty" | date:"dd/MM/yyyy" %></span></p>
											<!-- <p>Sex: <span ng-class="{'bold': user.sex, 'italic-underline-bold': !user.sex}"><% user.sex  || "empty" %></span></p> -->
											<p>Phone: <span ng-class="{'bold': user.phone_number, 'italic-underline-bold': !user.phone_number}"><% user.phone_number  || "empty" %></span></p>
											<p>Education: <span ng-class="{'bold': educationLength, 'italic-underline-bold': !educationLength}">( <% educationLength || "empty" %> )</span></p>
											<p>Experience: <span ng-class="{'bold': experienceLength, 'italic-underline-bold': !experienceLength}">( <% experienceLength || "empty" %> )</span></p>
											<p>Industry: <span ng-class="{'bold': industryLength, 'italic-underline-bold': !industryLength}">( <% industryLength || "empty" %> )</span></p>
											<!--<p class="complete-info">Your profile is <strong class="completeness-percentage">60%</strong> complete, please provide information below:</p>
											<p><a href="#" id="complete-phone-number" data-type="text" data-pk="1" data-title="Phone number">Add your phone number</a></p>
											<p>
												<a href="#" id="complete-sex" data-type="select" data-pk="1" data-value="" data-prepend="Select sex" data-title="Select sex"></a>
											</p>
											<p><a href="#" id="complete-birthdate" data-type="combodate" data-value="1984-05-23" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select date of birth">Select date of birth</a></p>
											<p><a href="#" id="complete-nickname" data-type="text" data-pk="1" data-title="Nickname" data-placeholder="your nickname">Add your nickname</a></p> -->
										</div>
									</div>
								</div>
								<div class="widget-footer">
									<a href="{{URL::to('user')}}/{{ isset(Auth::user()->id) ? Auth::user()->id:0}}">Complete your profile</a>
								</div>
								<!-- end profile-summary widget -->
							</div>
						</div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4"> -->
                            <!-- NEWS FEED WIDGET -->
                            <!-- <div class="widget widget-live-feed">
                                <div class="widget-header clearfix">
                                    <h3><i class="icon ion-paper-airplane"></i> <span>NEWS FEED</span></h3>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Refresh" class="btn btn-link"><i class="icon ion-ios-refresh-empty"></i></a>
                                        <a href="#" title="Expand/Collapse" class="btn btn-link btn-toggle-expand"><i class="icon ion-ios-arrow-up"></i></a>
                                        <a href="#" title="Remove" class="btn btn-link btn-remove"><i class="icon ion-ios-close-empty"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="media activity-item">
                                        <i class="icon ion-checkmark-circled pull-left text-success"></i>
                                        <div class="media-body">
                                            <p class="activity-title">The system is running well, no error found</p>
                                            <small class="text-muted">2m ago</small>
                                        </div>
                                    </div>
                                    <div class="media activity-item">
                                        <i class="icon ion-unlocked pull-left text-danger"></i>
                                        <div class="media-body">
                                            <p class="activity-title">You have unsecure file permission on the server. Go to <a href="">File Manager</a> to fix it</p>
                                            <small class="text-muted">6m ago</small>
                                        </div>
                                    </div>
                                    <div class="media activity-item">
                                        <i class="icon ion-person pull-left text-info"></i>
                                        <div class="media-body">
                                            <p class="activity-title">New user <a href="#">Michael</a> registered</p>
                                            <small class="text-muted">10m ago</small>
                                        </div>
                                    </div>
                                    <div class="media activity-item">
                                        <i class="icon ion-bug pull-left text-info"></i>
                                        <div class="media-body">
                                            <p class="activity-title">New <a href="">bug report</a> has been submitted</p>
                                            <small class="text-muted">15m ago</small>
                                        </div>
                                    </div>
                                    <div class="media activity-item">
                                        <i class="icon ion-printer pull-left text-warning"></i>
                                        <div class="media-body">
                                            <p class="activity-title">You have <a href="#">pending documents</a> on the printer server.</p>
                                            <small class="text-muted">23h ago</small>
                                        </div>
                                    </div>
                                    <div class="media activity-item">
                                        <i class="icon ion-close-circled pull-left text-danger"></i>
                                        <div class="media-body">
                                            <p class="activity-title">Background job <a href="#">#783458</a> has failed. See the <a href="#">logs</a></p>
                                            <small class="text-muted">Today</small>
                                        </div>
                                    </div>
                                    <div class="media activity-item">
                                        <i class="icon ion-flag pull-left text-success"></i>
                                        <div class="media-body">
                                            <p class="activity-title">Project <a href="#">Social Boost</a> has been flagged as finished</p>
                                            <small class="text-muted">Yesterday</small>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default center-block"><i class="icon ion-ios-refresh"></i> Load more</button>
                                </div>
                            </div> -->
                            <!-- END NEWS FEED WIDGET -->
                        <!-- </div>
                    </div> -->
			    </div>
			</div>
		@stop
		<!-- END COLUMN RIGHT -->

@section('footer_script')@parent
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.resize.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.time.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.orderBars.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.tooltip.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/mapael/raphael/raphael-min.js') }}></script>
	<script src={{ asset('assets/js/plugins/mapael/jquery.mapael.js') }}></script>
	<script src={{ asset('assets/js/plugins/mapael/maps/world_countries.js') }}></script>
	<script src={{ asset('assets/js/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}></script>
		<script src={{ asset('assets/js/plugins/jquery-maskedinput/jquery.masked-input.min.js') }}></script>
	<script src={{ asset('assets/js/queen-charts.js') }}></script>
	<script src={{ asset('assets/js/queen-maps.js') }}></script>
	
	<script src={{ asset('assets/js/queen-elements.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/jquery-easypiechart/jquery.easypiechart.min.js') }}></script>
@stop

@section('script')
	<script >

		$(document).ready(function() {
            $('.chart').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#94c632',
                lineWidth: 15,
                lineCap:'circle',
                trackColor: '#E8E8E8',
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent || 0));
                }
            });
		});

	</script>
@stop
