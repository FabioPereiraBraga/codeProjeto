angular.module('app.controllers')
    .controller('ProjectTaskRemoveController',
        ['$scope','$location','$routeParams','ProjectTask' ,
 function ($scope, $location, $routeParams, ProjectTask) {

            $scope.projectTask = ProjectTask.get({
                id: $routeParams.id,
                idFile:$routeParams.idFile
            });



            $scope.remove = function () {
                $scope.projectTask.$delete({
                    id:$routeParams.id,
                    idFile:$scope.projectTask.id
                }).then(function(){
                    $location.path('/project/'+$routeParams.id+'/task');
                });


        }

      
    }]);
