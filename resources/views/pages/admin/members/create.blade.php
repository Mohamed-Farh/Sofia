@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ __('اضافة عضو') }}
@stop

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
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ __('الاعضاء') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
    @if ($errors->any())
        <div class="error">{{ $errors->first('Name') }}</div>
    @endif

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="button x-small back_property">
                    <a href="{{ route('members.index') }}">{{ trans('property_trans.return') }}</a>
                </button>
                <br><br>

                <div class="card-body">
                    <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row beauty_top">
                            <h2 class="help">{{ __('بيانات الدخول') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="mr-sm-2  space_top">{{ __('الاســم') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="name">

                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email" class="mr-sm-2">{{ __('البريد الالكتروني') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input type="email" class="form-control" name="email">

                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password" class="mr-sm-2">{{ __('كلمة المرور') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="mr-sm-2">{{ __('تأكيد كلمة المرور') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                    {{-- @error('email')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender" class="mr-sm-2  space_top">{{ __('نوع (ذكر / أنثي)') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="gender" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ trans('social_trans.0') }} </option>
                                        <option value="ذكر"> ذكر </option>
                                        <option value="أنثي"> أنثي </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="image" class="mr-sm-2  space_top">{{ __('الصورة الشخصية') }} : </label>
                                <input type="file" class="form-control" name="image">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        {{-- ------- الجنسية والإقامة --------- --}}
                        <div class="row beauty">
                            <h2 class="help">{{ __('الجنسية والإقامة') }}</h2>


                            <div class="form-group col-6">
                                <label class="col-sm-2 control-label">بلد</label>
                                <div class="col-sm-12">
                                    <select id="countrySelection" name ="nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar"></select>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group col-6">
                                <label class="col-sm-2 control-label">بلد</label>
                                <div class="col-sm-12">
                                    <select id="countrySelection" name ="dual_nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar"></select>
                                </div>
                            </div>
                            <br><br>







                            <div class="col-12">
                                {{-- <form class="form-horizontal"> --}}
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="col-sm-2 control-label">بلد</label>
                                            <div class="col-sm-12">
                                                <select id="countrySelection" name ="country" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                                    country-data-region-id="gds-cr-one" data-language="ar"></select>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="gds-cr-one"  name ="city" class="col-sm-2 control-label">منطقة</label>
                                            <div class="col-sm-12">
                                                <select name ="city" class="form-control  custom-select selectpicker gender" id="gds-cr-one"></select>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>



                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="country" class="mr-sm-2  space_top">{{ __('بلد الاقامة') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="country">

                                    @error('country')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="city" class="mr-sm-2  space_top">{{ __('المدينة') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="city">

                                    @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> --}}
                            <br><br>
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="nationality" class="mr-sm-2">{{ __('الجنسية') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input name="nationality" type="text" class="form-control" required>

                                    @error('nationality') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div> --}}

                        </div>



                        {{-- ------- الحالة الإجتماعية --------- --}}
                        <div class="row beauty">
                            <h2 class="help">{{ __('الحالة الإجتماعية') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marriage_type" class="mr-sm-2  space_top">{{ __('نوع الزواج') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="marriage_type" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('اختر نوع الزواج') }} </option>
                                        <option value="زوجة أولي"> زوجة أولي </option>
                                        <option value="زوجة ثانية"> زوجة ثانية </option>
                                        <option value="زوجة ثالثة"> زوجة ثالثة </option>
                                        <option value="وزوحة رابعة"> زوجة رابعة </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marital_status"
                                        class="mr-sm-2  space_top">{{ __('الحالة الإجتماعية') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="marital_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('اختر الحالة الإجتماعية ') }} </option>
                                        <option value="أعزب"> أعزب </option>
                                        <option value="متزوج"> متزوج </option>
                                        <option value="مطلق"> مطلق </option>
                                        <option value="أرمل"> أرمل </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="age" class="mr-sm-2  space_top">{{ __('العمر') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="age" required class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 21;
                                        $end = 90;
                                        ?>
                                        <option value="0"> {{ __('اختر العمر ') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="children_number" class="mr-sm-2  space_top">{{ __('عدد الاطفال') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="children_number" required
                                        class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 0;
                                        $end = 10;
                                        ?>
                                        <option value="no"> {{ __('اختر عدد الاطفال ') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="children_with" class="mr-sm-2  space_top">{{ __('الاطفال مع') }} :
                                        <span style="color: red"> * </span> </label>
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
                            <br><br>
                        </div>



                        {{-- ------- مواصفاتك --------- --}}
                        <div class="row beauty">
                            <h2 class="help">{{ __('مواصفاتك') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="weight" class="mr-sm-2  space_top">{{ __('الوزن (كغ)') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="weight" required
                                        class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 30;
                                        $end = 200;
                                        ?>
                                        <option value="0"> {{ __('ما هو وزنك ؟') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tall" class="mr-sm-2  space_top">{{ __('الطول (سم)') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="tall" required class="form-control custom-select selectpicker gender">
                                        <?php
                                        $intial = 120;
                                        $end = 230;
                                        ?>
                                        <option value="0"> {{ __('ما هو طولك ؟') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="skin" class="mr-sm-2  space_top">{{ __('لون البشرة') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="skin" required class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('اختر لون بشرتك ؟  ') }} </option>
                                        <option value="أبيض"> أبيض </option>
                                        <option value="حنطي مائل للبياض"> حنطي مائل للبياض </option>
                                        <option value="حنطي مائل للسمار"> حنطي مائل للسمار </option>
                                        <option value="أسمر فاتح"> أسمر فاتح </option>
                                        <option value="أسمر غامق "> أسمر غامق </option>
                                        <option value="أرمل"> أسود </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="body_status" class="mr-sm-2  space_top">{{ __('بنية الجسم ') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="body_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('اختر بنية جسمك ؟  ') }} </option>
                                        <option value="رفيع/نحيف"> رفيع/نحيف </option>
                                        <option value="  متوسط البنية"> متوسط البنية </option>
                                        <option value="قوام رياضي"> قوام رياضي </option>
                                        <option value="سمين "> سمين </option>
                                        <option value="ضخم"> ضخم </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hair_color" class="mr-sm-2  space_top">{{ __('لون الشعر') }} : <span
                                            style="color: red"> * </span> </label>
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
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="listen_music" class="mr-sm-2  space_top">{{ __('مستمع للموسيقي') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="listen_music" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('-') }} </option>
                                        <option value="نعم"> نعم </option>
                                        <option value="احيانا"> احيانا </option>
                                        <option value="لا"> لا </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                        </div>



                        {{-- ------- الالتزام الديني --------- --}}
                        <div class="row beauty">
                            <h2 class="help">{{ __('الالتزام الديني') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="religiosity" class="mr-sm-2  space_top">{{ __('التدين ') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="religiosity" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('--اختر--') }} </option>
                                        <option value="لست متدين"> لست متدين </option>
                                        <option value="متدين قليلاً"> متدين قليلاً </option>
                                        <option value="  متدين"> متدين </option>
                                        <option value="متدين كثيراً"> متدين كثيراً </option>
                                        <option value="أفضل الا أقول "> أفضل الا أقول </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pray" class="mr-sm-2  space_top">{{ __('الصلاة ') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="pray" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('--اختر--') }} </option>
                                        <option value="اصلي دائماً"> اصلي دائماً </option>
                                        <option value="اصلي أغلب الأوقات"> اصلي أغلب الأوقات </option>
                                        <option value="اصلي بعض الأوقات"> اصلي بعض الأوقات </option>
                                        <option value="لا اصلي"> لا اصلي </option>
                                        <option value="أفضل الا أقول "> أفضل الا أقول </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smoke" class="mr-sm-2  space_top">{{ __('التدخين') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="smoke" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('--اختر--') }} </option>
                                        <option value="نعم"> نعم </option>
                                        <option value="لا"> لا </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="beard" class="mr-sm-2  space_top">{{ __('اللحية') }} : <span
                                            style="color: red"> * </span> </label>
                                    <select name="beard" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('--اختر--') }} </option>
                                        <option value="نعم"> نعم </option>
                                        <option value="لا"> لا </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                        </div>


                        {{-- ------- الدراسة والعمل --------- --}}
                        <div class="row beauty">
                            <h2 class="help">{{ __('الدراسة والعمل') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="education" class="mr-sm-2  space_top">{{ __('المؤهل التعليمي ') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="education" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('اختر المؤهل التعليمي') }} </option>
                                        <option value="دراسة متوسطة"> دراسة متوسطة </option>
                                        <option value="دراسة ثانوية"> دراسة ثانوية </option>
                                        <option value="  دراسة جامعية"> دراسة جامعية </option>
                                        <option value="دكتوراه"> دكتوراه </option>
                                        <option value="دراسة ذاتية"> دراسة ذاتية </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="money_status" class="mr-sm-2  space_top">{{ __('الوضع المادي ') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="money_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('وضعك المادي') }} </option>
                                        <option value="فقير"> فقير </option>
                                        <option value="أقل من المتوسط"> أقل من المتوسط </option>
                                        <option value="متوسط"> متوسط </option>
                                        <option value="أكبر من المتوسط"> أكبر من المتوسط </option>
                                        <option value="جيد"> جيد </option>
                                        <option value="ميسور"> ميسور </option>
                                        <option value="غني"> غني </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_field" class="mr-sm-2  space_top">{{ __('مجال العمل') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="work_field" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('مجال العمل') }} </option>
                                        <option value="بدون عمل حاليا"> بدون عمل حاليا </option>
                                        <option value="لازلت أدرس"> لازلت أدرس </option>
                                        {{-- <option value="">                 </option> --}}
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
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work" class="mr-sm-2  space_top">{{ __('الوظيفة') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="work">

                                    @error('work')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="money_month" class="mr-sm-2  space_top">{{ __('الدخل الشهري') }} :
                                        <span style="color: red"> * </span> </label>
                                    <select name="money_month" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('دخلك الشهري') }} </option>
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
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="health_status" class="mr-sm-2  space_top">{{ __('الحالة الصحية') }}
                                        : <span style="color: red"> * </span> </label>
                                    <select name="health_status" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0"> {{ __('حالتك الصحية') }} </option>
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
                            </div>
                        </div>



                        {{-- ------- مواصفات شريكة حياتك التي ترغب الإرتباط بها --------- --}}
                        <div class="row beauty_top">
                            <h2 class="help">{{ __('مواصفات شريكة حياتك التي ترغب الإرتباط بها') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="partner_description"
                                        class="mr-sm-2  space_top">{{ __('يرجى الكتابة بطريقة جادة , ,ويمنع كتابة الإيميل أو رقم الجوال في هذا المكان') }}
                                        : <span style="color: red"> * </span> </label>
                                    <textarea class="form-control" name="partner_description" rows="5"></textarea>

                                    @error('partner_description')<span
                                        class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                        </div>

                        {{-- ------- تحدث عن نفسك --------- --}}
                        <div class="row beauty_top">
                            <h2 class="help">{{ __('تحدث عن نفسك') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="your_description"
                                        class="mr-sm-2  space_top">{{ __('يرجى الكتابة بطريقة جادة , ,ويمنع كتابة الإيميل أو رقم الجوال في هذا المكان') }}
                                        : <span style="color: red"> * </span> </label>
                                    <textarea class="form-control" name="your_description" rows="5"></textarea>

                                    @error('your_description')<span
                                        class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                        </div>


                        {{-- ------- البيانات السرية جدا --------- --}}
                        <div class="row beauty_top">
                            <h2 class="help">{{ __('البيانات السرية جدا') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="full_name" class="mr-sm-2  space_top">{{ __('الاسم الكامل ') }} :
                                        <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="full_name">

                                    @error('full_name')<span
                                        class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone" class="mr-sm-2  space_top">{{ __('رقم الجوال ') }} : <span
                                            style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="phone">

                                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group pt-4" style="text-align: center;">
                            {{-- {!! Form::submit( trans('property_trans.submit') , ['class' => 'btn btn-primary']) !!} --}}

                            <button type="submit" class="btn btn-success">{{ __('حفظ البيانات') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @include('pages.admin.members.country_filter') --}}
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
