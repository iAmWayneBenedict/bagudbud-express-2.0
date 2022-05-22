<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Login</title>
        <link rel="shortcut icon" href="{{ asset('img/iconBagudbud.png') }}" type="image/x-icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body d-flex flex-column">
                                        <span class="err-handler d-none alert alert-danger text-center"></span>
                                        <form method="POST" id="admin-form">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" required type="text" name="username" placeholder="abc223" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" required name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                <div class="form-check mt-3 mb-5">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Show Password
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script>
            $(() => {
                $('#flexCheckChecked').change(function() {
                    if ($(this).is(':checked')) {
                        $('input[name=password]').attr('type', 'text')
                    } else {
                        $('input[name=password]').attr('type', 'password')
                    }
                })

                // $('#admin-form').submit(function(event) {
                //     event.preventDefault();
                //     // prevent from entering
                //     if ($('input[name=password]').val().length < 16) {
                //         $('.err-handler').removeClass('d-none');
                //         $('.err-handler').text("Password must be atleast 16 characters");
                //         return;
                //     }

                    
                // });
            })
        </script>
    </body>
</html>
