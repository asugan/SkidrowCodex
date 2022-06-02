<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="title" content="Skidrow and Codex Torrent">
    <meta name="description" content="Skidrow and Codex Torrents">
    <meta name="keywords" content="Torrent,Skidrow,Codex">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Title  -->
    <title>Skidrow and Codex</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('siteimg/sclogo.png') }}" />

    <!-- Google Fonts -->


    <!-- Plugins -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="bg">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-transparent">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="{{ asset('siteimg/sclogo.png') }}" alt="" class="logo">
                </a>

                <ul class="nav nav-pills mt-auto mb-auto">
                    <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link active text-white nav1"
                            aria-current="page">Home</a>
                    </li>
                    <div class="dropdown ms-3">
                        <button class="btn btn-secondary dropdown-toggle drropdown" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                    href="{{ route('category', ['categoryid' => 'Aksiyon']) }}">Aksiyon</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('category', ['categoryid' => 'RPG']) }}">RPG</a>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item"><a href="{{ route('contact') }}"
                            class="nav-link text-white">Contact</a></li>
                    <li class="nav-item"><a href="{{ route('FAQ') }}" class="nav-link text-white">FAQs</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-white">About</a>
                    </li>
                </ul>
            </header>
        </div>
        <div class="container">
            <div class="row">
                <div class="content-bg pt-4 pb-3 mb-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
