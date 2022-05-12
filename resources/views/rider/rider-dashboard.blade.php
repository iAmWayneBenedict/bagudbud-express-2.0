<!--
 Extends the base_no_nav.php that has the header and footer
-->
@extends('layouts.dashboardNavRider')

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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-transparent pt-4 d-flex justify-content-between">
                                <h4 class="text-black">Requests Pool</h4>
                            </div>
                            <div class="px-4 px-sm-5 mx-md-3 mb-5 mt-3" style="max-width: 50rem; width: 100%">

                                <table class="table table-hover table-container position-relative">

                                    <thead class="line-overlay">

                                    </thead>
                                    <tbody id="userTable pt-5" class="userTable">

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
        // $(document).ready(function() {
        //     // reloadTable()
        //     setInterval(() => {
        //         reloadTable();
        //     }, 1000)

        //     function reloadTable() {
        //         $.ajax({
        //             type: 'ajax',
        //             url: "displayAllRequest",
        //             async: true,
        //             success: function(data) {
        //                 $('.userTable').html(data);

        //                 let getUrl = window.location;
        //                 let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
        //                 let currentUrl = getUrl.pathname.split('/')[3];
        //                 $('.items').each(function() {
        //                     $(this).click(function() {
        //                         // delivery details path
        //                         let id = $(this).attr('data-label').split('-')[1];
        //                         location.href =
        //                             `${baseUrl}/rider-dashboard/${currentUrl}/${id}`;
        //                     });
        //                 });
        //             }
        //         })
        //     }
        // });
    </script>
@endsection
