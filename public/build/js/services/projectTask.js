angular.module('app.service')
       .service('ProjectTask',['$resource','appConfig','$filter',
           function($resource,appConfig,$filter){



           function transformData(data){

               if(angular.isObject(data) && data.hasOwnProperty('due_date')){
                   var o = angular.copy(data);
                   o.due_date = $filter('date')(data.due_date,'yyyy-MM-dd');
                   return appConfig.utils.transformRequest(o);
               }

               if(angular.isObject(data) && data.hasOwnProperty('start_date')){
                   var o = angular.copy(data);
                   o.due_date = $filter('date')(data.start_date,'yyyy-MM-dd');
                   return appConfig.utils.transformRequest(o);
               }

              return data;
           }



           return $resource(appConfig.baseUrl+'project/:id/tasks/:idTask',{id: '@id' , idTask:'@idTask'},{
               get: {
                   method: 'GET',
                   isArray:true
               },
               find:{
                   method: 'GET',
                   isArray:false
               },
               update:{
                   method:'PUT'
               }

               
           });
           
       }]);

