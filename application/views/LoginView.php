<!-- application/views/login_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="w-screen h-screen">
        <div class="flex justify-center items-centetr w-full h-full">

            <div class="px-[8rem] flex flex-col items-center justify-center">
                <h3 class="text-center text-[61px] font-extrabold text-red-300 mb-10">เข้าสู่ระบบ</h3>
                <div id="alert" class="alert d-none" role="alert"></div>
                <form id="loginForm">
                    <div class="form-group w-[313px]">
                        <label for="email">อีเมล</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" required value="664259012@webmail.npru.ac.th">
                    </div>
                    <div class="form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required value="123456asd">
                    </div>
                    <button type="submit" class="btn text-white bg-red-300 btn-block">เข้าสู่ระบบ</button>
                    <a href="register" class="btn btn-block text-[12px] text-[#808080]">สร้างบัญชีผู้ใช้</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                
                const email = $('#email').val();
                const password = $('#password').val();

                $.ajax({
                    url: 'http://localhost/new-php-project-final/index.php/usercontroller/storeLogin',
                    type: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify({ email: email, password: password }),
                    success: function(response) {
                        if (response && response.response && response.response.message) {
                            $('#alert').removeClass('d-none alert-danger alert-success')
                                       .addClass(response.status === 200 ? 'alert-success' : 'alert-danger')
                                       .text(response.response.message);
                            if (response.status === 200) {
                                setTimeout(function() {
                                    window.location.href = 'http://localhost/new-php-project-final/index.php/usercontroller'; // Adjust target URL as needed
                                }, 500);
                            }
                        } else {
                            $('#alert').removeClass('d-none alert-success')
                                       .addClass('alert-danger')
                                       .text('Invalid response from server.');
                        }
                    },
                    error: function() {
                        $('#alert').removeClass('d-none alert-success')
                                   .addClass('alert-danger')
                                   .text('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>
