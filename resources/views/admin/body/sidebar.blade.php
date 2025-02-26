
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('read ga')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Inventory IT</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('index_json') }}" >List Inventory </a>
                            {{-- <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('invetaris.pc') }}">List PC</a></li>
                                <li><a href="{{ route('invetaris.laptop') }}">List Laptop</a></li>
                                <li><a href="{{ route('invetaris.peripheral') }}">List Peripheral</a></li>
                            </ul> --}}
                        </li>
                        <li><a href="javascript: void(0);" class="has-arrow">Networking</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('wifi.all') }}">List Wifi</a></li>
                                <li><a href="{{ route('isp.all') }}">List ISP</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('fc.all') }}">List Fotocopy</a></li>
                        <li><a href="{{ route('vendor.all') }}">List Vendor</a></li>

                    </ul>
                </li>
                @endcan

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Inventory GA</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('index.all') }}">List Inventory</a></li>
                        <li><a href="{{ route('all') }}">List Inventory Json</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{ route('barang.all') }}">Barang</a></li>
                        <li><a href="{{ route('user.all') }}">Users</a></li>
                        <li><a href="{{ route('divisi.all') }}">Divisi</a></li>
                        <li><a href="{{ route('jenis.all') }}">Jenis</a></li>
                        <li><a href="{{ route('lokasi.all') }}">Lokasi</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Manage Request</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('request.all') }}">List Request Support</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="{{ route('notes-json') }}" class="waves-effect">
                        <i class="ri-sticky-note-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Notes</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Support</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('request.add') }}">Form Request Support</a></li>

                    </ul>
                </li>

                {{-- <li class="menu-title">Admin</li>
                    <li>
                        <a href=" javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-search-fill"></i><span class="badge rounded-pill bg-success float-end"></span>
                            <span>SPK & DO </span>
                        </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('admin_json') }}">All Data</a></li>
                                <li><a href="{{ route('admin.pribadi') }}">List Pribadi</a></li>
                                <li><a href="{{ route('admin.perusahaan') }}">List Perusahaan</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href=" javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-search-fill"></i><span class="badge rounded-pill bg-success float-end"></span>
                            <span>Pengajuan </span>

                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('pengajuan.all') }}">All Data</a>
                            </li>
                        </ul>
                    </li> --}}


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
