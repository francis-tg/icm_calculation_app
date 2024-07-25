<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat IMC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Résultat de l'IMC</h1>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Poids :</label>
            <p class="bg-gray-100 p-2 rounded">{{ $imc->poids }} kg</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Taille :</label>
            <p class="bg-gray-100 p-2 rounded">{{ $imc->taille }} m</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">IMC :</label>
            <p class="bg-gray-100 p-2 rounded">
                {{ $imc->valeur }}
                @if ($imc->valeur > 25)
                    <span class="text-red-500 font-bold"> (Surpoids)</span>
                @endif
            </p>
        </div>
        <a href="{{ url('/user') }}" class="w-full btn text-center text-white bg-teal-500  hover:bg-teal-700 p-2 rounded">Recalculer</a>
    </div>
</body>
</html>
