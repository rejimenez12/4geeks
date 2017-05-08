var app = angular.module('App', ['App.appController',
	'App.Services',
	'App.Directives',
	'App.Controller',
	'ui.bootstrap',
	'xeditable',
	'ngAnimate',
	'ngSanitize'
	])

app.run(function(editableOptions) {
	editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});

app.config(function($interpolateProvider, $httpProvider){

	//$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-urlencoded;charset=utf-8';
	//$httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
	$httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=_token]').attr('content');
	$interpolateProvider.startSymbol('/%');

	$interpolateProvider.endSymbol('%/');

})

app.filter('sumByKey', function() {
	return function(data, key) {
		if (typeof(data) === 'undefined' || typeof(key) === 'undefined') {
			return 0;
		}

		var sum = 0;
		for (var i = data.length - 1; i >= 0; i--) {
			sum += parseFloat(data[i][key]);
		}

		return sum;
	};
});