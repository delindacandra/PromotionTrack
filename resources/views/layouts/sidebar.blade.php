<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">BARANG PROMOSI</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam"></i>
                    <p>
                        Barang
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/barang')}}" class="nav-link">
                            <i class="nav-icon bi bi-info-circle"></i>
                            <p>Informasi Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-plus-square"></i>
                            <p>Tambah Stok</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/barang/create')}}" class="nav-link">
                            <span class="nav-icon" style="font-weight: bold; color: blue;">NEW</span>
                            <p>Barang Baru</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon" style="font-weight: bold; color: red;">OUT</span>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">PERMINTAAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-plus-circle"></i>
                    <p>Permintaan Baru</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-clock"></i>
                    <p>Riwayat Permintaan</p>
                </a>
            </li>

            <li class="nav-header">USER MANAGEMENT</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-person"></i>
                    <p>Profile</p>
                </a>
            </li>
        </ul>
        <!--end::Sidebar Menu-->
    </nav>
</div>
