@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{__('تعديل بيانات عضو') }}
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
{{__('تعديل بيانات عضو') }}
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
                    <form action="{{ route('members.update', 'test') }}" method="post" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        @csrf
                        <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $member->id }}">

                        <div class="row beauty_top">
                            <h2 class="help">{{__('بيانات الدخول') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="mr-sm-2  space_top">{{ __('الاســم') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="name" value="{{ $member->name }}">

                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email" class="mr-sm-2">{{ __('البريد الالكتروني') }} : <span style="color: red"> * </span> </label>
                                    <input type="email" class="form-control" name="email" value="{{ $member->email }}">

                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password" class="mr-sm-2">{{ __('كلمة المرور') }} : <span style="color: red"> * </span> </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="mr-sm-2">{{ __('تأكيد كلمة المرور') }} : <span style="color: red"> * </span> </label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">

                                    {{-- @error('email')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender" class="mr-sm-2  space_top">{{ __('نوع (ذكر / أنثي)') }} : <span style="color: red"> * </span> </label>
                                    <select name="gender" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->gender == "0")    echo "selected"; ?> >       {{ trans('social_trans.0') }} </option>
                                        <option value="ذكر" <?php if($member->gender == "ذكر")    echo "selected"; ?> >        ذكر      </option>
                                        <option value="أنثي" <?php if($member->gender == "أنثي")    echo "selected"; ?> >       أنثي     </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="image" class="mr-sm-2  space_top">{{__('الصورة الشخصية') }} : </label>
                                <input type="file" class="form-control" name="image">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        {{--------- الجنسية والإقامة -----------}}
                        <div class="row beauty">
                            <h2 class="help">{{__('الجنسية والإقامة') }}</h2>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nationality" class="mr-sm-2  space_top">{{ __('الجنسية') }} : <span style="color: red"> * </span> </label>
                                            <input type="text" class="form-control" name="nationality" value="{{ $member->nationality }}" readonly>

                                            @error('nationality')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-sm-12 control-label   space_top">اختر الجنسية اذا اردت تعديلها فقط</label>
                                        <div class="col-sm-12">
                                            <select id="countrySelection" name ="nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                                country-data-region-id="gds-cr-one" data-language="ar"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="dual_nationality" class="mr-sm-2  space_top">{{ __('الجنسية الثانية') }} : <span style="color: red"> * </span> </label>
                                            <input type="text" class="form-control" name="dual_nationality" value="{{ $member->dual_nationality }}" readonly>

                                            @error('dual_nationality')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-sm-12 control-label   space_top">اختر الجنسية الثانية اذا اردت تعديلها فقط</label>
                                        <div class="col-sm-12">
                                            <select id="countrySelection" name ="dual_nationality" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                                country-data-region-id="gds-cr-one" data-language="ar"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="country" class="mr-sm-2  space_top">{{ __('بلد الاقامة') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="country" value="{{ $member->country }}" readonly>

                                    @error('country')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-sm-12 control-label   space_top">اختر البلد اذا اردت تعديلها فقط</label>
                                <div class="col-sm-12">
                                    <select id="countrySelection" name ="country" class="form-control gds-cr gds-countryflag  custom-select selectpicker gender"
                                        country-data-region-id="gds-cr-one" data-language="ar"></select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class="mr-sm-2  space_top">{{ __('المدينة') }} : <span style="color: red"> * </span> </label>
                                            <input type="text" class="form-control" name="city" value="{{ $member->city }}" readonly>

                                            @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="gds-cr-one"  name ="city" class="col-sm-12 control-label   space_top">اختر المدينة اذا اردت تعديلها فقط</label>
                                        <div class="col-sm-12">
                                            <select name ="city" class="form-control  custom-select selectpicker gender" id="gds-cr-one"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>


                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="nationality" class="mr-sm-2">{{ __('الجنسية') }} : <span style="color: red"> * </span> </label>
                                    <input name="nationality" type="text" class="form-control" required value="{{ $member->nationality }}">

                                    @error('nationality') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dual_nationality" class="mr-sm-2">{{ __('جنسية أخري') }} : <span style="color: red"> * </span> </label>
                                    <input name="dual_nationality" type="text" class="form-control" value="{{ $member->dual_nationality }}">

                                    @error('dual_nationality') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div> --}}
                            <br><br>
                        </div>



                        {{--------- الحالة الإجتماعية -----------}}
                        <div class="row beauty">
                            <h2 class="help">{{__('الحالة الإجتماعية') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marriage_type" class="mr-sm-2  space_top">{{ __('نوع الزواج') }} : <span style="color: red"> * </span> </label>
                                    <select name="marriage_type" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->marriage_type == "0")    echo "selected"; ?> >       {{__('اختر نوع الزواج') }} </option>
                                        <option value="زوجة أولي" <?php if($member->marriage_type == "زوجة أولي")    echo "selected"; ?> >        زوجة أولي      </option>
                                        <option value="زوجة ثانية" <?php if($member->marriage_type == "زوجة ثانية")    echo "selected"; ?> >       زوجة ثانية     </option>
                                        <option value="زوجة ثالثة" <?php if($member->marriage_type == "زوجة ثالثة")    echo "selected"; ?> >        زوجة ثالثة      </option>
                                        <option value="زوجة رابعة" <?php if($member->marriage_type == "زوحة رابعة")    echo "selected"; ?> >       زوجة رابعة     </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marital_status" class="mr-sm-2  space_top">{{ __('الحالة الإجتماعية') }} : <span style="color: red"> * </span> </label>
                                    <select name="marital_status" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->marital_status == "0")    echo "selected"; ?> >       {{__('اختر الحالة الإجتماعية ') }} </option>
                                        <option value="أعزب" <?php if($member->marital_status == "أعزب")    echo "selected"; ?> >         أعزب      </option>
                                        <option value="متزوج" <?php if($member->marital_status == "متزوج")    echo "selected"; ?> >         متزوج      </option>
                                        <option value="مطلق" <?php if($member->marital_status == "مطلق")    echo "selected"; ?> >         مطلق      </option>
                                        <option value="أرمل" <?php if($member->marital_status == "أرمل")    echo "selected"; ?> >         أرمل      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="age" class="mr-sm-2  space_top">{{ __('العمر') }} : <span style="color: red"> * </span> </label>
                                    <select name="age" required class="form-control custom-select selectpicker gender">
                                        <?php
                                            $intial= 21;
                                            $end= 90;
                                        ?>
                                        <option value="0" <?php if($member->age == "0")    echo "selected"; ?> >       {{__('اختر العمر ') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->age == $i)    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="children_number" class="mr-sm-2  space_top">{{ __('عدد الاطفال') }} : <span style="color: red"> * </span> </label>
                                    <select name="children_number" required class="form-control custom-select selectpicker gender">
                                        <?php
                                            $intial= 0;
                                            $end= 10;
                                        ?>
                                        <option value="no" <?php if($member->children_number == "no")    echo "selected"; ?> >       {{__('اختر عدد الاطفال ') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->children_number == $i)    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="children_with" class="mr-sm-2  space_top">{{ __('الاطفال مع') }} : <span style="color: red"> * </span> </label>
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
                            <br><br>
                        </div>



                        {{--------- مواصفاتك -----------}}
                        <div class="row beauty">
                            <h2 class="help">{{__('مواصفاتك') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="weight" class="mr-sm-2  space_top">{{ __('الوزن (كغ)') }} : <span style="color: red"> * </span> </label>
                                    <select name="weight" required class="form-control custom-select selectpicker gender">
                                        <?php
                                            $intial= 30;
                                            $end= 200;
                                        ?>
                                        <option value="0" <?php if($member->weight == "0")    echo "selected"; ?> >       {{__('ما هو وزنك ؟') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->weight == $i )    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tall" class="mr-sm-2  space_top">{{ __('الطول (سم)') }} : <span style="color: red"> * </span> </label>
                                    <select name="tall" required class="form-control custom-select selectpicker gender">
                                        <?php
                                            $intial= 120;
                                            $end= 230;
                                        ?>
                                        <option value="0" <?php if($member->tall == "0")    echo "selected"; ?> >       {{__('ما هو طولك ؟') }} </option>
                                        @for ($i = $intial; $i <= $end; $i++)
                                            <option value="{{ $i }}" <?php if($member->tall == $i )    echo "selected"; ?> >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="skin" class="mr-sm-2  space_top">{{ __('لون البشرة') }} : <span style="color: red"> * </span> </label>
                                    <select name="skin" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->skin == "0")    echo "selected"; ?> >       {{__('اختر لون بشرتك ؟  ') }} </option>
                                        <option value="أبيض" <?php if($member->skin == "أبيض")    echo "selected"; ?> >         أبيض      </option>
                                        <option value="حنطي مائل للبياض" <?php if($member->skin == "حنطي مائل للبياض")    echo "selected"; ?> >         حنطي مائل للبياض      </option>
                                        <option value="حنطي مائل للسمار" <?php if($member->skin == "حنطي مائل للسمار")    echo "selected"; ?> >         حنطي مائل للسمار      </option>
                                        <option value="أسمر فاتح" <?php if($member->skin == "أسمر فاتح")    echo "selected"; ?> >         أسمر فاتح      </option>
                                        <option value="أسمر غامق " <?php if($member->skin == "أسمر غامق")    echo "selected"; ?> >         أسمر غامق      </option>
                                        <option value="أرمل" <?php if($member->skin == "أرمل")    echo "selected"; ?> >          أسود      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="body_status" class="mr-sm-2  space_top">{{ __('بنية الجسم ') }} : <span style="color: red"> * </span> </label>
                                    <select name="body_status" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->body_status == "0")    echo "selected"; ?> >       {{__('اختر بنية جسمك ؟  ') }} </option>
                                        <option value="رفيع / نحيف" <?php if($member->body_status == "رفيع / نحيف")    echo "selected"; ?> >         رفيع/نحيف      </option>
                                        <option value="  متوسط البنية" <?php if($member->body_status == "متوسط البنية")    echo "selected"; ?> >           متوسط البنية      </option>
                                        <option value="قوام رياضي" <?php if($member->body_status == "قوام رياضي")    echo "selected"; ?> >           قوام رياضي      </option>
                                        <option value="سمين " <?php if($member->body_status == "سمين")    echo "selected"; ?> >          سمين      </option>
                                        <option value="ضخم" <?php if($member->body_status == "ضخم")    echo "selected"; ?> >          ضخم      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                        </div>



                        {{--------- الالتزام الديني -----------}}
                        <div class="row beauty">
                            <h2 class="help">{{__('الالتزام الديني') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="religiosity" class="mr-sm-2  space_top">{{ __('التدين ') }} : <span style="color: red"> * </span> </label>
                                    <select name="religiosity" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->religiosity == "0")    echo "selected"; ?> >       {{__('--اختر--') }} </option>
                                        <option value="لست متدين" <?php if($member->religiosity == "لست متدين")    echo "selected"; ?> >         لست متدين      </option>
                                        <option value="متدين قليلاً" <?php if($member->religiosity == "متدين قليلاً")    echo "selected"; ?> >           متدين قليلاً      </option>
                                        <option value="  متدين" <?php if($member->religiosity == "متدين")    echo "selected"; ?> >           متدين      </option>
                                        <option value="متدين كثيراً" <?php if($member->religiosity == "متدين كثيراً")    echo "selected"; ?> >         متدين كثيراً      </option>
                                        <option value="أفضل الا أقول " <?php if($member->religiosity == "أفضل الا أقول")    echo "selected"; ?> >         أفضل الا أقول      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pray" class="mr-sm-2  space_top">{{ __('الصلاة ') }} : <span style="color: red"> * </span> </label>
                                    <select name="pray" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->pray == "0")    echo "selected"; ?> >       {{__('--اختر--') }} </option>
                                        <option value="اصلي دائماً" <?php if($member->pray == "اصلي دائماً")    echo "selected"; ?> >         اصلي دائماً      </option>
                                        <option value="اصلي أغلب الأوقات" <?php if($member->pray == "اصلي أغلب الأوقات")    echo "selected"; ?> >           اصلي أغلب الأوقات      </option>
                                        <option value="اصلي بعض الأوقات" <?php if($member->pray == "اصلي بعض الأوقات")    echo "selected"; ?> >         اصلي بعض الأوقات      </option>
                                        <option value="لا اصلي" <?php if($member->pray == "لا اصلي")    echo "selected"; ?> >         لا اصلي      </option>
                                        <option value="أفضل الا أقول " <?php if($member->pray == "أفضل الا أقول")    echo "selected"; ?> >         أفضل الا أقول      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smoke" class="mr-sm-2  space_top">{{ __('التدخين') }} : <span style="color: red"> * </span> </label>
                                    <select name="smoke" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->smoke == "0")    echo "selected"; ?> >       {{__('--اختر--') }} </option>
                                        <option value="نعم" <?php if($member->smoke == "نعم")    echo "selected"; ?> >         نعم      </option>
                                        <option value="لا" <?php if($member->smoke == "لا")    echo "selected"; ?> >          لا      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="beard" class="mr-sm-2  space_top">{{ __('اللحية') }} : <span style="color: red"> * </span> </label>
                                    <select name="beard" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->beard == "0")    echo "selected"; ?> >       {{__('--اختر--') }} </option>
                                        <option value="نعم" <?php if($member->beard == "نعم")    echo "selected"; ?> >         نعم      </option>
                                        <option value="لا" <?php if($member->beard == "لا")    echo "selected"; ?> >          لا      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hair_color" class="mr-sm-2  space_top">{{ __('لون الشعر') }} : <span style="color: red"> * </span> </label>
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
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="listen_music" class="mr-sm-2  space_top">{{ __('مستمع للموسيقي') }} : <span style="color: red"> * </span> </label>
                                    <select name="listen_music" required
                                        class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->listen_music == "0")    echo "selected"; ?> > {{ __('-') }} </option>
                                        <option value="نعم" <?php if($member->listen_music == "نعم")    echo "selected"; ?> > نعم </option>
                                        <option value="احيانا" <?php if($member->listen_music == "احيانا")    echo "selected"; ?> > احيانا </option>
                                        <option value="لا" <?php if($member->listen_music == "لا")    echo "selected"; ?> > لا </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                        </div>


                        {{--------- الدراسة والعمل -----------}}
                        <div class="row beauty">
                            <h2 class="help">{{__('الدراسة والعمل') }}</h2>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="education" class="mr-sm-2  space_top">{{ __('المؤهل التعليمي ') }} : <span style="color: red"> * </span> </label>
                                    <select name="education" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->education == "0")    echo "selected"; ?> >       {{__('اختر المؤهل التعليمي') }} </option>
                                        <option value="دراسة متوسطة" <?php if($member->education == "دراسة متوسطة")    echo "selected"; ?> >         دراسة متوسطة      </option>
                                        <option value="دراسة ثانوية" <?php if($member->education == "دراسة ثانوية")    echo "selected"; ?> >           دراسة ثانوية      </option>
                                        <option value="  دراسة جامعية" <?php if($member->education == "دراسة جامعية")    echo "selected"; ?> >           دراسة جامعية      </option>
                                        <option value="دكتوراه" <?php if($member->education == "دكتوراه")    echo "selected"; ?> >          دكتوراه      </option>
                                        <option value="دراسة ذاتية" <?php if($member->education == "دراسة ذاتية")    echo "selected"; ?> >          دراسة ذاتية      </option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="money_status" class="mr-sm-2  space_top">{{ __('الوضع المادي ') }} : <span style="color: red"> * </span> </label>
                                    <select name="money_status" required class="form-control custom-select selectpicker gender">
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
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_field" class="mr-sm-2  space_top">{{ __('مجال العمل') }} : <span style="color: red"> * </span> </label>
                                    <select name="work_field" required class="form-control custom-select selectpicker gender">
                                        <option value="0" <?php if($member->work_field == "0")    echo "selected"; ?> >       {{__('مجال العمل') }} </option>
                                        <option value="بدون عمل حاليا" <?php if($member->work_field == "بدون عمل حاليا")    echo "selected"; ?> >         بدون عمل حاليا      </option>
                                        <option value="لازلت أدرس" <?php if($member->work_field == "لازلت أدرس")    echo "selected"; ?> >          لازلت أدرس      </option>
                                        {{-- <option value="">                 </option> --}}
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
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work" class="mr-sm-2  space_top">{{ __('الوظيفة') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="work" value="work">

                                    @error('work')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="money_month" class="mr-sm-2  space_top">{{ __('الدخل الشهري') }} : <span style="color: red"> * </span> </label>
                                    <select name="money_month" required class="form-control custom-select selectpicker gender">
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
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="health_status" class="mr-sm-2  space_top">{{ __('الحالة الصحية') }} : <span style="color: red"> * </span> </label>
                                    <select name="health_status" required class="form-control custom-select selectpicker gender">
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



                        {{--------- مواصفات شريكة حياتك التي ترغب الإرتباط بها -----------}}
                        <div class="row beauty_top">
                            <h2 class="help">{{__('مواصفات شريكة حياتك التي ترغب الإرتباط بها') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="partner_description" class="mr-sm-2  space_top">{{ __('يرجى الكتابة بطريقة جادة , ,ويمنع كتابة الإيميل أو رقم الجوال في هذا المكان') }} : <span style="color: red"> * </span> </label>
                                    <textarea class="form-control" name="partner_description" rows="5">{{ $member->partner_description }}</textarea>

                                    @error('partner_description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                        </div>

                        {{--------- تحدث عن نفسك -----------}}
                        <div class="row beauty_top">
                            <h2 class="help">{{__('تحدث عن نفسك') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="your_description" class="mr-sm-2  space_top">{{ __('يرجى الكتابة بطريقة جادة , ,ويمنع كتابة الإيميل أو رقم الجوال في هذا المكان') }} : <span style="color: red"> * </span> </label>
                                    <textarea class="form-control" name="your_description" rows="5">{{ $member->your_description }}</textarea>

                                    @error('your_description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                        </div>


                        {{--------- البيانات السرية جدا -----------}}
                        <div class="row beauty_top">
                            <h2 class="help">{{__('البيانات السرية جدا') }}</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="full_name" class="mr-sm-2  space_top">{{ __('الاسم الكامل ') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="full_name" value="{{ $member->full_name }}">

                                    @error('full_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone" class="mr-sm-2  space_top">{{ __('رقم الجوال ') }} : <span style="color: red"> * </span> </label>
                                    <input type="text" class="form-control" name="phone"value={{ $member->phone }}>

                                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group pt-4" style="text-align: center;">
                            {{-- {!! Form::submit( trans('property_trans.submit') , ['class' => 'btn btn-primary']) !!} --}}

                            <button type="submit" class="btn btn-success">{{__('حفظ البيانات') }}</button>
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



