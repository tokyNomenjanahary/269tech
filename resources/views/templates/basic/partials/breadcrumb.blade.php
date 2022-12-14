<!-- inner-hero section start -->
@if(isset($page) && $page == "playspin")
    <section class="inner-hero bg_img" style="padding-bottom: 30px !important;background-image: url( {{ getImage('assets/images/frontend/breadcrumb/'.@getContent('breadcrumb.content',true)->data_values->breadcrumb_image,'1920x1080') }} );">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="page-title">{{ __($pageTitle) }}</h2>
                </div>
            </div>
        </div>
    </section>
@else
    <section class="inner-hero bg_img" style="background-image: url( {{ getImage('assets/images/frontend/breadcrumb/'.@getContent('breadcrumb.content',true)->data_values->breadcrumb_image,'1920x1080') }} );">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="page-title">{{ __($pageTitle) }}</h2>
                    <ul class="page-list justify-content-center">
                        <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li>{{ __($pageTitle) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endif

<!-- inner-hero section end -->
