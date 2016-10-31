/**
 * Created by root on 26/06/16.
 */
var app = angular.module('app',
    [
        'ngRoute' ,'angular-oauth2', 'app.controllers','app.service','app.filters',
        'ui.bootstrap.typeahead','ui.bootstrap.datepicker','ui.bootstrap.tpls',
        'ngFileUpload','app.directives'
]);

angular.module('app.controllers',[ 'ngMessages','angular-oauth2' ]);
angular.module('app.filters',[]);
angular.module('app.directives',[]);
angular.module('app.service',[ 'ngResource']);



app.provider('appConfig' ,['$httpParamSerializerProvider' ,function ( $httpParamSerializerProvider) {
    var config = {
        baseUrl:'http://desenvolvimento-fluxo-projeto/',
        project:{
            status:[
            {value:'1',label:'Não Iniciado'},
            {value:'2',label:'Iniciado'},
            {value:'1',label:'Concluido'}
            ]
        },
        projectTask:{
            status:[
                {value:'1',label:'Não Iniciado'},
                {value:'2',label:'Iniciado'},
                {value:'1',label:'Concluido'}
            ]
        },
        urls:{
            projectFile:'project/{{id}}/file/{{idFile}}'
        },
        utils:{
            transformRequest:function(data){



              if(angular.isObject(data)){
                 return  $httpParamSerializerProvider.$get()(data);
              }
                return data;
            },
            transformResponse: function (data,headers) {


                var headersGetter = headers();

                if( headersGetter['content-type'] == 'application/json' ||
                    headersGetter['content-type'] == 'text/json'
                )
                {
                    var dataJson = JSON.parse(data);

                    if(dataJson.hasOwnProperty('data'))
                    {
                        dataJson = dataJson.data;
                    }
                    return dataJson;
                }

               

                return data;
            }
            
        }
    };

    return {
        config:config,
        $get:function(){
            return config;
        }
    }
} ])

app.config(['$routeProvider','$httpProvider','OAuthProvider','OAuthTokenProvider','appConfigProvider',
    function($routeProvider , $httpProvider , OAuthProvider,  OAuthTokenProvider  , appConfigProvider){

        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.defaults.transformRequest = appConfigProvider.config.utils.transformRequest;
        $httpProvider.defaults.transformResponse = appConfigProvider.config.utils.transformResponse;


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



        .when('/project/:id/notes',{
            templateUrl:'build/views/project-note/list.html',
            controller:'ProjectNoteListController'
        })

        .when('/project/:id/notes/:idNote/show',{
            templateUrl:'build/views/project-note/show.html',
            controller:'ProjectNoteShowController'
        })
        .when('/project/:id/notes/new',{
            templateUrl:'build/views/project-note/new.html',
            controller:'ProjectNoteNewController'
        })
        .when('/project/:id/notes/:idNote/edit',{
            templateUrl:'build/views/project-note/edit.html',
            controller:'ProjectNoteEditController'
        })
        .when('/project/:id/notes/:idNote/remove',{
            templateUrl:'build/views/project-note/remove.html',
            controller:'ProjectNoteRemoveController'
        })


        .when('/project/:idProject/files',{
            templateUrl:'build/views/project-file/list.html',
            controller:'ProjectFileListController'
        })
       .when('/project/:id/file/new',{
            templateUrl:'build/views/project-file/new.html',
            controller:'ProjectFileNewController'
        })
        .when('/project/:id/files/:idFile/edit',{
            templateUrl:'build/views/project-file/edit.html',
            controller:'ProjectFileEditController'
        })
        .when('/project/:id/files/:idFile/remove',{
            templateUrl:'build/views/project-file/remove.html',
            controller:'ProjectFileRemoveController'
        })

          // Rotas Project Member

        .when('/project/:id/members',{
            templateUrl:'build/views/project-member/list.html',
            controller:'ProjectMemberListController'
        })
        .when('/project/:id/member/new',{
            templateUrl:'build/views/project-member/new.html',
            controller:'ProjectMemberNewController'
        })
        .when('/project/:id/member/:idMember/edit',{
            templateUrl:'build/views/project-member/edit.html',
            controller:'ProjectMemberEditController'
        })
        .when('/project/:id/member/:idMember/remove',{
            templateUrl:'build/views/project-member/remove.html',
            controller:'ProjectMemberRemoveController'
        })

         // Rotas Project Task

        .when('/project/:id/task',{
            templateUrl:'build/views/project-task/list.html',
            controller:'ProjectTaskListController'
        })
        .when('/project/:id/task/new',{
            templateUrl:'build/views/project-task/new.html',
            controller:'ProjectTaskNewController'
        })
        .when('/project/:id/task/:idTask/edit',{
            templateUrl:'build/views/project-task/edit.html',
            controller:'ProjectTaskEditController'
        })
        .when('/project/:id/task/:idTask/remove',{
            templateUrl:'build/views/project-task/remove.html',
            controller:'ProjectTaskRemoveController'
        })

        // Rotas Project

        .when('/project',{
            templateUrl:'build/views/project/list.html',
            controller:'ProjectListController'
        })
        .when('/project/:id/view',{
            templateUrl:'build/views/project/view.html',
            controller:'ProjectViewController'
        })
        .when('/project/new',{
            templateUrl:'build/views/project/new.html',
            controller:'ProjectNewController'
        })
        .when('/project/:id/edit',{
            templateUrl:'build/views/project/edit.html',
            controller:'ProjectEditController'
        })
        .when('/project/:id/remove',{
            templateUrl:'build/views/project/remove.html',
            controller:'ProjectRemoveController'
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