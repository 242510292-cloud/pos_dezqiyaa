<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4 custom-navbar">

    <div class="container-fluid">

        {{-- LOGO + POS --}}
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ url('/dashboard') }}">

            <img src="{{ asset('images/logo2.jpg') }}"
                 alt="Logo POS"
                 class="navbar-logo">

            <span>POS</span>

        </a>


        {{-- TOMBOL MOBILE --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                       <i class="bi bi-house-heart-fill"></i>
                        Dashboard
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users') }}">
                        <i class="bi bi-person-vcard-fill"></i>
                        Users
                    </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('jenis-produk.index') }}">
                         <i class="bi bi-tags me-2"></i>
                        Jenis Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/produk') }}">
                         <i class="bi bi-box-seam me-2"></i>
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/penjualan') }}">
                        <i class="bi bi-cart-check me-2"></i>
                        Penjualan
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}">
                         <i class="bi bi-person-vcard me-2"></i>
                        Tentang
                    </a>
                </li>

            </ul>


            {{-- LOGOUT --}}
            @auth

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit"
                            class="btn btn-info text-white fw-bold">

                        Logout

                    </button>

                </form>

            @endauth

        </div>

    </div>

</nav>


<style>

/* =========================================
   NAVBAR UTAMA
   ========================================= */

.custom-navbar {

    width: calc(100vw - 220px) !important;

    max-width: none !important;

    position: relative !important;

    left: 50% !important;

    transform: translateX(-50%) !important;

    margin-left: 0 !important;

    margin-right: 0 !important;

    /* Jarak navbar dari atas */
    margin-top: 24px !important;

    border-radius: 0 !important;

}


/* =========================================
   CONTAINER NAVBAR
   ========================================= */

.custom-navbar .container-fluid {

    width: 100% !important;

    max-width: none !important;

    padding-left: 12px !important;

    padding-right: 12px !important;

}


/* =========================================
   LOGO
   ========================================= */

.custom-navbar .navbar-logo {

    width: 38px;

    height: 38px;

    object-fit: contain;

    margin-right: 10px;

}


/* =========================================
   POS
   ========================================= */

.custom-navbar .navbar-brand {

    margin-right: 20px !important;

    display: flex;

    align-items: center;

}


/* =========================================
   MENU
   ========================================= */

.custom-navbar .nav-link {

    padding-left: 8px !important;

    padding-right: 8px !important;

}


/* =========================================
   LOGOUT
   ========================================= */

.custom-navbar .btn {

    padding: 8px 14px !important;

    border-radius: 10px !important;

}


/* =========================================
   TABLET
   ========================================= */

@media (max-width: 1200px) {

    .custom-navbar {

        width: calc(100vw - 80px) !important;

    }

}


/* =========================================
   HP
   ========================================= */

@media (max-width: 768px) {

    .custom-navbar {

        width: calc(100vw - 30px) !important;

    }

}


/* =========================================
   HP KECIL
   ========================================= */

@media (max-width: 576px) {

    .custom-navbar {

        width: 100vw !important;

        margin-top: 15px !important;

    }

}

</style>