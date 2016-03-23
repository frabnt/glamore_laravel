@extends('layouts.default')



@section('content')



<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right ">
			<div class="container-fluid primary-content">
				<!-- PRIMARY CONTENT HEADING -->
				<div class="primary-content-heading clearfix">
					<h2>PROJECTS</h2>
					<ul class="breadcrumb pull-left">
						<li><i class="icon ion-home"></i><a href="#">Home</a></li>
						<li><a href="#">Pages</a></li>
						<li class="active">Projects</li>
					</ul>
					
					<!-- quick task modal -->
					<div class="modal fade" id="quick-task-modal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Create Project</h4>
								</div>
								<div class="modal-body">
									<form id="addProject" class="form-horizontal" role="form">
										<div class="form-group">
											<label for="title" class="control-label sr-only">Title</label>
											<div class="col-sm-12">
												<input type="text" class="form-control" id="title" placeholder="Title">
											</div>
										</div>
										<div class="form-group">
											
											<div class="col-sm-12">
												<input type="number" class="form-control" id="duration_day" placeholder="Days to Deadline">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label sr-only">Description</label>
											<div class="col-sm-12">
												<textarea class="form-control" id="description" name="task-description" rows="5" cols="30" placeholder="Description"></textarea>
											</div>
										</div>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save Project</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- end quick task modal -->
				</div>
				<!-- END PRIMARY CONTENT HEADING -->
				<div class="project-list-subheading">
					<p class="lead">You're involved in <span class="label label-success">4 active</span> projects, <span class="label label-warning">2 pending</span> and <span class="label label-default">2 closed</span></p>
					<button type="button" data-toggle="modal" data-target="#quick-task-modal" class="btn btn-primary pull-right btn-new-project"><i class="icon ion-compose"></i> CREATE NEW PROJECT</button>
				</div>


				<script id="allProjectsTemplate" type="text/template">
					<td><a href="{{URL::to('project-detail/')}}/<%= id %>"><%= title %></a></td>
					<td><%= date_start %></td>
					<td><%= duration_day %> days</td>
					<td><div class="progress">
						<div class="progress-bar" data-transitiongoal="<%= progress %>" aria-valuenow="<%= progress %>" style="width: <%= progress %>%;"><%= progress %>% </div>
					</td></div>
					<td><span class="label <%= class_priority %>"><%= priority %></span></td>
					<td><img src="{{ asset('/assets/upload/img/user')}}/{{ $user->profile_image or 'avatar.png' }}" alt="Avatar" class="avatar"> <a href="#">{{ $user->name}} </a></td>
					<td><span class="label <%= class_status %>"><%= status %></span></td>
					<td><a href="#projects/<%= id %>" class="prj_delete btn btn-primary btn-block" >Delete </a></td>
				</script>

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
						
					</table>
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
	<script src={{ asset('assets/js/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}></script>



@stop


@section('script')
<script> window.user_id = {!! auth()->user()->id !!}; </script>
 <script >
 


   
//Collections   	**********************************************************************************************************************************

//User collection	


App.Collections.Projects= Backbone.Collection.extend({
	model:App.Models.Project,
	url:'{{Config::get('app.url')}}{{Config::get('backbone.collection_projects')}}'
});



// Carico i project by user id
$.getJSON("{{Config::get('app.url')}}{{Config::get('backbone.collection_projects_by_user_id')}}/"+user_id, function(data) {
App.projects= new App.Collections.Projects(data);
console.log(data);
});



// //Router 

        new App.Router;
       
        Backbone.history.start();





        
        //Users
        App.projects= new App.Collections.Projects;

        App.projects.fetch().then(function(){

        //load script table functionity
        
        


        	//console.log(App.users);
        
        new App.Views.App({collection: App.projects});    

        });






//VIEWS  **********************************************************************************************************************************



// MAIN VIEW *******************************************************************************************************************************


App.Views.App=Backbone.View.extend({

    initialize: function(){	
    vent.on('project:edit', this.editProject, this);
    var addProjectsView= new App.Views.AddProject({ collection: App.projects});
    var allProjectsView = new App.Views.Projects({ collection: App.projects}).render();
    $('#allProjects').append(allProjectsView.el); // appendo la lista dei contatti nella tabella

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

App.Views.Project= Backbone.View.extend({
    tagName:'tr',

    template: template('allProjectsTemplate'),

    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        //this.model.on('change', this.render, this); 
    },

    events:{
        'click a.prj_delete': 'deleteProject',
        'click a.edit': 'editProject'
    },

    editProject: function(){
        vent.trigger('project:edit', this.model);


    },


    
    
    deleteProject: function(){

    
    var self=this;
    

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
            //this.model.destroy();
            self.model.destroy();
        },
        cancel: function() {
            // nothing to do
        }
    });

    },

    render: function(){
        this.$el.html(this.template(this.model.toJSON()));

        return this;
    },

    unrender: function(){
        this.remove(); //this.$el.remove();
    }
});

// Add project View

App.Views.AddProject= Backbone.View.extend({
    el:'#addProject',

    initialize: function(){

        this.title = $('#title');
        this.description = $('#description');
        this.date_start = moment();
        this.duration_day=$('#duration_day');
        this.progress="";
        this.priority="";
        //this.client=$('#client');
        this.status="";
        this.date_end = "";
        //this.team_id=;
        this.user_id="";


    },

    getProgress:function(){

    	return "0";
    },
    getEndDate:function(date, amount){
    	
    	
		return moment(date).add(amount, 'day');
    },

    events:{
        'submit':'addProject'
    },

    addProject: function(e){
        e.preventDefault();

        //Create contact 
        this.collection.create({

        title: this.title.val(),
        description: this.description.val(),
        date_start: this.date_start.format("YYYY-MM-DD"),
        date_end: this.getEndDate(this.date_start, this.duration_day),
        duration_day: this.duration_day.val(),
        progress: this.getProgress(),
        priority: "LOW",
        //client: this.client.val(),
        status: "ACTIVE",
        //team_id: this.team_id.val(),
        user_id: user_id,
        class_priority:"label-success",
        class_status:"label-success",

            

        }, {wait: true}); //wait the server for save id in attribute
        this.clearForm();
    },

    clearForm: function(){

        
        this.title.val('');
        this.description.val('');
        //this.date_start.val('');
        //this.date_end.val('');
        this.duration_day.val('');
        // this.progress.val('');
        // this.priority.val('');
        //this.client.val('');
        // this.status.val('');
        // this.team_id.val('');
        // this.user_id.val('');

    }
});


//All project View

App.Views.Projects=Backbone.View.extend({
    
    tagName: 'tbody',

    initialize: function(){
        this.collection.on('add', this.addOne, this); // sync when return data from server

    },

    render: function(){
        //this.$el.empty();
        this.collection.each(this.addOne, this);
        return this;
    },

    addOne: function(project){
        var projectView= new App.Views.Project({ model:project});
        this.$el.append(projectView.render().el);
    }

});






 
</script>
@stop        