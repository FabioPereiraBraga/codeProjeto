angular.module('app.controllers')
    .controller('ProjectNoteShowController',
               ['$scope','ProjectNote' ,'$routeParams','$location',
      function ($scope, ProjectNote , $routeParams , $location) {

        $scope.projectNote = ProjectNote.get({id: $routeParams.id,idNote:$routeParams.idNote });

          $scope.voltar  = function () {
              $location.path('/project/'+$routeParams.id+'/notes');
          }

      }]);