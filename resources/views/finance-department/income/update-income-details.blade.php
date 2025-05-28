@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="container p-0">
            <div class="csr-registration-main-heading">
                <p>Update Income Details</p>
            </div>
            <form class="scr-registration-form">
                <div class="scr-registration-row">

                    <div class="scr-form-group">
                        <label>Type of Income <span>*</span></label>
                        <select>
                            <option>Select Income Type</option>
                            <option>Indivisula Person Donation</option>
                            <option>Sub Grant</option>
                            <option>Contract</option>
                            <option>CSR</option>
                            <option>Govt. Funds</option>
                            <option>Training Fees</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Type of Donation <span>*</span></label>
                        <select>
                            <option>Select Donation Type</option>
                            <option>General Donations</option>
                            <option>Corpus Donations</option>
                            <option>Anonymous Donations</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Name of Donor/Organisation <span>*</span></label>
                        <input type="text" placeholder="Enter donor/organinsation">
                    </div>

                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Email Id<span>*</span></label>
                        <input type="email" placeholder="Enter email" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Contact Number <span>*</span></label>
                        <input type="number" placeholder="contact number" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Aadhar Number <span>*</span></label>
                        <input type="text" placeholder="Enter father's name" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Pan Number <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Sanction of Amount <span>*</span></label>
                        <input type="text" placeholder="Sanction amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Received of Amount <span>*</span></label>
                        <input type="text" placeholder="Received amount" required>
                    </div>

                </div>
                <h3 class="scr-registration-heading">Alloted Amount</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Human Resource <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Camp Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Training & Capacity Building Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Equipment & Suplies <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Travel Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>IEC Material Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Administrative Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Accomondation Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Monitoring & Evaluation Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Miscellaneous Expenses <span>*</span></label>
                        <input type="text" placeholder="Enter amount" required>
                    </div>

                </div>
                <h3 class="scr-registration-heading"></h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Number of Installment <span>*</span></label>
                        <select>
                            <option>Select Installment </option>
                            <option value="installment1">1</option>
                            <option value="installment2">2</option>
                            <option value="installment3">3</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Mode of Payment<span>*</span></label>
                        <select>
                            <option>Select Paymet Mode</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Proof of Evidence <span>*</span></label>
                        <input type="file" placeholder="proof of evidence" required>
                    </div>
                    <div class="scr-form-group">
                        <label>Payment Date <span>*</span></label>
                        <input type="date" required>
                    </div>
                </div>

                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Type of Project <span>*</span></label>
                        <select>
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
                        <input type="text" placeholder="project name" required>
                    </div>

                </div>
                <div class="scr-registration-row-double">
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <h5>Project Duration</h5>
                            <div class="scr-registration-row">
                                <div class="scr-form-group">
                                    <label>Start Date <span>*</span></label>
                                    <input type="date" required>
                                </div>
                                <div class="scr-form-group">
                                    <label>End Date <span>*</span></label>
                                    <input type="date" required>
                                </div>

                            </div>
                        </div>
                        <div class="scr-form-group">
                            <h5>Project Location</h5>
                            <div class="scr-registration-row">
                                <div class="scr-form-group">
                                    <label>State <span>*</span></label>
                                    <select>
                                        <option>Select State</option>
                                        <option value="bihar">Bihar</option>
                                        <option value="Uttar_pradesh">Uttar pradesh</option>
                                        <option value="delhi">delhi</option>
                                        <option value="punjab">Punjab</option>
                                        <option value="jharkhand">Jharkhand</option>
                                    </select>
                                </div>
                                <div class="scr-form-group">
                                    <label>District <span>*</span></label>
                                    <select>
                                        <option>Select District</option>
                                        <option value="motihari">Motihar</option>
                                        <option value="patna">Patna</option>
                                        <option value="west_champarn">West Champaran</option>
                                        <option value="gopalganj">Gopalganj</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <label>Project Description</label>
                            <textarea></textarea>
                        </div>
                        <div class="scr-form-group">
                            <label>Additional Message (optional)</label>
                            <textarea></textarea>
                        </div>
                    </div>
                </div>
                <div class="scr-form-group-btn">
                    <button type="submit" class="scr-btn" style="padding: 8px 30px">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
