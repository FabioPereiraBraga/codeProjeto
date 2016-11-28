angular.module('app.controllers')
    .controller('LoginModalController',['$scope','$location','$modalInstance', '$cookies','User','OAuth', 'authService',
        function ($scope , $location , $modalInstance ,$cookies , User ,OAuth , authService) {

            $scope.user = {
                username:'',
                password:''
            }

            $scope.error = {
                mesage: '',
                error:false
            };

            $scope.$on('event:auth-loginConfirmed' , function(){
                $rootScope.loginModalOpened = false;
                $modalInstance.close();
            });

            $scope.$on('$routeChangeStart' , function(){
                $rootScope.loginModalOpened = false;
                $modalInstance.dismiss('cancel');
            });
            $scope.login = function() {
                if ($scope.form.$valid) {
                    OAuth.getAccessToken($scope.user).then(function (  ) {

                        User.authenticated({},{},function( data ){
                            $cookies.putObject('user',data);
                            authService.loginConfirmed();
                        })

                    }, function ( data ) {

                        $scope.error.error = true;
                        $scope.error.mesage = data.data.error_description;


                    });
                }


            },

                $scope.cancel = function () {
                    authService.loginCancelled();
                    $location.path('login');
                };
        }]);