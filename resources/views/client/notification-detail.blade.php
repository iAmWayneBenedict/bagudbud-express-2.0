<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
@extends('layouts.dashboardNavRider')

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
@section('content')
<?php    
        // foreach($result as $row){

        // $date = date_create($row['ndate']);
        // $xdate = date_format($date, "F j, Y, g:i a");
?>

            <div class="page-heading">
                <h3 class="text-black">Notifications</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pt-4 bg-transparent d-flex justify-content-between">
                                <h4 class="text-black">All Notifications</h4>
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
                                                {{-- // change ////////// --}}
                                                <span class="display-5 fw-bold text-primary">sender</span>
                                                {{-- // change ////////// --}}
                                                <p>Date</p>
                                            </div>
                                            <div class="notif-body mt-5 px-sm-5 pb-5">
                                                {{-- // change ////////// --}}
                                                <p>body</p>
                                                {{-- // change ////////// --}}
                                                <p>Tracking Number: <span>tracking</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end me-sm-5">
                                        <form action="" method="POST" class="me-sm-5" id="notif-delete">
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
            <script>
                $(() => {
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
                    let currentUrl = getUrl.pathname.split('/')[2];
                    $('.back-btn').click(() => {
                        location.href = `${baseUrl}client-dashboard/notification`;
                    })

                    $('#notif-delete').submit(function (e) { 
                        e.preventDefault();

                        // change //////////
                       var notif_id = 'notif_id';
                        
                       $.ajax({
                           type: "post",
                           // change //////////
                           url: "deleteNotif'",
                           data: {
                               notif_id: notif_id
                           },
                           dataType: "json",
                           success: function (res) {
                               if(res.code == 202){
                                   // change //////////
                                    location.href= "notifications";
                               }
                           }
                       });
                    });
                })
            </script>

@endsection
<?php
    // }
?>