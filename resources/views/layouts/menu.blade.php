<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ active('dashboard') }}">
                <a href="/">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Master</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ active('masterSiswa') }}">
                        <a href="{{route('masterSiswa')}}">
                            <span class="pcoded-mtext">Master Siswa</span>
                        </a>
                    </li>
                    <li class="{{ active('kelas.index') }}">
                        <a href="{{ route('kelas.index') }}">
                            <span class="pcoded-mtext">Master Kelas</span>
                        </a>
                    </li>
                    <li class="{{ active('jurusan.index') }}">
                        <a href="{{ route('jurusan.index') }}">
                            <span class="pcoded-mtext">Master Jurusan</span>
                        </a>
                    </li>
                    <li class="{{ active('masterGuru') }}">
                        <a href="{{ route('masterGuru') }}">
                            <span class="pcoded-mtext">Master Guru</span>
                        </a>
                    </li>
                    <li class="{{ active('mapel') }}">
                        <a href="menu-rtl.html">
                            <span class="pcoded-mtext">Master Mata Pelajaran</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Page layouts</span>
                    <span class="pcoded-badge label label-warning">NEW</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Vertical</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="menu-static.html">
                                    <span class="pcoded-mtext" >Static Layout</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-header-fixed.html">
                                    <span class="pcoded-mtext" >Header Fixed</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-compact.html">
                                    <span class="pcoded-mtext" >Compact</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-sidebar.html">
                                    <span class="pcoded-mtext">Sidebar Fixed</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext" >Horizontal</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="menu-horizontal-static.html" target="_blank">
                                    <span class="pcoded-mtext" >Static Layout</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-horizontal-fixed.html" target="_blank">
                                    <span class="pcoded-mtext">Fixed layout</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-horizontal-icon.html" target="_blank">
                                    <span class="pcoded-mtext">Static With Icon</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-horizontal-icon-fixed.html" target="_blank">
                                    <span class="pcoded-mtext">Fixed With Icon</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" ">
                        <a href="menu-bottom.html">
                            <span class="pcoded-mtext" >Bottom Menu</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="box-layout.html" target="_blank">
                            <span class="pcoded-mtext">Box Layout</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="menu-rtl.html" target="_blank">
                            <span class="pcoded-mtext">RTL</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
