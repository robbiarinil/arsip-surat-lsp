<div class="d-flex flex-column p-3 text-white" style="width: 250px; min-height: 100vh; background-color: #0d6efd;">
    <h4 class="text-center mb-1">Menu</h4>
    <hr class="border border-light border-1 opacity-100 mb-3">

    <ul class="nav nav-pills flex-column mb-3">
        <li class="nav-item mb-2">
            <a href="{{ route('arsip.index') }}" class="nav-link text-white">
                <i class="bi bi-star me-2"></i> Arsip
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('kategori.index') }}" class="nav-link text-white">
                <i class="bi bi-folder me-2"></i> Kategori Surat
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ url('/about') }}" class="nav-link text-white">
                <i class="bi bi-info-circle me-2"></i> About
            </a>
        </li>
    </ul>
</div>
