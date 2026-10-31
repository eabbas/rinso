<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!--<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>-->
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('storage/images/icon.png') }}" type="image/png">
    <title>Famenu</title>
    <style>
        .page_404 {
            padding: 40px 0;
            background: #fff;
            font-family: 'Arvo', serif;
            text-align: center;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background-repeat: no-repeat;
            height: 400px;
            background-position: center;
        }

        .four_zero_four_bg h1 {
            text-align: center;
            font-size: 80px;
        }

        four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {

            color: #fff !important;
            border-radius: 20px;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }

        .contant_box_404 {
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="four_zero_four_bg bg-[url('{{ asset('assets/img/dribbble_1.gif') }}')]">
                            <h1 class="text-center ">404</h1>
                        </div>
                        <div class="contant_box_404">
                            <h3 class="h2">صفحه مورد نظر شما یافت نشد</h3>
                            <p>از دکمه زیر وارد صفحه اصلی شوید</p>
                            <a href="{{ route('home') }}" class="link_404">خانه</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
