angular.module('app.controllers')
    .controller('ProjectMemberRemoveController',
        ['$scope','$location','$routeParams','ProjectMember' ,
 function ($scope, $location, $routeParams, ProjectMember) {

            $scope.projectMember = ProjectMember.find({
                id: $routeParams.id,
                idMember:$routeParams.idMember
            });



            $scope.remove = function () {
                $scope.projectMember.$delete({
                    id:$routeParams.id,
                    idMember:$scope.projectMember.id
                }).then(function(){
                    $location.path('/project/'+$routeParams.id+'/members');
                });


        }

      
    }]);
