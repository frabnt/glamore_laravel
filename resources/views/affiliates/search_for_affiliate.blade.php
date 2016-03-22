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
<div id="col-right" class="col-right inplace-editing">
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
			

			<script id="allUsersTemplate" type="text/template">
					<td><%= name %></td>
					<td><%= last_name %></td>
					<td><%= birthday_date %></td>
					<td><%= marital_status %></td>
					<td><%= email %></td>
					<td><%= twitter_page %></td>
					<td><%= facebook_page %></td>
			</script>


<table id="datatable-column-interactive" class="table table-sorting table-hover table-bordered colored-header datatable allUsers">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>



<script src={{ asset('assets/js/main.js') }}></script>
<script src={{ asset('assets/js/models.js') }}></script>
<script src={{ asset('assets/js/collections.js') }}></script>
<script src={{ asset('assets/js/router.js') }}></script>
 
<script src={{ asset('assets/js/plugins/jquery.confirm.min.js') }}></script>

<script src={{ asset("assets/js/plugins/datatable/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatable/exts/dataTables.colVis.bootstrap.js") }}></script>
<script src={{ asset("assets/js/plugins/datatable/exts/dataTables.colReorder.min.js") }}></script>	
<script src={{ asset("assets/js/plugins/datatable/exts/dataTables.tableTools.min.js") }}></script>	
<script src={{ asset("assets/js/plugins/datatable/dataTables.bootstrap.js") }}></script>	
 




@stop


@section('script')
 <script >
    
   





//Collections   	**********************************************************************************************************************************

//User collection	


App.Collections.Users= Backbone.Collection.extend({
	model:App.Models.User,
	url:'{{Config::get('app.url')}}{{Config::get('backbone.collection_users')}}'
});





// //Router 

        new App.Router;
       
        Backbone.history.start();





        
        //Users
        App.users= new App.Collections.Users;

        App.users.fetch().then(function(){

        //load script table functionity
        
        $.getScript('{{ asset("assets/js/queen-table.js") }}', function(){});


        	//console.log(App.users);
        
        new App.Views.App({collection: App.users});    

        });






//VIEWS  **********************************************************************************************************************************



// MAIN VIEW *******************************************************************************************************************************


App.Views.App=Backbone.View.extend({

    initialize: function(){	
    vent.on('user:edit', this.editUser, this);
    //var addUsersView= new App.Views.AddUser({ collection: App.users});
    var allUsersView = new App.Views.Users({ collection: App.users}).render();
    $('.allUsers').append(allUsersView.el); // appendo la lista dei contatti nella tabella

    },

    editUser: function(users){

        var editUserView= new App.Views.EditUser({model: users});
        $('#editUser').html(editUserView.el);
    }
    
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

App.Views.User= Backbone.View.extend({
    tagName:'tr',

    template: template('allUsersTemplate'),

    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        //this.model.on('change', this.render, this); 
    },

    events:{
        'click a.usr_delete': 'deleteUser',
        'click a.edit': 'editUser'
    },

    editUser: function(){
        vent.trigger('user:edit', this.model);


    },


    
    
    deleteUser: function(){

    
    var self=this;
    

    $.confirm({
        text: "Are you sure you want to delete that user?",
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


    reload_js:function(src) {
 	    $('script[src="' + src + '"]').remove();
 	    $('<script>').attr('src', src).appendTo('head');
 	},

    render: function(){
        this.$el.html(this.template(this.model.toJSON()));

 	


 	 // reload_js('{{ asset("assets/js/plugins/datatable/jquery.dataTables.min.js") }}');
   //   reload_js('{{ asset("assets/js/plugins/datatable/exts/dataTables.colVis.bootstrap.js") }}');
   //   reload_js('{{ asset("assets/js/plugins/datatable/exts/dataTables.colReorder.min.js") }}');
   //   reload_js('{{ asset("assets/js/plugins/datatable/exts/dataTables.tableTools.min.js") }}');
   //   reload_js('{{ asset("assets/js/plugins/datatable/dataTables.bootstrap.js") }}');
    // this.reload_js('{{ asset("assets/js/queen-table.js") }}');

     //console.log("reloaded");
        return this;
    },

    unrender: function(){
        this.remove(); //this.$el.remove();
    }
});

// Add user View

App.Views.AddUser= Backbone.View.extend({
    el:'#addUser',

    initialize: function(){

        // this.school = $('#school');
        // this.degree = $('#degree');
        // this.grade = $('#grade');
        // this.activities_and_societies = $('#activities_and_societies');
        // this.description = $('#edu_description');
        // this.date_end = $('#edu_date_end');
        // this.date_start = $('#edu_date_start');
        // this.field_of_study = $('#field_of_study');
        // this.user_id=$('#edu_user_id');
        

    },

    events:{
        'submit':'addUser'
    },

    addUser: function(e){
        e.preventDefault();

        //Create contact 
        this.collection.create({


            // school: this.school.val(),
            // degree: this.degree.val(),
            // grade: this.grade.val(),
            // activities_and_societies: this.activities_and_societies.val(),
            // description: this.description.val(),
            // date_end: this.date_end.val(),
            // date_start: this.date_start.val(),
            // field_of_study: this.field_of_study.val(),

            // user_id:this.user_id.val(),

        }, {wait: true}); //wait the server for save id in attribute
        this.clearForm();
    },

    clearForm: function(){

        // this.school.val('');
        // this.degree.val('');
        // this.grade.val('');
        // this.activities_and_societies.val('');
        // this.description.val('');
        // this.date_end.val('');
        // this.date_start.val('');
        // this.field_of_study.val('');
        
       // $('#addEducation').fadeOut();

    }
});


//All users View

App.Views.Users=Backbone.View.extend({
    
    tagName: 'tbody',

    initialize: function(){
        this.collection.on('add', this.addOne, this); // sync when return data from server

    },

    render: function(){
        //this.$el.empty();
        this.collection.each(this.addOne, this);
        return this;
    },

    addOne: function(user){
        var userView= new App.Views.User({ model:user});
        this.$el.append(userView.render().el);
    }

});





 
        </script>
@stop        