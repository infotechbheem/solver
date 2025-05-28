<style>
    .grant-searchbar {
        display: flex;
        justify-content: space-between;
        align-items: end;
        margin-bottom: 30px
    }

    .grant-search {
        padding: 12px
    }
</style>
<div class="scr-registration-section">
    <div class="containers p-0">
        <div class="csr-registration-main-heading">
            <p>Total Expense</p>
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
                            <p>Total Alloted Amount </p>
                            <span>₹ 200000</span>
                            <p>Last 6 month expanse</p>
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
                            <div class="ibox-title">Expense</div>
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
                            <div class="ibox-title">Alloted Amount</div>
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
        </form>
        <div class="grant-list grant-list-govt ">
            <div class="grant-searchbar">
                <input type="text" id="grant-search-bar" class="form-control grant-search" placeholder="Search..."
                    onkeyup="searchGrants()">
                <div class="scr-form-group" style="flex: 0">
                    <label style="width:300px">Sector of Expenses</label>
                    <div class="view" style="display: flex;gap:10;width:300px">
                        <select>
                            <option>Select Sector of Expenses</option>
                            <option>Project Based</option>
                            <option>Office Based</option>
                        </select>
                        <button class="btn btn-success">View</button>
                    </div>
                </div>
            </div>
            <div class="grant-table-scroll">
                <table class="table grant-table" id="grantTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Human Resource</th>
                            <th>Equipment & Suplies</th>
                            <th>Travel Expense</th>
                            <th>IEC Material Expense</th>
                            <th>Accomondation Expense</th>
                            <th>Miscellaneous Expense</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td> 20/04/2025</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td> 20/04/2025</td>

                        <tr>
                            <td>3</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td>₹ 2300</td>
                            <td>₹ 1300</td>
                            <td> 20/04/2025</td>
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
