angular.module('app.controllers')
    .controller('ProjectMemberListController',['$scope','$routeParams' ,'$route','ProjectMember' , 'User',
                                    function ($scope , $routeParams,$route,ProjectMember,User) {


        $scope.projectMembers = ProjectMember.get({'id':$routeParams.id,
        orderBy:'id',
        sortedBy:'desc'
        });
        var newProjectMember  = new ProjectMember();


                                        $scope.getUser = function(event,name)
                                        {

                                            return User.query({
                                                search:name,
                                                searchFields:'name:like'
                                            }).$promise;

                                        };

                                        $scope.selectUser = function(item)
                                        {
                                          
                                            newProjectMember.user_id = item.id;
                                        };



                                        $scope.save = function() {


                                            if( $scope.form.$valid ) {

                                                newProjectMember.$save({id:$routeParams.id}).then(function () {
                                                    $route.reload();
                                                });

                                            }
                                        }










    }]);