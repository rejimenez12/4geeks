angular.module('App.Services', [])

.service('services', function ($http, $q){ //declaramos la factory

   var path_login          = "/login";
   var path_register       = "/register";
   var path_createCategory = "/normal/create/category";
   var path_updateCategory = "/normal/update/category"
    
    this.updateCategoria = function( objeto ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("category", objeto.category.$viewValue);
		formData.append("id", objeto.id.$viewValue);
		return $http.post(path_updateCategory,formData,{
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
    
    
    this.crearCategoria = function( category ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("category", category);
		return $http.post(path_createCategory,formData,{
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


