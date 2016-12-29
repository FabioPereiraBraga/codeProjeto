angular.module('app.controllers')
    .controller('HomeController',
         ['$scope','$cookies','Project',
          function ($scope,$cookies,Project) {

        //console.log($cookies.getObject('user'));
              $scope.projects   = [];
                  Project.query({ }, function(response){
              $scope.projectsSelect   =  response.data;
          });
           
              Project.query({
                  orderBy:'created_at',
                  sortedBy:'desc',
                  limit:6,
              }, function(response){
                  $scope.projects   =  response.data;
              });    

           
         $scope.filterSelect = function(){

             if($scope.projectSelect === null)
             {
                 Project.query({
                     orderBy:'created_at',
                     sortedBy:'desc',
                     limit:6,
                 }, function(response){
                     $scope.projects   =  response.data;
                 });
             }else{
                 Project.get({id:$scope.projectSelect},function(data)
                 {
                     $scope.projects = [ ];
                     $scope.projects = [data];

                 });
             }






         }
    }]);