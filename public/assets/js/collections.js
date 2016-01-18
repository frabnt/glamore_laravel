App.Collections.Contacts= Backbone.Collection.extend({
	model:App.Models.Contact,
	url:'contacts'
});

App.Collections.Users= Backbone.Collection.extend({
	model:App.Models.User,
	url:'users'
});