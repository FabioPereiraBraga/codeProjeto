angular.module('app.service')
       .service('ProjectFile',['$resource','appConfig',function($resource,appConfig){

           return $resource(appConfig.baseUrl+'project/:id/file/:idFile',{id: '@id' , idNote:'@idFile'},{
               update:{
                   method:'PUT'
               },
               
           });
           
       }]);

