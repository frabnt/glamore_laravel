@extends('layouts.default')



@section('content')

{{--content: url({{ asset('assets/img/camera.svg') }}); --}}

<!-- <a href="#" editable-text="industry.country"  onaftersave="updateIndustry(industry)" ><% industry.country %></a>
 -->
<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right ">
			<div class="container-fluid primary-content">
				<div ng-controller="userCtrl" ng-init='currentUser(); uploadProfileImages()' ng-show="users.user.name !=''" class="user-profile">
	<style>
	.profile-header-background{
	height: 310px;
	background: url("{{ asset('/assets/upload/img/user')}}/<% users.user.background_image || 'city.jpg' %>");
	background-repeat:no-repeat;
	background-size: cover;
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
					<div class="row">
						<div class="col-md-4">
						
						<div   class="profile-info-left">
							<div  class="text-center">
<!-- 							<div class="spinner"
							     ng-show="user.isLoading" >
								<span us-spinner="{radius:8, width:5, length: 3, lines:9}" ></span >

								<p >Loading...</p >
							</div > -->
								<div id="imgprofile" class="ion-ios-reverse-camera hide"></div>
								<img   ng-src="{{ asset('/assets/upload/img/user')}}/<% users.user.profile_image || 'avatar.png' %>" alt="Avatar" class="avatar img-circle" />
								<h2><a href="#" editable-text="users.user.name"  onaftersave="users.updateUser(users.user)" ><% users.user.name|| "empty" %></a>  <a href="#" editable-text="users.user.last_name"  onaftersave="users.updateUser(users.user)" ><% users.user.last_name|| "empty" %></a></h2>
							</div>
							<div class="action-buttons">
								<div class="row">
									<div class="col-xs-6">
<!-- 									<button id="enable" class="btn btn-success btn-block">Disable Edit</button>
 -->									</div>
									{{-- <div class="col-xs-6"> <a  class="btn btn-primary btn-block"><i class="icon ion-android-mail"></i> Message</a> </div>  --}}
								</div>
							</div>
							<div class="section">
								
								<input class='hide' id="profile_image" type="file" >
								<input class='hide' id="background_image" type="file"   name="background_image" > 


								<h3>About Me</h3>
								<p>	<a href="#" editable-textarea="users.user.about_me"  onaftersave="users.updateUser(users.user)" ><% users.user.about_me || "empty" %></a></p>

							</div>
							<div class="section">
								<h3>Personal Details</h3>

								<ul>
									<li>Birthday  <a href="#" editable-date="users.user.birthday_date" data-format="yy-mm-dd" data-viewformat="dd/mm/yyyy" onaftersave="users.updateUser(users.user)" ><% users.user.birthday_date  || "empty" | date:"dd/MM/yyyy" %></a></li>
									<li>Marital status <a href="#" editable-select="users.user.marital_status" e-ng-options="s.value as s.text for s in users.marital_status"  onaftersave="users.updateUser(users.user)" ><% showMaritalStatus() %></a></li>
									
								</ul>
							</div>
							<div class="section">
								<h3>Social</h3>
								<ul class="list-unstyled list-social">
									 <li><a ><i class="icon ion-social-twitter"></i><td><a href="#" editable-text="users.user.twitter_page"  onaftersave="users.updateUser(users.user)" ><% users.user.twitter_page|| "empty" %></a></td></a></li>
									<li><a ><i class="icon ion-social-facebook"></i><td><a href="#" editable-text="users.user.facebook_page"  onaftersave="users.updateUser(users.user)" ><% users.user.facebook_page|| "empty" %></a></td></a></li>
									<li><a ><i class="icon ion-social-dribbble"></i><td><a href="#" editable-text="users.user.dribbble_page"  onaftersave="users.updateUser(users.user)" ><% users.user.dribbble_page|| "empty" %></a></td></a></li>
									<li><a ><i class="icon ion-social-linkedin"></i><td><a href="#" editable-text="users.user.linkedin_page"  onaftersave="users.updateUser(users.user)" ><% users.user.linkedin_page|| "empty" %></a></td></a></li>
								  <li><a ><i class="icon ion-social-googleplus"></i><td><a href="#" editable-text="users.user.gplus_page"  onaftersave="users.updateUser(users.user)" ><% users.user.gplus_page|| "empty" %></a></td></a></li>

								</ul>
							</div>
						</div>
						



						</div>
						<div class="col-md-8">
							<div class="profile-info-right">
								<ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
									<li class="active"><a href="#following" data-toggle="tab">EDUCATION</a></li>
									<li><a href="#followers" data-toggle="tab">EXPERIENCE</a></li>
									<li><a href="#activities" data-toggle="tab">INDUSTRY</a></li>
								</ul>
								<div  class="tab-content">
									<div class="tab-pane fade " id="activities">
									
									

									
								<div ng-controller="industryCtrl">
									<!-- industry -->
										<a id="addIndustryButton"  ng-click="showForm()" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Industry</a>
								
									<form novalidate  ng-submit="createIndustry(industries.industry)"  id="addIndustry" class="form-horizontal hide" role="form">
										<fieldset>
											<legend>Add Industry</legend>
											<div class="form-group">
												<label for="country" class="col-sm-3 control-label">Country</label>
												<div class="col-sm-9">
													<input  type="text" ng-model="industries.industry.country" ng-init="industries.industry.country=''" class="form-control" name="country" id="country" placeholder="Title">
												</div>
											</div>
											<div class="form-group">
												<label for="postal_code" class="col-sm-3 control-label">Postal code</label>
												<div class="col-sm-9">
													<input type="number" ng-model="industries.industry.postal_code" class="form-control" name="postal_code" id="postal_code" placeholder="Title">
												</div>
											</div>
											<div class="form-group">
												<label for="industry" class="col-sm-3 control-label">Industry</label>
												<div class="col-sm-9">
													<input type="text" required ng-model="industries.industry.industry" class="form-control" name="industry" id="industry" placeholder="industry">
												</div>
											</div>
													<div class="form-group">
														<div class="col-sm-offset-3 col-sm-9">
															
															<input id="submitIndustryButton" ng-click="hideForm()" type="submit"  class="btn btn-primary btn-block" value="Save Industry">
									
														</div>
														
													</div>
												</fieldset>
											</form>
				
											<!-- <a href="#" editable-text="user.name">{{-- user.name || "empty" --}}</a> -->
												
											<div ng-repeat='industry in industries.industries'>
											<legend><% industry.industry %></legend>  
											<table class="table table-bordered table-striped">
											    <tr> <td>Country</td>
											    <td> <a href="#" editable-text="industry.country"  onaftersave="updateIndustry(industry)" ><% industry.country || "empty"%></a></td></tr>
											    <tr><td>Postal code</td>
											    <td><a href="#" editable-number="industry.postal_code"  onaftersave="updateIndustry(industry)"><% industry.postal_code || "empty"%></a></td></tr>
											    <tr><td>Industry</td>
											    <td><a href="#" editable-text="industry.industry" e-required onaftersave="updateIndustry(industry)"><% industry.industry || "empty"%></a></td></tr>
											<tr><a ng-click="deleteIndustry(industry)" class="ind_delete btn btn-primary btn-block" >Delete </a></tr>
											</table>
											</div>
											</div>

											<!-- end industry -->
									</div>

									<div class="tab-pane fade in active" id="following">
									<!-- education -->
									<div ng-controller="educationCtrl">
									 <a id="addEducationButton" ng-click="showForm()" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Education</a>

									

									<form novalidate  ng-submit="createEducation(educations.education)" id="addEducation" class="form-horizontal hide" role="form">
										<fieldset>
											<legend>Add Education</legend>
											<div class="form-group">
												<label for="school" class="col-sm-3 control-label">School</label>
												<div class="col-sm-9">
													<input type="text" ng-model="educations.education.school" required ng-init="educations.education.school=''" class="form-control" name="school" id="school" placeholder="School">
												</div>
											</div>
											<div class="form-group">
												<label for="edu_date_start" class="col-sm-3 control-label">Date start</label>
												<div class="col-sm-9">
													<input type="date" required ng-model="educations.education.date_start"  name="edu_date_start" class="form-control" id="edu_date_start" placeholder="Date start">
												</div>
											</div>
											<div class="form-group">
												<label for="edu_date_end" class="col-sm-3 control-label">Date end</label>
												<div class="col-sm-9">
													<input type="date" required ng-model="educations.education.date_end"  name="edu_date_end" class="form-control" id="edu_date_end" placeholder="Date end">
												</div>
											</div>
											<div class="form-group">
												<label for="degree" class="col-sm-3 control-label">Degree</label>
												<div class="col-sm-9">
													<input type="text"  ng-model="educations.education.degree" ng-init="educations.education.degree=''" class="form-control" name="degree" id="degree" placeholder="Degree">
												</div>
											</div>
											<div class="form-group">
												<label for="field_of_study" class="col-sm-3 control-label">Field of Study</label>
												<div class="col-sm-9">
													<input type="text"  ng-model="educations.education.field_of_study" ng-init="educations.education.field_of_study=''" class="form-control" name="field_of_study" id="field_of_study" placeholder="Field of Study">
												</div>
											</div>

											<div class="form-group">
												<label for="grade" class="col-sm-3 control-label">Grade</label>
												<div class="col-sm-9">
													<input type="text" ng-model="educations.education.grade" ng-init="educations.education.grade=''" class="form-control" name="grade" id="grade" placeholder="Grade">
												</div>
											</div>

											<div class="form-group">
												<label for="activities_and_societies" class="col-sm-3 control-label">Activities and Societies</label>
												<div class="col-sm-9">
													<input type="text"  ng-model="educations.education.activities_and_societies" ng-init="educations.education.activities_and_societies=''" class="form-control" name="activities_and_societies" id="activities_and_societies" placeholder="Activities and Societies">
												</div>
											</div>
											<div class="form-group">
												<label for="description" class="col-sm-3 control-label">Description</label>
												<div class="col-sm-9">
													<input type="textarea"  ng-model="educations.education.description" ng-init="educations.education.description=''" class="form-control" name="description" id="edu_description" placeholder="Description">
												</div>
											</div>
													<div class="form-group">
														<div class="col-sm-offset-3 col-sm-9">
															
															<input id="submitEducationButton" type="submit" class="btn btn-primary btn-block" value="Save Education">
									
														</div>
														
													</div>
												</fieldset>
											</form>

											<div ng-repeat='education in educations.educations'>
											<legend><% education.school %></legend>  
											<table class="table table-bordered table-striped">
											    <tr><td>School</td>
											    <td> <a  href="#" editable-text="education.school" e-required onaftersave="updateEducation(education)" ><% education.school || "empty" %> </a> </td></tr>
											    <tr><td>Dates Attended</td>
											    <td><a  href="#" editable-date="education.date_start" e-required data-format="yy-mm-dd" data-viewformat="dd/mm/yyyy" onaftersave="updateEducation(education)" ><%  education.date_start || "empty" | date:"dd/MM/yyyy" %></a> /
												    <a  href="#" editable-date="education.date_end"   e-required data-format="yy-mm-dd" data-viewformat="dd/mm/yyyy" onaftersave="updateEducation(education)" ><%  education.date_end || "empty" | date:"dd/MM/yyyy" %></a></td></tr>	
												<tr><td>Degree</td> 
											    <td><a  href="#" editable-text="education.degree"   onaftersave="updateEducation(education)" ><% education.degree || "empty"%></a></td></tr>
											    <tr><td>Field of Study</td>
											    <td><a  href="#" editable-text="education.field_of_study"  onaftersave="updateEducation(education)"><% education.field_of_study || "empty" %></a></td></tr>
											    <tr><td>Grade</td>
											    <td><a  href="#" editable-text="education.grade"  onaftersave="updateEducation(education)" ><% education.grade || "empty" %></a></td></tr>
											    <tr><td>Activities and Societies</td>
											    <td><a  href="#" editable-text="education.activities_and_societies"  onaftersave="updateEducation(education)"><% education.activities_and_societies || "empty" %></a></td></tr>
											    <tr><td>Description</td>
											    <td><a  href="#" editable-textarea="education.description"  onaftersave="updateEducation(education)"><% education.description || "empty" %></a></td></tr>
											<tr><a  ng-click="deleteEducation(education)" class=" btn btn-primary btn-block" >Delete </a></tr>
											</table>
											<!-- end education -->
										</div>
									</div>
									</div>
									
									
									<div class="tab-pane fade" id="followers">

									<div ng-controller="experienceCtrl">
									<!-- experience -->
									 <a id="addExperienceButton" ng-click="showForm()" class="btn btn-primary btn-block"><i class="icon ion-plus-circled"></i>Add Experience</a>

									

									<form novalidate  ng-submit="createExperience(experiences.experience)"  id="addExperience" class="form-horizontal hide" role="form">
										<fieldset>
											<legend>Add Experience</legend>
											<div class="form-group">
												<label for="company_name" class="col-sm-3 control-label">Company name</label>
												<div class="col-sm-9">
													<input type="text" required ng-model="experiences.experience.company_name" ng-init="experiences.experience.company_name=''" class="form-control" name="company_name" id="company_name" placeholder="Title">
												</div>
											</div>
											<div class="form-group">
												<label for="title" class="col-sm-3 control-label">Title</label>
												<div class="col-sm-9">
													<input type="text" ng-model="experiences.experience.title" ng-init="experience.industry.title=''" class="form-control" name="title" id="title" placeholder="Title">
												</div>
											</div>
											<div class="form-group">
												<label for="exp_date_start"  class="col-sm-3 control-label">Date start</label>
												<div class="col-sm-9">
													<input type="date" required ng-model="experiences.experience.date_start"  name="exp_date_start" class="form-control" id="exp_date_start" placeholder="Date start">
												</div>
											</div>
											<div class="form-group">
												<label for="exp_date_end" class="col-sm-3 control-label">Date end</label>
												<div class="col-sm-9">
													<input type="date" required ng-model="experiences.experience.date_end" name="exp_date_end" class="form-control" id="exp_date_end" placeholder="Date end">
												</div>
											</div>
											<div class="form-group">
												<label for="location" class="col-sm-3 control-label">Location</label>
												<div class="col-sm-9">
													<input type="text" ng-model="experiences.experience.location" ng-init="experiences.experience.location=''" class="form-control" name="location" id="location" placeholder="Location">
												</div>
											</div>
											<div class="form-group">
												<label for="description" class="col-sm-3 control-label">Description</label>
												<div class="col-sm-9">
													<input type="text" ng-model="experiences.experience.description" ng-init="experiences.experience.description=''" class="form-control" name="description" id="exp_description" placeholder="Description">
												</div>
											</div>
											<div class="form-group">
												<label for="currently_work_here" class="col-sm-3 control-label">Currently work here</label>
												<div class="col-sm-9">
													<input type="checkbox" ng-model="experiences.experience.currently_work_here" ng-init="experiences.experience.currently_work_here=false" class="form-control" name="currently_work_here" id="currently_work_here" placeholder="Currently work here">
												</div>
											</div>
				
													<div class="form-group">
														<div class="col-sm-offset-3 col-sm-9">
															
															<input id="submitExperienceButton" ng-click="hideForm()" type="submit" class="btn btn-primary btn-block" value="Save Education">
									
														</div>
														
														
													</div>
												</fieldset>
											</form>

											<div ng-repeat='experience in experiences.experiences'>
											<legend><% company_name %></legend>  
											<table class="table table-bordered table-striped">
												<tr><td>Company name</td>
												<td>  <a  href="#" editable-text="experience.company_name" e-required onaftersave="updateExperience(experience)"><% experience.company_name || "empty"%> </a> </td></tr>
											    <tr><td>Title</td>
											    <td> <a href="#" editable-text="experience.title"  onaftersave="updateExperience(experience)" ><% experience.title || "empty"%> </a> </td></tr>
											    <tr><td>Dates Attended</td>
											    <td><a  href="#" editable-text="experience.date_start" e-required data-format="yy-mm-dd" data-viewformat="dd/mm/yyyy" onaftersave="updateExperience(experience)" ><% experience.date_start || "empty" | date:"dd/MM/yyyy"%></a> /
												    <a  href="#" editable-text="experience.date_end" e-required data-format="yy-mm-dd" data-viewformat="dd/mm/yyyy" onaftersave="updateExperience(experience)" ><% experience.date_end || "empty" | date:"dd/MM/yyyy"%></a></td></tr>	
												<tr><td>Location</td>
											    <td><a  href="#" editable-text="experience.location"  onaftersave="updateExperience(experience)" ><% experience.location || "empty"%></a></td></tr>
											    <tr><td>Currently work here</td>
											    <td><a  href="#" editable-checkbox="experience.currently_work_here" e-title="Currently work here?" onaftersave="updateExperience(experience)"><% experience.currently_work_here && "Work here" || "Don't work here" %></a></td></tr>
											    <tr><td>Description</td>
											    <td><a  href="#" editable-textarea="experience.description"  onaftersave="updateExperience(experience)"><% experience.description || "empty"%></a></td></tr>
											<tr><a ng-click="deleteExperience(experience)" class="exp_delete btn btn-primary btn-block" >Delete </a></tr>
											</table> 
											</div>
								</div>
											<!--end experience -->
									</div>
									
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
	
	@section('footer_script')@parent
	
	<script src={{ asset('assets/js/queen-page.js') }}></script>
	
@stop


@section('script')
 <script >

 $(document).ready(function() {

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

});
        </script>
@stop        