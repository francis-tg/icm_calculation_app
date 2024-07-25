@extends('layouts.admin')

@section('content')
<div>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-5 mb-5">
        {{-- User Card --}}
        <div class="card bg-base-100 p-5 gap-3">
            <div class="flex justify-between gap-5 items-center">
                <i class="fas fa-users text-teal-400 text-3xl"></i>
                <div class="text-2xl uppercase">
                    Utilisateurs
                </div>
            </div>
            <span class="text-xl font-bold">
                {{ count($users) }}
            </span>
        </div>
        {{-- End User Card --}}

        {{-- Calculs d'ICM Card --}}
        <div class="card bg-base-100 p-5 gap-3">
            <div class="flex justify-between gap-5 items-center">
                <i class="fas fa-heart-pulse text-red-400 text-3xl"></i>
                <div class="text-2xl uppercase">
                    Calculs d'ICM réalisés
                </div>
            </div>
            <span class="text-xl font-bold">
                {{ count($icms) }}
            </span>
        </div>
        {{-- End Calculs d'ICM Card --}}
    </div>

    <div class="overflow-x-auto">
        <table id="userTable" class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Contact</th>
                    <th>Date de Création</th>
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
    // Example data, replace this with actual data from the server
    const users = @json($users); // Assuming $users is available in the blade file as a JSON array
    const rowsPerPage = 5;
    let currentPage = 1;

    function displayTable(page) {
        const tableBody = document.querySelector('#userTable tbody');
        tableBody.innerHTML = '';

        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        const pageItems = users.slice(startIndex, endIndex);

        pageItems.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="flex items-center gap-3">
                        <div class="avatar placeholder">
                            <div class="bg-neutral text-neutral-content w-8 rounded-full">
                                ${user.nom.charAt(0)}${user.prenom.charAt(0)}
                            </div>
                        </div>
                        <div>
                            <div class="font-bold">${user.nom}</div>
                        </div>
                    </div>
                </td>
                <td>${user.prenom}</td>
                <td>${user.date_naissance}</td>
                <td>${user.contact}</td>
                <td>${new Date(user.created_at).toLocaleDateString()}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    function setupPagination() {
        const paginationDiv = document.querySelector('#pagination');
        const pageCount = Math.ceil(users.length / rowsPerPage);

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
@endsection
