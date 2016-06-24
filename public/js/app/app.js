'use strict';

angular.module("MyApp",[
'ui.router'
	])
.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider){
$urlRouterProvider.otherwise('/app')

$stateProvider
.state('home',{
 url:'/app',
 templateUrl:'/js/app/views/main.html'	
})
.state('home.noticias',{
	url:'/noticias',
	templateUrl:'/js/app/views/noticias.html',
	controller:'index'

})
}])
.controller("index", function($scope, $http){
	$scope.posts= [];
	$http.get("http://localhost:8000/api/alumno")
	.success(function(data){
		console.log("hola");
		console.log(data);
		$scope.posts = data;
	}).error(function(err){

	});
});
