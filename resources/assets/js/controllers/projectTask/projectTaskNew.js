angular.module('app.controllers')
    .controller('ProjectTaskNewController',
            ['$scope','$location', '$routeParams','appConfig','ProjectTask','Project',
            function ($scope, $location,  $routeParams ,appConfig , ProjectTask,Project) {

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


                $scope.formatName = function(model)
                {
                    if(model)
                    {
                        return model.name;
                    }
                    return '';
                };

                $scope.getProject = function(event,name)
                {

                    return Project.query({
                        search:name,
                        searchFields:'name:like'
                    }).$promise;

                };

                $scope.selectProject = function(item)
                {
                    $scope.projectTask.project_id = item.project_id;
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
