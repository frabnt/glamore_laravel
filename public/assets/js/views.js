// CONTACT ************************************************************************************************************************************************************************************


App.Views.App=Backbone.View.extend({

	initialize: function(){
		// contacts
		vent.on('contact:edit', this.editContact, this);

		var addContactView= new App.Views.AddContact({ collection: App.contacts});

		var allContactsView = new App.Views.Contacts({ collection: App.contacts}).render();
		$('#allContacts').append(allContactsView.el); // appendo la lista dei contatti nella tabella

		// users

		vent.on('user:edit', this.editUser, this);


	 //var UserById= new	App.Collections.Users
		
	

$.getJSON('http://localhost/glamore/public/users/1', function(data) {
    console.log(data);
	var user= new App.Models.User(data);
	 	//user.fetch();
	 	console.log(user);
		var editUser= new App.Views.EditUser({ model: user});
		$('#editUser').html(editUser.el);


});

	


		//var singleUser= new App.Views.User({models:User});

		var addUsersView= new App.Views.AddUser({ collection: App.users});

		var allUsersView = new App.Views.Users({collection: App.users}).render();
		$('#allUsers').append(allUsersView.el); // appendo la lista dei contatti nella tabella

		

	},

	editContact: function(contact){

		var editContactView= new App.Views.EditContact({model: contact});
		$('#editContact').html(editContactView.el);
	},

	editUser: function(users){

		var editUserView= new App.Views.EditUser({model: users});
		$('#editUser').html(editUserView.el);
	}

	});


// Add contact View

App.Views.AddContact= Backbone.View.extend({
	el:'#addContact',

	initialize: function(){
		this.first_name = $('#first_name');
		this.last_name = $('#last_name');
		this.email_address = $('#email_address');
		this.description = $('#description');
	},

	events:{
		'submit':'addContact'
	},

	addContact: function(e){
		e.preventDefault();

		//Create contact 
		this.collection.create({
			first_name: this.first_name.val(), //this.$el.find('#first_name')
			last_name: this.last_name.val(),
			email_address: this.email_address.val(),
			description: this.description.val(),
		}, {wait: true}); //wait the server for save id in attribute
		this.clearForm();
	},

	clearForm: function(){

		this.first_name.val('');
		this.last_name.val('');
		this.email_address.val('');
		this.description.val('');

	}
});


//Edit contact View

App.Views.EditContact = Backbone.View.extend({

	template: template('editContactTemplate'),

	initialize: function(){
		this.render();

		this.form= this.$('form');
		this.first_name= this.form.find('#edit_first_name');
		this.last_name= this.form.find('#edit_last_name');
		this.email_address= this.form.find('#edit_email_address');
		this.description= this.form.find('#edit_description');





	},

	events:{
		'submit form':'submit',
		'click button.cancel': 'cancel'
	},

	submit: function(e){
		e.preventDefault();

		
		this.model.save({
			first_name: this.first_name.val(),
			last_name: this.last_name.val(),
			email_address: this.email_address.val(),
			description: this.description.val(),
		});

		this.remove();
	},

	cancel: function(){
		this.remove();
	},

	render: function(){
		var html =this.template(this.model.toJSON());

		this.$el.html(html);
		return this;
	}

});



//All contacts View

App.Views.Contacts=Backbone.View.extend({
	tagName: 'tbody',

	initialize: function(){
		this.collection.on('add', this.addOne, this); // sync when return data from server
	},

	render: function(){
		//this.$el.empty();
		this.collection.each(this.addOne, this);
		return this;
	},

	addOne: function(contact){
		var contactView= new App.Views.Contact({ model:contact});
		this.$el.append(contactView.render().el);
	}

});


//Single contact view

App.Views.Contact= Backbone.View.extend({
	tagName:'tr',

	template: template('allContactsTemplate'),

	initialize: function(){
		this.model.on('destroy', this.unrender, this);
		this.model.on('change', this.render, this); 
	},

	events:{
		'click a.delete': 'deleteContact',
		'click a.edit': 'editContact'
	},

	editContact: function(){
		vent.trigger('contact:edit', this.model)

	},
	
	deleteContact: function(){
		this.model.destroy();
	},

	render: function(){
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	},

	unrender: function(){
		this.remove(); //this.$el.remove();
	}
});


//USER ************************************************************************************************************************************************************************************




// Add user View

App.Views.AddUser= Backbone.View.extend({
	el:'#addUser',

	initialize: function(){

		this.name=$('#name');
		// this.last_name=$('#last_name');
		// this.birthday_date=$('#birthday_date');
		// this.marital_status=$('#marital_status');
		// this.about_me=$('#about_me');
		// this.facebook_page=$('#facebook_page');
		// this.twitter_page=$('#twitter_page');
		// this.linkedin_page=$('#linkedin_page');
		// this.dribbble_page=$('#dribbble_page');
		// this.gplus_page=$('#gplus_page');
	},

	events:{
		'submit':'addUser'
	},

	addUser: function(e){
		e.preventDefault();

		//Create user 
		this.collection.create({

			name:this.name.val(),
			// last_name:this.last_name.val(),
			// birthday_date:this.birthday_date.val(),
			// marital_status:this.marital_status.val(),
			// about_me:this.about_me.val(),
			// facebook_page:this.facebook_page.val(),
			// twitter_page:this.twitter_page.val(),
			// linkedin_page:this.linkedin_page.val(),
			// dribbble_page:this.dribbble_page.val(),
			// gplus_page:this.gplus_page.val(),

		}, {wait: true}); //wait the server for save id in attribute
		this.clearForm();
	},

	clearForm: function(){
		this.name.val('');
		// this.last_name.val('');
		// this.birthday_date.val('');
		// this.marital_status.val('');
		// this.about_me.val('');
		// this.facebook_page.val('');
		// this.twitter_page.val('');
		// this.linkedin_page.val('');
		// this.dribbble_page.val('');
		// this.gplus_page.val('');

	}
});


//Edit user View

App.Views.EditUser = Backbone.View.extend({

	template: template('editUserTemplate'),

	initialize: function(){
		this.render();

		this.form= this.$('form');
		this.name= this.form.find('#edit_name');

	},

	events:{
		'submit form':'submit',
		'click button.cancel': 'cancel'
	},

	submit: function(e){
		e.preventDefault();

		
		this.model.save({
			name: this.name.val(),
			
		});

		this.remove();
	},

	cancel: function(){
		this.remove();
	},

	render: function(){
		var html =this.template(this.model.toJSON());

		this.$el.html(html);
		return this;
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


//Single user view

App.Views.User= Backbone.View.extend({
	tagName:'tr',

	template: template('allUsersTemplate'),

	initialize: function(){
		this.model.on('destroy', this.unrender, this);
		this.model.on('change', this.render, this); 
	},

	events:{
		'click a.delete': 'deleteUser',
		'click a.edit': 'editUser'
	},

	editUser: function(){
		vent.trigger('user:edit', this.model)

	},
	
	deleteUser: function(){
		this.model.destroy();
	},

	render: function(){
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	},

	unrender: function(){
		this.remove(); //this.$el.remove();
	}
});
