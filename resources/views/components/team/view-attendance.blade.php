<div class="ViewAttendanceMains">
    <div class="containers p-0">
        <div class="ViewAttendanceMain">
            <div class="csr-registration-main-heading">

                <p>View Attendance - <span id="currentMonthYear">April 2025</span></p>
            </div>
            <div class="attendance-section">
                <!-- Search and Import Button -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="flex-grow-1 me-3">
                        <input type="text" placeholder="Search by Roll Number or Name"
                            class="SearchBar form-control" />
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#importAttendance">Import</button>
                </div>

                <!-- Month Tabs and Year Selector -->
                <div class="MonthTabs mb-3">
                    <button>JAN</button><button>FEB</button><button>MAR</button>
                    <button>APR</button><button>MAY</button><button>JUN</button>
                    <button>JUL</button><button>AUG</button><button>SEP</button>
                    <button>OCT</button><button>NOV</button><button>DEC</button>
                    <select class="YearSelector">
                        <option>2025</option>
                        <option>2024</option>
                    </select>
                </div>

                <!-- Attendance Table -->
                <div class="TableContainer">
                    <table class="AttendanceTable table table-bordered">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Date</th>
                                <th>Project Name</th>
                                <th>Project Number</th>
                                <th>Title of Project</th>
                                <th>Duration of Project</th>
                                <th>Name Employee</th>
                                <th>Designation</th>
                                <th>Employee ID</th>
                                <th>Hours Spent</th>
                                <th>Days</th>
                                <th>Month</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>20/05/2025</td>
                                <td>JST Project</td>
                                <td>4547255</td>
                                <td>JST</td>
                                <td>2 Months</td>
                                <td>John Doe</td>
                                <td>Developer</td>
                                <td>JD3254</td>
                                <td>4040</td>
                                <td>20</td>
                                <td>5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="grant-pagination-container mt-3">
                    <div class="grant-pagination-info mb-2">Showing 1 to 4 of 20 records</div>
                    <div class="grant-pagination d-flex align-items-center">
                        <button class="btn btn-light pagination-btn me-2" disabled>Previous</button>
                        <div class="pagination-numbers d-flex me-2">
                            <button class="pagination-number btn btn-outline-primary me-1 active">1</button>
                            <button class="pagination-number btn btn-outline-primary">2</button>
                        </div>
                        <button class="btn btn-light pagination-btn">Next</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Import Attendance -->
        <div class="modal fade" id="importAttendance" tabindex="-1" role="dialog" aria-labelledby="importAttendanceLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('attendance-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Import Excel File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select Excel File</label>
                                <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls,.csv"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Import</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
