angular.module('app.controllers')
    .controller('ProjectNoteFindListController',
               ['$scope','ProjectNote' ,'$routeParams',
      function ($scope, ProjectNote , $routeParams) {

        $scope.notes = ProjectNote.get({id: $routeParams.id,idNote:$routeParams.idNote });

          console.log( $scope.notes);
      
    }]);