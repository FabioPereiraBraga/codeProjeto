angular.module('app.controllers')
    .controller('ProjectFileEditController',
                ['$scope','$location','$routeParams','ProjectFile' ,
        function ($scope, $location, $routeParams, ProjectFile) {


            $scope.projectFile = ProjectFile.get({
                id: null,
                idFile:$routeParams.idFile
            });



            $scope.save = function () {

                if ($scope.form.$valid) {

                    //Notes.update({ id:$id }, note);
                 
               ProjectFile.update({id:null,idFile:$routeParams.idFile},$scope.projectFile);


                }
        }

      
    }]);
