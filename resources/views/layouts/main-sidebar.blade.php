<!-- Left Sidebar start-->
<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                    <div class="pull-left">
                        <i class="ti-home"></i>
                        <span class="right-nav-text">{{ __('main.dashboard') }}</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <!-- menu title -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('main.components') }} </li>
            <!-- menu item Elements-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                    <div class="pull-left">
                        <i class="ti-palette"></i>
                        <span class="right-nav-text">{{ __('main.study_levels') }}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ route('level.index') }}">{{ __('main.study_levels_list') }}</a></li>
                </ul>
            </li>
            <!-- classes-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                    <div class="pull-left">
                        <i class="fa fa-building"></i>
                        <span class="right-nav-text">{{ __('main.grades')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ route('grade.index') }}">{{ __('grade.grades_list') }}</a></li>
                </ul>
            </li>


            <!-- sections-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                    <div class="pull-left">
                        <i class="fas fa-chalkboard"></i>
                        <span class="right-nav-text">{{ __('main.sections')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ route('section.index') }}">{{ __('section.sections_list') }}</a></li>
                </ul>
            </li>


            <!-- students-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                    <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                            class="right-nav-text">{{ __('main.students')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('student.index') }}">{{ __('main.students_list') }}</a> </li>
                    <li> <a href="{{ route('student.create') }}">{{ __('main.add_student') }}</a> </li>
                </ul>
            </li>



            <!-- Teachers-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                    <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span
                            class="right-nav-text">{{ __('main.teachers') }}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('teacher.index') }}">{{ __('main.teachers_list') }}</a> </li>
                </ul>
            </li>


            <!-- Parents-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                    <div class="pull-left"><i class="fas fa-user-tie"></i>
                        <span class="right-nav-text">{{ __('main.guardians')}}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('add_guardian') }}">{{ __('main.guardians_list') }}</a> </li>
                    <li> <a href="{{ route('add_guardian') }}">{{ __('main.add_guardian') }}</a> </li>
                </ul>
            </li>

            <!-- Accounts-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                    <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                            class="right-nav-text">{{ __('main.accounts')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="calendar.html">Events Calendar </a> </li>
                    <li> <a href="calendar-list.html">List Calendar</a> </li>
                </ul>
            </li>

            <!-- Attendance-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                    <div class="pull-left"><i class="fas fa-calendar-alt"></i>
                        <span class="right-nav-text">{{ __('main.attendance')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                </ul>
            </li>

            <!-- Exams-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                    <div class="pull-left"><i class="fas fa-book-open"></i>
                        <span class="right-nav-text">{{ __('main.exams')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                </ul>
            </li>


            <!-- library-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                    <div class="pull-left"><i class="fas fa-book"></i>
                        <span class="right-nav-text">{{ __('main.library')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                </ul>
            </li>


            <!-- Onlinec lasses-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                    <div class="pull-left"><i class="fas fa-video"></i>
                        <span class="right-nav-text">{{ __('main.onlineclasses')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                </ul>
            </li>


            <!-- Settings-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                    <div class="pull-left"><i class="fas fa-cogs"></i>
                        <span class="right-nav-text">{{ __('main.settings')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                </ul>
            </li>


            <!-- Users-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                    <div class="pull-left"><i class="fas fa-users"></i>
                        <span class="right-nav-text">{{ __('main.users')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- Left Sidebar End-->

<!--=================================