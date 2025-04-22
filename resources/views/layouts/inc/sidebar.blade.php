<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('users') }}">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('instructors') }}">
                        <i class="bi bi-circle"></i><span>Instruktur</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('students') }}">
                        <i class="bi bi-circle"></i><span>Siswa</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="{{url('majors')}}">
                        <i class="bi bi-circle"></i><span>Jurusan</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="levels">
                        <i class="bi bi-circle"></i><span>Levels</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Learning Management System</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{url('majors')}}">
                        <i class="bi bi-circle"></i><span>Jurusan</span>
                    </a>
                </li>
                <li>
                    <a href="module">
                        <i class="bi bi-circle"></i><span>Module</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
    </ul>

</aside>