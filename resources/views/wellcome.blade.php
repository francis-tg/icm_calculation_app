<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICM | Bienvenue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <nav class="bg-teal-100 p-4 flex justify-between items-center shadow-md">
        <h1 class="text-xl font-bold font-serif">
            IMC Test
        </h1>
        <div>
            @if (Auth::user())
                @auth
                    @if (Auth::user()->role->nom === 'Admin')
                        <!-- Assuming you have an 'is_admin' attribute or method -->
                        <a href="/admin" class="btn btn-outline-primary">Administration</a>
                    @else
                        <a href="/user" class="btn btn-outline-primary">Votre Espace de test</a>
                    @endif
                    <a href="/auth/logout" class="btn btn-danger">Déconnexion</a>
                @else
                    <a href="/auth/login" class="btn btn-outline-primary">Connectez-vous</a>
                @endauth
            @else
                <a href="/auth/login" class="btn btn-outline-primary">Connectez-vous</a>
            @endif
        </div>
    </nav>
    <main>
        <div class="hero bg-base-200 min-h-screen flex items-center">
            <div class="hero-content flex-col lg:flex-row-reverse max-w-6xl mx-auto p-4">
                <img src='{{ asset('/img/medical.svg') }}' class=" w-1/2 rounded-lg " />
                <div class="text-center lg:text-left lg:ml-8">
                    <h1 class="text-5xl font-bold mb-4">
                        Connaitre son Indice de Masse Corporelle
                    </h1>
                    <p class="py-6 text-lg">
                        Il est important de connaitre sa masse corporelle afin de se protéger contre certaines maladies.
                    </p>
                    @if (Auth::user())
                        @if (Auth::user()->role->nom === 'Admin')
                            <!-- Assuming you have an 'is_admin' attribute or method -->
                        @else
                            <a href="/user" class="btn bg-teal-500 hover:bg-teal-500 text-white">Je fais mon test</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>

</html>
