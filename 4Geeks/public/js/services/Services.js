angular.module('App.Services', [])

.service('services', function ($http, $q){ //declaramos la factory

   var path_login          = "/login";
   var path_register       = "/register";
   var path_createCategory = "/normal/create/category";
   var path_listCategory   = "/normal/list/category";
   var path_updateCategory = "/normal/update/category";
   var path_deleteCategory = "/normal/delete/category";
   var path_filterCategory = "/normal/filter/category";
   var path_orderCategory  = "/normal/order/category";
    
   var path_createNote  = "/normal/create/note";
   var path_listNote    = "/normal/list/note";
   var path_deleteNote  = "/normal/delete/note";
   var path_updateNote  = "/normal/update/note";
   var path_filterNote = "/normal/filter/note";
   var path_orderNote  = "/normal/order/note";
   var path_marcarNote  = "/normal/marcar/note";
    
    
    this.marcarNote = function( option, id ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("option", option);
        formData.append("id", id);
		return $http.post(path_marcarNote,formData,{
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
    
    this.orderNote = function( option ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("option", option);
		return $http.post(path_orderNote,formData,{
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
    
    this.filterNote = function( filter ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("filter", filter);
		return $http.post(path_filterNote,formData,{
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
    
    this.updateNote = function( objectForm ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("title", objectForm.title.$viewValue);
        formData.append("category_id", objectForm.category_id.$viewValue);
        formData.append("description", objectForm.description.$viewValue);
        formData.append("id", objectForm.id.$viewValue);
		return $http.post(path_updateNote,formData,{
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
    
    this.deleteNote = function( id ){
		var defered = $q.defer();
        var formData = new FormData();
		return $http.get(path_deleteNote+"/"+id)
				.success(function(data) {
					defered.resolve(data);
				})
				.error(function(err) {
					defered.reject(err)
				});

		return defered.promise;

	}
    
    
    this.listNote = function( ){
		var defered = $q.defer();
		return $http.get(path_listNote)
				.success(function(data) {
					defered.resolve(data);
				})
				.error(function(err) {
					defered.reject(err)
				});

		return defered.promise;

	}
    
    
    
    this.createNote = function( objectForm ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("title", objectForm.title.$viewValue);
        formData.append("category_id", objectForm.category_id.$viewValue);
        formData.append("description", objectForm.description.$viewValue);
		return $http.post(path_createNote,formData,{
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
    
    
    
    
    this.orderCategory = function( option ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("option", option);
		return $http.post(path_orderCategory,formData,{
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
    
    
    this.filterCategory = function( filter ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("filter", filter);
		return $http.post(path_filterCategory,formData,{
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
    
    this.deleteCategory = function( id ){
		var defered = $q.defer();
        var formData = new FormData();
		return $http.get(path_deleteCategory+"/"+id)
				.success(function(data) {
					defered.resolve(data);
				})
				.error(function(err) {
					defered.reject(err)
				});

		return defered.promise;

	}
    
    this.listCategoria = function( ){
		var defered = $q.defer();
		return $http.get(path_listCategory)
				.success(function(data) {
					defered.resolve(data);
				})
				.error(function(err) {
					defered.reject(err)
				});

		return defered.promise;

	}
    
    
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

    this.inicio_sesion = function( objectForm, remember ){
		var defered = $q.defer();
        var formData = new FormData();
		formData.append("email", objectForm.email.$viewValue);
		formData.append("password", objectForm.password.$viewValue);
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

	this.register = function( objectForm ){
		var defered = $q.defer();
        var formData = new FormData();
		
		formData.append("name", objectForm.name.$viewValue);
		formData.append("email", objectForm.email.$viewValue);
		formData.append("password", objectForm.password.$viewValue);
		formData.append("password_confirmation", objectForm.password_confirmation.$viewValue);
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


