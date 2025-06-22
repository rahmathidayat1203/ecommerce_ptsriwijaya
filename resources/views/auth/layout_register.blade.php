<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/argon/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/argon/assets/img/favicon.png">
    <title>
        PT. Sriwijaya Mega Wisata
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="/argon/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
    @laravelPWA

</head>

<body class="">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('/argon/assets/img/megawisata.jpeg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">PT. Sriwijaya Mega Wisata</p>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </main>


    <!--   Core JS Files   -->
    <script src="/argon/assets/js/core/popper.min.js"></script>
    <script src="/argon/assets/js/core/bootstrap.min.js"></script>
    <script src="/argon/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/argon/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/argon/assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>
