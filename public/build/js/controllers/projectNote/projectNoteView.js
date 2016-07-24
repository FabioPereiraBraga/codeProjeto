angular.module('app.controllers')
    .controller('ProjectNoteViewController',
               ['$scope','ProjectNote' ,'$routeParams',
      function ($scope, ProjectNote , $routeParams) {

       $scope.notes = ProjectNote.query({id: $routeParams.id,idNote:$routeParams.idNote });


      
    }]);