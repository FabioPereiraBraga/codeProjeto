angular.module('app.service')
       .service('ProjectFile',['$resource','appConfig','Url',
           function($resource,appConfig,Url){

           var url = appConfig.baseUrl+Url.getUrlResource(appConfig.urls.projectFile);



           return $resource(url,
               {id: '@id' , idNote:'@idFile'},
               {
               'update': {
                   method:'PUT',
                   isArray:false,
                   transformRequest:function(data,hearder,status){
                       console.log(data);
                   }
               },
               'download':{
                   url:url+'/download',
                   method:'GET',
               }
               
           });
           
       }]);

