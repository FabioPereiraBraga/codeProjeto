angular.module('app.controllers')
    .controller('ProjectMemberEditController',
                ['$scope','$location','$routeParams','ProjectMember' ,
        function ($scope, $location, $routeParams, ProjectMember) {


            $scope.projectFile = ProjectMember.get({
                id: $routeParams.id,
                idFile:$routeParams.idFile
            });



            $scope.save = function () {

                if ($scope.form.$valid) {

                    //Notes.update({ id:$id }, note);

                    ProjectMember.update({id:$routeParams.id,idFile:$routeParams.idFile},$scope.projectFile,function(){
                    $location.path('/project/'+$routeParams.id+'/files');
               });


                }
        }

      
    }]);
