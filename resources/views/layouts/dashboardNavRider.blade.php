<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bagudbud Express') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/iconBagudbud.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- bootstrap icon cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <!-- JQuery Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"
        integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

</head>

<body class="position-relative">
    <div id="app" class="d-nones d-sm-block">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active position-fixed">
                <div class="sidebar-header">
                    <div class="">
                        <div class="logo d-flex">
                            <a href="index.html" class="w-100"><img
                                    src="{{ asset('img/Artboard 12@72x-8.png') }}" alt="Logo" srcset=""
                                    class="h-50"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="profile sidebar-item has-sub">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item edit-profile">
                                    <a href="/rider-profile">My Profile</a>
                                </li>
                                <li class="submenu-item password-and-security">
                                    <a href="">Password and
                                        Security</a>
                                </li>
                                <li class="submenu-item delete-account">
                                    <a href="/rider-delete-account" id="delete-acc">Delete Account</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="" class="text-danger">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dashboard sidebar-item">
                            <a href="/rider-dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="deliveries sidebar-item">
                            <a href="/rider-accepted" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Deliveries</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3 d-flex justify-content-between align-items-center">
                <a href="#" class="burger-btn d-inline-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div
                class="popup-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
                <div class="col-11 col-md-9 col-lg-8 col-xl-6 col-xxl-5 p-4 card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            @yield('content')


        </div>
    </div>
    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
    <!-- Scripts -->
    <script type="text/javascript">
        $(document).ready(function() {
            reloadTable();

            function reloadTable() {
                $.ajax({
                    type: 'ajax',
                    url: "displayAllRequest",
                    async: true,
                    success: function(data) {
                        $('.userTable').html(data);
                        let getUrl = window.location;
                        let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                        let currentUrl = getUrl.pathname.split('/')[3];
                        $('.items').each(function() {
                            $(this).click(function() {
                                // delivery details path
                                let id = $(this).attr('data-label').split('-')[1];
                                location.href =
                                    `${baseUrl}/rider-dashboard/${currentUrl}/${id}`;
                            });
                        });
                    }
                })
            }
        });
        $(() => {

            let getUrl = window.location;
            let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
            let currentUrl = getUrl.pathname.split('/')[3];
            $('.items').each(function() {
                $(this).click(function() {
                    // delivery details path
                    let id = $(this).attr('data-label').split('-')[1];
                    location.href = `${baseUrl}/rider-dashboard/${currentUrl}/${id}`;
                });
            });

            // implement active functionality in sidebaar
            if (currentUrl === 'requests') {
                $('.menu').children().not($('.dashboard')).each(function() {
                    $(this).removeClass('active')
                })
                $('.dashboard').addClass('active')
            } else if (currentUrl === 'deliveries') {
                $('.menu').children().not($('.deliveries')).each(function() {
                    $(this).removeClass('active')
                })
                $('.deliveries').addClass('active')
            } else if (currentUrl === 'profile') {
                $('.menu').children().not($('.profile')).each(function() {
                    $(this).removeClass('active')
                })
                $('.profile, .edit-profile').addClass('active')
                $('.profile').find('ul').addClass('active')
            } else if (currentUrl === 'password-and-security') {
                $('.menu').children().not($('.password-and-security')).each(function() {
                    $(this).removeClass('active')
                })
                $('.profile, .password-and-security').addClass('active')
                $('.profile').find('ul').addClass('active')
            } else if (currentUrl === 'delete-account') {
                $('.menu').children().not($('.delete-account')).each(function() {
                    $(this).removeClass('active')
                })
                $('.profile, .delete-account').addClass('active')
                $('.profile').find('ul').addClass('active')
            }

            // end

            $('#delete-acc').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3CD87A',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continue!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "post",
                            url: "deleteAccount",
                            data: '',
                            dataType: "json",
                            success: function(res) {
                                if (res.code == 202) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your account has been deleted.',
                                        'success'
                                    ).then(function() {
                                        location.href =
                                            "/rider-login";
                                    })
                                } else if (res.code == 404) {
                                    Swal.fire(
                                        'Oops!',
                                        res.msg,
                                        'warning'
                                    )
                                } else if (res.code == 204) {
                                    Swal.fire(
                                        'Oops!',
                                        res.msg,
                                        'warning'
                                    )
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>

</body>

</html>
