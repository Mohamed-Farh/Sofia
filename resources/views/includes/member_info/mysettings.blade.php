<!DOCTYPE html>
<html>

<head>
    <title>اعدادات الحساب</title>
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
                    <h3>اعدادات الحساب</h3>
                    <p>ضبط اعدادات حسابك بما يتناسب مع استخدامك</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end search result sec -->


    <!-- start sidebar-section -->
    <div class="sidebar-sec py-4 search-information profile-setting-bar">
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


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <form action="{{ route('update_mysettings') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $member_id }}">

                        <div class="login-data mt-3">
                            <h5>دول الأعضاء الذين اسمح لهم بمراسلتي</h5>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="who_can_text_me" id="all" value="all" <?php if ($mysettings->who_can_text_me == 'all') {
    echo 'checked';
} ?> />
                                        <label for="all" class="hidden-entrance male-entrance">السماح للمقيمين بجميع
                                            الدول
                                            بمراسلتي
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="who_can_text_me" id="in_member" value="in_member"
                                            <?php if ($mysettings->who_can_text_me == 'in_member') {
                                                echo 'checked';
                                            } ?> />
                                        <label for="in_member" class="hidden-entrance male-entrance">السماح فقط للمقيمين
                                            بدولتي
                                            بمراسلتي
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <form class="profile-form">
                                        <input type="radio" name="who_can_text_me" value="Show Div" onclick="showDiv()" style="float: right;
                                            border: 1px solid #efefef;
                                            border-radius: 5px;
                                            height: 34px;
                                            margin-bottom: 10px;
                                            background: #f3f3f3;
                                            border-radius: unset;
                                            height: unset;
                                            margin-bottom: unset;
                                            width: unset">
                                        <label for="html" class="hidden-entrance male-entrance">السماح فقط للاعضاء
                                            المقيمين في دول محددة بمراسلتي</label>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="container-msg-1   text-right" id="welcomeDivv" style="display:none;"
                                        class="answer_list">
                                        <form  >
                                            <div class="multiselect">
                                                <div class="selectBox" onclick="showCheckboxes()">
                                                    <select>
                                                        <option>اختر الدولة</option>
                                                    </select>
                                                    <div class="overSelect"></div>
                                                </div>
                                                <div id="checkboxes">
                                                    <label for="one">
                                                        <input type="checkbox" id="one"
                                                            style="width: unset;height: unset;border: unset;border-radius: unset;margin-bottom: unset;" />مصر</label>
                                                    <label for="two">
                                                        <input type="checkbox" id="two"
                                                            style="width: unset;height: unset;border: unset;border-radius: unset;margin-bottom: unset;" />اردن</label>
                                                    <label for="three">
                                                        <input type="checkbox" id="three"
                                                            style="width: unset;height: unset;border: unset;border-radius: unset;margin-bottom: unset;" />العراق</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function showDiv() {
                                    document.getElementById('welcomeDivv').style.display = "block";
                                }
                                var expanded = false;

                                function showCheckboxes() {
                                    var checkboxes = document.getElementById("checkboxes");
                                    if (!expanded) {
                                        checkboxes.style.display = "grid";
                                        expanded = true;
                                    } else {
                                        checkboxes.style.display = "none";
                                        expanded = false;
                                    }
                                }
                            </script>
                        </div>

                        <div class="login-data mt-3">
                            <h5>جنسيات الأعضاء الذين اسمح لهم بمراسلتي</h5>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="nationality_can_text_me" id="all" value="all" <?php if ($mysettings->nationality_can_text_me == 'all') { echo 'checked'; } ?> />
                                        <label for="all" class="hidden-entrance male-entrance">السماح لجميع الجنسيات
                                            بمراسلتي
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="nationality_can_text_me" id="in_nationality" value="in_nationality"
                                            <?php if ($mysettings->nationality_can_text_me == 'in_nationality') {
                                                echo 'checked';
                                            } ?> />
                                        <label for="in_nationality" class="hidden-entrance male-entrance">السماح فقط
                                            للاعضاء من نفس
                                            جنسيتي بمراسلتي
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="nationality_can_text_me" id="out_nationality" value="out_nationality"
                                            <?php if ($mysettings->nationality_can_text_me == 'out_nationality') {
                                                echo 'checked';
                                            } ?> />
                                        <label for="out_nationality" class="hidden-entrance male-entrance">السماح فقط
                                            لجنسيات محددة
                                            بمراسلتي</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="login-data mt-3">
                            <h5>أعمار الأعضاء الذين اسمح لهم بمراسلتي</h5>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="age_can_text_me" id="all" value="all" <?php if ($mysettings->age_can_text_me == 'all') {
    echo 'checked';
} ?> />
                                        <label for="all_member" class="hidden-entrance male-entrance">السماح لأي عضو
                                            بالمراسلة بغض
                                            النظر عن عمره
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="profile-form">
                                        <input type="radio" class="radio-sec male-radio profile-radio"
                                            name="age_can_text_me" id="young_member" value="young_member"
                                            <?php if ($mysettings->age_can_text_me == 'young_member') {
                                                echo 'checked';
                                            } ?> />
                                        <label for="young_member" class="hidden-entrance male-entrance">عدم السماح
                                            بمراسلتي للأعضاء
                                            الأصغر مني عمرا"
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="login-data mt-3">
                            <h5>اعدادات الإشعارات</h5>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">
                                        من أضافني إلي إهتمامه
                                    </p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="show_who_care_me" <?php if ($mysettings->show_who_care_me == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">من زار بياناتي</p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="show_visit_me" <?php if ($mysettings->show_visit_me == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">
                                        من أضافني إلي قائمة التجاهل
                                    </p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="show_block_me" <?php if ($mysettings->show_block_me == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">
                                        من حذفني من قائمة التجاهل
                                    </p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="show_unblock_me" <?php if ($mysettings->show_unblock_me == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">
                                        استلام الرسائل الجديدة
                                    </p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="show_new_messages" <?php if ($mysettings->show_new_messages == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">القصص الناجحة</p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="show_success_stories" <?php if ($mysettings->show_success_stories == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2">
                                <div class="col">
                                    <p style="padding-top: 6px; color: #929394">استلام هذه الاشعارات علي البريد
                                        الإلكتروني أيضا</p>
                                </div>
                                <div class="col">
                                    <label class="switch">
                                        <input type="checkbox" name="email_send" <?php if ($mysettings->email_send == 'on') {
    echo 'checked';
} ?> />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="login-data mt-3">
                            <div class="row mt-2">
                                <div class="col"></div>
                                <div class="col">
                                    <button type="submit">حفظ التعديلات</button>
                                </div>
                                <div class="col"></div>
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
