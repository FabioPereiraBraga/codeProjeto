angular.module('app.controllers')
    .controller('ProjectEditController', 
                ['$scope','$location','$routeParams','Project' , 'Client','appConfig','$cookies','$filter',
        function ($scope, $location, $routeParams, Project,Client,appConfig,$cookies,$filter) {


            Project.get({id: $routeParams.id},function(data)
            {
                $scope.project = data;
                Client.get({id:data.client_id},function(data)
                {
                   $scope.clientSelect = data;
                });
            });

            $scope.status = appConfig.project.status;
            $scope.due_date = {
                status:{
                    opened:false
                }
            }
            $scope.open = function() {

                $scope.due_date.status.opened = true;
            };
            $scope.formatName = function(model)
            {
                if(model)
                {
                   return model.name;
                }
                return '';
            };

            $scope.getClients = function(name)
            {
                return Client.query({
                    search:name,
                    searchFields:'name:like'
                }).$promise;

            };

            $scope.selectClient = function(item)
            {
                $scope.project.client_id = item.id;
            }

            $scope.save = function() {


                if( $scope.form.$valid ) {
                    $scope.project.owner_id = $cookies.getObject('user').id;

                    Project.update({id:$scope.project.project_id},$scope.project , function(){
                        $location.path('/project');
                    });

                }
            };



        }]);
