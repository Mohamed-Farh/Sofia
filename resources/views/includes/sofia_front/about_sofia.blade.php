<!DOCTYPE html>
<html>

<head>
    <title>عن صوفيا</title>
    @include('layouts.partials.head')
    @toastr_css
</head>

<body
    style="background-image: url('app-assets/images/Web\ 1920\ –\ 1.png'); background-repeat: no-repeat;background-size: cover;">
    @include('layouts.partials.nav')
    <div class="row">
        <div class="col-12">
            @include('layouts.partials.flash')
        </div>
    </div>




    <!-- start search result sec -->
    <div class="search-result py-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col search-result-col">
                    <h3>عن صوفيا</h3>
                    <p>موقعك المفضل والمناسب للحصول على شريك الحياة</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end search result sec -->
    <!-- start sidebar-section -->
    <div class="sidebar-sec py-4 search-information members-cards">
        <div class="container container-1">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="row mt-4">
                        <div class="col sidebar-col">
                            <img src="{{ asset('app-assets/images/Mask Group 86.png') }}" />
                            <p><a href="{{ route('myprofile_page') }}">حسابي</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 86.png') }}" />
                            <p><a href="{{ route('my_data_page') }}">بياناتي</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Notification.png') }}" />
                            <p><a href="{{ route('my_notifications_page') }}">الاشعارات</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 31.png') }}" />
                            <p><a href="{{ route('search_full_page') }}">الباحث الالي</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 1624.png') }}" />
                            <p><a href="{{ route('member_care') }}">من يهتم بي</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 1625.png') }}" />
                            <p><a href="{{ route('my_block_list') }}">قائمة التجاهل</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 1626.png') }}" />
                            <p><a href="{{ route('who_visit_myprofile') }}">من زار صفحتي الشخصية</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 1677.png') }}" />
                            <p><a href="{{ route('my_inbox_message_page') }}">الرسائل الواردة</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 11.png') }}" />
                            <p><a href="{{ route('package_index') }}">باقة التميز</a></p>
                            <br />
                            <img src="{{ asset('app-assets/images/Mask Group 125.png') }}" />
                            <p><a href="{{ route('show_mysettings') }}">اعدات الحساب</a></p>
                            <br />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col side-bar2">
                            <div class="row mt-3 text-center">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 second-bar">
                                    <img src="{{ asset('app-assets/images/Group 267555.png') }}"
                                        class="side-bar-image" />
                                    <br />
                                    <p style="padding-bottom: 15px; text-align: center">
                                        <a href="{{ route('top_members_page') }}">اعضاء متميزون</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 third-bar">
                                    <img src="{{ asset('app-assets/images/Group 2680988.png') }}"
                                        class="side-bar-image" />
                                    <br />
                                    <p style="padding-bottom: 15px; text-align: center">
                                        <a href="{{ route('search_full_page') }}">البحث المتقدم</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 second-bar">
                                    <img src="{{ asset('app-assets/images/Group 267555.png') }}"
                                        class="side-bar-image" />
                                    <br />
                                    <p style="padding-bottom: 15px; text-align: center">
                                        <a href="{{ route('latest_members') }}">اعضاء الجدد</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 third-bar">
                                    <img src="{{ asset('app-assets/images/Group 267558.png') }}"
                                        class="side-bar-image" />
                                    <br />
                                    <p style="padding-bottom: 15px; text-align: center">
                                        <a href="{{ route('online_members') }}">المتواجدون الان</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 second-bar">
                                    <img src="{{ asset('app-assets/images/Group 267556.png') }}"
                                        class="side-bar-image" />
                                    <br />
                                    <p style="padding-bottom: 15px; text-align: center">
                                        <a href="{{ route('successful_stories') }}">القصص الناجحة</a>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  second-bar">
                                    <img src="{{ asset('app-assets/images/Group 2675599.png') }}"
                                        class="side-bar-image" />
                                    <br />
                                    <p style="padding-bottom: 15px; text-align: center">
                                        <a href="{{ route('health_members_index') }}">حالات صحية</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 text-center">
                        <div class="col col-sidbar-search">
                            <h4>بحث بالاسم</h4>
                            {!! Form::open(['route' => 'front_member_name_filter_search', 'method' => 'get']) !!}

                            <label> الاسم </label>
                            {!! Form::text('keyword', old('keyword', request()->input('keyword')), ['class' => 'form-control', 'required' => 'required']) !!}

                            {!! Form::button(trans('بحث'), ['class' => 'search-button', 'type' => 'submit']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 all-result-sec">
                    <h6>نبذة عن صوفيا</h6>
                    <p class="para-login" style="text-align: justify">
                        @foreach ($about_sofia as $about)
                            {{ $about->aboutus }}
                        @endforeach
                    </p>
                    {{-- <h6>ماذا قال عنا عملاؤنا</h6>
                    <div class="row mt-2">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card" style="
                                width: 100%;
                                border: none;
                                box-shadow: 0px 0px 8px gainsboro;
                                ">
                                <img src="{{asset('app-assets/images/Mask Group 134.png')}}" class="card-img-top who-care" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title" style="
                                        text-align: right;
                                        font-size: 16px;
                                        font-weight: 600;
                                        ">
                                        <a href="#">وردة النسيم</a>
                                    </h5>
                                    <p class="card-text" style="font-size: 13px">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                        توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل
                                        هذا النص أو العديد من النصوص
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card" style="
                                    width: 100%;
                                    border: none;
                                    box-shadow: 0px 0px 8px gainsboro;
                                    ">
                                <img src="{{asset('app-assets/images/Mask Group 134.png')}}" class="card-img-top who-care" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title" style="
                                            text-align: right;
                                            font-size: 16px;
                                            font-weight: 600;
                                            ">
                                        <a href="#">وردة النسيم</a>
                                    </h5>
                                    <p class="card-text" style="font-size: 13px">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                        توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل
                                        هذا النص أو العديد من النصوص
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card" style="
                                    width: 100%;
                                    border: none;
                                    box-shadow: 0px 0px 8px gainsboro;
                                    ">
                                <img src="{{asset('app-assets/images/Mask Group 134.png')}}" class="card-img-top who-care" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title" style="
                                        text-align: right;
                                        font-size: 16px;
                                        font-weight: 600;
                                        ">
                                                        <a href="#">وردة النسيم</a>
                                    </h5>
                                    <p class="card-text" style="font-size: 13px">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                        توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل
                                        هذا النص أو العديد من النصوص
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <h6>ليه تختار صوفيا</h6>
                    <p class="para-sec" style="text-align: justify">
                        @foreach ($about_sofia as $about)
                            {{ $about->why_us }}
                        @endforeach
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="card card-1" style="width: 100%">
                                <div class="card-body">
                                    <img src="{{asset('app-assets/images/Mask Group 1621.png')}}" alt="..." />
                                    <br />
                                    <h5 class="card-title">امن سهل الاستخدام</h5>
                                    <p class="card-text" style="text-align: justify">
                                        @foreach ($about_sofia as $about)
                                            {{ $about->safe }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="card card-1" style="width: 100%">
                                <div class="card-body">
                                    <img src="{{asset('app-assets/images/Mask Group 1622.png')}}" alt="..." />
                                    <br />
                                    <h5 class="card-title">المطابقة الذكية</h5>
                                    <p class="card-text" style="text-align: justify">
                                        @foreach ($about_sofia as $about)
                                            {{ $about->smart }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="card card-1" style="width: 100%">
                                <div class="card-body">
                                    <img src="{{asset('app-assets/images/Mask Group 1623.png')}}" alt="..." />
                                    <br />
                                    <h5 class="card-title">السرية التامة</h5>
                                    <p class="card-text" style="text-align: justify">
                                        @foreach ($about_sofia as $about)
                                            {{ $about->secret }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end sidebar-section -->




    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>
@jquery
@toastr_js
@toastr_render

</html>
