/**
 * Created by root on 26/06/16.
 */
var app = angular.module('app',
    [
        'ngRoute' ,'angular-oauth2', 'app.controllers','app.service','app.filters',
        'ui.bootstrap.typeahead','ui.bootstrap.datepicker','ui.bootstrap.modal','ui.bootstrap.tpls',
        'ngFileUpload','app.directives','http-auth-interceptor','angularUtils.directives.dirPagination',
        'ui.bootstrap.dropdown'
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
            {value:'3',label:'Concluido'}
            ]
        },
        projectTask:{
            status:[
                {value:'1',label:'Não Iniciado'},
                {value:'2',label:'Iniciado'},
                {value:'3',label:'Concluido'}
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

                    if(dataJson.hasOwnProperty('data') &&
                        Object.keys(dataJson).length === 1 &&
                        !dataJson.hasOwnProperty('meta') )
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
        $httpProvider.interceptors.splice(0,1);
        $httpProvider.interceptors.splice(0,1);
        $httpProvider.interceptors.push('oauthFixInterceptor');



    $routeProvider
        .when('/login',{
            templateUrl:'build/views/login.html',
            controller:'LoginController'
        })
        .when('/logout',{
            resolve:{
                logout:['$location','OAuthToken',function($location,OAuthToken){
                    OAuthToken.removeToken();
                    $location.path('/login');
                }]
            }
        })
        .when('/home',{
            templateUrl:'build/views/home.html',
            controller:'HomeController',
            title:'Projetos'
        })
        .when('/clients/dashboard',{
            templateUrl:'build/views/client/dashboard.html',
            controller:'ClientDashboardController',
            title:'Clients'
        })
        .when('/clients',{
            templateUrl:'build/views/client/list.html',
            controller:'ClientListController',
            title:'Clients'
        })
        .when('/clients/:id/view',{
            templateUrl:'build/views/client/view.html',
            controller:'ClientViewController',
            title:'Client View'
        })
        .when('/clients/new',{
            templateUrl:'build/views/client/new.html',
            controller:'ClientNewController',
            title:'Client New'
        })
        .when('/clients/:id/edit',{
            templateUrl:'build/views/client/edit.html',
            controller:'ClientEditController',
            title:'Client Edit'
        })
        .when('/clients/:id/remove',{
            templateUrl:'build/views/client/remove.html',
            controller:'ClientRemoveController',
            title:'Client Remove'
        })


        .when('/projects/dashboard',{
            templateUrl:'build/views/project/dashboard.html',
            controller:'ProjectDashboardController',
            title:'Projects'
        })            
        .when('/project/:id/notes',{
            templateUrl:'build/views/project-note/list.html',
            controller:'ProjectNoteListController',
            title:'Notes'
        })

        .when('/project/:id/notes/:idNote/show',{
            templateUrl:'build/views/project-note/show.html',
            controller:'ProjectNoteShowController',
            title:'Note Show'
        })
        .when('/project/:id/notes/new',{
            templateUrl:'build/views/project-note/new.html',
            controller:'ProjectNoteNewController',
            title:'Note New'
        })
        .when('/project/:id/notes/:idNote/edit',{
            templateUrl:'build/views/project-note/edit.html',
            controller:'ProjectNoteEditController',
            title:'Note Edit'
        })
        .when('/project/:id/notes/:idNote/remove',{
            templateUrl:'build/views/project-note/remove.html',
            controller:'ProjectNoteRemoveController',
            title:'Note Remove'
        })


        .when('/project/:idProject/files',{
            templateUrl:'build/views/project-file/list.html',
            controller:'ProjectFileListController',
            title:'Files'
        })
       .when('/project/:id/file/new',{
            templateUrl:'build/views/project-file/new.html',
            controller:'ProjectFileNewController',
           title:'File New'
        })
        .when('/project/:id/files/:idFile/edit',{
            templateUrl:'build/views/project-file/edit.html',
            controller:'ProjectFileEditController',
            title:'File Edit'
        })
        .when('/project/:id/files/:idFile/remove',{
            templateUrl:'build/views/project-file/remove.html',
            controller:'ProjectFileRemoveController',
            title:'File Remove'
        })

          // Rotas Project Member

        .when('/project/:id/members',{
            templateUrl:'build/views/project-member/list.html',
            controller:'ProjectMemberListController',
            title:'Members'
        })
        .when('/project/:id/member/new',{
            templateUrl:'build/views/project-member/new.html',
            controller:'ProjectMemberNewController',
            title:'Member New'
        })
        .when('/project/:id/member/:idMember/edit',{
            templateUrl:'build/views/project-member/edit.html',
            controller:'ProjectMemberEditController',
            title:'Member Edit'
        })
        .when('/project/:id/member/:idMember/remove',{
            templateUrl:'build/views/project-member/remove.html',
            controller:'ProjectMemberRemoveController',
            title:'Member Remove'
        })

         // Rotas Project Task

        .when('/task/dashboard',{
            templateUrl:'build/views/project-task/dashboard.html',
            controller:'TaskDashboardController',
            title:'Task'
        })
        .when('/project/:id/task',{
            templateUrl:'build/views/project-task/list.html',
            controller:'ProjectTaskListController',
            title:'Tasks'
        })
        .when('/project/:id/task/new',{
            templateUrl:'build/views/project-task/new.html',
            controller:'ProjectTaskNewController',
            title:'Task New'
        })
        .when('/project/:id/task/:idTask/edit',{
            templateUrl:'build/views/project-task/edit.html',
            controller:'ProjectTaskEditController',
            title:'Task edit'
        })
        .when('/project/:id/task/:idTask/remove',{
            templateUrl:'build/views/project-task/remove.html',
            controller:'ProjectTaskRemoveController',
            title:'Task Remove'
        })

        // Rotas Project

        .when('/project',{
            templateUrl:'build/views/project/list.html',
            controller:'ProjectListController',
            title:'Project'
        })
        .when('/project/:id/view',{
            templateUrl:'build/views/project/view.html',
            controller:'ProjectViewController',
            title:'Project View'
        })
        .when('/project/new',{
            templateUrl:'build/views/project/new.html',
            controller:'ProjectNewController',
            title:'Project New'
        })
        .when('/project/:id/edit',{
            templateUrl:'build/views/project/edit.html',
            controller:'ProjectEditController',
            title:'Project Edit'
        })
        .when('/project/:id/remove',{
            templateUrl:'build/views/project/remove.html',
            controller:'ProjectRemoveController',
            title:'Project Remove'
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





    app.run(['$rootScope', '$location','$http','$modal' ,'httpBuffer','OAuth', function($rootScope,$location,$http, $modal , httpBuffer , OAuth) {

        $rootScope.$on('$routeChangeStart',function(event,next,current){
              if(next.$$route.originalPath != '/login'){
                if(!OAuth.isAuthenticated()){
                    $location.path('login');
                }
              }
        });

        $rootScope.$on('$routeChangeSuccess',function(event,current,previous){
           $rootScope.pageTitle = current.$$route.title;

        });
        $rootScope.$on('oauth:error', function(event, data) {
            // Ignore `invalid_grant` error - should be catched on `LoginController`.
            if ('invalid_grant' === data.rejection.data.error) {
                return;
            }

            // Refresh token when a `invalid_token` error occurs.

            if ('access_denied' === data.rejection.data.error) {
                httpBuffer.append(data.rejection.config, data.deferred);
                if (!$rootScope.loginModalOpened) {

                var modalInstance = $modal.open({
                    templateUrl: 'build/views/templates/login-modal.html',
                    controller: 'LoginModalController'
                });
                    $rootScope.loginModalOpened = true;
                    return;
            }
            }

            // Redirect to `/login` with the `error_reason`.
            return   $location.path('login');
        });
    }]);