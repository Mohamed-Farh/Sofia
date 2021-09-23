<!DOCTYPE html>
<html>

<head>
    <title>تعديل بياناتي</title>
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
                    <h3>تعديل بياناتي</h3>
                    <p>هنا يمكنك تعديل جميع البيانات التي قمت بإدخالها من قبل</p>
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
                    <form action="{{ route('member_update_profile', 'test') }}" method="post" enctype="multipart/form-data">
                        {{ method_field('POST') }}
                        @csrf

                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $member->id }}">


                        <div class="login-data mt-3">
                            <h5>بيانات التسجيل</h5>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اسم مستعار<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="name" value="{{ $member->name }}" required/>
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
                                    <input type="password" name="password"/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p for="password-confirm" class="user-name">تأكيد كلمة المرور<span style="color: red"> * </span> </ح>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
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
                                    <input type="text" name="full_name" value="{{ $member->full_name }}" required/>
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
                                    <input type="email" name="email" value="{{ $member->email }}" required/>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">رقم الموبايل<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="phone" value="{{ $member->phone }}" required />
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
                                    <p class="user-name">الجنسية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" class="form-control" value="{{ $member->nationality }}" style="background-color: white; margin-top: unset;" readonly>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اختر اذا اردت تعديلها فقط</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select id="countrySelection" name ="nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar">
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الجنسية الثانية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" class="form-control" value="{{ $member->dual_nationality }}" style="background-color: white; margin-top: unset;" readonly>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اختر اذا اردت تعديلها فقط</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select id="countrySelection" name ="dual_nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar">
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">بلد الاقامة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" class="form-control" value="{{ $member->country }}" style="background-color: white; margin-top: unset;" readonly>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اختر اذا اردت تعديلها فقط</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select id="countrySelection" name ="country" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar">
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">المدينة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" class="form-control" value="{{ $member->city }}" style="background-color: white; margin-top: unset;" readonly>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اختر بلد الاقامة اولا عند التعديل</p>
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
                                        <option value="0" <?php if($member->marital_status == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="أعزب" <?php if($member->marital_status == "أعزب")    echo "selected"; ?> >         أعزب      </option>
                                        <option value="متزوج" <?php if($member->marital_status == "متزوج")    echo "selected"; ?> >         متزوج      </option>
                                        <option value="مطلق" <?php if($member->marital_status == "مطلق")    echo "selected"; ?> >         مطلق      </option>
                                        <option value="أرمل" <?php if($member->marital_status == "أرمل")    echo "selected"; ?> >         أرمل      </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">نوع الزواج<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="marriage_type" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->marriage_type == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="زوجة أولي" <?php if($member->marriage_type == "زوجة أولي")    echo "selected"; ?> >        زوجة أولي      </option>
                                        <option value="زوجة ثانية" <?php if($member->marriage_type == "زوجة ثانية")    echo "selected"; ?> >       زوجة ثانية     </option>
                                        <option value="زوجة ثالثة" <?php if($member->marriage_type == "زوجة ثالثة")    echo "selected"; ?> >        زوجة ثالثة      </option>
                                        <option value="زوجة رابعة" <?php if($member->marriage_type == "زوحة رابعة")    echo "selected"; ?> >       زوجة رابعة     </option>
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
                                            $intial= 0;
                                            $end= 10;
                                        ?>
                                        <option value="no" <?php if($member->children_number == "no")    echo "selected"; ?> >       {{__('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->children_number == $i)    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الاطفال مع<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="children_with" required
                                        class="form-control custom-select selectpicker">
                                        <option value="0" <?php if($member->children_with == "0")    echo "selected"; ?> > {{ __('-') }} </option>
                                        <option value="الاب" <?php if($member->children_with == "الاب")    echo "selected"; ?> >الاب</option>
                                        <option value="الام" <?php if($member->children_with == "الام")    echo "selected"; ?> >الام</option>
                                        <option value="بيت الجدة(الاب)" <?php if($member->children_with == "بيت الجدة(الاب)")    echo "selected"; ?> >بيت الجدة(الاب)</option>
                                        <option value="بيت الجدة(الام)" <?php if($member->children_with == "بيت الجدة(الام)")    echo "selected"; ?> >بيت الجدة(الام)</option>
                                        <option value="غير ذلك" <?php if($member->children_with == "غير ذلك")    echo "selected"; ?> >غير ذلك</option>
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
                                            $intial= 21;
                                            $end= 90;
                                        ?>
                                        <option value="0" <?php if($member->age == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->age == $i)    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الطول<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="tall" required class="form-control custom-select selectpicker gender">
                                        <?php
                                            $intial= 120;
                                            $end= 230;
                                        ?>
                                        <option value="0" <?php if($member->tall == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->tall == $i )    echo "selected"; ?> >{{ $i }}</option>
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
                                        <option value="0" <?php if($member->skin == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="أبيض" <?php if($member->skin == "أبيض")    echo "selected"; ?> >         أبيض      </option>
                                        <option value="حنطي مائل للبياض" <?php if($member->skin == "حنطي مائل للبياض")    echo "selected"; ?> >         حنطي مائل للبياض      </option>
                                        <option value="حنطي مائل للسمار" <?php if($member->skin == "حنطي مائل للسمار")    echo "selected"; ?> >         حنطي مائل للسمار      </option>
                                        <option value="أسمر فاتح" <?php if($member->skin == "أسمر فاتح")    echo "selected"; ?> >         أسمر فاتح      </option>
                                        <option value="أسمر غامق " <?php if($member->skin == "أسمر غامق")    echo "selected"; ?> >         أسمر غامق      </option>
                                        <option value="أرمل" <?php if($member->skin == "أرمل")    echo "selected"; ?> >          أسود      </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">لون الشعر<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="hair_color" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->hair_color == "0")    echo "selected"; ?> > {{ __('-') }} </option>
                                        <option value="بني" <?php if($member->hair_color == "بني")    echo "selected"; ?> >بني</option>
                                        <option value="اسود" <?php if($member->hair_color == "اسود")    echo "selected"; ?> >اسود</option>
                                        <option value="ابيض" <?php if($member->hair_color == "ابيض")    echo "selected"; ?> >ابيض</option>
                                        <option value="رملي" <?php if($member->hair_color == "رملي")    echo "selected"; ?> >رملي</option>
                                        <option value="رمادي" <?php if($member->hair_color == "رمادي")    echo "selected"; ?> >رمادي</option>
                                        <option value="الأحمر" <?php if($member->hair_color == "الأحمر")    echo "selected"; ?> >الأحمر</option>
                                        <option value="أشقر" <?php if($member->hair_color == "أشقر")    echo "selected"; ?> >أشقر</option>
                                        <option value="ازرق" <?php if($member->hair_color == "ازرق")    echo "selected"; ?> >ازرق</option>
                                        <option value="اخضر" <?php if($member->hair_color == "اخضر")    echo "selected"; ?> >اخضر</option>
                                        <option value="برتقالي" <?php if($member->hair_color == "برتقالي")    echo "selected"; ?> >برتقالي</option>
                                        <option value="وردي" <?php if($member->hair_color == "وردي")    echo "selected"; ?> >وردي</option>
                                        <option value="بنفسجي" <?php if($member->hair_color == "بنفسجي")    echo "selected"; ?> >بنفسجي</option>
                                        <option value="أصلع جزئيا" <?php if($member->hair_color == "أصلع جزئيا")    echo "selected"; ?> >أصلع جزئيا</option>
                                        <option value="أصلع تماما" <?php if($member->hair_color == "أصلع تماما")    echo "selected"; ?> >أصلع تماما</option>
                                        <option value="غير ذلك" <?php if($member->hair_color == "غير ذلك")    echo "selected"; ?> >غير ذلك</option>
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
                                        <option value="0" <?php if($member->religiosity == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="لست متدين" <?php if($member->religiosity == "لست متدين")    echo "selected"; ?> >         لست متدين      </option>
                                        <option value="متدين قليلاً" <?php if($member->religiosity == "متدين قليلاً")    echo "selected"; ?> >           متدين قليلاً      </option>
                                        <option value="  متدين" <?php if($member->religiosity == "متدين")    echo "selected"; ?> >           متدين      </option>
                                        <option value="متدين كثيراً" <?php if($member->religiosity == "متدين كثيراً")    echo "selected"; ?> >         متدين كثيراً      </option>
                                        <option value="أفضل الا أقول " <?php if($member->religiosity == "أفضل الا أقول")    echo "selected"; ?> >         أفضل الا أقول      </option>
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
                                        <option value="0" <?php if($member->pray == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="اصلي دائماً" <?php if($member->pray == "اصلي دائماً")    echo "selected"; ?> >         اصلي دائماً      </option>
                                        <option value="اصلي أغلب الأوقات" <?php if($member->pray == "اصلي أغلب الأوقات")    echo "selected"; ?> >           اصلي أغلب الأوقات      </option>
                                        <option value="اصلي بعض الأوقات" <?php if($member->pray == "اصلي بعض الأوقات")    echo "selected"; ?> >         اصلي بعض الأوقات      </option>
                                        <option value="لا اصلي" <?php if($member->pray == "لا اصلي")    echo "selected"; ?> >         لا اصلي      </option>
                                        <option value="أفضل الا أقول " <?php if($member->pray == "أفضل الا أقول")    echo "selected"; ?> >         أفضل الا أقول      </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">اللحية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="beard" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->beard == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="نعم" <?php if($member->beard == "نعم")    echo "selected"; ?> >         نعم      </option>
                                        <option value="لا" <?php if($member->beard == "لا")    echo "selected"; ?> >          لا      </option>
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
                                        <option value="0" <?php if($member->smoke == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="نعم" <?php if($member->smoke == "نعم")    echo "selected"; ?> >         نعم      </option>
                                        <option value="لا" <?php if($member->smoke == "لا")    echo "selected"; ?> >          لا      </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">بنية الجسم<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="body_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->body_status == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="رفيع / نحيف" <?php if($member->body_status == "رفيع / نحيف")    echo "selected"; ?> >         رفيع/نحيف      </option>
                                        <option value="  متوسط البنية" <?php if($member->body_status == "متوسط البنية")    echo "selected"; ?> >           متوسط البنية      </option>
                                        <option value="قوام رياضي" <?php if($member->body_status == "قوام رياضي")    echo "selected"; ?> >           قوام رياضي      </option>
                                        <option value="سمين " <?php if($member->body_status == "سمين")    echo "selected"; ?> >          سمين      </option>
                                        <option value="ضخم" <?php if($member->body_status == "ضخم")    echo "selected"; ?> >          ضخم      </option>
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
                                            $intial= 30;
                                            $end= 200;
                                        ?>
                                        <option value="0" <?php if($member->weight == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->weight == $i )    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">مستمع للموسيقي<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="listen_music" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->listen_music == "0")    echo "selected"; ?> > {{ __('-') }} </option>
                                        <option value="نعم" <?php if($member->listen_music == "نعم")    echo "selected"; ?> > نعم </option>
                                        <option value="احيانا" <?php if($member->listen_music == "احيانا")    echo "selected"; ?> > احيانا </option>
                                        <option value="لا" <?php if($member->listen_music == "لا")    echo "selected"; ?> > لا </option>
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
                                        <option value="0" <?php if($member->education == "0")    echo "selected"; ?> >       {{__('-') }} </option>
                                        <option value="دراسة متوسطة" <?php if($member->education == "دراسة متوسطة")    echo "selected"; ?> >         دراسة متوسطة      </option>
                                        <option value="دراسة ثانوية" <?php if($member->education == "دراسة ثانوية")    echo "selected"; ?> >           دراسة ثانوية      </option>
                                        <option value="  دراسة جامعية" <?php if($member->education == "دراسة جامعية")    echo "selected"; ?> >           دراسة جامعية      </option>
                                        <option value="دكتوراه" <?php if($member->education == "دكتوراه")    echo "selected"; ?> >          دكتوراه      </option>
                                        <option value="دراسة ذاتية" <?php if($member->education == "دراسة ذاتية")    echo "selected"; ?> >          دراسة ذاتية      </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">مجال العمل<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="work_field" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->work_field == "0")    echo "selected"; ?> >       {{__('مجال العمل') }} </option>
                                        <option value="بدون عمل حاليا" <?php if($member->work_field == "بدون عمل حاليا")    echo "selected"; ?> >         بدون عمل حاليا      </option>
                                        <option value="لازلت أدرس" <?php if($member->work_field == "لازلت أدرس")    echo "selected"; ?> >          لازلت أدرس      </option>
                                        <option value="سكرتارية" <?php if($member->work_field == "سكرتارية")    echo "selected"; ?> >           سكرتارية      </option>
                                        <option value="مجال الفن/الأدب" <?php if($member->work_field == "مجال الفن/الأدب")    echo "selected"; ?> >           مجال الفن/الأدب      </option>
                                        <option value="الإدارة" <?php if($member->work_field == "الإدارة")    echo "selected"; ?> >           الإدارة      </option>
                                        <option value="مجال التجارة" <?php if($member->work_field == "مجال التجارة")    echo "selected"; ?> >           مجال التجارة      </option>
                                        <option value="مجال الاغذية" <?php if($member->work_field == "مجال الاغذية")    echo "selected"; ?> >           مجال الاغذية      </option>
                                        <option value="مجال الانشاءات و البناء" <?php if($member->work_field == "مجال الانشاءات و البناء")    echo "selected"; ?> >           مجال الانشاءات و البناء      </option>
                                        <option value="مجال القانون" <?php if($member->work_field == "مجال القانون")    echo "selected"; ?> >           مجال القانون      </option>
                                        <option value="مجال الطب" <?php if($member->work_field == "مجال الطب")    echo "selected"; ?> >           مجال الطب      </option>
                                        <option value="السياسة و الحكومة" <?php if($member->work_field == "السياسة و الحكومة")    echo "selected"; ?> >           السياسة و الحكومة      </option>
                                        <option value="التسويق و المبيعات" <?php if($member->work_field == "التسويق و المبيعات")    echo "selected"; ?> >           التسويق و المبيعات      </option>
                                        <option value="صاحب عمل خاص" <?php if($member->work_field == "صاحب عمل خاص")    echo "selected"; ?> >           صاحب عمل خاص      </option>
                                        <option value="مجال التدريس" <?php if($member->work_field == "مجال التدريس")    echo "selected"; ?> >           مجال التدريس      </option>
                                        <option value="مجال الهندسة / العلوم" <?php if($member->work_field == "مجال الهندسة / العلوم")    echo "selected"; ?> >           مجال الهندسة / العلوم      </option>
                                        <option value="مجال النقل" <?php if($member->work_field == "مجال النقل")    echo "selected"; ?> >           مجال النقل      </option>
                                        <option value="مجال الكمبيوتر / المعلومات" <?php if($member->work_field == "مجال الكمبيوتر / المعلومات")    echo "selected"; ?> >           مجال الكمبيوتر / المعلومات      </option>
                                        <option value="غير ذلك" <?php if($member->work_field == "غير ذلك")    echo "selected"; ?> >           غير ذلك      </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الوظيفة<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <input type="text" name="work" style="background-color: white;margin-bottom: 30px; margin-top: unset;" value="{{ $member->work }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الوضع المادي<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="money_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->money_status == "0")    echo "selected"; ?> >       {{__('وضعك المادي') }} </option>
                                        <option value="فقير" <?php if($member->money_status == "فقير")    echo "selected"; ?> >          فقير      </option>
                                        <option value="أقل من المتوسط" <?php if($member->money_status == "أقل من المتوسط")    echo "selected"; ?> >             أقل من المتوسط      </option>
                                        <option value="متوسط" <?php if($member->money_status == "متوسط")    echo "selected"; ?> >           متوسط      </option>
                                        <option value="أكبر من المتوسط" <?php if($member->money_status == "أكبر من المتوسط")    echo "selected"; ?> >          أكبر من المتوسط      </option>
                                        <option value="جيد" <?php if($member->money_status == "جيد")    echo "selected"; ?> >           جيد      </option>
                                        <option value="ميسور" <?php if($member->money_status == "ميسور")    echo "selected"; ?> >           ميسور      </option>
                                        <option value="غني" <?php if($member->money_status == "غني")    echo "selected"; ?> >           غني      </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الدخل الشهري<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="money_month" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->money_month == "0")    echo "selected"; ?> >       {{__('دخلك الشهري') }} </option>
                                        <option value=" بدون دخل شهري" <?php if($member->money_month == "بدون دخل شهري")    echo "selected"; ?> >         بدون دخل شهري      </option>
                                        <option value="أقل من 500 جنية" <?php if($member->money_month == "أقل من 500 جنية")    echo "selected"; ?> >            أقل من 500 جنية      </option>
                                        <option value="500 - 1000 جنية" <?php if($member->money_month == "500 - 1000 جنية")    echo "selected"; ?> >           500 - 1000 جنية      </option>
                                        <option value="500 - 1000 جنية" <?php if($member->money_month == "500 - 1000 جنية")    echo "selected"; ?> >           500 - 1000 جنية      </option>
                                        <option value="1000 - 3000 جنية" <?php if($member->money_month == "1000 - 3000 جنية")    echo "selected"; ?> >           1000 - 3000 جنية      </option>
                                        <option value="3000 - 6000 جنية" <?php if($member->money_month == "3000 - 6000 جنية")    echo "selected"; ?> >           3000 - 6000 جنية      </option>
                                        <option value="6000 - 9000 جنية" <?php if($member->money_month == "6000 - 9000 جنية")    echo "selected"; ?> >           6000 - 9000 جنية      </option>
                                        <option value="9000 - 12000 جنية" <?php if($member->money_month == "9000 - 12000 جنية")    echo "selected"; ?> >           9000 - 12000 جنية      </option>
                                        <option value="12000 - 15000 جنية" <?php if($member->money_month == "12000 - 15000 جنية")    echo "selected"; ?> >           12000 - 15000 جنية      </option>
                                        <option value="15000 - 18000 جنية" <?php if($member->money_month == "15000 - 18000 جنية")    echo "selected"; ?> >           15000 - 18000 جنية      </option>
                                        <option value="18000 - 20000 جنية" <?php if($member->money_month == "18000 - 20000 جنية")    echo "selected"; ?> >           18000 - 20000 جنية      </option>
                                        <option value="أكبر من 20000 جنية" <?php if($member->money_month == "أكبر من 20000 جنية")    echo "selected"; ?> >            أكبر من 20000 جنية      </option>
                                        <option value="لا أود أن أقول" <?php if($member->money_month == "لا أود أن أقول")    echo "selected"; ?> >            لا أود أن أقول      </option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <p class="user-name">الحالة الصحية<span style="color: red"> * </span></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <select name="health_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->health_status == "0")    echo "selected"; ?> >       {{__('حالتك الصحية') }} </option>
                                        <option value="   سليم و الحمدلله" <?php if($member->health_status == "سليم و الحمدلله")    echo "selected"; ?> >           سليم و الحمدلله      </option>
                                        <option value="   اعاقة فكرية" <?php if($member->health_status == "اعاقة فكرية")    echo "selected"; ?> >           اعاقة فكرية      </option>
                                        <option value="   اعاقة حركية" <?php if($member->health_status == "اعاقة حركية")    echo "selected"; ?> >           اعاقة حركية      </option>
                                        <option value="   اكتئاب" <?php if($member->health_status == "اكتئاب")    echo "selected"; ?> >           اكتئاب      </option>
                                        <option value="   انحناء وتقوس" <?php if($member->health_status == "انحناء وتقوس")    echo "selected"; ?> >           انحناء وتقوس      </option>
                                        <option value="   انفصام في الشخصية" <?php if($member->health_status == "انفصام في الشخصية")    echo "selected"; ?> >           انفصام في الشخصية      </option>
                                        <option value="   باطنية" <?php if($member->health_status == "باطنية")    echo "selected"; ?> >           باطنية      </option>
                                        <option value="   برص" <?php if($member->health_status == "برص")    echo "selected"; ?> >           برص      </option>
                                        <option value="   بصرية" <?php if($member->health_status == "بصرية")    echo "selected"; ?> >           بصرية      </option>
                                        <option value="   بهاق" <?php if($member->health_status == "بهاق")    echo "selected"; ?> >           بهاق      </option>
                                        <option value="   جلدية" <?php if($member->health_status == "جلدية")    echo "selected"; ?> >           جلدية      </option>
                                        <option value="   حروق مشوهه" <?php if($member->health_status == "حروق مشوهه")    echo "selected"; ?> >           حروق مشوهه      </option>
                                        <option value="   سكري" <?php if($member->health_status == "سكري")    echo "selected"; ?> >           سكري      </option>
                                        <option value="   سمعية" <?php if($member->health_status == "سمعية")    echo "selected"; ?> >           سمعية      </option>
                                        <option value="   كلامية / نطق" <?php if($member->health_status == "كلامية / نطق")    echo "selected"; ?> >           كلامية / نطق      </option>
                                        <option value="   سمنة مفرطة" <?php if($member->health_status == "سمنة مفرطة")    echo "selected"; ?> >           سمنة مفرطة      </option>
                                        <option value="   شلل أطفال" <?php if($member->health_status == "شلل أطفال")    echo "selected"; ?> >           شلل أطفال      </option>
                                        <option value="   شلل رباعي" <?php if($member->health_status == "شلل رباعي")    echo "selected"; ?> >           شلل رباعي      </option>
                                        <option value="   شلل نصفي" <?php if($member->health_status == "شلل نصفي")    echo "selected"; ?> >           شلل نصفي      </option>
                                        <option value="   صدفية" <?php if($member->health_status == "صدفية")    echo "selected"; ?> >           صدفية      </option>
                                        <option value="   صرع" <?php if($member->health_status == "صرع")    echo "selected"; ?> >           صرع      </option>
                                        <option value="   عجز جنسي" <?php if($member->health_status == "عجز جنسي")    echo "selected"; ?> >           عجز جنسي      </option>
                                        <option value="   عقم" <?php if($member->health_status == "عقم")    echo "selected"; ?> >           عقم      </option>
                                        <option value="   فقدان طرف أو عضو" <?php if($member->health_status == "فقدان طرف أو عضو")    echo "selected"; ?> >           فقدان طرف أو عضو      </option>
                                        <option value="   قزم" <?php if($member->health_status == "قزم")    echo "selected"; ?> >           قزم      </option>
                                        <option value="   متلازمة داون" <?php if($member->health_status == "متلازمة داون")    echo "selected"; ?> >           متلازمة داون      </option>
                                        <option value="   نفسية" <?php if($member->health_status == "نفسية")    echo "selected"; ?> >           نفسية      </option>
                                        <option value="   غير ذلك" <?php if($member->health_status == "غير ذلك")    echo "selected"; ?> >           غير ذلك      </option>
                                    </select>
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
                                    <textarea name="partner_description">{{ $member->partner_description }}</textarea>
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
                                    <textarea name="your_description">{{ $member->your_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="last-button text-center mt-2">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4"></div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <button type="submit" style="background: #ff7b54; color: white; font-weight: 600">
                                        {{-- <a href="successfullogin.html" style="color: white">تسجيل الان</a> --}}
                                        تعديل البيانات
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
