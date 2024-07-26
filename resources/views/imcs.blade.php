@extends('layouts.admin')

@section('content')
<div>
    <div class="overflow-x-auto">
        <table id="userTable" class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Valeur IMC</th>
                    <th>Date de test</th>
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

<script>
    // Pass the IMC data from PHP to JavaScript
    const imcs = {!! json_encode($imcs->map(function($imc) {
        return [
            'users' => [
                'nom' => $imc->users->nom,
                'prenom' => $imc->users->prenom
            ],
            'valeur' => $imc->valeur,
            'created_at' => $imc->created_at->toDateString()
        ];
    })) !!};

    const rowsPerPage = 10;
    let currentPage = 1;

    function displayTable(page) {
        const tableBody = document.querySelector('#userTable tbody');
        tableBody.innerHTML = '';

        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, imcs.length);
        const pageItems = imcs.slice(startIndex, endIndex);

        pageItems.forEach(imc => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${imc.users.nom}</td>
                <td>${imc.users.prenom}</td>
                <td>${imc.valeur.toFixed(2)} ${imc.valeur.toFixed(2) > 25? '<span class="badge badge-secondary badge-outline">Surpoids</span>':'<span class="badge badge-accent badge-outline">Normal</span>'}</td>
                <td>${new Date(imc.created_at).toLocaleDateString()}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    function setupPagination() {
        const paginationDiv = document.querySelector('#pagination');
        const pageCount = Math.ceil(imcs.length / rowsPerPage);

        paginationDiv.innerHTML = '';

        // Create 'Previous' button
        if (currentPage > 1) {
            const prevButton = document.createElement('button');
            prevButton.textContent = 'Previous';
            prevButton.classList.add('mx-1', 'px-3', 'py-1', 'bg-teal-500', 'text-white', 'rounded');
            prevButton.addEventListener('click', () => {
                currentPage--;
                displayTable(currentPage);
                setupPagination();
            });
            paginationDiv.appendChild(prevButton);
        }

        // Create page number buttons
        for (let i = 1; i <= pageCount; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.classList.add('mx-1', 'px-3', 'py-1', 'bg-teal-500', 'text-white', 'rounded');
            button.addEventListener('click', () => {
                currentPage = i;
                displayTable(currentPage);
                setupPagination();
            });
            if (i === currentPage) {
                button.classList.add('bg-teal-700');
            }
            paginationDiv.appendChild(button);
        }

        // Create 'Next' button
        if (currentPage < pageCount) {
            const nextButton = document.createElement('button');
            nextButton.textContent = 'Next';
            nextButton.classList.add('mx-1', 'px-3', 'py-1', 'bg-teal-500', 'text-white', 'rounded');
            nextButton.addEventListener('click', () => {
                currentPage++;
                displayTable(currentPage);
                setupPagination();
            });
            paginationDiv.appendChild(nextButton);
        }
    }

    // Initial display
    displayTable(currentPage);
    setupPagination();
</script>
@endsection
