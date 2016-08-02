angular.module('app.controllers')
    .controller('ProjectViewController',
                ['$scope','$location','$routeParams','Project' ,
        function ($scope, $location, $routeParams, Project) {

            $scope.project = Project.get({id: $routeParams.id});

          
            $scope.voltar = function () {
                $location.path('/project');
        }

      
    }]);
