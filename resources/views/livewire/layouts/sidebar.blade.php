<div>
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="">
                <img src="{{ asset('assets/html/images/iconabas.png') }}" class="img-fluid" alt="">
                <span>ABAS</span>
            </a>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="line-menu half start"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu half end"></div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
                    @if ($operator)
                        <li class="{{ request()->routeIs('operator.dashboard') ? 'active' : '' }}"><a
                                href="{{ route('operator.dashboard') }}" class="iq-waves-effect"><i
                                    class="ri-road-map-line"></i><span>Lokasi | Waktu Absen</span></a></li>
                        <li
                            class="{{ request()->routeIs('operator.kelas') || request()->routeIs('operator.jurusan') ? 'active' : '' }}">
                            <a href="#kelasJurusan" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-community-line"></i><span>Kelas | Jurusan</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="kelasJurusan" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ request()->routeIs('operator.kelas') ? 'active' : '' }}"><a
                                        href="{{ route('operator.kelas') }}">Daftar Kelas</a></li>
                                <li class="{{ request()->routeIs('operator.jurusan') ? 'active' : '' }}"><a
                                        href="{{ route('operator.jurusan') }}">Daftar Jurusan</a></li>
                            </ul>
                        </li>
                        <li
                            class="{{ request()->routeIs('operator.kesiswaan') || request()->routeIs('operator.wali-kelas') || request()->routeIs('operator.wali-siswa') ? 'active' : '' }}">
                            <a href="#daftarPengguna" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-group-2-line"></i><span>Daftar Pengguna</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="daftarPengguna" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ request()->routeIs('operator.kesiswaan') ? 'active' : '' }}"><a
                                        href="{{ route('operator.kesiswaan') }}">Daftar Kesiswaan</a></li>
                                <li class="{{ request()->routeIs('operator.wali-kelas') ? 'active' : '' }}"><a
                                        href="{{ route('operator.wali-kelas') }}">Daftar Wali Kelas</a></li>
                                <li class="{{ request()->routeIs('operator.wali-siswa') ? 'active' : '' }}"><a
                                        href="{{ route('operator.wali-siswa') }}">Daftar Wali Siswa</a></li>
                            </ul>
                        </li>
                    @elseif ($tenagaKependidikan)
                        <li class="active"><a href="" class="iq-waves-effect"><i
                                    class="ri-home-4-line"></i><span>Dashboard</span></a></li>
                        <li class=""><a href="" class="iq-waves-effect"><i
                                    class="ri-calendar-todo-line"></i><span>Laporan Absensi</span></a></li>
                    @endif
                </ul>
            </nav>
            <div class="p-3"></div>
        </div>
    </div>
</div>
