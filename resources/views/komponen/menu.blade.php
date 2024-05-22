<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <b><span class="fs-4">Data Layanan</span></b>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/kategori-layanan" class="nav-link @if (Request::segment(1) == 'kategori-layanan') active @endif" aria-current="page">Kategori Layanan</a></li>
        <li class="nav-item"><a href="/layanan" class="nav-link @if (Request::segment(1) == 'layanan') active @endif" aria-current="page">Layanan</a></li>
        <li class="nav-item"><a href="/sesi/logout" class="nav-link">Logout</a></li>
    </ul>
</header>
