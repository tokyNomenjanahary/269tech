@extends($activeTemplate.'layouts.auth')
@section('content')

    @php
        $registerContent = getContent('register.content',true);
    @endphp

    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('assets/global/css/intlTelInput.css') }}">
    </head>
    <section class="registration-section bg_img" style="background-image: url( {{ getImage('assets/images/frontend/register/' . @$registerContent->data_values->image, '1920x960') }} );">
        <div class="registration-area">
            <div class="registration-area-inner">
                <div class="text-center row">
                    <a class="site-logo site-logo-register float-left" href="{{ route('home') }}"><img
                                src="{{ asset('assets/images/logoIcon/logo.png') }}" alt="site-logo"></a>
                    <!--h2 class="title mb-3 float-left">{{ __(@$general->login_title) }}</h2>
                    <p>{{ __(@$general->login_sub_title) }}</p-->


                </div>

                <form action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();" class="mt-4">
                    <div class="row">
                        <div class="form-group">
                            <h3 class="title">{{ __('Register') }}</h2>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group pd-10">
                 <p><span class="citrus-yellow">{{ __('Earn money 24/7.') }}</span><span class="dark-yellow">{{ __('GzerOne, simple and fun') }}</span></p>
                    </div>

                    <div class="row">
                        @csrf

                        @if(session()->get('reference') != null)
                            <div class="form-group col-md-6 d-none">
                                <label for="referenceBy">{{ __('Reference BY') }}</label>

                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="las la-user"></i></div>
                                    </div>
                                    <input type="text" name="referBy" id="referenceBy" class="form-control"
                                            value="{{session()->get('reference')}}" readonly>
                                </div>
                            </div>
                        @endif

                        <div class="form-group col-md-6">
                            <label for="firstname">{{ __('First Name') }}</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-user"></i></div>
                                </div>
                                <input id="firstname" type="text" class="form-control border" name="firstname"
                                        value="{{ old('firstname') }}" required>
                            </div>
                        </div><!-- form-group end -->
                        <div class="form-group col-md-6">
                            <label for="lastname">{{ __('Last Name') }}</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-user"></i></div>
                                </div>
                                <input id="lastname" type="text" class="form-control border" name="lastname"
                                        value="{{ old('lastname') }}" required>
                            </div>
                        </div><!-- form-group end -->


                        <div class="form-group col-md-6">
                            <label for="country">{{ __('Country') }}</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-country"></i></div>
                                </div>
                                <input id="country" name="country" type="text" value="{{ old('country') }}" class="form-control border">
                             <!--    <select name="country" id="country" class="form-control">
                                    @foreach($countries as $key => $country)
                                        <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                    @endforeach
                                </select> -->
                            </div>
                        </div><!-- form-group end -->

                        <div class="form-group col-md-6">
                            <label for="country">{{ __('Mobile') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text mobile-code border-0">

                                        </span>
                                        <input type="hidden" name="mobile_code">
                                        <input type="hidden" name="country_code">
                                    </div>
                                </div>
                                <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form-control checkUser" placeholder="">
                            </div>
                            <small class="text-danger mobileExist"></small>
                        </div><!-- form-group end -->

                        <div class="form-group col-md-6 d-none">
                            <label for="username">{{ __('Username') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="las la-user"></i></div>
                                </div>
                                <input id="username" type="text" class="form-control checkUser" name="username" value="{{ old('username') }}">
                            </div>
                            <small class="text-danger usernameExist"></small>
                        </div><!-- form-group end -->

                        <div class="form-group col-md-12">
                            <label for="email">@lang('Email address')</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-at"></i></div>
                                </div>
                                <input id="email" type="email" class="form-control border" name="email"
                                        value="{{ old('email') }}" placeholder="" required>
                            </div>
                        </div><!-- form-group end -->

                        <div class="form-group col-md-12">
                            <label for="wallet">@lang('Wallet BSC')</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-at"></i></div>
                                </div>
                                <input id="wallet" type="text" class="form-control border" name="wallet"
                                        value="{{ old('wallet') }}" placeholder="">
                            </div>
                        </div><!-- form-group end -->
                           <div class="form-group col-md-12">
                            @php
                                $url = '/academy.binance.com/fr/articles/how-to-get-started-with-binance-smart-chain-bsc';
                            @endphp
                            No account BSC? <a href="@if(!str_contains( "$url", '//'))//@endif{{$url}}" target='_blank'>
                                <span>{{ __('Create here ...') }}</span>
                            </a>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-at"></i></div>
                                </div>
                            </div>
                        </div><!-- form-group end -->
                        <div class="form-group hover-input-popup col-md-6">
                            <label for="password">@lang('Password')</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-key"></i></div>
                                </div>
                                <input id="password" type="password" class="form-control border" name="password" required>
                            </div>
                            @if($general->secure_password)
                                <div class="input-popup">
                                    <p class="error lower">@lang('1 small letter minimum')</p>
                                    <p class="error capital">@lang('1 capital letter minimum')</p>
                                    <p class="error number">@lang('1 number minimum')</p>
                                    <p class="error special">@lang('1 special character minimum')</p>
                                    <p class="error minimum">@lang('6 character password')</p>
                                </div>
                            @endif
                        </div><!-- form-group end -->

                        <div class="form-group col-md-6">
                            <label for="password-confirm">@lang('Confirm Password')</label>
                            <div class="input-group ">
                                <div class="input-group-prepend d-none">
                                    <div class="input-group-text"><i class="las la-key"></i></div>
                                </div>
                                <input id="password-confirm" type="password" class="form-control border" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div><!-- form-group end -->

                        <div class="d-flex justify-content-center w-100 mb-3">
                            @php echo loadReCaptcha() @endphp
                        </div>

                        @include($activeTemplate.'partials.custom_captcha')

                        @if($general->agree)
                            @php
                                $extra_pages = getContent('extra.element');
                            @endphp
                            <div class="form-group col-md-8 d-flex align-items-start">
                                <input type="checkbox" id="agree" name="agree" class="custom_checkbox">&nbsp;
                                <label for="agree">@lang('I agree with')
                                    @forelse($extra_pages as $item)
                                        <a href="{{ route('extra.details', [$item->id, @slug($item->data_values->title)]) }}">{{ __(@$item->data_values->title) }}</a> {{ $loop->last ? '' : ',' }}
                                    @empty

                                    @endforelse
                                </label>
                            </div>
                        @endif

                        <div class="mt-3 text-center col-md-12">
                            <button type="submit" class="cmn-btn rounded-0 w-100 border pd-0">@lang('Register')</button>
                           <!--  <p class="mt-20">@lang('Already i have an account in here') <a href="{{ route('user.login') }}" class="text--base">@lang('Login')</a></p> -->
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- account-wrapper end -->
    </section>

<div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-center">@lang('You already have an account please Sign in ')</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
        <a href="{{ route('user.login') }}" class="btn btn-primary">@lang('Login')</a>
      </div>
    </div>
  </div>
</div>
@endsection
@push('style')
<style>
    input#mobile {
        border-radius: 0px 8px 8px 0px !important;
    }
    .pd-10{
        margin-top: 10px !important;
    }
    .pd-0 {
        padding: 0px !important;
    }
    .form-group {
        margin-bottom: 10px !important;
    }
    label {
        color: #959595 !important;
        margin-bottom: unset !important;
    }
    .site-logo img {
        margin-top: -45px !important;
    }
    .border {
        border: 2px solid #787877;
        border-radius: 8px 8px 8px 8px !important;
    }
    button.cmn-btn.rounded-0.w-100 {
        color: white !important;
        font-size: 30px !important;
    }
    .input-group-text {
        background-color: #787877 !important;
        border-color: #414e66 !important;
        color: white !important;
    }
    .registration-area {
        width: 40% !important;
        background-color:unset !important;
    }
    .iti__arrow {
        border-top: 4px solid #f5f0f0!important;
    }
    .iti {
        width: 100% !important;
    }
    .iti__country-list {
        background-color: #414e66 !important;
        color: white !important;
    }
    .flag{
        display: inline-block;
        vertical-align: middle;
        width: 40px;
        margin-right: 5px;
    }
    .form-control {
        background-color: #414e66 !important;
        color: white !important;
    }
    h3.title {
        margin-bottom: -20px;
    }
    .dark-yellow {
        color: #97750a;
    }
    .citrus-yellow {
        color:  #d7a40c;
    }
    .country-code .input-group-prepend .input-group-text{
        background: #fff !important;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }
    .hover-input-popup {
        position: relative;
    }
    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
    }
    .input-popup {
        position: absolute;
        bottom: 65%;
        left: 50%;
        width: 280px;
        background-color: #1a1a1a;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }
    .input-popup::after {
        position: absolute;
        content: '';
        bottom: -19px;
        left: 50%;
        margin-left: -5px;
        border-width: 10px 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #1a1a1a transparent;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .input-popup p {
        padding-left: 20px;
        position: relative;
    }
    .input-popup p::before {
        position: absolute;
        content: '';
        font-family: 'Line Awesome Free';
        font-weight: 900;
        left: 0;
        top: 4px;
        line-height: 1;
        font-size: 18px;
    }
    .input-popup p.error {
        text-decoration: line-through;
    }
    .input-popup p.error::before {
        content: "\f057";
        color: #ea5455;
    }
    .input-popup p.success::before {
        content: "\f058";
        color: #28c76f;
    }
</style>
@endpush
@push('script-lib')
<!-- <script type="image/gif" src="{{ asset('assets/global/js/flags.png') }}"></script> -->
<script src="{{ asset('assets/global/js/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
        var input = document.querySelector("#country");
            window.intlTelInput(input, {
                initialCountry: 'fr'
            });

        let intlTelInput = window.intlTelInputGlobals.getInstance(input),
            countryName =  intlTelInput.getSelectedCountryData().name,
            mobileCode = '+ ' +intlTelInput.getSelectedCountryData().dialCode,
            countryCode = intlTelInput.getSelectedCountryData().iso2;
        $('#country').val(countryName);
        $('.mobile-code').text(mobileCode);
        $('input[name=mobile_code]').val(intlTelInput.getSelectedCountryData().dialCode);
        $('input[name=country_code]').val(countryCode.toUpperCase());

      $('.iti__country-list li').click(function(){
            mobileCode = '+ ' +$(this).data('dial-code');
            $('.mobile-code').text(mobileCode);
            $('input[name=mobile_code]').val($(this).data('dial-code'));
            countryCode = $(this).data('country-code');
            $('input[name=country_code]').val(countryCode.toUpperCase());

            switch(countryCode) {
                case 'us':
                  countryName = 'United States';
                  break;
                case 'af':
                  countryName = 'Afghanistan';
                  break;
                case 'al':
                  countryName = 'Albania';
                  break;
                case 'dz':
                  countryName = 'Algeria';
                  break;
                case 'as':
                  countryName = 'American Samoa';
                  break;
                case 'ad':
                  countryName = 'Andorra';
                  break;
                case 'ao':
                  countryName = 'Angola';
                  break;
                case 'ai':
                  countryName = 'Anguilla';
                  break;
                case 'mg':
                  countryName = 'Madagascar';
                  break;
                case 'ag':
                  countryName = 'Antigua and Barbuda';
                  break;
                case 'ar':
                  countryName = 'Argentina';
                  break;
                case 'am':
                  countryName = 'Armenia';
                  break;
                case 'aw':
                  countryName = 'Aruba';
                  break;
                case 'ac':
                  countryName = 'Ascension Island';
                  break;
                case 'au':
                  countryName = 'Australia';
                  break;
                case 'at':
                  countryName = 'Austria';
                  break;
                case 'az':
                  countryName = 'Azerbaijan';
                  break;
                case 'bz':
                  countryName = 'Bahamas';
                  break;
                case 'fo':
                  countryName = 'Faroe Islands';
                  break;
                 case 'fj':
                  countryName = 'Fiji';
                  break;
                case 'fi':
                  countryName = 'Finland';
                  break;
                case 'fr':
                  countryName = 'France';
                  break;
                case 'gf':
                  countryName = 'French Guiana ';
                  break;
                 case 'pf':
                  countryName = 'French Polynesia';
                  break;
                case 'ga':
                  countryName = 'Gabon';
                  break;
                case 'gm':
                  countryName = 'Gambia';
                  case 'za':
                  countryName = 'South Africa';
                  break;
                default:
                   countryName = '';
            }
            $('#country').val(countryName);
      })
 
      "use strict";
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }
        (function ($) {
            // @if($mobile_code)
            // $(`option[data-code={{ $mobile_code }}]`).attr('selected','');
            // @endif

            // $('select[name=country]').change(function(){
            //     $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            //     $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            //     $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            // });
            // $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            // $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            // $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            @if($general->secure_password)
                $('input[name=password]').on('input',function(){
                    secure_password($(this));
                });
            @endif

            $('.checkUser').on('focusout',function(e){
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                  if (response['data'] && response['type'] == 'email') {
                    $('#existModalCenter').modal('show');
                  }else if(response['data'] != null){
                    $(`.${response['type']}Exist`).text(`${response['type']} already exist`);
                  }else{
                    $(`.${response['type']}Exist`).text('');
                  }
                });
            });

            $("#firstname").keyup( function(){
                var username = $(this).val().split(" ").join("") + $("#lastname").val().split(" ").join("") + $("#mobile").val();
                $("#username").val(username)
            })

            $("#lastname").keyup( function(){
                var username =  $("#firstname").val().split(" ").join("") + $(this).val().split(" ").join("") + $("#mobile").val();
                $("#username").val(username)
            })

            $("#mobile").keyup( function(){
                var username =  $("#firstname").val().split(" ").join("") + $("#lastname").val().split(" ").join("") +  $(this).val().split(" ").join("");
                $("#username").val(username)
            })


        })(jQuery);

    </script>
@endpush
