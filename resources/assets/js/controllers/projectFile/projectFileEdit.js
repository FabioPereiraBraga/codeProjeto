angular.module('app.controllers')
    .controller('ProjectFileEditController',
                ['$scope','$location','$routeParams','ProjectFile' ,
        function ($scope, $location, $routeParams, ProjectFile) {


            $scope.projectFile = ProjectFile.get({
                id: $routeParams.id,
                idFile:$routeParams.idFile
            });



            $scope.save = function () {

                if ($scope.form.$valid) {

                    //Notes.update({ id:$id }, note);
                 
               ProjectFile.update({id:$routeParams.id,idFile:$routeParams.idFile},$scope.projectFile,function(){
                   $location.path('/project/'+$routeParams.id+'/files');
               });


                }
        }

      
    }]);
