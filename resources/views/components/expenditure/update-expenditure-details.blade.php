<div class="scr-registration-section">
    <div class="container p-0">
        <div class="csr-registration-main-heading">
            <p>Update Expenditure</p>
        </div>
        <form class="scr-registration-form" action="{{ route('update-expenditure', $expenditureDetail->id) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Date Of Expense <span>*</span></label>
                    <input type="date" id="expense_date" name="expense_date"
                        value="{{ $expenditureDetail->expense_date }}" required>
                </div>

                <div class="scr-form-group">
                    <label> Sector of Expenses <span>*</span></label>
                    <select id="expense_sector" name="expense_sector">
                        <option>Select Sector of Expenses</option>
                        <option value="project_based"
                            {{ $expenditureDetail->expense_sector == 'project_based' ? 'selected' : '' }}>Project Based
                        </option>
                        <option value="office_expenses"
                            {{ $expenditureDetail->expense_sector == 'office_expenses' ? 'selected' : '' }}>Office
                            Expenses</option>
                    </select>
                </div>
                <div class="scr-form-group" id="pro_name" style="display: none;">
                    <div class="scr-form-group">
                        <label>Project Name</label>
                        <div style="position: relative; width: 100%; max-width: 400px;">
                            <input type="text" id="projectInput" name="project_name" placeholder="Select or type project" value="{{ $expenditureDetail->project_name }}"
                                style="width: 100%; padding: 8px 12px; font-size: 15px; border: 1px solid #ccc; border-radius: 5px;"
                                autocomplete="off">
                            <ul id="projectSuggestions"
                                style="
                                position: absolute;
                                top: 100%;
                                left: 0;
                                right: 0;
                                z-index: 1000;
                                background: #fff;
                                border: 1px solid #ccc;
                                border-top: none;
                                list-style: none;
                                margin: 0;
                                padding: 0;
                                max-height: 150px;
                                overflow-y: auto;
                                display: none;
                                border-radius: 0 0 5px 5px;
                            ">
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <div class="scr-form-group">
                        <label> Name <span>*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter name"
                            value="{{ $expenditureDetail->name }}" required>
                    </div>
                </div>
                <div class="scr-form-group" id="expenditureType" style="display: none;">
                    <label for="type_of_expense">Type of Expenditure<span>*</span></label>
                    <select id="type_of_expense" name="type_of_expense">
                        <option value="">Select Type of Expenditure</option>
                        <option value="human_resource"
                            {{ $expenditureDetail->type_of_expense == 'human_resource' ? 'selected' : '' }}>Human
                            Resource</option>
                        <option value="equipment"
                            {{ $expenditureDetail->type_of_expense == 'equipment' ? 'selected' : '' }}>Equipment &
                            Suplies</option>
                        <option value="travel_expenses"
                            {{ $expenditureDetail->type_of_expense == 'travel_expenses' ? 'selected' : '' }}>Travel
                            Expenses</option>
                        <option value="iec_material"
                            {{ $expenditureDetail->type_of_expense == 'iec_material' ? 'selected' : '' }}>IEC Material
                            Expenses</option>
                        <option value="accomodation_expenses"
                            {{ $expenditureDetail->type_of_expense == 'accomodation_expenses' ? 'selected' : '' }}>
                            Accomondation Expenses</option>
                        <option value="miscellaneous_expenses"
                            {{ $expenditureDetail->type_of_expense == 'miscellaneous_expenses' ? 'selected' : '' }}>
                            Miscellaneous Expenses</option>
                    </select>
                </div>
                <div class="scr-form-group" id="expenditureAdmin" style="display: none;">
                    <label> Adminstrative Expenses <span>*</span></label>
                    <select id="administrative_expense" name="administrative_expense">
                        <option value="">Select Adminstrative Expense</option>
                        <option value="food_beverage"
                            {{ $expenditureDetail->administrative_expense == 'food_beverage' ? 'selected' : '' }}>Food
                            & Beverage</option>
                        <option value="rent"
                            {{ $expenditureDetail->administrative_expense == 'rent' ? 'selected' : '' }}> Rent</option>
                        <option value="utilities"
                            {{ $expenditureDetail->administrative_expense == 'utilities' ? 'selected' : '' }}>
                            Utilities</option>
                        <option value="insurance"
                            {{ $expenditureDetail->administrative_expense == 'insurance' ? 'selected' : '' }}>
                            Insurance</option>
                        <option value="wages_salaries"
                            {{ $expenditureDetail->administrative_expense == 'wages_salaries' ? 'selected' : '' }}>
                            Wages & Salaries</option>
                        <option value="office_fixtures"
                            {{ $expenditureDetail->administrative_expense == 'office_fixtures' ? 'selected' : '' }}>
                            Office Fistures & Equipment</option>
                        <option value="legal_finance_service"
                            {{ $expenditureDetail->administrative_expense == 'legal_finance_service' ? 'selected' : '' }}>
                            Legal & Finance Service Fees</option>
                        <option value="office_suplies"
                            {{ $expenditureDetail->administrative_expense == 'office_suplies' ? 'selected' : '' }}>
                            Office Suplies</option>
                        <option value="travel"
                            {{ $expenditureDetail->administrative_expense == 'travel' ? 'selected' : '' }}>Travel
                        </option>
                        <option value="it_service"
                            {{ $expenditureDetail->administrative_expense == 'it_service' ? 'selected' : '' }}>IT
                            Service</option>
                        <option value="licence_subscriptions"
                            {{ $expenditureDetail->administrative_expense == 'licence_subscriptions' ? 'selected' : '' }}>
                            Licence & Subscriptions</option>
                    </select>
                </div>
            </div>
            <div id="human_res">
                <h3 class="scr-registration-heading">Human Resource</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Human Resource</label>
                        <select id="human_resource" name="human_resource">
                            <option value="">Select</option>
                            <option value="salary"
                                {{ $expenditureDetail->human_resource == 'salary' ? 'selected' : '' }}>Salary</option>
                            <option value="honorarium"
                                {{ $expenditureDetail->human_resource == 'honorarium' ? 'selected' : '' }}>Honorarium
                            </option>
                            <option value="stipend"
                                {{ $expenditureDetail->human_resource == 'stipend' ? 'selected' : '' }}>stipned
                            </option>
                            <option value="advance"
                                {{ $expenditureDetail->human_resource == 'advance' ? 'selected' : '' }}>Advance
                            </option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Date Of Expense </label>
                        <input type="date" id="hr_expense_date" name="hr_expense_date"
                            value="{{ $expenditureDetail->hr_expense_date }}">
                    </div>
                </div>
            </div>
            <div id="equip">
                <h3 class="scr-registration-heading">Equipment & and Suplies</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date Of Expense </label>
                        <input type="date" id="equip_expense_date" name="equip_expense_date"
                            value="{{ $expenditureDetail->equip_expense_date }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Cost </label>
                        <input type="text" id="equip_cost" name="equip_cost" placeholder="Enter cost"
                            value="{{ $expenditureDetail->equip_cost }}">
                    </div>
                    <div class="scr-form-group">
                        <label> Supplier Name</label>
                        <input type="text" id="equip_supplier_name" name="equip_supplier_name"
                            placeholder="Enter suplier name" value="{{ $expenditureDetail->equip_supplier_name }}">
                    </div>
                </div>
            </div>
            {{-- <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label> Equipment Description </label>
                      <textarea></textarea>
                  </div>
              </div> --}}
            <div id="travel">
                <h3 class="scr-registration-heading">Travel Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date </label>
                        <input type="date" id="travel_exp_date" name="travel_exp_date"
                            value="{{ $expenditureDetail->travel_exp_date }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Departure </label>
                        <input type="text" id="travel_exp_departure" name="travel_exp_departure"
                            placeholder="Enter Departure" value="{{ $expenditureDetail->travel_exp_departure }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Arrival </label>
                        <input type="text" id="travel_exp_arrirval" name="travel_exp_arrirval"
                            placeholder="Enter arrival" value="{{ $expenditureDetail->travel_exp_arrirval }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Mode of Travel</label>
                        <select id="travel_exp_mode_of_travel" name="travel_exp_mode_of_travel">
                            <option value="">Select Travel Mode</option>
                            <option value="air"
                                {{ $expenditureDetail->travel_exp_mode_of_travel == 'air' ? 'selected' : '' }}>Air
                            </option>
                            <option value="train"
                                {{ $expenditureDetail->travel_exp_mode_of_travel == 'train' ? 'selected' : '' }}>Train
                            </option>
                            <option value="metro"
                                {{ $expenditureDetail->travel_exp_mode_of_travel == 'metro' ? 'selected' : '' }}>metro
                            </option>
                            <option value="cabs_taxi"
                                {{ $expenditureDetail->travel_exp_mode_of_travel == 'cab_taxi' ? 'selected' : '' }}>
                                Cabs/taxi</option>
                            <option value="auto"
                                {{ $expenditureDetail->travel_exp_mode_of_travel == 'auto' ? 'selected' : '' }}>Auto
                            </option>
                            <option value="other"
                                {{ $expenditureDetail->travel_exp_mode_of_travel == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="material">
                <h3 class="scr-registration-heading">IEC Materials Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date Of Expanse </label>
                        <input type="date" id="date_of_material_exp" name="date_of_material_exp"
                            value="{{ $expenditureDetail->date_of_material_exp }}">
                    </div>

                    <div class="scr-form-group">
                        <label>Item </label>
                        <select id="item" name="item">
                            <option value="">Select Item</option>
                            <option value="pamphlets" {{ $expenditureDetail->item == 'pamphlets' ? 'selected' : '' }}>
                                Pamphlets / Flyers</option>
                            <option value="posters" {{ $expenditureDetail->item == 'posters' ? 'selected' : '' }}>
                                Posters / Banners</option>
                            <option value="brochures" {{ $expenditureDetail->item == 'brochures' ? 'selected' : '' }}>
                                Brochures / Booklets</option>
                            <option value="tshirts" {{ $expenditureDetail->item == 'tshirts' ? 'selected' : '' }}>
                                T-Shirts / Caps</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Quantity </label>
                        <input type="text" id="quantity" name="quantity" placeholder="Enter quantity"
                            value="{{ $expenditureDetail->quantity }}">
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Rate Per Unit </label>
                        <input type="text"vid="rate_per_unit" name="rate_per_unit" placeholder="rate per unit"
                            value="{{ $expenditureDetail->rate_per_unit }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Total Cost </label>
                        <input type="text" id="total_cost" name="total_cost" placeholder="total cost"
                            value="{{ $expenditureDetail->total_cost }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Remarks </label>
                        <input type="text" id="remarks" name="remarks" placeholder="remarks"
                            value="{{ $expenditureDetail->remarks }}">
                    </div>
                </div>
            </div>
            <div id="accomodation">
                <h3 class="scr-registration-heading">Accomodation Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date </label>
                        <input type="date" id="date_of_accommodation_exp" name="date_of_accommodation_exp"
                            value="{{ $expenditureDetail->date_of_accommodation_exp }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Check In </label>
                        <input type="text" id="checkin" name="checkin" placeholder="Enter check in"
                            value="{{ $expenditureDetail->checkin }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Check Out </label>
                        <input type="text" id="checkout" name="checkout" placeholder="Enter check out"
                            value="{{ $expenditureDetail->checkout }}">
                    </div>
                    <div class="scr-form-group">
                        <label>No. Of days </label>
                        <input type="text" id="no_of_days" name="no_of_days" placeholder="Enter no. of days"
                            value="{{ $expenditureDetail->no_of_days }}">
                    </div>
                </div>
            </div>
            <div id="miscellaneous">
                <h3 class="scr-registration-heading">Miscellaneous Expenses</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Date Of Expense </label>
                        <input type="date" id="date_of_miscellaneous_exp" name="date_of_miscellaneous_exp"
                            value="{{ $expenditureDetail->date_of_miscellaneous_exp }}">
                    </div>
                    <div class="scr-form-group">
                        <label>Other </label>
                        <input type="text" id="other" name="other" placeholder="Enter cost"
                            value="{{ $expenditureDetail->other }}">
                    </div>
                    <div class="scr-form-group">
                        <label> Remarks</label>
                        <input type="text" id="miscellaneous_exp_remarks" name="miscellaneous_exp_remarks"
                            placeholder="Enter remarks" value="{{ $expenditureDetail->miscellaneous_exp_remarks }}">
                    </div>

                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Miscellaneous Description</label>
                        <textarea id="miscellaneous_exp_discription" name="miscellaneous_exp_discription" cols="30" rows="10">{{ $expenditureDetail->miscellaneous_exp_description }}</textarea>
                    </div>
                </div>
            </div>
            <h3 class="scr-registration-heading">Other</h3>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Amount <span>*</span></label>
                    <input type="text" id="amount" name="amount" placeholder="Enter amount"
                        value="{{ $expenditureDetail->amount }}" required>
                </div>
                <div class="scr-form-group">
                    <label>Section <span>*</span></label>
                    <input type="text" id="section" name="section" placeholder="Enter Section"
                        value="{{ $expenditureDetail->section }}" required>
                </div>
                <div class="scr-form-group">
                    <label>TDS Deduction % <span>*</span></label>
                    <input type="text" id="tds_deduction_percentage" name="tds_deduction_percentage"
                        placeholder="TDS deduction percentage"
                        value="{{ $expenditureDetail->tds_deduction_percentage }}" required>
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
                    <input type="text" id="pan" name="pan" placeholder="Enter Pan Number"
                        value="{{ $expenditureDetail->pan }}" required>
                </div>
                <div class="scr-form-group">
                    <label>TDS Deduction Date <span>*</span></label>
                    <input type="date" id="tds_deduction_date" name="tds_deduction_date"
                        placeholder="TDS deduction date" value="{{ $expenditureDetail->tds_deduction_date }}"
                        required>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Mode of Payment<span>*</span></label>
                    <select id="mode_of_payment" name="mode_of_payment">
                        <option value="">Select Payment Mode</option>
                        <option value="online"
                            {{ $expenditureDetail->mode_of_payment == 'online' ? 'selected' : '' }}>Online</option>
                        <option value="offline"
                            {{ $expenditureDetail->mode_of_payment == 'offline' ? 'selected' : '' }}>Offline
                        </option>
                    </select>
                </div>

                <div class="scr-form-group">
                    <label>Invoice/Voucher</label>
                    <input type="file" id="invoice" name="invoice"
                        {{ isset($expenditureDetail) ? '' : 'required' }}>

                    @if (!empty($expenditureDetail->invoice))
                        <div style="margin-top: 10px;">
                            <img src="{{ asset('storage/' . $expenditureDetail->invoice) }}" alt="Invoice Image"
                                style="max-width: 200px; max-height: 200px;">
                        </div>
                    @endif
                </div>

                <div class="scr-form-group">
                    <label>Proof Of Payment <span>*</span></label>
                    <input type="file" id="proof_of_payment" name="proof_of_payment"
                        {{ isset($expenditureDetail) ? '' : 'required' }}>

                    @if (!empty($expenditureDetail->proof_of_payment))
                        <div style="margin-top: 10px;">
                            <img src="{{ asset('storage/' . $expenditureDetail->proof_of_payment) }}"
                                alt="Proof Of Payment Image" style="max-width: 200px; max-height: 200px;">
                        </div>
                    @endif
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
                    <input type="text" placeholder="advance" id="advance" name="advance"
                        value="{{ $expenditureDetail->advance }}" required>
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
                        <option value="direct"
                            {{ $expenditureDetail->type_of_payment == 'direct' ? 'selected' : '' }}>Direct</option>
                        <option value="reimubersment"
                            {{ $expenditureDetail->type_of_payment == 'reimubersment' ? 'selected' : '' }}>
                            Reimubersment</option>
                    </select>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Decription</label>
                    <textarea id="description" name="description">{{ $expenditureDetail->description }}</textarea>
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
    function toggleExpenseSections() {
        var selected = $('#expense_sector').val();

        // Just hide both sections initially, don't reset values
        $('#expenditureAdmin').hide();
        $('#expenditureType').hide();
        $('#pro_name').hide();

        // Show appropriate section
        if (selected === 'project_based') {
            $('#expenditureType').show();
            $('#pro_name').show();
        } else if (selected === 'office_expenses') {
            $('#expenditureAdmin').show();
            $('#pro_name').hide();
        }
    }

    // Trigger when dropdown changes
    $('#expense_sector').on('change', toggleExpenseSections);

    // Run on page load
    $(document).ready(function() {
        toggleExpenseSections();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Run calculation on page load
        calculateTDS();

        // Add blur event listeners
        document.getElementById('amount').addEventListener('blur', calculateTDS);
        document.getElementById('tds_deduction_percentage').addEventListener('blur', calculateTDS);
        document.getElementById('advance').addEventListener('blur', calculateTDS);
    });

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
{{-- suggestion --}}
<script>
    const suggestions = ["Sahyog", "Unnati", "Saksham", "Uttkarsh"];
    const input = document.getElementById('projectInput');
    const suggestionBox = document.getElementById('projectSuggestions');

    input.addEventListener('input', function() {
        const term = this.value.trim().toLowerCase();
        suggestionBox.innerHTML = '';

        if (term === '') {
            suggestionBox.style.display = 'none';
            return;
        }

        const filtered = suggestions.filter(s => s.toLowerCase().startsWith(term));

        if (filtered.length === 0) {
            suggestionBox.style.display = 'none';
            return;
        }

        filtered.forEach(s => {
            const li = document.createElement('li');
            li.textContent = s;
            li.style.padding = '8px 12px';
            li.style.cursor = 'pointer';
            li.addEventListener('click', function() {
                input.value = s;
                suggestionBox.style.display = 'none';
            });
            li.addEventListener('mouseover', function() {
                li.style.background = '#f0f0f0';
            });
            li.addEventListener('mouseout', function() {
                li.style.background = '#fff';
            });
            suggestionBox.appendChild(li);
        });

        suggestionBox.style.display = 'block';
    });

    // Hide suggestion box if clicked outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#projectInput') && !e.target.closest('#projectSuggestions')) {
            suggestionBox.style.display = 'none';
        }
    });
</script>
