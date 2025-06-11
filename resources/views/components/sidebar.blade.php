        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('assets/img/logo.png') }}"
                            class="header-logo" /> <span class="logo-name">Otika</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown active">
                        <a href="{{ route('home') }}" class="nav-link"><i
                                data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="briefcase"></i><span>Main</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('user.audio_upload_index') }}">Upload Audio</a></li>
                            <li><a class="nav-link" href="{{ route('user.audio_check') }}">Audio Check</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
