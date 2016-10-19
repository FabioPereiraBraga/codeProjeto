angular.module('app.service')
       .service('ProjectTask',['$resource','appConfig',
           function($resource,appConfig){





           return $resource(appConfig.baseUrl+'project/:id/tasks/:idTask',{id: '@id' , idTask:'@idTask'},{
               get: {
                   method: 'GET',
                   isArray:true
               },
               find:{
                   method: 'GET',
                   isArray:false,
                   transformResponse: function (data, headers) {
                       var o = appConfig.utils.transformResponse(data, headers);

                       if (angular.isObject(o) && o.hasOwnProperty('start_date') && o.start_date  )  {
                           var arrayData  = o.start_date.split('-');
                           var month = parseInt( arrayData[1]-1 );
                           o.start_date = new Date(arrayData[0],month,arrayData[2]);
                       }
                       if (angular.isObject(o) && o.hasOwnProperty('due_date')  && o.due_date) {
                           var arrayData  = o.due_date.split('-');
                           var month = parseInt( arrayData[1]-1 );
                           o.due_date = new Date(arrayData[0],month,arrayData[2]);
                       }


                       return o;
                   }
               },
               update:{
                   method:'PUT'
               }


           });

       }]);

