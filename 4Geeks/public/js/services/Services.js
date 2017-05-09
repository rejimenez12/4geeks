angular.module('App.Services', [])

.service('services', function ($http, $q){ //declaramos la factory

   var path_login    = "/login";
   var path_register = "/register";

    
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

	this.register = function(name,email,password,password_confirmation){
		var defered = $q.defer();
        var formData = new FormData();
		
		formData.append("name", name);
		formData.append("email", email);
		formData.append("password", password);
		formData.append("password_confirmation", password_confirmation);
		return $http.post(path_register,formData,{
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


