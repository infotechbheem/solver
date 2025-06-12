@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="container p-0">
            <div class="csr-registration-main-heading">
                <p>Update Income</p>
            </div>
            <form class="scr-registration-form" id="incomeFormUpdate" action="{{ route('update-income', $incomeDetail->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="scr-registration-row">

                    <div class="scr-form-group">
                        <label>Type of Income <span>*</span></label>
                        <select id="income_type" name="income_type" required>
                            <option value="">Select Income Type</option>
                            <option value="individual_person_duration"
                                {{ $incomeDetail->type_of_income == 'individual_person_duration' ? 'selected' : '' }}>
                                Individual Person Donation</option>
                            <option value="sub_grant" {{ $incomeDetail->type_of_income == 'sub_grant' ? 'selected' : '' }}>
                                Sub Grant</option>
                            <option value="contract" {{ $incomeDetail->type_of_income == 'contract' ? 'selected' : '' }}>
                                Contract</option>
                            <option value="csr" {{ $incomeDetail->type_of_income == 'csr' ? 'selected' : '' }}>CSR
                            </option>
                            <option value="gov_funds" {{ $incomeDetail->type_of_income == 'gov_funds' ? 'selected' : '' }}>
                                Govt. Funds</option>
                            <option value="training_fees"
                                {{ $incomeDetail->type_of_income == 'training_fees' ? 'selected' : '' }}>Training Fees
                            </option>
                            <option value="other" {{ $incomeDetail->type_of_income == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="scr-form-group" id="csr_dropdown_wrapper" style="display: none;">
                        <label>CSR Type <span>*</span></label>
                        <select id="csr_type" name="csr_type">
                            <option value="">Select CSR Type</option>
                            @foreach ($csrList as $listCsr)
                                <option value="{{ $listCsr->id }}" data-email="{{ $listCsr->email }}"
                                    data-contact="{{ $listCsr->phone_number }}"
                                    {{ $incomeDetail->csr_type == $listCsr->id ? 'selected' : '' }}>
                                    {{ $listCsr->company_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="scr-form-group" id="partner_org_dropdown_wrapper" style="display: none;">
                        <label>Partner Organisation Type <span>*</span></label>
                        <select id="partner_orgainisation_type" name="partner_orgainisation_type">
                            <option value="">Select Partner Organisation Type</option>
                            @foreach ($partnerOrgList as $pol)
                                <option value="{{ $pol->id }}" data-email="{{ $pol->email }}"
                                    data-contact="{{ $pol->phone_number }}"
                                    {{ $incomeDetail->partner_orgainisation_type == $pol->id ? 'selected' : '' }}>
                                    {{ $pol->{'company/ngo_name'} }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Type of Donation <span>*</span></label>
                        <select id="donation_type" name="donation_type" required>
                            <option value="">Select Donation Type</option>
                            <option value="general_donation"
                                {{ $incomeDetail->type_of_donation == 'general_donation' ? 'selected' : '' }}>General
                                Donations</option>
                            <option value="corpus_donation"
                                {{ $incomeDetail->type_of_donation == 'corpus_donation' ? 'selected' : '' }}>Corpus
                                Donations</option>
                            <option value="anonymous_donation"
                                {{ $incomeDetail->type_of_donation == 'anonymous_donation' ? 'selected' : '' }}>Anonymous
                                Donations</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Name of Donor/Organisation <span>*</span></label>
                        <input type="text" id="donar_name" name="donar_name" value="{{ $incomeDetail->donar_name }}"
                            placeholder="Enter donor/organinsation" required>
                    </div>

                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Email Id<span>*</span></label>
                        <input type="email" id="email" name="email" value="{{ $incomeDetail->email }}"
                            placeholder="Enter email" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Contact Number <span>*</span></label>
                        <input type="number" id="contact_number" name="contact_number"
                            value="{{ $incomeDetail->contact_number }}" placeholder="contact number" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Aadhar Number</label>
                        <input type="number" id="aadhar" name="aadhar" value="{{ $incomeDetail->aadhar }}"
                            placeholder="Enter aadhaar number">
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Pan Number</label>
                        <input type="text" id="pan" name="pan" value="{{ $incomeDetail->pan }}"
                            placeholder="Enter pan number">
                    </div>
                    <div class="scr-form-group">
                        <label>Sanction Amount <span>*</span></label>
                        <input type="number" id="sanction_amount" name="sanction_amount"
                            value="{{ $incomeDetail->sanction_amount }}" placeholder="Sanction amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Received Amount <span>*</span></label>
                        <input type="number" placeholder="Received amount" id="amount_received" name="amount_received"
                            value="{{ $incomeDetail->amount_received }}" required>
                    </div>

                </div>
                <h3 class="scr-registration-heading">Alloted Amount</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Human Resource <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="human_resource" name="human_resource"
                            value="{{ $incomeDetail->human_resource }}" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Camp Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="camp_exp" name="camp_exp"
                            value="{{ $incomeDetail->camp_exp }}" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Training & Capacity Building Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="training_exp" name="training_exp"
                            value="{{ $incomeDetail->training_exp }}" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Equipment & Suplies <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="equip_supplies" name="equip_supplies"
                            value="{{ $incomeDetail->equipment }}" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Travel Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="travel_exp"
                            value="{{ $incomeDetail->travel_exp }}" name="travel_exp" required>
                    </div>
                    <div class="scr-form-group">
                        <label>IEC Material Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="material_exp" name="material_exp"
                            value="{{ $incomeDetail->material_exp }}" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Administrative Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="administrative_exp"
                            value="{{ $incomeDetail->administrative_exp }}" name="administrative_exp" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Accomondation Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="accomodation_exp" name="accomodation_exp"
                            value="{{ $incomeDetail->accomodation_exp }}" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Monitoring & Evaluation Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="monitoring_exp" name="monitoring_exp"
                            value="{{ $incomeDetail->monitoring_exp }}" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Miscellaneous Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="miscellaneous_exp" name="miscellaneous_exp"
                            value="{{ $incomeDetail->miscellaneous_exp }}" required>
                    </div>

                </div>
                <h3 class="scr-registration-heading">Allotted Target</h3>

                <div id="target_container">
                    @php
                        $names = json_decode($incomeDetail->target_name, true) ?? [];
                        $amounts = json_decode($incomeDetail->target_amount, true) ?? [];
                    @endphp

                    @if (count($names) > 0)
                        @foreach ($names as $index => $name)
                            <div class="scr-registration-row target-group"
                                style="display: flex; flex-wrap: wrap; gap: 20px;">
                                <div class="scr-form-group" style="flex: 1;">
                                    <label>Target Name</label>
                                    <input type="text" placeholder="Enter name" name="target_name[]"
                                        value="{{ old('target_name.' . $index, $name) }}">
                                </div>
                                <div class="scr-form-group" style="flex: 1;">
                                    <label>Target Amount</label>
                                    <input type="number" placeholder="Enter amount" name="target_amount[]"
                                        value="{{ old('target_amount.' . $index, $amounts[$index] ?? '') }}">
                                </div>
                                <div class="scr-form-group" style="display: flex; align-items: end;">
                                    <div class="scr-form-group-btn d-flex align-items-center">
                                        @if ($loop->last)
                                            <button type="button" class="btn btn-primary add-btn me-2"
                                                style="padding: 8px 30px; margin-right: 10px;">Add More</button>
                                        @endif
                                        <button type="button" class="btn btn-danger remove-btn"
                                            style="padding: 8px 30px;">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- Agar data nahi hai to ek empty row show karo --}}
                        <div class="scr-registration-row target-group" style="display: flex; flex-wrap: wrap; gap: 20px;">
                            <div class="scr-form-group" style="flex: 1;">
                                <label>Target Name</label>
                                <input type="text" placeholder="Enter name" name="target_name[]">
                            </div>
                            <div class="scr-form-group" style="flex: 1;">
                                <label>Target Amount</label>
                                <input type="number" placeholder="Enter amount" name="target_amount[]">
                            </div>
                            <div class="scr-form-group" style="display: flex; align-items: end;">
                                <div class="scr-form-group-btn d-flex align-items-center">
                                    <button type="button" class="btn btn-primary add-btn me-2"
                                        style="padding: 8px 30px; margin-right: 10px;">Add More</button>
                                    {{-- No remove button on first empty row --}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <h3 class="scr-registration-heading"></h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Number of Installment <span>*</span></label>
                        <select id="no_of_installment" name="no_of_installment" required>
                            <option>Select Installment </option>
                            <option value="installment1"
                                {{ $incomeDetail->no_of_installment == 'installment1' ? 'selected' : '' }}>1</option>
                            <option value="installment2"
                                {{ $incomeDetail->no_of_installment == 'installment2' ? 'selected' : '' }}>2</option>
                            <option value="installment3"
                                {{ $incomeDetail->no_of_installment == 'installment3' ? 'selected' : '' }}>3</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Mode of Payment<span>*</span></label>
                        <select id="mode_of_payment" name="mode_of_payment" required>
                            <option>Select Payment Mode</option>
                            <option value="cash" {{ $incomeDetail->payment_mode == 'cash' ? 'selected' : '' }}>Cash
                            </option>
                            <option value="cheque" {{ $incomeDetail->payment_mode == 'cheque' ? 'selected' : '' }}>Cheque
                            </option>
                            <option value="bank_transfer"
                                {{ $incomeDetail->payment_mode == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer
                            </option>
                            <option value="upi" {{ $incomeDetail->payment_mode == 'upi' ? 'selected' : '' }}>UPI
                            </option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Proof of Evidence <span>*</span></label>
                        @if ($incomeDetail->proof_of_evidence)
                            <a href="{{ asset('storage/' . $incomeDetail->proof_of_evidence) }}" target="_blank"
                                class="text-blue-600 underline">View</a>
                        @endif
                        <input type="file" id="proof_of_evidence" name="proof_of_evidence">
                    </div>
                    <div class="scr-form-group">
                        <label>Payment Date <span>*</span></label>
                        <input type="date" id="payment_date" value="{{ $incomeDetail->payment_date }}"
                            name="payment_date" required>
                    </div>
                </div>
                <h3 class="scr-registration-heading">Project</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Type of Program <span>*</span></label>
                        <select id="project_type" name="project_type" required>
                            <option value="">Select Program Type </option>
                            <option value="social_protection"
                                {{ $incomeDetail->type_of_project == 'social_protection' ? 'selected' : '' }}>Social
                                Protection</option>
                            <option value="livelihood_beneficiray"
                                {{ $incomeDetail->type_of_project == 'livelihood_beneficiray' ? 'selected' : '' }}>Livelihood Beneficiary</option>
                            <option value="communinty_capacity"
                                {{ $incomeDetail->type_of_project == 'communinty_capacity' ? 'selected' : '' }}>Community
                                Capacity</option>
                            <option value="digital_literacy"
                                {{ $incomeDetail->type_of_project == 'digital_literacy' ? 'selected' : '' }}>Digital
                                Literacy & Finacial Inclusion</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Project Name <span>*</span></label>
                        <div style="position: relative; width: 100%; max-width: 400px;">
                            <input type="text" id="projectInput" name="project_name"
                                placeholder="Select or type project" value="{{ $incomeDetail->project_name }}"
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
                <div class="scr-registration-row-double">
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <h5>Project Duration</h5>
                            <div class="scr-registration-row">
                                <div class="scr-form-group">
                                    <label>Start Date <span>*</span></label>
                                    <input type="date" id="pro_duration_from" name="pro_duration_from"
                                        value="{{ $incomeDetail->project_duration_from }}" required>
                                </div>
                                <div class="scr-form-group">
                                    <label>End Date <span>*</span></label>
                                    <input type="date" id="pro_duration_to" name="pro_duration_to"
                                        value="{{ $incomeDetail->project_duration_to }}" required>
                                </div>

                            </div>
                        </div>
                        <div class="scr-form-group">
                            <h5>Project Location</h5>
                            <div class="scr-registration-row">
                                <div class="scr-form-group">
                                    <label>State <span>*</span></label>
                                    <select id="state" name="state" data-selected="{{ $incomeDetail->state }}">
                                        <option>Select State</option>
                                    </select>
                                </div>
                                <div class="scr-form-group">
                                    <label>District <span>*</span></label>
                                    <select name="district" id="district"
                                        data-selected="{{ $incomeDetail->district }}">

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <label>Project Description</label>
                            <textarea id="project_description" name="project_description" placeholder="Enter Project Description..." required>{{ $incomeDetail->project_description }}</textarea>
                        </div>
                        <div class="scr-form-group">
                            <label>Additional Message (optional)</label>
                            <textarea id="message" name="message" placeholder="Enter Message...">{{ $incomeDetail->message }}</textarea>
                        </div>
                    </div>
                </div>




                <div class="scr-form-group-btn">
                    <button type="submit" class="scr-btn" style="padding: 8px 30px">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleCsrDropdown() {
            const selected = $('#income_type').val();
            const csrDropdown = $('#csr_dropdown_wrapper');

            if (selected === 'csr') {
                csrDropdown.show();
            } else {
                csrDropdown.hide();
                $('#csr_type').val('');
            }
        }

        $(document).ready(function() {
            // Initial check on page load
            toggleCsrDropdown();

            // Bind change event
            $('#income_type').on('change', function() {
                toggleCsrDropdown();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function handleIncomeTypeChange() {
                const selected = $('#income_type').val();
                const partnerOrgDropdown = $('#partner_org_dropdown_wrapper');

                if (selected === 'sub_grant') {
                    partnerOrgDropdown.show();
                } else {
                    partnerOrgDropdown.hide();
                    $('#partner_orgainisation_type').val('');

                    // Reset email and contact only if they are empty or not manually filled
                    // (Assuming if empty => safe to reset, else preserve)
                    if ($('#email').val().trim() === '') {
                        $('#email').val('');
                    }
                    if ($('#contact_number').val().trim() === '') {
                        $('#contact_number').val('');
                    }
                }
            }

            // Initial check on page load
            handleIncomeTypeChange();

            // Bind change event
            $('#income_type').on('change', handleIncomeTypeChange);

            // Partner Org Dropdown Change
            $('#partner_orgainisation_type').on('change', function() {
                var selectedOption = $(this).find(':selected');
                var email = selectedOption.data('email') || '';
                var contact = selectedOption.data('contact') || '';

                $('#email').val(email);
                $('#contact_number').val(contact);
            });

            // CSR Type Dropdown Change
            $('#csr_type').on('change', function() {
                var selectedOption = $(this).find(':selected');
                var email = selectedOption.data('email') || '';
                var contact = selectedOption.data('contact') || '';

                $('#email').val(email);
                $('#contact_number').val(contact);
            });

            // MutationObserver for partner_org_dropdown_wrapper
            const partnerOrgObserver = new MutationObserver(function() {
                if ($('#partner_org_dropdown_wrapper').css('display') === 'none') {
                    // Reset only if fields are empty
                    if ($('#email').val().trim() === '') {
                        $('#email').val('');
                    }
                    if ($('#contact_number').val().trim() === '') {
                        $('#contact_number').val('');
                    }
                }
            });

            partnerOrgObserver.observe(document.getElementById('partner_org_dropdown_wrapper'), {
                attributes: true,
                attributeFilter: ['style']
            });

            // MutationObserver for csr_dropdown_wrapper
            const csrObserver = new MutationObserver(function() {
                if ($('#csr_dropdown_wrapper').css('display') === 'none') {
                    if ($('#email').val().trim() === '') {
                        $('#email').val('');
                    }
                    if ($('#contact_number').val().trim() === '') {
                        $('#contact_number').val('');
                    }
                }
            });

            csrObserver.observe(document.getElementById('csr_dropdown_wrapper'), {
                attributes: true,
                attributeFilter: ['style']
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const getNewGroup = () => {
                return `
        <div class="scr-registration-row target-group" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <div class="scr-form-group" style="flex: 1;">
                <label>Target Name</label>
                <input type="text" placeholder="Enter name" name="target_name[]">
            </div>
            <div class="scr-form-group" style="flex: 1;">
                <label>Target Amount</label>
                <input type="number" placeholder="Enter amount" name="target_amount[]">
            </div>
            <div class="scr-form-group" style="display: flex; align-items: end;">
                <div class="scr-form-group-btn d-flex align-items-center">
                    <button type="button" class="btn btn-primary add-btn me-2" style="padding: 8px 30px; margin-right: 10px;">Add More</button>
                    <button type="button" class="btn btn-danger remove-btn" style="padding: 8px 30px;">Remove</button>
                </div>
            </div>
        </div>`;
            };

            // Add More Button Click
            $('#target_container').on('click', '.add-btn', function() {
                $('.add-btn').remove();
                $('#target_container').append(getNewGroup());
                updateRemoveBtnVisibility();
            });

            // Remove Button Click
            $('#target_container').on('click', '.remove-btn', function() {
                $(this).closest('.target-group').remove();

                $('.add-btn').remove();
                $('#target_container .target-group:last .scr-form-group-btn').prepend(
                    `<button type="button" class="btn btn-primary add-btn me-2" style="padding: 8px 30px; margin-right: 10px;">Add More</button>`
                );

                updateRemoveBtnVisibility();
            });

            // Show remove btn on all except first group
            function updateRemoveBtnVisibility() {
                $('.target-group').each(function(index) {
                    if (index === 0) {
                        $(this).find('.remove-btn').hide();
                    } else {
                        $(this).find('.remove-btn').show();
                    }
                });
            }

            // Initial call on page load
            updateRemoveBtnVisibility();
        });
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
@endsection
