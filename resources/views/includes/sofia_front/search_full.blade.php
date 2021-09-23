<!DOCTYPE html>
<html>

<head>
    <title>البحث المتقدم</title>
    @include('layouts.partials.head')
    @toastr_css


    <!-- link for jquery style -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="{{ URL::asset('country-region-dropdown-menu-master/assets/js/geodatasource-cr.js') }}"></script>
    <link rel="stylesheet"
        href="{{ URL::asset('country-region-dropdown-menu-master/assets/css/geodatasource-countryflag.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Strait|Chonburi" rel="stylesheet">

    <!-- link to ar language po file -->
    <link rel="gettext" type="application/x-po"
        href="{{ URL::asset('country-region-dropdown-menu-master/languages/ar/LC_MESSAGES/ar.po') }}" />
    <script type="text/javascript" src="{{ URL::asset('country-region-dropdown-menu-master/assets/js/Gettext.js') }}">
    </script>
    <style type="text/css">
        .ui-selectmenu-button.ui-button {
            width: 100%;
        }

        h2 {
            font-family: "Strait";
            font-size: 280%;
            font-weight: bold;
        }

        .ui-widget {
            font-family: courier;
        }

        .form-control {
            font-family: courier;
            font-size: 1em;
        }

        #display {
            display: block;
            text-align: center;
            font-size: 180%;
            font-family: 'Chonburi', cursive;
            font-weight: normal;
        }

        label {
            font-family: 'Chonburi';
        }

    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#gds-cr-one").on('change', function() {
                $("#display").html($(this).children("option").filter(":selected").text() + " < " + $(
                        "#countrySelection").children("option").filter(":selected").text() +
                    "لقد قمت باختيار ");

                $("#display_country").html($("#countrySelection").children("option").filter(":selected")
                    .text());
                $("#display_city").html($(this).children("option").filter(":selected").text());

                // document.getElementById('display_country').value = $("#countrySelection").children("option").filter(":selected").text();
            });

        });
    </script>
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
                    <h3>البحث المتقدم</h3>
                    <p>البحث بأدق التفاصيل للحصول على أفضل شريك مناسب لك</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end search result sec -->



    <!-- start sidebar-section -->
    <div class="sidebar-sec py-4 search-information">
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



                <?php
                    $first_nationality = \App\Models\Member::distinct()->get(['nationality']);

                    $dual_nationality  = \App\Models\Member::distinct()->get(['dual_nationality']);

                    $countries         = \App\Models\Member::distinct()->get(['country']);

                    $cities            = \App\Models\Member::distinct()->get(['city']);

                    $skins             = \App\Models\Member::distinct()->get(['skin']);

                    $marital_status    = \App\Models\Member::distinct()->get(['marital_status']);

                    $marriage_type     = \App\Models\Member::distinct()->get(['marriage_type']);

                    $educations        = \App\Models\Member::distinct()->get(['education']);

                    $money_months      = \App\Models\Member::distinct()->get(['money_month']);

                ?>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                    <div class="row mt-2">
                        {{------------------------------------  البحث عن زوجة   ------------------------------}}
                        <div class="col">
                            {!! Form::open(['route' => 'front_female_members_filter_search', 'method' => 'get']) !!}
                                    {!! Form::button(trans('البحث عن زوجة'), ['class' => 'search-button', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                        {{------------------------------------  البحث عن زوج   ------------------------------}}
                        <div class="col">
                            {!! Form::open(['route' => 'front_male_members_filter_search', 'method' => 'get']) !!}
                                    {!! Form::button(trans('البحث عن زوج'), ['class' => 'search-button', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>


                    {{------------------------------------ بحث بكل الاعضاء   ------------------------------}}
                    {!! Form::open(['route' => 'front_members_full_filter_search', 'method' => 'get']) !!}
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>الجنسية</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="first_nationality" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($first_nationality as $nationality)
                                        <option value="{{ $nationality->nationality }}">{{ $nationality->nationality }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>الجنسية الثانية</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="dual_nationality" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($dual_nationality as $nationality)
                                        <option value="{{ $nationality->dual_nationality }}">{{ $nationality->dual_nationality }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>الاقامة</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="country" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->country }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>المدينة</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="city" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city }}">{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>زوج / زوجة</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="gender" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    <option value="male">زوج</option>
                                    <option value="female">زوجة</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>الديانة</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <input  class="islamic" value="الدين الاسلامي" readonly style="width: 75%; text-align:right !important;">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>الحالة الاجتماعية</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="marital_status" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($marital_status as $status)
                                        <option value="{{ $status->marital_status }}">{{ $status->marital_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>لون البشرة</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="skin" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($skins as $skin)
                                        <option value="{{ $skin->skin }}">{{ $skin->skin }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
                                {!! Form::label('age', trans(' اخـتـر الـعـمـر ')) !!}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                {!! Form::number('min_age', old('min_age'), ['min'=>'20', 'max'=>'90', 'class' => 'form-control', 'placeholder' => trans('20عام')]) !!} <br>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>الى</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                {!! Form::number('max_age', old('max_age'), ['min'=>'20', 'max'=>'90', 'class' => 'form-control', 'placeholder' => trans('90عام')]) !!}
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
                                {!! Form::label('age', trans(' اخـتـر الـوزن ')) !!}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                {!! Form::number('min_weight', old('min_weight'), ['min'=>'30', 'max'=>'200', 'class' => 'form-control', 'placeholder' => trans('30')]) !!} <br>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>الى</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                {!! Form::number('max_weight', old('max_weight'), ['min'=>'30', 'max'=>'200', 'class' => 'form-control', 'placeholder' => trans('200')]) !!}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
                                {!! Form::label('age', trans(' اخـتـر الـطـول ')) !!}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                {!! Form::number('min_tall', old('min_tall'), ['min'=>'120', 'max'=>'230', 'class' => 'form-control', 'placeholder' => trans('120')]) !!} <br>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <label>الى</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                {!! Form::number('max_tall', old('max_tall'), ['min'=>'120', 'max'=>'230', 'class' => 'form-control', 'placeholder' => trans('200')]) !!}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>المؤهل التعليمي</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="education" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($educations as $education)
                                        <option value="{{ $education->education }}">{{ $education->education }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>الدخل الشهري</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="money_month" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($money_months as $money_month)
                                        <option value="{{ $money_month->money_month }}">{{ $money_month->money_month }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>نوع الزواج</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <select name="marriage_type" required class="form-control custom-select selectpicker gender">
                                    <option value="0">-</option>
                                    @foreach ($marriage_type as $type)
                                        <option value="{{ $type->marriage_type }}">{{ $type->marriage_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label>ترتيب حسب </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <form>
                                    <select>
                                        <option selected hidden>اختر الترتيب</option>
                                        <option>الاكثر دخولا</option>
                                        <option>الاقل دخولا</option>
                                    </select>
                                </form>
                            </div>
                        </div> --}}
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                {!! Form::button(trans('ابحث'), ['class' => 'search-button', 'type' => 'submit']) !!}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
                        </div>
                    {!! Form::close() !!}
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
