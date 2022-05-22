<!--
 Extends the base_no_nav.php that has the header and footer
-->
@extends('layouts.dashboardNavRider')

<!--
 Inserts the whole section to the base_no_nav.php
 -->
@section('content')
    <div class="page-heading">
        <h3 class="text-black">Profile</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-transparent pt-4 d-flex justify-content-between">
                        <h4 class="text-black">My Profile</h4>
                    </div>
                    <div class="card-body position-relative" style="max-width: 50rem; width: 100%">
                        <form action="" method="post" id="profile-form">
                            @csrf
                            <div class="inner-container px-3 px-lg-5 d-flex flex-column align-items-center">
                                <div class="profile-con avatar avatar-xxl border border-2 border-primary position-relative">
                                    <img class="profile-avatar-image" src="{{ asset("img/faces/".$c_data->profile_pic) }}.jpg" alt="Face 1">
                                    <div
                                        class="overlay position-absolute w-100 h-100 rounded-circle overflow-hidden d-flex justify-content-center align-items-center">
                                        <span class="fw-bold" style="opacity: 0.7;">Change Profile Image</span>
                                    </div>
                                    <div class="con position-absolute translate-middle" style="top: 90%; right: -5%;">
                                        <div class="c bg-primary rounded-circle d-flex justify-content-center align-items-center"
                                            style="width: 2rem; height: 2rem">
                                            <i class="bi bi-pencil-fill text-white display-8"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-lg-2 w-100 mt-5">

                                    <!-- First name -->

                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="f_name"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">First
                                                Name</label>
                                            <input type="text" name="f_name"
                                                class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary"
                                                id="f_name" placeholder="First Name" value="{{ $c_data->f_name }}">
                                        </div>
                                    </div>

                                    <!-- Last Name -->

                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="l_name"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Last
                                                Name</label>
                                            <input type="text" name="l_name"
                                                class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary"
                                                id="l_name" placeholder="Last Name" value="{{ $c_data->l_name }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->

                                <div class="row w-100">
                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="email"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Email</label>
                                            <input type="email" name="email"
                                                class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary"
                                                id="email" placeholder="Email" value="{{ $c_data->email }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone Number -->

                                <div class="row w-100">
                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="contact_num"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone
                                                Number</label>
                                            <input type="number" name="contact_num"
                                                class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary"
                                                id="contact_num" placeholder="Phone Number" value="{{ $c_data->contact_num }}">
                                            <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                                message!</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-lg-2 w-100">

                                    <!-- Municipality -->

                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="municipality"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                            <select
                                                class="form-select form-select-sm py-2 fw-lighter border-primary bg-light-primary select-input"
                                                aria-label=".form-select-sm example" name="municipality" id="municipality"> 
                                                    <option selected >{{$c_data->municipality}}</option>
                                                    <option value="Baao">Baao</option>
                                                    <option value="Bato">Bato</option>
                                                    <option value="Balatan">Balatan</option>
                                                    <option value="Bula">Bula</option>
                                                    <option value="Buhi">Buhi</option>
                                                    <option value="Nabua">Nabua</option>
                                                    <option value="Iriga City">Iriga City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Address -->

                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="address"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Zone/street,
                                                Barangay</label>
                                            <input type="text" name="address"
                                                class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary"
                                                id="address" placeholder="Zone/street, Barangay" value="{{ $c_data->address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100">
                                    <div class="col">
                                        <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                            <label for="vehicle-type"
                                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Vehicle
                                                Type</label>
                                            <select
                                                class="form-select form-select-sm py-2 fw-lighter border-primary bg-light-primary select-input"
                                                aria-label=".form-select-sm example" name="vehicle_type" id="vehicle-type"">
                                                <option selected >{{$c_data->vehicle_type}}</option>
                                                <option value="Motorcycle">Motorcycle</option>
                                                <option value="Bicycle">Bicycle</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 w-100">
                                    <!-- Profile avatar -->
                                    <input type="hidden" name="profile_pic" id="profile-avatar" value="1">

                                    <!-- Submit btn -->
                                    <input type="submit" class="btn btn-primary px-5 py-2" value="Save">
                                </div>
                            </div>
                        </form>
                        <div class="avatar-container d-none bg card" style="max-width: 35rem; width: 100%">
                            <div class="p-4">
                                <h5 class="text-black pb-4">Choose Avatar</h5>
                                <form action="" method="post" id="avatar-form" class="d-flex flex-column">
                                    <div class="row">
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/1.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="1">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/2.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="2">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/3.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="3">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/4.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="4">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/5.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="5">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/6.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="6">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/7.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="7">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                            <div class="avatar-con avatar avatar-xl2 position-relative">
                                                <img src="{{ asset('img/faces/8.jpg') }}" alt="Face 1">
                                                <input type="radio" name="avatar" id="avatar-icons" value="8">
                                                <span class="border-overlay"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mt-5 py-2">Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">
        $(() => {

            // to exit or close the profile choices 
            $(document).click((event) => {
                if (event.target.tagName === 'BODY') {
                    $('.avatar-container').addClass('d-none');
                    $('body').removeClass('popup-blur-active');
                }

            })

            // gets the current profile from the first child element of profile-con
            let $currentProfile = $('.profile-con').children().first()
            $('.profile-con').click(() => {
                // display the profile choices by removing the class of d-none
                $('.avatar-container').removeClass('d-none');
                $('body').addClass('popup-blur-active');

                // get all the input fields with the attribute of avatar
                let $inputs = $('input[name=avatar')
                // loop through the inputs then set the avatar active
                $inputs.each(function() {

                    $(this).change(function() {
                        $inputs.each(function() {
                            $(this).next().removeClass('active')
                        })
                        $(this).attr('selected', 'true')
                        $(this).next().addClass('active')
                    })
                    if ($(this).val() === $currentProfile.attr('src')) {
                        $(this).attr('selected', 'true')
                        $(this).next().addClass('active')

                    }
                })
            })

            // change profile avatar 
            $('#avatar-form').submit(function(e) {
                e.preventDefault();
                let $data = $('#avatar-form').serializeArray()

                // insert img src on success
                $currentProfile.attr('src', "{{ asset('img/faces') }}" +
                    "/" + $data[0].value + ".jpg")
                $('#profile-avatar').val($data[0].value);
                setTimeout(() => {
                    $('.avatar-container').addClass('d-none');
                    $('body').removeClass('popup-blur-active');
                }, 150)
            })

            $('#search').keyup(function() {
                const $des = $('.no-request').prev();
                if (!$(this).val()) {
                    $des.removeClass('d-none');
                    $des.nextAll().each(function() {
                        $(this).addClass('d-none')
                    })
                } else {
                    $des.addClass('d-none');

                }
            })

            $('#search-form').submit(function(event) {
                event.preventDefault();

                if ($('#search').val()) {
                    $('.no-request').addClass('d-none')
                    $('.result').removeClass('d-none')

                } else {
                    $('.no-request').removeClass('d-none')
                    $('.result').addClass('d-none')
                    $('.no-request').prev().addClass('d-none');
                }
            })

            
        })

        $(document).ready(function() {
            

            // $('#profile-form').submit(function(e) {
            //     e.preventDefault();

            //     if (bool_number) {
            //         var data = new FormData(this);
            //         $.ajax({
            //             type: "post",
            //             url: "RiderProfile/editProfile",
            //             data: data,
            //             dataType: "json",
            //             contentType: false,
            //             cache: false,
            //             processData: false,
            //             success: function(res) {
            //                 console.log(res);
            //                 if (res.code == 505) {
            //                     Swal.fire({
            //                         icon: 'error',
            //                         title: 'Oops...',
            //                         text: res.msg
            //                     });
            //                 } else {
            //                     const Toast = Swal.mixin({
            //                         toast: true,
            //                         position: 'top-end',
            //                         showConfirmButton: false,
            //                         timer: 2000,
            //                         timerProgressBar: false,
            //                         didOpen: (toast) => {
            //                             toast.addEventListener('mouseenter', Swal
            //                                 .stopTimer)
            //                             toast.addEventListener('mouseleave', Swal
            //                                 .resumeTimer)
            //                         }
            //                     })

            //                     Toast.fire({
            //                         icon: 'success',
            //                         title: res.msg
            //                     }).then(function() {
            //                         // $(this)[0].reset();
            //                         // $('body').removeClass('popup-blur-active');
            //                         // $('.popup-container').removeClass('popup-active');
            //                         // window.location.reload();
            //                     });
            //                 }
            //             }
            //         });
            //     } else {
            //         Swal.fire({
            //             icon: 'error',
            //             title: 'Oops...',
            //             text: 'Something went wrong!'
            //         });
            //     }
            // });


            // alert('ok');
        });
    </script>
@endsection
