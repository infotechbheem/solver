<div class="scr-registration-section">
    <div class="container p-0">
        <div class="csr-registration-main-heading">
            <p>Add Expenditure</p>
        </div>
        <form class="scr-registration-form" action="{{ route('store-expenditure') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Date Of Expense <span>*</span></label>
                    <input type="date" id="expense_date" name="expense_date" required>
                </div>

                <div class="scr-form-group">
                    <label> Sector of Expenses <span>*</span></label>
                    <select id="expense_sector" name="expense_sector">
                        <option>Select Sector of Expenses</option>
                        <option value="project_based">Project Based</option>
                        <option value="office_expenses">Office Expenses</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <div class="scr-form-group">
                        <label>Project Name <span>*</span></label>
                        <input type="text" id="project_name" name="project_name" placeholder="project name" required>
                    </div>
                </div>

            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <div class="scr-form-group">
                        <label> Name <span>*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter name" required>
                    </div>
                </div>
                <div class="scr-form-group" id="expenditureType" style="display: none;">
                    <label>Type of Expenditure<span>*</span></label>
                    <select id="type_of_expense" name="type_of_expense">
                        <option value="">Select Type of Expenditure</option>
                        <option value="human_resource">Human Resource</option>
                        <option value="equipment">Equipment & Suplies</option>
                        <option value="travel_expenses">Travel Expenses</option>
                        <option value="iec_material">IEC Material Expenses</option>
                        <option value="accomodation_expenses">Accomondation Expenses</option>
                        <option value="miscellaneous_expenses">Miscellaneous Expenses</option>
                    </select>
                </div>
                <div class="scr-form-group" id="expenditureAdmin" style="display: none;">
                    <label> Adminstrative Expenses <span>*</span></label>
                    <select id="administrative_expense" name="administrative_expense">
                        <option value="">Select Adminstrative Expense</option>
                        <option value="food_beverage">Food & Beverage</option>
                        <option value="rent"> Rent</option>
                        <option value="utilities"> Utilities</option>
                        <option value="insurance"> Insurance</option>
                        <option value="wages_salaries"> Wages & Salaries</option>
                        <option value="office_fixtures"> Office Fistures & Equipment</option>
                        <option value="legal_finance_service"> Legal & Finance Service Fees</option>
                        <option value="office_suplies">Office Suplies</option>
                        <option value="travel">Travel</option>
                        <option value="it_service">IT Service</option>
                        <option value="licence_subscriptions">Licence & Subscriptions</option>
                    </select>
                </div>
            </div>
            <div id="human_res" style="display: none;">
                <h3 class="scr-registration-heading">Human Resource</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Human Resource<span>*</span></label>
                        <select id="human_resource" name="human_resource">
                            <option value="">Select</option>
                            <option value="salary">Salary</option>
                            <option value="honorarium">Honorarium</option>
                            <option value="stipend">stipned</option>
                            <option value="advance">Advance</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Date Of Expense <span>*</span></label>
                        <input type="date" id="hr_expense_date" name="hr_expense_date">
                    </div>
                </div>
            </div>
            <div id="equip" style="display: none;">
                <h3 class="scr-registration-heading">Equipment & and Suplies</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date Of Expense <span>*</span></label>
                        <input type="date" id="equip_expense_date" name="equip_expense_date">
                    </div>
                    <div class="scr-form-group">
                        <label>Cost <span>*</span></label>
                        <input type="text" id="equip_cost" name="equip_cost" placeholder="Enter cost">
                    </div>
                    <div class="scr-form-group">
                        <label> Supplier Name<span>*</span></label>
                        <input type="text" id="equip_supplier_name" name="equip_supplier_name"
                            placeholder="Enter suplier name">
                    </div>
                </div>
            </div>
            {{-- <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label> Equipment Description </label>
                      <textarea></textarea>
                  </div>
              </div> --}}
            <div id="travel" style="display: none;">
                <h3 class="scr-registration-heading">Travel Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>date <span>*</span></label>
                        <input type="date" id="travel_exp_date" name="travel_exp_date">
                    </div>
                    <div class="scr-form-group">
                        <label>Departure <span>*</span></label>
                        <input type="text" id="travel_exp_departure" name="travel_exp_departure"
                            placeholder="Enter Departure">
                    </div>
                    <div class="scr-form-group">
                        <label>Arrival <span>*</span></label>
                        <input type="text" id="travel_exp_arrirval" name="travel_exp_arrirval"
                            placeholder="Enter arrival">
                    </div>
                    <div class="scr-form-group">
                        <label>Mode of Travel<span>*</span></label>
                        <select id="travel_exp_mode_of_travel" name="travel_exp_mode_of_travel">
                            <option value="">Select Travel Mode</option>
                            <option value="air">Air</option>
                            <option value="train">Train</option>
                            <option value="metro">metro</option>
                            <option value="cabs_taxi">Cabs/taxi</option>
                            <option value="auto">Auto</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="material" style="display: none;">
                <h3 class="scr-registration-heading">IEC Materials Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date Of Expanse <span>*</span></label>
                        <input type="date" id="date_of_material_exp" name="date_of_material_exp">
                    </div>

                    <div class="scr-form-group">
                        <label>Item <span>*</span></label>
                        <select id="item" name="item">
                            <option value="">Select Item</option>
                            <option value="pamphlets"> Pamphlets / Flyers</option>
                            <option value="posters"> Posters / Banners</option>
                            <option value="brochures">Brochures / Booklets</option>
                            <option value="tshirts"> T-Shirts / Caps</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Quantity <span>*</span></label>
                        <input type="text" id="quantity" name="quantity" placeholder="Enter quantity">
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Rate Per Unit <span>*</span></label>
                        <input type="text"vid="rate_per_unit" name="rate_per_unit" placeholder="rate per unit">
                    </div>
                    <div class="scr-form-group">
                        <label>Total Cost <span>*</span></label>
                        <input type="text" id="total_cost" name="total_cost" placeholder="total cost">
                    </div>
                    <div class="scr-form-group">
                        <label>Remarks <span>*</span></label>
                        <input type="text" id="remarks" name="remarks" placeholder="remarks">
                    </div>
                </div>
            </div>
            <div id="accomodation" style="display: none;">
                <h3 class="scr-registration-heading">Accomodation Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date <span>*</span></label>
                        <input type="date" id="date_of_accommodation_exp" name="date_of_accommodation_exp">
                    </div>
                    <div class="scr-form-group">
                        <label>Check In <span>*</span></label>
                        <input type="text" id="checkin" name="checkin" placeholder="Enter check in">
                    </div>
                    <div class="scr-form-group">
                        <label>Check Out <span>*</span></label>
                        <input type="text" id="checkout" name="checkout" placeholder="Enter check out">
                    </div>
                    <div class="scr-form-group">
                        <label>No. Of days <span>*</span></label>
                        <input type="text" id="no_of_days" name="no_of_days" placeholder="Enter no. of days">
                    </div>
                </div>
            </div>
            <div id="miscellaneous" style="display: none;">
                <h3 class="scr-registration-heading">Miscellaneous Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date Of Expense <span>*</span></label>
                        <input type="date" id="date_of_miscellaneous_exp" name="date_of_miscellaneous_exp">
                    </div>
                    <div class="scr-form-group">
                        <label>Other <span>*</span></label>
                        <input type="text" id="other" name="other" placeholder="Enter cost">
                    </div>
                    <div class="scr-form-group">
                        <label> Remarks<span>*</span></label>
                        <input type="text" id="miscellaneous_exp_remarks" name="miscellaneous_exp_remarks"
                            placeholder="Enter remarks">
                    </div>

                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Miscellaneous Description<span>*</span></label>
                        <textarea id="miscellaneous_exp_discription" name="miscellaneous_exp_discription" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <h3 class="scr-registration-heading">Other</h3>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Amount <span>*</span></label>
                    <input type="text" id="amount" name="amount" placeholder="Enter amount" required>
                </div>
                <div class="scr-form-group">
                    <label>Section <span>*</span></label>
                    <input type="text" id="section" name="section" placeholder="Enter Section" required>
                </div>
                <div class="scr-form-group">
                    <label>TDS Deduction % <span>*</span></label>
                    <input type="text" id="tds_deduction_percentage" name="tds_deduction_percentage"
                        placeholder="TDS deduction percentage" required>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>TDS Deduction Amount <span>*</span></label>
                    <input type="text" id="tds_deduction_amount" name="tds_deduction_amount"
                        placeholder="TDS deduction amount" readonly>
                </div>
                <div class="scr-form-group">
                    <label>Pan Number <span>*</span></label>
                    <input type="text" id="pan" name="pan" placeholder="Enter Pan Number" required>
                </div>
                <div class="scr-form-group">
                    <label>TDS Deduction Date <span>*</span></label>
                    <input type="date" id="tds_deduction_date" name="tds_deduction_date"
                        placeholder="TDS deduction date" required>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Mode of Payment<span>*</span></label>
                    <select id="mode_of_payment" name="mode_of_payment">
                        <option value="">Select Payment Mode</option>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Invoice/Voucher</span></label>
                    <input type="file" id="invoice" name="invoice" required>
                </div>
                <div class="scr-form-group">
                    <label>Proof Of Payment <span>*</span></span></label>
                    <input type="file" id="proof_of_payment" name="proof_of_payment" required>
                </div>


            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Sub Total Amount <span>*</span></span></label>
                    <input type="text" placeholder="sub total amount" id="sub_total_amount"
                        name="sub_total_amount" readonly>
                </div>
                <div class="scr-form-group">
                    <label>Advance <span>*</span></span></label>
                    <input type="text" placeholder="advance" id="advance" name="advance" required>
                </div>
                <div class="scr-form-group" id="netPayment">
                    <label>Net Payment <span>*</span></span></label>
                    <input type="text" placeholder="net payment" id="net_payment" name="net_payment" readonly>
                </div>
                <div class="scr-form-group" id="advanceDeposit" style="display: none;">
                    <label>Advance Deposit <span>*</span></span></label>
                    <input type="text" placeholder="advance deposit" id="advance_deposit" name="advance_deposit"
                        readonly>
                </div>
                <div class="scr-form-group">
                    <label>Type of payment<span>*</span></label>
                    <select id="type_of_payment" name="type_of_payment">
                        <option value="">Select Type of Payment</option>
                        <option value="direct">Direct</option>
                        <option value="reimubersment">Reimubersment</option>
                    </select>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Decription</label>
                    <textarea id="description" name="description"></textarea>
                </div>
            </div>
            <div class="scr-form-group-btn" style="justify-content: flex-start">
                <button type="submit" class="scr-btn">Submit </button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#expense_sector').on('change', function() {
        var selected = $(this).val();

        // Always reset values inside both dependent sections
        $('#expenditureAdmin').hide().find('input, select').val('');
        $('#expenditureType').hide().find('input, select').val('');

        if (selected === 'project_based') {
            $('#expenditureType').show();
        } else if (selected === 'office_expenses') {
            $('#expenditureAdmin').show();
        }
    });
