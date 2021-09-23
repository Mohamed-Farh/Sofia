<!DOCTYPE html>
<html>

<head>
    <title>التسجيل كذكر</title>
    @include('layouts.partials.head')
    @toastr_css


    <!-- link for jquery style -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- link for bootstrap style -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

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
        .search-information form select {
            width: 100%;
            margin-top: unset !important;
            border: 1px solid #dedede;
            height: 35px;
            border-radius: 4px;
        }
        .search-information label {
            float: right;
            padding: 0 15px;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#gds-cr-one").on('change', function() {
                $("#display").html($(this).children("option").filter(":selected").text() + " < " + $(
                        "#countrySelection").children("option").filter(":selected").text() +
                    "لقد قمت باختيار ");

                    $("#display_country").html($("#countrySelection").children("option").filter(":selected").text());
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
                    <h3>التسجيل كذكر</h3>
                    <p>انضم الآن الي فريق عمل صوفيا وأحصل على الشريك المناسب</p>
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
                        <div class="col sidebar-col form-col-1">
                            <h4>تسجيل الدخول</h4>
                            <form method="POST" action="{{ route('member_login') }}">
                                @csrf
                                <label for="email" class="user-name-label" style="margin-bottom: 0px">{{ __('البريد الالكتروني') }}</label>
                                <input id="email" type="email" class="user-name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password" class="user-name-label" style="margin-bottom: 0px">{{ __('كلمة المرور') }}</label>
                                <input id="password" type="password" class="user-name @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class="btn btn-primary"  style="margin-top:20px;">
                                    {{ __('تسجيل دخول') }}
                                </button>

                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('forget_password_page') }}" style="float: right;">نسيت كلمة المرور</a>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <a href="{{ route('home') }}#how_to_sofia" style="float: right;">طريقة استخدام الموقع</a>
                                    </div>
                                </div><br>
                            </form>
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


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <form action="{{ route('member_register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="gender" value="ذكر">

                        <div class="login-data mt-3">
                            <h5>بيانات التسجيل</h5>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اسم مستعار<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="name" required/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <p class="user-name-hidden">
                                        اسمك المستعار سيظهر لجميع الأعضاء فيجب ان يكون لائق والا
                                        يزيد عن 15 حرف
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">كلمة المرور<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="password" name="password" required/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p for="password-confirm" class="user-name">تأكيد كلمة المرور<span style="color: red"> * </span> </ح>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">صورة شخصية (اختياري)</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="file" name="image">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6"></div>
                            </div>
                        </div>
                        <div class="login-data mt-3">
                            <h5>بيانات خاصة</h5>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الاسم الحقيقي<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="full_name" required/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <p class="user-name-hidden">
                                        لم تظهر تلك البيانات للأعضاء وستظهر فقط لإدارة الموقع
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">البريد الالكتروني<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="email" name="email" required/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">رقم الموبايل<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="phone" required />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <p class="user-name-hidden">
                                        إدخالك لرقم جوالك , سيمكنك من استخدام خدمة "تطبيق صوفيا التي
                                        تتيح لك استقبال وارسال رسائل الجوال
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="login-data mt-3">
                            <h5>البيانات العامة</h5>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">جنسية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select id="countrySelection" name ="nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar"></select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">جنسية اخري(اختياري)</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select id="countrySelection" name ="dual_nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar"></select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">انا من<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select id="countrySelection" name ="country" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                                    country-data-region-id="gds-cr-one" data-language="ar"></select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اقيم في<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name ="city" class="form-control  custom-select selectpicker gender" id="gds-cr-one"></select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الحالة الاجتماعية<span style="color: red">*</span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="marital_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="أعزب"> أعزب </option>
                                        <option value="متزوج"> متزوج </option>
                                        <option value="مطلق"> مطلق </option>
                                        <option value="أرمل"> أرمل </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">نوع الزواج<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="marriage_type" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="زوجة أولي"> زوجة أولي </option>
                                        <option value="زوجة ثانية"> زوجة ثانية </option>
                                        <option value="زوجة ثالثة"> زوجة ثالثة </option>
                                        <option value="وزوحة رابعة"> زوجة رابعة </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">لديك اطفال<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="children_number" required
                                        class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 0;
                                        $end = 10;
                                        ?>
                                        <option value="no"> {{ __('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الاطفال مع<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="children_with" required
                                        class="form-control custom-select selectpicker">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="الاب">الاب</option>
                                        <option value="الام">الام</option>
                                        <option value="بيت الجدة(الاب)">بيت الجدة(الاب)</option>
                                        <option value="بيت الجدة(الام)">بيت الجدة(الام)</option>
                                        <option value="غير ذلك">غير ذلك</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">العمر<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="age" required class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 21;
                                        $end = 90;
                                        ?>
                                        <option value="0"> {{ __('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الطول<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="tall" required class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 120;
                                        $end = 230;
                                        ?>
                                        <option value="0"> {{ __('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">لون البشرة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="skin" required class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="أبيض"> أبيض </option>
                                        <option value="حنطي مائل للبياض"> حنطي مائل للبياض </option>
                                        <option value="حنطي مائل للسمار"> حنطي مائل للسمار </option>
                                        <option value="أسمر فاتح"> أسمر فاتح </option>
                                        <option value="أسمر غامق "> أسمر غامق </option>
                                        <option value="أرمل"> أسود </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">لون الشعر<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="hair_color" required class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="بني">بني</option>
                                        <option value="اسود">اسود</option>
                                        <option value="ابيض">ابيض</option>
                                        <option value="رملي">رملي</option>
                                        <option value="رمادي">رمادي</option>
                                        <option value="الأحمر">الأحمر</option>
                                        <option value="أشقر">أشقر</option>
                                        <option value="ازرق">ازرق</option>
                                        <option value="اخضر">اخضر</option>
                                        <option value="برتقالي">برتقالي</option>
                                        <option value="وردي">وردي</option>
                                        <option value="بنفسجي">بنفسجي</option>
                                        <option value="أصلع جزئيا">أصلع جزئيا</option>
                                        <option value="أصلع تماما">أصلع تماما</option>
                                        <option value="غير ذلك">غير ذلك</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name"style="margin-top:10px">الديانة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <p class="user-name" style="font-weight: 600;" style="padding-bottom: unset;">
                                        <input type="text" value="الدين الاسلامي" style="background-color: white; margin-top: unset;" readonly>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">التدين<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="religiosity" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="لست متدين"> لست متدين </option>
                                        <option value="متدين قليلاً"> متدين قليلاً </option>
                                        <option value="  متدين"> متدين </option>
                                        <option value="متدين كثيراً"> متدين كثيراً </option>
                                        <option value="أفضل الا أقول "> أفضل الا أقول </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الصلاة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="pray" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="اصلي دائماً"> اصلي دائماً </option>
                                        <option value="اصلي أغلب الأوقات"> اصلي أغلب الأوقات </option>
                                        <option value="اصلي بعض الأوقات"> اصلي بعض الأوقات </option>
                                        <option value="لا اصلي"> لا اصلي </option>
                                        <option value="أفضل الا أقول "> أفضل الا أقول </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اللحية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="beard" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="نعم"> نعم </option>
                                        <option value="لا"> لا </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">التدخين<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="smoke" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="نعم"> نعم </option>
                                        <option value="لا"> لا </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">بنية الجسم<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="body_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="رفيع/نحيف"> رفيع/نحيف </option>
                                        <option value="  متوسط البنية"> متوسط البنية </option>
                                        <option value="قوام رياضي"> قوام رياضي </option>
                                        <option value="سمين "> سمين </option>
                                        <option value="ضخم"> ضخم </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الوزن<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="weight" required
                                        class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 30;
                                        $end = 200;
                                        ?>
                                        <option value="0"> {{ __('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">مستمع للموسيقي<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="listen_music" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="نعم"> نعم </option>
                                        <option value="احيانا"> احيانا </option>
                                        <option value="لا"> لا </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="login-data mt-3">
                            <h5>بيانات الدراسة والتعليم</h5>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">المستوى التعليمي<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="education" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="دراسة متوسطة"> دراسة متوسطة </option>
                                        <option value="دراسة ثانوية"> دراسة ثانوية </option>
                                        <option value="  دراسة جامعية"> دراسة جامعية </option>
                                        <option value="دكتوراه"> دكتوراه </option>
                                        <option value="دراسة ذاتية"> دراسة ذاتية </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">مجال العمل<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="work_field" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="بدون عمل حاليا"> بدون عمل حاليا </option>
                                        <option value="لازلت أدرس"> لازلت أدرس </option>
                                        <option value="سكرتارية"> سكرتارية </option>
                                        <option value="مجال الفن/الأدب"> مجال الفن/الأدب </option>
                                        <option value="الإدارة"> الإدارة </option>
                                        <option value="مجال التجارة"> مجال التجارة </option>
                                        <option value="مجال الاغذية"> مجال الاغذية </option>
                                        <option value="مجال الانشاءات و البناء"> مجال الانشاءات و البناء </option>
                                        <option value="مجال القانون"> مجال القانون </option>
                                        <option value="مجال الطب"> مجال الطب </option>
                                        <option value="السياسة و الحكومة"> السياسة و الحكومة </option>
                                        <option value="التسويق و المبيعات"> التسويق و المبيعات </option>
                                        <option value="صاحب عمل خاص"> صاحب عمل خاص </option>
                                        <option value="مجال التدريس"> مجال التدريس </option>
                                        <option value="مجال الهندسة / العلوم"> مجال الهندسة / العلوم </option>
                                        <option value="مجال النقل"> مجال النقل </option>
                                        <option value="مجال الكمبيوتر / المعلومات"> مجال الكمبيوتر / المعلومات </option>
                                        <option value="غير ذلك"> غير ذلك </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الوظيفة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="work" style="background-color: white;margin-bottom: 30px; margin-top: unset;">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الوضع المادي<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="money_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="فقير"> فقير </option>
                                        <option value="أقل من المتوسط"> أقل من المتوسط </option>
                                        <option value="متوسط"> متوسط </option>
                                        <option value="أكبر من المتوسط"> أكبر من المتوسط </option>
                                        <option value="جيد"> جيد </option>
                                        <option value="ميسور"> ميسور </option>
                                        <option value="غني"> غني </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الدخل الشهري<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="money_month" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value=" بدون دخل شهري"> بدون دخل شهري </option>
                                        <option value="أقل من 500 جنية"> أقل من 500 جنية </option>
                                        <option value="500 - 1000 جنية"> 500 - 1000 جنية </option>
                                        <option value="500 - 1000 جنية"> 500 - 1000 جنية </option>
                                        <option value="1000 - 3000 جنية"> 1000 - 3000 جنية </option>
                                        <option value="3000 - 6000 جنية"> 3000 - 6000 جنية </option>
                                        <option value="6000 - 9000 جنية"> 6000 - 9000 جنية </option>
                                        <option value="9000 - 12000 جنية"> 9000 - 12000 جنية </option>
                                        <option value="12000 - 15000 جنية"> 12000 - 15000 جنية </option>
                                        <option value="15000 - 18000 جنية"> 15000 - 18000 جنية </option>
                                        <option value="18000 - 20000 جنية"> 18000 - 20000 جنية </option>
                                        <option value="أكبر من 20000 جنية"> أكبر من 20000 جنية </option>
                                        <option value="لا أود أن أقول"> لا أود أن أقول </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الحالة الصحية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="health_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="   سليم و الحمدلله"> سليم و الحمدلله </option>
                                        <option value="   اعاقة فكرية"> اعاقة فكرية </option>
                                        <option value="   اعاقة حركية"> اعاقة حركية </option>
                                        <option value="   اكتئاب"> اكتئاب </option>
                                        <option value="   انحناء وتقوس"> انحناء وتقوس </option>
                                        <option value="   انفصام في الشخصية"> انفصام في الشخصية </option>
                                        <option value="   باطنية"> باطنية </option>
                                        <option value="   برص"> برص </option>
                                        <option value="   بصرية"> بصرية </option>
                                        <option value="   بهاق"> بهاق </option>
                                        <option value="   جلدية"> جلدية </option>
                                        <option value="   حروق مشوهه"> حروق مشوهه </option>
                                        <option value="   سكري"> سكري </option>
                                        <option value="   سمعية"> سمعية </option>
                                        <option value="   كلامية / نطق"> كلامية / نطق </option>
                                        <option value="   سمنة مفرطة"> سمنة مفرطة </option>
                                        <option value="   شلل أطفال"> شلل أطفال </option>
                                        <option value="   شلل رباعي"> شلل رباعي </option>
                                        <option value="   شلل نصفي"> شلل نصفي </option>
                                        <option value="   صدفية"> صدفية </option>
                                        <option value="   صرع"> صرع </option>
                                        <option value="   عجز جنسي"> عجز جنسي </option>
                                        <option value="   عقم"> عقم </option>
                                        <option value="   فقدان طرف أو عضو"> فقدان طرف أو عضو </option>
                                        <option value="   قزم"> قزم </option>
                                        <option value="   متلازمة داون"> متلازمة داون </option>
                                        <option value="   نفسية"> نفسية </option>
                                        <option value="   غير ذلك"> غير ذلك </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <p class="user-name-hidden">
                                        هل تعاني من حالة صحية خاصة أو مرض معين ؟ أكتب هنا
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="login-data mt-3">
                            <h5>مواصفات شريك الاحلام<span style="color: red"> * </span></h5>
                            <p style="padding-bottom: 10px; padding-top: 10px">
                                 اكتب عن مواصفات شريك أحلامك هنا :
                            </p>
                            <div class="row">
                                <div class="col">
                                    <textarea name="partner_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="login-data mt-3">
                            <h5>اكتب عن نفسك<span style="color: red"> * </span></h5>
                            <p style="padding-bottom: 10px; padding-top: 10px">
                                اكتب عن نفسك هنا
                            </p>
                            <div class="row">
                                <div class="col">
                                    <textarea name="your_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="last-button text-center mt-2">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4"></div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <button type="submit" style="background: #ff7b54; color: white; font-weight: 600">
                                        {{-- <a href="successfullogin.html" style="color: white">تسجيل الان</a> --}}
                                        تسجيل الان
                                    </button>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4"></div>
                            </div>
                        </div>
                    </form>
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
