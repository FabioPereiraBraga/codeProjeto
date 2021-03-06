angular.module('app.service')
       .service('Client',['$resource','appConfig',function($resource,appConfig){

           return $resource(appConfig.baseUrl+'client/:id',{id: '@id'},{
               update:{
                   method:'PUT',
               },
               'get': {
                   method:'GET',
                   isArray:true
               },
               'find': {
                   method:'GET',
                   isArray:false
               },
               query:{
                   isArray:false
               }
               


           });
           
       }]);