angular.module('app.directives')
    .directive('tabProject',[ function() {

            return {
                restrict: 'A',
                link: function (scope, element, attr) {



                    $(element).find('a').click(function(){
                    var link = $(this);
                    var tabContent = $(element).parent().find('.tab-content');

                        $(element).find('a').removeClass('active');

                        tabContent.find('.active').removeClass('active');
                        tabContent.find("[id="+link.attr('aria-controls')+"]").addClass('active');
                        link.addClass('active');
                        
                    });

                }
            }
        }
    ]);
