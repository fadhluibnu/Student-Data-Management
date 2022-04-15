<div class="col-sm-4 col-md-3 col-lg-2 border-end show" id="sidebar-nav" style="overflow-x: hidden">
    <nav class="mt-3 mb-3 d-flex align-items-center flex-sm-row flex-row-reverse">
        <div class="button-collaps p-2 px-3" id="my-btn-collaps" onclick="myCollaps()">
            <i class="bi bi-list-nested text-white" id="icon-collapse-sm"></i>
        </div>
        <h1 class="p-sm-0 m-sm-0 ms-sm-3 title-nav m-auto">SDAMA</h1>
    </nav>
    <div class="menu hidden-sm" id="menu-navbar">
        <div class="line"></div>
        <ul class="navbar-nav mt-3">
            <li class="nav-item">
                <a href="" class="nav-link my-nav-link d-flex p-3 py-2 {{ Request::is('/') ? 'aktif' : '' }}">
                    <i class="
                    bi bi-columns-gap me-4" id="icon-navside"></i>
                    <span>Overview</span>
                </a>
            </li>
        </ul>
        @can('admin')
            <h2 class="side-nav-title mt-4">Admin</h2>
            <ul class="navbar-nav mt-3">
                <li class="nav-item">
                    <a href="/dataguru" class="nav-link my-nav-link d-flex p-3 py-2">
                        <i class="bi bi-gear me-4" id="icon-navside"></i>
                        <span>Data Guru</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link my-nav-link d-flex p-3 py-2">
                        <i class="bi bi-gear me-4" id="icon-navside"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>
            </ul>
        @endcan
        <h2 class="side-nav-title mt-4">Akun</h2>
        <ul class="navbar-nav mt-3">
            <li class="nav-item">
                <a href="/setting" class="nav-link my-nav-link d-flex p-3 py-2">
                    <i class="bi bi-gear me-4" id="icon-navside"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn nav-link my-nav-link d-flex p-3 py-2" style="width: 100%">
                        <i class="bi bi-box-arrow-right me-4" id="icon-navside"></i><span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
