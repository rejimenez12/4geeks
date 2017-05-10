angular.module('App.appController', ['ui.bootstrap']);
app.controller('appController',function($scope, services){

    $scope.id;
    $scope.name     = ""
    $scope.email    = "";
    $scope.password = "";
    $scope.remember = false;
    $scope.password_confirmation = "";
    $scope.categories = {};
    $scope.notes = {};
    $scope.category;
    $scope.error = "";
    $scope.success = "";

    $scope.response = "";
    
    $scope.option;
    
    $scope.listo = 'Listo';
    $scope.espera = 'En espera';
    $scope.mark1 = 1;
    $scope.mark2 = 0;
    
    
    
    
    $scope.marcarNote = function( option, id ){
        
        
        services.marcarNote( option, id ).then(function(request){
        
            if ( request.data == 0 ){
                console.log("entre1");
                $scope.mark1 = 1;
                $scope.mark2 = 1;
                $scope.listo = 'En espera';
                $scope.espera = 'En espera';
                
                
            }else if ( request.data == 1 ){
                
                console.log("entre2");
                
                $scope.mark1 = 0;
                $scope.mark2 = 0;
                $scope.listo = 'Listo';
                $scope.espera = 'Listo';
                
                
            }
                
        });
    }
    
    
    
    
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
                
                console.log($scope.categories);
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
                
                if( request.data == 'true' ){
                    
                    $scope.success = true;
                    
                }else if( request.data == 'false' ){
                    
                    $scope.response = true;
                    $scope.error = "Problemas al modificar la categoria";
                    
                }else if( request.data == 'error' ){
                    $scope.response = true;
                    $scope.error = "Esta categoria ya existe, intenta con otra";
                }

            });
            
        }else{
            objectForm.formSubmitted = true;
        }
        
        
        

    }
    
    
    
    
    $scope.createCategory = function( objectForm ){

        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.crearCategoria( objectForm.category.$viewValue ).then(function(request){
                
                console.log(request.data);
                if( request.data == 'true' ){
                    
                    $scope.success = true;
                    
                }else if( request.data == 'false' ){
                    
                    $scope.response = true;
                    $scope.error = "Problemas al crear la categoria";
                    
                }else if( request.data == 'error' ){
                    $scope.response = true;
                    $scope.error = "Esta categoria ya existe, intenta con otra";
                }
                
                

            });
            
        }else{
            objectForm.formSubmitted = true;
        }
        
        
        

    }



    $scope.inicio_sesion = function( objectForm ) {

        
        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.inicio_sesion( objectForm, $scope.remember ).then(function(request){
                console.log(request.data)
                if( request.data == 'true' ){
                    window.location="/normal/home";
                }else{
                    $scope.response = request.data;
                }
                
            });
            
        }else{
            
            
            objectForm.formSubmitted = true;
        }

    };

    $scope.register = function( objectForm) {
        
        
        if (objectForm.$valid){
            objectForm.formSubmitted = false;
            
            services.register( objectForm ).then(function(request){
    
            if ( request.data == 'true' ){
                
                $scope.success = true;
                $scope.name = "";
                $scope.email = "";
                $scope.password = "";
                $scope.password_confirmation = "";
                $scope.response = false;

            }else if( request.data == 'false'){
                $scope.response = true;
                $scope.error = "Las contraseñas no coinciden";
                //window.location="/register";

            }else if (request.data == 'error'){
                $scope.response = true;
                $scope.error = "El correo ya exite, intenta con otro";
                //window.location="/register";
            }


        });
            
        }else{
            
            
            objectForm.formSubmitted = true;
        }
        
        

    };

   
});



