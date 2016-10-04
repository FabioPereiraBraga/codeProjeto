angular.module('app.controllers')
    .controller('ProjectTaskListController',['$scope','$routeParams' , '$location','ProjectTask',
                                    function ($scope , $routeParams,$location ,ProjectTask) {

        $scope.projectTask = ProjectTask.get({'id':$routeParams.id});


                                   $scope.save = function() {

                                            if( $scope.form.$valid ) {

                                                $scope.projectTask.$save({id:$routeParams.id}).then(function () {
                                                    $location.path('/project/'+$routeParams.id+'/task');
                                                });

                                            }
                                        }


    }]);