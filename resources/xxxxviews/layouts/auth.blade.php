<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/logo2.png" type="image/x-icon">
    <link rel="icon" href="/assets/logo2.png" type="image/png">
    <title>THÔNG TIN TÀI KHOẢN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .title-content::before {
            content: '';
            width: calc(100% + 30px);
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0;
            z-index: -1;
            border-bottom: 21px solid #14b8a6;
            border-top: 22px solid #14b8a6;
            border-left: 0 solid transparent;
            border-right: 26px solid transparent;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }

        .wd-10 {
            width: 10rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.375rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert {
            position: relative;
            padding: .75rem 1.25rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
    </style>
</head>

<body class="bg-no-repeat bg-cover h-screen" style="background-image: url('assets/images/bg.jpg')">
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
            <div class="container-fluid flex items-center justify-between px-8 bg-teal-500">
                <a class="navbar-brand" href="/">
                    <img src="/assets/logo2.png" alt="Logo" class="wd-10 h-24 object-contain">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                    </ul>
                </div>


                <ul class="navbar-nav ml-auto flex gap-6">
                    <!-- Nếu đã đăng nhập, hiển thị menu "Thoát" -->
                    <li class="nav-item flex items-center gap-1">
                        <a class="nav-link text-white" href="/dang-ky"><i class="las la-sign-out-alt"></i>Đăng
                            ký</a>
                    </li>
                    <li class="nav-item flex items-center gap-1">
                        <a class="nav-link text-white" href="/dang-nhap"><i class="las la-sign-out-alt"></i>Đăng
                            nhập</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Nội dung trang web ở đây -->
    <div class="my-4 lg:my-20">
        @yield('content')
    </div>

</body>

</html>