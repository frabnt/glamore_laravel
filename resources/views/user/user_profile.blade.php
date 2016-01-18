@extends('layouts.default')

@section('footer_script')@parent
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
    <script src={{ asset('assets/js/main.js') }}></script>
    <script src={{ asset('assets/js/models.js') }}></script>
    <script src={{ asset('assets/js/collections.js') }}></script>
    <script src={{ asset('assets/js/views.js') }}></script>
    <script src={{ asset('assets/js/router.js') }}></script>
@stop

@section('content')


<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right inplace-editing">
			<div class="container-fluid primary-content ">
				<div class="user-profile ">
					<div class="profile-header-background"><img src={{ asset('assets/img/city.jpg') }} alt="Profile Header Background" /></div>
					<div class="row">
						<div class="col-md-4">
							<div class="profile-info-left">
								<div class="text-center">
									<img src={{ asset('assets/img/avatar.png') }} alt="Avatar" class="avatar img-circle" />
									<h2>Jack Bay</h2>
								</div>
								<div class="action-buttons">
									<div class="row">
										<div class="col-xs-6">
											<button id="enable" class="btn btn-success btn-block">Enable / Disable</button>
										</div>
										<div class="col-xs-6">
											<a href="#" class="btn btn-primary btn-block"><i class="icon ion-android-mail"></i> Message</a>
										</div>
									</div>
								</div>
								<div class="section">
									<h3>About Me</h3>
									<p>Energistically administrate 24/7 portals and enabled catalysts for change. Objectively revolutionize client-centered e-commerce via covalent scenarios. Continually envisioneer.</p>
								</div>
								<div class="section">
									<h3>Personal Details</h3>

									<ul>
										<li>Birthday  <a href="#" id="pd_date_start" data-type="combodate" data-value="1984-05-23" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a></li>
										<li>Marital status <a href="#" id="marital_status" data-type="select" data-pk="1" data-url="/post" data-title="Select status"></a></li>
									</ul>
								</div>
								<div class="section">
									<h3>Social</h3>
									<ul class="list-unstyled list-social">
										 <li><a href="#"><i class="icon ion-social-twitter"></i><td><a href="#" id="twitter" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter postal code"></a></td></a></li>
										<li><a href="#"><i class="icon ion-social-facebook"></i><td><a href="#" id="facebook" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter postal code"></a></td></a></li>
										<li><a href="#"><i class="icon ion-social-dribbble"></i><td><a href="#" id="dribbble" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter postal code"></a></td></a></li>
										<li><a href="#"><i class="icon ion-social-linkedin"></i><td><a href="#" id="linkedin" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter postal code"></a></td></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="profile-info-right">
								<ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
									<li class="active"><a href="#activities" data-toggle="tab">INDUSTRY</a></li>
									<li><a href="#followers" data-toggle="tab">EXPERIENCE</a></li>
									<li><a href="#following" data-toggle="tab">EDUCATION</a></li>
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
