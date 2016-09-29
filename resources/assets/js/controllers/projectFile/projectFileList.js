angular.module('app.controllers')
    .controller('ProjectFileListController',['$scope','ProjectFile','$routeParams' ,
                                    function ($scope,  ProjectFile , $routeParams) {

        $scope.file = ProjectFile.query({'id':$routeParams.id});

      

    }]);