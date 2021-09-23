<!DOCTYPE html>
<html>

<head>
    <title>تواصل معنا</title>
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
    <div class=" search-result py-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col search-result-col">
                    <h3>تواصل معنا</h3>
                    <p>تواصل معنا الآن وأرسل استفسارك وسنقوم بالرد عليك سريعا</p>
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


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 all-result-sec ">
                    <h6>تواصل معنا الان</h6>
                    @foreach (\App\Models\Homepage_Word::where('vision', '0')->where('type', 'تواصل معنا الان')->get() as $word)
                        <p class="para-login" style="text-align: justify !important;color: #2b2b2b;">{{ $word->description }}</p>
                    @endforeach
                    <p class="para-login mt-3" style="color: #2b2b2b;">قم بملء البيانات التالية وأرسل رسالتك وسنقوم
                        بالرد عليك
                        في أقرب وقت

                    </p>

                    <form action="{{ route('send_message_from_front') }}" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <p class="user-name">الاسم</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input type="text" name="name" style="border: 1px solid #efefef; border-radius: 5px;height: 34px; margin-bottom: 10px;background: #f3f3f3;" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <p class="user-name">البريد الالكتروني</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input type="text" name="email" style="border: 1px solid #efefef; border-radius: 5px;height: 34px; margin-bottom: 10px;background: #f3f3f3;" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <p class="user-name">رقم الهاتف</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input type="text" name="phone" style="border: 1px solid #efefef; border-radius: 5px;height: 34px; margin-bottom: 10px;background: #f3f3f3;" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <p class="user-name">البلد</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input type="text" name="country" style="border: 1px solid #efefef; border-radius: 5px;height: 34px; margin-bottom: 10px;background: #f3f3f3;" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <p class="user-name">موضوع الرسالة</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <input type="text" name="subject" style="border: 1px solid #efefef; border-radius: 5px;height: 34px; margin-bottom: 10px;background: #f3f3f3;" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <p class="user-name">نص الرسالة</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <textarea  name="message" style=" width:100%;border: 1px solid #efefef; border-radius: 5px;height: 162px; margin-bottom: 10px;background: #f3f3f3;" required="required"></textarea>
                                </div>
                            </div>
                            <div class=" last-button text-center mt-2">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <button style="background: #ff7b54; color: white; font-weight: 600;">ارسال</button>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
