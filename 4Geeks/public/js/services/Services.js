angular.module('App.Services', [])

.service('services', function ($http, $q){ //declaramos la factory

   var path_login = "/login";

    
    this.login = function(email, password,remember){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("email", email);
		formData.append("password", password);
		formData.append("remember", remember);
		return $http.post(path_login,formData,{
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

	}


});


