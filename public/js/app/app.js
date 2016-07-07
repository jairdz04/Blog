'use strict';

angular.module("MyApp",[
'ui.router', 'ui.bootstrap', 'serviceAlumno'
	])
.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider){
$urlRouterProvider.otherwise('/app')

$stateProvider
.state('home',{
 url:'/app',
 templateUrl:'/js/app/views/main.html'	
})
.state('login', {
url:'/login',
templateUrl: '/js/app/views/login.html'
})
.state('home.noticias',{
	url:'/noticias',
	templateUrl:'/js/app/views/noticias.html',
	controller:'info'

})
.state('home.inicio', {
	url:'/inicio',
	templateUrl: '/js/app/views/inicio.html'
})
.state('home.estudiantes', {
url:'/estudiantes',
	templateUrl: '/js/app/views/estudiantes.html',
	controller : 'alumno'
})
.state('home.contacto', {
	url:'/contacto',
	templateUrl: '/js/app/views/contacto.html'
})
.state('home.detalles', {
	url: '/detalles',
	templateUrl: '/js/app/views/detalles.html'
})
.state('home.perfil',{
	url: '/perfil',
	templateUrl: '/js/app/views/perfil.html'
})
}])
.controller("info", function($scope, $http){
	$scope.posts= [];
	$http.get("http://localhost:8000/api/alumno")
	.success(function(data){
		console.log(data);
		$scope.posts = data;
	}).error(function(err){

	});
})
//Servicios y controllers de alumno
.controller("alumno", function($scope , $uibModal , alumnoResource, $http , destroy ){
   
  $scope.setPage = function (pageNo) {
    $scope.currentPage = pageNo;
  };
  
  //$scope.alumno = function (){ destroy.query();
  //}; 
  
 //llenar tabla con paginación
   $scope.pageChanged = function() {
   	$scope.alumnos= [];
    $http.get("http://localhost:8000/api/alumno/all/" + $scope.currentPage ).then(
    	function(response){
		$scope.alumnos= response.data;
		console.log($scope.alumnos);
	},function(err){

	});
  };


  //fin llenar tabla con paginación

 //Eliminar elemento
   $scope.remove = function(id){
		$scope.mesage = "eliminado";
		destroy.delete(id).then(function (respuesta) {
				 _.remove($scope.alumnos, function (e) {
						return e.id == id;
					});
				 	console.log($scope.mesage);
				 	
		
													})
	};



	////$scope.comprobar = function(size){
	//	var modalInstance = $uibModal.open({
	//		animation: $scope.animationsEnabled,
    //  templateUrl: 'eliminar-alumno.html',
    //  controller: 'alumno',
    //  size: size, 
     
	//	});
	//};

	// $scope.cancel = function () {
   // $uibModalInstance.dismiss('cancel');
  //};

 //fin de eliminar elemento

  $scope.pageChanged();
  $scope.totalItems = 10;



 
  $scope.open = function (size) {

    var modalInstance = $uibModal.open({
      animation: $scope.animationsEnabled,
      templateUrl: 'add-alumno.html',
      controller: 'ModalAController',
      size: size
    });

   }})
.controller('ModalAController', function($scope ,$uibModal,$uibModalInstance , alumnoResource ){
	
	$scope.alumno={};
	$scope.mensaje= "creado";
//crear alumno
   $scope.ok = function () {
	   console.log($scope.alumno);
	    	alumnoResource.save($scope.alumno);
	   console.log($scope.mensaje);
   $scope.alumno={};

  };
  //fin de crear alumno

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };

})
.factory('alumnoResource', function ($http){
	return {
	 save:function(alumno){
	 	return $http.post("http://localhost:8000/api/alumno/", alumno);
	 }
	}

	
})
.factory('destroy' , function($http){
  return {

  	delete:function(alumno){
			return $http.delete("http://localhost:8000/api/alumno/" + alumno);	
		}
  }

});