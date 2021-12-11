<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Short</title>
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
</head>
<body>
<header>
    <style>
        #intro-example {
            height: 400px;
        }

        @media (min-width: 992px) {
            #intro-example {
                height: 600px;
            }
        }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="/">Короткое описание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/full">Полное описание</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div
            id="intro-example"
            class="p-5 text-center bg-image"
            style="background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg');"
    >
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Обявления (короткие)</h1>
                    <h5 class="mb-4">Короткое описание всех обьявлений</h5>
                    <a
                            class="btn btn-outline-light btn-lg m-2"
                            href="/full"
                            role="button"
                            target="_blank"
                    >Посмотреть полное описание</a
                    >
                    <a
                            class="btn btn-outline-light btn-lg m-2"
                            href="http://danielmaga.com"
                            target="_blank"
                            role="button"
                    >Сайт автора</a
                    >
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
</header>
<div class="container  mt-5">
    <div class="row d-flex justify-content-center">
        @foreach($short_descriptions as $desc)
            @if(!empty($desc['title'] && !empty($desc['description'])))
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card w-100 ">
                        <a href="https://makler.md{{$desc['url']}}">
                            <img
                                    loading="lazy"
                                    style="height:150px; width:100%; {{empty($desc['img']) ? 'background-color: #d9d9d9;' : ''}} object-fit: {{empty($desc['img']) ? 'contains' : 'cover'}};"
                                    src="{{empty($desc['img']) ? "/logo_new.svg" : $desc['img']}}"
                                    class="card-img-top"
                            />

                            <div class="card-body">
                                <h5 class="card-title" style="font-size:14px; height: 46px;">{{$desc['title']}}</h5>
                                <p class="card-text " style="font-size:12px; height: 105px;">
                                    {{$desc['description']}}
                                </p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <small class="badge badge-dark"> <i
                                        class="mdi mdi-currency-usd"></i> {{empty($desc['price']) ? 'Договорная' : $desc['price'] }}
                            </small>
                            <span class="badge bg-dark"> <i class="mdi mdi-city"></i> {{$desc['city']}}</span>
                            <span class="badge bg-dark"> <i class="mdi mdi-calendar"></i> {{$desc['datetime']}}</span>
                            <div>
                                <i class="mdi mdi-phone"></i> {{$desc['phone']}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<footer class="text-center text-white" style="background-color: #21081a;">

    <div class="text-center p-3">
        © {{now()->format('Y')}} Автор :
        <a class="text-white" href="http://danielmaga.com/">Danielmaga.com</a>
    </div>

</footer>

<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>

</body>
</html>