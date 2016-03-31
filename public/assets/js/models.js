App.Models.Contact= Backbone.Model.extend({
	//validate
	validate: function(attrs){
		if(! attrs.first_name || ! attrs.last_name){
			return 'A first and last name are required.';
		}

		if(! attrs.email_address){
			return 'Please enter a valid email address.';
		}
	},
	
});

App.Models.User= Backbone.Model.extend({
	defaults:{
		profile_image:'',
		background_image:'',
	},
	//validate
	validate: function(attrs){
		if(! attrs.name){
			return 'Please enter a valid name';
		}
	},
	//url:'users'

	
});

App.Models.Education= Backbone.Model.extend({
	//validate
	validate: function(attrs){

		if(! attrs.school){
			return 'Please enter school name.';
		}
	},
	
});

App.Models.Experience= Backbone.Model.extend({
	//validate
	validate: function(attrs){

		if(! attrs.company_name){
			return 'Please enter Company name.';
		}
	},
	
});


App.Models.Industry= Backbone.Model.extend({
	//validate
	validate: function(attrs){

		if(! attrs.industry){
			return 'Please enter industry.';
		}
	},
	
});

App.Models.Project= Backbone.Model.extend({
	//validate
	validate: function(attrs){

		if(! attrs.title){
			return 'Please enter project title.';
		}
	},
	
});

App.Models.Todo= Backbone.Model.extend({
	//validate
	validate: function(attrs){

		if(! attrs.title){
			return 'Please enter todo title.';
		}
	},
	
});

App.Models.Notification= Backbone.Model.extend({
	//validate
	validate: function(attrs){

		if(! attrs.title){
			return 'Please enter Notification title.';
		}
	},
	
});