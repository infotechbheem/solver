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
        @foreach ($countings as $index => $counting)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card shadow-sm p-3">

                    <!-- Hoverable Text with Full Tooltip -->
                    <div style="position: relative; display: inline-block; max-width: 100%;">
                        <span
                            style="display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; cursor: pointer; border-bottom: 1px dotted #999;"
                            onmouseover="this.nextElementSibling.style.display='block';"
                            onmouseout="this.nextElementSibling.style.display='none';">
                            {{ \Illuminate\Support\Str::limit($counting->key_indicator, 50, '...') }}
                        </span>

                        <!-- Tooltip Div -->
                        <div
                            style="display: none; position: absolute; top: 120%; left: 0; background: #333; color: #fff; padding: 5px 10px; border-radius: 4px; white-space: normal; z-index: 9999; font-size: 12px; max-width: 300px; box-shadow: 0 2px 6px rgba(0,0,0,0.3);">
                            {{ $counting->key_indicator }}
                        </div>
                    </div>

                    <!-- Donut Chart Canvas -->
                    <canvas id="chart-{{ $index }}"
                        style="width: 80px; height: 80px; display: block; margin: 10px auto;"></canvas>

                    <!-- Values -->
                    <p class="mt-3 mb-1"><strong>Total Target:</strong> {{ $counting->target }}</p>
                    <p class="mb-0"><strong>Target Achieved:</strong> {{ $counting->achieved }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Chart Init Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($countings as $index => $counting)
                new Chart(document.getElementById('chart-{{ $index }}'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Achieved', 'Remaining'],
                        datasets: [{
                            data: [{{ $counting->achieved }},
                                {{ max($counting->target - $counting->achieved, 0) }}
                            ],
                            backgroundColor: ['#28a745', '#e0e0e0'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        cutout: '70%',
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.label + ': ' + context.raw;
                                    }
                                }
                            }
                        }
                    }
                });
            @endforeach
        });
    </script>

    <div class="containers p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Targets</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart1"></canvas></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                    </div>
                    <div class="ibox-body p-0 pt-2">
                        <div class="double-chart"><canvas id="chart2"></canvas></div>
                    </div>
                </div>
            </div> --}}
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
        {{-- <div class="row">
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

        </div> --}}
        {{-- <div class="user-create-section mt-4">
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
                    Add Deliverabels
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
                                        <th>Project Duration From</th>
                                        <th>Project Duration To</th>
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
                                    @foreach ($deliverables as $deliverable)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $deliverable->program }}</td>
                                            <td>{{ $deliverable->project_name }}</td>
                                            <td>{{ $deliverable->donar_name }}</td>
                                            <td>{{ $deliverable->project_title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($deliverable->project_duration_from)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($deliverable->project_duration_to)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $deliverable->project_location }}</td>
                                            <td>{{ $deliverable->no_of_month }}</td>
                                            <td>{{ str_replace('_', ' ', $deliverable->month) }}</td>
                                            <td>{{ $deliverable->particular }}</td>
                                            <td>{{ $deliverable->target }}</td>
                                            <td class="description">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal{{ $deliverable->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $deliverable->id }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                                <form action="{{ route('delete-deliverables', $deliverable->id) }}"
                                                    method="POST" style="display: inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this deliverable?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- editModal --}}
        {{-- <div class="modal fade" id="editModal{{ $deliverable->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel{{ $deliverable->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editModalLabel{{ $deliverable->id }}">Edit Deliverable
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- You can place an edit form here prefilled with $deliverable data --}}
        {{-- <form
                                                            action="{{ route('update-deliverables', $deliverable->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section">
                                                                    <label>Program <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" placeholder="Program"
                                                                        class="form-control" name="program"
                                                                        id="program"
                                                                        value="{{ $deliverable->program }}" required>
                                                                </div>
                                                                <div class="input-section">
                                                                    <label>Project Name <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" placeholder="Project Name"
                                                                        class="form-control" name="project_name"
                                                                        id="project_name"
                                                                        value="{{ $deliverable->project_name }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section">
                                                                    <label>Donor Name <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" placeholder="Donor Name"
                                                                        class="form-control" name="donar_name"
                                                                        id="donar_name"
                                                                        value="{{ $deliverable->donar_name }}"
                                                                        required>
                                                                </div>
                                                                <div class="input-section">
                                                                    <label>Project Title <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Project Title"
                                                                        name="project_title" id="project_title"
                                                                        value="{{ $deliverable->project_title }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section">
                                                                    <label>Project Duration From<span
                                                                            style="color: red">*</span></label>
                                                                    <input type="date" class="form-control"
                                                                        name="project_duration_from"
                                                                        id="project_duration_from"
                                                                        value="{{ $deliverable->project_duration_from }}"
                                                                        required>
                                                                </div>
                                                                <div class="input-section">
                                                                    <label>Project Duration To<span
                                                                            style="color: red">*</span></label>
                                                                    <input type="date" class="form-control"
                                                                        name="project_duration_to"
                                                                        id="project_duration_to"
                                                                        value="{{ $deliverable->project_duration_to }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section">
                                                                    <label>Project Location</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Project Location"
                                                                        name="project_location" id="project_location"
                                                                        value="{{ $deliverable->project_location }}">
                                                                </div>
                                                                <div class="input-section">
                                                                    <label>No.Of Month</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="No. Of Month" name="no_of_month"
                                                                        id="no_of_month"
                                                                        value="{{ $deliverable->no_of_month }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section"
                                                                    style="display: flex; flex-direction: column; max-width: 500px;">
                                                                    <label style="margin-bottom: 4px;">Month <span
                                                                            style="color: red">*</span></label>
                                                                    <select class="form-control" name="month"
                                                                        id="month" required
                                                                        style="width: 100%; box-sizing: border-box; padding: 6px 8px;">
                                                                        <option value="" selected>Select Month
                                                                        </option>
                                                                        <option value="apr_25"
                                                                            {{ $deliverable->month == 'apr_25' ? 'selected' : '' }}>
                                                                            Apr-25
                                                                        </option>
                                                                        <option value="may_25"
                                                                            {{ $deliverable->month == 'may_25' ? 'selected' : '' }}>
                                                                            May-25
                                                                        </option>
                                                                        <option value="jun_25"
                                                                            {{ $deliverable->month == 'jun_25' ? 'selected' : '' }}>
                                                                            Jun-25
                                                                        </option>
                                                                        <option value="jul_25"
                                                                            {{ $deliverable->month == 'jul_25' ? 'selected' : '' }}>
                                                                            Jul-25
                                                                        </option>
                                                                        <option value="aug_25"
                                                                            {{ $deliverable->month == 'aug_25' ? 'selected' : '' }}>
                                                                            Aug-25
                                                                        </option>
                                                                        <option value="sep_25"
                                                                            {{ $deliverable->month == 'sep_25' ? 'selected' : '' }}>
                                                                            Sep-25
                                                                        </option>
                                                                        <option value="oct_25"
                                                                            {{ $deliverable->month == 'oct_25' ? 'selected' : '' }}>
                                                                            Oct-25
                                                                        </option>
                                                                        <option value="nov_25"
                                                                            {{ $deliverable->month == 'nov_25' ? 'selected' : '' }}>
                                                                            Nov-25
                                                                        </option>
                                                                        <option value="jan_26"
                                                                            {{ $deliverable->month == 'jan_26' ? 'selected' : '' }}>
                                                                            Jan-26
                                                                        </option>
                                                                        <option value="feb_26"
                                                                            {{ $deliverable->month == 'feb_26' ? 'selected' : '' }}>
                                                                            Feb-26
                                                                        </option>
                                                                        <option value="mar_26"
                                                                            {{ $deliverable->month == 'mar_26' ? 'selected' : '' }}>
                                                                            Mar-26
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-section">
                                                                    <label>Particular <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="particular" id="particular"
                                                                        placeholder="Particulars"
                                                                        value="{{ $deliverable->particular }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section" style="width:100%">
                                                                    <label>Target <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Target" name="target"
                                                                        id="target"
                                                                        value="{{ $deliverable->target }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body-main mb-3">
                                                                <div class="input-section" style="width:100%">
                                                                    <label>Description <span
                                                                            style="color: red">*</span></label>
                                                                    <textarea class="form-control" name="description" id="description" placeholder="Description..." rows="3"
                                                                        required>{{ $deliverable->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary mt-3">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="table-footer">
                    <span id="showing-text-deliverables">
                        Showing {{ $deliverables->firstItem() }} to {{ $deliverables->lastItem() }} of
                        {{ $deliverables->total() }}
                    </span>
                    <div class="pagination" id="pagination-deliverables">
                        {{ $deliverables->appends(request()->except('deliverables_page'))->links() }}
                    </div>
                </div>

            </div>
        </div> --}}
        <div class="user-create-section mt-4">
            <!-- Top Buttons -->
            <h2 style="padding: 20px; text-align:center; font-weight:bold; font-size:20px; color:#587C50">Overall
                Target vs
                Deliverables Dashboard
                (Monthly/Project Duration)</h2>
            <div class="user-create-section-btn d-flex align-items-center"
                style="justify-content: space-between; padding: 10px 20px;">

                <!-- Search Bar (aligned left by default) -->
                <div class="search-box">
                    {{-- <input type="text" class="form-control" placeholder="Search Letter Box"
                        style="width: 250px;"> --}}
                </div>

                <!-- Import Button aligned to right -->
                <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                    data-bs-target="#importModal">
                    Import
                </button>
            </div>
            <!-- Import Modal -->
            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="importModalLabel">Import File</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form action="{{ route('overall-target-import') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="importFile" class="form-label">Choose Excel file to import</label>
                                    <input class="form-control" type="file" name="import_file" id="importFile"
                                        accept=".xls,.xlsx,.xlsm" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{-- import modal --}}
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
                                    @foreach ($overallTarget as $ot)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="text-align: left">{{ $ot->key_indicator }}</td>
                                            <td>{{ $ot->target }}</td>
                                            <td>{{ $ot->achieved }}</td>
                                            <td>{{ $ot->completion }}%</td>
                                            <td>{{ $ot->remarks }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="table-footer">
                    <span id="showing-text-overallTarget">
                        Showing {{ $overallTarget->firstItem() }} to {{ $overallTarget->lastItem() }} of
                        {{ $overallTarget->total() }}
                    </span>
                    <div class="pagination" id="pagination-overallTarget">
                        {{ $overallTarget->appends(request()->except('overallTarget_page'))->links() }}
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
                    {{-- <input type="text" class="form-control" placeholder="Search Letter Box"
                        style="width: 250px;"> --}}
                </div>
                <!-- Import Button aligned to right -->
                <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                    data-bs-target="#progressrackModal">
                    Import
                </button>
            </div>
            <!-- Import Modal -->
            <div class="modal fade" id="progressrackModal" tabindex="-1" aria-labelledby="progressrackModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="progressrackModalLabel">Import File</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form action="{{ route('progress-track-import') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="progressFile" class="form-label">Choose Excel file to import</label>
                                    <input class="form-control" type="file" name="progressFile" id="progressFile"
                                        accept=".xls,.xlsx,.xlsm" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{-- import modal --}}
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
                                    @foreach ($progressTrack as $pt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pt->date)->format('d-M') }}</td>
                                            <td>{{ $pt->location }}</td>
                                            <td style="text-align: left">{{ $pt->activity }}</td>
                                            <td>{{ $pt->shg_covered }}</td>
                                            <td>{{ $pt->member_enrolled }}</td>
                                            <td>{{ $pt->schemes_facilitated }}</td>
                                            <td>{{ $pt->legal_docs_processed }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="table-footer">
                    <span id="showing-text-progressTrack">
                        Showing {{ $progressTrack->firstItem() }} to {{ $progressTrack->lastItem() }} of
                        {{ $progressTrack->total() }}
                    </span>
                    <div class="pagination" id="pagination-progressTrack">
                        {{ $progressTrack->appends(request()->except('progressTrack_page'))->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- Modals -->
@foreach ($deliverables as $deliverable)
    <div class="modal fade" id="myModal{{ $deliverable->id }}" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionLabel{{ $deliverable->id }}">Decsription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <p>{{ $deliverable->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

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
                <form action="{{ route('store-deliverables') }}" method="POST">
                    @csrf
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Program <span style="color: red">*</span></label>
                            <input type="text" placeholder="Program" class="form-control" name="program"
                                id="program" required>
                        </div>
                        <div class="input-section">
                            <label>Project Name <span style="color: red">*</span></label>
                            <input type="text" placeholder="Project Name" class="form-control"
                                name="project_name" id="project_name" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Donor Name <span style="color: red">*</span></label>
                            <input type="text" placeholder="Donor Name" class="form-control" name="donar_name"
                                id="donar_name" required>
                        </div>
                        <div class="input-section">
                            <label>Project Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Project Title"
                                name="project_title" id="project_title" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Project Duration From<span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="project_duration_from"
                                id="project_duration_from" required>
                        </div>
                        <div class="input-section">
                            <label>Project Duration To<span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="project_duration_to"
                                id="project_duration_to" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section">
                            <label>Project Location</label>
                            <input type="text" class="form-control" placeholder="Project Location"
                                name="project_location" id="project_location">
                        </div>
                        <div class="input-section">
                            <label>No.Of Month</label>
                            <input type="text" class="form-control" placeholder="No. Of Month" name="no_of_month"
                                id="no_of_month">
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section" style="display: flex; flex-direction: column; max-width: 500px;">
                            <label style="margin-bottom: 4px;">Month <span style="color: red">*</span></label>
                            <select class="form-control" name="month" id="month" required
                                style="width: 100%; box-sizing: border-box; padding: 6px 8px;">
                                <option value="" selected>Select Month</option>
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
                            <input type="text" class="form-control" name="particular" id="particular"
                                placeholder="Particulars" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section" style="width:100%">
                            <label>Target <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Target" name="target"
                                id="target" required>
                        </div>
                    </div>
                    <div class="modal-body-main mb-3">
                        <div class="input-section" style="width:100%">
                            <label>Description <span style="color: red">*</span></label>
                            <textarea class="form-control" name="description" id="description" placeholder="Description..." rows="3"
                                required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    const fullLabels = @json($countings->pluck('key_indicator'));
    const labels = @json($labels);
    const totalTargets = @json($totalTargets);
    const achievedTargets = @json($achievedTargets);

    window.addEventListener("DOMContentLoaded", () => {

        const chartConfigs = [{
                id: 'chart1',
                labels: labels,
                dataset1: {
                    label: 'Total Target',
                    data: totalTargets,
                    color: '#587C50'
                },
                dataset2: {
                    label: 'Target Achieved',
                    data: achievedTargets,
                    color: '#323F2F'
                }
            },

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
                            enabled: true,
                            callbacks: {
                                title: function(context) {
                                    if (typeof fullLabels !== "undefined" && Array.isArray(
                                            fullLabels)) {
                                        return fullLabels[context[0].dataIndex] || '';
                                    }
                                    return context[0].label;
                                }
                            }
                        }
                    }
                }
            });
        });
    });

    // {
    //     id: 'chart2',
    //     labels: ['Abha Card', 'E-Shram..', 'Shram Yo..', 'Voter ID', 'Aadhaar..', 'PVC Aad',
    //         'PAN Card', 'Widow Pe', 'Food Like', 'PMSBY', 'Ayushma..', 'Kisan Re', 'Other'
    //     ],
    //     dataset1: {
    //         label: 'Male Applicants',
    //         data: [8, 6, 14, 6, 7, 12, 3, 5, 8, 5, 7, 8, 12],
    //         color: '#587C50'
    //     },
    //     dataset2: {
    //         label: 'Female Applicants',
    //         data: [5, 10, 12, 3, 7, 9, 12, 15, 8, 6, 5, 7, 12],
    //         color: '#323F2F'
    //     }
    // },
    // {
    //     id: 'chart3',
    //     labels: ['Assam', 'Bihar', 'Delhi', 'Haryana', 'Himachal', 'Jammu&..', 'Karnatka', 'Odisha',
    //         'Maharash..', 'Uttarakhan..', 'Uttar Pra..', 'UT of Lad..', 'Gujrat', 'West Ben..',
    //         'Arunacha..', 'Other'
    //     ],
    //     dataset1: {
    //         label: 'Budgeted ($K)',
    //         data: [8, 6, 14, 6, 7, 12, 3, 5, 8, 5, 7, 8, 12, 5, 12, 17],
    //         color: '#587C50'
    //     },
    //     dataset2: {
    //         labels: ['October', 'Noveember', 'December', 'January', 'February', 'March'],
    //         data: [5, 10, 12, 3, 7, 9, 12, 15, 8, 6, 5, 7, 12, 13, 5, 2],
    //         color: '#323F2F'
    //     }
    // },
    // {
    //     id: 'chart4',
    //     labels: ['October', 'Noveember', 'December', 'January', 'February', 'March'],
    //     dataset1: {
    //         label: 'Initiated',
    //         data: [5, 10, 12, 3, 7, 9],
    //         color: '#587C50'
    //     },
    //     dataset2: {
    //         label: 'Onboarded',
    //         data: [8, 6, 14, 6, 7, 12],
    //         color: '#323F2F'
    //     }
    // },
    // {
    //     id: 'chart5',
    //     labels: ['Sonbhadra', 'Delhi'],
    //     dataset1: {
    //         label: 'Online Applications',
    //         data: [60, 70],
    //         color: '#587C50'
    //     },
    //     dataset2: {
    //         label: 'In-person Applications',
    //         data: [55, 15],
    //         color: '#323F2F'
    //     }
    // },
    // {
    //     id: 'chart6',
    //     labels: ['October', 'November', 'December', 'January', 'February', 'March'],
    //     dataset1: {
    //         label: 'Volunteers Signed Up',
    //         data: [120, 100, 90, 20, 30, 50],
    //         color: '#587C50'
    //     },
    //     dataset2: {
    //         label: 'Volunteers Attended',
    //         data: [100, 80, 70, 90, 58, 70],
    //         color: '#323F2F'
    //     }
    // }
</script>

<!-- Bootstrap 5 CSS -->
