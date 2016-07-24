angular.module('app.controllers')
    .controller('ProjectNoteEditController', 
                ['$scope','$location','$routeParams','ProjectNote' , 
        function ($scope, $location, $routeParams, ProjectNote) {

            $scope.notes = ProjectNote.query({id: $routeParams.id,idNote:$routeParams.idNote });


           console.log( $scope.notes );
          
            $scope.save = function () {
                if ($scope.form.$valid) {
                    ProjectNote.update({id:$scope.notes.id},$scope.notes,function () {
                     $location.path('/project');
                 })


                }
        }

      
    }]);
