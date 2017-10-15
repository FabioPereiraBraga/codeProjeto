angular.module('app.controllers')
    .controller('ProjectTaskNewController',
            ['$scope','$location', '$routeParams','appConfig','ProjectTask','Project',
            function ($scope, $location,  $routeParams ,appConfig , ProjectTask) {

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

 
                $scope.projectTask = new ProjectTask();

           $scope.save = function() {

          if( $scope.form.$valid ) {

              $scope.projectTask.$save({id:$routeParams.id}).then(function () {
                 $location.path('/project/'+$routeParams.id+'/task');
               });

            }
        }

      
    }]);
