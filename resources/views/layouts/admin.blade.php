<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ Auth::user()->nom }} </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed flex-col inset-y-0 left-0 z-[1000] transform -translate-x-full md:relative md:translate-x-0 md:flex md:w-64 bg-teal-500 text-white transition-transform duration-300 ease-in-out">
            <div class="p-4">
                <h1 class="text-2xl font-bold">
                    {{ Auth::user()->nom }} 
                    {{ Auth::user()->prenom }} 
                </h1>
            </div>
            <nav>
                <ul>
                    <li onclick="window.location.href='{{ url('/admin') }}'"
                        class="p-4 hover:bg-teal-100 hover:text-teal-700 cursor-pointer">
                        <a href="{{ url('/admin') }}">Tableau de bord</a>
                    </li>
                    <li onclick="window.location.href='{{ url('/admin/imcs') }}'"
                        class="p-4 hover:bg-teal-100 hover:text-teal-700 cursor-pointer">
                        <a href="{{ url('/admin/imcs') }}">Tests IMC</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 md:ml-0">
            <nav class="w-full bg-teal-100 p-4 flex items-center justify-between">
                <div class="">
                    <button id="menu-button" class="md:hidden text-teal-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                </div>
                <ul class="flex items-center  gap-3">
                    <li>
                        <div class="avatar placeholder">
                            <div class="bg-neutral text-neutral-content w-8 rounded-full">
                                <span class="text-xs">
                                    {{ substr(Auth::user()->nom,0,1) }} 
                                    {{ substr(Auth::user()->prenom,0,1) }} 
                                </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/auth/logout"
                            class="btn btn-sm hover:bg-red-600 border-none text-white bg-red-500">Déconnexion</a>
                    </li>
                </ul>
            </nav>
            <div class="p-4">
                @yield('content')
            </div>
        </main>
    </div>

    @vite('resources/js/app.js')

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>

</html>
