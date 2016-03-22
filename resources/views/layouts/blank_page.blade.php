@extends('layouts.default')



@section('content')




<!-- COLUMN RIGHT -->
<div id="col-right" class="col-right inplace-editing">
	<div class="container-fluid primary-content ">
	


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


 




@stop


@section('script')
 <script >
    
   





 
</script>
@stop        