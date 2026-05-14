<style>
    .attendance-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .attendance-btn {
        background: #f1f3f9;
        border: none;
        border-radius: 6px;
        padding: 10px 18px;
        min-width: 130px;
        font-size: 15px;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1f2937;
        transition: 0.3s ease;
    }

    .attendance-btn:hover {
        background: #e5e7eb;
    }

    .attendance-time {
        font-size: 12px;
        color: #ffffff;
        margin-top: 4px;
        text-align: center;
        font-weight: 500;
    }
</style>
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ri-close-line fs-6 ri-menu-2-line"></i>
            </a>
            <!-- -------------------------------------------------------------- -->
            <!-- Logo -->
            <!-- -------------------------------------------------------------- -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <!-- Logo icon -->
                <b class="logo-icon">
                    {{-- <img src="{{ asset('assets/images/kalpak-logo.jpeg') }}" alt="homepage" class="dark-logo w-50" /> --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="{{ asset('/assets/images/kalpak-logo.jpeg') }}" alt="homepage" class="dark-logo w-75" />
                </span>
            </a>
            <!-- -------------------------------------------------------------- -->
            <!-- End Logo -->
            <!-- -------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------- -->
            <!-- Toggle which is visible on mobile only -->
            <!-- -------------------------------------------------------------- -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ri-more-line fs-6"></i></a>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Logo -->
        <!-- -------------------------------------------------------------- -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- -------------------------------------------------------------- -->
            <!-- toggle and nav items -->
            <!-- -------------------------------------------------------------- -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"><i data-feather="menu" class="feather-sm"></i></a>
                </li>

            </ul>
            <!-- -------------------------------------------------------------- -->
            <!-- Right side toggle and nav items -->
            <!-- -------------------------------------------------------------- -->
            <ul class="navbar-nav align-items-center">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="feather-sm"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title bg-primary text-white">
                                    <h4 class="mb-0 mt-1">4 New</h4>
                                    <span class="fw-light">Notifications</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-center notifications">
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="btn btn-light-danger text-danger btn-circle">
                                            <i data-feather="link" class="feather-sm fill-white"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Luanch Admin</h5>
                                            <span class="mail-desc">Just see the my new admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="btn btn-light-success text-success btn-circle">
                                            <i data-feather="calendar" class="feather-sm fill-white"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Event today</h5>
                                            <span class="mail-desc">Just a reminder that you have event</span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="btn btn-light-info text-info btn-circle">
                                            <i data-feather="settings" class="feather-sm fill-white"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Settings</h5>
                                            <span class="mail-desc">You can customize this template as you want</span>
                                            <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="btn btn-light-primary text-primary btn-circle">
                                            <i data-feather="users" class="feather-sm fill-white"></i>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center mb-1 text-dark" href="#">
                                    <strong>Check all notifications</strong>
                                    <i data-feather="chevron-right" class="feather-sm"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- -------------------------------------------------------------- -->
                <!-- End Comment -->
                <!-- -------------------------------------------------------------- -->
                <!-- -------------------------------------------------------------- -->
                <!-- Messages -->
                <!-- -------------------------------------------------------------- -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="message-square" class="feather-sm"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up" aria-labelledby="2">
                        <span class="with-arrow"><span class="bg-danger"></span></span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title text-white bg-danger">
                                    <h4 class="mb-0 mt-1">5 New</h4>
                                    <span class="fw-light">Messages</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-center message-body">
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="user-img">
                                            <img src="{{ asset('/assets/images/1.jpg') }}" alt="user"
                                                class="rounded-circle" />
                                            <span class="profile-status online pull-right"></span>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="user-img">
                                            <img src="{{ asset('/assets/images/2.jpg') }}" alt="user"
                                                class="rounded-circle" />
                                            <span class="profile-status busy pull-right"></span>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Sonu Nigam</h5>
                                            <span class="mail-desc">I've sung a song! See you at</span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="user-img">
                                            <img src="{{ asset('/assets/images/3.jpg') }}" alt="user"
                                                class="rounded-circle" />
                                            <span class="profile-status away pull-right"></span>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Arijit Sinh</h5>
                                            <span class="mail-desc">I am a singer!</span>
                                            <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#" class="message-item">
                                        <span class="user-img">
                                            <img src="{{ asset('/assets/images/4.jpg') }}" alt="user"
                                                class="rounded-circle" />
                                            <span class="profile-status offline pull-right"></span>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link text-dark" href="#">
                                    <b>See all e-Mails</b>
                                    <i data-feather="chevron-right" class="feather-sm"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- -------------------------------------------------------------- -->
                <!-- End Messages -->
                <!-- -------------------------------------------------------------- -->
                <!-- -------------------------------------------------------------- -->
                <!-- User profile and search -->
                <!-- -------------------------------------------------------------- -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset('/assets/images/2.jpg') }}" alt="user" class="rounded-circle"
                            width="31" /></a>
                    <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <div class="d-flex no-block align-items-center p-3 bg-primary text-white mb-2">
                            <div class="">
                                <img src="{{ asset('/assets/images/2.jpg') }}" alt="user" class="rounded-circle"
                                    width="60" />
                            </div>
                            <div class="ms-2">
                                <span class="ml-1">{{ session('full_name') }}</span>
                                <span
                                    class="badge badge-pill bg-{{ session('role') === 'admin' ? 'danger' : 'info' }} ml-1">
                                    {{ ucfirst(session('role')) }}
                                </span>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-store"></i>
                            {{ session('store_name') ?? 'All Stores' }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="pl-4 p-2">
                            <a href="{{ route('logout') }}" class="btn d-block w-100 btn-primary rounded-pill"><i
                                    data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i> Logout</a>
                        </div>
                    </div>
                </li>

                
                <!-- Live Clock -->
                <li class="nav-item me-3 d-flex align-items-center text-white fw-bold">
                    <span id="liveClock"></span>
                </li>

                @php
                    use App\Models\Attendance;

                    $todayAttendance = null;

                    if (session('role') === 'staff') {
                        $todayAttendance = Attendance::where('staff_id', session('user_id'))
                            ->whereDate('attendance_date', today())
                            ->first();
                    }
                @endphp

                @if (session('role') === 'staff')
                    <li class="nav-item me-3">

                        <div class="attendance-box">

                            @if (!$todayAttendance)
                                <form action="{{ route('clock.in') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="attendance-btn btn btn-light py-2">
                                        <i data-feather="log-in" class="feather-sm me-1"></i>
                                        Clock In
                                    </button>
                                </form>
                            @elseif($todayAttendance && !$todayAttendance->clock_out)
                                <form action="{{ route('clock.out') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="attendance-btn btn btn-light py-2 bg-danger text-white">
                                        <i data-feather="log-out" class="feather-sm me-1"></i>
                                        Clock Out
                                    </button>
                                </form>

                                <div class="attendance-time">
                                    {{ \Carbon\Carbon::parse($todayAttendance->clock_in)->format('h:i A') }}
                                </div>
                            @else
                                <button class="attendance-btn btn btn-secondary py-2" disabled>
                                    Completed
                                </button>

                                <div class="attendance-time">
                                    {{ \Carbon\Carbon::parse($todayAttendance->clock_in)->format('h:i A') }}
                                </div>
                            @endif

                        </div>

                    </li>
                @endif

            </ul>
        </div>
    </nav>
</header>
<!-- -------------------------------------------------------------- -->
<!-- End Topbar header -->
<!-- -------------------------------------------------------------- -->
<script>
    function updateClock() {
        const now = new Date();

        let hours = now.getHours();
        let minutes = now.getMinutes();

        const ampm = hours >= 12 ? 'pm' : 'am';

        hours = hours % 12;
        hours = hours ? hours : 12;

        minutes = minutes < 10 ? '0' + minutes : minutes;

        const timeString = `${hours}:${minutes} ${ampm}`;

        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const dayName = days[now.getDay()];

        document.getElementById('liveClock').innerHTML = `
            <div class="clock-wrapper">
                <div class="clock-time">${timeString}</div>
                <div class="clock-day">${dayName}</div>
            </div>
        `;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>

