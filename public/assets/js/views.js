// all educations view
App.Views.Educations=Backbone.View.extend({
    
    tagName: 'div',

    initialize: function(){
        this.collection.on('add', this.addOne, this); // sync when return data from server
           //this.on('render', this.afterRender());
    },

    render: function(){
        //this.$el.empty();
        this.collection.each(this.addOne, this);

        return this;
        

    },
     afterRender: function() { 
        //alert('afterRender'); 
        //this.editableEnablerAfterSave();
    },

    addOne: function(education){
        var educationView= new App.Views.Education({ model:education});
        this.$el.append(educationView.render().el);
        editableEnabler();
    },

});

// all industries view
App.Views.Industries=Backbone.View.extend({
    
    tagName: 'div',

    initialize: function(){
        this.collection.on('add', this.addOne, this); // sync when return data from server
           //this.on('render', this.afterRender());
    },

    render: function(){
        //this.$el.empty();
        this.collection.each(this.addOne, this);
        return this;
        

    },
     afterRender: function() { 
        //alert('afterRender'); 
        //this.editableEnablerAfterSave();
    },

    addOne: function(industry){
        var industryView= new App.Views.Industry({ model:industry});
        this.$el.append(industryView.render().el);
        editableEnabler();
    },
   
});



// all experiences view
App.Views.Experiences=Backbone.View.extend({
    
    tagName: 'div',

    initialize: function(){
        this.collection.on('add', this.addOne, this); // sync when return data from server
           //this.on('render', this.afterRender());
    },

    render: function(){
        //this.$el.empty();
        this.collection.each(this.addOne, this);

        return this;
        

    },
     afterRender: function() { 
        //alert('afterRender'); 
        //this.editableEnablerAfterSave();
    },

    addOne: function(experience){
        var experienceView= new App.Views.Experience({ model:experience});
        this.$el.append(experienceView.render().el);
        //this.editableEnabler(experience);
         editableEnabler();
    },

});

// Add experience View

App.Views.AddExperience= Backbone.View.extend({
    el:'#addExperience',

    initialize: function(){

        this.title = $('#title');
        this.company_name = $('#company_name');
        this.location = $('#location');
        this.currently_work_here = $('#currently_work_here');
        this.description = $('#exp_description');
        this.date_end = $('#exp_date_end');
        this.date_start = $('#exp_date_start');
        this.user_id=$('#exp_user_id');
        },

    events:{
        'submit':'addExperience'
    },

    addExperience: function(e){
    	//console.log(this);
        e.preventDefault();

        //Create contact 
        this.collection.create({


        	title: this.title.val(),
        	location: this.location.val(),
        	company_name: this.company_name.val(),
        	currently_work_here: this.currently_work_here.val(),
        	description: this.description.val(),
        	date_end: this.date_end.val(),
        	date_start: this.date_start.val(),
        	user_id:this.user_id.val(),

        }, {wait: true}); //wait the server for save id in attribute
        this.clearForm();
    },

    clearForm: function(){

    	this.title.val('');
    	this.location.val('');
    	this.company_name.val('');
    	this.currently_work_here.val('');
    	this.description.val('');
    	this.date_end.val('');
    	this.date_start.val('');
    	
    	
       // $('#addEducation').fadeOut();

    }
});

// Add industry View

App.Views.AddIndustry= Backbone.View.extend({
    el:'#addIndustry',

    initialize: function(){

        this.country = $('#country');
        this.postal_code = $('#postal_code');
        this.industry = $('#industry');
        this.user_id=$('#ind_user_id');
        },

    events:{
        'submit':'addIndustry'
    },

    addIndustry: function(e){
    	//console.log(this);
        e.preventDefault();
        //Create contact 
        this.collection.create({


        	country: this.country.val(),
        	postal_code: this.postal_code.val(),
        	industry: this.industry.val(),
        	user_id:this.user_id.val(),


        }, {wait: true}); //wait the server for save id in attribute
        this.clearForm();
    },

    clearForm: function(){

    	this.country.val('');
    	this.postal_code.val('');
    	this.industry.val('');
    	
    	
    	
       // $('#addEducation').fadeOut();

    }
});

// Add education View

App.Views.AddEducation= Backbone.View.extend({
    el:'#addEducation',

    initialize: function(){

        this.school = $('#school');
        this.degree = $('#degree');
        this.grade = $('#grade');
        this.activities_and_societies = $('#activities_and_societies');
        this.description = $('#edu_description');
        this.date_end = $('#edu_date_end');
        this.date_start = $('#edu_date_start');
        this.field_of_study = $('#field_of_study');
        this.user_id=$('#edu_user_id');
        

    },

    events:{
        'submit':'addEducation'
    },

    addEducation: function(e){
        e.preventDefault();

        //Create contact 
        this.collection.create({


        	school: this.school.val(),
        	degree: this.degree.val(),
        	grade: this.grade.val(),
        	activities_and_societies: this.activities_and_societies.val(),
        	description: this.description.val(),
        	date_end: this.date_end.val(),
        	date_start: this.date_start.val(),
        	field_of_study: this.field_of_study.val(),

        	user_id:this.user_id.val(),

        }, {wait: true}); //wait the server for save id in attribute
        this.clearForm();
    },

    clearForm: function(){

    	this.school.val('');
    	this.degree.val('');
    	this.grade.val('');
    	this.activities_and_societies.val('');
    	this.description.val('');
    	this.date_end.val('');
    	this.date_start.val('');
    	this.field_of_study.val('');
    	
       // $('#addEducation').fadeOut();

    }
});


//Single education view

App.Views.Education= Backbone.View.extend({
    tagName:'div',

    template: template('allEducationsTemplate'),

    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        this.model.on('change', this.render, this); 
    },

    events:{
        'click a.edu_delete': 'deleteEducation',
        'click a.edit': 'editEducation'
    },

    editEducation: function(){
        vent.trigger('education:edit', this.model)

    },
    
    deleteEducation: function(){

    
    var self=this;
    

    $.confirm({
        text: "Are you sure you want to delete that education?",
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

    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },

    unrender: function(){
        this.remove(); //this.$el.remove();
    }
});


//Single industry view

App.Views.Industry= Backbone.View.extend({
    tagName:'div',

    template: template('allIndustriesTemplate'),

    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        this.model.on('change', this.render, this); 
    },

    events:{
        'click a.ind_delete': 'deleteIndustry',
        'click a.edit': 'editIndustry'
    },

    editIndustry: function(){
        vent.trigger('education:edit', this.model)

    },
    
    deleteIndustry: function(){

    
    var self=this;
    

    $.confirm({
        text: "Are you sure you want to delete that industry?",
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

    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },

    unrender: function(){
        this.remove(); //this.$el.remove();
    }
});



//Single experience view

App.Views.Experience= Backbone.View.extend({
    tagName:'div',

    template: template('allExperiencesTemplate'),

    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        this.model.on('change', this.render, this); 
    },

    events:{
        'click a.exp_delete': 'deleteExperience',
        'click a.edit': 'editExperience'
    },

    editExperience: function(){
        vent.trigger('education:edit', this.model)

    },
    
    deleteExperience: function(){

    
    var self=this;
    

    $.confirm({
        text: "Are you sure you want to delete that experience?",
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

    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },

    unrender: function(){
        this.remove(); //this.$el.remove();
    }
});

//Edit user View

App.Views.EditUser = Backbone.View.extend({
    template: template('editUserTemplate'),

    initialize: function(){
        this.render();
    },

    events:{
        
    },

    render: function(){
        var html =this.template(this.model.toJSON());

        this.$el.html(html);
        return this;
    }

});

