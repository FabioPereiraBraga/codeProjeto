angular.module('app.service')
       .service('ProjectNote',['$resource','appConfig',function($resource,appConfig){

           return $resource(appConfig.baseUrl+'project/:id',{id: '@id'},{
               update:{
                   method:'PUT'
               }
           });
           
       }]);

