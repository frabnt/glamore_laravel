@extends('layouts.default')



@section('content')






<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right inplace-editing">
			<div class="container-fluid primary-content ">
				<div class="user-profile ">
					<div class="profile-header-background"><img src={{ asset('assets/img/city.jpg') }} alt="Profile Header Background" /></div>
					<div class="row">
						<div class="col-md-4">


						<div id="editUser">
						    
						</div>


						<script id="editUserTemplate" type="text/template">

						<div class="profile-info-left">
							<div class="text-center">
								<img src={{ asset('assets/img/avatar.png') }} alt="Avatar" class="avatar img-circle" />
								<h2><a href="#" class="editable" models="users" value="<%= name %>" name="name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= name  %> </a>  <a href="#" class="editable" models="users" value="<%= last_name %>" name="last_name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= last_name  %> </a></h2>
							</div>
							<div class="action-buttons">
								<div class="row">
									<div class="col-xs-6">
									<button id="enable" class="btn btn-success btn-block">Disable</button>
									</div>
									<div class="col-xs-6">
										<a href="#" class="btn btn-primary btn-block"><i class="icon ion-android-mail"></i> Message</a>
									</div>
								</div>
							</div>
							<div class="section">

								<h3>About Me</h3>
								<p>	<a href="#" class="editable" models="users" value="<%= about_me %>" name="about_me" data-type="textarea" data-url="" data-pk= "<%=id%>" ><%= about_me %> </a></p>

							</div>
							<div class="section">
								<h3>Personal Details</h3>

								<ul>
									<li>Birthday  <a href="#" class="editable" models="users" value="<%= birthday_date %>" name="birthday_date" data-type="combodate" data-url="" data-pk= "<%=id%>" ><%= birthday_date %> </a></li>
									<li>Marital status <a href="#" id="marital_status" class="editable" models="users" value="<%= marital_status %>" name="marital_status" data-type="select" data-url="" data-pk= "<%=id%>" ><%= marital_status %> </a></li>
								</ul>
							</div>
							<div class="section">
								<h3>Social</h3>
								<ul class="list-unstyled list-social">
									 <li><a href="#"><i class="icon ion-social-twitter"></i><td><a href="#" class="editable" models="users" value="<%= twitter_page %>" name="twitter_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= twitter_page  %> </a></td></a></li>
									<li><a href="#"><i class="icon ion-social-facebook"></i><td><a href="#" class="editable" models="users" value="<%= facebook_page %>" name="facebook_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= facebook_page %> </a></td></a></li>
									<li><a href="#"><i class="icon ion-social-dribbble"></i><td><a href="#" class="editable" models="users" value="<%= dribbble_page %>" name="dribbble_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= dribbble_page  %> </a></td></a></li>
									<li><a href="#"><i class="icon ion-social-linkedin"></i><td><a href="#" class="editable" models="users" value="<%= linkedin_page %>" name="linkedin_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= linkedin_page  %> </a></td></a></li>
								  <li><a href="#"><i class="icon ion-social-googleplus"></i><td><a href="#" class="editable" models="users" value="<%= gplus_page %>" name="gplus_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= gplus_page %> </a></td></a></li>

								</ul>
							</div>
						</div>


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
									<div class="tab-pane fade in active" id="activities">
										<a href="#" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add industry</a>
										<table id="user" class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>Country</td>
													<td><a href="#" id="country" data-type="select2" data-pk="1" data-value="" data-title="Select country"></a></td>
												</tr>
												<tr>
													<td>Postal code</td>
													<td><a href="#" id="postal_code" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter postal code"></a></td>
												</tr>
												<tr>
													<td>Industry</td>
													<td>
														<a href="#" id="industry" data-type="text" data-pk="1" data-value="" data-title="Enter industry"></a>
													</td>
												</tr>

												

												<a href="#" id="options" data-type="checklist" data-pk="1" data-url="/post" data-title="Select options"></a>
												
											</tbody>
										</table>
									</div>		
									<!-- followers -->
									<div class="tab-pane fade" id="followers">
										<a href="#" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Experience</a>
										<table id="user" class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>Company name</td>
													<td><a href="#" id="company_name" data-type="text" data-pk="1" data-value="" data-title="Enter company name"></a></td>
												</tr>
												<tr>
													<td>Title</td>
													<td><a href="#" id="title" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter title"></a></td>
												</tr>
												<tr>
													<td>Location</td>
													<td>
														<a href="#" id="location" data-type="text" data-pk="1" data-value="" data-title="Enter location"></a>
													</td>
												</tr>
												<tr>
													<td>Date start</td>
													<td>
														<a href="#" id="date_start" data-type="combodate" data-value="1984-05-23" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
													</td>
												</tr>
												<tr>
													<td>Date end</td>
													<td>
														<a href="#" id="date_end" data-type="combodate" data-value="1984-05-23" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
													</td>
												</tr>

												<tr>
													<td>I currently work here</td>
													<td>
														<a href="#" id="currently_work_here" data-type="checklist" data-pk="1" data-url="/post" data-title="Select options"></a>

													</td>
												</tr>

												<tr>
													<td>Description</td>
													<td>
														<a href="#" id="description" data-type="textarea" data-pk="1">awesome comment!</a>

													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- end followers -->
									<!-- following -->
									<div class="tab-pane fade" id="following">
									<a href="#" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Education</a>
										<table id="user" class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>School</td>
													<td><a href="#" id="school" data-type="text" data-pk="1" data-value="" data-title="Enter company name"></a></td>
												</tr>
												<tr>
													<td>Dates Attended</td>
														<td>
															<a href="#" id="edu_date_start" data-type="combodate" data-value="1984-05-23" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
														
														/
															<a href="#" id="edu_date_end" data-type="combodate" data-value="1984-05-23" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
														</td>	
													</tr>
												</tr>
												<tr>
													<td>Degree</td>
													<td>
														<a href="#" id="degree" data-type="text" data-pk="1" data-value="" data-title="Enter location"></a>
													</td>
												</tr>
												<tr>
													<td>Field of Study</td>
													<td>
														<a href="#" id="field_of_study" data-type="text" data-pk="1" data-value="" data-title="Enter location"></a>
													</td>
												</tr>
												<tr>
													<td>Grade</td>
													<td>
														<a href="#" id="grade" data-type="text" data-pk="1" data-value="" data-title="Enter location"></a>
													</td>
												</tr>

												<tr>
													<td>Activities and Societies</td>
													<td>
														<a href="#" id="activities_and_societies" data-type="text" data-pk="1" data-value="" data-title="Enter location"></a>

													</td>
												</tr>

												<tr>
													<td>Description</td>
													<td>
														<a href="#" id="edu_description" data-type="textarea" data-pk="1">awesome comment!</a>

													</td>
												</tr>
											</tbody>
										</table>
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
    
   





