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
		'ui.select',
		'angular-cookies',
		'ngImgCrop'
		]);

	app.run(function(editableOptions) {
			  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
			  
			});

	app.config(function ($httpProvider, laddaProvider, $datepickerProvider, $interpolateProvider, CookiesProvider ) {
		
		// if (Cookies.get('access_token')=='' || angular.isUndefined(Cookies.get('access_token'))){
		// 	console.log("token scaduto");
		// 	window.location.href = base_url+'/logout';
		// }
	

	//$httpProvider.defaults.headers.common['Authorization'] = 'Bearer '+ Cookies.get('access_token');
				// $httpProvider.defaults.headers.common['Authorization'] = 'Bearer '+ $cookies['access_token'];
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
		return $resource(base_url +"/industries/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});
	app.factory("User", function ($resource) {
		return $resource(base_url +"/users/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});
	app.factory("Experience", function ($resource) {
		return $resource(base_url +"/experiences/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});

	app.factory("Project", function ($resource) {
		return $resource(base_url +"/projects/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});


	app.factory("Education", function ($resource) {
		return $resource(base_url +"/educations/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});

	app.factory("Todo", function ($resource) {
		return $resource(base_url +"/todos/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});

	app.factory("Notification", function ($resource) {
		return $resource(base_url +"/notifications/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});

	app.factory("File", function ($resource) {
		return $resource(base_url +"/files/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});

	app.factory("UserSetting", function ($resource) {
		return $resource(base_url +"/user_setting/:id/", {id: '@id'}, {
			update: {
				method: 'PUT'
			}
		});
	});



	app.controller('usersSettingCtrl', function($scope, UserSettingService, $filter, $timeout, toaster) {
		$scope.usersSetting = UserSettingService;

		$timeout(function() {
			$scope.showTimeZone = function() {
			  var selected = $filter('filter')($scope.usersSetting.timezone, {value: $scope.usersSetting.settings.timezone});
			  return ($scope.usersSetting.settings.timezone && selected.length) ? selected[0].text : 'Choose your timezone';
			};
		}, 2000);
		

		$scope.updateUserSetting= function(usersSetting){
			UserSettingService.updateUserSetting(usersSetting);
		}


		$scope.createUserSetting= function(usersSetting){
			//console.log(usersSetting);
			UserSettingService.createUserSetting(usersSetting);
			
		}

		});


	app.service('UserSettingService', function ( $timeout, UserSetting, $q, toaster, $resource, $rootScope) {



		var self = {
			'isLoading': false,
			'isSaving': false,
			'settings': null,
			'timezone':[
			{value: '', text: 'Choose your timezone'},
			{value:'Pacific/Midway'      , text:'Pacific/Midway'      },
			{value:'US/Samoa'            , text:'US/Samoa'            },
			{value:'US/Hawaii'           , text:'US/Hawaii'           },
			{value:'US/Alaska'           , text:'US/Alaska'           },
			{value:'US/Pacific'          , text:'US/Pacific'          },
			{value:'America/Tijuana'     , text:'America/Tijuana'     },
			{value:'US/Arizona'          , text:'US/Arizona'          },
			{value:'US/Mountain'         , text:'US/Mountain'         },
			{value:'America/Chihuahua'   , text:'America/Chihuahua'   },
			{value:'America/Mazatlan'    , text:'America/Mazatlan'    },
			{value:'America/Mexico_City' , text:'America/Mexico_City' },
			{value:'America/Monterrey'   , text:'America/Monterrey'   },
			{value:'Canada/Saskatchewan' , text:'Canada/Saskatchewan' },
			{value:'US/Central'          , text:'US/Central'          },
			{value:'US/Eastern'          , text:'US/Eastern'          },
			{value:'US/East-Indiana'     , text:'US/East-Indiana'     },
			{value:'America/Bogota'      , text:'America/Bogota'      },
			{value:'America/Lima'        , text:'America/Lima'        },
			{value:'America/Caracas'     , text:'America/Caracas'     },
			{value:'Canada/Atlantic'     , text:'Canada/Atlantic'     },
			{value:'America/La_Paz'      , text:'America/La_Paz'      },
			{value:'America/Santiago'    , text:'America/Santiago'    },
			{value:'Canada/Newfoundland' , text:'Canada/Newfoundland' },
			{value:'America/Buenos_Aires', text:'America/Buenos_Aires'},
			{value:'Greenland'           , text:'Greenland'           },
			{value:'Atlantic/Stanley'    , text:'Atlantic/Stanley'    },
			{value:'Atlantic/Azores'     , text:'Atlantic/Azores'     },
			{value:'Atlantic/Cape_Verde' , text:'Atlantic/Cape_Verde' },
			{value:'Africa/Casablanca'   , text:'Africa/Casablanca'   },
			{value:'Europe/Dublin'       , text:'Europe/Dublin'       },
			{value:'Europe/Lisbon'       , text:'Europe/Lisbon'       },
			{value:'Europe/London'       , text:'Europe/London'       },
			{value:'Africa/Monrovia'     , text:'Africa/Monrovia'     },
			{value:'Europe/Amsterdam'    , text:'Europe/Amsterdam'    },
			{value:'Europe/Belgrade'     , text:'Europe/Belgrade'     },
			{value:'Europe/Berlin'       , text:'Europe/Berlin'       },
			{value:'Europe/Bratislava'   , text:'Europe/Bratislava'   },
			{value:'Europe/Brussels'     , text:'Europe/Brussels'     },
			{value:'Europe/Budapest'     , text:'Europe/Budapest'     },
			{value:'Europe/Copenhagen'   , text:'Europe/Copenhagen'   },
			{value:'Europe/Ljubljana'    , text:'Europe/Ljubljana'    },
			{value:'Europe/Madrid'       , text:'Europe/Madrid'       },
			{value:'Europe/Paris'        , text:'Europe/Paris'        },
			{value:'Europe/Prague'       , text:'Europe/Prague'       },
			{value:'Europe/Rome'         , text:'Europe/Rome'         },
			{value:'Europe/Sarajevo'     , text:'Europe/Sarajevo'     },
			{value:'Europe/Skopje'       , text:'Europe/Skopje'       },
			{value:'Europe/Stockholm'    , text:'Europe/Stockholm'    },
			{value:'Europe/Vienna'       , text:'Europe/Vienna'       },
			{value:'Europe/Warsaw'       , text:'Europe/Warsaw'       },
			{value:'Europe/Zagreb'       , text:'Europe/Zagreb'       },
			{value:'Europe/Athens'       , text:'Europe/Athens'       },
			{value:'Europe/Bucharest'    , text:'Europe/Bucharest'    },
			{value:'Africa/Cairo'        , text:'Africa/Cairo'        },
			{value:'Africa/Harare'       , text:'Africa/Harare'       },
			{value:'Europe/Helsinki'     , text:'Europe/Helsinki'     },
			{value:'Europe/Istanbul'     , text:'Europe/Istanbul'     },
			{value:'Asia/Jerusalem'      , text:'Asia/Jerusalem'      },
			{value:'Europe/Kiev'         , text:'Europe/Kiev'         },
			{value:'Europe/Minsk'        , text:'Europe/Minsk'        },
			{value:'Europe/Riga'         , text:'Europe/Riga'         },
			{value:'Europe/Sofia'        , text:'Europe/Sofia'        },
			{value:'Europe/Tallinn'      , text:'Europe/Tallinn'      },
			{value:'Europe/Vilnius'      , text:'Europe/Vilnius'      },
			{value:'Asia/Baghdad'        , text:'Asia/Baghdad'        },
			{value:'Asia/Kuwait'         , text:'Asia/Kuwait'         },
			{value:'Africa/Nairobi'      , text:'Africa/Nairobi'      },
			{value:'Asia/Riyadh'         , text:'Asia/Riyadh'         },
			{value:'Europe/Moscow'       , text:'Europe/Moscow'       },
			{value:'Asia/Tehran'         , text:'Asia/Tehran'         },
			{value:'Asia/Baku'           , text:'Asia/Baku'           },
			{value:'Europe/Volgograd'    , text:'Europe/Volgograd'    },
			{value:'Asia/Muscat'         , text:'Asia/Muscat'         },
			{value:'Asia/Tbilisi'        , text:'Asia/Tbilisi'        },
			{value:'Asia/Yerevan'        , text:'Asia/Yerevan'        },
			{value:'Asia/Kabul'          , text:'Asia/Kabul'          },
			{value:'Asia/Karachi'        , text:'Asia/Karachi'        },
			{value:'Asia/Tashkent'       , text:'Asia/Tashkent'       },
			{value:'Asia/Kolkata'        , text:'Asia/Kolkata'        },
			{value:'Asia/Kathmandu'      , text:'Asia/Kathmandu'      },
			{value:'Asia/Yekaterinburg'  , text:'Asia/Yekaterinburg'  },
			{value:'Asia/Almaty'         , text:'Asia/Almaty'         },
			{value:'Asia/Dhaka'          , text:'Asia/Dhaka'          },
			{value:'Asia/Novosibirsk'    , text:'Asia/Novosibirsk'    },
			{value:'Asia/Bangkok'        , text:'Asia/Bangkok'        },
			{value:'Asia/Jakarta'        , text:'Asia/Jakarta'        },
			{value:'Asia/Krasnoyarsk'    , text:'Asia/Krasnoyarsk'    },
			{value:'Asia/Chongqing'      , text:'Asia/Chongqing'      },
			{value:'Asia/Hong_Kong'      , text:'Asia/Hong_Kong'      },
			{value:'Asia/Kuala_Lumpur'   , text:'Asia/Kuala_Lumpur'   },
			{value:'Australia/Perth'     , text:'Australia/Perth'     },
			{value:'Asia/Singapore'      , text:'Asia/Singapore'      },
			{value:'Asia/Taipei'         , text:'Asia/Taipei'         },
			{value:'Asia/Ulaanbaatar'    , text:'Asia/Ulaanbaatar'    },
			{value:'Asia/Urumqi'         , text:'Asia/Urumqi'         },
			{value:'Asia/Irkutsk'        , text:'Asia/Irkutsk'        },
			{value:'Asia/Seoul'          , text:'Asia/Seoul'          },
			{value:'Asia/Tokyo'          , text:'Asia/Tokyo'          },
			{value:'Australia/Adelaide'  , text:'Australia/Adelaide'  },
			{value:'Australia/Darwin'    , text:'Australia/Darwin'    },
			{value:'Asia/Yakutsk'        , text:'Asia/Yakutsk'        },
			{value:'Australia/Brisbane'  , text:'Australia/Brisbane'  },
			{value:'Australia/Canberra'  , text:'Australia/Canberra'  },
			{value:'Pacific/Guam'        , text:'Pacific/Guam'        },
			{value:'Australia/Hobart'    , text:'Australia/Hobart'    },
			{value:'Australia/Melbourne' , text:'Australia/Melbourne' },
			{value:'Pacific/Port_Moresby', text:'Pacific/Port_Moresby'},
			{value:'Australia/Sydney'    , text:'Australia/Sydney'    },
			{value:'Asia/Vladivostok'    , text:'Asia/Vladivostok'    },
			{value:'Asia/Magadan'        , text:'Asia/Magadan'        },
			{value:'Pacific/Auckland'    , text:'Pacific/Auckland'    },
			{value:'Pacific/Fiji'        , text:'Pacific/Fiji'        },
			],

			'loadUserSetting': function () {

				var deferred = $q.defer();
					
				self.isLoading = true;
				var loadUserSetting = $resource(base_url + '/user/setting/:id/', { id: current_user_id});

				self.settings=loadUserSetting.query();
				self.settings.$promise.then(function (result) {

					self.settings=result[0];  
					$rootScope.UserSettings=self.settings;

					// se la user preference non esiste la creo inserendo il time zone corrente
					if(angular.isUndefined(self.settings)){

						var tz = jstz.determine();
						var settings={user_id:current_user_id, timezone:tz.name()};
						self.createUserSetting(settings);


					}
					self.isLoading = false;
					deferred.resolve();
				});

				return deferred.promise;
				},

				'updateUserSetting': function (settings) {
					console.log(settings);
					self.isSaving = true;

					UserSetting.update({ id:settings.id }, settings).$promise.then(function() {
						self.isSaving = false;
						toaster.pop('success', 'Settings Updated');
					},function(error) {
						toaster.pop('error', 'Plaese check your connection');
					});
				},


				'createUserSetting': function (settings) {

					var d = $q.defer();
					self.isSaving = true;
					settings.user_id=current_user_id;
					settings.send_notification_by_mail=0;
					settings.first_access=1;

					UserSetting.save(settings).$promise.then(function () {
						toaster.pop('success', 'User Settings Created ');
						self.settings = [];
						self.loadUserSetting();

						d.resolve();

						self.isSaving = false;
					},function(error) {
						toaster.pop('error', 'Plaese check your connection '+ error.status);
						console.log(error);
					});
					return d.promise;
				}


			};
			self.loadUserSetting();
			return self;

		});


	app.controller('fileCtrl', function($scope, FileService, $filter, $timeout, toaster) {
		$scope.files = FileService;

		$scope.updateFile= function(file){
			FileService.updateFile(file);
			//console.log($scope.files);
		},

		$scope.uploadFile= function(){
			FileService.uploadFile();
		},

		// $scope.loadFiles= function(file){
		// 	FileService.loadFiles();
		// },

		$scope.loadFilesOfProject=function(){
			FileService.loadFilesOfProject();
			//FileService.loadFilesInTeamWithNotificationInfo();
		}


	});




	app.service('FileService', function ( File, $q, toaster, $resource) {



		var self = {
			'addFile': function (file) {
				this.files.push(file);
			},
			'page': 1,
			'hasMore': true,
			'isLoading': false,
			'isSaving': false,
			'selectedFile': null,
			'files': [],
			'file': {},
			'search': null,
			'upload':null,

			'loadFiles':function(){
				
			},
			
			'loadMyFiles':function(){
				
			},

			'loadFilesOfProject':function(){
				var loadFilesOfProject = $resource(base_url + '/file/project/:id/', { id: project_id});
				//console.log(filesInTeam.get());
				//this.file=filesInTeam.get();

				self.files=loadFilesOfProject.query();
				self.files.$promise.then(function (result) {
					self.files=result;
					self.isLoading = false;
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
					'loadCurrentFile':function(fileId){
						var curFile = $resource(base_url + '/files/:id/', { id: fileId});
						//console.log(curFile.get());
						//this.file=curFile.get();
						temp=curFile.get(function (data){
							self.file= data;
						});
						

					},

					'loadFiles': function () {
						if (!self.isLoading) {
							self.isLoading = true;

							self.files = File.query();
							self.files.$promise.then(function (result) {
								self.files=result;
								self.isLoading = false;

							});
						}

					},


					'uploadFile': function(){
			//save uploaded image
			var handleFileSelect = function(evt) {


				var files = evt.target.files;
				var file = files[0];
				var imageName= file.name;

				if( file.size < 10000000){
				 	


				 	if (files && file) {

				 		var reader = new FileReader();

				 		reader.onload = function(readerEvt) {
				 			var binaryString = readerEvt.target.result;
				 			var binary = btoa(binaryString);
			 	                 //var file=FileService.loadCurrentFile(current_file_id);

			 	                 if(evt.target.id=='upload_file'){
			 	                 	
			 	                 	self.file.upload=binary;
			 	                 	self.file.name=imageName;
			 	                 	self.file.user_id=current_user_id;
			 	                 	self.file.project_id=project_id;
			 	                 }

			 	                 self.createFile(self.file);
			 	                 
			 	                 setTimeout(function(){  
			 	                 	self.loadFilesOfProject();
			 	                 }, 500);

			 	             };

			 	             reader.readAsBinaryString(file);
			 	         }
			 	}else{
			 		alert("File maggiore di 10 mb");
			 	}
			 };

			 if (window.File && window.FileReader && window.FileList && window.Blob) {
			 	document.getElementById('upload_file').addEventListener('change', handleFileSelect, false);
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
					'updateFile': function (file) {

						self.isSaving = true;
						File.update({ id:file.id }, file).$promise.then(function() {
							self.isSaving = false;
							toaster.pop('success', 'File ' + file.name + ' Updated');
						},function(error) {
							toaster.pop('error', 'Plaese check your connection');
						});
					},
					'removeFile': function (file) {
						self.isDeleting = true;
						file.$remove().then(function () {
							self.isDeleting = false;
							var index = self.files.indexOf(file);
							self.files.splice(index, 1);
							self.selectedfile = null;
							toaster.pop('success', 'Deleted ' + file.name);
						});
					},
					'createFile': function (file) {
						var d = $q.defer();
						self.isSaving = true;
						File.save(file).$promise.then(function () {
							//self.files = [];
							//self.loadFiles();
							toaster.pop('success', 'Created ' + file.name);
							d.resolve()
						});
						return d.promise;
					}


				};
				return self;

			});


	app.service('NotificationService', function ( $timeout, ProjectService, UserService,  Notification, $q, toaster, $resource, $rootScope, UserSettingService) {



		var self = {
			'addNotification': function (notification) {
				this.notifications.push(notification);
			},
			'isLoading': false,
			'isSaving': false,
			'notifications': [],
			'notification': null,
			'notification_not_read':null,

			'loadNumberNotificationNotRead':function(){
									var allNotifications=self.notifications.length;
									if(allNotifications >0){

										var number=0;
										angular.forEach(self.notifications, function (value, key) {
											if(value.read==0){
												number+=1;
											}
										});
										
										
									}
									self.notification_not_read=number;
									
			},

			'loadMyNotifications':function(){

				var notifications = $resource(base_url + '/notification/user/:u_id/', { u_id: current_user_id});

				if (!self.isLoading) {
					self.isLoading = true;
					self.notifications = notifications.query();
					self.notifications.$promise.then(function (result) {

						angular.forEach(result, function (value, key) {
				
								

								//var created=moment(value.created_at).tz("Europe/Berlin").format();//.fromNow();
								
								// console.log(created);
								// console.log(value.created_at);
								//value.created_at=moment(created,  "YYYYMMDD").fromNow();

								UserSettingService.loadUserSetting().then(function(){		
								var utcDate = moment.utc(value.created_at);
								var dateWithTimezone = utcDate.tz($rootScope.UserSettings.timezone).format();

								value.created_at=moment(dateWithTimezone,  "YYYY-MM-DD HH:mm:ss").fromNow();
								});
								//convert from utc to user timezone
								





								// var todate=moment.utc(value.created_at, "YYYY-MM-DD HH:mm:ss").toDate();
								// value.created_at=moment(todate,  "YYYY-MM-DD HH:mm:ss").fromNow();
								// console.log(todate);




								// var localTime  = moment.utc(value.created_at).toDate();
    				// 			localTime = moment(localTime).format('YYYY-MM-DD HH:mm:ss');
    				// 			console.log(localTime);




						});	

						self.notifications=result;
						self.loadNumberNotificationNotRead();
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
			'sendInviteToUser':function(user_id_to , module, project_id){

				var deferred = $q.defer();

				var sendInviteUrl = $resource(base_url + '/user/notification/invite/:user_id_to/:user_id_from/:module/:project_id/', { user_id_to:user_id_to,user_id_from:current_user_id,module:module,project_id:project_id});
				sendInviteUrl.get(function (data){
					toaster.pop('success', 'Invite sent');
				deferred.resolve();

				});

				return deferred.promise;
			},
			'rmNotificationByUserIdAndProjectId':function(user_id , project_id){

				var rmNotification = $resource(base_url + '/notification/project/delete/:user_id/:project_id/', { user_id:user_id,project_id:project_id});
				rmNotification.get(function (data){
					//toaster.pop('success', 'Invite sent');

				});
			},



			'updateNotification': function (notification) {

				self.isSaving = true;

				Notification.update({ id:notification.id }, notification).$promise.then(function() {
					self.isSaving = false;
					
				},function(error) {
					toaster.pop('error', 'Plaese check your connection');
				});
			},
			readNotification:function(notification){

				if (notification.read==0){
					// set as read
				notification.read=1;
				self.updateNotification(notification);
				self.notification_not_read= self.notification_not_read - 1; 
				}

				
				$.confirm({
					content: notification.body,
					title: notification.title,
					confirmButton: "Accept",
					cancelButton: "Reject",
					post: false,
					confirmButtonClass: "btn-success",
					cancelButtonClass: "btn-danger",
					dialogClass: "modal-dialog modal-lg",
					backgroundDismiss: false,
					theme: 'black',
					confirm: function() {

				// set as accepted
				notification.accepted=1;
				self.updateNotification(notification);
				toaster.pop('success', 'Now you are a participant of the project ');
				
				UserService.addUserToTeam(notification.user_id_to,notification.team_id);
				ProjectService.loadJoinedProject(current_user_id);

					},
					cancel: function() {
				// set as rejected
				notification.rejected=1;
				self.updateNotification(notification);
				toaster.pop('success', 'You refused to join the project');

														        // nothing to do
														    }
														});

			},
			'deleteNotification': function (notification_id) {


				self.isDeleting = true;
				Notification.remove({ id:notification_id }).$promise.then(function () {
					toaster.pop('success', 'Notification Deleted');
					self.isDeleting = false;
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


		

		$scope.readNotification= function(notification){
			NotificationService.readNotification(notification);
		},

		
		$scope.updateNotification= function(notification){
			NotificationService.updateNotification(notification);
		},


		$scope.loadMyNotifications=function(){
			NotificationService.loadMyNotifications();
		},

		$scope.deleteNotification= function(notification){
											//console.log(notification);
											NotificationService.deleteNotification(notification.id);
											
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

									var todos = $resource(base_url + '/todo/project/:u_id/:p_id/', { u_id: user_id,p_id:project_id});


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
									content: "Are you sure you want to delete that todo?",
									title: "Confirmation required",
									confirmButton: "Yes I am",
									cancelButton: "No",
									post: false,
									confirmButtonClass: "btn-danger",
									cancelButtonClass: "btn-default",
									dialogClass: "modal-dialog modal-lg",
									theme: 'black',
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
			'myProjects': [],
			'joinedProjects': [],
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

			'loadRemainingDays':function(){


				var dateFormat=moment(self.project.date_start).format("YYYY-MM-DD");
				var date_start=moment(dateFormat, "YYYY-MM-DD");
				var date_end=moment(date_start, "YYYY-MM-DD").add('days', self.project.duration_day);
				var now=moment();

				var daysRemaining=date_end.diff(now, 'days');

				if (daysRemaining < 0) {
				    daysRemaining=0;
				}

				self.project.remaining_day=daysRemaining;
			},


			'loadCurrentProject':function(projectId){
				var deferred = $q.defer();
				var curProject = $resource(base_url + '/projects/:id/', { id: projectId});
								//console.log(curUser.get());
								//this.user=curUser.get();

								temp=curProject.get(function (data){

									
									data.date_start=new Date(data.date_start);
									self.project= data;

									deferred.resolve();
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
								
								return deferred.promise;
							},

							'setActivePendingClosed': function(){
								self.active=0;
								self.pending=0;
								self.closed=0;

								angular.forEach(self.myProjects, function (value, key) {
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

									
									var AllProjectsWithUserInfo = $resource(base_url + '/project/userinfo/');

									self.projects = AllProjectsWithUserInfo.query();
									self.projects.$promise.then(function (result) {


																//check if date is an object 
																angular.forEach(result, function (value, key) {
																	// console.log(value +" "+ key);
																	//console.log(value.company_name);
																	value.date_end=new   Date(value.date_end);
																	value.date_start=new   Date(value.date_start);

																});

																
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


							

							'loadJoinedProject': function (user_id) {

									var joinedProjects = $resource(base_url + '/project/joined/userinfo/:u_id/:t_id', { u_id: user_id});


									//if (!self.isLoading) {
										self.isLoading = true;
										self.joinedProjects = joinedProjects.query();
										self.joinedProjects.$promise.then(function (result) {
											//self.setActivePendingClosed();
											self.joinedProjects=result;

											setTimeout(function(){ 
												$('.progress-bar').each(function() {
													var per=$(this).attr('percent');
													$(this).animate({
														width: per+"%"
													}, 100 );
												});
											}, 500);
											
											self.isLoading = false;
										},function(error) {
											toaster.pop('error', 'Plaese check your connection '+ error.status);
											console.log(error);
										});
									//}

								
							},

							'loadMyProject': function (user_id) {
								
									var myProjects = $resource(base_url + '/project/userinfo/:u_id/', { u_id: user_id});

									//if (!self.isLoading) {
										self.isLoading = true;
										self.myProjects = myProjects.query();
										self.myProjects.$promise.then(function (result) {
											self.setActivePendingClosed();
											self.myProjects=result;

											setTimeout(function(){ 
												$('.progress-bar').each(function() {
													var per=$(this).attr('percent');
													$(this).animate({
														width: per+"%"
													}, 100 );
												});
											}, 500);
											
											self.isLoading = false;
										},function(error) {
											toaster.pop('error', 'Plaese check your connection '+ error.status);
											console.log(error);
										});
									//}

								
							},
							
							'hasProjects': function () {

									var myProjects = $resource(base_url + '/project/userinfo/:u_id/', { u_id: current_user_id});
									var query = myProjects.query();
									query.$promise.then(function (result) {
										if(result.length) {
											self.myProjects = result;
                                            self.noProjects = false;
                                            self.lastProject = result[result.length-1];
                                            $('.chart').data('easyPieChart').update(self.lastProject.progress);
                                        } else {
                                            self.noProjects = true;
                                        }
									}, function(error) {
										toaster.pop('error', 'Plaese check your connection '+ error.status);
									});
							},

							'updateProject': function (project) {
								var deferred = $q.defer();
								self.isSaving = true;
								
								Project.update({ id:project.id }, project).$promise.then(function() {
									self.isSaving = false;
									toaster.pop('success', 'Project ' + project.title + ' Updated');
									self.loadRemainingDays(moment(project.date_start).format("YYYY/MM/DD"), project.duration_day);
									//console.log(moment(project.date_start).format("YYYY/MM/DD"));
									deferred.resolve();
								},function(error) {
									console.log(error);
									toaster.pop('error', 'Plaese check your connection');
								});
								return deferred.promise;
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
									content: "Are you sure you want to delete that project?",
									title: "Confirmation required",
									confirmButton: "Yes I am",
									cancelButton: "No",
									post: false,
									confirmButtonClass: "btn-danger",
									cancelButtonClass: "btn-default",
									dialogClass: "modal-dialog modal-lg",
									theme: 'black',
									confirm: function() {
										self.isDeleting = true;
										Project.remove({ id:project.id }).$promise.then(function () {
											toaster.pop('success', 'Project Deleted');
											var index = self.projects.indexOf(project);
											self.projects.splice(index, 1);

											var index = self.myProjects.indexOf(project);
											self.myProjects.splice(index, 1);

											
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

																Project.save(project).$promise.then(function (result) {
																		

																	toaster.pop('success', 'Project Created ');
																	//self.projects = [];
																	//self.loadMyProject();
																	self.myProjects.push(result);

																	//self.loadMyProject();

																	self.project= null;
																	self.setActivePendingClosed();
																	d.resolve();
																	self.isSaving = false;
																},function(error) {
																	toaster.pop('error', 'Plaese check your connection '+ error.status);
																	console.log(error);
																});
																return d.promise;
															}


														};
														//self.loadProject();
														return self;

													});


	app.controller('projectCtrl', function($scope, ProjectService, $filter, $timeout, toaster) {
		$scope.projects = ProjectService;

				$scope.myImage='';
				$scope.myCroppedImage='';
				$scope.tempImageName="";

				$scope.uploadProfileImage= function(){
					$(document).ready(function() {

						$timeout(function() {

							var handleFileSelect=function(evt) {
								var file=evt.currentTarget.files[0];
							  //$scope.profile_image=file.name;
							  //$scope.background_image=file.name;
							  $scope.tempImageName=file.name;
							  var reader = new FileReader();
							  reader.onload = function (evt) {
							  	$('#crop_profile_image').modal();
							  	$scope.$apply(function($scope){
							  		$scope.myImage=evt.target.result;
							  	});
							  };
							  //console.log( reader.readAsBinaryString(file));
							  reader.readAsDataURL(file);
							};
							angular.element(document.querySelector('#profile_image')).on('change',handleFileSelect);

							$scope.$watch('myCroppedImage', function() {

								if(!angular.isUndefined($scope.myCroppedImage)){
									var binary = $scope.myCroppedImage.split(',')[1];
									$scope.projects.project.upload=binary;
								}


					        //$scope.projects.project.data=$scope.myCroppedImage;
					    });

						}, 2000);

					});	
		},

				$scope.save_cropped_image=function(project){
					$scope.projects.project.profile_image=$scope.tempImageName;
					ProjectService.updateProject(project).then(function(){
							ProjectService.loadCurrentProject(project_id).then(function(){		
								$('#crop_profile_image').modal('hide');
								$scope.uploadProfileImage();
							});
					});
					
					
					
				},

				$scope.uploadBackgroundImage= function(){

					$(document).ready(function() {

						$timeout(function() {

							var handleFileSelect=function(evt) {
								var file=evt.currentTarget.files[0];
								var imageName= file.name;				 
								var reader = new FileReader();
								reader.onload = function (evt) {
									var binaryString = evt.target.result;
									var binary = btoa(binaryString);
									$scope.projects.project.background_image=imageName;
									$scope.projects.project.upload=binary;

									ProjectService.updateProject($scope.projects.project).then(function(){
										ProjectService.loadCurrentProject(project_id).then(function(){		
											$scope.uploadBackgroundImage();
										});
									});

								};
							  //console.log( reader.readAsBinaryString(file));
							  reader.readAsBinaryString(file);(file);
							};
							angular.element(document.querySelector('#background_image')).on('change',handleFileSelect);

						}, 2000);

					});	
				},


		$timeout(function() {
			$scope.showStatus = function() {
				var selected = $filter('filter')($scope.projects.status, {value: $scope.projects.project.status});
				return ($scope.projects.project.status && selected.length) ? selected[0].text : 'Choose...';
			};
			$scope.showPriority = function() {
				var selected = $filter('filter')($scope.projects.priority, {value: $scope.projects.project.priority});
				return ($scope.projects.project.priority && selected.length) ? selected[0].text : 'Choose...';
			};
		}, 2000);



	// $scope.loadProject=function(){
	// 	ProjectService.loadProject();
	// },


	$scope.loadMyProject=function(){
		ProjectService.loadMyProject(current_user_id);

	},

	$scope.loadJoinedProject=function(){
		ProjectService.loadJoinedProject(current_user_id);
	},




		$scope.updateProject= function(project){
			ProjectService.updateProject(project).then(function(){		
			ProjectService.loadRemainingDays();
		});

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
			ProjectService.loadCurrentProject(project_id).then(function(){		
			ProjectService.loadRemainingDays();
		});
		}

		// $scope.uploadProfileImages = function() {
		// 	ProjectService.uploadProfileImages();
		// }

		


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

			'loadUserExperience': function () {
				if (!self.isLoading) {
					self.isLoading = true;
					var experiencesByUser = $resource(base_url + '/experience/user/:u_id/', { u_id: current_user_id});

					self.experiences = experiencesByUser.query();
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
					content: "Are you sure you want to delete that experience?",
					title: "Confirmation required",
					confirmButton: "Yes I am",
					cancelButton: "No",
					post: false,
					confirmButtonClass: "btn-danger",
					cancelButtonClass: "btn-default",
					dialogClass: "modal-dialog modal-lg",
					theme: 'black',
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
													self.loadUserExperience();

													self.experience= null;
													$( "#addExperience" ).removeClass("show");
													$( "#addExperience" ).addClass("hide");
													d.resolve();
													self.isSaving = false;
												});
												return d.promise;
											}


										};
										self.loadUserExperience();
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



			'loadUserEducation': function () {
				if (!self.isLoading) {
					self.isLoading = true;

					var educationsByUser = $resource(base_url + '/education/user/:u_id/', { u_id: current_user_id});

					self.educations = educationsByUser.query();
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
					content: "Are you sure you want to delete that education?",
					title: "Confirmation required",
					confirmButton: "Yes I am",
					cancelButton: "No",
					post: false,
					confirmButtonClass: "btn-danger",
					cancelButtonClass: "btn-default",
					dialogClass: "modal-dialog modal-lg",
					theme: 'black',
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
									self.loadUserEducation();

									self.education= null;
									$( "#addEducation" ).removeClass("show");
									$( "#addEducation" ).addClass("hide");
									d.resolve();
									self.isSaving = false;
								});
								return d.promise;
							}


						};
						self.loadUserEducation();
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

			  'loadUserIndustries': function () {
			  	var industriesByUser = $resource(base_url + '/industry/user/:u_id/', { u_id: current_user_id});
			 	if (!self.isLoading) {
			 		self.isLoading = true;

			 		self.industries = industriesByUser.query();
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
			 		content: "Are you sure you want to delete that industry?",
			 		title: "Confirmation required",
			 		confirmButton: "Yes I am",
			 		cancelButton: "No",
			 		post: false,
			 		confirmButtonClass: "btn-danger",
			 		cancelButtonClass: "btn-default",
			 		dialogClass: "modal-dialog modal-lg",
			 		theme: 'black',
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
			 	


			 	Industry.save(industry).$promise.then(function () {
			 		self.isSaving = false;
			 		self.industries = [];
			 		self.loadUserIndustries();
			 		toaster.pop('success', 'Created ' + industry.industry);
			 		self.industry= null;
			 		$( "#addIndustry" ).removeClass("show");
			 		$( "#addIndustry" ).addClass("hide");
			 		d.resolve();
			 	});
			 	return d.promise;
			 }


			};
			self.loadUserIndustries();
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

	app.controller('userCtrl', function($scope, NotificationService,  UserService, $filter, $timeout, toaster) {
		$scope.users = UserService;

		$scope.myImage='';
		$scope.myCroppedImage='';
		$scope.tempImageName="";

		$scope.uploadProfileImage= function(){
			$(document).ready(function() {

				$timeout(function() {

					var handleFileSelect=function(evt) {
						var file=evt.currentTarget.files[0];
					  //$scope.profile_image=file.name;
					  //$scope.background_image=file.name;
					  $scope.tempImageName=file.name;
					  var reader = new FileReader();
					  reader.onload = function (evt) {
					  	$('#crop_profile_image').modal();
					  	$scope.$apply(function($scope){
					  		$scope.myImage=evt.target.result;
					  	});
					  };
					  //console.log( reader.readAsBinaryString(file));
					  reader.readAsDataURL(file);
					};
					angular.element(document.querySelector('#profile_image')).on('change',handleFileSelect);

					$scope.$watch('myCroppedImage', function() {

						if(!angular.isUndefined($scope.myCroppedImage)){
							var binary = $scope.myCroppedImage.split(',')[1];
							$scope.users.user.upload=binary;
						}


			        //$scope.users.user.data=$scope.myCroppedImage;
			    });

				}, 2000);

			});	
},

		$scope.save_cropped_image=function(user){
			$scope.users.user.profile_image=$scope.tempImageName;
			UserService.updateUser(user).then(function(){
					UserService.loadCurrentUser(current_user_id).then(function(){		
						$('#crop_profile_image').modal('hide');
						$scope.uploadProfileImage();
					});
			});
			
			
			
		},

		$scope.uploadBackgroundImage= function(){

			$(document).ready(function() {

				$timeout(function() {

					var handleFileSelect=function(evt) {
						var file=evt.currentTarget.files[0];
						var imageName= file.name;				 
						var reader = new FileReader();
						reader.onload = function (evt) {
							var binaryString = evt.target.result;
							var binary = btoa(binaryString);
							$scope.users.user.background_image=imageName;
							$scope.users.user.upload=binary;

							UserService.updateUser($scope.users.user).then(function(){
								UserService.loadCurrentUser(current_user_id).then(function(){		
									$scope.uploadBackgroundImage();
								});
							});

						};
					  //console.log( reader.readAsBinaryString(file));
					  reader.readAsBinaryString(file);(file);
					};
					angular.element(document.querySelector('#background_image')).on('change',handleFileSelect);

				}, 2000);

			});	
		},

		$timeout(function() {
			$scope.showMaritalStatus = function() {
				var selected = $filter('filter')($scope.users.marital_status, {value: $scope.users.user.marital_status});
				return ($scope.users.user.marital_status && selected.length) ? selected[0].text : 'Choose...';
			};

			$scope.showCountry = function() {
				var selected = $filter('filter')($scope.users.countries, {value: $scope.users.user.countries});
				return ($scope.users.user.countries && selected.length) ? selected[0].text : 'Choose your country';
			};


		}, 1000);

		$scope.currentUser = function() {
			UserService.loadCurrentUser(current_user_id);
		},

		$scope.updateUser= function(user){
			UserService.updateUser(user);
			//console.log($scope.users);
		},



		$scope.loadUsers= function(user){
			UserService.loadUsers();
		},

		$scope.loadUsersAffiliatesPage= function(user){
			UserService.loadUsersAffiliatesPage();
			$.getScript(base_url+'/assets/js/queen-table.js', function(){});
		},

		$scope.loadUsersInTeam=function(){
			UserService.loadUsersInTeam();
			//UserService.loadUsersInTeamWithNotificationInfo();
		},

		$scope.loadUsersNotInTeam=function(){
			UserService.loadUsersNotInTeam();
			
		},


		$scope.sendInvite=function(user,project_id){


			NotificationService.sendInviteToUser(user.id, 'Project', project_id).then(function(){
				UserService.loadUsersNotInTeam();
			});
			
		},

		$scope.addUserInTeam= function(user){
			UserService.addUserToTeam(user);
		},
		$scope.removeUserInTeam= function(user){
			NotificationService.rmNotificationByUserIdAndProjectId(user.user_id , project_id);
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
			'marital_status': [
			{value: '', text: 'Choose...'},
			{value: 'Married', text: 'Married'},
			{value: 'Single', text: 'Single'}
			],
			'countries':[
				{value: '', text: 'Choose your country'},
				{value: 'BD', text: 'Bangladesh'},
				{value: 'BE', text: 'Belgium'},
				{value: 'BF', text: 'Burkina Faso'},
				{value: 'BG', text: 'Bulgaria'},
				{value: 'BA', text: 'Bosnia and Herzegovina'},
				{value: 'BB', text: 'Barbados'},
				{value: 'WF', text: 'Wallis and Futuna'},
				{value: 'BL', text: 'Saint Bartelemey'},
				{value: 'BM', text: 'Bermuda'},
				{value: 'BN', text: 'Brunei Darussalam'},
				{value: 'BO', text: 'Bolivia'},
				{value: 'BH', text: 'Bahrain'},
				{value: 'BI', text: 'Burundi'},
				{value: 'BJ', text: 'Benin'},
				{value: 'BT', text: 'Bhutan'},
				{value: 'JM', text: 'Jamaica'},
				{value: 'BV', text: 'Bouvet Island'},
				{value: 'BW', text: 'Botswana'},
				{value: 'WS', text: 'Samoa'},
				{value: 'BR', text: 'Brazil'},
				{value: 'BS', text: 'Bahamas'},
				{value: 'JE', text: 'Jersey'},
				{value: 'BY', text: 'Belarus'},
				{value: 'O1', text: 'Other Country'},
				{value: 'LV', text: 'Latvia'},
				{value: 'RW', text: 'Rwanda'},
				{value: 'RS', text: 'Serbia'},
				{value: 'TL', text: 'Timor-Leste'},
				{value: 'RE', text: 'Reunion'},
				{value: 'LU', text: 'Luxembourg'},
				{value: 'TJ', text: 'Tajikistan'},
				{value: 'RO', text: 'Romania'},
				{value: 'PG', text: 'Papua New Guinea'},
				{value: 'GW', text: 'Guinea-Bissau'},
				{value: 'GU', text: 'Guam'},
				{value: 'GT', text: 'Guatemala'},
				{value: 'GS', text: 'South Georgia and the South Sandwich Islands'},
				{value: 'GR', text: 'Greece'},
				{value: 'GQ', text: 'Equatorial Guinea'},
				{value: 'GP', text: 'Guadeloupe'},
				{value: 'JP', text: 'Japan'},
				{value: 'GY', text: 'Guyana'},
				{value: 'GG', text: 'Guernsey'},
				{value: 'GF', text: 'French Guiana'},
				{value: 'GE', text: 'Georgia'},
				{value: 'GD', text: 'Grenada'},
				{value: 'GB', text: 'United Kingdom'},
				{value: 'GA', text: 'Gabon'},
				{value: 'SV', text: 'El Salvador'},
				{value: 'GN', text: 'Guinea'},
				{value: 'GM', text: 'Gambia'},
				{value: 'GL', text: 'Greenland'},
				{value: 'GI', text: 'Gibraltar'},
				{value: 'GH', text: 'Ghana'},
				{value: 'OM', text: 'Oman'},
				{value: 'TN', text: 'Tunisia'},
				{value: 'JO', text: 'Jordan'},
				{value: 'HR', text: 'Croatia'},
				{value: 'HT', text: 'Haiti'},
				{value: 'HU', text: 'Hungary'},
				{value: 'HK', text: 'Hong Kong'},
				{value: 'HN', text: 'Honduras'},
				{value: 'HM', text: 'Heard Island and McDonald Islands'},
				{value: 'VE', text: 'Venezuela'},
				{value: 'PR', text: 'Puerto Rico'},
				{value: 'PS', text: 'Palestinian Territory'},
				{value: 'PW', text: 'Palau'},
				{value: 'PT', text: 'Portugal'},
				{value: 'SJ', text: 'Svalbard and Jan Mayen'},
				{value: 'PY', text: 'Paraguay'},
				{value: 'IQ', text: 'Iraq'},
				{value: 'PA', text: 'Panama'},
				{value: 'PF', text: 'French Polynesia'},
				{value: 'BZ', text: 'Belize'},
				{value: 'PE', text: 'Peru'},
				{value: 'PK', text: 'Pakistan'},
				{value: 'PH', text: 'Philippines'},
				{value: 'PN', text: 'Pitcairn'},
				{value: 'TM', text: 'Turkmenistan'},
				{value: 'PL', text: 'Poland'},
				{value: 'PM', text: 'Saint Pierre and Miquelon'},
				{value: 'ZM', text: 'Zambia'},
				{value: 'EH', text: 'Western Sahara'},
				{value: 'RU', text: 'Russian Federation'},
				{value: 'EE', text: 'Estonia'},
				{value: 'EG', text: 'Egypt'},
				{value: 'TK', text: 'Tokelau'},
				{value: 'ZA', text: 'South Africa'},
				{value: 'EC', text: 'Ecuador'},
				{value: 'IT', text: 'Italy'},
				{value: 'VN', text: 'Vietnam'},
				{value: 'SB', text: 'Solomon Islands'},
				{value: 'EU', text: 'Europe'},
				{value: 'ET', text: 'Ethiopia'},
				{value: 'SO', text: 'Somalia'},
				{value: 'ZW', text: 'Zimbabwe'},
				{value: 'SA', text: 'Saudi Arabia'},
				{value: 'ES', text: 'Spain'},
				{value: 'ER', text: 'Eritrea'},
				{value: 'ME', text: 'Montenegro'},
				{value: 'MD', text: 'Moldova, Republic of'},
				{value: 'MG', text: 'Madagascar'},
				{value: 'MF', text: 'Saint Martin'},
				{value: 'MA', text: 'Morocco'},
				{value: 'MC', text: 'Monaco'},
				{value: 'UZ', text: 'Uzbekistan'},
				{value: 'MM', text: 'Myanmar'},
				{value: 'ML', text: 'Mali'},
				{value: 'MO', text: 'Macao'},
				{value: 'MN', text: 'Mongolia'},
				{value: 'MH', text: 'Marshall Islands'},
				{value: 'MK', text: 'Macedonia'},
				{value: 'MU', text: 'Mauritius'},
				{value: 'MT', text: 'Malta'},
				{value: 'MW', text: 'Malawi'},
				{value: 'MV', text: 'Maldives'},
				{value: 'MQ', text: 'Martinique'},
				{value: 'MP', text: 'Northern Mariana Islands'},
				{value: 'MS', text: 'Montserrat'},
				{value: 'MR', text: 'Mauritania'},
				{value: 'IM', text: 'Isle of Man'},
				{value: 'UG', text: 'Uganda'},
				{value: 'TZ', text: 'Tanzania, United Republic of'},
				{value: 'MY', text: 'Malaysia'},
				{value: 'MX', text: 'Mexico'},
				{value: 'IL', text: 'Israel'},
				{value: 'FR', text: 'France'},
				{value: 'IO', text: 'British Indian Ocean Territory'},
				{value: 'FX', text: 'France, Metropolitan'},
				{value: 'SH', text: 'Saint Helena'},
				{value: 'FI', text: 'Finland'},
				{value: 'FJ', text: 'Fiji'},
				{value: 'FK', text: 'Falkland Islands (Malvinas)'},
				{value: 'FM', text: 'Micronesia, Federated States of'},
				{value: 'FO', text: 'Faroe Islands'},
				{value: 'NI', text: 'Nicaragua'},
				{value: 'NL', text: 'Netherlands'},
				{value: 'NO', text: 'Norway'},
				{value: 'NA', text: 'Namibia'},
				{value: 'VU', text: 'Vanuatu'},
				{value: 'NC', text: 'New Caledonia'},
				{value: 'NE', text: 'Niger'},
				{value: 'NF', text: 'Norfolk Island'},
				{value: 'NG', text: 'Nigeria'},
				{value: 'NZ', text: 'New Zealand'},
				{value: 'NP', text: 'Nepal'},
				{value: 'NR', text: 'Nauru'},
				{value: 'NU', text: 'Niue'},
				{value: 'CK', text: 'Cook Islands'},
				{value: 'CI', text: "Cote d'Ivoire"},
				{value: 'CH', text: 'Switzerland'},
				{value: 'CO', text: 'Colombia'},
				{value: 'CN', text: 'China'},
				{value: 'CM', text: 'Cameroon'},
				{value: 'CL', text: 'Chile'},
				{value: 'CC', text: 'Cocos (Keeling) Islands'},
				{value: 'CA', text: 'Canada'},
				{value: 'CG', text: 'Congo'},
				{value: 'CF', text: 'Central African Republic'},
				{value: 'CD', text: 'Congo, The Democratic Republic of the'},
				{value: 'CZ', text: 'Czech Republic'},
				{value: 'CY', text: 'Cyprus'},
				{value: 'CX', text: 'Christmas Island'},
				{value: 'CR', text: 'Costa Rica'},
				{value: 'CV', text: 'Cape Verde'},
				{value: 'CU', text: 'Cuba'},
				{value: 'SZ', text: 'Swaziland'},
				{value: 'SY', text: 'Syrian Arab Republic'},
				{value: 'KG', text: 'Kyrgyzstan'},
				{value: 'KE', text: 'Kenya'},
				{value: 'SR', text: 'Suriname'},
				{value: 'KI', text: 'Kiribati'},
				{value: 'KH', text: 'Cambodia'},
				{value: 'KN', text: 'Saint Kitts and Nevis'},
				{value: 'KM', text: 'Comoros'},
				{value: 'ST', text: 'Sao Tome and Principe'},
				{value: 'SK', text: 'Slovakia'},
				{value: 'KR', text: 'Korea,Republic of'},
				{value: 'SI', text: 'Slovenia'},
				{value: 'KP', text: "Korea, Democratic People's Republic of"},
				{value: 'KW', text: 'Kuwait'},
				{value: 'SN', text: 'Senegal'},
				{value: 'SM', text: 'San Marino'},
				{value: 'SL', text: 'Sierra Leone'},
				{value: 'SC', text: 'Seychelles'},
				{value: 'KZ', text: 'Kazakhstan'},
				{value: 'KY', text: 'Cayman Islands'},
				{value: 'SG', text: 'Singapore'},
				{value: 'SE', text: 'Sweden'},
				{value: 'SD', text: 'Sudan'},
				{value: 'DO', text: 'Dominican Republic'},
				{value: 'DM', text: 'Dominica'},
				{value: 'DJ', text: 'Djibouti'},
				{value: 'DK', text: 'Denmark'},
				{value: 'VG', text: 'Virgin Islands, British'},
				{value: 'DE', text: 'Germany'},
				{value: 'YE', text: 'Yemen'},
				{value: 'DZ', text: 'Algeria'},
				{value: 'US', text: 'United States'},
				{value: 'UY', text: 'Uruguay'},
				{value: 'YT', text: 'Mayotte'},
				{value: 'UM', text: 'United States Minor Outlying Islands'},
				{value: 'LB', text: 'Lebanon'},
				{value: 'LC', text: 'Saint Lucia'},
				{value: 'LA', text: "Lao People's Democratic Republic"},
				{value: 'TV', text: 'Tuvalu'},
				{value: 'TW', text: 'Taiwan'},
				{value: 'TT', text: 'Trinidad and Tobago'},
				{value: 'TR', text: 'Turkey'},
				{value: 'LK', text: 'Sri Lanka'},
				{value: 'LI', text: 'Liechtenstein'},
				{value: 'A1', text: 'Anonymous Proxy'},
				{value: 'TO', text: 'Tonga'},
				{value: 'LT', text: 'Lithuania'},
				{value: 'A2', text: 'Satellite Provider'},
				{value: 'LR', text: 'Liberia'},
				{value: 'LS', text: 'Lesotho'},
				{value: 'TH', text: 'Thailand'},
				{value: 'TF', text: 'French Southern Territories'},
				{value: 'TG', text: 'Togo'},
				{value: 'TD', text: 'Chad'},
				{value: 'TC', text: 'Turks and Caicos Islands'},
				{value: 'LY', text: 'Libyan Arab Jamahiriya'},
				{value: 'VA', text: 'Holy See (Vatican City State)'},
				{value: 'VC', text: 'Saint Vincent and the Grenadines'},
				{value: 'AE', text: 'United Arab Emirates'},
				{value: 'AD', text: 'Andorra'},
				{value: 'AG', text: 'Antigua and Barbuda'},
				{value: 'AF', text: 'Afghanistan'},
				{value: 'AI', text: 'Anguilla'},
				{value: 'VI', text: 'Virgin Islands, U.S.'},
				{value: 'IS', text: 'Iceland'},
				{value: 'IR', text: 'Iran, Islamic Republic of'},
				{value: 'AM', text: 'Armenia'},
				{value: 'AL', text: 'Albania'},
				{value: 'AO', text: 'Angola'},
				{value: 'AN', text: 'Netherlands Antilles'},
				{value: 'AQ', text: 'Antarctica'},
				{value: 'AP', text: 'Asia/Pacific Region'},
				{value: 'AS', text: 'American Samoa'},
				{value: 'AR', text: 'Argentina'},
				{value: 'AU', text: 'Australia'},
				{value: 'AT', text: 'Austria'},
				{value: 'AW', text: 'Aruba'},
				{value: 'IN', text: 'India'},
				{value: 'AX', text: 'Aland Islands'},
				{value: 'AZ', text: 'Azerbaijan'},
				{value: 'IE', text: 'Ireland'},
				{value: 'ID', text: 'Indonesia'},
				{value: 'UA', text: 'Ukraine'},
				{value: 'QA', text: 'Qatar'},
				{value: 'MZ', text: 'Mozambique"'}
			],
			
			'loadUsersInTeam':function(){
				var usersInTeam = $resource(base_url + '/user/inteam/:id/', { id: team_id});
				//console.log(usersInTeam.get());
				//this.user=usersInTeam.get();
				self.usersInTeam=usersInTeam.query();
				self.usersInTeam.$promise.then(function (result) {
					self.usersInTeam=result;
					self.isLoading = false;
				});
			},
			


			'loadUsersNotInTeam':function(){
				var loadAllUsersWithNotificationInfo = $resource(base_url + '/user/notification/project/:id/', { id: project_id});
				//console.log(usersInTeam.get());
				//this.user=usersInTeam.get();
				self.usersNotInTeam=loadAllUsersWithNotificationInfo.query();
				self.usersNotInTeam.$promise.then(function (result) {
					self.usersNotInTeam=result;//console.log(result);
					self.isLoading = false;
				});
			},

			'addUserToTeam':function(user_id, team_id){

				var addUser = $resource(base_url + '/user/adduser/:u_id/:t_id/', { u_id: user_id, t_id:team_id});
				addUser.get(function (data){
				
					//self.user= data;
				});
			},

			'removeUserToTeam':function(user){


				var rmUser = $resource(base_url + '/user/removeuser/:u_id/:t_id/', { u_id: user.user_id, t_id:team_id});
				rmUser.get(function (data){

				self.loadUsersNotInTeam();
				self.loadUsersInTeam();



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
						var deferred = $q.defer();
						var curUser = $resource(base_url + '/users/:id/', { id: userId});
						//console.log(curUser.get());
						//this.user=curUser.get();
						temp=curUser.get(function (data){

							
							data.birthday_date=new Date(data.birthday_date);
							

							self.user= data;
							deferred.resolve();
						});
						
						return deferred.promise;
					},

					'loadUsers': function () {
						var deferred = $q.defer();
						if (!self.isLoading) {
							self.isLoading = true;

							self.users = User.query();
							self.users.$promise.then(function (result) {
								self.users=result;
								self.isLoading = false;
								deferred.resolve();
							});
						}
						return deferred.promise;
					},

					'loadUsersAffiliatesPage': function () {
						if (!self.isLoading) {
							self.isLoading = true;

							self.users = User.query();
							self.users.$promise.then(function (result) {
								self.users=result;
								self.isLoading = false;
								$.getScript(base_url+'/assets/js/queen-table.js', function(){});

							});
						}

					},

					// 'loadMore': function () {
					// 	if (self.hasMore && !self.isLoading) {
					// 		self.page += 1;
					// 		self.loadContacts();
					// 	}
					// },
					'updateUser': function (user) {
						var deferred = $q.defer();
						self.isSaving = true;
						User.update({ id:user.id }, user).$promise.then(function() {
							self.isSaving = false;
							toaster.pop('success', 'User ' + user.name + ' Updated');
							deferred.resolve();
						},function(error) {
							toaster.pop('error', 'Plaese check your connection');
						});
						return deferred.promise;
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


app.controller('userProfileSummaryCtrl', function($scope, $resource, Education, Experience, Industry) {
		$scope.user = [],
		$scope.experienceLength = 0,
		$scope.industryLength = 0,
		$scope.educationLength = 0,
		
		$scope.loadCurrentUser = function(){
			var dbElements = ['name', 'last_name', 'birthday_date', 'about_me', 'profile_image', 'marital_status', 'phone_number'];
			var socialMedia = ['facebook_page', 'twitter_page', 'linkedin_page', 'dribble_page', 'gplus_page'];
			var length = dbElements.length + 4;
			var count = 0;
			var social = false;
			
			var res = $resource(base_url +"/experience/user/:id", {id: current_user_id}, {});
			experiences = res.query();
			experiences.$promise.then(function (result) {
				$scope.experienceLength = result.length;
				if($scope.experienceLength > 0) {
					count += 1;
					//$('.completeness-progress').attr('data-transitiongoal', parseInt($('.completeness-progress').attr('data-transitiongoal'))+(1/length)*100).progressbar();
				}
			});
			
			res = $resource(base_url +"/industry/user/:id", {id: current_user_id}, {});
			industries = res.query();
			industries.$promise.then(function (result) {
				$scope.industryLength = result.length;
				if($scope.industryLength > 0) {
					count += 1;
					//$('.completeness-progress').attr('data-transitiongoal', parseInt($('.completeness-progress').attr('data-transitiongoal'))+(1/length)*100).progressbar();
				}
			});
			
			res = $resource(base_url +"/education/user/:id", {id: current_user_id}, {});
			educations = res.query();
			educations.$promise.then(function (result) {
				$scope.educationLength = result.length;
				if($scope.educationLength > 0) {
					count += 1;
					//$('.completeness-progress').attr('data-transitiongoal', parseInt($('.completeness-progress').attr('data-transitiongoal'))+(count/length)*100).progressbar();
				}
			});
			
			var curUser = $resource(base_url + '/users/:id/', { id: current_user_id});
			temp = curUser.get(function (data){		
				$scope.user = data;
				angular.forEach($scope.user, function (value, key) {
					if(dbElements.indexOf(key) >= 0) {
						if(value) {
							count += 1;
						}
					} else if(!social && socialMedia.indexOf(key)>=0 && value)  {
						social = true;
						count += 1;
					}
				});
				$('.completeness-progress').attr('data-transitiongoal', parseInt($('.completeness-progress').attr('data-transitiongoal'))+(count/length)*100).progressbar();
				
			});
		}

	});

    /*app.filter('splitFilter', function() {
        return function(input) {
            var result = "";
            if(input) {
                console.log("input: "+input);
                var titleArray = input.split(' ');
                angular.forEach(titleArray, function(value, key) {
                   if(value.length > 10) {
                       value = value.substring(0, 10)+"...";
                       result += value + " ";
                   } else {
                       result += value + " ";
                   }
                });
                console.log("result: "+result);
                return input;
            }
        }
    });*/


