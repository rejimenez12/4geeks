angular.module('App.Services', [])

.service('services', function ($http, $q){ //declaramos la factory

   /*var path_modelo = "/admin/modelo-api";

    
    this.modelo = function(marca, modelo){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("marca", marca.id ? marca.id : marca);
		formData.append("modelo", modelo);
		return $http.post(path_modelo,formData,{
					headers: {
						"Content-type": undefined
					},
					transformRequest: angular.identity
				})
				.success(function(data) {
					defered.resolve(data);
				})
				.error(function(err) {
					defered.reject(err)
				});

		return defered.promise;

	}*/


});


