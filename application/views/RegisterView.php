<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="w-full">
        <div class="grid grid-cols-2">
            <div class="">
                <?php include('component/Hero.php'); ?>
            </div>

            <div class="px-[8rem] flex flex-col items-center justify-center">
                <h3 class="text-center text-[61px] font-extrabold text-[#ED9455] mb-10">สมัครสมาชิก</h3>
                <div id="alert" class="alert d-none" role="alert"></div>
                
                <!-- Registration Form -->
                <form id="registerForm">
                    <div class="form-group w-[313px]">
                        <label for="student_id">รหัสนักเรียน</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="รหัสนักเรียน" required value="664259015">
                    </div>
                    <div class="form-group w-[313px]">
                        <label for="name">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ" required value="wisarut">
                    </div>
                    <div class="form-group w-[313px]">
                        <label for="email">อีเมล</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" required value="664259015@webmail.npru.ac.th">
                    </div>
                    <div class="form-group w-[313px]">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required value="123456asd">
                    </div>
                    <div class="form-group w-[313px]">
                        <label for="confirm_password">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" required value="123456asd">
                    </div>
                    <input type="hidden" name="role_id" id="role_id" value="1">
                    
                    <button type="submit" class="btn text-white bg-[#ED9455] btn-block">สมัครสมาชิก</button>
                    <button type="button" class="btn btn-block text-[12px] text-[#808080]" onclick="window.location.href='login'">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registerForm').on('submit', function(e) {
                e.preventDefault();
                
                const student_id = $('#student_id').val();
                const name = $('#name').val();
                const email = $('#email').val();
                const password = $('#password').val();
                const confirm_password = $('#confirm_password').val();
                const role_id = $('#role_id').val();

                $.ajax({
                    url: 'http://localhost/project-final/index.php/usercontroller/store',
                    type: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify({
                        student_id: student_id,
                        name: name,
                        email: email,
                        password: password,
                        confirm_password: confirm_password,
                        role_id: role_id
                    }),
                    success: function(response) {
                        $('#alert').removeClass('d-none alert-danger alert-success');
                        if (response && response.response && response.response.message) {
                            $('#alert')
                                .addClass(response.status === 200 ? 'alert-success' : 'alert-danger')
                                .text(response.response.message);
                            if (response.status === 200) {
                                setTimeout(function() {
                                    window.location.href = 'login';
                                }, 500);
                            }
                        } else {
                            $('#alert').addClass('alert-danger').text('Invalid response from server.');
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
