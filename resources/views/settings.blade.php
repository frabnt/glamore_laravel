@extends('layouts.default')



@section('content')




<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right ">
			<div class="container-fluid primary-content">
				<!-- PRIMARY CONTENT HEADING -->
				<div class="primary-content-heading clearfix">
					<h2>SYSTEM SETTINGS</h2>
					<ul class="breadcrumb pull-left">
						<li><i class="icon ion-home"></i><a href="#">Home</a></li>
						<li><a href="#">Pages</a></li>
						<li class="active">System Settings</li>
					</ul>
					

				</div>
				<!-- END PRIMARY CONTENT HEADING -->

				<div class="row">
					<!-- left side, main content -->
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-5">
								<div class="knowledge">
									<h3><a href="#"><i class="icon ion-ios-folder"></i> General <span class="pull-right"></span></a></h3>
									
								</div>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<div class="knowledge">
									<h3><a href="#"><i class="icon ion-ios-folder"></i> Notification <span class="pull-right"></span></a></h3>
									<label class="fancy-checkbox">
										<input type="checkbox">
										<span class="todo-text">Send notification by mail</span>
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="knowledge">
									<h3><a href="#"><i class="icon ion-ios-folder"></i> Email <span class="pull-right">27</span></a></h3>
									
								</div>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<div class="knowledge">
									<h3><a href="#"><i class="icon ion-ios-folder"></i> Roles<span class="pull-right">14</span></a></h3>
									
								</div>
							</div>
						</div>

					</div>
				
					<!-- end right sidebar -->
				</div>
			</div>

		</div>
		<!-- END COLUMN RIGHT -->



   

				@stop
				<!-- END COLUMN RIGHT -->
				@section('footer_script')@parent



 




@stop


@section('script')
 <script >
    
   





 
</script>
@stop        