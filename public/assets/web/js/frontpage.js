/**
 * Created by Urich_notebook_2 on 21.07.2016.
 */

var main = (function () {
    doConstruct = function () {
        this.init_callbacks = [];
    };
    doConstruct.prototype = {
        add_init_callback : function (func) {
            if (typeof(func) == 'function') {
                this.init_callbacks.push(func);
                return true;
            }
            else {
                return false;
            }
        }
    };
    return new doConstruct;
})();
$(document).ready(function () {
    $.each(main.init_callbacks, function (index, func) {
        func();
    });
});
var users_registr = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.registration_checkbox);
    };
    doConstruct.prototype = {
        registration_checkbox: function () { //only one checkbox is checked
            
        },
    };
    return new doConstruct;
})();
