angular.module('app.controllers')
    .controller('ClientDashboardController', 
                ['$scope','$location','$routeParams','Client' , 
        function ($scope, $location, $routeParams, Client) {

             $scope.clients = {

             };
            $scope.clienteName = {

            };

            Client.query({
                orderBy:'created_at',
                sortedBy:'desc',
                limit:8
            },function(response){
                $scope.clients = response.data;
                $scope.client = response.data[ 0 ];
            });

            Client.query({
                orderBy:'name',
                sortedBy:'asc'

            },function(response){
                $scope.names =   response.data;
            });




            $scope.filterClientName = function(  ){

                Client.query({
                    orderBy:'created_at',
                    sortedBy:'desc',
                    search:$scope.clienteName ,
                    searchFields:'id',
                    limit:8,

                },function(response){
                    $scope.clients = response.data;
                    $scope.client = response.data[ 0 ];
                });
            } ;

            
            $scope.showClient = function( client ){

                $scope.client = client;
                
            };


      
    }]);
