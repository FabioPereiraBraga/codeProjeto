angular.module('app.controllers')
    .controller('ProjectTaskEditController',
                ['$scope','$location','$routeParams','ProjectTask' ,'appConfig',
        function ($scope, $location, $routeParams, ProjectTask,appConfig) {


            $scope.status = appConfig.projectTask.status;

            $scope.due_date = {
                status:{
                    opened:false
                }
            }

            $scope.start_date = {
                status:{
                    opened:false
                }
            }


            $scope.open = function() {

                $scope.due_date.status.opened = true;
            };

            $scope.openStartDate = function() {

                $scope.start_date.status.opened = true;
            };


            $scope.projectTask = ProjectTask.find({
                id:$routeParams.id,
                idTask:$routeParams.idTask
            });

            $scope.save = function() {
                alert('ddddf');
                if( $scope.form.$valid ) {

                    alert('ddf');
                    ProjectTask.update({
                        id:$scope.projectTask.project_id ,
                        idTask: $scope.projectTask.id
                    },$scope.projectTask,function () {
                        $location.path('/project/'+$scope.projectTask.project_id+'/task');
                    })



                }
            }




        }]);
