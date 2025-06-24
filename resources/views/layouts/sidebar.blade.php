<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            @if (in_array(Auth::user()->id_level, [1, 2]))
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @auth
                    <li class="nav-header">BARANG</li>
                    @userHasAccess('barang', 'index')
                        <li class="nav-item">
                            <a href="{{ url('/barang') }}" class="nav-link">
                                <i class="nav-icon bi bi-info-circle"></i>
                                <p>Informasi Barang</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    @userHasAccess('barang_masuk', 'create')
                        <li class="nav-item">
                            <a href="{{ url('/barang_masuk') }}" class="nav-link">
                                <i class="nav-icon bi bi-plus-square"></i>
                                <p>Tambah Stok</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    @userHasAccess('barang', 'create')
                        <li class="nav-item">
                            <a href="{{ url('/barang/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-upload"></i>
                                <p>Barang Baru</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    @userHasAccess('barang_keluar', 'create')
                        <li class="nav-item">
                            <a href="{{ url('/barang_keluar') }}" class="nav-link">
                                <i class="nav-icon bi bi-truck"></i>
                                <p>Barang Keluar</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    <li class="nav-header">PERMINTAAN</li>
                    @userHasAccess('permintaan', 'create')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>Permintaan Baru</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    @userHasAccess('permintaan', 'index')
                        <li class="nav-item">
                            <a href="{{ url('/permintaan') }}" class="nav-link">
                                <i class="nav-icon bi bi-arrow-repeat"></i>
                                <p>Proses Permintaan</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    @userHasAccess('permintaan', 'riwayat')
                        <li class="nav-item">
                            <a href="{{ url('/permintaan/riwayat') }}" class="nav-link">
                                <i class="nav-icon bi bi-archive"></i>
                                <p>Riwayat Permintaan</p>
                            </a>
                        </li>
                    @endUserHasAccess

                    @userHasAccess('pengguna', 'index')
                        <li class="nav-header">USER MANAGEMENT</li>
                        <li class="nav-item">
                            <a href="{{ url('/pengguna') }}" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Kelola Pengguna</p>
                            </a>
                        </li>
                    @endUserHasAccess
                @endauth
            @endif

            @if (Auth::user()->id_level == 3)
                <li class="nav-item">
                    <a href="{{ url('/beranda') }}" class="nav-link">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                @auth
                    <li class="nav-header">PERMINTAAN</li>
                    @userHasAccess('permintaan', 'create')
                        <li class="nav-item">
                            <a href="{{ url('/pemohon/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-file-plus"></i>
                                <p>Ajukan Permintaan</p>
                            </a>
                        </li>
                    @endUserHasAccess
                    @userHasAccess('permintaan', 'riwayat')
                        <li class="nav-item">
                            <a href="{{ url('/pemohon/riwayat') }}" class="nav-link">
                                <i class="nav-icon bi bi-archive"></i>
                                <p>Riwayat Permintaan</p>
                            </a>
                        </li>
                    @endUserHasAccess
                @endauth
            @endif
            <li>
                <hr style="border-top: 1.5px solid #ccc;">
            </li>
            <li class="nav-item">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-start w-100" style="color: red;">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </button>
                </form>
            </li>
        </ul>
        <!--end::Sidebar Menu-->
    </nav>
</div>
