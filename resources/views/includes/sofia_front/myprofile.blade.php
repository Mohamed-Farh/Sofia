<!DOCTYPE html>
<html>

<head>
    <title>حسابي</title>
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
                    <h3>حسابي</h3>
                    <p>الصفحة الرسمية لك على موقع صوفيا للزواج</p>
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


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 all-result-sec">
                    <div class="row mt-4">
                        <div class="col-xs-12 col-sm-12 col-md-8 mt-2">
                            <div class="card" style="width: 100%; border: unset; border-radius: 5px">
                                <div class="media" style="background: #f9f9f9">
                                    <img src="{{ url('image/members/' . $member->image) }}" class="___class_+?38___"
                                        alt="..." style="height: 140px" />
                                    <div class="media-body">
                                        <h5 class="mt-0">الأسم : {{ $member->full_name }}</h5>
                                        <p>العمر : {{ $member->age }}</p>
                                        <p style="padding-bottom: 15px;"><i class="fas fa-map-marker-alt"></i>الجنسية :
                                            {{ $member->nationality }}</p>
                                        @if ($member->dual_nationality)
                                            <p style="padding-bottom: 15px;"><i
                                                    class="fas fa-map-marker-alt"></i>الجنسية الثانية :
                                                {{ $member->dual_nationality }}</p>
                                        @endif

                                        <p><i class="fas fa-map-marker-alt"
                                                style=" color: #969696; font-size: 15px; padding-left: 5px;"></i>الاقامة
                                            : {{ $member->country }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
                            <h5>
                                <a href="{{ route('edit_myprofile_page', $member) }}" style="color: #ff7b54"><i
                                        class="fas fa-edit" style="color: #ff7b54; padding-left: 5px"></i>تعديل</a>
                            </h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xs-12 col-sm-12 col-md-8 mt-2">
                            <div class="row mt-2">
                                <div class="col">
                                    <p>الاسم المستعار</p>
                                </div>
                                <div class="col">
                                    <p>{{ $member->name }}</p>
                                </div>
                            </div>
                            {{-- <div class="row mt-2">
                                <div class="col">
                                    <p>كلمة المرور</p>
                                </div>
                                <div class="col">
                                    <input type="text" />
                                </div>
                                <div class="col">
                                    <p style="font-size: 10px">
                                        هل ترغب في تغيير كلمة المرور
                                        <a href="{{ route('forget_password_page') }}"
                                            style="font-size: 10px; color: #ff7b54">اضغط
                                            هنا</a>
                                    </p>
                                </div>
                            </div> --}}
                            <div class="row mt-2">
                                <div class="col">
                                    <p>تاريخ التسجيل</p>
                                </div>
                                <div class="col">
                                    <p>{{ $member->created_at->addYear()->format('Y/m/d') }}</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p>البريد الالكتروني</p>
                                </div>
                                <div class="col">
                                    <p>{{ $member->email }}</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p>رقم العضوية</p>
                                </div>
                                <div class="col">
                                    <p>{{ $member->code_no }}</p>
                                </div>
                                {{-- <div class="col">
                                    <p style="font-size: 10px">
                                        هل ترغب في الغاء عضويتك
                                        <a href="#" style="font-size: 10px; color: #ff7b54">اضغط هنا</a>
                                    </p>
                                </div> --}}
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
