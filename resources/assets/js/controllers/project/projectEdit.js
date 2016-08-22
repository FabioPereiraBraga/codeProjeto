angular.module('app.controllers')
    .controller('ProjectEditController', 
                ['$scope','$location','$routeParams','Project' , 'Client','appConfig','$cookies','$filter',
        function ($scope, $location, $routeParams, Project,Client,appConfig,$cookies,$filter) {

            $scope.project = Project.get({id: $routeParams.id});
            $scope.clients =   Client.query();
            $scope.status = appConfig.project.status;



            $scope.save = function() {

                if( $scope.form.$valid ) {
                    $scope.project.owner_id = $cookies.getObject('user').id;

                    Project.update({id:$scope.project.project_id},$scope.project , function(){
                        $location.path('/project');
                    });

                }
            }



        }]);
