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
			<h3><i class="icon ion-ios-grid-view-outline"></i> <span>SHOW/HIDE AND DRAG-DROP COLUMNS</span></h3>
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
					<td><a href="#" class="editable" models="users" name="name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= name %></a></td>
					<td><a href="#" class="editable" models="users" name="last_name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= last_name %></a></td>
					<td><a href="#" class="editable combodate" models="users" name="birthday_date" data-type="combodate" data-url="" data-pk= "<%=id%>" ><%= birthday_date %></a></td>
					<td><a href="#" class="editable marital_status" models="users" name="marital_status" data-type="select" data-url="" data-pk= "<%=id%>" ><%= marital_status %></a></td>
					<td><a href="#" class="editable" models="users" name="email" data-type="text" data-url="" data-pk= "<%=id%>" ><%= email %></a></td>
					<td><a href="#" class="editable" models="users" name="twitter_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= twitter_page %></a></td>
					<td><a href="#" class="editable" models="users" name="facebook_page" data-type="text" data-url="" data-pk= "<%=id%>" ><%= facebook_page %></a></td>
					<td><a href="#users/<%= id %>" class="usr_delete btn btn-primary btn-block" >Delete </a></td>
				

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
           <th>Action</th>
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
        // $.getScript('{{ asset("assets/js/plugins/datatable/jquery.dataTables.min.js") }}', function(){});	
        // $.getScript('{{ asset("assets/js/plugins/datatable/exts/dataTables.colVis.bootstrap.js") }}', function(){});
        // $.getScript('{{ asset("assets/js/plugins/datatable/exts/dataTables.colReorder.min.js") }}', function(){});
        // $.getScript('{{ asset("assets/js/plugins/datatable/exts/dataTables.tableTools.min.js") }}', function(){});
        // $.getScript('{{ asset("assets/js/plugins/datatable/dataTables.bootstrap.js") }}', function(){});
        $.getScript('{{ asset("assets/js/queen-table.js") }}', function(){});


        	console.log(App.users);
        
        new App.Views.App({collection: App.users});    

        });






//VIEWS  **********************************************************************************************************************************



// MAIN VIEW *******************************************************************************************************************************


App.Views.App=Backbone.View.extend({

    initialize: function(){	
    vent.on('user:edit', this.editUser, this);
    var addUsersView= new App.Views.AddUser({ collection: App.users});
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





 $(document).ready(function() {





// Imposto i campi editabili
    window.editableEnabler = function(){



        setTimeout(function(){ 







        	// get file data


			//$.fn.editable.defaults.mode = 'inline';
			

        	//campo select (user)

        			$('.marital_status').editable({
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
 						     console.log(id, name,modelsName, newValue);
        	                 model.save(name, newValue);
        	                 editableEnabler();
        	            }
        	    });
        			       		

        			$('.currently_work_here').editable({

        			  source: [{id:0, text: "No"},{id:1, text: "Yes"}],
        			  select2: {
        			  width: 200,
        			  placeholder: 'Select country',
        			  allowClear: false,
        			},


        			  
        			     success: function(response, newValue) {  
        		              var id=$(this).attr('data-pk');
        		              var name=$(this).attr('name');
        		              var modelsName= $(this).attr('models');
        		              var model= App.experiences.get(id).set(name, newValue);
        					  console.log(id, name,modelsName, newValue);
        		              model.save(name, newValue);
        		              editableEnabler();
        		         }
        			});
        		// date fields	    
        		date = new Date();	   

        		$('.combodate').editable({
                     
                     combodate: {
                             minYear: date.getFullYear()-116,
                             maxYear: date.getFullYear(),
                             //minuteStep: 1,
                             
                             yearDescending: true,

                             format: 'YYYY-MM-DD',      
                             //in this format items in dropdowns are displayed
                             template: 'YYYY / MMM /D',
                             //initial value, can be `new Date()`    
                                           
                             
                              
                            
                             
                             
                             errorClass: null,
                             roundTime: false, // whether to round minutes and seconds if step > 1
                             smartDays: true, // whether days in combo depend on selected month: 31, 30, 28
                        },
                                        success: function(response, newValue) {   

                        var id=$(this).attr('data-pk');
                        var name=$(this).attr('name');
                        var modelsName= $(this).attr('models');
                  
                  var mese = parseInt(newValue._i[1])+1;

                  var dataForBb=newValue._i[0]+'-'+mese+'-'+newValue._i[2];

                  var dataForBbFormatted= moment(dataForBb).format('YYYY-MM-DD');

                         switch (modelsName){
                            case 'users':
                                var model= App.users.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'educations':
                                var model= App.educations.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'experiences':
                                var model= App.experiences.get(id).set(name, dataForBbFormatted);
                            break;

                            case 'industries':
                                var model= App.industries.get(id).set(name, dataForBbFormatted);
                            break;
                        }

                        model.save(name, dataForBbFormatted);
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


        			



        			//campo country (industry)
        			var countries = [];
        			$.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function(k, v) {
        				countries.push({id: k, text: v});
        			}); 
        			$('.edit_country').editable({
        					source: countries,
        					select2: {
        					width: 200,
        					placeholder: 'Select country',
        					allowClear: true
        				},
        				success: function(response, newValue) {   

        	                 
        	                 var id=$(this).attr('data-pk');
        	                 var name=$(this).attr('name');
        	                 var modelsName= $(this).attr('models');
        	                 var model= App.industries.get(id).set(name, newValue);
 							 console.log(id, name,modelsName, newValue);
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
                  //console.log(id, name,modelsName, newValue);

                        switch (modelsName){
                            case 'users':
                                var model= App.users.get(id).set(name, newValue);
                            break;

                            case 'educations':
                                var model= App.educations.get(id).set(name, newValue);
                            break;

                            case 'experiences':
                                var model= App.experiences.get(id).set(name, newValue);
                            break;

                            case 'industries':
                                var model= App.industries.get(id).set(name, newValue);
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

// function enableToggle(){
//     setTimeout(function(){

//     	    //Abilito e disabilito l'editable
//     	    $( "#enable" ).click(function() {
    	
//     	        $('.editable').editable('toggleDisabled');
//     	        var text=$('#enable').text();
//     	        if(text=='Enable Edit'){
//     	            $('#enable').text('Disable Edit');
//     	        }else{
//     	            $('#enable').text('Enable Edit');
//     	        }
    	 
//     	});


//     }, 1000);

// }


editableEnabler();
//enableToggle();





});

        </script>
@stop        