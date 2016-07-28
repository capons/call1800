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
var toll_free_number = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.add_input_prefix);
    };
    doConstruct.prototype = {
        add_input_prefix: function () { //Buy Toll Free number prefix select => add value to form input
            $('#tollfree-prefix').change(function(){
                var num_prefix = $('#tollfree-prefix').val();
                $("input[name='tfn_prefix']" ).val(num_prefix); //add number prefix to form input
            });
        },
    };
    return new doConstruct;
})();
