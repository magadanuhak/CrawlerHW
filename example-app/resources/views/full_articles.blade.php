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
                        <a class="nav-link " aria-current="page" href="/">Короткое описание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/full">Полное описание</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div
            id="intro-example"
            class="p-5 text-center bg-image"
            style="background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg');"
    >
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Статьи прлностью </h1>
                    <h5 class="mb-4">Полное описание всех обьявлений</h5>
                    <a
                            class="btn btn-outline-light btn-lg m-2"
                            href="/"
                            role="button"
                            target="_blank"
                    >Посмотреть короткое описание</a
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
</header>
<div class="container  mt-5">
    <div class="row d-flex justify-content-center">
        @foreach($full_descriptions as $desc)
            @if(!empty($desc['title'] && !empty($desc['description'])))
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-mdb-toggle="collapse"
                                    data-mdb-target="#flush-collapseOne"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseOne"
                            >
                                {{$desc['title']}}

                            </button>
                        </h2>
                        <div
                                id="flush-collapseOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne"
                                data-mdb-parent="#accordionFlushExample"
                        >
                            <div class="accordion-body">
                                <div class="description">
                                    {{$desc['description']}}
                                </div>
                                <div class="images">
                                    @foreach($desc['images']  as $image)
                                        <div class="card" style="width: 18rem;">
                                            <img
                                                    data-mdb-img="{{$image}}"
                                                    src="{{$image}}"
                                                    class="card-img-top"
                                            />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="informations">
                                    <span class="badge bg-dark"> <i class="mdi mdi-city"></i> {{$desc['city']}}</span>
                                    <span class="badge bg-dark"> <i class="mdi mdi-user"></i> {{$desc['author']}}</span>
                                    <span class="badge bg-dark"> <i class="mdi mdi-calendar"></i> {{$desc['datetime']}}</span>
                                    <span class="badge bg-dark"> <i class="mdi mdi-eye"></i> {{$desc['views']}}</span>
                                    @foreach($desc['phones'] as $phone)
                                        <span class="badge bg-dark"> <i
                                                    class="mdi mdi-tel"></i> {{$phone}}</span>
                                    @endforeach

                                </div>
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