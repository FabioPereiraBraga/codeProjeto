angular.module('app.controllers')
    .controller('ProjectNewController',['$scope','$location','Project' , 'Client' ,'$cookies','appConfig',
                               function ($scope, $location, Project, Client ,$cookies,appConfig) {

        $scope.project = new Project();
        $scope.status = appConfig.project.status;
        $scope.due_date = {
            status:{
                opened:false
            }
        }


                                   $scope.formatName = function(model)
                                   {
                                       if(model)
                                       {
                                           return model.name;
                                       }
                                       return '';
                                   };

                                   $scope.getClients = function(event,name)
                                   {
                                    
                                       return Client.query({
                                           search:name,
                                           searchFields:'name:like'
                                       }).$promise;

                                   };

                                   $scope.selectClient = function(item)
                                   {
                                       $scope.project.client_id = item.id;
                                   };

                                   $scope.open = function() {
                                     
                                       $scope.due_date.status.opened = true;
                                   };

        $scope.save = function() {
            

            if( $scope.form.$valid ) {
                $scope.project.owner_id = $cookies.getObject('user').id;
                
                $scope.project.$save().then(function () {
                    $location.path('/project');
                });

            }
        }

      
    }]);
