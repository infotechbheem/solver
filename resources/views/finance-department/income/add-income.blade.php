@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="container p-0">
            <div class="csr-registration-main-heading">
                <p>Add Income</p>
            </div>
            <form class="scr-registration-form" id="incomeForm" action="{{ route('store-income') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="scr-registration-row">

                    <div class="scr-form-group">
                        <label>Type of Income <span>*</span></label>
                        <select id="income_type" name="income_type" required>
                            <option value="">Select Income Type</option>
                            <option value="individual_person_duration">Indivisual Person Donation</option>
                            <option value="sub_grant">Sub Grant</option>
                            <option value="contract">Contract</option>
                            <option value="csr">CSR</option>
                            <option value="gov_funds">Govt. Funds</option>
                            <option value="training_fees">Training Fees</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Type of Donation <span>*</span></label>
                        <select id="donation_type" name="donation_type" required>
                            <option value="">Select Donation Type</option>
                            <option value="general_donation">General Donations</option>
                            <option value="corpus_donation">Corpus Donations</option>
                            <option value="anonymous_donation">Anonymous Donations</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Name of Donor/Organisation <span>*</span></label>
                        <input type="text" id="donar_name" name="donar_name" placeholder="Enter donor/organinsation"
                            required>
                    </div>

                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Email Id<span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Contact Number <span>*</span></label>
                        <input type="number" id="contact_number" name="contact_number" placeholder="contact number"
                            required>
                    </div>
                    <div class="scr-form-group">
                        <label>Aadhar Number <span>*</span></label>
                        <input type="number" id="aadhar" name="aadhar" placeholder="Enter aadhaar number" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Pan Number <span>*</span></label>
                        <input type="text" id="pan" name="pan" placeholder="Enter pan number" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Sanction Amount <span>*</span></label>
                        <input type="number" id="sanction_amount" name="sanction_amount" placeholder="Sanction amount"
                            required>
                    </div>
                    <div class="scr-form-group">
                        <label>Received Amount <span>*</span></label>
                        <input type="number" placeholder="Received amount" id="amount_received" name="amount_received"
                            required>
                    </div>

                </div>
                <h3 class="scr-registration-heading">Alloted Amount</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Human Resource <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="human_resource" name="human_resource" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Camp Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="camp_exp" name="camp_exp" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Training & Capacity Building Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="training_exp" name="training_exp" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Equipment & Suplies <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="equip_supplies" name="equip_supplies" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Travel Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="travel_exp" name="travel_exp" required>
                    </div>
                    <div class="scr-form-group">
                        <label>IEC Material Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="material_exp" name="material_exp" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Administrative Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="administrative_exp" name="administrative_exp"
                            required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Accomondation Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="accomodation_exp" name="accomodation_exp"
                            required>
                    </div>
                    <div class="scr-form-group">
                        <label>Monitoring & Evaluation Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="monitoring_exp" name="monitoring_exp"
                            required>
                    </div>
                    <div class="scr-form-group">
                        <label>Miscellaneous Expenses <span>*</span></label>
                        <input type="number" placeholder="Enter amount" id="miscellaneous_exp" name="miscellaneous_exp"
                            required>
                    </div>

                </div>
                <h3 class="scr-registration-heading"></h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Number of Installment <span>*</span></label>
                        <select id="no_of_installment" name="no_of_installment" required>
                            <option>Select Installment </option>
                            <option value="installment1">1</option>
                            <option value="installment2">2</option>
                            <option value="installment3">3</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Mode of Payment<span>*</span></label>
                        <select id="mode_of_payment" name="mode_of_payment" required>
                            <option>Select Payment Mode</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Proof of Evidence <span>*</span></label>
                        <input type="file" placeholder="proof of evidence" id="proof_of_evidence"
                            name="proof_of_evidence" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Payment Date <span>*</span></label>
                        <input type="date" id="payment_date" name="payment_date" required>
                    </div>
                </div>
                <h3 class="scr-registration-heading">Project</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Type of Project <span>*</span></label>
                        <select id="project_type" name="project_type" required>
                            <option>Select Project Type </option>
                            <option value="social_protection">Social Protection</option>
                            <option value="livelihood">Livelihood & Employbility</option>
                            <option value="communinty_capacity">Community Capacity Building</option>
                            <option value="digital_literacy">Digital Literacy & Finacial Inclusion</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Project Name <span>*</span></label>
                        <input type="text" placeholder="project name" id="project_name" name="project_name" required>
                    </div>

                </div>
                <div class="scr-registration-row-double">
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <h5>Project Duration</h5>
                            <div class="scr-registration-row">
                                <div class="scr-form-group">
                                    <label>Start Date <span>*</span></label>
                                    <input type="date" id="pro_duration_from" name="pro_duration_from" required>
                                </div>
                                <div class="scr-form-group">
                                    <label>End Date <span>*</span></label>
                                    <input type="date" id="pro_duration_to" name="pro_duration_to" required>
                                </div>

                            </div>
                        </div>
                        <div class="scr-form-group">
                            <h5>Project Location</h5>
                            <div class="scr-registration-row">
                                <div class="scr-form-group">
                                    <label>State <span>*</span></label>
                                    <select id="state" name="state">
                                        <option>Select State</option>
                                    </select>
                                </div>
                                <div class="scr-form-group">
                                    <label>District <span>*</span></label>
                                    <select name="district" id="district">

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <label>Project Description</label>
                            <textarea id="project_description" name="project_description" placeholder="Enter Project Description..." required></textarea>
                        </div>
                        <div class="scr-form-group">
                            <label>Additional Message (optional)</label>
                            <textarea id="message" name="message" placeholder="Enter Message..." required></textarea>
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
