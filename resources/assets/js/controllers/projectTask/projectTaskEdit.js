angular.module('app.controllers')
    .controller('ProjectTaskEditController',
                ['$scope','$location','$routeParams','ProjectTask' ,
        function ($scope, $location, $routeParams, ProjectTask) {


            $scope.projectTask = ProjectTask.find({
                id: $routeParams.id,
                idTask:$routeParams.idTask
            });

            console.log( $scope.projectTask);


            $scope.save = function () {

                if ($scope.form.$valid) {
                    
                 
               ProjectTask.update({id:$routeParams.id,idFile:$routeParams.idFile},$scope.projectTask,function(){
                   $location.path('/project/'+$routeParams.id+'/task');
               });


                }
        }

      
    }]);
