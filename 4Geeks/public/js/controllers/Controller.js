angular.module('App.Controller', ['ui.bootstrap']);
app.controller('Controller',function($scope, services){

    /*$scope.servicio_id = "";
    $scope.cita_descripcion = "";
    
    $scope.JSONMarca  = [ ];
    $scope.JSONModelo = [ ];
    $scope.selMarca = '';
    $scope.selModelo = '';
    
  
    
    $scope.getMarcas = function(val) {

        return rootServices.marca(val).then(function(data){

            return data.data.marcas.map(function(item){

                return item;

            });

        })

    };
    

    $scope.getModelos = function(marca, val) {

        return rootServices.modelo(marca, val).then(function(data){

            return data.data.modelos.map(function(item){

                return item;

            });

        });

    };
    
    $scope.descripcionServicio = function(){
        
        if ($scope.servicio_id.length>0){
                rootServices.citaDescripcion($scope.servicio_id).then(function(data){
                $scope.cita_descripcion = data.data.servicios.descripcion;
            });
            
        };
        
        
    };*/
   
});



