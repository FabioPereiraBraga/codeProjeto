/**
 * Created by root on 28/09/16.
 */
angular.module('app.service')
    .service('Url',['$interpolate',function($interpolate){

        return {
            getUrlFromSymbol:function(url,params){
                
                var urlMode =  $interpolate(url)(params);
               return urlMode.replace(/\/\//g,'/')
                             .replace(/\/$/,''); 
                
            },
            getUrlResource:function(url){
                
                return url.replace( new RegExp('{{','g') ,':')
                          .replace( new RegExp('}}','g') , '')
                          .replace( new RegExp('//','g') , '');
            }
        }

    }]);