//Collections   		
var url='/{{Config::get('backbone.collection_users')}}';
console.log(url);
//Collections
App.Collections.Users= Backbone.Collection.extend({
	model:App.Models.User,
	url:url
});

//Router

        new App.Router;
       
        Backbone.history.start();
       
        //Users
        App.users= new App.Collections.Users;

        App.users.fetch().then(function(){
        
        new App.Views.App({collection: App.users });    
        });






//VIEWS

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


// views

App.Views.App=Backbone.View.extend({

    initialize: function(){
    
    // users
    vent.on('user:edit', this.editUser, this);

   
    },


    editUser: function(users){

        var editUserView= new App.Views.EditUser({model: users});
        $('#editUser').html(editUserView.el);
    }

    });




        // istanzo la view user singola
        $.getJSON('{{Config::get('app.url')}}public/users/1', function(data) {
        //console.log(data);
        var user= new App.Models.User(data);
        //user.fetch();
        //console.log(user);
        var editUser= new App.Views.EditUser({ model: user});
        $('#editUser').html(editUser.el);
        });


 $(document).ready(function() {

// Imposto i campi editabili
    function editableEnabler(){



        setTimeout(function(){ 

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





            
        	// tutti gli altri campi		
            $('.editable').editable({

                success: function(response, newValue) {   

                        
                        var id=$(this).attr('data-pk');
                        var name=$(this).attr('name');
                        var modelsName= $(this).attr('models');
                  console.log(newValue);

                        switch (modelsName){
                            case 'users':
                                var model= App.users.get(id).set(name, newValue);
                            break;

                            case 'contacts':
                                var model= App.contacts.get(id).set(name, newValue);
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

        }, 1000);
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