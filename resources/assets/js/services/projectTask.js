angular.module('app.service')
       .service('ProjectTask',['$resource','appConfig','$filter',function($resource,appConfig,$filter){

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
                   transformResponse: function (data, headers) {
                       var o = appConfig.utils.transformResponse(data, headers);

                       if (angular.isObject(o) && o.hasOwnProperty('due_date')) {
                           var arrayData  = o.due_date.split('-');
                           var month = parseInt( arrayData[1]-1 );
                           o.due_date = new Date(arrayData[0],month,arrayData[2]);
                       }


                       if (angular.isObject(o) && o.hasOwnProperty('start_date')) {
                           var arrayData  = o.due_date.split('-');
                           var month = parseInt( arrayData[1]-1 );
                           o.due_date = new Date(arrayData[0],month,arrayData[2]);
                       }

                       return o;
                   }
               },
               save:{
                   method:'POST',
                   transformRequest: transformData
               },
               update:{
                   method:'PUT',
                   transformRequest: transformData
               }

               
           });
           
       }]);

