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

				app.factory("Todo", function ($resource) {
					return $resource("http://localhost:8000/todos/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});

				app.factory("Notification", function ($resource) {
					return $resource("http://localhost:8000/notifications/:id/", {id: '@id'}, {
						update: {
							method: 'PUT'
						}
					});
				});


				app.service('NotificationService', function ( $timeout, ProjectService, Notification, $q, toaster, $resource) {



					var self = {
						'addNotification': function (notification) {
							this.notifications.push(notification);
						},
						'isLoading': false,
						'isSaving': false,
						'notifications': [],
						'notification': null,

											'loadMyNotifications':function(user_id){

												var notifications = $resource('http://localhost:8000/notification/user/:u_id/', { u_id: user_id});

												if (!self.isLoading) {
													self.isLoading = true;
													self.notifications = notifications.query();
													self.notifications.$promise.then(function (result) {
														self.notifications=result;
														self.isLoading = false;
													},function(error) {
														toaster.pop('error', 'Plaese check your connection '+ error.status);
														console.log(error);
													});
												}

											},

											'loadNotification': function () {
												if (!self.isLoading) {
													self.isLoading = true;

													self.notifications = Notification.query();
													self.notifications.$promise.then(function (result) {


															//check if date is an object 
															// angular.forEach(result, function (value, key) {
															// 	// console.log(value +" "+ key);
															// 	// console.log(value.school);

															// 	if(value.date_end !=""){
															// 		value.date_end=new   Date(value.date_end);
															// 	}

															// 	if(value.date_start !=""){
															// 		value.date_start=new   Date(value.date_start);
															// 	}
															// });



													self.notifications=result;
													self.isLoading = false;


												});
												}

											},
											'updateNotification': function (notification) {

												self.isSaving = true;

											Notification.update({ id:notification.id }, notification).$promise.then(function() {
												self.isSaving = false;
												toaster.pop('success', 'Notification ' + notification.title + ' Updated');
											},function(error) {
												toaster.pop('error', 'Plaese check your connection');
											});
										},
										'deleteNotification': function (notification) {


											$.confirm({
												text: "Are you sure you want to delete that notification?",
												title: "Confirmation required",
												confirmButton: "Yes I am",
												cancelButton: "No",
												post: false,
												confirmButtonClass: "btn-danger",
												cancelButtonClass: "btn-default",
												dialogClass: "modal-dialog modal-lg",
												confirm: function() {
													self.isDeleting = true;
													Notification.remove({ id:notification.id }).$promise.then(function () {
														toaster.pop('success', 'Notification Deleted');
														var index = self.notifications.indexOf(notification);
														self.notifications.splice(index, 1);
														self.isDeleting = false;
													});
												},
												cancel: function() {
													        // nothing to do
													    }
													});


										},

										'createNotification': function (notification) {
											$('#close_notification_dialog').click();
															//console.log(notification);
															var d = $q.defer();
															self.isSaving = true;
															notification.user_id=current_user_id;
															//notification.date_start=   moment(notification.date_start).format('YYYY-MM-DD');
															//notification.date_end= moment(notification.date_end).format('YYYY-MM-DD');


															Notification.save(notification).$promise.then(function () {
																toaster.pop('success', 'Created ' + notification.school);
																self.notifications = [];
																//self.loadNotification();
																self.loadMyNotificationsOfCurrentProject(user_id, project_id);

																self.notification= null;
																d.resolve();

																self.isSaving = false;
															},function(error) {
																toaster.pop('error', 'Plaese check your connection '+ error.status);
																console.log(error);
															});
															return d.promise;
														}


													};
													//self.loadNotification();
													return self;

												});


app.controller('notificationCtrl', function($scope, NotificationService, $filter, $timeout, toaster) {
	$scope.notifications = NotificationService;

	$scope.updateNotification= function(notification){
		NotificationService.updateNotification(notification);
	},


	$scope.createNotification= function(notification){
										//console.log(notification);
										NotificationService.createNotification(notification);
										
									},


									$scope.deleteNotification= function(notification){
										//console.log(notification);
										NotificationService.deleteNotification(notification);
										
									}

									
								});


				app.service('TodoService', function ( $timeout, ProjectService, Todo, $q, toaster, $resource) {



					var self = {
						'addTodo': function (todo) {
							this.todos.push(todo);
						},
						'isLoading': false,
						'isSaving': false,
						'todos': [],
						'todo': null,
						'progress':0,
						'getProgress':function(){
							//if(self.isLoading == false){
								var allTodo=self.todos.length;
								if(allTodo>0){
									var checked=0;
									angular.forEach(self.todos, function (value, key) {
										// console.log(value +" "+ key);
										//console.log(value.company_name);
										if(value.done==1){
											checked+=1;
										}
									});
									
									self.progress=parseInt((checked/allTodo) *100);
									ProjectService.updateProgress(self.progress);
								}else{
									self.progress=0;
									ProjectService.updateProgress(self.progress);
								}
								

							},
							'loadMyTodosOfCurrentProject':function(user_id, project_id){

								var todos = $resource('http://localhost:8000/todo/project/:u_id/:p_id/', { u_id: user_id,p_id:project_id});


								if (!self.isLoading) {
									self.isLoading = true;
									self.todos = todos.query();
									self.todos.$promise.then(function (result) {
										self.todos=result;
										self.getProgress();
										self.isLoading = false;
									},function(error) {
										toaster.pop('error', 'Plaese check your connection '+ error.status);
										console.log(error);
									});
								}

							},

							'loadTodo': function () {
								if (!self.isLoading) {
									self.isLoading = true;

									self.todos = Todo.query();
									self.todos.$promise.then(function (result) {


											//check if date is an object 
											// angular.forEach(result, function (value, key) {
											// 	// console.log(value +" "+ key);
											// 	// console.log(value.school);

											// 	if(value.date_end !=""){
											// 		value.date_end=new   Date(value.date_end);
											// 	}

											// 	if(value.date_start !=""){
											// 		value.date_start=new   Date(value.date_start);
											// 	}
											// });



									self.todos=result;
									self.getProgress();
									self.isLoading = false;


								});
								}

							},
							'updateTodo': function (todo) {

								self.isSaving = true;
							//checkbox value
							if(todo.done==1){
								todo.done=0;
							}else{
								todo.done=1;
							}
							Todo.update({ id:todo.id }, todo).$promise.then(function() {
								self.getProgress();
								self.isSaving = false;
								toaster.pop('success', 'Todo ' + todo.title + ' Updated');
							},function(error) {
								toaster.pop('error', 'Plaese check your connection');
							});
						},
						'deleteTodo': function (todo) {


							$.confirm({
								text: "Are you sure you want to delete that todo?",
								title: "Confirmation required",
								confirmButton: "Yes I am",
								cancelButton: "No",
								post: false,
								confirmButtonClass: "btn-danger",
								cancelButtonClass: "btn-default",
								dialogClass: "modal-dialog modal-lg",
								confirm: function() {
									self.isDeleting = true;
									Todo.remove({ id:todo.id }).$promise.then(function () {
										toaster.pop('success', 'Todo Deleted');
										var index = self.todos.indexOf(todo);
										self.todos.splice(index, 1);
										self.isDeleting = false;
									});
								},
								cancel: function() {
									        // nothing to do
									    }
									});


						},

						'createTodo': function (todo) {
							$('#close_todo_dialog').click();
											//console.log(todo);
											var d = $q.defer();
											self.isSaving = true;
											todo.user_id=current_user_id;
											todo.project_id=project_id;
											todo.done=0;

											//todo.date_start=   moment(todo.date_start).format('YYYY-MM-DD');
											//todo.date_end= moment(todo.date_end).format('YYYY-MM-DD');


											Todo.save(todo).$promise.then(function () {
												toaster.pop('success', 'Created ' + todo.title);
												self.todos = [];
												//self.loadTodo();
												self.loadMyTodosOfCurrentProject(user_id, project_id);

												self.todo= null;
												d.resolve();

												self.isSaving = false;
											},function(error) {
												toaster.pop('error', 'Plaese check your connection '+ error.status);
												console.log(error);
											});
											return d.promise;
										}


									};
									//self.loadTodo();
									return self;

								});


app.controller('todoCtrl', function($scope, TodoService, $filter, $timeout, toaster) {
	$scope.todos = TodoService;

	$scope.updateTodo= function(todo){
		TodoService.updateTodo(todo);
	},


	$scope.loadMyTodosOfCurrentProject=function(){
		TodoService.loadMyTodosOfCurrentProject(user_id, project_id);				
	},


	$scope.createTodo= function(todo){
						//console.log(todo);
						TodoService.createTodo(todo);
						
					},


					$scope.deleteTodo= function(todo){
						//console.log(todo);
						TodoService.deleteTodo(todo);
						
					}

					
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

		'status': [
		{value: '', text: 'Choose...'},
		{value: 'ACTIVE', text: 'ACTIVE'},
		{value: 'PENDING', text: 'PENDING'},
		{value: 'CLOSED', text: 'CLOSED'}
		],

		'priority': [
		{value: '', text: 'Choose...'},
		{value: 'HIGH', text: 'HIGH'},
		{value: 'LOW', text: 'LOW'},
		{value: 'MEDIUM', text: 'MEDIUM'}
		],


		'loadCurrentProject':function(projectId){
			var curProject = $resource('http://localhost:8000/projects/:id/', { id: projectId});
							//console.log(curUser.get());
							//this.user=curUser.get();

							temp=curProject.get(function (data){

								
								data.date_start=new Date(data.date_start);
								

								self.project= data;


								//animate chart on project detail
								setTimeout(function(){ 
									$('.chart').easyPieChart({
										easing: 'easeOutBounce',
										barColor:'#94c632',
										lineWidth:7,
										onStep: function(from, to, percent) {
											$(this.el).find('.percent').text(Math.round(percent));
										}
									});
								}, 500);
							});
							

						},

						'setActivePendingClosed': function(){
							self.active=0;
							self.pending=0;
							self.closed=0;

							angular.forEach(self.projects, function (value, key) {
								// console.log(value +" "+ key);
								//console.log(value.company_name);
								if(value.status=='ACTIVE'){
									self.active+=1;
								}else if(value.status=='PENDING'){
									self.pending+=1;
								}else{
									self.closed+=1;
								}
							});

						},	

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

															});

															self.setActivePendingClosed();
															self.projects=result;
															self.isLoading = false;
															//set animated progressbar on project list
															setTimeout(function(){ 
																$('.progress-bar').each(function() {
																	var per=$(this).attr('percent');
																	$(this).animate({
																		width: per+"%"
																	}, 100 );
																});
															}, 500);

														});
							}

						},
						'updateProject': function (project) {

							self.isSaving = true;
							
							Project.update({ id:project.id }, project).$promise.then(function() {
								self.isSaving = false;
								toaster.pop('success', 'Project ' + project.title + ' Updated');
							},function(error) {
								console.log(error);
								toaster.pop('error', 'Plaese check your connection');
							});
						},
						'updateProgress': function (progress) {

							self.isSaving = true;
							self.project.progress=progress;
							Project.update({ id:self.project.id }, self.project).$promise.then(function() {


											//update chart
											setTimeout(function(){ 
												var chart = window.chart = $('.chart').data('easyPieChart');
												chart.update(self.project.progress);
															}, 1000);
											
											
											self.isSaving = false;
								//toaster.pop('success', 'Project ' + project.project + ' Updated');
							},function(error) {
								console.log(error);
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
										self.setActivePendingClosed();
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
																
																toaster.pop('success', 'Project Created ');
																self.projects = [];
																self.loadProject();
																self.setActivePendingClosed();
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


	$timeout(function() {
		$scope.showStatus = function() {
			var selected = $filter('filter')($scope.projects.status, {value: $scope.projects.project.status});
			return ($scope.projects.project.status && selected.length) ? selected[0].text : 'Choose...';
		};
		$scope.showPriority = function() {
			var selected = $filter('filter')($scope.projects.priority, {value: $scope.projects.project.priority});
			return ($scope.projects.project.priority && selected.length) ? selected[0].text : 'Choose...';
		};
	}, 1000);



	$scope.updateProject= function(project){
		ProjectService.updateProject(project);

	},

	$scope.showForm= function(){
		$( "#addProject" ).removeClass("hide");
		$( "#addProject" ).addClass("show");

	},


	$scope.createProject= function(project){

		ProjectService.createProject(project);

	},


	$scope.deleteProject= function(project){

		ProjectService.deleteProject(project);

	},

	$scope.currentProject = function() {
		ProjectService.loadCurrentProject(project_id);
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
				toaster.pop('success', 'Experience ' + experience.company_name + ' Updated');
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
												toaster.pop('success', 'Created ' + experience.company_name);
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
				toaster.pop('success', 'Education ' + education.school + ' Updated');
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

	$scope.uploadProfileImages= function(){
		UserService.uploadProfileImages();
	},

	$scope.loadUsers= function(user){
		UserService.loadUsers();
	},

	$scope.loadUsersAffiliatesPage= function(user){
		UserService.loadUsersAffiliatesPage();
		$.getScript('{{ asset("assets/js/queen-table.js") }}', function(){});
	},

	$scope.loadUsersInTeam=function(){
		UserService.loadUsersInTeam();
	},

	$scope.loadUsersNotInTeam=function(){
		UserService.loadUsersNotInTeam();
	},

	$scope.addUserInTeam= function(user){
		UserService.addUserToTeam(user);
	},
	$scope.removeUserInTeam= function(user){
	UserService.removeUserToTeam(user);
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
		'usersInTeam':[],
		'usersNotInTeam':[],
		'usersPartecipant':[],
		'marital_status': [
		{value: '', text: 'Choose...'},
		{value: 'Married', text: 'Married'},
		{value: 'Single', text: 'Single'}
		],

		'loadUsersInTeam':function(){
			var usersInTeam = $resource('http://localhost:8000/user/inteam/:id/', { id: team_id});
			//console.log(usersInTeam.get());
			//this.user=usersInTeam.get();
			self.usersInTeam=usersInTeam.query();
			self.usersInTeam.$promise.then(function (result) {
				self.usersInTeam=result;
				self.usersPartecipant=result;
				self.isLoading = false;
			});

		},

		'loadUsersNotInTeam':function(){
			var usersNotInTeam = $resource('http://localhost:8000/user/notinteam/:id/', { id: team_id});
			self.usersNotInTeam=usersNotInTeam.query();
			self.usersNotInTeam.$promise.then(function (result) {
				self.usersNotInTeam=result;
				self.isLoading = false;
			});
		},

		'addUserToTeam':function(user){
			var addUser = $resource('http://localhost:8000/user/adduser/:u_id/:t_id/', { u_id: user.id, t_id:team_id});
			addUser.get(function (data){
			//self.loadUsersInTeam();
			self.usersPartecipant.push(user);
			var index = self.usersNotInTeam.indexOf(user);
			self.usersNotInTeam.splice(index, 1);
			toaster.pop('success', 'User ' + user.name + ' Added');
				//self.user= data;
			});
		},

		'removeUserToTeam':function(user){
		var rmUser = $resource('http://localhost:8000/user/removeuser/:u_id/:t_id/', { u_id: user.id, t_id:team_id});
		rmUser.get(function (data){
		//self.loadUsersInTeam();
		//var index = self.usersInTeam.indexOf(user);
		var index2 = self.usersPartecipant.indexOf(user);
		//delete users on list
		self.usersPartecipant.splice(index2, 1);
		//self.usersInTeam.splice(index, 1);
		// add user in notInTeam list
		self.usersNotInTeam.push(user);
		toaster.pop('success', 'User ' + user.name + ' Removed');
			//self.user= data;
		});
		},


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
					if (!self.isLoading) {
						self.isLoading = true;

						self.users = User.query();
						self.users.$promise.then(function (result) {
							self.users=result;
							self.isLoading = false;

						});
					}

				},

				'loadUsersAffiliatesPage': function () {
					if (!self.isLoading) {
						self.isLoading = true;

						self.users = User.query();
						self.users.$promise.then(function (result) {
							self.users=result;
							self.isLoading = false;
							$.getScript('{{ asset("assets/js/queen-table.js") }}', function(){});

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


