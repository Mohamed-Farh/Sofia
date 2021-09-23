<!DOCTYPE html>
<html>

<head>
    <title>المتواجدون الان</title>
    @include('layouts.partials.head')
    @toastr_css
    <style>
        .pagination {
            display: flex !important;
        }

        button.like {
            background: #ffffff;
            border: none;
            color: white;
            width: 45px;
            border-radius: 5px;
            margin-bottom: 0px;
            float: right;
        }

        button.search-button {
            width: 100%;
        }

        button.block {
            width: 20%;
            background-color: black;
            padding-left: 5px;
            margin-left: 10px;
            margin-bottom: 0px;
        }

    </style>
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
                    <h3>المتواجدون الان</h3>
                    <p>{{ $title }}</p>
                    {{-- <p>عدد الأعضاء ( {{ $members_counts }} )</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end search result sec -->


        <!-- start sidebar-section -->
        <div class="sidebar-sec py-4">
            <div class="container container-1">
                <div class="row mt-2">
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
                        <div class="row mt-2">
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                <p>عدد الأعضاء<span> ( {{ $members_counts }} )</span></p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6  col-md-6 col-lg-4 mt-2">
                                        <img src="{{ asset('app-assets/images/Group 27801.png') }}"><a href="{{ route('online_members') }}" class="link-result-1">الكل</a>
                                    </div>
                                    <div class="col-xs-6 col-sm-6  col-md-6 col-lg-4 mt-2">
                                        <img src="{{ asset('app-assets/images/Group 278011.png') }}"><a href="{{ route('online_male_members') }}" class="link-result-1">ذكر</a>
                                    </div>
                                    <div class="col-xs-6 col-sm-6  col-md-6 col-lg-4 mt-2">
                                        <img src="{{ asset('app-assets/images/Group 2780111.png') }}"><a href="{{ route('online_female_members') }}" class="link-result-1">انثى</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            @if ($members_counts != '0')
                                @foreach ($members as $member_care)
                                    <?php
                                        $auth_id = Auth::guard('member')->id();
                                        $blocked_member = App\Models\Member_Relation::where(['my_id'=> $auth_id, 'member_id'=>($member_care->id), 'ignore_list'=> '1'])->first();
                                    ?>
                                    @if ($blocked_member)
                                        <?php  $member =\App\Models\Member::where('id', $blocked_member->member_id)->first(); ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                                            <div class="card" style="width: 100%">
                                                <div class="media">
                                                    <a href="/show_member_details_page/{{ $member->id }}">
                                                        <img src="{{ url('image/members/' . $member->image) }}"
                                                            class="" alt=" ..." />
                                                    </a>

                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $member->name }}</h5>
                                                        <p>العمر : {{ $member->age }}سنة</p>
                                                        <p>الجنسية : {{ $member->nationality }}</p>
                                                        <p>بلد الاقامة : {{ $member->country }}</p>
                                                        <p>اخر ظهور : {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $member->last_seen)->format('Y-m-d (h:i A)') }}</p>


                                                        @if (Auth::guard('member')->check())
                                                            <?php
                                                            $auth_id = Auth::guard('member')->id();
                                                            $relation = \App\Models\Member_Relation::where(['my_id' => $auth_id, 'member_id' => $member->id])
                                                                ->where('care_list', '1')
                                                                ->first();
                                                            ?>

                                                            @if ($relation)
                                                                <button data-toggle="modal" data-target="#care{{ $member->id }}"
                                                                    class="like" title="يجب فك الحظر لالغاء اعجابك">
                                                                    <i class="fas fa-heart"></i>
                                                                </button>
                                                            @else
                                                                <button data-toggle="modal" data-target="#care{{ $member->id }}"
                                                                    class="like" title="يجب فك الحظر لتسجيل اعجابك">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            @endif

                                                        @else
                                                            <button data-toggle="modal" data-target="#care{{ $member->id }}"
                                                                class="like" title="يجب فك الحظر لتسجيل اعجابك">
                                                                <i class="far fa-heart"></i>
                                                            </button>
                                                        @endif

                                                        {{-- <a href="/show_member_details_page/{{ $member->id }}#send_message" title="يجب فك الحظر لارسال رسالة">
                                                            <i class="far fa-envelope"></i>
                                                        </a> --}}
                                                        <a  title="يجب فك الحظر لارسال رسالة">
                                                            <i class="far fa-envelope"></i>
                                                        </a>

                                                        <a href="/show_member_details_page/{{ $member->id }}" title="عرض مزيد من التفاصيل">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>


                                                        <button data-toggle="modal" data-target="#block{{ $member->id }}" class="block" title="الغاء الحظر">
                                                            <i class="fas fa-user-lock"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Member Block Another Member -->
                                        <div class="modal fade text-right" id="block{{ $member->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- add_form -->
                                                        <form action="{{ route('member_block', 'test') }}" method="post">
                                                            {{ method_field('post') }}
                                                            @csrf
                                                            {{ __('هـل أنـت مـتـأكـد مـن هـذة الـعـمـلـيـة') }}

                                                            <input id="member_id" type="hidden" name="member_id"
                                                                class="form-control" value="{{ $member->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admins_trans.Close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ __('تـأكـيـد') }}</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <?php  $member =\App\Models\Member::where('id', $member_care->id)->first(); ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                                            <div class="card" style="width: 100%">
                                                <div class="media">
                                                    <a href="/show_member_details_page/{{ $member->id }}">
                                                        <img src="{{ url('image/members/' . $member->image) }}"
                                                            class="" alt=" ..." />
                                                    </a>

                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $member->name }}</h5>
                                                        <p>العمر : {{ $member->age }}سنة</p>
                                                        <p>الجنسية : {{ $member->nationality }}</p>
                                                        <p>بلد الاقامة : {{ $member->country }}</p>
                                                        <p>اخر ظهور : {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $member->last_seen)->format('Y-m-d (h:i A)') }}</p>

                                                        @if (Auth::guard('member')->check())
                                                            <?php
                                                            $auth_id = Auth::guard('member')->id();
                                                            $relation = \App\Models\Member_Relation::where(['my_id' => $auth_id, 'member_id' => $member->id])
                                                                ->where('care_list', '1')
                                                                ->first();
                                                            ?>

                                                            @if ($relation)
                                                                <button data-toggle="modal" data-target="#care{{ $member->id }}"
                                                                    class="like" title="الغاء اعجابي">
                                                                    <i class="fas fa-heart"></i>
                                                                </button>
                                                            @else
                                                                <button data-toggle="modal" data-target="#care{{ $member->id }}"
                                                                    class="like" title="تسجيل اعجابي">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            @endif

                                                        @else
                                                            <button data-toggle="modal" data-target="#care{{ $member->id }}"
                                                                class="like" title="تسجيل اعجابي">
                                                                <i class="far fa-heart"></i>
                                                            </button>
                                                        @endif

                                                        <a href="/show_member_details_page/{{ $member->id }}#send_message" title="ارسال رسالة">
                                                            <i class="far fa-envelope"></i>
                                                        </a>
                                                        <a href="/show_member_details_page/{{ $member->id }}" title="عرض مزيد من التفاصيل">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>


                                                        <button data-toggle="modal" data-target="#block{{ $member->id }}" class="block" title="حظر هذا العضو">
                                                            <i class="fa fa-lock"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Member Care Another Member -->
                                        <div class="modal fade text-right" id="care{{ $member->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- add_form -->
                                                        <form action="{{ route('member_give_like', 'test') }}" method="post">
                                                            {{ method_field('post') }}
                                                            @csrf
                                                            {{ __('هـل أنـت مـتـأكـد مـن تـسـجـيـل اعـجـابـك بـهـذا الـعـضـو') }}

                                                            <input id="member_id" type="hidden" name="member_id"
                                                                class="form-control" value="{{ $member->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admins_trans.Close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ __('تـأكـيـد') }}</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Member Block Another Member -->
                                        <div class="modal fade text-right" id="block{{ $member->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- add_form -->
                                                        <form action="{{ route('member_block', 'test') }}" method="post">
                                                            {{ method_field('post') }}
                                                            @csrf
                                                            {{ __('هـل أنـت مـتـأكـد مـن هـذة الـعـمـلـيـة') }}

                                                            <input id="member_id" type="hidden" name="member_id"
                                                                class="form-control" value="{{ $member->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admins_trans.Close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ __('تـأكـيـد') }}</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="col" style="text-align: center">
                                    <h3 style="text-align: center">عفوا لا يوجد اعضاء في هذة القائمة</h3>
                                </div>
                            @endif
                        </div>
                        <div class="pagination-sec text-center py-4">
                            <div class="pagination">
                                <p>{{ $members->links() }}</p>
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
