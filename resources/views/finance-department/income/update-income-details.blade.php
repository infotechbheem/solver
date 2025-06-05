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
                        <label>Aadhar Number <span>*</span></label>
                        <input type="number" id="aadhar" name="aadhar" value="{{ $incomeDetail->aadhar }}"
                            placeholder="Enter aadhaar number" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Pan Number <span>*</span></label>
                        <input type="text" id="pan" name="pan" value="{{ $incomeDetail->pan }}"
                            placeholder="Enter pan number" required>
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
                        <label>Type of Project <span>*</span></label>
                        <select id="project_type" name="project_type" required>
                            <option>Select Project Type </option>
                            <option value="social_protection"
                                {{ $incomeDetail->type_of_project == 'social_protection' ? 'selected' : '' }}>Social
                                Protection</option>
                            <option value="livelihood"
                                {{ $incomeDetail->type_of_project == 'livelihood' ? 'selected' : '' }}>Livelihood &
                                Employbility</option>
                            <option value="communinty_capacity"
                                {{ $incomeDetail->type_of_project == 'communinty_capacity' ? 'selected' : '' }}>Community
                                Capacity Building</option>
                            <option value="digital_literacy"
                                {{ $incomeDetail->type_of_project == 'digital_literacy' ? 'selected' : '' }}>Digital
                                Literacy & Finacial Inclusion</option>
                            <option value="other" {{ $incomeDetail->type_of_project == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Project Name <span>*</span></label>
                        <input type="text" placeholder="project name" id="project_name" name="project_name"
                            value="{{ $incomeDetail->project_name }}" required>
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
                            <textarea id="message" name="message" placeholder="Enter Message..." required>{{ $incomeDetail->message }}</textarea>
                        </div>
                    </div>
                </div>




                <div class="scr-form-group-btn">
                    <button type="submit" class="scr-btn" style="padding: 8px 30px">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
