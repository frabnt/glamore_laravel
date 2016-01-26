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
background: url("{{Config::get('app.url')}}{{Config::get('upload.img')}}{{ $user->background_image or 'Default' }}");
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
	
		<div class="user-profile ">
			<div class="profile-header-background">
				<div id="imgbackground" class="ion-ios-reverse-camera hide"></div>
			</div>
			<div class="row">

<div class="col-md-4">
			

				<div id="editUser">
				    
				</div>


				<script id="editUserTemplate" type="text/template">
				
				


				<div class="profile-info-left">
					<div  class="text-center">
						<div id="imgprofile" class="ion-ios-reverse-camera hide"></div>
						<img  src="{{Config::get('app.url')}}{{Config::get('upload.img')}}<%=profile_image%>" alt="Avatar" class="avatar img-circle" />
						<h2><a  class="editable" models="users" value="<%= name %>" name="name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= name  %> </a>  <a  class="editable" models="users" value="<%= last_name %>" name="last_name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= last_name  %> </a></h2>
					</div>
					<div class="action-buttons">
						<div class="row">
							<div class="col-xs-6">
							<button id="enable" class="btn btn-success btn-block">Disable</button>
							</div>
							<div class="col-xs-6">
								<a  class="btn btn-primary btn-block"><i class="icon ion-android-mail"></i> Message</a>
							</div>
						</div>
					</div>
					<div class="section">


						
						<input class='hide' id="profile_image" type="file" models="users"  name="profile_image" data-pk= "<%=id%>">
						<input class='hide' id="background_image" type="file" models="users"  name="background_image" data-pk= "<%=id%>">

						
						


						<h3>About Me</h3>
						<p>	<a  class="editable" models="users" value="<%= about_me %>" name="about_me" data-type="textarea" data-url="" data-pk= "<%=id%>" ><%= about_me %> </a></p>

					</div>
					<div class="section">
						<h3>Personal Details</h3>

						<ul>
							<li>Birthday  <a  class="editable" models="users" value="<%= birthday_date %>" name="birthday_date" data-type="combodate" data-url="" data-pk= "<%=id%>" ><%= birthday_date %> </a></li>
							<li>Marital status <a  id="marital_status" class="editable" models="users" value="<%= marital_status %>" name="marital_status" data-type="select" data-url="" data-pk= "<%=id%>" ><%= marital_status %> </a></li>
						</ul>
					</div>
					<div class="section">
						<h3>Social</h3>
						<ul class="list-unstyled list-social">
							 <li><a ><i class="icon ion-social-twitter"></i><td><a  class="editable" models="users" value="<%= twitter_page %>" name="twitter_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= twitter_page  %> </a></td></a></li>
							<li><a ><i class="icon ion-social-facebook"></i><td><a  class="editable" models="users" value="<%= facebook_page %>" name="facebook_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= facebook_page %> </a></td></a></li>
							<li><a ><i class="icon ion-social-dribbble"></i><td><a  class="editable" models="users" value="<%= dribbble_page %>" name="dribbble_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= dribbble_page  %> </a></td></a></li>
							<li><a ><i class="icon ion-social-linkedin"></i><td><a  class="editable" models="users" value="<%= linkedin_page %>" name="linkedin_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= linkedin_page  %> </a></td></a></li>
						  <li><a ><i class="icon ion-social-googleplus"></i><td><a  class="editable" models="users" value="<%= gplus_page %>" name="gplus_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= gplus_page %> </a></td></a></li>

						</ul>
					</div>
				</div>


				</script>

