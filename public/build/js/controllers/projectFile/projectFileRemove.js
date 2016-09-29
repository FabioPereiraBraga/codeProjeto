angular.module('app.controllers')
    .controller('ProjectNoteRemoveController',
        ['$scope','$location','$routeParams','ProjectFile' ,
 function ($scope, $location, $routeParams, ProjectFile) {

            $scope.projectFile = ProjectFile.get({
                id: $routeParams.id,
                idNote:$routeParams.idNote
            });



            $scope.remove = function () {
                $scope.projectFile.$delete({
                    id:null,
                    idNote:$scope.projectFile.id
                }).then(function(){
                    $location.path('/project/'+$routeParams.id+'/file');
                });


        }

      
    }]);
