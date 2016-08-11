angular.module('app.controllers')
    .controller('ProjectNewController',['$scope','$location','Project' , 'Client' ,'$cookies','appConfig',
                               function ($scope, $location, Project, Client ,$cookies,appConfig) {

        $scope.project = new Project();
        $scope.clients =   Client.query();
        $scope.status = appConfig.project.status;



        $scope.save = function() {

            if( $scope.form.$valid ) {
                $scope.project.owner_id = $cookies.getObject('user').id;
                $scope.project.$save().then(function () {
                    $location.path('/project');
                });
            }
        }

      
    }]);