<script id="allEducationsTemplate" type="text/template">
<legend><%= school %></legend>  
<table class="table table-bordered table-striped">
    <tr><td>School</td>
    <td> <a  class="editable" models="educations" name="school" data-type="text" data-url="" data-pk= "<%=id%>" ><%= school %> </a> </td></tr>
    <tr><td>Dates Attended</td>
    <td><a  class="editable" models="educations" name="date_start" data-type="combodate" data-value="" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="<%=id%>" data-title="Select Date Start"><%= date_start %></a>
	    <a  class="editable" models="educations" name="date_end" data-type="combodate" data-value="" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="<%=id%>" data-title="Select Date End"><%= date_end %></a></td></tr>	
	<tr><td>Degree</td>
    <td><a  class="editable" models="educations" name="degree"  data-type="text" data-pk="<%=id%>" data-value="" data-title="Enter location"><%= degree %></a></td></tr>
    <tr><td>Field of Study</td>
    <td><a  class="editable" models="educations" name="field_of_study" data-type="text" data-pk="<%=id%>" data-value="" data-title="Enter location"><%= field_of_study %></a></td></tr>
    <tr><td>Grade</td>
    <td><a  class="editable" models="educations" name="grade"  data-type="text" data-pk="<%=id%>" data-value="" data-title="Enter location"><%= grade %></a></td></tr>
    <tr><td>Activities and Societies</td>
    <td><a  class="editable" models="educations" name="activities_and_societies"  data-type="text" data-pk="<%=id%>" data-value="" data-title="Enter location"><%= activities_and_societies %></a></td></tr>
    <tr><td>Description</td>
    <td><a  class="editable" models="educations" name="description" data-type="textarea" data-pk="<%=id%>"><%= description %></a></td></tr>
<tr><a href="#educations/<%= id %>" class="edu_delete btn btn-primary btn-block" >Delete </a></tr>
</table>
</script>

</div>
        
	<div class="col-md-8">
		<div class="profile-info-right">
			<ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
			<li class="active"><a href="#following" data-toggle="tab">EDUCATION</a></li>
			<li><a href="#followers" data-toggle="tab">EXPERIENCE</a></li>
			<li><a href="#activities" data-toggle="tab">INDUSTRY</a></li>
				
				
			</ul>
			<div class="tab-content">

				<!-- activities -->
				<div class="tab-pane fade " id="activities">
					<a  class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add industry</a>
					<table id="user" class="table table-bordered table-striped">
						<tbody>
							<tr>
								<td>Country</td>
								<td><a  class="editable" id="country" data-type="select2" data-pk="1" data-value="" data-title="Select country"></a></td>
							</tr>
							<tr>
								<td>Postal code</td>
								<td><a  class="editable" id="postal_code" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter postal code"></a></td>
							</tr>
							<tr>
								<td>Industry</td>
								<td>
									<a  class="editable" id="industry" data-type="text" data-pk="1" data-value="" data-title="Enter industry"></a>
								</td>
							</tr>

							

							<a   id="options" data-type="checklist" data-pk="1" data-url="/post" data-title="Select options"></a>
							
						</tbody>
					</table>
				</div>		
				<!-- followers -->
				<div class="tab-pane fade" id="followers">
					<a  class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Experience</a>
					<table id="user" class="table table-bordered table-striped">
						<tbody>
							<tr>
								<td>Company name</td>
								<td><a  class="editable" id="company_name" data-type="text" data-pk="1" data-value="" data-title="Enter company name"></a></td>
							</tr>
							<tr>
								<td>Title</td>
								<td><a  class="editable" id="title" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter title"></a></td>
							</tr>
							<tr>
								<td>Location</td>
								<td>
									<a  class="editable" id="location" data-type="text" data-pk="1" data-value="" data-title="Enter location"></a>
								</td>
							</tr>
							<tr>
								<td>Date start</td>
								<td>
									<a  class="editable" id="date_start" data-type="combodate" data-value="" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date start"></a>
								</td>
							</tr>
							<tr>
								<td>Date end</td>
								<td>
									<a  class="editable" id="date_end" data-type="combodate" data-value="" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date end"></a>
								</td>
							</tr>

							<tr>
								<td>I currently work here</td>
								<td>
									<a  class="editable" id="currently_work_here" data-type="checklist" data-pk="1" data-url="/post" data-title="Select options"></a>

								</td>
							</tr>

							<tr>
								<td>Description</td>
								<td>
									<a  class="editable" id="description" data-type="textarea" data-pk="1">awesome comment!</a>

								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- end followers -->
				<!-- following -->
				<div class="tab-pane fade in active" id="following">
				<a id="addEducationButton" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Education</a>

				

				<form id="addEducation" class="form-horizontal hide" role="form">
					<fieldset>
						<legend>Add Education</legend>
						<div class="form-group">
							<label for="school" class="col-sm-3 control-label">School</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="school" id="school" placeholder="School">
							</div>
						</div>
						<div class="form-group">
							<label for="edu_date_start" class="col-sm-3 control-label">Date start</label>
							<div class="col-sm-9">
								<input type="date" name="edu_date_start" class="form-control" id="edu_date_start" placeholder="Date start">
							</div>
						</div>
						<div class="form-group">
							<label for="edu_date_end" class="col-sm-3 control-label">Date end</label>
							<div class="col-sm-9">
								<input type="date" name="edu_date_end" class="form-control" id="edu_date_end" placeholder="Date end">
							</div>
						</div>
						<div class="form-group">
							<label for="degree" class="col-sm-3 control-label">Degree</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="degree" id="degree" placeholder="Degree">
							</div>
						</div>
						<div class="form-group">
							<label for="field_of_study" class="col-sm-3 control-label">Field of Study</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="field_of_study" id="field_of_study" placeholder="Field of Study">
							</div>
						</div>

						<div class="form-group">
							<label for="grade" class="col-sm-3 control-label">Grade</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="grade" id="grade" placeholder="Grade">
							</div>
						</div>

						<div class="form-group">
							<label for="activities_and_societies" class="col-sm-3 control-label">Activities and Societies</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="activities_and_societies" id="activities_and_societies" placeholder="Activities and Societies">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="description" id="edu_description" placeholder="Description">
							</div>
						</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										
										<input id="submitEducationButton" type="submit" class="btn btn-primary btn-block" value="Add Education">
   
									</div>
									<input type="hidden" id="edu_user_id" name="user_id" value={{ isset(Auth::user()->id) ? Auth::user()->id:'Not logged'}}>
									
								</div>
							</fieldset>
						</form>


						<div id="allEducations">
						    
						</div>
				</div>
				<!-- end following -->
			</div>
		</div>
	</div>
