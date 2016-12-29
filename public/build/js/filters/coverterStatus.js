/**
 * Created by root on 21/08/16.
 */

angular.module('app.filters').filter('coverterStatus',['appConfig', function( appConfig ){
    

    return function(input){

        for( var i = 0; i < appConfig.project.status.length; i++)
        {
            if( appConfig.project.status[ i ].value  == input ){
                return  appConfig.project.status[ i ].label;
            }
        }
      

    }
}]);
