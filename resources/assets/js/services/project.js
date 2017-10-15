angular.module('app.service')
       .service('Project',['$resource','appConfig','$filter','$httpParamSerializer',
           function($resource , appConfig , $filter, $httpParamSerializer ){

               function transformData(data){


                   if(angular.isObject(data) && data.hasOwnProperty('due_date')){
                       var o = angular.copy(data);

                       o.due_date = $filter('date')(data.due_date,'yyyy-MM-dd');
                       return appConfig.utils.transformRequest(o);
                   }



                   return data;
               }

           return $resource(appConfig.baseUrl+'project/:id',{id: '@id'},{

               get: {
                   method: 'GET',
                   transformResponse: function (data, headers) {
                       var o = appConfig.utils.transformResponse(data, headers);

                       if (angular.isObject(o) && o.hasOwnProperty('due_date')) {
                         var arrayData  = o.due_date.split('-');
                           var month = parseInt( arrayData[1]-1 );
                         o.due_date = new Date(arrayData[0],month,arrayData[2]);
                       }
                       if (angular.isObject(o) && o.hasOwnProperty('progress')) {
                       o.progress = parseInt( o.progress);
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
               },
               query: {
                   isArray:false
               },


           });
           
       }]);