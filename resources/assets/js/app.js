/**
 * Created by root on 26/06/16.
 */
var app = angular.module('app',['ngRoute' ,'angular-oauth2', 'app.controllers','app.service'] );

angular.module('app.controllers',[ 'ngMessages','angular-oauth2' ]);
angular.module('app.service',[ 'ngResource']);


app.provider('appConfig' , function () {
    var config = {
        baseUrl:'http://desenvolvimento-fluxo-projeto/'
    };

    return {
        config:config,
        $get:function(){
            return config;
        }
    }
})

app.config(['$routeProvider','$httpProvider','OAuthProvider','OAuthTokenProvider','appConfigProvider',
    function($routeProvider , $httpProvider , OAuthProvider,  OAuthTokenProvider  , appConfigProvider){



    $routeProvider
        .when('/login',{
            templateUrl:'build/views/login.html',
            controller:'LoginController'
        })
        .when('/home',{
            templateUrl:'build/views/home.html',
            controller:'HomeController'
        })
        .when('/clients',{
            templateUrl:'build/views/client/list.html',
            controller:'ClientListController'
        })
        .when('/clients/:id/view',{
            templateUrl:'build/views/client/view.html',
            controller:'ClientViewController'
        })
        .when('/clients/new',{
            templateUrl:'build/views/client/new.html',
            controller:'ClientNewController'
        })
        .when('/clients/:id/edit',{
            templateUrl:'build/views/client/edit.html',
            controller:'ClientEditController'
        })
        .when('/clients/:id/remove',{
            templateUrl:'build/views/client/remove.html',
            controller:'ClientRemoveController'
        })



        .when('/project/note',{
            templateUrl:'build/views/project-note/list.html',
            controller:'ClientListController'
        })

        .when('/project/note/new',{
            templateUrl:'build/views/project-note/new.html',
            controller:'ClientNewController'
        })
        .when('/project/note/:id/edit',{
            templateUrl:'build/views/project-note/edit.html',
            controller:'ClientEditController'
        })
        .when('/project/note/:id/remove',{
            templateUrl:'build/views/project-note/remove.html',
            controller:'ClientRemoveController'
        });



            OAuthProvider.configure({
                baseUrl: appConfigProvider.config.baseUrl,
                clientId: 'appId1',
                clientSecret: 'secret', // optional
                grantPath: 'oauth/access_token',
            });

        OAuthTokenProvider.configure({
            name: 'token',
            options:{
                secure:false
            }
        })

}]);



    app.run(['$rootScope', '$window', 'OAuth', function($rootScope, $window, OAuth) {
        $rootScope.$on('oauth:error', function(event, rejection) {
            // Ignore `invalid_grant` error - should be catched on `LoginController`.
            if ('invalid_grant' === rejection.data.error) {
                return;
            }

            // Refresh token when a `invalid_token` error occurs.
            if ('invalid_token' === rejection.data.error) {
                return OAuth.getRefreshToken();
            }

            // Redirect to `/login` with the `error_reason`.
            return $window.location.href = '/login?error_reason=' + rejection.data.error;
        });
    }]);