@extends('layouts.app')
@section('main_container')
    @include('components.breadcrumb')
    @include('components.team.all-team-member')

    <script>
        let currentPage = 1;
        let totalPages = 10; // Total pages
        let visiblePages = 2; // Show only 3 pages initially
        let startPage = 1; // Starting page for rendering
        let itemsPerPage = 10; // Number of items per page
        let totalItems = 36; // Total entries

        // Function to render pagination numbers
        function renderPaginationNumbers() {
            const paginationNumbersContainer = document.getElementById('pagination-numbers');
            paginationNumbersContainer.innerHTML = ''; // Clear existing numbers

            let endPage = Math.min(startPage + visiblePages - 1, totalPages); // Ensure it doesn't exceed total pages

            for (let i = startPage; i <= endPage; i++) {
                const pageButton = document.createElement('button');
                pageButton.classList.add('pagination-number');
                pageButton.innerText = i;
                pageButton.onclick = () => changePageTo(i);
                if (i === currentPage) {
                    pageButton.classList.add('active'); // Highlight the current page
                }
                paginationNumbersContainer.appendChild(pageButton);
            }
        }

        // Function to handle next/prev pagination window
        function changePage(direction) {
            if (direction === 'prev' && startPage > 1) {
                startPage--;
                currentPage = startPage;
            } else if (direction === 'next' && startPage + visiblePages - 1 < totalPages) {
                startPage++;
                currentPage = startPage;
            }
            updatePagination();
        }

        // Function to directly change to a specific page
        function changePageTo(page) {
            currentPage = page;
            if (page < startPage || page >= startPage + visiblePages) {
                startPage = Math.max(1, page - Math.floor(visiblePages / 2)); // Adjust start position
            }
            updatePagination();
        }

        // Function to update pagination UI
        function updatePagination() {
            renderPaginationNumbers();

            let startEntry = (currentPage - 1) * itemsPerPage + 1;
            let endEntry = Math.min(currentPage * itemsPerPage, totalItems);

            // Update entries info text
            document.getElementById('entries-info').innerText =
                `Showing ${startEntry} to ${endEntry} of ${totalItems} entries`;

            // Disable/Enable buttons
            document.getElementById('prev-btn').disabled = startPage === 1;
            document.getElementById('next-btn').disabled = startPage + visiblePages - 1 >= totalPages;
        }

        // Initial rendering of pagination
        updatePagination();
    </script>
@endsection
