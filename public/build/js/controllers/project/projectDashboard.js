angular.module('app.controllers')
    .controller('ProjectDashboardController',
                ['$scope','$location','$routeParams','Project' , '$filter',
        function ($scope, $location, $routeParams, Project,$filter) {

            $scope.project = {
                
            };
            
            Project.query({
                orderBy:'created_at',
                sortedBy:'asc',
                limit:5
            },function(response){
                $scope.projects  = response.data;
                $scope.project = response.data[ 0 ];
            });

           
            
              $scope.selectProject = function( o )
              {

                  $scope.project = o;
              }
            
            
           
           


        }]);
