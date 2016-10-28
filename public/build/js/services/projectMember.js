angular.module('app.service')
       .service('ProjectMember',['$resource','appConfig',function($resource,appConfig){

         
           return $resource(appConfig.baseUrl+'project/:id/members/:idMember',{id: '@id' , idMember:'@idMember'},{
               update:{
                   method:'PUT'

               },
               get:{
                   method:'GET',
                   isArray:true
               }
               
           });
           
       }]);

