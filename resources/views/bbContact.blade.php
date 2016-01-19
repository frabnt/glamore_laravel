<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <style type="text/css">

        table thead td{
            font-weight: bold;
        }

        .module{margin-bottom: 2em;}

    </style>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    
   

</head>
<body id="app-layout">
    

<form id="addContact" class="module">
<div>
    <label for="first_name">First Name: </label>
    <input type="text" id="first_name" name="first_name">
</div> 

<div>
    <label for="last_name">Last Name: </label>
    <input type="text" id="last_name" name="last_name">
</div> 

<div>
    <label for="email_address">Email address: </label>
    <input type="text" id="email_address" name="email_address">
</div> 

<div>
    <label for="description">Description: </label>
     <textarea id="description" name="description"> </textarea>
</div> 



<div>
    <input type="submit" value="Add Contact">
</div>


</form>



<form id="addUser" class="module">
<div>
    <label for="name">Name: </label>
    <input type="text" id="name" name="name">
</div> 





<div>
    <input type="submit" value="Add User">
</div>


</form>


<table id="allContacts" class="module">
    <thead>
        <tr>
            <td>First name</td>
            <td>Last name</td>
            <td>Email address</td>
            <td>Description</td>
            <td>Config</td>
        </tr>
    </thead>
</table>


<!-- Template for contacts -->
<script id="allContactsTemplate" type="text/template">   
    <td> <a href="#" class="editable" models="contacts" name="first_name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= first_name %> </a> </td>
    <td><%= last_name %></td>
    <td><%= email_address %></td>
    <td><%= description %></td>
    <td><a href="#contacts/<%= id %>/edit" class="edit" >Edit </a></td>
    <td><a href="#contacts/<%= id %>" class="delete" >Delete </a></td>
</script>


<table id="allUsers" class="module">
    <thead>
        <tr>
            <td>name</td>
            
        </tr>
    </thead>
</table>

<!-- Template for users -->
<script id="allUsersTemplate" type="text/template">   
    <td> <a href="#" class="editable" models="users" name="name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= name %> </a> </td>
   
    <td><a href="#users/<%= id %>/edit" class="edit" >Edit </a></td>
    <td><a href="#users/<%= id %>" class="delete" >Delete </a></td>
</script>



<div id="editContact">
    
</div>

<div id="editUser">
    
</div>


<script id="editUserTemplate" type="text/template">
<h2>Edit User: <%= name %>    </h2>

// line edit
<a href="#" class="editable" models="users" value="<%= name %>" name="name" data-type="text" data-url="" data-pk= "<%=id%>" ><%= name %> </a>




<form id="editUser">
    <div>
        <label for="edit_name">Name: </label>
        <input type="text" id="edit_name" name="edit_name" value="<%= name %>">
    </div> 


    

    <div>
        <input type="submit" value="Mod User">
        <button type="button" class="cancel"> Cancel </button>
    </div>


    </form>

</script>



<script id="editContactTemplate" type="text/template">
<h2>Edit Contact: <%= first_name %>  <%= last_name %>  </h2>

<form id="editContact">
    <div>
        <label for="edit_first_name">First Name: </label>
        <input type="text" id="edit_first_name" name="edit_first_name" value="<%= first_name %>">
    </div> 

    <div>
        <label for="edit_last_name">Last Name: </label>
        <input type="text" id="edit_last_name" name="edit_last_name"value="<%= last_name %>">
    </div> 

    <div>
        <label for="edit_email_address">Email address: </label>
        <input type="text" id="edit_email_address" name="edit_email_address" value="<%= email_address %>">
    </div> 

    <div>
        <label for="edit_description">Description: </label>
         <textarea id="edit_description" name="edit_description" ><%=description%></textarea >
    </div> 



    <div>
        <input type="submit" value="Mod Contact">
        <button type="button" class="cancel"> Cancel </button>
    </div>


    </form>

</script>

<button id="enable" class="btn btn-success btn-block">Disable</button>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
   
    


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>




    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>  

    <!-- x-editable (bootstrap version) -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/js/bootstrap-editable.min.js"></script>
 


    <!-- Backbone include -->
    <script src={{ asset('assets/js/main.js') }}></script>
    <script src={{ asset('assets/js/models.js') }}></script>
    <script src={{ asset('assets/js/router.js') }}></script>
    




    <script>
   
//Collections
App.Collections.Contacts= Backbone.Collection.extend({
    model:App.Models.Contact,
    url:'contacts'
});

App.Collections.Users= Backbone.Collection.extend({
    model:App.Models.User,
    url:'users'
});




//router
        new App.Router;
        //Contacts
        Backbone.history.start();
        App.contacts= new App.Collections.Contacts;
        App.contacts.fetch();
        //Users
        App.users= new App.Collections.Users;

        App.users.fetch().then(function(){
            //console.log(App.users.get(1).toJSON());
//console.log(App.users);
        //var profile=App.users.get(1).toJSON();

        //Istanzio tutte le view   
        new App.Views.App({collection: App.users, collection: App.contact });    
        });


// views

App.Views.App=Backbone.View.extend({

    initialize: function(){
    // contacts
    vent.on('contact:edit', this.editContact, this);

    var addContactView= new App.Views.AddContact({ collection: App.contacts});

    var allContactsView = new App.Views.Contacts({ collection: App.contacts}).render();
    $('#allContacts').append(allContactsView.el); // appendo la lista dei contatti nella tabella

    // users
    vent.on('user:edit', this.editUser, this);

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




        // istanzio la view user singola
        $.getJSON('http://localhost/glamore/public/users/1', function(data) {
        //console.log(data);
        var user= new App.Models.User(data);
        //user.fetch();
        //console.log(user);
        var editUser= new App.Views.EditUser({ model: user});
        $('#editUser').html(editUser.el);
        });


// CONTACT VIEWS ************************************************************************************************************************************************************************************





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


//USER VIEWS************************************************************************************************************************************************************************************




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



$(document).ready(function() {

// Imposto i campi editabili
    function editableEnabler(){

        setTimeout(function(){ 

            $.fn.editable.defaults.mode = 'inline';

            $('.editable').editable({

                success: function(response, newValue) {   

                        
                        var id=$(this).attr('data-pk');
                        var name=$(this).attr('name');
                        var modelsName= $(this).attr('models');
                  

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


    

    //ricarico editableEnabler dopo aggiornamento lista tramite form
    $( "form" ).submit(function( event ) {
      editableEnabler();
      event.preventDefault();
    });

editableEnabler();
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


});




    </script>

</body>
</html>
