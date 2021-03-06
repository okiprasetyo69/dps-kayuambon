<!-- Main Sidebar Container -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Login as Admin -->
                    @if (Auth::user()->role_id == 3)
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard Admin
                        </a>
                    @elseif (Auth::user()->role_id == 4)
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard Employee
                        </a>
                    @elseif (Auth::user()->role_id == 2)
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard Supervisior
                        </a>
                    @elseif (Auth::user()->role_id == 5)
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard Head
                        </a>
                    @elseif (Auth::user()->role_id == 6)
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard Security
                        </a>
                    @elseif (Auth::user()->role_id == 7)
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard Public
                        </a>
                    @else
                    <!-- Login as superadmin -->   
                        <!-- Dashboard -->
                        <!-- 
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="/superadmin">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                        -->
                        <!-- Menu Absence -->
                        <div class="sb-sidenav-menu-heading">Daftar Pemilih</div>
                            <a class="nav-link" href="/dps">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                            DPS
                            </a>
                        <!-- Menu Setting-->
                        <div class="sb-sidenav-menu-heading">Setting</div>
                            <!-- 
                            <a class="nav-link" href="/branch">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-code-branch"></i>
                                </div>
                                Branch
                            </a>
                            -->
                            <a class="nav-link" href="/usersettings">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-cog"></i>
                                </div>
                                User Setting
                            </a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
