<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
@extends('layouts.dashboardNav')

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
@section('content')
<?php     
        // foreach ($request as $row){

        // $date = date_create($row['cancelsuccess_date']);
        // $xdate = date_format($date, "F j, Y, g:i a"); 
?>

            <div class="page-heading">
                <h3 class="text-black">Deliveries</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-4 bg-transparent d-flex justify-content-between">
                                <h4 class="text-black">Cancelled Deliveries</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-headers row">
                                    <div class="col-8 mb-4">
                                        <button class="btn back-btn d-inline-flex align-items-center p-0">
                                            <i class="fas fa-arrow-left"></i>
                                            <span class="font-semibold ms-2">Back</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-11">
                                        <div class="details-container">
                                            <div class="notif-header  border-bottom border-secondary mt-3 pb-2">
                                                <div class="request-item-content w-100 mx-4 pe-5">
                                                    <div class="left-content">

                                                        <!-- Delivery man or Recipient -->

                                                        <p class="display-5 text-primary fw-bold m-0">recepient_name</p>

                                                        <!-- Recipient Address -->

                                                        <span class="display-7">recepient_address, recepient_municipality</span>
                                                    </div>

                                                        <!-- Date cancelled -->

                                                    <div class="right-content">
                                                        <span class="display-7">June 20, 2022</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notif-body mt-5 px-sm-5 pb-5">
                                                <p style="text-indent:2rem">Your Package has been cancelled by <b>delP_fName. delP_lName</b> your Delivery Man. Your package will originally send to <b>recepient_name</b> at <b>recepient_address, recepient_municipality</b> but it was cancelled due to a reason : <i style="letter-spacing: 2px;">reason.</i></p>
                                                <p>Your package will be returned on your address within the day.</p>
                                                <p>Thank you</p>
                                                <!-- <p class="pt-5">Kindly click the button below to contact the customer support to address your concerns.</p>
                                                <a href="#" class="btn btn-primary">Customer Support</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end me-sm-5">
                                        <form action="" method="POST" class="me-sm-5" id="cancel-delete">
                                            <button class="btn btn-danger px-4 mb-5 mx-sm-5" type="submit">Delete</button>
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
            <script src="{{ asset('js/dashboard.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    // alert('ok');
                    $('#cancel-delete').submit(function (e) { 
                        e.preventDefault();
                        // chnage ////////
                       var req_id = 'req_id'
                        
                       $.ajax({
                           type: "post",
                           // chnage ////////
                           url: "deleteCancel",
                           data: {
                               req_id: req_id
                           },
                           dataType: "json",
                           success: function (res) {
                               if(res.code == 202){
                                    let getUrl = window.location;
                                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
                                    let currentUrl = getUrl.pathname.split('/')[2];
                                    location.href = `${baseUrl}client-dashboard/${currentUrl}`;
                               }
                           }
                       });
                    });
                });
                $(() => {
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
                    let currentUrl = getUrl.pathname.split('/')[2];
                    $('.back-btn').click(() => {
                        console.log('1')
                        location.href = `${baseUrl}client-dashboard/${currentUrl}`;
                    })
                })
            </script>

@endsection
<?php 
// } 
?>