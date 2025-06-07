<style>
    .ibox {

        box-shadow: #32349758 0px 1px 3px 0px, #32349758 0px 0px 0px 1px;
        padding: 10px;
        border-radius: 5px;
    }

    .ibox .ibox-head {
        border-radius: 0;
        border: 2px solid #32349758;
    }
</style>
<div class="scr-registration-section">
    <div class="containers p-0">
        <div class="csr-registration-main-heading">
            <p>View Expense</p>
        </div>
        {{-- <form class="scr-registration-form" action="{{ route('filter-record') }}" method="POST">
            @csrf
            <div class="scr-registration-row" style="display: flex;gap:40px">
                <div class="scr-form-group">
                    <label>Sector of Expenses</label>
                    <div class="view" style="display: flex;gap:1px">
                        <select id="expenseSector" name="expenseSector">
                            <option>Select Sector of Expenses</option>
                            <option>Project Base</option>
                            <option>Office Base</option>
                        </select>
                    </div>
                </div>
                <div class="scr-form-group">
                    <label>Expenditure Type</label>
                    <div class="view" style="display: flex;gap:1px">
                        <select id="expenseType" name="expenseType">
                            <option>Select Expenditure Type</option>
                            <option>Human Resource</option>
                            <option>Transport</option>
                            <option>Food</option>
                            <option>Accomondation</option>
                            <option>IT Service</option>
                            <option>Printing</option>
                            <option>Equipments</option>
                            <option>Other Miscellaneous</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <button class="btn btn-success" style="background-color: #587C50; padding: 8px 24px;">
                    View
                </button>
            </div>
        </form> --}}
        <div class="scr-registration-row">
            <div class="scr-form-group ">
                <div class="scr-form-group-main">
                    <div class="scr-form-group-icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <div class="scr-form-group-content">
                        <p>Total Expense</p>
                        <span>₹ {{ $totalExpenditure }}</span>
                        {{-- <p>Last 6 month expanse</p> --}}
                    </div>
                </div>
            </div>
            <div class="scr-form-group ">
                <div class="scr-form-group-main ">
                    <div class="scr-form-group-icon scr-form-group-icon2">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </div>
                    <div class="scr-form-group-content">
                        <p>Today's Expense </p>
                        <span>₹ {{ $todayExpenditureTotal }}</span>
                        <p>Today expense</p>
                    </div>
                </div>
            </div>
            <div class="scr-form-group ">
                <div class="scr-form-group-main">
                    <div class="scr-form-group-icon scr-form-group-icon3">
                        <i class="fa-solid fa-calendar-plus"></i>
                    </div>
                    <div class="scr-form-group-content">
                        <p>Yesterday's Expense</p>
                        <span>₹ {{ $yesterdayExpenditureTotal }}</span>
                        <p>This month Expense</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox p-0">
                    <div class="ibox-head">
                        <div class="ibox-title">Project Based Expenditure</div>
                    </div>
                    <div class="ibox-body p-2">
                        <div style="width: 100%; height: 250px;"> <!-- Added height for responsiveness -->
                            <canvas id="hiresChart"></canvas>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox p-0">
                    <div class="ibox-head">
                        <div class="ibox-title">Office Expenditure</div>
                    </div>
                    <div class="ibox-body">
                        <div class="row align-items-center">
                            <div class="col-md-12" style="display: flex; justify-content:center">
                                <div class="chart-container" style="height: 225px">
                                    <canvas id="myPieChart"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grant-list grant-list-govt ">
            <div class="grant-searchbar">
                <input type="text" id="grant-search-bar" class="form-control grant-search" placeholder="Search..."
                    onkeyup="searchGrants()">
            </div>
            <div class="grant-table-scroll">
                <table class="table grant-table" id="grantTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th> Date of Expense</th>
                            {{-- <th>Salary </th> --}}
                            <th>Project Name</th>
                            <th>Amount</th>
                            <th>TDS Deduction %</th>
                            <th>TDS Deduction Amount</th>
                            <th>Mode of Payment</th>
                            <th>Total Amount</th>
                            <th>Advance</th>
                            <th>Net Payment</th>
                            <th>Type Of Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenseList as $expense)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $expense->name ?? '-' }}</td>
                                <td>{{ $expense->expense_date ? \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') : '-' }}
                                </td>
                                <td>{{ $expense->project_name ?? '-' }}</td>
                                <td>
                                    {{ $expense->amount !== null ? '₹' . $expense->amount : '-' }}
                                </td>
                                <td>
                                    {{ $expense->tds_deduction_percentage !== null ? $expense->tds_deduction_percentage . '%' : '-' }}
                                </td>
                                <td>
                                    {{ $expense->tds_deduction_amount !== null ? '₹' . $expense->tds_deduction_amount : '-' }}
                                </td>
                                <td>{{ $expense->mode_of_payment ?? '-' }}</td>
                                <td>
                                    {{ $expense->sub_total_amount !== null ? '₹' . $expense->sub_total_amount : '-' }}
                                </td>
                                <td>
                                    {{ $expense->advance !== null ? '₹' . $expense->advance : '-' }}
                                </td>
                                <td>
                                    {{ $expense->net_payment !== null ? '₹' . $expense->net_payment : '-' }}
                                </td>
                                <td>{{ $expense->type_of_payment ?? '-' }}</td>
                                <td>
                                    <a
                                        href="{{ url('/finance-department/expenditure/view-expenditure-details', encrypt($expense->id)) }}">
                                        <button class="btn btn-info"><i class="fa-regular fa-eye"></i></button>
                                    </a>
                                    <a href="{{ url('/finance-department/expenditure/update-expenditure-details', encrypt   ($expense->id)) }}">

                                        <button class="btn btn-success">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('expenditure-delete', $expense->id) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
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
                    Showing {{ $expenseList->firstItem() }} to {{ $expenseList->lastItem() }} of
                    {{ $expenseList->total() }} records
                </div>
                <div class="grant-pagination">
                    <button class="btn btn-light pagination-btn" {{ $expenseList->onFirstPage() ? 'disabled' : '' }}
                        onclick="window.location='{{ $expenseList->previousPageUrl() }}'">
                        Previous
                    </button>

                    <div class="pagination-numbers">
                        @foreach ($expenseList->getUrlRange(1, $expenseList->lastPage()) as $page => $url)
                            <button
                                class="pagination-number {{ $page == $expenseList->currentPage() ? 'active' : '' }}"
                                onclick="window.location='{{ $url }}'">
                                {{ $page }}
                            </button>
                        @endforeach
                    </div>

                    <button class="btn btn-light pagination-btn" {{ !$expenseList->hasMorePages() ? 'disabled' : '' }}
                        onclick="window.location='{{ $expenseList->nextPageUrl() }}'">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
