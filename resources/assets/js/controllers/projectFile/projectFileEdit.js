angular.module('app.controllers')
    .controller('ProjectFileEditController',
                ['$scope','$location','$routeParams','ProjectFile' ,
        function ($scope, $location, $routeParams, ProjectFile) {

            $scope.projectFile = ProjectFile.get({
                id: $routeParams.id,
                idNote:$routeParams.idNote
            });

          
            $scope.save = function () {
                if ($scope.form.$valid) {
                    ProjectFile.update({id:null,idNote:$scope.projectNote.id}, $scope.projectFile , function () {
                        $location.path('/project/'+$routeParams.id+'/file');
                 })


                }
        }

      
    }]);
