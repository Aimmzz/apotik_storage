<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="icon" href="../image/logo.jpg">
    <title>Apotek AL HUSNA</title>
    <!-- Bootstrap -->
    <link href="../assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets/admin/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="login.php" method="post" onsubmit="return showSweetAlert()">
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-lock"></i> Login</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                          <div class="clearfix"></div>
                          <br />
                          <div>
                            <h1><img src="../image/logo.jpg" width="50px"> Apotek AL HUSNA </h1>
                            <p>�2023 All Rights Reserved. Privacy and Terms</p>
                          </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script>
        function showSweetAlert() {
            const username = document.querySelector('input[name="username"]').value;
            const password = document.querySelector('input[name="password"]').value;
            Swal.fire({
                title: 'Loading...',
                icon: 'info',
                text: 'Mohon tunggu sebentar...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    document.querySelector('form').submit();
                }
            });

            return false;
        }

        document.addEventListener("DOMContentLoaded", function () {
            const currentURL = window.location.href;
            const urlParams = new URLSearchParams(currentURL.split('?')[1]);
            const loginStatus = urlParams.get('login');

            if (loginStatus === 'success') {
                Swal.fire({
                    title: 'Berhasil Login!',
                    icon: 'success',
                    text: 'Anda telah berhasil masuk.',
                    showConfirmButton: false,
                    timer: 4000
                });
            } else if (loginStatus === 'failed') {
                Swal.fire({
                    title: 'Login Gagal!',
                    icon: 'error',
                    text: 'Username atau password tidak valid.',
                    showConfirmButton: false,
                    timer: 4000
                });
            }
        });
    </script>
</body>

</html>
