angular.module('app.controllers')
    .controller('ProjectListController',['$scope','Project' ,function ($scope, Project) {




        $scope.project = [ ];
        $scope.totalProject = 0;
        $scope.projectPerPage = 5;

        $scope.pagination = {
            current: 1
        };

        $scope.pageChanged = function(newPage) {
            getResultsPage(newPage);
        };

        function getResultsPage(pageNumber) {
            Project.query({
                page:pageNumber,
                limit: $scope.projectPerPage
            },function(data){
                $scope.project = data.data;
                $scope.totalProject = data.meta.pagination.total;
            });


        }


        getResultsPage(1);

      
    }]);