<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:linear-gradient(135deg,#E3F2FD,#F5FBFF);
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
            min-height:100vh;
        }

        .container{
            margin-top:30px;
            margin-bottom:30px;
        }

        /* ===========================
           CARD
        =========================== */

        .card{
            background:#fff;
            border:none;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(33,150,243,.25);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 30px rgba(33,150,243,.25);
        }

        .card-header{
            background:linear-gradient(90deg,#4FC3F7,#29B6F6);
            color:white;
            border:none;
            font-weight:bold;
            border-radius:20px 20px 0 0 !important;
        }

        /* ===========================
           TABLE
        =========================== */

        .table{
            background:white;
            border-radius:15px;
            overflow:hidden;
            margin-bottom:0;
        }

        .table thead{
            background:#4FC3F7;
            color:white;
        }

        .table thead th{
            border:none;
            text-align:center;
        }

        .table td{
            vertical-align:middle;
        }

        .table tbody tr{
            transition:.3s;
        }

        .table tbody tr:hover{
            background:#E1F5FE;
        }

        /* ===========================
           BUTTON
        =========================== */

        .btn{
            border-radius:10px;
            font-weight:600;
            transition:.3s;
        }

        .btn-primary{
            background:#29B6F6;
            border:none;
        }

        .btn-primary:hover{
            background:#0288D1;
        }

        .btn-success{
            background:#26C6DA;
            border:none;
        }

        .btn-success:hover{
            background:#00ACC1;
        }

        .btn-danger{
            background:#EF5350;
            border:none;
        }

        .btn-danger:hover{
            background:#E53935;
        }

        /* ===========================
           ALERT
        =========================== */

        .alert{
            border:none;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        .alert-success{
            background:#E1F5FE;
            color:#0277BD;
        }

        .alert-danger{
            background:#FFEBEE;
            color:#C62828;
        }

        /* ===========================
           JUDUL
        =========================== */

        .page-title{
            color:#0277BD;
            font-weight:bold;
            text-align:center;
            margin-bottom:25px;
        }

        h1,h2,h3,h4{
            color:#0277BD;
            font-weight:bold;
        }

        /* ===========================
           BADGE
        =========================== */

        .badge{
            border-radius:20px;
            padding:8px 12px;
            font-size:14px;
        }

        /* ===========================
           FOOTER
        =========================== */

        footer{
            margin-top:40px;
            text-align:center;
            color:#1565C0;
            font-size:15px;
        }

        /* ===========================
           ANIMASI
        =========================== */

        .fade-in{
            animation:fade .5s ease-in-out;
        }

        @keyframes fade{
            from{
                opacity:0;
                transform:translateY(20px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        /* ===========================
           RESPONSIVE
        =========================== */

        @media(max-width:768px){

            .container{
                padding:15px;
            }

            h1{
                font-size:28px;
            }

            h2{
                font-size:22px;
            }

            .table{
                font-size:14px;
            }

        }

    </style>

</head>

<body>

<div class="container fade-in">



    {{-- Alert Error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Isi Halaman --}}
    @yield('content')

    <footer>
        <hr>
        <p>
            © {{ date('Y') }} POS Inventory System
        </p>
    </footer>

</div>

</body>
</html>