@extends('layouts.app')
@section('main_container')
    @include('components.breadcrumb')
    <div class="ibox all-employee-section-mains">
        <div class="ibox-body">
            <div class="entry-section">
                <div class="show-entries">
                    <label for="show-entries">Show</label>
                    <select id="show-entries" class="form-control form-control-sm" style="width: auto; display: inline-block;">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <label for="show-entries">Entries</label>
                </div>

                <!-- Search Bar -->
                <div class="search-bar">
                    <input type="text" id="search-input" class="form-control form-control-sm" placeholder="Search..."
                        style="width: 200px;">
                </div>
            </div>
            <div class="grant-table-scroll">
                <table class="all-employee-section-main table table-striped table-bordered table-hover" id="example-table"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr class="all-employee-section">
                            <th>SN.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Type of Employment</th>
                            <th>Type of Position</th>
                            <th>Joining date</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Parmanent</td>
                            <td>Employee</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Volunteer</td>
                            <td>Digital Marketing</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Inetern</td>
                            <td>Digital Marketing</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Employee</td>
                            <td>Digital Marketing</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Employee</td>
                            <td>Digital Marketing</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Employee</td>

                            <td>Digital Marketing</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Ab200025</td>
                            <td>Yuri Berry</td>
                            <td>34356786</td>
                            <td>abc@gmail.com</td>
                            <td>Employee</td>
                            <td>Digital Marketing</td>
                            <td>20/04/2025</td>
                            <td>₹675,000</td>
                            <td>
                                <a href="{{ url('/hr-department/team/team-member-details') }}">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/hr-department/team/update-team-member') }}">
                                    <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                <div class="entries-info" id="entries-info"></div> <!-- Left-side text -->
                <div class="pagination-container">
                    <button class="pagination-btn" id="prev-btn" onclick="changePage('prev')">Previous</button>
                    <div class="pagination-numbers" id="pagination-numbers">
                        <!-- Page numbers will be dynamically inserted here -->
                    </div>
                    <button class="pagination-btn" id="next-btn" onclick="changePage('next')">Next</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        let currentPage = 1;
        let totalPages = 10;
        let visiblePages = 2;
        let startPage = 1;
        let itemsPerPage = 10;
        let totalItems = 36;


        function renderPaginationNumbers() {
            const paginationNumbersContainer = document.getElementById('pagination-numbers');
            paginationNumbersContainer.innerHTML = '';

            let endPage = Math.min(startPage + visiblePages - 1, totalPages);

            for (let i = startPage; i <= endPage; i++) {
                const pageButton = document.createElement('button');
                pageButton.classList.add('pagination-number');
                pageButton.innerText = i;
                pageButton.onclick = () => changePageTo(i);
                if (i === currentPage) {
                    pageButton.classList.add('active');
                }
                paginationNumbersContainer.appendChild(pageButton);
            }
        }


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


        function changePageTo(page) {
            currentPage = page;
            if (page < startPage || page >= startPage + visiblePages) {
                startPage = Math.max(1, page - Math.floor(visiblePages / 2));
            }
            updatePagination();
        }


        function updatePagination() {
            renderPaginationNumbers();

            let startEntry = (currentPage - 1) * itemsPerPage + 1;
            let endEntry = Math.min(currentPage * itemsPerPage, totalItems);


            document.getElementById('entries-info').innerText =
                `Showing ${startEntry} to ${endEntry} of ${totalItems} entries`;


            document.getElementById('prev-btn').disabled = startPage === 1;
            document.getElementById('next-btn').disabled = startPage + visiblePages - 1 >= totalPages;
        }

        updatePagination();
    </script>
@endsection
