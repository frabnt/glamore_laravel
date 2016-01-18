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
	//validate
	validate: function(attrs){
		if(! attrs.name){
			return 'Please enter a valid name';
		}
	},
	//url:'users'

	
});