<div id="stripe_f" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                {!! Form::open( ['data-parsley-validate', 'id' => 'payment-form']) !!}

                {!! Form::hidden('ctfn_type', 1, [
                       'class'                         => 'form-control',
                       'required'                      => 'required',
                       ]) !!}

                <div class="form-group" id="last-name-group">
                    {!! Form::label('lastName', 'Last Name:') !!}
                    {!! Form::text('last_name', null, [
                        'class'                         => 'form-control',
                        'required'                      => 'required',
                        'data-parsley-required-message' => 'Last name is required',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                        'data-parsley-minlength'        => '2',
                        'data-parsley-maxlength'        => '32',
                        'data-parsley-class-handler'    => '#last-name-group'
                        ]) !!}
                </div>

                <div class="form-group" id="email-group">
                    {!! Form::label('email', 'Email address:') !!}
                    {!! Form::email('email', null, [
                        'class' => 'form-control',
                        'placeholder'                   => 'email@example.com',
                        'required'                      => 'required',
                        'data-parsley-required-message' => 'Email name is required',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-class-handler'    => '#email-group'
                        ]) !!}
                </div>

                <div class="form-group" id="product-group">
                    {!! Form::label('product', 'Select product:') !!}
                    {!! Form::select('product', ['book' => 'Book ($10)', 'game' => 'Game ($20)', 'movie' => 'Movie ($15)'], 'Book', [
                        'class'                       => 'form-control',
                        'required'                    => 'required',
                        'data-parsley-class-handler'  => '#product-group'
                        ]) !!}
                </div>

                <div class="form-group" id="cc-group">
                    {!! Form::label(null, 'Credit card number:') !!}
                    {!! Form::text(null, null, [
                        'class'                         => 'form-control',
                        'required'                      => 'required',
                        'data-stripe'                   => 'number',
                        'data-parsley-type'             => 'number',
                        'maxlength'                     => '16',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-class-handler'    => '#cc-group'
                        ]) !!}
                </div>

                <div class="form-group" id="ccv-group">
                    {!! Form::label(null, 'Card Validation Code (3 or 4 digit number):') !!}
                    {!! Form::text(null, null, [
                        'class'                         => 'form-control',
                        'required'                      => 'required',
                        'data-stripe'                   => 'cvc',
                        'data-parsley-type'             => 'number',
                        'data-parsley-trigger'          => 'change focusout',
                        'maxlength'                     => '4',
                        'data-parsley-class-handler'    => '#ccv-group'
                        ]) !!}
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" id="exp-m-group">
                            {!! Form::label(null, 'Ex. Month') !!}
                            {!! Form::selectMonth(null, null, [
                                'class'                 => 'form-control',
                                'required'              => 'required',
                                'data-stripe'           => 'exp-month'
                            ], '%m') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="exp-y-group">
                            {!! Form::label(null, 'Ex. Year') !!}
                            {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                                'class'             => 'form-control',
                                'required'          => 'required',
                                'data-stripe'       => 'exp-year'
                                ]) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Place order!', ['class' => 'btn btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--
                <button type="button" class="btn btn-primary">Save changes</button>
                -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->