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
/* tollfree.routes.php  routes js */
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
/* ./*/

var payment_methods = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.pay_button_disable);
        main.add_init_callback(this.display_stripe_form);
    };
    doConstruct.prototype = {
        pay_button_disable: function () { //disable buy button
            $('.btn.btn-primary.payment_b').click(function(){
                $(".btn.btn-primary.payment_b").attr('disabled', 'disabled');
            });

        },
        display_stripe_form: function () {
            $('#smsd').click(function(){
                $('#stripe_f').modal('show');
            })
        }
    };
    return new doConstruct;
})();

/* routes '/' front_page */
var front_page = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.search_button_change);
    };
    doConstruct.prototype = {
        search_button_change: function () { //change search bar button
            $('#fsf-input').keyup(function(){
                var input_val = $('#fsf-input').val();
                var find_button = $('#container-find');
                var call_button = $('#container-call');
                var search_bar_container = $('#msi');
                var button_container = $('#msi-b');
                var search_input_container = $('#container-si');

                if(input_val.length >= 1) {   //if some one enter value in search bar
                    search_bar_container.removeClass('default-search-bar');
                    search_bar_container.addClass('front-search-bar-center');
                    button_container.removeClass('hide-search-button');
                    button_container.addClass('front-search-button-container');
                    search_input_container.addClass('container-si');
                    call_button.addClass("sbb-hide");
                    find_button.css("border", "none");
                    if ($.isNumeric(input_val) && input_val.length == 11) { // only number 1800 + 7 digits
                        find_button.addClass("sb-hide");
                        call_button.toggleClass("sbb-hide");
                    } else {
                        if ($(".sb-hide")[0]) { //if class exist
                            find_button.removeClass("sb-hide");
                            call_button.addClass("sbb-hide");
                        }
                    }
                } else {
                    call_button.removeClass("sbb-hide");
                    find_button.css("border-right", "solid 1px antiquewhite");
                    search_bar_container.addClass('default-search-bar');
                    search_bar_container.removeClass('front-search-bar-center');
                    button_container.addClass('hide-search-button');
                    search_input_container.removeClass('container-si');
                    button_container.removeClass('front-search-button-container');

                }
            });
        },


    };
    return new doConstruct;
})();

/* ./fron_page*/

/* auth/register routes  routes js */
var user_registration = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.add_country_phone_code);
    };
    doConstruct.prototype = {
        add_country_phone_code: function () { //show modal to add new manager
            $('input[name=u_country]').focusout(function() {

                $.ajax({
                    url: './country',
                    type: "post",
                    data: {'name':$('input[name=u_country]').val(), '_token': $('input[name=_token]').val()},
                    success: function(data){
                        switch (data.success){       //needed array cell
                            case true:            //if basket goods quontity response false
                                $('input[name=f_number]').val('('+data.callingcode+')'); //add country phone code
                                $('input[name=f_postcode]').val(data.postalcode); //add postal code
                                break;
                            case false:        //if basket goods quantity response true go to next step

                        }
                    },
                    error: function(data){
                        var errors = data.responseJSON;
                       // console.log(errors);
                        // Render the errors with js ...
                    }
                });

            });
        },
    };
    return new doConstruct;
})();
/* ./*/







