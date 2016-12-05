angular.module('app.directives')
    .directive('loadTemplate',[
        '$timeout','appConfig','ProjectFile','OAuth','$http','$compile',
        function($timeout,appConfig ,ProjectFile,OAuth,$http,$compile) {

            return {
                restrict: 'E',
                link: function (scope, element, attr) {

                    scope.$on('$routeChangeStart', function (event, next, current) {
                        if (OAuth.isAuthenticated() ) {
                            if(next.$$route.originalPath != '/login' && next.$$route.originalPath != '/logout')
                            {
                                if(!scope.isTemlateLoad) {
                                    scope.isTemlateLoad = true;
                                    $http.get(attr.url).then(function (response) {
                                        element.html(response.data);
                                        $compile(element.contents())(scope);
                                    });
                                }
                            }else{

                                resetTemplate();

                            }
                         }

                         resetTemplate();

                        function resetTemplate(){

                            scope.isTemlateLoad = false;
                            element.html('');

                        }

                    });

                }
            }
        }
    ]);
