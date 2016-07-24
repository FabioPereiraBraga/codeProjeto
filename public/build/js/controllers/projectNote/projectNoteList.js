angular.module('app.controllers')
    .controller('ProjectNoteListController',
               ['$scope','ProjectNote' ,'$routeParams',
      function ($scope, ProjectNote , $routeParams) {

        $scope.notes = ProjectNote.query({id: $routeParams.id});

      
    }]);