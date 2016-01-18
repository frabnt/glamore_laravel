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

<div id="editUser">
    
</div>

<div id="editContact">
    
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
    <script src={{ asset('assets/js/collections.js') }}></script>
    <script src={{ asset('assets/js/views.js') }}></script>
    <script src={{ asset('assets/js/router.js') }}></script>
    




    <script>
   
        new App.Router;
        //Contacts
        Backbone.history.start();
        App.contacts= new App.Collections.Contacts;
        App.contacts.fetch();
        //Users
        App.users= new App.Collections.Users({id:1});

        App.users.fetch().then(function(){
            //console.log(App.users.get(1).toJSON());
//console.log(App.users);
        //var profile=App.users.get(1).toJSON();

        //Istanzio tutte le view   
        new App.Views.App({collection: App.users, collection: App.contact });    
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
                        console.log(modelsName);
                        console.log(name);
                        console.log(newValue);

                      

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

    // Imposto i campi non editabili
        function editableDisabler(){

            setTimeout(function(){ 

                $('.editable').editable({

                    disabled: true
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
