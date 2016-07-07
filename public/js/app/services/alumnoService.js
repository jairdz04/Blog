'use strict'

angular.module('serviceAlumno',[])
.factory('alumnoResource', function ($http){
	return {
	 save:function(alumno){
	 	return $http.post("http://localhost:8000/api/alumno/", alumno);
	 }
	}
});