<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ url('admin/dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/produk') }}" class="waves-effect">
                        <i class="fa-solid fa-cart-shopping"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/pesanan-baru') }}" class="waves-effect">
                        <i class="fa-solid fa-cart-plus"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Pesanan Baru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/pesanan-selesai') }}" class="waves-effect">
                        <i class="fa-solid fa-cart-flatbed-suitcase"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Pesanan Selesai</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
