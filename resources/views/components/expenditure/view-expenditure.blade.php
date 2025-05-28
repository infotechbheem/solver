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
            <p>View Expanse</p>
        </div>
        <form class="scr-registration-form">
            <div class="scr-registration-row">
                <div class="scr-form-group ">
                    <div class="scr-form-group-main">
                        <div class="scr-form-group-icon">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                        <div class="scr-form-group-content">
                            <p>Total Expanse</p>
                            <span>₹ 405002.00</span>
                            <p>Last 6 month expanse</p>
                        </div>
                    </div>
                </div>
                <div class="scr-form-group ">
                    <div class="scr-form-group-main ">
                        <div class="scr-form-group-icon scr-form-group-icon2">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                        <div class="scr-form-group-content">
                            <p>Today's Expanse </p>
                            <span>₹ 0</span>
                            <p>Today expanse</p>
                        </div>
                    </div>
                </div>
                <div class="scr-form-group ">
                    <div class="scr-form-group-main">
                        <div class="scr-form-group-icon scr-form-group-icon3">
                            <i class="fa-solid fa-calendar-plus"></i>
                        </div>
                        <div class="scr-form-group-content">
                            <p>Yesterday's Expanse</p>
                            <span>₹ 4002.00</span>
                            <p>This month Expanse</p>
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
            <div class="scr-registration-row" style="display: flex;gap:40px">
                <div class="scr-form-group">
                    <label>Sector of Expenses</label>
                    <div class="view" style="display: flex;gap:1px">
                        <select>
                            <option>Select Sector of Expenses</option>
                            <option>Project Base</option>
                            <option>Office Base</option>
                        </select>
                        <button class="btn btn-success" style="background-color: #587C50">View</button>
                    </div>
                </div>
                <div class="scr-form-group">
                    <label>Expenditure Type</label>
                    <div class="view" style="display: flex;gap:1px">
                        <select>
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
                        <button class="btn btn-success" style="background-color: #587C50">View</button>
                    </div>
                </div>

            </div>
        </form>
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
                            <th>Salary </th>
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
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td> 20/04/2025</td>
                            <td>₹ 24000</td>
                            <td> JST Project</td>
                            <td>₹ 2400</td>
                            <td>10%</td>
                            <td>₹ 2400</td>
                            <td>Online</td>
                            <td>₹ 2400</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>Direct</td>
                            <td>
                                <a href="{{ url('/finance-department/expenditure/view-expenditure-details') }}">
                                    <button class="btn btn-info"><i class="fa-regular fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/finance-department/expenditure/update-expenditure-details') }}">

                                    <button class="btn btn-success">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>

                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>John Doe</td>
                            <td> 20/04/2025</td>
                            <td>₹ 24000</td>
                            <td> JST Project</td>
                            <td>₹ 2400</td>
                            <td>10%</td>
                            <td>₹ 2400</td>
                            <td>Online</td>
                            <td>₹ 2400</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>Direct</td>
                            <td>
                                <a href="{{ url('/finance-department/expenditure/view-expenditure-details') }}">
                                    <button class="btn btn-info"><i class="fa-regular fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/finance-department/expenditure/update-expenditure-details') }}">

                                    <button class="btn btn-success">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </td>

                        <tr>
                            <td>3</td>
                            <td>John Doe</td>
                            <td> 20/04/2025</td>
                            <td>₹ 24000</td>
                            <td> JST Project</td>
                            <td>₹ 2400</td>
                            <td>10%</td>
                            <td>₹ 2400</td>
                            <td>Online</td>
                            <td>₹ 2400</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>Direct</td>
                            <td>
                                <a href="{{ url('/finance-department/expenditure/view-expenditure-details') }}">
                                    <button class="btn btn-info"><i class="fa-regular fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/finance-department/expenditure/update-expenditure-details') }}">

                                    <button class="btn btn-success">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </td>

                        </tr>
                        <tr>
                            <td>4</td>
                            <td>John Doe</td>
                            <td> 20/04/2025</td>
                            <td>₹ 24000</td>
                            <td> JST Project</td>
                            <td>₹ 2400</td>
                            <td>10%</td>
                            <td>₹ 2400</td>
                            <td>Online</td>
                            <td>₹ 2400</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>Direct</td>
                            <td>
                                <a href="{{ url('/finance-department/expenditure/view-expenditure-details') }}">
                                    <button class="btn btn-info"><i class="fa-regular fa-eye"></i></button>
                                </a>
                                <a href="{{ url('/finance-department/expenditure/update-expenditure-details') }}">

                                    <button class="btn btn-success">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="grant-pagination-container">
                <div class="grant-pagination-info">Showing 1 to 4 of 20 records</div>
                <div class="grant-pagination">
                    <button class="btn btn-light pagination-btn" disabled>Previous</button>
                    <div class="pagination-numbers">
                        <button class="pagination-number active">1</button>
                        <button class="pagination-number">2</button>
                    </div>
                    <button class="btn btn-light pagination-btn">Next</button>
                </div>
            </div>

        </div>
    </div>
</div>
