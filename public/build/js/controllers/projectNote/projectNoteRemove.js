angular.module('app.controllers')
    .controller('ProjectNoteRemoveController',
        ['$scope','$location','$routeParams','ProjectNote' , 
            function ($scope, $location, $routeParams, ProjectNote) {

            $scope.note = ProjectNote.get({id: $routeParams.id});

            $scope.remove = function () {
                $scope.note.$delete().then(function(){
                    $location.path('/project');
                });


        }

      
    }]);
