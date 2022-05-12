<!--
 Extends the base_no_nav.php that has the header and footer
-->
@extends('layouts.app-no-nav')

<!--
 Inserts the whole section to the base_no_nav.php
 -->
@section('content')
    <div data-barba="container" data-barba-namespace="email-verification"
        class="container d-flex flex-column align-items-center">
        <div class="row row-cols-1 align-items-center justify-content-center">
            <div class="col-10 col-lg-7">
                <img src="{{ asset('img/undraw_message_sent_1030 (1).svg') }}" class="img-fluid mt-5" alt="">
            </div>
            <div class="col-10 col-lg-7 mt-5">
                <div class="text-center">
                    <p class="display-7 lh-lg">
                        Check Your Email: <span class="user-email"></span><br>
                        We have sent a verification to your email to verify and activate your account.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        // jquery start
        $(() => {
            // get the query values in the url
            const urlSearchParams = new URLSearchParams(window.location.search);

            // insert the email in the DOM
            $('.user-email').text(urlSearchParams.get('user-email'));

        });
    </script>
@endsection
