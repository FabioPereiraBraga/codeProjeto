/**
 * Created by root on 21/08/16.
 */

angular.module('app.filters').filter('uniqueNameLimit',['$filter', function( $filter ){
    var prevVal = null;

    return function(input){

        if(prevVal !== input )
        {
            prevVal = input;
            return prevVal;
        }
        return null;

    }
}]);