</div>

				

		</div>
	</div>
	
</div>
		<!-- END COLUMN RIGHT -->



   

				@stop
				<!-- END COLUMN RIGHT -->
				@section('footer_script')



	
	
	
	
	
	<script src={{ asset('assets/js/jquery/jquery-2.1.0.min.js') }}></script>
	<script src={{ asset('assets/js/bootstrap/bootstrap.js') }}></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>



	<script src={{ asset('assets/js/main.js') }}></script>
    <script src={{ asset('assets/js/models.js') }}></script>
    <script src={{ asset('assets/js/collections.js') }}></script>
    <script src={{ asset('assets/js/router.js') }}></script>


	<script src={{ asset('assets/js/plugins/jquery.confirm.min.js') }}></script>


	


	<script src={{ asset('assets/js/queen-page.js') }}></script>
    <script src={{ asset('assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}></script>
	<script src={{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}></script>
	<script src={{ asset('assets/js/queen-common.js') }}></script>
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
   <script src={{ asset('assets/js/plugins/bootstrap-editable/jquery.mockjax.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/moment/moment.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/bootstrap-editable.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/typeahead/typeahead.js') }}></script>
   <script src={{ asset('assets/js/plugins/typeahead/typeaheadjs.1.5.1.js') }}></script>
   <script src={{ asset('assets/js/plugins/select2/select2.min.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/address.custom.js') }}></script>
   <script src={{ asset('assets/js/plugins/bootstrap-editable/demo-mock.js') }}></script>
   <!-- Backbone include -->
    
@stop


@section('script')
 <script >
    
   





//Collections   	**********************************************************************************************************************************

//User collection	


App.Collections.Users= Backbone.Collection.extend({
	model:App.Models.User,
	url:'/{{Config::get('backbone.collection_users')}}'
});

//Education collection	

App.Collections.Educations= Backbone.Collection.extend({
	model:App.Models.Education,
	url:'/{{Config::get('backbone.collection_educations')}}' //{{Auth::user()->id}}
});




//Router 

        new App.Router;
       
        Backbone.history.start();

// istanzo la view user singola
$.getJSON("{{Config::get('app.url')}}public/users/{{ isset(Auth::user()->id) ? Auth::user()->id:'Not logged'}}", function(data) {
//console.log(data);
var user= new App.Models.User(data);
//user.fetch();
//console.log(user);
var editUser= new App.Views.EditUser({ model: user});
$('#editUser').html(editUser.el);
App.users= new App.Collections.Users(data);



});



// Carico le education by user id
$.getJSON("/{{Config::get('backbone.collection_educations_by_user_id')}}/{{ isset(Auth::user()->id) ? Auth::user()->id:'Not logged'}}", function(data) {
App.educations= new App.Collections.Educations(data);
});



        //Educations
        App.educations= new App.Collections.Educations;
        App.educations.fetch();

        //Users
        App.users= new App.Collections.Users;

        App.users.fetch().then(function(){
        
        new App.Views.App({collection: App.users, collecitons: App.educations });    

        });






//VIEWS  **********************************************************************************************************************************
//Edit user View

App.Views.EditUser = Backbone.View.extend({
    template: template('editUserTemplate'),

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



// all educations view
App.Views.Educations=Backbone.View.extend({
    
    tagName: 'div',

    initialize: function(){
        this.collection.on('add', this.addOne, this); // sync when return data from server
           //this.on('render', this.afterRender());
    },

    render: function(){
        //this.$el.empty();
        this.collection.each(this.addOne, this);

        return this;
        

    },
     afterRender: function() { 
        //alert('afterRender'); 
        //this.editableEnablerAfterSave();
    },

    addOne: function(education){
        var educationView= new App.Views.Education({ model:education});
        this.$el.append(educationView.render().el);
        this.editableEnabler(education);
    },
    //here
    editableEnabler: function(education){

    	        	// get file data

    	        	//setTimeout(function(){ 
    				$.fn.editable.defaults.mode = 'inline';
    				
    	        	// tutti gli altri campi		
    	            $('.editable').editable({

    	                success: function(response, newValue) {   
    	                        var id=$(this).attr('data-pk');
    	                        var name=$(this).attr('name');
    	                        var modelsName= $(this).attr('models');
    	                  console.log(id, name,modelsName, newValue);

							education.set(name, newValue);
    	                    //var model= App.educations.get(id).set(name, newValue);
    	                    //console.log(model);

    	                        education.save(name, newValue);
    	                       
    	                   },
    	                   error: function(response, newValue) {
    	                       if(response.status === 500) {
    	                           return 'Service unavailable. Please try later.';
    	                       } else {
    	                           return response.responseText;
    	                       }
    	                   }
    	            }); 
    	             this.editableEnablerAfterSave();
    },

    editableEnablerAfterSave: function(){

    	        	// get file data

    	        	//setTimeout(function(){ 
    				$.fn.editable.defaults.mode = 'inline';
    				
    	        	// tutti gli altri campi		
    	            $('.editable').editable({

    	                success: function(response, newValue) {   
    	                        var id=$(this).attr('data-pk');
    	                        var name=$(this).attr('name');
    	                        var modelsName= $(this).attr('models');
    	                  console.log(id, name,modelsName, newValue);

 
                             var model= App.educations.get(id).set(name, newValue);

                       model.save(name, newValue);


    	                        this.editableEnablerAfterSave();
    	                   },
    	                   error: function(response, newValue) {
    	                       if(response.status === 500) {
    	                           return 'Service unavailable. Please try later.';
    	                       } else {
    	                           return response.responseText;
    	                       }
    	                   }
    	            }); 
    },

});



// Add education View

App.Views.AddEducation= Backbone.View.extend({
    el:'#addEducation',

    initialize: function(){

        this.school = $('#school');
        this.degree = $('#degree');
        this.grade = $('#grade');
        this.activities_and_societies = $('#activities_and_societies');
        this.description = $('#edu_description');
        this.date_end = $('#edu_date_end');
        this.date_start = $('#edu_date_start');
        this.field_of_study = $('#field_of_study');
        this.user_id=$('#edu_user_id');
        

    },

    events:{
        'submit':'addEducation'
    },

    addEducation: function(e){
        e.preventDefault();

        //Create contact 
        this.collection.create({


        	school: this.school.val(),
        	degree: this.degree.val(),
        	grade: this.grade.val(),
        	activities_and_societies: this.activities_and_societies.val(),
        	description: this.description.val(),
        	date_end: this.date_end.val(),
        	date_start: this.date_start.val(),
        	field_of_study: this.field_of_study.val(),

        	user_id:this.user_id.val(),

        }, {wait: true}); //wait the server for save id in attribute
        this.clearForm();
    },

    clearForm: function(){

    	this.school.val('');
    	this.degree.val('');
    	this.grade.val('');
    	this.activities_and_societies.val('');
    	this.description.val('');
    	this.date_end.val('');
    	this.date_start.val('');
    	this.field_of_study.val('');
    	
       // $('#addEducation').fadeOut();

    }
});


//Single education view

App.Views.Education= Backbone.View.extend({
    tagName:'div',

    template: template('allEducationsTemplate'),

    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        this.model.on('change', this.render, this); 
    },

    events:{
        'click a.edu_delete': 'deleteEducation',
        'click a.edit': 'editEducation'
    },

    editEducation: function(){
        vent.trigger('education:edit', this.model)

    },
    
    deleteEducation: function(){

    
    var self=this;
    

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


// MAIN VIEW *******************************************************************************************************************************


App.Views.App=Backbone.View.extend({

    initialize: function(){	
    var addEducationView= new App.Views.AddEducation({ collection: App.educations});
    var allEducationsView = new App.Views.Educations({ collection: App.educations}).render();
    $('#allEducations').append(allEducationsView.el); // appendo la lista dei contatti nella tabella
    
    },
    
    });


        


 $(document).ready(function() {

//Change profile image
 setTimeout(function(){ 


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

 	

//save uploaded image
 	var handleFileSelect = function(evt) {


 	    var files = evt.target.files;
 	    var file = files[0];
 	    var fullPath=document.getElementById($(evt.target).attr('name')).value;

 	    //console.log(fullPath);
 	    var imageName= fullPath.slice(12);



	//if( file.size > 5000000){
	 	//alert("File maggiore di 5 mb");


 	    if (files && file) {

 	        var reader = new FileReader();

 	        reader.onload = function(readerEvt) {
 	           var binaryString = readerEvt.target.result;
 	           var binary = btoa(binaryString);
 	           //console.log(binary);
 	           var id=$(evt.target).attr('data-pk');
 	           var name=$(evt.target).attr('name');
 	           var modelsName= $(evt.target).attr('models');
 	           var model=App.users.get(id);


 	           	model.set(name, imageName );
 	            model.set('upload', binary);
 	           
 	            model.save();
 	           



 	            setTimeout(function(){ 
 	            location.reload();
 	        	}, 500);
 	           //console.log(id+name+modelsName);


 	           

 	           //model.save('upload', binary);
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
 }, 500);


$('#addEducationButton').click(function() {
//alert('ok');
$( "#addEducation" ).removeClass("hide");
$( "#addEducation" ).addClass("show");

});

$('#submitEducationButton').click(function() {
//alert('ok');
$( "#addEducation" ).removeClass("show");
$( "#addEducation" ).addClass("hide");
});


// Imposto i campi editabili
    function editableEnabler(){



        setTimeout(function(){ 


        	// get file data


			$.fn.editable.defaults.mode = 'inline';
			
        	//campo select

        			$('#marital_status').editable({
        	        value: '',    
        	        source: [
        	              {value: '', text: 'Choose...'},
        	              {value: 'Married', text: 'Married'},
        	              {value: 'Single', text: 'Single'}
        	           ],
        	         success: function(response, newValue) {   

        	                 
        	                 var id=$(this).attr('data-pk');
        	                 var name=$(this).attr('name');
        	                 var modelsName= $(this).attr('models');
        	                 var model= App.users.get(id).set(name, newValue);
 
        	                 model.save(name, newValue);
        	                 editableEnabler();
        	            }
        	    });

        			//campo country

        			var countries = [];
        			$.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function(k, v) {
        				countries.push({id: k, text: v});
        			}); 
        			$('#country').editable({
        					source: countries,
        					select2: {
        					width: 200,
        					placeholder: 'Select country',
        					allowClear: true
        				} 
        			});




            
        	// tutti gli altri campi		
            $('.editable').editable({

                success: function(response, newValue) {   
                        var id=$(this).attr('data-pk');
                        var name=$(this).attr('name');
                        var modelsName= $(this).attr('models');
                  console.log(id, name,modelsName, newValue);

                        switch (modelsName){
                            case 'users':
                                var model= App.users.get(id).set(name, newValue);
                            break;

                            case 'educations':
                                var model= App.educations.get(id).set(name, newValue);
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
    	        if(text=='Enable'){
    	            $('#enable').text('Disable');
    	        }else{
    	            $('#enable').text('Enable');
    	        }
    	 
    	});




    }, 1000);

}


editableEnabler();
enableToggle();





});
        </script>
@stop        