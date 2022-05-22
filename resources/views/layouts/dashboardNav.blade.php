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
    <div id="app" class="d-none d-sm-block">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active position-fixed">
                <div class="sidebar-header">
                    <div class="">
                        <div class="logo d-flex">
                            <a href="{{url('client-dashboard')}}" class="w-100"><img
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
                                    <a href="/client-dashboard/profile">My Profile</a>
                                </li>
                                <li class="submenu-item password-and-security">
                                    <a href="/client-dashboard/password-and-security">Password and
                                        Security</a>
                                </li>
                                <li class="submenu-item delete-account">
                                    <a id="delete-acc" style="cursor: pointer">Delete Account</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/c_logout" class="text-danger">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dashboard sidebar-item">
                            <a href="/client-dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="deliveries sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Deliveries</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item success">
                                    <a href="/client-dashboard/success">Success Requests</a>
                                </li>
                                <li class="submenu-item cancelled">
                                    <a href="/client-dashboard/cancelled">Cancelled Requests</a>
                                </li>
                            </ul>
                        </li>
                        <li class="notifications sidebar-item">
                            <a href="/client-dashboard/notifications" class='sidebar-link position-relative'>
                                <i class="bi bi-bell-fill"></i>
                                <span class="position-relative">
                                    Notifications
                                </span>
                                <span
                                    class="notif-count position-absolute top-10 start-0 translate-middle badge rounded-pill bg-danger d-none display-9">
                                    <span class="visually-hidden">unread notifications</span>
                                </span>
                            </a>
                        </li>
                        <li class="tracking sidebar-item">
                            <a href="/client-dashboard/tracking" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Tracking</span>
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
                        <form method="post" action="" class="" id="req-form">
                            <div class="d-inline-flex">
                                <h5 class="card-title position-relative title text-black"><span
                                        class="add-request-title">Add</span> Request</h5>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">

                                <!-- name -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="name"
                                            class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Recepient
                                            Name</label>
                                        <input type="text" name="name"
                                            class="form-control form-control-sm py-2 fw-lighter" id="name"
                                            placeholder="Name">
                                    </div>
                                </div>

                                <!-- Phone number -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="phone-number"
                                            class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone
                                            Number</label>
                                        <input type="number" name="phone-number"
                                            class="form-control form-control-sm py-2 fw-lighter" id="phone-number"
                                            placeholder="Phone Number">
                                        <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                            message!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">

                                <!-- address -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="address"
                                            class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Address</label>
                                        <input type="text" name="address"
                                            class="form-control form-control-sm py-2 fw-lighter" id="address"
                                            placeholder="Zone or Street / Barangay">
                                    </div>
                                </div>

                                <!-- Minicipality -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="Municipality"
                                            class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                        <select class="form-select form-select-sm py-2 fw-lighter"
                                            aria-label=".form-select-sm example" name="Municipality" id="Municipality">
                                            <option selected value="--Select--">--Select--</option>
                                            <option value="Baao">Baao</option>
                                            <option value="Bato">Bato</option>
                                            <option value="Balatan">Balatan</option>
                                            <option value="Bula">Bula</option>
                                            <option value="Buhi">Buhi</option>
                                            <option value="Nabua">Nabua</option>
                                            <option value="Iriga City">Iriga City</option>
                                        </select>
                                        <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                            message!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">

                                <!-- address -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="product-name"
                                            class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Product
                                            Name</label>
                                        <input type="text" name="product-name"
                                            class="form-control form-control-sm py-2 fw-lighter" id="product-name"
                                            placeholder="Product Name">
                                    </div>
                                </div>

                                <!-- Minicipality -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="product-price"
                                            class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Product
                                            Price</label>
                                        <input type="text" name="product-price"
                                            class="form-control form-control-sm py-2 fw-lighter" id="product-price"
                                            placeholder="Product Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                    <label for="product-name"
                                        class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Delivery
                                        Mode of Payment</label>
                                    <select class="form-select form-select-sm py-2 fw-lighter"
                                        aria-label=".form-select-sm example" name="payment">
                                        <option selected value="COD">Cash On Delivery (COD)</option>
                                        <option value="COP">Cash on Pickup (COP)</option>
                                    </select>
                                    <span class="method-description display-8 mt-3 text-muted">Cash on Delivery provides
                                        lorem ipsum dolor sit amet consectetur adipisicing elit. Officia eveniet esse
                                        fugiat ex.</span>
                                    <span class="method-description display-8 mt-3 text-muted d-none">Cash on Pickup
                                        implements lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
                                        eveniet esse fugiat ex.</span>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="reset"
                                    class="btn cancel-btn btn-outline-primary text-secondary">Cancel</button>

                                <!-- Submit btn -->

                                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                                <input type="submit" class="btn btn-primary" value="Done">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <main>
                @yield('content')
            </main>


        </div>
    </div>
    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
    
    <script type="text/javascript">
        $(() => {
            let getUrl = window.location;
            let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
            let currentUrl = getUrl.pathname.split('/')[2];
            $('.items').each(function() {
                $(this).click(function() {
                    // delivery details path
                    let id = $(this).attr('data-label').split('-')[1];
                    location.href = `${baseUrl}client-dashboard/${currentUrl}/${id}`;
                });
            });
            // implement active functionality in sidebaar
            if (currentUrl === undefined || currentUrl === 'deliveries') {
                $('.menu').children().not($('.dashboard')).each(function() {
                    $(this).removeClass('active')
                })
                $('.dashboard').addClass('active')
            } else if (currentUrl === 'tracking') {
                $('.menu').children().not($('.tracking')).each(function() {
                    $(this).removeClass('active')
                })
                $('.tracking').addClass('active')
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
            } else if (currentUrl === 'notifications') {
                $('.menu').children().not($('.notifications')).each(function() {
                    $(this).removeClass('active')
                })
                $('.notifications').addClass('active')
            } else if (currentUrl === 'success') {
                $('.menu').children().not($('.success')).each(function() {
                    $(this).removeClass('active')
                })
                $('.deliveries, .success').addClass('active')
                $('.deliveries').find('ul').addClass('active')
            } else if (currentUrl === 'cancelled') {
                $('.menu').children().not($('.cancelled')).each(function() {
                    $(this).removeClass('active')
                })
                $('.deliveries, .cancelled').addClass('active')
                $('.deliveries').find('ul').addClass('active')
            }

            // end

            $('.add-delivery').click(() => {
                $('.add-request-title').text('Add')
                // redirect to add deliveries
                // location.href = ${baseUrl}/client-dashboard/add-deliveries
                $('.popup-container').addClass('popup-active');
                $('body').addClass('popup-blur-active');
            })
            $('.pending-btn').click(() => {
                // redirect to pending page
                location.href = `${baseUrl}client-dashboard`;
            })
            $('.active-deliveries-btn').click(() => {
                // redirect to deliveries page
                location.href = `${baseUrl}client-dashboard/deliveries`;
            })

            let requestID = null;
            $('.cancel-btn').click(() => {
                $('body').removeClass('popup-blur-active');
                $('.popup-container').removeClass('popup-active');
                $('body').removeClass('freeze');
                requestID = null;
            })
            // console.log($('.add-delivery'))
            // $('.modal').modal('show');

            $('.method-description').prev('select').change(function() {
                if ($(this).val() === 'COD') {
                    $('.method-description').first().removeClass('d-none');
                    $('.method-description').last().addClass('d-none');
                } else {
                    $('.method-description').last().removeClass('d-none');
                    $('.method-description').first().addClass('d-none');
                }
            })

            // Edit request

            $('.edit-request-btn').click(function() {
                $('.add-request-title').text('Edit')
                $('.popup-container').addClass('popup-active');
                $('body').addClass('popup-blur-active');
                if ($(document).innerWidth() <= 576) {
                    $('.popup-container').children().first().removeClass('p-4')
                    $('body').addClass('freeze');
                } else {
                    $('.popup-container').children().first().addClass('p-4')
                }
                requestID = {
                    requestID: getUrl.pathname.split('/')[4]
                };


                const $parent = $('.popup-container');

            });

            var bool_number = true;
            var bool_muni = true;

            $('#phone-number').keyup(function(e) {
                var num = $(this).val();
                var filter = /^(09)\d{9}$/;

                if (filter.test(num)) {
                    // alert('ok');
                    $(this).next().text('').addClass('d-none');
                    bool_number = true;
                } else {
                    // alert('no');
                    $(this).next().text('Invalid Number').removeClass('d-none');
                    bool_number = false;
                }
            });

            $("input").attr("required", true);
            $("select").attr("required", true);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //delete account.. direct from server
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
                        console.log(1)
                        $.ajax({
                            type: "get",
                            url: '{{ route('user_delete')}}',
                            data: '',
                            dataType: "json",
                            success: function(res) {
                                console.log(res)
                                if (res.code == 200) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your account has been deleted.',
                                        'success'
                                    ).then(function() {
                                        location.href = '{{ url('client-login') }}';
                                    })
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
