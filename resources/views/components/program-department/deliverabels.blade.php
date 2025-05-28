<style>
    .reamark-progress span {
        background-color: #e6f4ea;
        /* soft green */
        color: #2e7d32;
        /* dark green text */
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        display: inline-block;
    }

    .remark-pending span {
        background-color: #fff8e1;
        /* soft yellow */
        color: #ff8f00;
        /* amber/dark yellow text */
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        display: inline-block;
    }

    .double-chart {
        width: 100%;
        height: 230px;
        margin-bottom: 20px;
    }

    canvas {
        width: 100% !important;
        height: 100% !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="user_create_department">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <div class="m-b-5">Training on Digital Literacy
                    </div>
                    <h2 class="m-b-5 font-strong">10867
                    </h2>
                    <i class="fa-solid fa-sack-dollar widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <div class="m-b-5">Training on Government Schemes</div>
                    <h2 class="m-b-5 font-strong">₹ 1250</h2>
                    <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="containers p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart1"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart2"></canvas></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Amount Ratio</div>
                    </div>
                    <div class="ibox-body">
                        <div class="row align-items-center">
                            <div class="col-md-6" style="display: flex; justify-content:center">
                                <div class="chart-container">
                                    <canvas id="myPieChart"></canvas>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Economic
                                    52%</div>
                                <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Improvement 27%
                                </div>
                                <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Education
                                    21%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <div class="m-b-5">Training on Branding & Packaging

                        </div>
                        <h2 class="m-b-5 font-strong">1061
                        </h2>
                        <i class="fa-solid fa-sack-dollar widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <div class="m-b-5">Onboarding initiated at NCUI-Haat
                        </div>
                        <h2 class="m-b-5 font-strong">1244</h2>
                        <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart3"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart4"></canvas></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <div class="m-b-5">Training on Agroecology
                        </div>
                        <h2 class="m-b-5 font-strong">129
                        </h2>
                        <i class="fa-solid fa-sack-dollar widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <div class="m-b-5">No. of Success stories Identified
                        </div>
                        <h2 class="m-b-5 font-strong">96</h2>
                        <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart5"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart6"></canvas></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="user-create-section mt-4">
            <!-- Top Buttons -->
            <div class="user-create-section-btn d-flex align-items-center"
                style="justify-content: space-between; padding: 10px 20px;">
                <!-- Search Bar -->
                <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search Letter Box" style="width: 250px;">
                </div>

                <!-- Add Button -->
                <button class="btn" style="background-color: #323F2F; color:white" data-bs-toggle="modal"
                    data-bs-target="#viewAllModal">
                    Add Deleverabels
                </button>
            </div>
            <div class="table-section-main-head">
                <div class="table-section-main">
                    <div class="cards" style="width:100%">
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Program</th>
                                        <th>Project Name</th>
                                        <th>Donor Name</th>
                                        <th>Project Title</th>
                                        <th>Project Duration</th>
                                        <th>Project Location</th>
                                        <th>No. of Month</th>
                                        <th>Month</th>
                                        <th>Particular</th>
                                        <th>Target</th>
                                        <th>Decsription</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>wqewrtehrjt</td>
                                        <td>hgjkio</td>
                                        <td>hgjkio</td>
                                        <td>Sahyog</td>
                                        <td>20-05-205</td>
                                        <td>delhi</td>
                                        <td>4</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>2000</td>
                                        <td class="description">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewAllModal">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>wqewrtehrjt</td>
                                        <td>hgjkio</td>
                                        <td>hgjkio</td>
                                        <td>Sahyog</td>
                                        <td>20-05-205</td>
                                        <td>delhi</td>
                                        <td>4</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>2000</td>
                                        <td class="description">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewAllModal">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>wqewrtehrjt</td>
                                        <td>hgjkio</td>
                                        <td>hgjkio</td>
                                        <td>Sahyog</td>
                                        <td>20-05-205</td>
                                        <td>delhi</td>
                                        <td>4</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>2000</td>
                                        <td class="description">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewAllModal">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>wqewrtehrjt</td>
                                        <td>hgjkio</td>
                                        <td>hgjkio</td>
                                        <td>Sahyog</td>
                                        <td>20-05-205</td>
                                        <td>delhi</td>
                                        <td>4</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>2000</td>
                                        <td class="description">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewAllModal">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>wqewrtehrjt</td>
                                        <td>hgjkio</td>
                                        <td>hgjkio</td>
                                        <td>Sahyog</td>
                                        <td>20-05-205</td>
                                        <td>delhi</td>
                                        <td>4</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>2000</td>
                                        <td class="description">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewAllModal">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>wqewrtehrjt</td>
                                        <td>hgjkio</td>
                                        <td>hgjkio</td>
                                        <td>Sahyog</td>
                                        <td>20-05-205</td>
                                        <td>delhi</td>
                                        <td>4</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>lkjhgcvjbhjknlkl</td>
                                        <td>2000</td>
                                        <td class="description">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewAllModal">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="table-footer">
                    <span id="showing-text">Showing 1 of 2</span>
                    <div class="pagination" id="pagination">
                        <button onclick="changePage(currentPage - 1)">Previous</button>
                        <!-- Page numbers will be populated by JavaScript -->
                        <button onclick="changePage(currentPage + 1)">Next</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="user-create-section mt-4">
            <!-- Top Buttons -->
            <h2 style="padding: 20px; text-align:center; font-weight:bold; font-size:20px; color:#587C50">Overall
                Target vs
                Deliverables Dashboard
                (Monthly/Project Duration)</h2>
            <div class="user-create-section-btn d-flex align-items-center"
                style="justify-content: space-between; padding: 10px 20px;">
                <!-- Search Bar -->
                <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search Letter Box"
                        style="width: 250px;">
                </div>

            </div>
            <div class="table-section-main-head">
                <div class="table-section-main">
                    <div class="cards" style="width:100%">
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Key Indicator</th>
                                        <th>Target</th>
                                        <th>Achieved</th>
                                        <th>Completion</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SHGs to be Activated </td>
                                        <td>30 </td>
                                        <td>30</td>
                                        <td>60%</td>
                                        <td class="reamark-progress"><span>5 in progress</span> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SHGs to be Activated </td>
                                        <td>30 </td>
                                        <td>30</td>
                                        <td>60%</td>
                                        <td class="reamark-progress"><span>5 in progress</span> </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>SHGs to be Activated </td>
                                        <td>30 </td>
                                        <td>30</td>
                                        <td>60%</td>
                                        <td class="reamark-progress"><span>5 in progress</span> </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>SHGs to be Activated </td>
                                        <td>30 </td>
                                        <td>30</td>
                                        <td>60%</td>
                                        <td class="reamark-progress"><span>5 in progress</span> </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>SHGs to be Activated </td>
                                        <td>30 </td>
                                        <td>30</td>
                                        <td>60%</td>
                                        <td class="reamark-progress"><span>5 in progress</span> </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>SHGs to be Activated </td>
                                        <td>30 </td>
                                        <td>30</td>
                                        <td>60%</td>
                                        <td class="remark-pending"><span>pending </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="table-footer">
                    <span id="showing-text">Showing 1 of 2</span>
                    <div class="pagination" id="pagination">
                        <button onclick="changePage(currentPage - 1)">Previous</button>
                        <!-- Page numbers will be populated by JavaScript -->
                        <button onclick="changePage(currentPage + 1)">Next</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="user-create-section mt-4">
            <!-- Top Buttons -->
            <h2 style="padding: 20px; text-align:center; font-weight:bold; font-size:20px; color:#587C50">Daily/Weekly
                Progress Tracker (Sample Format)</h2>
            <div class="user-create-section-btn d-flex align-items-center"
                style="justify-content: space-between; padding: 10px 20px;">
                <!-- Search Bar -->
                <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search Letter Box"
                        style="width: 250px;">
                </div>

            </div>
            <div class="table-section-main-head">
                <div class="table-section-main">
                    <div class="cards" style="width:100%">
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Activity</th>
                                        <th>SHGs Covered</th>
                                        <th>Members Enrolled</th>
                                        <th>Schemes Facilitated</th>
                                        <th>Legal Docs Processed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>01-May</td>
                                        <td>Village A </td>
                                        <td> SHG Training – Packaging & Schemes</td>
                                        <td>6</td>
                                        <td>69</td>
                                        <td>27</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>01-May</td>
                                        <td>Village A </td>
                                        <td> SHG Training – Packaging & Schemes</td>
                                        <td>6</td>
                                        <td>69</td>
                                        <td>27</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>01-May</td>
                                        <td>Village A </td>
                                        <td> SHG Training – Packaging & Schemes</td>
                                        <td>6</td>
                                        <td>69</td>
                                        <td>27</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>01-May</td>
                                        <td>Village A </td>
                                        <td> SHG Training – Packaging & Schemes</td>
                                        <td>6</td>
                                        <td>69</td>
                                        <td>27</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>01-May</td>
                                        <td>Village A </td>
                                        <td> SHG Training – Packaging & Schemes</td>
                                        <td>6</td>
                                        <td>69</td>
                                        <td>27</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>01-May</td>
                                        <td>Village A </td>
                                        <td> SHG Training – Packaging & Schemes</td>
                                        <td>6</td>
                                        <td>69</td>
                                        <td>27</td>
                                        <td>5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="table-footer">
                    <span id="showing-text">Showing 1 of 2</span>
                    <div class="pagination" id="pagination">
                        <button onclick="changePage(currentPage - 1)">Previous</button>
                        <!-- Page numbers will be populated by JavaScript -->
                        <button onclick="changePage(currentPage + 1)">Next</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- Modals -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Decsription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p>This is a paragraph inside the Bootstrap modal.</p>
            </div>
        </div>
    </div>
</div>

<!-- View All Modal -->
<div class="modal fade" id="viewAllModal" tabindex="-1" aria-labelledby="viewAllModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Plan & Deliverables</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Program <span style="color: red">*</span></label>
                            <input type="text" placeholder="Program" class="form-control" required>
                        </div>
                        <div class="input-section">
                            <label>Project Name <span style="color: red">*</span></label>
                            <input type="text" placeholder="Project Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Donor Name <span style="color: red">*</span></label>
                            <input type="text" placeholder="Donor Name" class="form-control" required>
                        </div>
                        <div class="input-section">
                            <label>Project Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Project Title" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Project Duration <span style="color: red">*</span></label>
                            <div class="date-inputs">
                                <input type="date" class="form-control" required>
                                <input type="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Project Location</label>
                            <input type="text" class="form-control" placeholder="Project Location">
                        </div>
                        <div class="input-section">
                            <label>No.Of Month</label>
                            <input type="text" class="form-control" placeholder="Project Location">
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Month <span style="color: red">*</span></label>
                            <select class="form-control" required>
                                <option value="" disabled selected>Select Month</option>
                                <option value="apr_25">Apr-25</option>
                                <option value="may_25">May-25</option>
                                <option value="jun_25">Jun-25</option>
                                <option value="jul_25">Jul-25</option>
                                <option value="aug_25">Aug-25</option>
                                <option value="sep_25">Sep-25</option>
                                <option value="oct_25">Oct-25</option>
                                <option value="nov_25">Nov-25</option>
                                <option value="jan_26">Jan-26</option>
                                <option value="feb_26">Feb-26</option>
                                <option value="mar_26">Mar-26</option>

                            </select>
                        </div>
                        <div class="input-section">
                            <label>Particular <span style="color: red">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section" style="width:100%">
                            <label>Target <span style="color: red">*</span></label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section" style="width:100%">
                            <label>Description <span style="color: red">*</span></label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("DOMContentLoaded", () => {
        const chartConfigs = [{
                id: 'chart1',
                labels: ['Leh', 'Jammu', 'Gurgaon', 'Delhi', 'Sonbhadra', 'Banda', 'Darbhanga',
                    'Uttarkashi', 'Nagpur', 'Noida', 'Latur', 'Pune', 'Other', 'Mysore', 'Banglore',
                    'Narmada'
                ],
                dataset1: {
                    label: 'Initiated',
                    data: [5, 10, 12, 3, 7, 9, 12, 15, 8, 6, 5, 7, 12, 13, 5, 2],
                    color: '#587C50'
                },
                dataset2: {
                    label: 'Onboarded',
                    data: [8, 6, 14, 6, 7, 12, 3, 5, 8, 5, 7, 8, 12, 5, 12, 17],
                    color: '#323F2F'
                }
            },
            {
                id: 'chart2',
                labels: ['Abha Card', 'E-Shram..', 'Shram Yo..', 'Voter ID', 'Aadhaar..', 'PVC Aad',
                    'PAN Card', 'Widow Pe', 'Food Like', 'PMSBY', 'Ayushma..', 'Kisan Re', 'Other'
                ],
                dataset1: {
                    label: 'Male Applicants',
                    data: [8, 6, 14, 6, 7, 12, 3, 5, 8, 5, 7, 8, 12],
                    color: '#587C50'
                },
                dataset2: {
                    label: 'Female Applicants',
                    data: [5, 10, 12, 3, 7, 9, 12, 15, 8, 6, 5, 7, 12],
                    color: '#323F2F'
                }
            },
            {
                id: 'chart3',
                labels: ['Assam', 'Bihar', 'Delhi', 'Haryana', 'Himachal', 'Jammu&..', 'Karnatka', 'Odisha',
                    'Maharash..', 'Uttarakhan..', 'Uttar Pra..', 'UT of Lad..', 'Gujrat', 'West Ben..',
                    'Arunacha..', 'Other'
                ],
                dataset1: {
                    label: 'Budgeted ($K)',
                    data: [8, 6, 14, 6, 7, 12, 3, 5, 8, 5, 7, 8, 12, 5, 12, 17],
                    color: '#587C50'
                },
                dataset2: {
                    labels: ['October', 'Noveember', 'December', 'January', 'February', 'March'],
                    data: [5, 10, 12, 3, 7, 9, 12, 15, 8, 6, 5, 7, 12, 13, 5, 2],
                    color: '#323F2F'
                }
            },
            {
                id: 'chart4',
                labels: ['October', 'Noveember', 'December', 'January', 'February', 'March'],
                dataset1: {
                    label: 'Initiated',
                    data: [5, 10, 12, 3, 7, 9],
                    color: '#587C50'
                },
                dataset2: {
                    label: 'Onboarded',
                    data: [8, 6, 14, 6, 7, 12],
                    color: '#323F2F'
                }
            },
            {
                id: 'chart5',
                labels: ['Sonbhadra', 'Delhi'],
                dataset1: {
                    label: 'Online Applications',
                    data: [60, 70],
                    color: '#587C50'
                },
                dataset2: {
                    label: 'In-person Applications',
                    data: [55, 15],
                    color: '#323F2F'
                }
            },
            {
                id: 'chart6',
                labels: ['October', 'November', 'December', 'January', 'February', 'March'],
                dataset1: {
                    label: 'Volunteers Signed Up',
                    data: [120, 100, 90, 20, 30, 50],
                    color: '#587C50'
                },
                dataset2: {
                    label: 'Volunteers Attended',
                    data: [100, 80, 70, 90, 58, 70],
                    color: '#323F2F'
                }
            }
        ];

        chartConfigs.forEach(cfg => {
            const ctx = document.getElementById(cfg.id).getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: cfg.labels,
                    datasets: [{
                            label: cfg.dataset1.label,
                            data: cfg.dataset1.data,
                            backgroundColor: cfg.dataset1.color,
                            borderWidth: 1
                        },
                        {
                            label: cfg.dataset2.label,
                            data: cfg.dataset2.data,
                            backgroundColor: cfg.dataset2.color,
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 10
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        });
    });
</script>

<!-- Bootstrap 5 CSS -->
