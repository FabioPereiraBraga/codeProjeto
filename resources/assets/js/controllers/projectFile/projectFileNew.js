angular.module('app.controllers')
    .controller('ProjectFileNewController',
        ['$scope','$location', '$routeParams', 'Upload','Url','appConfig',
            function ($scope, $location,  $routeParams ,Upload,Url,appConfig) {


           $scope.save = function() {

          if( $scope.form.$valid ) {

                  Upload.upload({
                      url: appConfig.baseUrl+Url.getUrlFromSymbol(appConfig.urls.projectFile,{
                          id:$routeParams.id
                      }),
                      fields:{
                          name:$scope.projectFile.name,
                          description: $scope.projectFile.description,
                          project_id:$routeParams.id
                      },
                      file: $scope.projectFile.file
                  }).success(function(data,status,headers,config){
                      $location.path('/project/'+$routeParams.id+'/files');
                      console.log('file'+config.file.name+'upload . response'+data);
                  });



               // $scope.projectFile.$save({id:$routeParams.id}).then(function () {
                 //   $location.path('/project/'+$routeParams.id+'/file');
               // });
            }
        }

      
    }]);
