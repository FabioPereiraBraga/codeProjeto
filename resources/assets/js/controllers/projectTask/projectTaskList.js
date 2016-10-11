angular.module('app.controllers')
    .controller('ProjectTaskListController',['$scope','$routeParams' , '$location','ProjectTask',
                                    function ($scope , $routeParams,$location ,ProjectTask) {


                                        
                                   $scope.projectTask = ProjectTask.get({'id':$routeParams.id,
                                       orderBy:'id',
                                       sortedBy:'desc'
                                   });

          
                                   $scope.save = function() {

                                            if( $scope.form.$valid ) {



                                                var newProject = new ProjectTask();
                                                    newProject.name =  $scope.projectTask.name;



                                                    newProject.$save({id:$routeParams.id}).then(function () {

                                                        window.location.reload();


                                                });

                                            }
                                        }


    }]);