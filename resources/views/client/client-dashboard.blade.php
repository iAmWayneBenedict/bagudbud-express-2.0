<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
@extends('layouts.dashboardNav')

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
@section('content')

            <div class="page-heading">
                <h3 class="text-black">Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                    <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="card card-button add-delivery">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon bg-primary">
                                                    <img src="{{ asset('img/add-circle.svg') }}" class="w-50" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="font-bold text-black">Add Request</h6>
                                                <!-- <h6 class="font-extrabold mb-0">112.000</h6> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-4">
                                <div class="card card-button pending-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <img src="{{ asset('img/time-square 1.svg') }}" class="w-50" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pending Requests</h6>

                                                <!-- Insert Pending Count -->

                                                <h5 class="font-extrabold mb-0 text-black"><span id="numPending"></span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-4">
                                <div class="card card-button active-deliveries-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <img src="{{ asset('img/package(1).svg') }}" class="w-50" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Accepted Requests</h6>

                                                <!-- Insert Active Deliveries Count -->

                                                <h5 class="font-extrabold mb-0 text-black"><span id="numAccepted"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 d-none d-lg-flex">
                                <div class="card w-100">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                {{-- <img src="{{ asset('img/faces/1.jpg') }}" alt="Face 1"> --}}
                                            @if (empty($user_data->profile_pic))
                                                 <img src="{{ asset('img/faces/1.jpg') }}" alt="Face 1">
                                            @else
                                                <img src="{{ asset('img/faces/'.$user_data->profile_pic.'.jpg') }}" alt="Face 1">                              
                                            @endif
                                            </div>
                                            <div class="ms-3 name">

                                                <!-- Insert Client Name -->

                                                <h5 class="font-bold text-black">{{ $user_data->f_name}}</h5>

                                                <!-- Insert Client Email -->

                                                <h6 class="text-muted mb-0">{{ $user_data->business_name}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header  d-flex justify-content-between">
                                        <h4 class="text-black">Pending Deliveries</h4>
                                    </div>
                                    <div class="px-5 mx-md-3 mb-5">
                                        <table class="table table-hover table-container">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Recipient</th>
                                                    <th scope="col" class="text-center">Delivery Fee</th>
                                                    <th scope="col" class="text-end">Date Added</th>
                                                </tr>
                                            </thead>
                                            <tbody id="userTable">

                                                <!-- item start -->
                                                <!-- change the aria-label. change the number only based on the id in db ex. for the next item data-label="item-2" -->
                                            </tbody>
                                        </table>
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
                $(document).ready(function () {
                    // reloadTable()
                    // displayCountPending()
                    // displayCountAccepted()

                    //  setInterval(() => {
                    //     reloadTable();
                    //     displayCountPending();
                    //     displayCountAccepted();
                    // }, 1000)

                    function reloadTable() {
                    $.ajax({
                        type: 'ajax',
                        url: "displayRequest",
                        async: true,
                        success: function (data) {
                        $('#userTable').html(data);

                        let getUrl = window.location;
                            let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
                            let currentUrl = getUrl.pathname.split('/')[2];
                            $('.items').each(function() {
                                $(this).click(function() {
                                    // delivery details path
                                    let id = $(this).attr('data-label').split('-')[1];
                                    location.href = `${baseUrl}/client-dashboard/${currentUrl}/${id}`;
                                });
                            });
                        }
                    })
                    }

                    function displayCountPending() {
                    $.ajax({
                        type: 'ajax',
                        url: "countPending",
                        async: true,
                        dataType: 'json',
                        success: function (data) {
                            $('#numPending').html(data.result);
                        }
                    });
                    }

                    function displayCountAccepted() {
                    $.ajax({
                        type: 'ajax',
                        url: "countAccepted",
                        async: true,
                        dataType: 'json',
                        success: function (data) {
                            $('#numAccepted').html(data.result);
                        }
                    });
                    }

                 });
            </script>

@endsection