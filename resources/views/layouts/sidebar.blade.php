<aside id="sidenav-main" class="sidenav d-none d-lg-block bg-white ...">
    <!-- Sidebar content -->
</aside>


<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <span class="ms-1 font-weight-bold">PT. Sriwijaya Mega Wisata</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                    <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-gauge"></i>

                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>


            @can('produk-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('produks.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produk</span>
                    </a>
                </li>
            @endcan

            @can('kategori-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('kategoris.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kategori</span>
                    </a>
                </li>
            @endcan

            @can('order-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('orders.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <span class="nav-link-text ms-1">Order</span>
                    </a>
                </li>
            @endcan

            @can('payment-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('payments.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <span class="nav-link-text ms-1">Payment</span>
                    </a>
                </li>
            @endcan

            @can('pembeli-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('pembelis.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Jamaah</span>
                    </a>
                </li>
            @endcan
            {{-- @can('pengiriman-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('pengirimans.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengiriman</span>
                    </a>
                </li>
            @endcan --}}

            @can('review-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('reviews.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <span class="nav-link-text ms-1">Review</span>
                    </a>
                </li>
            @endcan

            @can('review-list')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('pendaftaranhajis.index') }}">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pendaftaran Haji</span>
                    </a>
                </li>
            @endcan


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('profile') }}">
                    <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role </a></li>


            <form id="logout-form" action="{{ route('logout') }}" method="GET"
                class="mb-0 ms-3 d-flex align-items-center">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm px-4">Logout</button>
            </form>
        </ul>
    </div>
</aside>
