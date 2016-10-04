angular.module('app.controllers')
    .controller('ProjectMemberListController',['$scope','$routeParams' ,'ProjectMember' ,
                                    function ($scope , $routeParams,ProjectMember) {


        $scope.projectMember = ProjectMember.get({'id':$routeParams.id});



    }]);