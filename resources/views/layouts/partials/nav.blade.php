<!-- start header -->
<div class="header1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">الرئيسية <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#nav_app_features">مميزات التطبيق</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('online_members') }}">قصص زواج ناجحة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تحميل التطبيق</a>
                </li>

               @if (Auth::guard('member')->check())
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="    background-color: unset;  border: unset; color: black;">
                                حسابي
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('myprofile_page') }}">حسابي</a>
                            {{-- <a class="dropdown-item" href="{{ route('member_signout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="text-danger ti-unlock"></i>{{ __('تسجيل خروج') }}</a>
                                <form id="logout-form" action="{{ route('member_signout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div> --}}
                            <a class="dropdown-item" href="{{ route('member_signout') }}">تسجيل خروج</a>
                        </div>
                    </li>
               @endif


                {{-- @if(session()->has('login_key'))
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="    background-color: unset;  border: unset; color: black;">
                                حسابي
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('myprofile_page') }}">حسابي</a>
                            <a class="dropdown-item" href="/front_logout">تسجيل خروج</a>
                            </div>
                        </div>
                    </li>
                @endif --}}
            </ul>
        </div>
    </nav>

</div>
<!-- end header -->
