angular.module('App.appController', ['ui.bootstrap']);
app.controller('appController',function($scope, services){

    $scope.id;
    $scope.name     = ""
    $scope.email    = "";
    $scope.password = "";
    $scope.remember = "";
    $scope.password_confirmation = "";
    $scope.categories = {};
    $scope.notes = {};
    $scope.category;

    $scope.response = "";
    
    $scope.option;
    
    $scope.orderNote = function( ){
            
            if( $scope.option == 'asc' ){
                
                $scope.option = 'desc';
                
            }else{
                
                $scope.option = 'asc';
            }
        
            services.orderNote( $scope.option ).then(function(request){
                
                $scope.notes = request.data;

            });
       
    }
    
    $scope.filterNote = function( filter ){

            services.filterNote( filter ).then(function(request){
                
                $scope.notes = request.data;

            });
       
    }
    
    
    
    $scope.updateNote = function( objectForm ){

        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.updateNote( objectForm ).then(function(request){

                $scope.response = request.data;

            });
            
        }else{
            objectForm.formSubmitted = true;
        }
        
    }
    
    
    $scope.deleteNote = function( id ){

            services.deleteNote( id ).then(function(request){
                
                $scope.notes = request.data;

            });
    }
    
    
    
    $scope.listNote = function( ){

            services.listNote( ).then(function(request){
                
                $scope.notes = request.data;

            });

    }
    
    
    $scope.createNote = function( objectForm ){
        
        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.createNote( objectForm ).then(function(request){
                console.log(request);
                $scope.response = request.data;

            });
            
        }else{
            
            objectForm.formSubmitted = true;
        
        }
        
        
        
    }
    
    
    $scope.orderCategory = function( ){
            
            if( $scope.option == 'asc' ){
                
                $scope.option = 'desc';
                
            }else{
                
                $scope.option = 'asc';
            }
            console.log($scope.option);
        
            services.orderCategory( $scope.option ).then(function(request){
                
                $scope.categories = request.data;

            });
       
    }

    $scope.filterCategory = function( filter ){

            services.filterCategory( filter ).then(function(request){
                
                $scope.categories = request.data;

            });
       
    }
    
    $scope.deleteCategory = function( id ){

            services.deleteCategory( id ).then(function(request){
                
                $scope.categories = request.data;

            });
       
        
        

    }
    
    $scope.listCategory = function( ){

            services.listCategoria( ).then(function(request){
                
                $scope.categories = request.data;

            });
       
        
        

    }
    
    
    $scope.updateCategory = function( objectForm ){

        
        
        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.updateCategoria( objectForm ).then(function(request){

                $scope.response = request.data;

            });
            
        }else{
            objectForm.formSubmitted = true;
        }
        
        
        

    }
    
    
    
    
    $scope.createCategory = function( objectForm ){

        
        
        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.crearCategoria( objectForm.category.$viewValue ).then(function(request){

                $scope.response = request.data;

            });
            
        }else{
            objectForm.formSubmitted = true;
        }
        
        
        

    }



    $scope.login = function(email,password,remember) {

        services.login( email,password,remember ).then(function(request){

            if ( request.data == 'true' ){

                window.location="/normal/home";
            }


        });

    };

    $scope.register = function(name,email,password,password_confirmation) {

        services.register( name,email,password,password_confirmation ).then(function(request){

            if ( request.data == 'true' ){

                window.location="/";

            }else if( request.data == 'false'){

                window.location="/register";

            }else{

                window.location="/register";
            }


        });


    };

   
});



