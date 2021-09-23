@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ __('فلترة الاعضاء') }}
@stop

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
    {{ __('فلترة الاعضاء') }}
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
                    <a href="{{ route('members.index') }}">{{ trans('front_trans.return') }}</a>
                </button>
                <br><br>

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

                <div class="card-body">
                    {!! Form::open(['route' => 'members_filter_search', 'method' => 'get']) !!}
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="first_nationality" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر الجنسية --- </option>
                                    @foreach ($first_nationality as $nationality)
                                        <option value="{{ $nationality->nationality }}">{{ $nationality->nationality }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="dual_nationality" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر الجنسية الثانية --- </option>
                                    @foreach ($dual_nationality as $nationality)
                                        <option value="{{ $nationality->dual_nationality }}">{{ $nationality->dual_nationality }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="country" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر بلد الاقامة --- </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->country }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="city" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر المدينة --- </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city }}">{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- ---------------------------------------------------------------------------------------------------- --}}
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                {!! Form::label('age', trans(' اخـتـر الـعـمـر ')) !!}
                                <div class="row">
                                    <div class="col-6">
                                        {!! Form::number('min_age', old('min_age'), ['min'=>'20', 'max'=>'90', 'class' => 'form-control', 'placeholder' => trans('اقل عمر يبدأ من 20 عام')]) !!} <br>
                                    </div>
                                    <div class="col-6">
                                        {!! Form::number('max_age', old('max_age'), ['min'=>'20', 'max'=>'90', 'class' => 'form-control', 'placeholder' => trans('اكبر عمر ينتهي عند 90 عام')]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                {!! Form::label('tall', trans(' اخـتـر الـطـول ')) !!}
                                <div class="row">
                                    <div class="col-6">
                                        {!! Form::number('min_tall', old('min_tall'), ['min'=>'120', 'max'=>'230', 'class' => 'form-control', 'placeholder' => trans('اقل طول يبدأ من 120 ')]) !!} <br>
                                    </div>
                                    <div class="col-6">
                                        {!! Form::number('max_tall', old('max_tall'), ['min'=>'120', 'max'=>'230', 'class' => 'form-control', 'placeholder' => trans('اكبر طول ينتهي عند 230 ')]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ---------------------------------------------------------------------------------------------------- --}}
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                {!! Form::label('weight', trans(' اخـتـر الـوزن ')) !!}
                                <div class="row">
                                    <div class="col-6">
                                        {!! Form::number('min_weight', old('min_weight'), ['min'=>'30', 'max'=>'200', 'class' => 'form-control', 'placeholder' => trans('اقل وزن يبدأ من 30 ')]) !!} <br>
                                    </div>
                                    <div class="col-6">
                                        {!! Form::number('max_weight', old('max_weight'), ['min'=>'30', 'max'=>'200', 'class' => 'form-control', 'placeholder' => trans('اكبر وزن ينتهي عند 200 ')]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                {!! Form::label('weight', trans(' اخـتـر لون البشرة ')) !!}
                                <select name="skin" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر لون البشرة --- </option>
                                    @foreach ($skins as $skin)
                                        <option value="{{ $skin->skin }}">{{ $skin->skin }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- ---------------------------------------------------------------------------------------------------- --}}
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="marital_status" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر الحالة الاجتماعية --- </option>
                                    @foreach ($marital_status as $status)
                                        <option value="{{ $status->marital_status }}">{{ $status->marital_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="marriage_type" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر نوع الزواج --- </option>
                                    @foreach ($marriage_type as $type)
                                        <option value="{{ $type->marriage_type }}">{{ $type->marriage_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- ---------------------------------------------------------------------------------------------------- --}}
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="education" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر المؤهل التعليمي --- </option>
                                    @foreach ($educations as $education)
                                        <option value="{{ $education->education }}">{{ $education->education }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 space_top_filter">
                            <div class="form-group">
                                <select name="money_month" required class="form-control custom-select selectpicker gender">
                                    <option value="0"> اختر معدل الدخل الشهري --- </option>
                                    @foreach ($money_months as $money_month)
                                        <option value="{{ $money_month->money_month }}">{{ $money_month->money_month }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 28px; text-align:center ">
                            <div class="form-group">
                                {!! Form::button(trans('فـلـتـرة الأعـضـاء'), ['class' => 'btn btn-success property_search', 'type' => 'submit']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
