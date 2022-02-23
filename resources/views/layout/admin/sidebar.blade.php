<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle"> <img src="https://kist.edu.np/resources/assets/img/logo_small.jpg"
                    alt="KIST College" width="180" height="100" id="collegelogo"></span>
        </a>
        <hr />
        <ul class="sidebar-nav">
            <li class="sidebar-item" style="margin-bottom:10px">
                <a class="sidebar-link" href="{{ route('homepage') }}">
                    <label class="fa fa-fw fa-home"></label><i class="align-middle"></i> <span
                        class="align-middle">HomePage</span>
                </a>
            </li>
            <li class="sidebar-item " style="margin-bottom:10px">
                <a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Exam Detail</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route('examschedule.showtabledata') }}">Exam Schedule</a></li>
                    @if (auth()->user()->status != 'user')
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('examseat.index') }}">Exam
                                Seat</a></li>
                    @endif
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route('examresult.terminalexam') }}">Result</a></li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route('location.index') }}">Location</a></li>
                </ul>
            </li>
            <li class="sidebar-item" style="margin-bottom:10px">
                <a data-target="#forms" data-toggle="collapse" class="sidebar-link collapsed">
                    <label class="fa fa-fw fa-book"></label><i class="align-middle"></i> <span
                        class="align-middle">Study Material</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('Note.index') }}">Note</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route('Questionpaper.index') }}">Question Paper</a></li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route('CourseSyllabus.index') }}">Course Syllabus</a></li>
                </ul>
            </li>
            <li class="sidebar-item" style="margin-bottom:10px">
                <a class="sidebar-link" href="{{ route('classsSchedule.index') }}">
                    <label class="fa fa-fw fa-school"></label><i class="align-middle"></i> <span
                        class="align-middle">Class Schedule</span>
                </a>
            </li>
            <li class="sidebar-item" style="margin-bottom:10px">
                <a class="sidebar-link" href="{{ route('setting.modify') }}">
                    <label class="fa fa-fw fa-calendar-check"></label><i class="align-middle"></i> <span
                        class="align-middle">Subject Course & Teacher</span>
                </a>
            </li>


            <li class="sidebar-item" style="margin-bottom:10px">
                <a class="sidebar-link" href="{{ route('Setting.index') }}">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Setting</span>
                </a>
            </li>

            <li class="sidebar-item" style="margin-bottom:10px">
                <a class="sidebar-link" href="{{ route('changepassword.create') }}">
                    <label class="fa fa-fw fa-flag"></label><i class="align-middle"></i> <span
                        class="align-middle">Help & Supports</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
