@extends($activeTemplate.'layouts.master')
@section('content')

<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-1 text-nowrap" style="margin-left: 25px">
                        <i class="fa fa-user text-grey"></i>
                        <span class="text-grey">Users <span class="user"> 456</span></span>
                    </div>
                    <div class="col-1 text-nowrap" style="margin-left: 30px">
                        <!-- <img src="{{ asset($activeTemplateTrue .'images/play/icon-amount.png') }}"
                                                 height="20"
                                                 width="20"> -->
                        <i class="fa fa-money-bill text-grey"></i>
                        <span class="text-grey">Amount <span class="base--color">
                                <span class="bal">{{ __(getAmount(auth()->user()->balance)) }}</span> @lang('$') </span>
                    </div>
                    <div class="col-8 progress-rebour">
                        <div class="progress" style="background-color: black; height: 1.6rem;border-radius: 25px;">
                            <div class="progress-bar" role="progressbar"
                                style="width: 100%; background-color: rgb(179, 34, 41);border-radius: 25px;"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pad-20 card-roue">
                <div class="card-body h-100 middle-el">
                    <div class="cd-ft"></div>
                    <div class="game-details-left">
                        <div class="game-details-left__body">
                            <h3 class="text-center f-size--28">@lang('NEXT DRAW')</h3>
                            <h2 class="text-center f-size--28">
                                <span class="base--color" id="compte_rebours">&nbsp;</span>
                                </span>
                            </h2>
                            <!-- <h2 class="text-center f-size--28"><span class="base--color">00:36:15</span> </span></h2> -->
                            <small class="text-user-page">
                                <h9 class="text-center f-size--28">
                                    <span style="margin-right: 37px;margin-left: 127px;">Hours</span>
                                    <span style="margin-right: 25px;">Minutes</span>
                                    <span>Seconds</span>
                                </h9>
                            </small>
                            <div class="spin-card">
                                <div class="wheel-wrapper">
                                    <div class="arrow text-center stick">
                                        <img src="{{ asset($activeTemplateTrue .'images/play/stick.png') }}"
                                            height="400" width="400">
                                    </div>
                                    <div class="wheel text-center the_wheel">
                                        <img id="roue" class="rotateimg" style="margin-top: -375px;"
                                            src="{{ asset($activeTemplateTrue .'images/play/wheel.png') }}" height="500"
                                            width="500">
                                        <canvas style="display:none" id="canvas" width="500" height="500" class="w-100">
                                            <img style="margin-top: -400px;" id="source"
                                                src="{{ asset($activeTemplateTrue .'images/play/wheel.png') }}"
                                                width="500" height="500">
                                            <p class="text-white" align="center">@lang("Sorry, your browser doesn't
                                                support canvas. Please try another.")</p>
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="repport_game" class="card-body h-100 middle-el card-result">
                    <div class="game-result">
                        <h1 class="text-center f-size--40">WIN</h1>
                        <h3 class="text-center f-size--28 text-grey">Vous avez gagner</h3>
                        <small class="text-center text-user-page">
                            <h9 class="text-grey">
                                <span>Nous avons versé une somme de 1million dans votre compte </span>
                            </h9>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-lg-0 mt-5">
                <div class="game-details-right pad-20">
                    <form method="post" id="game">
                        @csrf
                        <h6 class="text-left f-size--28 text-grey">@lang('Current balance')
                            <!--span class="base--color"><span
                                class="bal">{{ __(getAmount(auth()->user()->balance)) }}</span> {{ __($general->cur_text) }}</span-->
                        </h6>
                        <div class="form-group" style="margin-bottom: 0px">
                            <div class="input-group" id="invest-field">
                                <input type="text" name="invest" id="invest" class="form-control amount-field"
                                    placeholder="">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <h6 class="text-left f-size--28 currency">@lang('$')</h6>
                                    </span>
                                    <!-- id="basic-addon2">{{ __($general->cur_text) }}</span> -->

                                </div>
                            </div>
                            <!--small class="form-text text-muted"><i
                                        class="fas fa-info-circle mr-2"></i> @lang('Minimum :') {{ $game->min_limit +0 }} {{$general->cur_text}}
                                    | @lang('Maximum :') {{ getAmount($game->max_limit+0) }} {{__($general->cur_text)}}
                                    | <span
                                        class="text-warning"> @lang('Win Amount') @if($game->invest_back == 1){{ getAmount($game->win+100) }} @else {{ getAmount($game->win) }} @endif @lang('%') </span></small-->
                        </div>
                        <div class="text-left">
                            <a data-toggle="modal" data-target="#exampleModalCenter" class="mt-0 btn btn-link"> <i
                                    class="las la-info-circle fa-1x text-user-page"></i><span
                                    class="text-user-page">@lang('Game Instruction')</span>
                            </a>
                        </div>
                        <div class="form-group mt-5 justify-content-center d-flex" id="gmimg">
                            <div class="single-select black gmimg" id="gmimg-black">
                                <img id="black_coin" src="{{ asset($activeTemplateTrue.'images/play/black_coin.png') }}"
                                    alt="game-image">
                            </div>
                            <div class="single-select red gmimg" id="gmimg-red">
                                <img id="red_coin" src="{{ asset($activeTemplateTrue.'images/play/red_coin.png') }}"
                                    alt="game-image">
                            </div>
                        </div>
                        <div class="left-game-detail-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <audio id="pop">
        <source src="{{ asset($activeTemplateTrue.'audio/spinWheel.mp3') }}" type="audio/mpeg">
    </audio> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content section--bg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('Game Rule')</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php echo __($game->instruction) @endphp
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('style')
<style type="text/css">
    #roue {
        animation: une-animation 20s infinite linear;
    }

    @keyframes une-animation {
        from {
            transform: rotate(0deg)
        }

        to {
            transform: rotate(360deg)
        }

        /* to {transform : rotate(360deg)} */
    }

    .currency {
        font-size: 25px;
    }

    a.mt-0.btn.btn-link {
        margin-left: -12px;
    }

    .arrow.text-center.stick {
        margin-left: -12px;
    }

    .the_wheel {
        max-width: 450px;
    }

    .card-roue {
        position: relative;
    }

    .card-result {
        position: absolute;
        display: none;
        width: 96%;
        top: 0;
        background-color: rgba(10, 8, 8, 0.8);
    }

    .card-show {
        display: flex;
    }

    .game-result {
        margin: auto;
        text-align: center;
    }

    @media (max-width: 425px) {
        .game-details-left {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
    }

    input.form-control.amount-field {
        z-index: 1;
        background-color: #1c1d31;
        color: white;
    }

    .waiting-draw {
        /* color: #b5aeae !important;
        background-color: #4a4a48 !important; */
        cursor: not-allowed !important;
    }

    .waiting-draw2 {
        /* color: #b5aeae !important;
        background-color: #4a4a48 !important; */
        cursor: not-allowed !important;
    }

    .no-clickable {
        pointer-events: none;
    }

    .no-click-input {
        z-index: 999999;
        color: #b5aeae !important;
        background-color: #4a4a48 !important;
        pointer-events: none;
    }
</style>
@endpush
@push('script-lib')
<script src="{{ asset($activeTemplateTrue .'js/TweenMax.min.js') }}"></script>
<script src="{{ asset($activeTemplateTrue .'js/Winwheel.js') }}"></script>
<script src="{{ asset($activeTemplateTrue .'js/spinFunctions.js') }}"></script>
@endpush
@push('script')
<script>
    "use strict";

        $('input[name=invest]').keypress(function (e) {
            var character = String.fromCharCode(e.keyCode)
            var newValue = this.value + character;
            if (isNaN(newValue) || hasDecimalPlace(newValue, 3)) {
                e.preventDefault();
                return false;
            }
        });

        function hasDecimalPlace(value, x) {
            var pointIndex = value.indexOf('.');
            return pointIndex >= 0 && pointIndex < value.length - x;
        }

        $('#game').on('submit', function (e) {
            e.preventDefault();
            beforeProcess();
            var data = $(this).serialize();
            var url = '{{ route("user.play.playspinWheel") }}';
            game(url, data);
        });

        function endGame(data) {
            var url = '{{ route("user.play.gameEndSpinWheel") }}'
            complete(data, url)
        }

        function calculateDeadLine() {
            let minutesToAdd = 0,
                currentDate = new Date(),
                currentMinutes = currentDate.getMinutes();
           switch (true) {
            case currentMinutes <10:
                minutesToAdd = 10 - currentMinutes;
                break;
            case currentMinutes >=10 && currentMinutes <20:
                minutesToAdd = 20 - currentMinutes;
                break;
            case currentMinutes >=20 && currentMinutes <30:
                minutesToAdd = 30 - currentMinutes;
                break;
            case currentMinutes >=30 && currentMinutes <40:
                minutesToAdd = 40 - currentMinutes;
                break;
            case currentMinutes >=40 && currentMinutes <50:
                minutesToAdd = 50 - currentMinutes;
                break;
            default:
                minutesToAdd = 60 - currentMinutes;
                break;
           }
            let deadline = new Date(currentDate.getTime() + minutesToAdd*60000);
            return deadline;
        }

        function countDown() {
            let deadline = calculateDeadLine();
            let currentDate = new Date();
            let currentSeconds = currentDate.getSeconds();
            let seconds = 60 - currentSeconds;
            let t, days, hours, minutes, now;

            now = new Date().getTime();
            t   = deadline-now;
            days    = Math.floor( t/(1000*60*60*24));
            hours   = Math.floor((t%(1000*60*60*24))/(1000*60*60));

            minutes = Math.floor((t%(1000*60*60))/(1000*60));
            let t_secondes = (minutes*60)+seconds;
            if(t_secondes>600) t_secondes = 600;

            let x = setInterval(function() {
                t_secondes--;

                minutes = Math.floor(t_secondes/60);
                seconds = t_secondes%60;

                if (t_secondes==60) {
                    $("#roue").attr('style','animation:une-animation 4s infinite linear; margin-top: -375px;');
                }
                if(t_secondes<=15) {
                    document.getElementById('invest').disabled = true;
                    document.getElementById("invest-field").classList.add("waiting-draw");
                    document.getElementById("invest").classList.add("no-click-input");
                    document.getElementById("gmimg-red").classList.add("no-clickable");
                    document.getElementById("red_coin").classList.add("no-clickable");
                    document.getElementById("gmimg-black").classList.add("no-clickable");
                    document.getElementById("black_coin").classList.add("no-clickable");
                    document.getElementById("gmimg").classList.add("waiting-draw2");
                    $("#roue").attr('style','animation:une-animation 2s infinite linear; margin-top: -375px;');
                } else {
                    document.getElementById('invest').disabled = false;
                    document.getElementById("invest-field").classList.remove("waiting-draw");
                    document.getElementById("invest").classList.remove("no-click-input");
                    document.getElementById("gmimg-red").classList.remove("no-clickable");
                    document.getElementById("red_coin").classList.remove("no-clickable");
                    document.getElementById("gmimg-black").classList.remove("no-clickable");
                    document.getElementById("black_coin").classList.remove("no-clickable");
                    document.getElementById("gmimg").classList.remove("waiting-draw2");
                }
                // var seconds = Math.floor((t % (1000 * 60)) / 1000);
                let aff_h = (hours<10)?"0"+hours:hours;
                let aff_m = (minutes<10)?"0"+minutes:minutes;
                let aff_s = (seconds<10)?"0"+seconds:seconds;
                $("#compte_rebours").html(aff_h+':'+aff_m+':'+aff_s);

                let zero = 60;
                let cent = parseFloat(minutes+"."+seconds);
                let valeur = (parseInt(((zero - cent))*parseInt(100))/parseInt(zero)).toFixed(2);
                $('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur).html(valeur+"%");
                // document.getElementById("compte_rebours").innerHTML = days + "d "
                // + hours + "h " + minutes + "m " + seconds + "s ";
                if (t_secondes===0) {
                    document.getElementById("compte_rebours").innerHTML = "EXPIRED";
                    t_secondes = 600;
                    $("#roue").attr('style','animation:une-animation 20s infinite linear; margin-top: -375px;');
                    //window.location.href = "{{ route('user.play.spinWheel', ['continue'=>'true']) }}";
                }
            }, 1000);
        }

        $(document).ready(function (){
                countDown();
                // setInterval(() => {
                //     socket()
                // }, 1000);
        })
</script>
@endpush
