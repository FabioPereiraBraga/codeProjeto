angular.module('app.controllers')
    .controller('ProjectFileEditController',
                ['$scope','$location','$routeParams','ProjectTask' ,
        function ($scope, $location, $routeParams, ProjectTask) {


            $scope.projectTask = ProjectTask.get({
                id: $routeParams.id,
                idFile:$routeParams.idFile
            });



            $scope.save = function () {

                if ($scope.form.$valid) {

                    //Notes.update({ id:$id }, note);
                 
               ProjectTask.update({id:$routeParams.id,idFile:$routeParams.idFile},$scope.projectTask,function(){
                   $location.path('/project/'+$routeParams.id+'/task');
               });


                }
        }

      
    }]);
