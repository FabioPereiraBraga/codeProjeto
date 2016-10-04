angular.module('app.controllers')
    .controller('ProjectFileRemoveController',
        ['$scope','$location','$routeParams','ProjectMember' ,
 function ($scope, $location, $routeParams, ProjectMember) {

            $scope.projectMember = ProjectMember.get({
                id: $routeParams.id,
                idFile:$routeParams.idFile
            });



            $scope.remove = function () {
                $scope.projectMember.$delete({
                    id:$routeParams.id,
                    idFile:$scope.projectMember.id
                }).then(function(){
                    $location.path('/project/'+$routeParams.id+'/member');
                });


        }

      
    }]);
