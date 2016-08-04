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



//Stripe payment config
// This identifies your website in the createToken call below


jQuery(function($) {
    $('#payment-form').submit(function(event) {
        var $form = $(this);

        // Before passing data to Stripe, trigger Parsley Client side validation
        $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
            formInstance.submitEvent.preventDefault();
            return false;
        });

        // Disable the submit button to prevent repeated clicks
        $form.find('#submitBtn').prop('disabled', true);

        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
    });
});

function stripeResponseHandler(status, response) {
    var $form = $('#payment-form');

    if (response.error) {
        // Show the errors on the form
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.payment-errors').addClass('alert alert-danger');
        $form.find('#submitBtn').prop('disabled', false);
        $('#submitBtn').button('reset');
    } else {
        // response contains id and card, which contains additional card details
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // and submit
        $form.get(0).submit();
    }
};
// ./Stripe payment config


