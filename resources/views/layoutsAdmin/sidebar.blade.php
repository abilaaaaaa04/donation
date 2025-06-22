<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    .main-sidebar {
        background: linear-gradient(to bottom, #064635, rgb(208, 229, 226));
        color: #fff;
        min-height: 100vh;
        font-family: 'Nunito', sans-serif;
        font-size: 15px;
    }

    .main-sidebar a {
        color: #dff3e4;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .main-sidebar a:hover {
        color: #ffffff;
    }

    .main-sidebar .user-panel {
        padding: 15px;
        background-color: rgb(16, 121, 96);
        border-bottom: 1px solid #1a3e34;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .main-sidebar .user-panel img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 2px solid #4caf50;
        object-fit: cover;
    }

    .main-sidebar .user-panel .info p {
        margin: 5px 0 2px;
        font-weight: 700;
        color: #ffffff;
        font-size: 16px;
    }

    .main-sidebar .user-panel .info a {
        color: #81c784;
        font-size: 12px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu li.header {
        font-size: 13px;
        text-transform: uppercase;
        padding: 10px 20px;
        background-color: rgb(26, 122, 55);
        color: #ffffff;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .sidebar-menu > li > a {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background-color 0.3s;
    }

    .sidebar-menu li a:hover {
        background-color: #1b5e20;
        color: #ffffff;
        border-radius: 4px;
    }

    .sidebar-menu .treeview-menu {
        background-color: rgb(168, 231, 215);
        padding-left: 10px;
    }

    .sidebar-menu .treeview-menu li a {
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
        color: #064635;
    }

    .fa {
        width: 20px;
        text-align: center;
    }
</style>
<aside class="main-sidebar" style="position: fixed;">
    <section class="sidebar">
        {{-- User Panel bisa ditambahkan di sini jika ada --}}
      <div class="user-panel"> 
            <img src="path_to_image" alt="User Image">
            <div class="info">
                <p>Nama Admin</p>
                <a href=><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>

            <li>
                <a href="{{ route ('admin.dashboard') }}">
                    <i class="fa fa-home"></i> <span>Beranda</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hand-holding-heart"></i> <span>Donasi</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.donasi.index') }}"><i class="fa fa-angle-right"></i> Data Donasi</a></li>
                    <li><a href="{{ route('admin.donasi.create') }}"><i class="fa fa-angle-right"></i> Tambah Donasi</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card"></i> <span>Transaksi</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.transaksi.index') }}"><i class="fa fa-angle-right"></i> Data Transaksi</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.laporan.index') }}">
                    <i class="fa fa-file-alt"></i> <span>Laporan</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
