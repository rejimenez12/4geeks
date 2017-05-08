angular.module('App.Directives', [])

/*******************************************************
*******************Inicia los Selects2******************
*******************************************************/

/*.directive('initSelect2',function(){

    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            $(element[0]).select2();
        }
    }

})*/

/*******************************************************
**Inicializa los ngModel de los campos de formularios***
*******************************************************/

/*.directive('initModel', function($compile) {

    return {
        restrict: 'A',
        link: function(scope, element, attrs) {

            scope[attrs.initModel] = element[0].value;
            element.attr('ng-model', attrs.initModel);
            element.removeAttr('init-model');
            $compile(element)(scope);
        }

    }

})*/

/*******************************************************
*******Para fechas con formato dd MM yyyy - HH:ii P*****
*******************************************************/

/*.directive('datePickerMeridian', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {

            element.datetimepicker({
                format: "dd/mm/yyyy - HH:ii P",
                showMeridian: true,
                autoclose: true,
                pickerPosition: "bottom-left",
                todayBtn: true,
                language: 'es'
            });

        }

    }

})*/