<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html ng-app="App"  lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>
		@section('title')
		Dashboard Glamore
		@show
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Glamore project">
	<meta name="author" content="Triweb">
	<!-- CSS -->
	<link href={{ asset('assets/css/bootstrap.css') }} rel="stylesheet" type="text/css">
	<link href={{ asset('assets/css/ionicons.css') }} rel="stylesheet" type="text/css">
	<link href={{ asset('assets/css/main.css') }} rel="stylesheet" type="text/css">

	<link href={{ asset('assets/angular_lib/angular-xeditable-0.1.8/css/xeditable.css') }} rel="stylesheet" type="text/css">
	<link href={{ asset('assets/angular_lib/AngularJS-Toaster/toaster.css') }} rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-select/0.16.1/select.min.css" rel="stylesheet" media="screen">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,700' rel='stylesheet' type='text/css'>
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href={{ asset('assets/ico/queenadmin-favicon144x144.png') }}>
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href={{ asset('assets/ico/queenadmin-favicon114x114.png') }}>
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href={{ asset('assets/ico/queenadmin-favicon72x72.png') }}>
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href={{ asset('assets/ico/queenadmin-favicon57x57.png') }}>
	<link rel="shortcut icon" href={{ asset('assets/ico/favicon.png') }}>
	<style>
		.spinner {
			position: relative;
			width: 50px;
			height: 50px;
			margin: 0 auto;
			padding: 40px 0; }
			.spinner p {
				margin-top: 20px; }

			</style>


			@yield('header')
		</head>

		<body class="fixed-top-active dashboard">
			<toaster-container ></toaster-container >
			<!-- WRAPPER -->
			<div class="wrapper">
				<!-- TOP NAV BAR -->
				<nav class="top-bar navbar-fixed-top" role="navigation">
					<div class="logo-area">
						<a href="#" id="btn-nav-sidebar-minified" class="btn btn-link btn-nav-sidebar-minified pull-left"><i class="icon ion-arrow-swap"></i></a>
						<a class="btn btn-link btn-off-canvas pull-left"><i class="icon ion-navicon"></i></a>
						<div class="logo pull-left">
							<a href="{{URL::to('home')}}">
								<img src={{ asset('assets/img/logos_glamore_big.png') }} alt="Glamore Logo" />
							</a>
						</div>
					</div>
					<form class="form-inline searchbox hidden-xs" role="form">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="icon ion-ios-search"></i></span>
								<input type="search" class="form-control" placeholder="search the site ...">
							</div>
						</div>
					</form>
					<div class="top-bar-right pull-right">
						<div class="action-group hidden-xs hidden-sm">
							<ul>

								<!-- notification: general -->
								<li class="action-item general">
									<div class="btn-group">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon ion-ios-bell-outline"></i><span class="count">8</span>
										</a>
										<ul class="dropdown-menu" role="menu">
											<li class="menu-item-header">You have 8 notifications</li>
											<li>
												<a href="#">
													<i class="icon ion-chatbubble text-success"></i>
													<span class="text">New comment on the blog post</span>
													<span class="timestamp text-muted">1 minute ago</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-person-add text-success"></i>
													<span class="text">New registered user</span>
													<span class="timestamp text-muted">12 minutes ago</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-chatbubble text-success"></i>
													<span class="text">New comment on the blog post</span>
													<span class="timestamp text-muted">18 minutes ago</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-ios-cart text-danger"></i>
													<span class="text">4 new sales order</span>
													<span class="timestamp text-muted">4 hours ago</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-edit yellow-font"></i>
													<span class="text">3 product reviews awaiting moderation</span>
													<span class="timestamp text-muted">1 day ago</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-chatbubble text-success"></i>
													<span class="text">New comment on the blog post</span>
													<span class="timestamp text-muted">3 days ago</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-chatbubble text-success"></i>
													<span class="text">New comment on the blog post</span>
													<span class="timestamp text-muted">Oct 15</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon ion-alert-circled text-danger"></i>
													<span class="text text-danger">Low disk space!</span>
													<span class="timestamp text-muted">Oct 11</span>
												</a>
											</li>
											<li class="menu-item-footer">
												<a href="#">View All Notifications</a>
											</li>
										</ul>
									</div>
								</li>
								<!-- end notification: general -->
							</ul>
						</div>
						<div ng-controller="userCtrl" ng-init='currentUser()' ng-show="users.user.name" class="logged-user">

							<div class="btn-group">
								<a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
									<!-- <img src={{ asset('assets/img/user-loggedin.png') }} alt="Sebastian" /><span class="name">{{ isset(Auth::user()->name) ? Auth::user()->name:'Not logged'}} <i class="icon ion-ios-arrow-down"></i></span> -->
									<img style="height:32px;" src="{{ asset('/assets/upload/img/user')}}/<% users.user.profile_image || 'avatar.png' %>" alt="Sebastian" /><span class="name"><% users.user.name || 'Not logged' %> <i class="icon ion-ios-arrow-down"></i></span>

								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{URL::to('user')}}/{{ isset(Auth::user()->id) ? Auth::user()->id:0}}">
											<i class="icon ion-ios-person"></i>
											<span class="text">Profile</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-ios-gear"></i>
											<span class="text">Settings</span>
										</a>
									</li>
									<li>
										<a href="{{ url('/logout') }}">
											<i class="icon ion-power"></i>
											<span >Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="action-group visible-lg-inline-block">
							<ul>
								<li class="action-item chat">
									<a href="#" id="toggle-right-sidebar" class="toggle-right-sidebar"><i class="icon ion-ios-chatboxes-outline"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- END TOP NAV BAR -->
				<!-- COLUMN LEFT -->
				<div id="col-left" class="col-left">
					<div class="main-nav-wrapper">
						<nav id="main-nav" class="main-nav">
							<h3>MAIN</h3>
							<ul class="main-menu">
								<li class="has-submenu active">
									<a href="#" class="submenu-toggle"><i class="icon ion-ios-speedometer-outline"></i><span class="text">Dashboards</span></a>
									<ul class="list-unstyled sub-menu collapse in">
										<li class="active"><a href="{{URL::to('home')}}"><span class="text">Dashboard</span></a></li>
										<li><a href="#"><span class="text">Next meetings</span></a></li>
										<li><a href="#"><span class="text">Task to do</span></a></li>
										<li><a href="#"><span class="text">Card of the last project</span></a></li>
										<li><a href="#"><span class="text">Chart of earnings</span></a></li>
									</ul>
								</li>
								<li class="has-submenu">
									<a href="#" class="submenu-toggle"><i class="icon ion-ios-paper-outline"></i><span class="text">Projects</span></a>
									<ul class="list-unstyled sub-menu collapse">
										<li><a href="{{ url('/my-project') }}/{!! auth()->user()->id !!}"><span class="text">Post a project</span></a></li>
										<li><a href="#"><span class="text">Activities (task/meeting/call)</span></a></li>
										<li><a href="#"><span class="text">Documents and note</span></a></li>
										<li><a href="#"><span class="text">Videoconference</span></a></li>
									</ul>
								</li>



								<li class="has-submenu">
									<a href="#" class="submenu-toggle"><i class="icon ion-person"></i><span class="text">Affiliates</span></a>
									<ul class="list-unstyled sub-menu collapse">
										<li><a href="#"><span class="text">BIO Affiliate</span></a></li>
										<li><a href="{{ url('/search-for-affiliate') }}"><span class="text">Search for Affiliate</span></a></li>
										<li><a href="#"><span class="text">Activities diary</span></a></li>
										<li><a href="#"><span class="text">Search and join projects</span></a></li>
									</ul>
								</li>

								<li class="has-submenu">
									<a href="#" class="submenu-toggle"><i class="icon ion-stats-bars"></i><span class="text">Reports</span></a>
									<ul class="list-unstyled sub-menu collapse">
										<li><a href="#"><span class="text">payments received</span></a></li>
										<li><a href="#"><span class="text">summary of earnings</span></a></li>
										<li><a href="#"><span class="text">details of tax</span></a></li>
										<li><a href="#"><span class="text">invoice and remittance</span></a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>



				<!-- END COLUMN LEFT -->


				<!-- COLUMN RIGHT -->


				<!-- Content -->
				@yield('content')



				<!-- END COLUMN RIGHT -->
			</div>
			@yield('footer')

			<!-- END WRAPPER -->
			<!-- Javascript -->

			@section('footer_script')
			<script src={{ asset('assets/js/jquery/jquery-2.1.0.min.js') }}></script>
			<script src={{ asset('assets/js/bootstrap/bootstrap.js') }}></script>
			<script src={{ asset('assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}></script>
			<script src={{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}></script>



			<script src={{ asset("assets/angular_lib/angular/angular.min.js") }}></script>

			<script src={{ asset('assets/angular_lib/angular-xeditable-0.1.8/js/xeditable.min.js') }}></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-select/0.16.1/select.min.js"></script>
			<script src={{ asset("assets/angular_lib/angular-resource/angular-resource.min.js") }}></script>
			<script src={{ asset("assets/angular_lib/angular-animate/angular-animate.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/ngInfiniteScroll/build/ng-infinite-scroll.min.js") }}></script>
			<script src={{ asset("assets/angular_lib/spin.js/spin.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/angular-spinner/angular-spinner.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/angular-auto-validate/dist/jcs-auto-validate.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/ladda/dist/ladda.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/angular-ladda/dist/angular-ladda.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/angular-strap/dist/angular-strap.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/angular-strap/dist/angular-strap.tpl.min.js" ) }}></script>
			<script src={{ asset("assets/angular_lib/angularjs-toaster/toaster.min.js" ) }}></script>

			<script src={{ asset('assets/js/queen-common.js') }}></script>

			<script src={{ asset('assets/js/plugins/moment/moment.min.js') }}></script>







			
			<script>
				window.current_user_id = {!! auth()->user()->id !!};

				var app = angular.module('App', [
					'xeditable',
					'ngResource',
					'infinite-scroll',
					'angularSpinner',
					'jcs-autoValidate',
					'angular-ladda',
					'mgcrea.ngStrap',
					'toaster',
					'ngAnimate',
					'ui.select'
					]);

				app.run(function(editableOptions) {
		  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
		});

				app.config(function ($httpProvider, laddaProvider, $datepickerProvider, $interpolateProvider) {
			//$httpProvider.defaults.headers.common['Authorization'] = 'Token 20002cd74d5ce124ae219e739e18956614aab490';
			//$resourceProvider.defaults.stripTrailingSlashes = false;
			// $http.defaults.transformRequest.push(function (data) {
			//             data.csrfToken = $browser.cookies().csrfToken;
			//             return angular.toJson(data);
			//         });
				laddaProvider.setOption({
					style: 'expand-right'
				});
				angular.extend($datepickerProvider.defaults, {
					dateFormat: 'd/M/yyyy',
					autoclose: true
				});
				$interpolateProvider.startSymbol('<%');
				$interpolateProvider.endSymbol('%>');
			});

				app.factory("Industry", function ($resource) {
					return $resource("http://localhost:8000/industries/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});
				app.factory("User", function ($resource) {
					return $resource("http://localhost:8000/users/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});
				app.factory("Experience", function ($resource) {
					return $resource("http://localhost:8000/experiences/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});

				app.factory("Project", function ($resource) {
					return $resource("http://localhost:8000/projects/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});


				app.factory("Education", function ($resource) {
					return $resource("http://localhost:8000/educations/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});




				app.service('ProjectService', function (  Project, $q, toaster, $resource) {



					var self = {
						'addProject': function (project) {
							this.projects.push(project);
						},
						'isLoading': false,
						'isSaving': false,
						'projects': [],
						'project': null,
						'active':0,
						'pending':0,
						'closed':0,


						'loadProject': function () {
							if (!self.isLoading) {
								self.isLoading = true;

								self.projects = Project.query();
								self.projects.$promise.then(function (result) {


															//check if date is an object 
															angular.forEach(result, function (value, key) {
																// console.log(value +" "+ key);
																//console.log(value.company_name);
																value.date_end=new   Date(value.date_end);
																value.date_start=new   Date(value.date_start);
																if(value.status=='ACTIVE'){
																	self.active+=1;
																}else if(value.status=='PENDING'){
																	self.pending+=1;
																}else{
																	self.closed+=1;
																}
															});

															self.projects=result;
															self.isLoading = false;

														});
							}

						},
						'updateProject': function (project) {

							self.isSaving = true;
							Project.update({ id:project.id }, project).$promise.then(function() {
								self.isSaving = false;
								toaster.pop('success', 'Project ' + project.project + ' Updated');
							},function(error) {
								toaster.pop('error', 'Plaese check your connection');
							});
						},
						'deleteProject': function (project) {


							$.confirm({
								text: "Are you sure you want to delete that project?",
								title: "Confirmation required",
								confirmButton: "Yes I am",
								cancelButton: "No",
								post: false,
								confirmButtonClass: "btn-danger",
								cancelButtonClass: "btn-default",
								dialogClass: "modal-dialog modal-lg",
								confirm: function() {
									self.isDeleting = true;
									Project.remove({ id:project.id }).$promise.then(function () {
										toaster.pop('success', 'Project Deleted');
										var index = self.projects.indexOf(project);
										self.projects.splice(index, 1);
										self.isDeleting = false;
									});
								},
								cancel: function() {
													        // nothing to do
													    }
													});


						},
						getProgress:function(){

							return "0";
						},
						getEndDate:function(date, amount){


							return moment(date).add(amount, 'day').format('YYYY-MM-DD');
						},

						'createProject': function (project) {
															//console.log(project);
															$('#close_project').click();
															var d = $q.defer();
															self.isSaving = true;
															project.user_id=current_user_id;
															project.date_start=moment().format('YYYY-MM-DD');
															project.status='ACTIVE';
															project.priority='LOW';
															project.date_end=self.getEndDate(project.date_start, project.duration_day),

															Project.save(project).$promise.then(function () {
																
																toaster.pop('success', 'Created ' + project.school);
																self.projects = [];
																self.loadProject();

																self.project= null;
																d.resolve();
																self.isSaving = false;
															},function(error) {
																toaster.pop('error', 'Plaese check your connection '+ error.status);
																console.log(error);
															});
															return d.promise;
														}


													};
													self.loadProject();
													return self;

												});


app.controller('projectCtrl', function($scope, ProjectService, $filter, $timeout, toaster) {
	$scope.projects = ProjectService;


	$scope.updateProject= function(project){
		ProjectService.updateProject(project);

	},

	$scope.showForm= function(){
		$( "#addProject" ).removeClass("hide");
		$( "#addProject" ).addClass("show");

	},


	$scope.createProject= function(project){

		ProjectService.createProject(project);

	}


	$scope.deleteProject= function(project){

		ProjectService.deleteProject(project);

	}


});


								app.service('ExperienceService', function (  Experience, $q, toaster, $resource) {



									var self = {
										'addExperience': function (experience) {
											this.experiences.push(experience);
										},
										'isLoading': false,
										'isSaving': false,
										'experiences': [],
										'experience': null,

										'loadExperience': function () {
											if (!self.isLoading) {
												self.isLoading = true;

												self.experiences = Experience.query();
												self.experiences.$promise.then(function (result) {


											//check if date is an object 
											angular.forEach(result, function (value, key) {
												// console.log(value +" "+ key);
												//console.log(value.company_name);
												if(value.currently_work_here==0){
													value.currently_work_here=false;
												}else{
													value.currently_work_here=true;
												}
												if(value.date_end !=""){
													value.date_end=new   Date(value.date_end);
												}

												if(value.date_start !=""){
													value.date_start=new   Date(value.date_start);
												}


											});



											self.experiences=result;
											self.isLoading = false;


										});
											}

										},
										'updateExperience': function (experience) {

											self.isSaving = true;
											Experience.update({ id:experience.id }, experience).$promise.then(function() {
												self.isSaving = false;
												toaster.pop('success', 'Experience ' + experience.experience + ' Updated');
											},function(error) {
												toaster.pop('error', 'Plaese check your connection');
											});
										},
										'deleteExperience': function (experience) {
											

											$.confirm({
												text: "Are you sure you want to delete that experience?",
												title: "Confirmation required",
												confirmButton: "Yes I am",
												cancelButton: "No",
												post: false,
												confirmButtonClass: "btn-danger",
												cancelButtonClass: "btn-default",
												dialogClass: "modal-dialog modal-lg",
												confirm: function() {
													self.isDeleting = true;
													Experience.remove({ id:experience.id }).$promise.then(function () {
														toaster.pop('success', 'Experience Deleted');
														var index = self.experiences.indexOf(experience);
														self.experiences.splice(index, 1);
														self.isDeleting = false;
													});
												},
												cancel: function() {
									        // nothing to do
									    }
									});


										},
										'createExperience': function (experience) {
											//console.log(experience);
											var d = $q.defer();
											self.isSaving = true;
											experience.user_id=current_user_id;

											experience.date_start= moment(experience.date_start).format('YYYY-MM-DD');
											experience.date_end= moment(experience.date_end).format('YYYY-MM-DD');

											

											Experience.save(experience).$promise.then(function () {
												toaster.pop('success', 'Created ' + experience.school);
												self.experiences = [];
												self.loadExperience();

												self.experience= null;
												$( "#addExperience" ).removeClass("show");
												$( "#addExperience" ).addClass("hide");
												d.resolve();
												self.isSaving = false;
											});
											return d.promise;
										}


									};
									self.loadExperience();
									return self;

								});


app.controller('experienceCtrl', function($scope, ExperienceService, $filter, $timeout, toaster) {
	$scope.experiences = ExperienceService;

	$scope.updateExperience= function(experience){
		ExperienceService.updateExperience(experience);

	},

	$scope.showForm= function(){
		$( "#addExperience" ).removeClass("hide");
		$( "#addExperience" ).addClass("show");

	},


	$scope.createExperience= function(experience){
						//console.log(experience);
						ExperienceService.createExperience(experience);
						
					}


					$scope.deleteExperience= function(experience){
						
						ExperienceService.deleteExperience(experience);
						
					}

					
				});







app.service('EducationService', function (  Education, $q, toaster, $resource) {



	var self = {
		'addEducation': function (education) {
			this.educations.push(education);
		},
		'isLoading': false,
		'isSaving': false,
		'educations': [],
		'education': null,

		'loadEducation': function () {
			if (!self.isLoading) {
				self.isLoading = true;

				self.educations = Education.query();
				self.educations.$promise.then(function (result) {


							//check if date is an object 
							angular.forEach(result, function (value, key) {
								// console.log(value +" "+ key);
								// console.log(value.school);

								if(value.date_end !=""){
									value.date_end=new   Date(value.date_end);
								}

								if(value.date_start !=""){
									value.date_start=new   Date(value.date_start);
								}
							});



							self.educations=result;
							self.isLoading = false;


						});
			}

		},
		'updateEducation': function (education) {

			self.isSaving = true;
			Education.update({ id:education.id }, education).$promise.then(function() {
				self.isSaving = false;
				toaster.pop('success', 'Education ' + education.education + ' Updated');
			},function(error) {
				toaster.pop('error', 'Plaese check your connection');
			});
		},
		'deleteEducation': function (education) {


			$.confirm({
				text: "Are you sure you want to delete that education?",
				title: "Confirmation required",
				confirmButton: "Yes I am",
				cancelButton: "No",
				post: false,
				confirmButtonClass: "btn-danger",
				cancelButtonClass: "btn-default",
				dialogClass: "modal-dialog modal-lg",
				confirm: function() {
					self.isDeleting = true;
					Education.remove({ id:education.id }).$promise.then(function () {
						toaster.pop('success', 'Education Deleted');
						var index = self.educations.indexOf(education);
						self.educations.splice(index, 1);
						self.isDeleting = false;
					});
				},
				cancel: function() {
					        // nothing to do
					    }
					});


		},

		'createEducation': function (education) {

							//console.log(education);
							var d = $q.defer();
							self.isSaving = true;
							education.user_id=current_user_id;


							education.date_start=   moment(education.date_start).format('YYYY-MM-DD');
							education.date_end= moment(education.date_end).format('YYYY-MM-DD');


							Education.save(education).$promise.then(function () {
								toaster.pop('success', 'Created ' + education.school);
								self.educations = [];
								self.loadEducation();

								self.education= null;
								$( "#addEducation" ).removeClass("show");
								$( "#addEducation" ).addClass("hide");
								d.resolve();
								self.isSaving = false;
							});
							return d.promise;
						}


					};
					self.loadEducation();
					return self;

				});


app.controller('educationCtrl', function($scope, EducationService, $filter, $timeout, toaster) {
	$scope.educations = EducationService;

	$scope.updateEducation= function(education){
		EducationService.updateEducation(education);
		
	},

	$scope.showForm= function(){
		$( "#addEducation" ).removeClass("hide");
		$( "#addEducation" ).addClass("show");
		
	},


	$scope.createEducation= function(education){
		//console.log(education);
		EducationService.createEducation(education);
		
	}


	$scope.deleteEducation= function(education){
		//console.log(education);
		EducationService.deleteEducation(education);
		
	}

	
});


app.service('IndustryService', function (  Industry, $q, toaster, $resource) {



	var self = {
		'addIndustry': function (industry) {
			this.industries.push(industry);
		},
		'isLoading': false,
		'isSaving': false,
		'industries': [],
		'industry': null,
		 //'countries':["Bangladesh", "Belgium", "Burkina Faso",  "Bulgaria", "Bosnia and Herzegovina",  "Barbados", "Wallis and Futuna", "Saint Bartelemey", "Bermuda", "Brunei Darussalam", "Bolivia",  "Bahrain",  "Burundi", "Benin",  "Bhutan",  "Jamaica",  "Bouvet Island",  "Botswana", "Samoa", "Brazil",  "Bahamas",  "Jersey",  "Belarus",  "Other Country", "Latvia", "Rwanda", "Serbia", "Timor-Leste", "Reunion", "Luxembourg", "Tajikistan",  "Romania", "Papua New Guinea", "Guinea-Bissau",  "Guam",  "Guatemala", "South Georgia and the South Sandwich Islands", "Greece", "Equatorial Guinea", "Guadeloupe",  "Japan",  "Guyana", "Guernsey", "French Guiana", "Georgia", "Grenada", "United Kingdom", "Gabon", "El Salvador",  "Guinea", "Gambia", "Greenland", "Gibraltar", "Ghana", "Oman", "Tunisia", "Jordan", "Croatia", "Haiti", "Hungary", "Hong Kong", "Honduras", "Heard Island and McDonald Islands", "Venezuela",  "Puerto Rico",  "Palestinian Territory",  "Palau",  "Portugal",  "Svalbard and Jan Mayen",  "Paraguay",  "Iraq",  "Panama",  "French Polynesia",  "Belize",  "Peru",  "Pakistan",  "Philippines",  "Pitcairn",  "Turkmenistan",  "Poland",  "Saint Pierre and Miquelon",  "Zambia",  "Western Sahara",  "Russian Federation",  "Estonia",  "Egypt",  "Tokelau",  "South Africa",  "Ecuador",  "Italy",  "Vietnam",  "Solomon Islands",  "Europe",  "Ethiopia",  "Somalia",  "Zimbabwe",  "Saudi Arabia",  "Spain",  "Eritrea",  "Montenegro",  "Moldova, Republic of",  "Madagascar",  "Saint Martin",  "Morocco",  "Monaco",  "Uzbekistan",  "Myanmar",  "Mali",  "Macao",  "Mongolia",  "Marshall Islands",  "Macedonia",  "Mauritius",  "Malta",  "Malawi",  "Maldives",  "Martinique",  "Northern Mariana Islands",  "Montserrat",  "Mauritania",  "Isle of Man",  "Uganda",  "Tanzania, United Republic of",  "Malaysia",  "Mexico",  "Israel",  "France",  "British Indian Ocean Territory",  "France, Metropolitan",  "Saint Helena",  "Finland",  "Fiji",  "Falkland Islands (Malvinas)",  "Micronesia, Federated States of",  "Faroe Islands",  "Nicaragua",  "Netherlands",  "Norway",  "Namibia",  "Vanuatu",  "New Caledonia",  "Niger",  "Norfolk Island",  "Nigeria",  "New Zealand",  "Nepal",  "Nauru",  "Niue",  "Cook Islands",  "Cote d'Ivoire",  "Switzerland",  "Colombia",  "China",  "Cameroon",  "Chile",  "Cocos (Keeling) Islands",  "Canada",  "Congo",  "Central African Republic",  "Congo, The Democratic Republic of the",  "Czech Republic",  "Cyprus",  "Christmas Island",  "Costa Rica",  "Cape Verde",  "Cuba",  "Swaziland",  "Syrian Arab Republic",  "Kyrgyzstan",  "Kenya",  "Suriname",  "Kiribati",  "Cambodia",  "Saint Kitts and Nevis",  "Comoros",  "Sao Tome and Principe",  "Slovakia",  "Korea, Republic of",  "Slovenia",  "Korea, Democratic People's Republic of",  "Kuwait",  "Senegal",  "San Marino",  "Sierra Leone",  "Seychelles",  "Kazakhstan",  "Cayman Islands",  "Singapore",  "Sweden",  "Sudan",  "Dominican Republic",  "Dominica",  "Djibouti",  "Denmark",  "Virgin Islands, British",  "Germany",  "Yemen",  "Algeria",  "United States",  "Uruguay",  "Mayotte",  "United States Minor Outlying Islands",  "Lebanon",  "Saint Lucia",  "Lao People's Democratic Republic",  "Tuvalu",  "Taiwan",  "Trinidad and Tobago",  "Turkey",  "Sri Lanka",  "Liechtenstein",  "Anonymous Proxy",  "Tonga",  "Lithuania",  "Satellite Provider",  "Liberia",  "Lesotho",  "Thailand",  "French Southern Territories",  "Togo",  "Chad",  "Turks and Caicos Islands",  "Libyan Arab Jamahiriya",  "Holy See (Vatican City State)",  "Saint Vincent and the Grenadines",  "United Arab Emirates",  "Andorra",  "Antigua and Barbuda",  "Afghanistan",  "Anguilla",  "Virgin Islands, U.S.",  "Iceland",  "Iran, Islamic Republic of",  "Armenia",  "Albania",  "Angola",  "Netherlands Antilles",  "Antarctica",  "Asia/Pacific Region",  "American Samoa",  "Argentina",  "Australia",  "Austria",  "Aruba",  "India",  "Aland Islands",  "Azerbaijan",  "Ireland",  "Indonesia",  "Ukraine",  "Qatar",  "Mozambique"],

		 'loadIndustries': function () {
		 	if (!self.isLoading) {
		 		self.isLoading = true;

		 		self.industries = Industry.query();
		 		self.industries.$promise.then(function (result) {
		 			self.industries=result;
		 			self.isLoading = false;

		 		});
		 	}

		 },
		 'updateIndustry': function (industry) {

		 	self.isSaving = true;
		 	Industry.update({ id:industry.id }, industry).$promise.then(function() {
		 		self.isSaving = false;
		 		toaster.pop('success', 'Industry ' + industry.industry + ' Updated');
		 	},function(error) {
		 		toaster.pop('error', 'Plaese check your connection');
		 	});
		 },
		 'deleteIndustry': function (industry) {

		 	$.confirm({
		 		text: "Are you sure you want to delete that industry?",
		 		title: "Confirmation required",
		 		confirmButton: "Yes I am",
		 		cancelButton: "No",
		 		post: false,
		 		confirmButtonClass: "btn-danger",
		 		cancelButtonClass: "btn-default",
		 		dialogClass: "modal-dialog modal-lg",
		 		confirm: function() {
		 			self.isDeleting = true;
		 			Industry.remove({ id:industry.id }).$promise.then(function () {
		 				self.isDeleting = false;
		 				var index = self.industries.indexOf(industry);
		 				self.industries.splice(index, 1);
		 				toaster.pop('success', 'Industry Deleted');
		 			});
		 		},
		 		cancel: function() {
							        // nothing to do
							    }
							});




		 },
		 'createIndustry': function (industry) {
		 	var d = $q.defer();
		 	self.isSaving = true;
		 	industry.user_id=current_user_id;
		 	industry.postal_code="";


		 	Industry.save(industry).$promise.then(function () {
		 		self.isSaving = false;
		 		self.industries = [];
		 		self.loadIndustries();
		 		toaster.pop('success', 'Created ' + industry.industry);
		 		self.industry= null;
		 		$( "#addIndustry" ).removeClass("show");
		 		$( "#addIndustry" ).addClass("hide");
		 		d.resolve();
		 	});
		 	return d.promise;
		 }


		};
		self.loadIndustries();
		return self;

	});


app.controller('industryCtrl', function($scope, IndustryService, $filter, $timeout, toaster) {
	$scope.industries = IndustryService;

	$scope.updateIndustry= function(industry){
		IndustryService.updateIndustry(industry);
		
	},

	$scope.showForm= function(){
		$( "#addIndustry" ).removeClass("hide");
		$( "#addIndustry" ).addClass("show");
		
	},


	$scope.createIndustry= function(industry){
		//console.log(industry);
		IndustryService.createIndustry(industry);
		
	}


	$scope.deleteIndustry= function(industry){
		//console.log(industry);
		IndustryService.deleteIndustry(industry);
		
	}

	
});




app.controller('userCtrl', function($scope, UserService, $filter, $timeout, toaster) {
	$scope.users = UserService;



	$timeout(function() {
		$scope.showMaritalStatus = function() {
			var selected = $filter('filter')($scope.users.marital_status, {value: $scope.users.user.marital_status});
			return ($scope.users.user.marital_status && selected.length) ? selected[0].text : 'Choose...';
		};
	}, 1000);

	$scope.currentUser = function() {
		UserService.loadCurrentUser(current_user_id);
	},

	$scope.updateUser= function(user){
		UserService.updateUser(user);
		//console.log($scope.users);
	},

	$scope.uploadProfileImages= function(user){
		UserService.uploadProfileImages();
	}
});




app.service('UserService', function ( User, $q, toaster, $resource) {



	var self = {
		'addUser': function (user) {
			this.users.push(user);
		},
		'page': 1,
		'hasMore': true,
		'isLoading': false,
		'isSaving': false,
		'selectedUser': null,
		'users': [],
		'user': null,
		'search': null,


		'marital_status': [
		{value: '', text: 'Choose...'},
		{value: 'Married', text: 'Married'},
		{value: 'Single', text: 'Single'}
		],


				// 'doSearch': function (search) {
				// 	self.hasMore = true;
				// 	self.page = 1;
				// 	self.persons = [];
				// 	self.search = search;
				// 	self.loadContacts();
				// },
				// 'doOrder': function (order) {
				// 	self.hasMore = true;
				// 	self.page = 1;
				// 	self.persons = [];
				// 	self.ordering = order;
				// 	self.loadContacts();
				// },
				'loadCurrentUser':function(userId){
					var curUser = $resource('http://localhost:8000/users/:id/', { id: userId});
					//console.log(curUser.get());
					//this.user=curUser.get();

					temp=curUser.get(function (data){

						
						data.birthday_date=new Date(data.birthday_date);
						

						self.user= data;
					});
					

				},

				'loadUsers': function () {
					if (self.hasMore && !self.isLoading) {
						self.isLoading = true;

						// var params = {
						// 	'page': self.page,
						// 	'search': self.search,
						// 	'ordering': self.ordering
						// };
						//Contact.get(params, function (data) {
							User.get( function (data) {
								//console.log(data);
								angular.forEach(data.results, function (user) {
									self.users.push(new User(user));
								});

							// if (!data.next) {
							// 	self.hasMore = false;
							// }
							self.isLoading = false;
						});
						}

					},

					'uploadProfileImages': function(){
		//$scope.user=UserService.uploadProfileImages();
		//save uploaded image
		var handleFileSelect = function(evt) {


			var files = evt.target.files;
			var file = files[0];
			var imageName= file.name;


			//if( file.size > 5000000){
			 	//alert("File maggiore di 5 mb");


			 	if (files && file) {

			 		var reader = new FileReader();

			 		reader.onload = function(readerEvt) {
			 			var binaryString = readerEvt.target.result;
			 			var binary = btoa(binaryString);
		 	           //console.log(binary);
		 	                 //var user=UserService.loadCurrentUser(current_user_id);

		 	                 if(evt.target.id=='profile_image'){
		 	                 	self.user.profile_image=imageName;
		 	                 	self.user.upload=binary;
		 	                 }else{
		 	                 	
		 	                 	self.user.background_image=imageName;
		 	                 	self.user.upload=binary;
		 	                 }

		 	                 self.updateUser(self.user);
		 	                 setTimeout(function(){  self.loadCurrentUser(self.user.id); }, 500);

		 	             };

		 	             reader.readAsBinaryString(file);
		 	         }
		 	//}
		 };

		 if (window.File && window.FileReader && window.FileList && window.Blob) {
		 	document.getElementById('profile_image').addEventListener('change', handleFileSelect, false);
		 	document.getElementById('background_image').addEventListener('change', handleFileSelect, false);
		 } else {
		 	alert('The File APIs are not fully supported in this browser.');
		 }
		},
				// 'loadMore': function () {
				// 	if (self.hasMore && !self.isLoading) {
				// 		self.page += 1;
				// 		self.loadContacts();
				// 	}
				// },
				'updateUser': function (user) {

					self.isSaving = true;
					User.update({ id:user.id }, user).$promise.then(function() {
						self.isSaving = false;
						toaster.pop('success', 'User ' + user.name + ' Updated');
					},function(error) {
						toaster.pop('error', 'Plaese check your connection');
					});
				},
				'removeUser': function (user) {
					self.isDeleting = true;
					user.$remove().then(function () {
						self.isDeleting = false;
						var index = self.users.indexOf(user);
						self.users.splice(index, 1);
						self.selecteduser = null;
						toaster.pop('success', 'Deleted ' + user.name);
					});
				},
				'createUser': function (user) {
					var d = $q.defer();
					self.isSaving = true;
					User.save(user).$promise.then(function () {
						self.isSaving = false;
						self.selecteduser = null;
						self.hasMore = true;
						self.page = 1;
						self.users = [];
						self.loadUsers();
						toaster.pop('success', 'Created ' + user.name);
						d.resolve()
					});
					return d.promise;
				}


			};
			return self;

		});



</script>
@show

@yield('script')



</body>

</html>
