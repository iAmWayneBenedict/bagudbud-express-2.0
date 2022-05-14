<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
@extends('layouts.dashboardNav')

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
@section('content')

            <div class="page-heading">
                <h3 class="text-black">Notifications</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">All Notifications</h4>
                            </div>
                            <div class="card-body">
                                <div class="px-0 px-sm-5 mx-md-3 mb-5 mt-3" style="max-width: 50rem; width: 100%">
                                        
                                    <table class="table table-hover table-container position-relative">
                                        
                                        <thead class="line-overlay">
                                            
                                        </thead>
                                        <tbody id="userTable pt-5" class="notif">

                                            <!-- item start -->
                                            <!-- change the aria-label. change the number only based on the id in db ex. for the next item data-label="item-2" -->
                                            <tr class="items" data-label="item-1" style="cursor: pointer;">
                                                <td>
                                                    <div class="notification-container d-flex align-items-center py-1 py-xxl-3">
                                                        
                                                        <div class="request-item-content w-100 ms-4">
                                                            <div class="left-content">
                                                                <p class="text-black fw-bold m-0">John Doe</p>
                                                                <span class="display-7">June 21, 2021 7:30 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr class="items" data-label="item-1" style="cursor: pointer;">
                                                <td>
                                                    <div class="notification-container d-flex align-items-center py-1 py-xxl-3">
                                                        <div class="request-item-content w-100 ms-4">
                                                            <div class="left-content">
                                                                <p class="text-black fw-bold m-0">John Doe</p>
                                                                <span class="display-7">June 21, 2021 7:30 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
            <script>
                $(document).ready(function () {  
                    // reloadNotif();
                    // setInterval(() => {
                    //     reloadNotif();
                    // }, 3000)
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];
                    console.log(currentUrl)
                    $('.items').each(function() {
                        $(this).click(function() {
                            // delivery details path
                            let id = $(this).attr('data-label').split('-')[1];
                            location.href = `${baseUrl}client-dashboard/${currentUrl}/${id}`;
                        });
                    });
                });

               function reloadNotif() {
                        $.ajax({
                            type: 'ajax',
                            url: "displayNotif",
                            async: true,
                            success: function (data) {
                            $('.notif').html(data);
                            
                                let getUrl = window.location;
                                let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[0]}`;
                                let currentUrl = getUrl.pathname.split('/')[3];
                                $('.items').each(function() {
                                    $(this).click(function() {
                                        // delivery details path
                                        let id = $(this).attr('data-label').split('-')[1];
                                        location.href = `${baseUrl}/client-dashboard/${id}`;
                                    });
                                });
                            }
                        })
                }
            </script>

@endsection