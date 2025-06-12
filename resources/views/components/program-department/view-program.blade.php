<div class="scr-registration-section">
    <div class="containers p-0">
        {{-- <div class="csr-registration-main-heading csr-registration-main-heading-main">
            <p>Program Status</p>
            <div class="all-program-all-grant-dropdown">
                <select class="all-program-all-grant-dropdown">
                    <option value="">Select Program Type</option>
                    <option value="social_protection">Social protection</option>
                    <option value="livelihood_beneficiray">Livelihood Beneficiary</option>
                    <option value="community_capacity">Community Capacity</option>
                    <option value="digital_literacy">Digital Literacy & Financial Inclusion</option>
                </select>
                <select class="all-program-all-grant-dropdown">
                    <option value=""> Select Project</option>
                    <option value="sahyog">Sahyog</option>
                    <option value="unnati">Unnati</option>
                    <option value="saksham">Saksham</option>
                    <option value="uttkarsh">Uttkarsh</option>
                    <option value="others">Others</option>
                </select>
            </div>
        </div> --}}

        <form class="scr-registration-form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">State</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="state"></canvas>
                                    </div>

                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul id="chartLabelList">
                                        {{-- Dynamic labels will be rendered here --}}
                                    </ul>

                                    <div class="next-prev-btn">
                                        <button type="button" class="btn btn-outline-primary" id="prevBtn">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-success" id="nextBtn">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>

                                    {{-- Pass chart data to JS --}}
                                    <script>
                                        const chartLabels = @json($chartData['labels']);
                                        const chartValues = @json($chartData['data']);
                                        const chartColors = @json($chartColors);
                                    </script>
                                </div>

                                {{-- Pagination Script --}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const listEl = document.getElementById('chartLabelList');
                                        const prevBtn = document.getElementById('prevBtn');
                                        const nextBtn = document.getElementById('nextBtn');

                                        const itemsPerPage = 4;
                                        let currentPage = 0;

                                        function renderList() {
                                            listEl.innerHTML = '';
                                            const start = currentPage * itemsPerPage;
                                            const end = start + itemsPerPage;

                                            for (let i = start; i < end && i < chartLabels.length; i++) {
                                                const color = chartColors[i % chartColors.length];
                                                const li = document.createElement('li');
                                                li.innerHTML = `<span style="color: ${color};">●</span> ${chartLabels[i]} ${chartValues[i]}%`;
                                                listEl.appendChild(li);
                                            }

                                            prevBtn.disabled = currentPage === 0;
                                            nextBtn.disabled = end >= chartLabels.length;
                                        }

                                        prevBtn.addEventListener('click', () => {
                                            if (currentPage > 0) {
                                                currentPage--;
                                                renderList();
                                            }
                                        });

                                        nextBtn.addEventListener('click', () => {
                                            if ((currentPage + 1) * itemsPerPage < chartLabels.length) {
                                                currentPage++;
                                                renderList();
                                            }
                                        });

                                        renderList();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">District</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="district"></canvas>
                                    </div>

                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul id="districtLabelList">
                                        {{-- JavaScript will populate the district labels --}}
                                    </ul>

                                    <div class="next-prev-btn">
                                        <button type="button" class="btn btn-outline-primary" id="districtPrevBtn">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-success" id="districtNextBtn">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>

                                {{-- Inject JS-friendly data --}}
                                <script>
                                    const districtLabels = @json($districtChartData['labels']);
                                    const districtData = @json($districtChartData['data']);
                                    const districtColors = @json($chartColors);
                                </script>

                                {{-- Pagination script --}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const districtListEl = document.getElementById('districtLabelList');
                                        const districtPrevBtn = document.getElementById('districtPrevBtn');
                                        const districtNextBtn = document.getElementById('districtNextBtn');

                                        const districtItemsPerPage = 4;
                                        let districtCurrentPage = 0;

                                        function renderDistrictList() {
                                            districtListEl.innerHTML = '';
                                            const start = districtCurrentPage * districtItemsPerPage;
                                            const end = start + districtItemsPerPage;

                                            for (let i = start; i < end && i < districtLabels.length; i++) {
                                                const color = districtColors[i % districtColors.length];
                                                const li = document.createElement('li');
                                                li.innerHTML =
                                                    `<span style="color: ${color};">●</span> ${districtLabels[i]} ${districtData[i]}%`;
                                                districtListEl.appendChild(li);
                                            }

                                            districtPrevBtn.disabled = districtCurrentPage === 0;
                                            districtNextBtn.disabled = end >= districtLabels.length;
                                        }

                                        districtPrevBtn.addEventListener('click', () => {
                                            if (districtCurrentPage > 0) {
                                                districtCurrentPage--;
                                                renderDistrictList();
                                            }
                                        });

                                        districtNextBtn.addEventListener('click', () => {
                                            if ((districtCurrentPage + 1) * districtItemsPerPage < districtLabels.length) {
                                                districtCurrentPage++;
                                                renderDistrictList();
                                            }
                                        });

                                        renderDistrictList();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Area</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="area"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($areaChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $areaChartData['data'][$index] }}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Project</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="project"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($projectChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $projectChartData['data'][$index] }}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Support Patner / Resource Orgnisation</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="support_partner"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($support_partnerChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $support_partnerChartData['data'][$index] }}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Team Member Name</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="team_member_name"></canvas>
                                    </div>

                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($team_member_nameChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $team_member_nameChartData['data'][$index] }}%
                                            </li>
                                        @endforeach
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Age</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="age"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($ageChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $ageChartData['data'][$index] }}%
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Gender</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="gender"></canvas>
                                    </div>

                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($genderChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $genderChartData['data'][$index] }}%
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Caste</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="caste"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($casteChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $casteChartData['data'][$index] }}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Religion</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="religion"></canvas>
                                    </div>

                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($religionChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $religionChartData['data'][$index] }}%
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Occupation</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="occupation"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($occupationChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $occupationChartData['data'][$index] }}%
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Monthly Income</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="monthly_income"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($familyIncomeChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $familyIncomeChartData['data'][$index] }}%
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Differently Abled</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row align-items-center">
                                <div class="col-md-7" style="display: flex; justify-content:center">
                                    <div class="chart-container" style="height: 225px">
                                        <canvas id="differently_abled"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5 grapgh-content">
                                    <ul>
                                        @foreach ($differentlyAbledChartData['labels'] as $index => $label)
                                            <li>
                                                <span
                                                    style="color: {{ $chartColors[$index % count($chartColors)] }};">●</span>
                                                {{ $label }} {{ $differentlyAbledChartData['data'][$index] }}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox p-0">
                        <div class="ibox-head">
                            <div class="ibox-title">Support</div>
                        </div>
                        <div class="ibox-body p-2">
                            <div class="ibox-chart" style="width: 100%; height: 200px;"> <!-- Set desired height -->
                                <canvas id="hiresChart" style="height: 100% !important;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="grant-list grant-list-govt ">
            <div class="mb-4">
                <form action="{{ route('filter-progam') }}" method="POST" id="programFilterForm">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <select name="program_type" class="form-control">
                                <option value="">Select Program Type</option>
                                <option value="social_protection"
                                    {{ request('program_type') == 'social_protection' ? 'selected' : '' }}>
                                    Social Protection
                                </option>
                                <option value="livelihood_beneficiray"
                                    {{ request('program_type') == 'livelihood_beneficiray' ? 'selected' : '' }}>
                                    Livelihood Beneficiary
                                </option>
                                <option value="community_capacity"
                                    {{ request('program_type') == 'community_capacity' ? 'selected' : '' }}>
                                    Community Capacity
                                </option>
                                <option value="digital_literacy"
                                    {{ request('program_type') == 'digital_literacy' ? 'selected' : '' }}>
                                    Digital Literacy & Finacial Inclusion
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-2">Apply</button>
                            <button type="button" class="btn btn-secondary mr-2"
                                onclick="resetFilter()">Reset</button>
                            <button type="button" class="btn btn-info" onclick="exportData()">Export</button>
                        </div>
                    </div>
                </form>
            </div>
            @php
                $programs = $filteredProgram->count() > 0 ? $filteredProgram : $programs;
            @endphp
            <div class="grant-table-scroll">
                <table class="table grant-table" id="grantTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Program Type</th>
                            <th>Form Date</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Donor Organisation</th>
                            <th>Project</th>
                            <th>Support Partner</th>
                            <th>Team Member Name</th>
                            <th>Beneficiary Name </th>
                            <th>Age </th>
                            <th>Gender </th>
                            <th>Caste </th>
                            <th>Mobile Number </th>
                            <th>Religion </th>
                            <th>Occupation</th>
                            <th>Family Income</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $index => $program)
                            <tr>
                                <td>{{ $programs->firstItem() + $index }}</td>
                                <td>{{ $program->program_type ?? 'N/A' }}</td>
                                <td>{{ $program->date ? \Carbon\Carbon::parse($program->date)->format('d/m/Y') : 'N/A' }}
                                </td>
                                <td>{{ $program->state ?? 'N/A' }}</td>
                                <td>{{ $program->district ?? 'N/A' }}</td>
                                <td>{{ $program->csr->company_name ?? 'N/A' }}</td>
                                <td>{{ $program->project ?? 'N/A' }}</td>
                                <td>{{ $program->partnerOrg['company/ngo_name'] ?? 'N/A' }}</td>
                                <td>{{ $program->team->full_name ?? 'N/A' }}</td>
                                <td>{{ $program->beneficiary_name ?? 'N/A' }}</td>
                                <td>{{ $program->age ? $program->age . ' Years' : 'N/A' }}</td>
                                <td>{{ $program->gender ?? 'N/A' }}</td>
                                <td>{{ $program->caste ?? 'N/A' }}</td>
                                <td>{{ $program->mobile_number ?? 'N/A' }}</td>
                                <td>{{ $program->religion ?? 'N/A' }}</td>
                                <td>{{ $program->occupation ?? 'N/A' }}</td>
                                <td>{{ $program->family_income ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('our-program.view-program-details', encrypt($program->id)) }}">
                                        <button class="btn btn-info">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('edit-program', encrypt($program->id)) }}">
                                        <button class="btn btn-success">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('delete-program', $program->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="grant-pagination-container">
                <div class="grant-pagination-info">
                    Showing {{ $programs->firstItem() }} to {{ $programs->lastItem() }} of {{ $programs->total() }}
                    records
                </div>

                <div class="grant-pagination">
                    {{-- Previous Button --}}
                    <button class="btn btn-light pagination-btn" {{ $programs->onFirstPage() ? 'disabled' : '' }}
                        onclick="window.location='{{ request()->fullUrlWithQuery(['page' => $programs->currentPage() - 1]) }}'">
                        Previous
                    </button>

                    {{-- Page Numbers --}}
                    <div class="pagination-numbers">
                        @for ($page = 1; $page <= $programs->lastPage(); $page++)
                            <button class="pagination-number {{ $programs->currentPage() == $page ? 'active' : '' }}"
                                onclick="window.location='{{ request()->fullUrlWithQuery(['page' => $page]) }}'">
                                {{ $page }}
                            </button>
                        @endfor
                    </div>

                    {{-- Next Button --}}
                    <button class="btn btn-light pagination-btn" {{ $programs->hasMorePages() ? '' : 'disabled' }}
                        onclick="window.location='{{ request()->fullUrlWithQuery(['page' => $programs->currentPage() + 1]) }}'">
                        Next
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    Chart.register(ChartDataLabels);

    const pieCharts = [{
            id: 'state',
            data: @json($chartData['data']),
            labels: @json($chartData['labels'])
        },
        {
            id: 'district',
            data: @json($districtChartData['data']),
            labels: @json($districtChartData['labels'])
        },
        {
            id: 'area',
            data: @json($areaChartData['data']),
            labels: @json($areaChartData['labels'])
        },
        {
            id: 'project',
            data: @json($projectChartData['data']),
            labels: @json($projectChartData['labels'])
        },
        // {
        //     id: 'support_partner',
        //     data: @json($support_partnerChartData['data']),
        //     labels: @json($support_partnerChartData['labels'])
        // },
        {
            id: 'team_member_name',
            data: @json($team_member_nameChartData['data']),
            labels: @json($team_member_nameChartData['labels'])
        }, {
            id: 'age',
            data: @json($ageChartData['data']),
            labels: @json($ageChartData['labels'])
        }, {
            id: 'gender',
            data: @json($genderChartData['data']),
            labels: @json($genderChartData['labels'])
        }, {
            id: 'caste',
            data: @json($casteChartData['data']),
            labels: @json($casteChartData['labels'])
        }, {
            id: 'religion',
            data: @json($religionChartData['data']),
            labels: @json($religionChartData['labels'])
        },
        {
            id: 'occupation',
            data: @json($occupationChartData['data']),
            labels: @json($occupationChartData['labels'])
        },
        {
            id: 'monthly_income',
            data: @json($familyIncomeChartData['data']),
            labels: @json($familyIncomeChartData['labels'])
        }, {
            id: 'differently_abled',
            data: @json($differentlyAbledChartData['data']),
            labels: @json($differentlyAbledChartData['labels'])
        }
    ];

    const backgroundColors = [
        '#FF6384', '#36A2EB', '#FFCD56', '#2ECC71',
        '#8E44AD', '#E67E22'
    ];

    pieCharts.forEach(chart => {
        const canvas = document.getElementById(chart.id);
        if (canvas) {
            const ctx = canvas.getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: chart.labels,
                    datasets: [{
                        label: 'Expenses',
                        data: chart.data,
                        backgroundColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.parsed || 0;
                                    return `${label}: ${value.toLocaleString()}%`;
                                }
                            }
                        }
                    }
                }
            });
        } else {
            console.error(`Canvas with ID "${chart.id}" not found!`);
        }
    });


    Chart.register(ChartDataLabels);
    const screenWidth = window.innerWidth;
    const labels = @json($supportChartData['labels']);

    const dataValues = @json($supportChartData['data']);

    const ctx = document.getElementById('hiresChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: screenWidth <= 426 ? labels.map(() => '') : labels,
            datasets: [{
                label: 'Hires',
                data: dataValues,
                backgroundColor: '#007b8a',
                borderRadius: 5
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false, // Add this line
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    anchor: 'end',
                    align: 'right',
                    color: '#000',
                    font: {
                        weight: 'bold'
                    },
                    formatter: value => value
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });

    // Dynamically update labels on resize
    window.addEventListener('resize', () => {
        const newWidth = window.innerWidth;
        chart.data.labels = newWidth <= 426 ? labels.map(() => '') : labels;
        chart.update();
    });
</script>


<script>
    function resetFilter() {

        document.getElementById('programFilterForm').reset();

        window.location.href = "{{ route('our-program.view-program') }}";
    }
</script>

<script>
    function exportData() {
        const form = document.getElementById('programFilterForm');
        const programType = form.querySelector('select[name="program_type"]').value;

        const queryParams = new URLSearchParams({
            program_type: programType
        }).toString();

        const exportUrl = "{{ route('program.export') }}?" + queryParams;
        window.location.href = exportUrl;
    }
</script>
