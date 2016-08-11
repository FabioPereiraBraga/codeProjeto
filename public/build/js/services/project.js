angular.module('app.service')
       .service('Project',['$resource','appConfig','$filter','$httpParamSerializer',
                   function($resource , appConfig , $filter, $httpParamSerializer ){

           return $resource(appConfig.baseUrl+'project/:id',{id: '@id'},{
               update:{
                   method:'PUT',
               },
               save:{
                   method:'POST',
                   transformRequest: function (data) {
                       if(angular.isObject(data) && data.hasOwnProperty('due_date')){
                           data.due_date = $filter('date')(data.due_date,'yyyy-MM-dd');
                           return $httpParamSerializer(data);
                       }
                    return data;
                   }
               }


           });
           
       }]);