@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('الاعـلانـات') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('الاعـلانـات') }}
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

            @if (auth()->user()->hasRole(['super_admin', 'admin']))
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{__('اضـافـة')}}
                </button>
            @endif
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('الصورة') }}</th>
                            <th>{{__('العنوان') }}</th>
                            <th>{{__('نص الاعلان') }}</th>
                            <th>{{__('بلد العرض') }}</th>
                            {{-- <th>{{__('الرابط') }}</th> --}}
                            <th>{{ trans('users_trans.created_at') }}</th>

                            @if (auth()->user()->hasRole(['super_admin', 'admin']))
                                <th>{{__('الـحـالـة')}}</th>
                                <th>{{ trans('users_trans.Processes') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($advs as $adv)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>

                                <td><img class="img-responsive thumbnail" src="{{url('image/advertising/'.$adv->image)}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>

                                <td>{{ $adv->name }}</td>
                                <td>{{ $adv->word }}</td>
                                <td>{{ $adv->country }}</td>
                                {{-- <td>{{ $adv->link }}</td> --}}
                                <td>{{ $adv->created_at->diffForHumans() }}</td>

                                @if (auth()->user()->hasRole(['super_admin', 'admin']))

                                    <td>
                                        @if  ($adv->status == '1')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#vis_contact{{ $adv->id }}"
                                            title="{{ trans('عـرض') }}"> <i class="fa fa-eye"></i> {{__('عـرض')}} </button>
                                        @elseif ($adv->status == '0')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#vis_contact{{ $adv->id }}"
                                            title="{{ trans('اخـفـاء') }}"> <i class="fa fa-eye-slash"></i> {{__('اخـفـاء')}} </button>
                                        @endif
                                    </td>

                                    <td class="#">
                                        <button type="button" class="btn btn-info btn-sm given" data-toggle="modal"
                                            data-target="#edit{{ $adv->id }}"
                                            title="{{ trans('users_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                            @if (auth()->user()->hasRole('super_admin'))
                                                <form action="{{ route('advs.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $adv->id }}">
                                                    <button type="button" class="btn btn-danger btn-sm given"
                                                        onclick="confirm('{{ __("هل انت متاكد من عملية الحذف ؟") }}') ? this.parentElement.submit() : ''" style="position:absolute; margin-right: 20px; margin-top:-26px;"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endif
                                    </td>
                                @endif
                            </tr>

                            <!-- edit_modal_user -->
                            <div class="modal fade" id="edit{{ $adv->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('تعديل الاعلان') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('advs.update', 'test') }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $adv->id }}">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name" class="mr-sm-2 space_top">{{ trans('العنوان') }} :</label>
                                                        <input id="name" type="text" name="name" class="form-control" value="{{ $adv->name }}" required autocomplete="name" autofocus>
                                                    </div>

                                                    <div class="col-md-12  make-space">
                                                        <label for="word"
                                                            class="mr-sm-2">{{ __('نص العنوان') }}
                                                            : <span style="color: red"> * </span> </label>
                                                        <textarea class="form-control" name="word" rows="5">{{ $adv->word }}</textarea>
                                                        @error('word')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>

                                                    <div class="col-md-12  make-space">
                                                        <label class="mr-sm-2" for="country">{{__('بلد العرض') }} : </label>
                                                        <select name="country" required class="form-control custom-select selectpicker">
                                                                <option value="كل الدول"                   <?php if($adv->country == "كل الدول") echo "selected"; ?>  >كل الدول</option>
                                                                <option value="آروبا"                   <?php if($adv->country == "آروبا") echo "selected"; ?>  >آروبا</option>                                                                <option value="أذربيجان"                    <?php if($adv->country == "أذربيجان") echo "selected"; ?>  >أذربيجان</option>
                                                                <option value="أرمينيا"                     <?php if($adv->country == "أرمينيا") echo "selected"; ?>  >أرمينيا</option>
                                                                <option value="أسبانيا"                     <?php if($adv->country == "أسبانيا") echo "selected"; ?>  >أسبانيا</option>
                                                                <option value="أستراليا"                    <?php if($adv->country == "أستراليا") echo "selected"; ?>  >أستراليا</option>
                                                                <option value="أفغانستان"                   <?php if($adv->country == "أفغانستان") echo "selected"; ?>  >أفغانستان</option>
                                                                <option value="ألبانيا"                     <?php if($adv->country == "ألبانيا") echo "selected"; ?>  >ألبانيا</option>
                                                                <option value="ألمانيا"                     <?php if($adv->country == "ألمانيا") echo "selected"; ?>  >ألمانيا</option>
                                                                <option value="أنتيجوا وبربودا"            <?php if($adv->country == "أنتيجوا وبربودا") echo "selected"; ?>  >أنتيجوا وبربودا</option>
                                                                <option value="أنجولا"                      <?php if($adv->country == "أنجولا") echo "selected"; ?>  >أنجولا</option>
                                                                <option value="أنجويلا"                     <?php if($adv->country == "أنجويلا") echo "selected"; ?>  >أنجويلا</option>
                                                                <option value="أندورا"                      <?php if($adv->country == "أندورا") echo "selected"; ?>  >أندورا</option>
                                                                <option value="أورجواي"                     <?php if($adv->country == "أورجواي") echo "selected"; ?>  >أورجواي</option>
                                                                <option value="أوزبكستان"                   <?php if($adv->country == "أوزبكستان") echo "selected"; ?>  >أوزبكستان</option>
                                                                <option value="أوغندا"                      <?php if($adv->country == "أوغندا") echo "selected"; ?>  >أوغندا</option>
                                                                <option value="أوكرانيا"                    <?php if($adv->country == "أوكرانيا") echo "selected"; ?>  >أوكرانيا</option>
                                                                <option value="أيرلندا"                     <?php if($adv->country == "أيرلندا") echo "selected"; ?>  >أيرلندا</option>
                                                                <option value="أيسلندا"                     <?php if($adv->country == "أيسلندا") echo "selected"; ?>  >أيسلندا</option>
                                                                <option value="اثيوبيا"                     <?php if($adv->country == "اثيوبيا") echo "selected"; ?>  >اثيوبيا</option>
                                                                <option value="اريتريا"                     <?php if($adv->country == "اريتريا") echo "selected"; ?>  >اريتريا</option>
                                                                <option value="استونيا"                     <?php if($adv->country == "استونيا") echo "selected"; ?>  >استونيا</option>
                                                                <option value="الأرجنتين"                   <?php if($adv->country == "الأرجنتين") echo "selected"; ?>  >الأرجنتين</option>
                                                                <option value="الأردن"                      <?php if($adv->country == "الأردن") echo "selected"; ?>  >الأردن</option>
                                                                <option value="الاكوادور"                   <?php if($adv->country == "الاكوادور") echo "selected"; ?>  >الاكوادور</option>
                                                                <option value="الامارات العربية المتحدة"                    <?php if($adv->country == "الامارات العربية المتحدة") echo "selected"; ?>  >الامارات العربية المتحدة</option>
                                                                <option value="الباهاما"                    <?php if($adv->country == "الباهاما") echo "selected"; ?>  >الباهاما</option>
                                                                <option value="البحرين"                     <?php if($adv->country == "البحرين") echo "selected"; ?>  >البحرين</option>
                                                                <option value="البرازيل"                    <?php if($adv->country == "البرازيل") echo "selected"; ?>  >البرازيل</option>
                                                                <option value="البرتغال"                    <?php if($adv->country == "البرتغال") echo "selected"; ?>  >البرتغال</option>
                                                                <option value="البوسنة والهرسك"                     <?php if($adv->country == "البوسنة والهرسك") echo "selected"; ?>  >البوسنة والهرسك</option>
                                                                <option value="الجابون"                     <?php if($adv->country == "الجابون") echo "selected"; ?>  >الجابون</option>
                                                                <option value="الجبل الأسود"                    <?php if($adv->country == "الجبل الأسود") echo "selected"; ?>  >الجبل الأسود</option>
                                                                <option value="الجزائر"                     <?php if($adv->country == "الجزائر") echo "selected"; ?>  >الجزائر</option>
                                                                <option value="الدانمرك"                    <?php if($adv->country == "الدانمرك") echo "selected"; ?>  >الدانمرك</option>
                                                                <option value="الرأس الأخضر"                    <?php if($adv->country == "الرأس الأخضر") echo "selected"; ?>  >الرأس الأخضر</option>
                                                                <option value="السلفادور"                   <?php if($adv->country == "السلفادور") echo "selected"; ?>  >السلفادور</option>
                                                                <option value="السنغال"                     <?php if($adv->country == "السنغال") echo "selected"; ?>  >السنغال</option>
                                                                <option value="السودان"                     <?php if($adv->country == "السودان") echo "selected"; ?>  >السودان</option>
                                                                <option value="السويد"                      <?php if($adv->country == "السويد") echo "selected"; ?>  >السويد</option>
                                                                <option value="الصحراء الغربية"                     <?php if($adv->country == "الصحراء الغربية") echo "selected"; ?>  >الصحراء الغربية</option>
                                                                <option value="الصومال"                     <?php if($adv->country == "الصومال") echo "selected"; ?>  >الصومال</option>
                                                                <option value="الصين"                   <?php if($adv->country == "الصين") echo "selected"; ?>  >الصين</option>
                                                                <option value="العراق"                      <?php if($adv->country == "العراق") echo "selected"; ?>  >العراق</option>
                                                                <option value="الفاتيكان"                   <?php if($adv->country == "الفاتيكان") echo "selected"; ?>  >الفاتيكان</option>
                                                                <option value="الفيلبين"                    <?php if($adv->country == "الفيلبين") echo "selected"; ?>  >الفيلبين</option>
                                                                <option value="القطب الجنوبي"                   <?php if($adv->country == "القطب الجنوبي") echo "selected"; ?>  >القطب الجنوبي</option>
                                                                <option value="الكاميرون"                   <?php if($adv->country == "الكاميرون") echo "selected"; ?>  >الكاميرون</option>
                                                                <option value="الكونغو - برازافيل"                      <?php if($adv->country == "الكونغو - برازافيل") echo "selected"; ?>  >الكونغو - برازافيل</option>
                                                                <option value="الكويت"                      <?php if($adv->country == "الكويت") echo "selected"; ?>  >الكويت</option>
                                                                <option value="المجر"                   <?php if($adv->country == "المجر") echo "selected"; ?>  >المجر</option>
                                                                <option value="المحيط الهندي البريطاني"                     <?php if($adv->country == "المحيط الهندي البريطاني") echo "selected"; ?>  >المحيط الهندي البريطاني</option>
                                                                <option value="المغرب"                      <?php if($adv->country == "المغرب") echo "selected"; ?>  >المغرب</option>
                                                                <option value="المقاطعات الجنوبية الفرنسية"                     <?php if($adv->country == "المقاطعات الجنوبية الفرنسية") echo "selected"; ?>  >المقاطعات الجنوبية الفرنسية</option>
                                                                <option value="المكسيك"                     <?php if($adv->country == "المكسيك") echo "selected"; ?>  >المكسيك</option>
                                                                <option value="المملكة العربية السعودية"                    <?php if($adv->country == "المملكة العربية السعودية") echo "selected"; ?>  >المملكة العربية السعودية</option>
                                                                <option value="المملكة المتحدة"                     <?php if($adv->country == "المملكة المتحدة") echo "selected"; ?>  >المملكة المتحدة</option>
                                                                <option value="النرويج"                     <?php if($adv->country == "النرويج") echo "selected"; ?>  >النرويج</option>
                                                                <option value="النمسا"                      <?php if($adv->country == "النمسا") echo "selected"; ?>  >النمسا</option>
                                                                <option value="النيجر"                      <?php if($adv->country == "النيجر") echo "selected"; ?>  >النيجر</option>
                                                                <option value="الهند"                   <?php if($adv->country == "الهند") echo "selected"; ?>  >الهند</option>
                                                                <option value="الولايات المتحدة الأمريكية"                      <?php if($adv->country == "الولايات المتحدة الأمريكية") echo "selected"; ?>  >الولايات المتحدة الأمريكية</option>
                                                                <option value="اليابان"                     <?php if($adv->country == "اليابان") echo "selected"; ?>  >اليابان</option>
                                                                <option value="اليمن"                   <?php if($adv->country == "اليمن") echo "selected"; ?>  >اليمن</option>
                                                                <option value="اليونان"                     <?php if($adv->country == "اليونان") echo "selected"; ?>  >اليونان</option>
                                                                <option value="اندونيسيا"                   <?php if($adv->country == "اندونيسيا") echo "selected"; ?>  >اندونيسيا</option>
                                                                <option value="ايران"                   <?php if($adv->country == "ايران") echo "selected"; ?>  >ايران</option>
                                                                <option value="ايطاليا"                     <?php if($adv->country == "ايطاليا") echo "selected"; ?>  >ايطاليا</option>
                                                                <option value="بابوا غينيا الجديدة"                     <?php if($adv->country == "بابوا غينيا الجديدة") echo "selected"; ?>  >بابوا غينيا الجديدة</option>
                                                                <option value="باراجواي"                    <?php if($adv->country == "باراجواي") echo "selected"; ?>  >باراجواي</option>
                                                                <option value="باكستان"                     <?php if($adv->country == "باكستان") echo "selected"; ?>  >باكستان</option>
                                                                <option value="بالاو"                   <?php if($adv->country == "بالاو") echo "selected"; ?>  >بالاو</option>
                                                                <option value="بتسوانا"                     <?php if($adv->country == "بتسوانا") echo "selected"; ?>  >بتسوانا</option>
                                                                <option value="بتكايرن"                     <?php if($adv->country == "بتكايرن") echo "selected"; ?>  >بتكايرن</option>
                                                                <option value="بربادوس"                     <?php if($adv->country == "بربادوس") echo "selected"; ?>  >بربادوس</option>
                                                                <option value="برمودا"                      <?php if($adv->country == "برمودا") echo "selected"; ?>  >برمودا</option>
                                                                <option value="بروناي"                      <?php if($adv->country == "بروناي") echo "selected"; ?>  >بروناي</option>
                                                                <option value="بلجيكا"                      <?php if($adv->country == "بلجيكا") echo "selected"; ?>  >بلجيكا</option>
                                                                <option value="بلغاريا"                     <?php if($adv->country == "بلغاريا") echo "selected"; ?>  >بلغاريا</option>
                                                                <option value="بليز"                    <?php if($adv->country == "بليز") echo "selected"; ?>  >بليز</option>
                                                                <option value="بنجلاديش"                    <?php if($adv->country == "بنجلاديش") echo "selected"; ?>  >بنجلاديش</option>
                                                                <option value="بنما"                    <?php if($adv->country == "بنما") echo "selected"; ?>  >بنما</option>
                                                                <option value="بنين"                    <?php if($adv->country == "بنين") echo "selected"; ?>  >بنين</option>
                                                                <option value="بوتان"                   <?php if($adv->country == "بوتان") echo "selected"; ?>  >بوتان</option>
                                                                <option value="بورتوريكو"                   <?php if($adv->country == "بورتوريكو") echo "selected"; ?>  >بورتوريكو</option>
                                                                <option value="بوركينا فاسو"                    <?php if($adv->country == "بوركينا فاسو") echo "selected"; ?>  >بوركينا فاسو</option>
                                                                <option value="بوروندي"                     <?php if($adv->country == "بوروندي") echo "selected"; ?>  >بوروندي</option>
                                                                <option value="بولندا"                      <?php if($adv->country == "بولندا") echo "selected"; ?>  >بولندا</option>
                                                                <option value="بوليفيا"                     <?php if($adv->country == "بوليفيا") echo "selected"; ?>  >بوليفيا</option>
                                                                <option value="بولينيزيا الفرنسية"                      <?php if($adv->country == "بولينيزيا الفرنسية") echo "selected"; ?>  >بولينيزيا الفرنسية</option>
                                                                <option value="بيرو"                    <?php if($adv->country == "بيرو") echo "selected"; ?>  >بيرو</option>
                                                                <option value="تانزانيا"                    <?php if($adv->country == "تانزانيا") echo "selected"; ?>  >تانزانيا</option>
                                                                <option value="تايلند"                      <?php if($adv->country == "تايلند") echo "selected"; ?>  >تايلند</option>
                                                                <option value="تايوان"                      <?php if($adv->country == "تايوان") echo "selected"; ?>  >تايوان</option>
                                                                <option value="تركمانستان"                      <?php if($adv->country == "تركمانستان") echo "selected"; ?>  >تركمانستان</option>
                                                                <option value="تركيا"                   <?php if($adv->country == "تركيا") echo "selected"; ?>  >تركيا</option>
                                                                <option value="ترينيداد وتوباغو"                    <?php if($adv->country == "ترينيداد وتوباغو") echo "selected"; ?>  >ترينيداد وتوباغو</option>
                                                                <option value="تشاد"                    <?php if($adv->country == "تشاد") echo "selected"; ?>  >تشاد</option>
                                                                <option value="توجو"                    <?php if($adv->country == "توجو") echo "selected"; ?>  >توجو</option>
                                                                <option value="توفالو"                      <?php if($adv->country == "توفالو") echo "selected"; ?>  >توفالو</option>
                                                                <option value="توكيلو"                      <?php if($adv->country == "توكيلو") echo "selected"; ?>  >توكيلو</option>
                                                                <option value="تونجا"                   <?php if($adv->country == "تونجا") echo "selected"; ?>  >تونجا</option>
                                                                <option value="تونس"                    <?php if($adv->country == "تونس") echo "selected"; ?>  >تونس</option>
                                                                <option value="تيمور الشرقية"                   <?php if($adv->country == "تيمور الشرقية") echo "selected"; ?>  >تيمور الشرقية</option>
                                                                <option value="جامايكا"                     <?php if($adv->country == "جامايكا") echo "selected"; ?>  >جامايكا</option>
                                                                <option value="جبل"                     <?php if($adv->country == "جبل") echo "selected"; ?>  >جبل طارق</option>
                                                                <option value="جرينادا"                     <?php if($adv->country == "جرينادا") echo "selected"; ?>  >جرينادا</option>
                                                                <option value="جرينلاند"                    <?php if($adv->country == "جرينلاند") echo "selected"; ?>  >جرينلاند</option>
                                                                <option value="جزر أولان"                   <?php if($adv->country == "جزر") echo "selected"; ?>  >جزر أولان</option>
                                                                <option value="جزر الأنتيل الهولندية"                   <?php if($adv->country == "جزر الأنتيل الهولندية") echo "selected"; ?>  >جزر الأنتيل الهولندية</option>
                                                                <option value="جزر الترك وجايكوس"                   <?php if($adv->country == "جزر الترك وجايكوس") echo "selected"; ?>  >جزر الترك وجايكوس</option>
                                                                <option value="جزر القمر"                   <?php if($adv->country == "جزر القمر") echo "selected"; ?>  >جزر القمر</option>
                                                                <option value="جزر الكايمن"                     <?php if($adv->country == "جزر الكايمن") echo "selected"; ?>  >جزر الكايمن</option>
                                                                <option value="جزر المارشال"                    <?php if($adv->country == "جزر المارشال") echo "selected"; ?>  >جزر المارشال</option>
                                                                <option value="جزر الملديف"                     <?php if($adv->country == "جزر الملديف") echo "selected"; ?>  >جزر الملديف</option>
                                                                <option value="جزر الولايات المتحدة البعيدة الصغيرة"                    <?php if($adv->country == "جزر الولايات المتحدة البعيدة الصغيرة") echo "selected"; ?>  >جزر الولايات المتحدة البعيدة الصغيرة</option>
                                                                <option value="جزر سليمان"                      <?php if($adv->country == "جزر سليمان") echo "selected"; ?>  >جزر سليمان</option>
                                                                <option value="جزر فارو"                    <?php if($adv->country == "جزر فارو") echo "selected"; ?>  >جزر فارو</option>
                                                                <option value="جزر فرجين الأمريكية"                     <?php if($adv->country == "جزر فرجين الأمريكية") echo "selected"; ?>  >جزر فرجين الأمريكية</option>
                                                                <option value="جزر فرجين البريطانية"                    <?php if($adv->country == "جزر فرجين البريطانية") echo "selected"; ?>  >جزر فرجين البريطانية</option>
                                                                <option value="جزر فوكلاند"                     <?php if($adv->country == "جزر فوكلاند") echo "selected"; ?>  >جزر فوكلاند</option>
                                                                <option value="جزر كوك"                     <?php if($adv->country == "جزر كوك") echo "selected"; ?>  >جزر كوك</option>
                                                                <option value="جزر كوكوس"                   <?php if($adv->country == "جزر كوكوس") echo "selected"; ?>  >جزر كوكوس</option>
                                                                <option value="جزر ماريانا الشمالية"                    <?php if($adv->country == "جزر ماريانا الشمالية") echo "selected"; ?>  >جزر ماريانا الشمالية</option>
                                                                <option value="جزر والس وفوتونا"                    <?php if($adv->country == "جزر والس وفوتونا") echo "selected"; ?>  >جزر والس وفوتونا</option>
                                                                <option value="جزيرة الكريسماس"                     <?php if($adv->country == "جزيرة الكريسماس") echo "selected"; ?>  >جزيرة الكريسماس</option>
                                                                <option value="جزيرة بوفيه"                     <?php if($adv->country == "جزيرة بوفيه") echo "selected"; ?>  >جزيرة بوفيه</option>
                                                                <option value="جزيرة مان"                   <?php if($adv->country == "جزيرة مان") echo "selected"; ?>  >جزيرة مان</option>
                                                                <option value="جزيرة نورفوك"                    <?php if($adv->country == "جزيرة نورفوك") echo "selected"; ?>  >جزيرة نورفوك</option>
                                                                <option value="جزيرة هيرد وماكدونالد"                   <?php if($adv->country == "جزيرة هيرد وماكدونالد") echo "selected"; ?>  >جزيرة هيرد وماكدونالد</option>
                                                                <option value="جمهورية افريقيا الوسطى"                      <?php if($adv->country == "جمهورية افريقيا الوسطى") echo "selected"; ?>  >جمهورية افريقيا الوسطى</option>
                                                                <option value="جمهورية التشيك"                      <?php if($adv->country == "جمهورية التشيك") echo "selected"; ?>  >جمهورية التشيك</option>
                                                                <option value="جمهورية الدومينيك"                   <?php if($adv->country == "جمهورية الدومينيك") echo "selected"; ?>  >جمهورية الدومينيك</option>
                                                                <option value="جمهورية الكونغو الديمقراطية"                     <?php if($adv->country == "جمهورية الكونغو الديمقراطية") echo "selected"; ?>  >جمهورية الكونغو الديمقراطية</option>
                                                                <option value="جمهورية جنوب افريقيا"                    <?php if($adv->country == "جمهورية جنوب افريقيا") echo "selected"; ?>  >جمهورية جنوب افريقيا</option>
                                                                <option value="جواتيمالا"                   <?php if($adv->country == "جواتيمالا") echo "selected"; ?>  >جواتيمالا</option>
                                                                <option value="جوادلوب"                     <?php if($adv->country == "جوادلوب") echo "selected"; ?>  >جوادلوب</option>
                                                                <option value="جوام"                    <?php if($adv->country == "جوام") echo "selected"; ?>  >جوام</option>
                                                                <option value="جورجيا"                      <?php if($adv->country == "جورجيا") echo "selected"; ?>  >جورجيا</option>
                                                                <option value="جورجيا الجنوبية وجزر ساندويتش الجنوبية"                      <?php if($adv->country == "جورجيا الجنوبية وجزر ساندويتش الجنوبية") echo "selected"; ?>  >جورجيا الجنوبية وجزر ساندويتش الجنوبية</option>
                                                                <option value="جيبوتي"                      <?php if($adv->country == "جيبوتي") echo "selected"; ?>  >جيبوتي</option>
                                                                <option value="جيرسي"                   <?php if($adv->country == "جيرسي") echo "selected"; ?>  >جيرسي</option>
                                                                <option value="دومينيكا"                    <?php if($adv->country == "دومينيكا") echo "selected"; ?>  >دومينيكا</option>
                                                                <option value="رواندا"                      <?php if($adv->country == "رواندا") echo "selected"; ?>  >رواندا</option>
                                                                <option value="روسيا"                   <?php if($adv->country == "روسيا") echo "selected"; ?>  >روسيا</option>
                                                                <option value="روسيا البيضاء"                   <?php if($adv->country == "روسيا البيضاء") echo "selected"; ?>  >روسيا البيضاء</option>
                                                                <option value="رومانيا"                     <?php if($adv->country == "رومانيا") echo "selected"; ?>  >رومانيا</option>
                                                                <option value="روينيون"                     <?php if($adv->country == "روينيون") echo "selected"; ?>  >روينيون</option>
                                                                <option value="زامبيا"                      <?php if($adv->country == "زامبيا") echo "selected"; ?>  >زامبيا</option>
                                                                <option value="زيمبابوي"                    <?php if($adv->country == "زيمبابوي") echo "selected"; ?>  >زيمبابوي</option>
                                                                <option value="ساحل العاج"                      <?php if($adv->country == "ساحل العاج") echo "selected"; ?>  >ساحل العاج</option>
                                                                <option value="ساموا"                   <?php if($adv->country == "ساموا") echo "selected"; ?>  >ساموا</option>
                                                                <option value="ساموا الأمريكية"                     <?php if($adv->country == "ساموا الأمريكية") echo "selected"; ?>  >ساموا الأمريكية</option>
                                                                <option value="سان مارينو"                      <?php if($adv->country == "سان مارينو") echo "selected"; ?>  >سان مارينو</option>
                                                                <option value="سانت بيير وميكولون"                      <?php if($adv->country == "سانت بيير وميكولون") echo "selected"; ?>  >سانت بيير وميكولون</option>
                                                                <option value="سانت فنسنت وغرنادين"                     <?php if($adv->country == "سانت فنسنت وغرنادين") echo "selected"; ?>  >سانت فنسنت وغرنادين</option>
                                                                <option value="سانت كيتس ونيفيس"                    <?php if($adv->country == "سانت كيتس ونيفيس") echo "selected"; ?>  >سانت كيتس ونيفيس</option>
                                                                <option value="سانت لوسيا"                      <?php if($adv->country == "سانت لوسيا") echo "selected"; ?>  >سانت لوسيا</option>
                                                                <option value="سانت مارتين"                     <?php if($adv->country == "سانت مارتين") echo "selected"; ?>  >سانت مارتين</option>
                                                                <option value="سانت هيلنا"                      <?php if($adv->country == "سانت هيلنا") echo "selected"; ?>  >سانت هيلنا</option>
                                                                <option value="ساو تومي وبرينسيبي"                      <?php if($adv->country == "ساو تومي وبرينسيبي") echo "selected"; ?>  >ساو تومي وبرينسيبي</option>
                                                                <option value="سريلانكا"                    <?php if($adv->country == "سريلانكا") echo "selected"; ?>  >سريلانكا</option>
                                                                <option value="سفالبارد وجان مايان"                     <?php if($adv->country == "سفالبارد وجان مايان") echo "selected"; ?>  >سفالبارد وجان مايان</option>
                                                                <option value="سلوفاكيا"                    <?php if($adv->country == "سلوفاكيا") echo "selected"; ?>  >سلوفاكيا</option>
                                                                <option value="سلوفينيا"                    <?php if($adv->country == "سلوفينيا") echo "selected"; ?>  >سلوفينيا</option>
                                                                <option value="سنغافورة"                    <?php if($adv->country == "سنغافورة") echo "selected"; ?>  >سنغافورة</option>
                                                                <option value="سوازيلاند"                   <?php if($adv->country == "سوازيلاند") echo "selected"; ?>  >سوازيلاند</option>
                                                                <option value="سوريا"                   <?php if($adv->country == "سوريا") echo "selected"; ?>  >سوريا</option>
                                                                <option value="سورينام"                     <?php if($adv->country == "سورينام") echo "selected"; ?>  >سورينام</option>
                                                                <option value="سويسرا"                      <?php if($adv->country == "سويسرا") echo "selected"; ?>  >سويسرا</option>
                                                                <option value="سيراليون"                    <?php if($adv->country == "سيراليون") echo "selected"; ?>  >سيراليون</option>
                                                                <option value="سيشل"                    <?php if($adv->country == "سيشل") echo "selected"; ?>  >سيشل</option>
                                                                <option value="شيلي"                    <?php if($adv->country == "شيلي") echo "selected"; ?>  >شيلي</option>
                                                                <option value="صربيا"                   <?php if($adv->country == "صربيا") echo "selected"; ?>  >صربيا</option>
                                                                <option value="صربيا والجبل الأسود"                     <?php if($adv->country == "صربيا والجبل الأسود") echo "selected"; ?>  >صربيا والجبل الأسود</option>
                                                                <option value="طاجكستان"                    <?php if($adv->country == "طاجكستان") echo "selected"; ?>  >طاجكستان</option>
                                                                <option value="عمان"                    <?php if($adv->country == "عمان") echo "selected"; ?>  >عمان</option>
                                                                <option value="غامبيا"                      <?php if($adv->country == "غامبيا") echo "selected"; ?>  >غامبيا</option>
                                                                <option value="غانا"                    <?php if($adv->country == "غانا") echo "selected"; ?>  >غانا</option>
                                                                <option value="غويانا"                      <?php if($adv->country == "غويانا") echo "selected"; ?>  >غويانا</option>
                                                                <option value="غيانا"                   <?php if($adv->country == "غيانا") echo "selected"; ?>  >غيانا</option>
                                                                <option value="غينيا"                   <?php if($adv->country == "غينيا") echo "selected"; ?>  >غينيا</option>
                                                                <option value="غينيا الاستوائية"                    <?php if($adv->country == "غينيا الاستوائية") echo "selected"; ?>  >غينيا الاستوائية</option>
                                                                <option value="غينيا بيساو"                     <?php if($adv->country == "غينيا بيساو") echo "selected"; ?>  >غينيا بيساو</option>
                                                                <option value="فانواتو"                     <?php if($adv->country == "فانواتو") echo "selected"; ?>  >فانواتو</option>
                                                                <option value="فرنسا"                   <?php if($adv->country == "فرنسا") echo "selected"; ?>  >فرنسا</option>
                                                                <option value="فلسطين"                      <?php if($adv->country == "فلسطين") echo "selected"; ?>  >فلسطين</option>
                                                                <option value="فنزويلا"                     <?php if($adv->country == "فنزويلا") echo "selected"; ?>  >فنزويلا</option>
                                                                <option value="فنلندا"                      <?php if($adv->country == "فنلندا") echo "selected"; ?>  >فنلندا</option>
                                                                <option value="فيتنام"                      <?php if($adv->country == "فيتنام") echo "selected"; ?>  >فيتنام</option>
                                                                <option value="فيجي"                    <?php if($adv->country == "فيجي") echo "selected"; ?>  >فيجي</option>
                                                                <option value="قبرص"                    <?php if($adv->country == "قبرص") echo "selected"; ?>  >قبرص</option>
                                                                <option value="قرغيزستان"                   <?php if($adv->country == "قرغيزستان") echo "selected"; ?>  >قرغيزستان</option>
                                                                <option value="قطر"                     <?php if($adv->country == "قطر") echo "selected"; ?>  >قطر</option>
                                                                <option value="كازاخستان"                   <?php if($adv->country == "كازاخستان") echo "selected"; ?>  >كازاخستان</option>
                                                                <option value="كاليدونيا الجديدة"                   <?php if($adv->country == "كاليدونيا الجديدة") echo "selected"; ?>  >كاليدونيا الجديدة</option>
                                                                <option value="كرواتيا"                     <?php if($adv->country == "كرواتيا") echo "selected"; ?>  >كرواتيا</option>
                                                                <option value="كمبوديا"                     <?php if($adv->country == "كمبوديا") echo "selected"; ?>  >كمبوديا</option>
                                                                <option value="كندا"                    <?php if($adv->country == "كندا") echo "selected"; ?>  >كندا</option>
                                                                <option value="كوبا"                    <?php if($adv->country == "كوبا") echo "selected"; ?>  >كوبا</option>
                                                                <option value="كوريا الجنوبية"                      <?php if($adv->country == "كوريا الجنوبية") echo "selected"; ?>  >كوريا الجنوبية</option>
                                                                <option value="كوريا الشمالية"                      <?php if($adv->country == "كوريا الشمالية") echo "selected"; ?>  >كوريا الشمالية</option>
                                                                <option value="كوستاريكا"                   <?php if($adv->country == "كوستاريكا") echo "selected"; ?>  >كوستاريكا</option>
                                                                <option value="كولومبيا"                    <?php if($adv->country == "كولومبيا") echo "selected"; ?>  >كولومبيا</option>
                                                                <option value="كيريباتي"                    <?php if($adv->country == "كيريباتي") echo "selected"; ?>  >كيريباتي</option>
                                                                <option value="كينيا"                   <?php if($adv->country == "كينيا") echo "selected"; ?>  >كينيا</option>
                                                                <option value="لاتفيا"                      <?php if($adv->country == "لاتفيا") echo "selected"; ?>  >لاتفيا</option>
                                                                <option value="لاوس"                    <?php if($adv->country == "لاوس") echo "selected"; ?>  >لاوس</option>
                                                                <option value="لبنان"                   <?php if($adv->country == "لبنان") echo "selected"; ?>  >لبنان</option>
                                                                <option value="لوكسمبورج"                   <?php if($adv->country == "لوكسمبورج") echo "selected"; ?>  >لوكسمبورج</option>
                                                                <option value="ليبيا"                   <?php if($adv->country == "ليبيا") echo "selected"; ?>  >ليبيا</option>
                                                                <option value="ليبيريا"                     <?php if($adv->country == "ليبيريا") echo "selected"; ?>  >ليبيريا</option>
                                                                <option value="ليتوانيا"                    <?php if($adv->country == "ليتوانيا") echo "selected"; ?>  >ليتوانيا</option>
                                                                <option value="ليختنشتاين"                      <?php if($adv->country == "ليختنشتاين") echo "selected"; ?>  >ليختنشتاين</option>
                                                                <option value="ليسوتو"                      <?php if($adv->country == "ليسوتو") echo "selected"; ?>  >ليسوتو</option>
                                                                <option value="مارتينيك"                    <?php if($adv->country == "مارتينيك") echo "selected"; ?>  >مارتينيك</option>
                                                                <option value="ماكاو الصينية"                   <?php if($adv->country == "ماكاو الصينية") echo "selected"; ?>  >ماكاو الصينية</option>
                                                                <option value="مالطا"                   <?php if($adv->country == "مالطا") echo "selected"; ?>  >مالطا</option>
                                                                <option value="مالي"                    <?php if($adv->country == "مالي") echo "selected"; ?>  >مالي</option>
                                                                <option value="ماليزيا"                     <?php if($adv->country == "ماليزيا") echo "selected"; ?>  >ماليزيا</option>
                                                                <option value="مايوت"                   <?php if($adv->country == "مايوت") echo "selected"; ?>  >مايوت</option>
                                                                <option value="مدغشقر"                      <?php if($adv->country == "مدغشقر") echo "selected"; ?>  >مدغشقر</option>
                                                                <option value="مصر"                     <?php if($adv->country == "مصر") echo "selected"; ?>  >مصر</option>
                                                                <option value="مقدونيا"                     <?php if($adv->country == "مقدونيا") echo "selected"; ?>  >مقدونيا</option>
                                                                <option value="ملاوي"                   <?php if($adv->country == "ملاوي") echo "selected"; ?>  >ملاوي</option>
                                                                <option value="منغوليا"                     <?php if($adv->country == "منغوليا") echo "selected"; ?>  >منغوليا</option>
                                                                <option value="موريتانيا"                   <?php if($adv->country == "موريتانيا") echo "selected"; ?>  >موريتانيا</option>
                                                                <option value="موريشيوس"                    <?php if($adv->country == "موريشيوس") echo "selected"; ?>  >موريشيوس</option>
                                                                <option value="موزمبيق"                     <?php if($adv->country == "موزمبيق") echo "selected"; ?>  >موزمبيق</option>
                                                                <option value="مولدافيا"                    <?php if($adv->country == "مولدافيا") echo "selected"; ?>  >مولدافيا</option>
                                                                <option value="موناكو"                      <?php if($adv->country == "موناكو") echo "selected"; ?>  >موناكو</option>
                                                                <option value="مونتسرات"                    <?php if($adv->country == "مونتسرات") echo "selected"; ?>  >مونتسرات</option>
                                                                <option value="ميانمار"                     <?php if($adv->country == "ميانمار") echo "selected"; ?>  >ميانمار</option>
                                                                <option value="ميكرونيزيا"                      <?php if($adv->country == "ميكرونيزيا") echo "selected"; ?>  >ميكرونيزيا</option>
                                                                <option value="ناميبيا"                     <?php if($adv->country == "ناميبيا") echo "selected"; ?>  >ناميبيا</option>
                                                                <option value="نورو"                    <?php if($adv->country == "نورو") echo "selected"; ?>  >نورو</option>
                                                                <option value="نيبال"                   <?php if($adv->country == "نيبال") echo "selected"; ?>  >نيبال</option>
                                                                <option value="نيجيريا"                     <?php if($adv->country == "نيجيريا") echo "selected"; ?>  >نيجيريا</option>
                                                                <option value="نيكاراجوا"                   <?php if($adv->country == "نيكاراجوا") echo "selected"; ?>  >نيكاراجوا</option>
                                                                <option value="نيوزيلاندا"                      <?php if($adv->country == "نيوزيلاندا") echo "selected"; ?>  >نيوزيلاندا</option>
                                                                <option value="نيوي"                    <?php if($adv->country == "نيوي") echo "selected"; ?>  >نيوي</option>
                                                                <option value="هايتي"                   <?php if($adv->country == "هايتي") echo "selected"; ?>  >هايتي</option>
                                                                <option value="هندوراس"                     <?php if($adv->country == "هندوراس") echo "selected"; ?>  >هندوراس</option>
                                                                <option value="هولندا"                      <?php if($adv->country == "هولندا") echo "selected"; ?>  >هولندا</option>
                                                                <option value="هونج كونج الصينية"                   <?php if($adv->country == "هونج كونج الصينية") echo "selected"; ?>  >هونج كونج الصينية</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-12  make-space">
                                                        <label for="image" class="mr-sm-2">{{__('الصورة الخاصة بالاعلان') }} : </label>
                                                        <input type="file" class="form-control" name="image">
                                                        @if ($errors->has('image'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('image') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    {{-- <div class="col-md-12">
                                                        <label for="link" class="mr-sm-2 space_top">{{ trans('الرابط') }} :</label>
                                                        <input id="link" type="text" name="link" class="form-control" value="{{ $adv->link }}" required autocomplete="link" autofocus>
                                                    </div> --}}
                                                    <br><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('users_trans.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ trans('users_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Make_contact_Visible -->
                            <div class="modal fade" id="vis_contact{{ $adv->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{__('عرض / اخفاء بالصفحة الرئيسية') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('advs/visible', 'test') }}" method="post">
                                                {{ method_field('post') }}
                                                @csrf
                                                    @if  ($adv->status == '1')
                                                        {{__('هـل أنـت مـتـأكـد مـن هـذه الـعـمـلـبـة')}}
                                                    @elseif ($adv->status == '0')
                                                        {{__('هـل أنـت مـتـأكـد مـن هـذه الـعـمـلـبـة')}}
                                                    @endif
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $adv->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{__('اغــلاق')}}</button>
                                                    <button type="submit"
                                                        class="btn btn-info">{{__('حفظ البيانات') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('اضافة اعلان جديدة') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('advs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="mr-sm-2 space_top">{{ trans('عنوان') }} :</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="col-md-12  make-space">
                            <label for="word"
                                class="mr-sm-2">{{ __('نص الاعلان') }}
                                : <span style="color: red"> * </span> </label>
                            <textarea class="form-control" name="word" rows="5"></textarea>
                            @error('word')<span
                                class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12  make-space">
                            <label class="mr-sm-2" for="country">{{__('مكان العرض') }} : </label>
                            <select name="country" required class="form-control custom-select selectpicker">
                                <option value="كل الدول">كل الدول</option>
                                <option value="آروبا">آروبا</option>
                                <option value="أذربيجان">أذربيجان</option>
                                <option value="أرمينيا">أرمينيا</option>
                                <option value="أسبانيا">أسبانيا</option>
                                <option value="أستراليا">أستراليا</option>
                                <option value="أفغانستان">أفغانستان</option>
                                <option value="ألبانيا">ألبانيا</option>
                                <option value="ألمانيا">ألمانيا</option>
                                <option value="أنتيجوا وبربودا">أنتيجوا وبربودا</option>
                                <option value="أنجولا">أنجولا</option>
                                <option value="أنجويلا">أنجويلا</option>
                                <option value="أندورا">أندورا</option>
                                <option value="أورجواي">أورجواي</option>
                                <option value="أوزبكستان">أوزبكستان</option>
                                <option value="أوغندا">أوغندا</option>
                                <option value="أوكرانيا">أوكرانيا</option>
                                <option value="أيرلندا">أيرلندا</option>
                                <option value="أيسلندا">أيسلندا</option>
                                <option value="اثيوبيا">اثيوبيا</option>
                                <option value="اريتريا">اريتريا</option>
                                <option value="استونيا">استونيا</option>
                                <option value="الأرجنتين">الأرجنتين</option>
                                <option value="الأردن">الأردن</option>
                                <option value="الاكوادور">الاكوادور</option>
                                <option value="الامارات العربية المتحدة">الامارات العربية المتحدة</option>
                                <option value="الباهاما">الباهاما</option>
                                <option value="البحرين">البحرين</option>
                                <option value="البرازيل">البرازيل</option>
                                <option value="البرتغال">البرتغال</option>
                                <option value="البوسنة والهرسك">البوسنة والهرسك</option>
                                <option value="الجابون">الجابون</option>
                                <option value="الجبل الأسود">الجبل الأسود</option>
                                <option value="الجزائر">الجزائر</option>
                                <option value="الدانمرك">الدانمرك</option>
                                <option value="الرأس الأخضر">الرأس الأخضر</option>
                                <option value="السلفادور">السلفادور</option>
                                <option value="السنغال">السنغال</option>
                                <option value="السودان">السودان</option>
                                <option value="السويد">السويد</option>
                                <option value="الصحراء الغربية">الصحراء الغربية</option>
                                <option value="الصومال">الصومال</option>
                                <option value="الصين">الصين</option>
                                <option value="العراق">العراق</option>
                                <option value="الفاتيكان">الفاتيكان</option>
                                <option value="الفيلبين">الفيلبين</option>
                                <option value="القطب الجنوبي">القطب الجنوبي</option>
                                <option value="الكاميرون">الكاميرون</option>
                                <option value="الكونغو - برازافيل">الكونغو - برازافيل</option>
                                <option value="الكويت">الكويت</option>
                                <option value="المجر">المجر</option>
                                <option value="المحيط الهندي البريطاني">المحيط الهندي البريطاني</option>
                                <option value="المغرب">المغرب</option>
                                <option value="المقاطعات الجنوبية الفرنسية">المقاطعات الجنوبية الفرنسية</option>
                                <option value="المكسيك">المكسيك</option>
                                <option value="المملكة العربية السعودية">المملكة العربية السعودية</option>
                                <option value="المملكة المتحدة">المملكة المتحدة</option>
                                <option value="النرويج">النرويج</option>
                                <option value="النمسا">النمسا</option>
                                <option value="النيجر">النيجر</option>
                                <option value="الهند">الهند</option>
                                <option value="الولايات المتحدة الأمريكية">الولايات المتحدة الأمريكية</option>
                                <option value="اليابان">اليابان</option>
                                <option value="اليمن">اليمن</option>
                                <option value="اليونان">اليونان</option>
                                <option value="اندونيسيا">اندونيسيا</option>
                                <option value="ايران">ايران</option>
                                <option value="ايطاليا">ايطاليا</option>
                                <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                                <option value="باراجواي">باراجواي</option>
                                <option value="باكستان">باكستان</option>
                                <option value="بالاو">بالاو</option>
                                <option value="بتسوانا">بتسوانا</option>
                                <option value="بتكايرن">بتكايرن</option>
                                <option value="بربادوس">بربادوس</option>
                                <option value="برمودا">برمودا</option>
                                <option value="بروناي">بروناي</option>
                                <option value="بلجيكا">بلجيكا</option>
                                <option value="بلغاريا">بلغاريا</option>
                                <option value="بليز">بليز</option>
                                <option value="بنجلاديش">بنجلاديش</option>
                                <option value="بنما">بنما</option>
                                <option value="بنين">بنين</option>
                                <option value="بوتان">بوتان</option>
                                <option value="بورتوريكو">بورتوريكو</option>
                                <option value="بوركينا فاسو">بوركينا فاسو</option>
                                <option value="بوروندي">بوروندي</option>
                                <option value="بولندا">بولندا</option>
                                <option value="بوليفيا">بوليفيا</option>
                                <option value="بولينيزيا الفرنسية">بولينيزيا الفرنسية</option>
                                <option value="بيرو">بيرو</option>
                                <option value="تانزانيا">تانزانيا</option>
                                <option value="تايلند">تايلند</option>
                                <option value="تايوان">تايوان</option>
                                <option value="تركمانستان">تركمانستان</option>
                                <option value="تركيا">تركيا</option>
                                <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                                <option value="تشاد">تشاد</option>
                                <option value="توجو">توجو</option>
                                <option value="توفالو">توفالو</option>
                                <option value="توكيلو">توكيلو</option>
                                <option value="تونجا">تونجا</option>
                                <option value="تونس">تونس</option>
                                <option value="تيمور الشرقية">تيمور الشرقية</option>
                                <option value="جامايكا">جامايكا</option>
                                <option value="جبل">جبل طارق</option>
                                <option value="جرينادا">جرينادا</option>
                                <option value="جرينلاند">جرينلاند</option>
                                <option value="جزر أولان">جزر أولان</option>
                                <option value="جزر الأنتيل الهولندية">جزر الأنتيل الهولندية</option>
                                <option value="جزر الترك وجايكوس">جزر الترك وجايكوس</option>
                                <option value="جزر القمر">جزر القمر</option>
                                <option value="جزر الكايمن">جزر الكايمن</option>
                                <option value="جزر المارشال">جزر المارشال</option>
                                <option value="جزر الملديف">جزر الملديف</option>
                                <option value="جزر الولايات المتحدة البعيدة الصغيرة">جزر الولايات المتحدة البعيدة الصغيرة</option>
                                <option value="جزر سليمان">جزر سليمان</option>
                                <option value="جزر فارو">جزر فارو</option>
                                <option value="جزر فرجين الأمريكية">جزر فرجين الأمريكية</option>
                                <option value="جزر فرجين البريطانية">جزر فرجين البريطانية</option>
                                <option value="جزر فوكلاند">جزر فوكلاند</option>
                                <option value="جزر كوك">جزر كوك</option>
                                <option value="جزر كوكوس">جزر كوكوس</option>
                                <option value="جزر ماريانا الشمالية">جزر ماريانا الشمالية</option>
                                <option value="جزر والس وفوتونا">جزر والس وفوتونا</option>
                                <option value="جزيرة الكريسماس">جزيرة الكريسماس</option>
                                <option value="جزيرة بوفيه">جزيرة بوفيه</option>
                                <option value="جزيرة مان">جزيرة مان</option>
                                <option value="جزيرة نورفوك">جزيرة نورفوك</option>
                                <option value="جزيرة هيرد وماكدونالد">جزيرة هيرد وماكدونالد</option>
                                <option value="جمهورية افريقيا الوسطى">جمهورية افريقيا الوسطى</option>
                                <option value="جمهورية التشيك">جمهورية التشيك</option>
                                <option value="جمهورية الدومينيك">جمهورية الدومينيك</option>
                                <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                                <option value="جمهورية جنوب افريقيا">جمهورية جنوب افريقيا</option>
                                <option value="جواتيمالا">جواتيمالا</option>
                                <option value="جوادلوب">جوادلوب</option>
                                <option value="جوام">جوام</option>
                                <option value="جورجيا">جورجيا</option>
                                <option value="جورجيا الجنوبية وجزر ساندويتش الجنوبية">جورجيا الجنوبية وجزر ساندويتش الجنوبية</option>
                                <option value="جيبوتي">جيبوتي</option>
                                <option value="جيرسي">جيرسي</option>
                                <option value="دومينيكا">دومينيكا</option>
                                <option value="رواندا">رواندا</option>
                                <option value="روسيا">روسيا</option>
                                <option value="روسيا البيضاء">روسيا البيضاء</option>
                                <option value="رومانيا">رومانيا</option>
                                <option value="روينيون">روينيون</option>
                                <option value="زامبيا">زامبيا</option>
                                <option value="زيمبابوي">زيمبابوي</option>
                                <option value="ساحل العاج">ساحل العاج</option>
                                <option value="ساموا">ساموا</option>
                                <option value="ساموا الأمريكية">ساموا الأمريكية</option>
                                <option value="سان مارينو">سان مارينو</option>
                                <option value="سانت بيير وميكولون">سانت بيير وميكولون</option>
                                <option value="سانت فنسنت وغرنادين">سانت فنسنت وغرنادين</option>
                                <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                                <option value="سانت لوسيا">سانت لوسيا</option>
                                <option value="سانت مارتين">سانت مارتين</option>
                                <option value="سانت هيلنا">سانت هيلنا</option>
                                <option value="ساو تومي وبرينسيبي">ساو تومي وبرينسيبي</option>
                                <option value="سريلانكا">سريلانكا</option>
                                <option value="سفالبارد وجان مايان">سفالبارد وجان مايان</option>
                                <option value="سلوفاكيا">سلوفاكيا</option>
                                <option value="سلوفينيا">سلوفينيا</option>
                                <option value="سنغافورة">سنغافورة</option>
                                <option value="سوازيلاند">سوازيلاند</option>
                                <option value="سوريا">سوريا</option>
                                <option value="سورينام">سورينام</option>
                                <option value="سويسرا">سويسرا</option>
                                <option value="سيراليون">سيراليون</option>
                                <option value="سيشل">سيشل</option>
                                <option value="شيلي">شيلي</option>
                                <option value="صربيا">صربيا</option>
                                <option value="صربيا والجبل الأسود">صربيا والجبل الأسود</option>
                                <option value="طاجكستان">طاجكستان</option>
                                <option value="عمان">عمان</option>
                                <option value="غامبيا">غامبيا</option>
                                <option value="غانا">غانا</option>
                                <option value="غويانا">غويانا</option>
                                <option value="غيانا">غيانا</option>
                                <option value="غينيا">غينيا</option>
                                <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                                <option value="غينيا بيساو">غينيا بيساو</option>
                                <option value="فانواتو">فانواتو</option>
                                <option value="فرنسا">فرنسا</option>
                                <option value="فلسطين">فلسطين</option>
                                <option value="فنزويلا">فنزويلا</option>
                                <option value="فنلندا">فنلندا</option>
                                <option value="فيتنام">فيتنام</option>
                                <option value="فيجي">فيجي</option>
                                <option value="قبرص">قبرص</option>
                                <option value="قرغيزستان">قرغيزستان</option>
                                <option value="قطر">قطر</option>
                                <option value="كازاخستان">كازاخستان</option>
                                <option value="كاليدونيا الجديدة">كاليدونيا الجديدة</option>
                                <option value="كرواتيا">كرواتيا</option>
                                <option value="كمبوديا">كمبوديا</option>
                                <option value="كندا">كندا</option>
                                <option value="كوبا">كوبا</option>
                                <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                                <option value="كوريا الشمالية">كوريا الشمالية</option>
                                <option value="كوستاريكا">كوستاريكا</option>
                                <option value="كولومبيا">كولومبيا</option>
                                <option value="كيريباتي">كيريباتي</option>
                                <option value="كينيا">كينيا</option>
                                <option value="لاتفيا">لاتفيا</option>
                                <option value="لاوس">لاوس</option>
                                <option value="لبنان">لبنان</option>
                                <option value="لوكسمبورج">لوكسمبورج</option>
                                <option value="ليبيا">ليبيا</option>
                                <option value="ليبيريا">ليبيريا</option>
                                <option value="ليتوانيا">ليتوانيا</option>
                                <option value="ليختنشتاين">ليختنشتاين</option>
                                <option value="ليسوتو">ليسوتو</option>
                                <option value="مارتينيك">مارتينيك</option>
                                <option value="ماكاو الصينية">ماكاو الصينية</option>
                                <option value="مالطا">مالطا</option>
                                <option value="مالي">مالي</option>
                                <option value="ماليزيا">ماليزيا</option>
                                <option value="مايوت">مايوت</option>
                                <option value="مدغشقر">مدغشقر</option>
                                <option value="مصر">مصر</option>
                                <option value="مقدونيا">مقدونيا</option>
                                <option value="ملاوي">ملاوي</option>
                                <option value="منغوليا">منغوليا</option>
                                <option value="موريتانيا">موريتانيا</option>
                                <option value="موريشيوس">موريشيوس</option>
                                <option value="موزمبيق">موزمبيق</option>
                                <option value="مولدافيا">مولدافيا</option>
                                <option value="موناكو">موناكو</option>
                                <option value="مونتسرات">مونتسرات</option>
                                <option value="ميانمار">ميانمار</option>
                                <option value="ميكرونيزيا">ميكرونيزيا</option>
                                <option value="ناميبيا">ناميبيا</option>
                                <option value="نورو">نورو</option>
                                <option value="نيبال">نيبال</option>
                                <option value="نيجيريا">نيجيريا</option>
                                <option value="نيكاراجوا">نيكاراجوا</option>
                                <option value="نيوزيلاندا">نيوزيلاندا</option>
                                <option value="نيوي">نيوي</option>
                                <option value="هايتي">هايتي</option>
                                <option value="هندوراس">هندوراس</option>
                                <option value="هولندا">هولندا</option>
                                <option value="هونج كونج الصينية">هونج كونج الصينية</option>
                            </select>
                        </div>


                        <div class="col-md-12  make-space">
                            <label for="image" class="mr-sm-2">{{__('الصورة الخاصة بالاعلان') }} : </label>
                            <input type="file" class="form-control" name="image">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- <div class="col-md-12">
                            <label for="link" class="mr-sm-2 space_top">{{ trans('الرابط') }} :</label>
                            <input id="link" type="text" name="link" class="form-control" value="{{ old('link') }}" required autocomplete="link" autofocus>
                        </div> --}}
                        <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('users_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('users_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
