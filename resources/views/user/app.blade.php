<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMC | {{ Auth::user()->prenom }} </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="flex items-center justify-between p-3 bg-teal-100">
        <div>
            <a href="/user" class="text-xl font-bold">
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
            </a>
        </div>
        <div>
            <a href="/auth/logout" class="btn btn-sm bg-red-500 text-white hover:bg-red-500">
                Déconnexion
            </a>
        </div>
    </nav>
    <main>
        <div class="flex items-center justify-center">
            <div class="w-3/4 py-8">
                <h1 class="text-center text-2xl font-bold uppercase">
                    Indice de Masse Corporel
                </h1>
                <!-- Display Validation Errors -->
            @if($errors->any())
            <div class="mb-4 text-red-500">
                @foreach($errors->all() as $error)
                    <p class="p-2 mb- bg-red-300 rounded text-black">{{ $error }}</p>
                @endforeach
            </div>
        @endif
                <div role="tablist" class="tabs tabs-lifted">
                    <input type="radio" name="my_tabs_2" checked="checked" role="tab" class="tab"
                        aria-label="Calculer votre indice" />
                    <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                        <form action="{{ url('/user/calculate') }}" method="post">
                            @csrf
                            <label class="form-control w-full mb-3">
                                <div class="label">
                                    <span class="label-text">Votre poids (Kg)</span>
                                </div>
                                <input type="number" step="0.01" value="{{ old('poids') }}" placeholder="60" name="poids"
                                    class="input input-bordered w-full" />
                            </label>
                            <label class="form-control w-full mb-3">
                                <div class="label">
                                    <span class="label-text">Votre taille (Cm)</span>
                                </div>
                                <input type="number" step="0.01" placeholder="1.50" value="{{ old('taille') }}" name="taille"
                                    class="input input-bordered w-full" />
                            </label>
                            <button class="btn w-full bg-teal-500 hover:bg-teal-500 text-white">
                                Calculer
                            </button>
                        </form>
                    </div>

                    <input type="radio" name="my_tabs_2" role="tab" class="tab"
                        aria-label="Historique de test" />
                    <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                        <div class="overflow-x-auto">
                            <table id="imcTable" class="table w-full">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>Taille</th>
                                        <th>Poids</th>
                                        <th>Valeur</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows will be inserted here by JavaScript -->
                                </tbody>
                            </table>
                            <div id="pagination" class="mt-4 flex justify-center">
                                <!-- Pagination controls will be inserted here by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Example data, replace this with actual data from the server
        const imcs = @json($imcs); // Assuming $imcs is available in the blade file as a JSON array
        const rowsPerPage = 5;
        let currentPage = 1;

        function displayTable(page) {
            const tableBody = document.querySelector('#imcTable tbody');
            tableBody.innerHTML = '';

            const startIndex = (page - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;
            const pageItems = imcs.slice(startIndex, endIndex);

            pageItems.forEach(imc => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${imc.taille}</td>
                    <td>${imc.poids}</td>
                    <td>${imc.valeur}</td>
                    <td>${new Date(imc.created_at).toLocaleDateString()}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        function setupPagination() {
            const paginationDiv = document.querySelector('#pagination');
            const pageCount = Math.ceil(imcs.length / rowsPerPage);

            paginationDiv.innerHTML = '';
            for (let i = 1; i <= pageCount; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add('mx-1', 'px-3', 'py-1', 'bg-teal-500', 'text-white', 'rounded');
                button.addEventListener('click', () => {
                    currentPage = i;
                    displayTable(currentPage);
                    updatePagination();
                });
                paginationDiv.appendChild(button);
            }
        }

        function updatePagination() {
            const buttons = document.querySelectorAll('#pagination button');
            buttons.forEach(button => {
                if (parseInt(button.textContent) === currentPage) {
                    button.classList.add('bg-teal-700');
                } else {
                    button.classList.remove('bg-teal-700');
                }
            });
        }

        // Initial display
        displayTable(currentPage);
        setupPagination();
    </script>
</body>

</html>
