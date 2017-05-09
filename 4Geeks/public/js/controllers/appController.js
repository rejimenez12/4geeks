angular.module('App.appController', ['ui.bootstrap']);
app.controller('appController',function($scope, services){

    $scope.id;
    $scope.name     = ""
    $scope.email    = "";
    $scope.password = "";
    $scope.remember = "";
    $scope.password_confirmation = "";


    $scope.category;

    $scope.response = "";

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