</script>
<script>
    function hideAllExpenseSections() {
        $('#human_res, #equip, #travel, #material, #accomodation, #miscellaneous').hide();
    }

    $('#type_of_expense').on('change', function() {
        var selected = $(this).val();
        hideAllExpenseSections();

        switch (selected) {
            case 'human_resource':
                $('#human_res').show();
                break;
            case 'equipment':
                $('#equip').show();
                break;
            case 'travel_expenses':
                $('#travel').show();
                break;
            case 'iec_material':
                $('#material').show();
                break;
            case 'accomodation_expenses':
                $('#accomodation').show();
                break;
            case 'miscellaneous_expenses':
                $('#miscellaneous').show();
                break;
        }
    });

    // Observer to hide all if #type_of_expense is hidden
    const observer = new MutationObserver(() => {
        if (!$('#type_of_expense').is(':visible')) {
            hideAllExpenseSections();
        }
    });

    // Observe parent node for visibility changes
    observer.observe(document.getElementById('type_of_expense').parentNode, {
        attributes: true,
        attributeFilter: ['style', 'class']
    });
</script>
<script>
    document.getElementById('amount').addEventListener('blur', calculateTDS);
    document.getElementById('tds_deduction_percentage').addEventListener('blur', calculateTDS);
    document.getElementById('advance').addEventListener('blur', calculateTDS);

    function calculateTDS() {
        var amount = parseFloat(document.getElementById('amount').value);
        var percentage = parseFloat(document.getElementById('tds_deduction_percentage').value);
        var advance = parseFloat(document.getElementById('advance').value);

        if (isNaN(advance)) advance = 0;

        if (!isNaN(amount) && !isNaN(percentage)) {
            var tdsAmount = (amount * percentage) / 100;
            var subTotal = amount - tdsAmount;
            var netPayment = subTotal - advance;

            document.getElementById('tds_deduction_amount').value = tdsAmount.toFixed(2);
            document.getElementById('sub_total_amount').value = subTotal.toFixed(2);

            if (netPayment >= 0) {
                document.getElementById('net_payment').value = netPayment.toFixed(2);
                document.getElementById('advance_deposit').value = 0;
                document.getElementById('netPayment').style.display = 'block';
                document.getElementById('advanceDeposit').style.display = 'none';
            } else {
                document.getElementById('net_payment').value = 0;
                document.getElementById('netPayment').style.display = 'none';
                document.getElementById('advance_deposit').value = Math.abs(netPayment).toFixed(2);
                document.getElementById('advanceDeposit').style.display = 'block';
            }
        } else {
            document.getElementById('tds_deduction_amount').value = '';
            document.getElementById('sub_total_amount').value = '';
            document.getElementById('net_payment').value = '';
            document.getElementById('advance_deposit').value = '';
            document.getElementById('netPayment').style.display = 'block';
            document.getElementById('advanceDeposit').style.display = 'none';
        }
    }
</script>
