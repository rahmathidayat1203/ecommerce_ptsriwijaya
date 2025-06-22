<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Navbar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            backdrop-filter: blur(10px);
            border: none;
            box-shadow: 0 8px 32px rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }

        .navbar-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            z-index: -1;
        }

        .navbar-brand-modern {
            font-weight: 700;
            color: white !important;
            font-size: 1.4rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand-modern:hover {
            transform: translateY(-1px);
            color: #f8f9ff !important;
        }

        .brand-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .navbar-brand-modern:hover .brand-icon {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(5deg);
        }

        .hamburger-btn {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 12px;
            padding: 10px 12px;
            transition: all 0.3s ease;
        }

        .hamburger-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateY(-1px);
        }

        .welcome-text {
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 16px;
            border-radius: 25px;
            color: white;
            font-size: 0.9rem;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #ff6b6b, #feca57);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 8px;
        }

        .logout-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(238, 90, 82, 0.3);
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #ee5a52, #ff6b6b);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(238, 90, 82, 0.4);
        }

        .navbar-nav-item {
            margin: 0 5px;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        /* Sidebar styles */
        .sidenav {
            width: 250px;
            transition: all 0.3s ease;
            z-index: 1040;
            top: 80px;
        }

        .sidenav-header {
            padding: 1rem;
        }

        .sidenav .navbar-brand {
            font-weight: 700;
            color: #333 !important;
        }

        .sidenav .nav-link {
            color: #333;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .sidenav .nav-link:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .sidenav .nav-link i {
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

        .sidenav .text-uppercase {
            color: #666;
            padding-left: 1.5rem;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .sidenav {
                transform: translateX(-100%);
                position: fixed;
                height: calc(100vh - 80px);
                overflow-y: auto;
            }

            .sidenav.show {
                transform: translateX(0);
            }

            .welcome-text {
                display: none !important;
            }

            .navbar-brand-modern {
                font-size: 1.2rem;
            }
        }

        @media (min-width: 992px) {
            .sidenav {
                transform: translateX(0);
            }

            .hamburger-btn {
                display: none !important;
            }
        }

        /* Scrolled state */
        .navbar-scrolled {
            background: rgba(102, 126, 234, 0.95) !important;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.2);
        }
    </style>
</head>

<body style="background: linear-gradient(135deg, #f5f7ff 0%, #e8ecff 100%); min-height: 100vh; padding-top: 100px;">
    <nav class="navbar navbar-modern navbar-expand-lg px-4 py-3 position-fixed w-100 top-0" style="z-index: 1050;"
        id="mainNavbar">
        <div class="container-fluid">
            <!-- Tombol Hamburger -->
            <button class="btn hamburger-btn me-3" type="button" id="sidebarToggle" aria-label="Toggle Sidebar">
                <i class="fas fa-bars fs-5" id="hamburgerIcon"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand-modern d-flex align-items-center" href="#" onclick="return false;">
                <div class="brand-icon me-3">
                    <i class="fa-solid fa-store fs-4"></i>
                </div>
                <div>
                    <div style="font-size: 1.4rem; line-height: 1.2;">Ecommerce</div>
                    <div style="font-size: 0.8rem; opacity: 0.9; font-weight: 400;">Admin Panel</div>
                </div>
            </a>

            <!-- Navbar Right -->
            <div class="ms-auto d-flex align-items-center">
                <!-- Welcome Text -->
                <div class="welcome-text me-3 d-none d-md-flex align-items-center">
                    <div class="user-avatar">
                        <i class="fa-solid fa-user fs-6"></i>
                    </div>
                    <div>
                        <div style="font-size: 0.75rem; opacity: 0.8;">Selamat datang</div>
                        <div style="font-weight: 600; line-height: 1;">Admin User</div>
                    </div>
                </div>
                <!-- Logout Button -->
                <form id="logout-form" action="#" method="GET" class="mb-0 ms-3 d-flex align-items-center">
                    <button type="submit" class="btn logout-btn" onclick="handleLogout()">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html"
                target="_blank">
                <span class="ms-1 font-weight-bold">PT. Sriwijaya Mega Wisata</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <span class="nav-link-text ms-1">Order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <span class="nav-link-text ms-1">Payment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Jamaah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <span class="nav-link-text ms-1">Review</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pendaftaran Haji</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="text-center me-2 ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Role</a>
                </li>
            </ul>
        </div>
    </aside>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hamburger menu toggle animation and sidebar toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidenav-main');
        const hamburgerIcon = document.getElementById('hamburgerIcon');

        sidebarToggle.addEventListener('click', function() {
            // Toggle sidebar visibility
            sidebar.classList.toggle('show');

            // Toggle hamburger icon
            hamburgerIcon.classList.toggle('fa-bars');
            hamburgerIcon.classList.toggle('fa-times');

            // Add pulse animation
            this.classList.add('pulse-animation');
            setTimeout(() => {
                this.classList.remove('pulse-animation');
            }, 600);
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function Anno: function(event) {
            if (window.innerWidth <= 991 && sidebar.classList.contains('show') && !sidebar.contains(event.target) &&
                !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
                hamburgerIcon.classList.add('fa-bars');
                hamburgerIcon.classList.remove('fa-times');
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Logout function
        function handleLogout() {
            const btn = event.currentTarget;
            const originalHTML = btn.innerHTML;
            btn.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin me-2"></i><span class="d-none d-sm-inline">Keluar...</span>';
            btn.disabled = true;

            setTimeout(() => {
                alert('Logout berhasil! (Demo)');
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            }, 1500);
        }

        // Add interactive effects
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });

            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>

</html>
