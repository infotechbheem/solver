<div class="scr-registration-section">
    <div class="container p-0">
        <div class="csr-registration-main-heading">
            <p>Add Program</p>
        </div>
        <div id="duplicate-error" class="alert alert-danger d-none" role="alert">
            This beneficiary is already assigned to the selected scheme.
        </div>

        <form class="scr-registration-form" id="beneficiaryForm" action="{{ route('store-program') }}" method="POST">
            @csrf
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Program Type <span>*</span></label>
                    <select name="prog_type" id="prog_type">
                        <option value="">Select Program Type</option>
                        <option value="social_protection">Social protection</option>
                        <option value="livelihood_beneficiray">Livelihood Beneficiary</option>
                        <option value="community_capacity">Community Capacity</option>
                        <option value="digital_literacy">Digital Literacy & Financial Inclusion</option>
                    </select>
                </div>
                <div class="scr-form-group" style="width: 100%; max-width: 400px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 500;">Project <span
                            style="color: red;">*</span></label>
                    <div style="position: relative; width: 100%; max-width: 400px;">
                        <input type="text" id="projectInput" name="project" placeholder="Select or type project"
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
                <div class="scr-form-group">
                    <label>State <span>*</span></label>
                    <select id="state" name="state">
                        <option value="">Select State</option>
                    </select>
                </div>


            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>District <span>*</span></label>
                    <select name="district" id="district">

                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Donor Organisation <span>*</span></label>
                    <select name="donor_org" id="donor_org">
                        <option value="">Select Donor Organisation</option>
                        @foreach ($csr as $csrCompany)
                            <option value="{{ $csrCompany->id }}">{{ $csrCompany->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="scr-form-group">
                    <div class="scr-form-group">
                        <label>Form Date <span>*</span></label>
                        <input type="date" name="from_date" id="from_date">
                    </div>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Support Partner / Resource Organization <span>*</span></label>
                    <select name="support" id="support">
                        <option value="">Select Support Partner</option>
                        @foreach ($partnerOrg as $partnerOrganisation)
                            <option value="{{ $partnerOrganisation->id }}">
                                {{ $partnerOrganisation->{'company/ngo_name'} }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Team Member Name <span>*</span></label>
                    <select name="team_member" id="team_member">
                        <option value="">Select Team Member Name</option>
                        @foreach ($team as $team)
                            <option value="{{ $team->id }}">{{ $team->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Beneficiary Name <span>*</span></label>
                    <input type="text" placeholder="Beneficiary name" name="bene_name" id="bene_name">
                </div>

            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Age <span>*</span></label>
                    <select name="age" id="age">
                        <option value="">Select Age</option>
                        <option value="1-10">1-10</option>
                        <option value="11-18">11-18</option>
                        <option value="19-25">19-25</option>
                        <option value="26-40">26-40</option>
                        <option value="41-59">41-59</option>
                        <option value="60-69">60-69</option>
                        <option value="70">70 Above</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Gender <span>*</span></label>
                    <select name="gender" id="gender">
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="transgender">Transgender</option>

                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Caste <span>*</span></label>
                    <select name="caste" id="caste">
                        <option value="">Select Caste</option>
                        <option value="general">General</option>
                        <option value="obc">OBC</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                        <option value="pvtg">PVTG's</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Mobile Number <span>*</span></label>
                    <input type="text" placeholder="Enter mobile number" name="mob_no" id="mob_no">
                </div>
            </div>
            <div class="scr-registration-row">

                <div class="scr-form-group">
                    <label>Religion <span>*</span></label>
                    <select name="religion" id="religion">
                        <option value="">Select Religion</option>
                        <option value="hindu">Hindu</option>
                        <option value="muslim">Muslim</option>
                        <option value="sikh">Sikh</option>
                        <option value="christian">Christian</option>
                        <option value="jain">Jain</option>
                        <option value="buddhist">Buddhist</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Occupation <span>*</span></label>
                    <select name="occupation" id="occupation">
                        <option value="">Select Occupation</option>
                        <option value="construction">Construction Worker</option>
                        <option value="farmer">Farmer</option>
                        <option value="housemaker">Housemaker</option>
                        <option value="shg">SHG Groups</option>
                        <option value="shopkeeper">Shopkeeper</option>
                        <option value="student">Student</option>
                        <option value="unemployed">Unemployed</option>
                        <option value="none">None of the Above</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Family Income <span>*</span></label>
                    <select name="family_income" id="family_income">
                        <option value="">Select family Income</option>
                        <option value="no_income"> No Income</option>
                        <option value="1000-5000">1000 - 5000</option>
                        <option value="5001-15000">5001 - 15000</option>
                        <option value="15001-30000"> 15001 - 30000</option>
                        <option value="30000-45000">30000 - 45000</option>
                        <option value="45001-70000">45001 - 70000</option>
                        <option value="70001">70001 Above</option>
                    </select>
                </div>

            </div>
            <div style="display: none;" id="socialProtect">
                <h3 class="scr-registration-heading">Social Protection</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled" id="differently_abled">
                            <option value="">Select Differently Abled</option>
                            <option value="yes"> Yes</option>
                            <option value="no"> No</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Document Apply or Update <span>*</span></label>
                        <select name="document" id="document">
                            <option value="">Select Document Apply or Update </option>
                            <option value="abha"> ABHA Card</option>
                            <option value="aadhaar"> Aadhaar Card</option>
                            <option value="aadhar_pvc"> Aadhaar PVC Order</option>
                            <option value="pan_apply"> PAN Card Apply</option>
                            <option value="pan_correction"> PAN Card Correction</option>
                            <option value="eshram">E - Shram Card</option>
                            <option value="fssai">FSSAI Registration</option>
                            <option value="fssai_renew">FSSAI Renewal</option>
                            <option value="family_benefit">Family Benefit Scheme</option>
                            <option value="udyam">Udyam Registration (MSME)</option>
                            <option value="voter_apply">Voter Id Card Apply</option>
                            <option value="voter_correction">Voter Id Card Correction</option>
                            <option value="ration">Ration Card Apply</option>
                            <option value="gst_registration">GST Registration</option>
                            <option value="bank_acc_open">Bank Account Opening</option>
                            <option value="caste_certificate">Caste Certificate</option>
                            <option value="domicile_register">Domicile Registration</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Scheme Apply<span>*</span></label>
                        <select name="scheme" id="scheme">
                            <option value="">Select Scheme Apply </option>
                            <option value="ayushman">Ayushman Card</option>
                            <option value="pradhanmantri_suraksha">Pradhan Mantri Suraksha Bima Yojna</option>
                            <option value="pradhan_jeevan">Pradhan Mantri Jeevan Bima Yojna</option>
                            <option value="shram_yogi">Shram Yogi Mandhan</option>
                            <option value="nps">NPS Traders Scheme</option>
                            <option value="kisan">Kisan Mandhan Yojna</option>
                            <option value="pradhan_ujjwala">Pradhan Mantri Ujjwala Yojna</option>
                            <option value="atal_pension">Atal Pension Yojna</option>
                            <option value="family_benefit">Family Benefit Scheme</option>
                            <option value="old_age_pension">Old Age Pension</option>
                            <option value="widow_pension">Widow Pension</option>
                            <option value="disability_pension">Disability Pension</option>
                        </select>
                    </div>


                </div>
            </div>

            <div style="display: none;" id="livelihoodBeneficiary">
                <h3 class="scr-registration-heading">Livelihood Beneficiary</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled_beneficiary" id="differently_abled_beneficiary">
                            <option value="">Select Differently Abled</option>
                            <option value="yes"> Yes</option>
                            <option value="no"> No</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Support <span>*</span></label>
                        <select name="support_beneficiary" id="support_beneficiary">
                            <option value="">Select Support </option>
                            <option value="vocational_training"> Vocational Training</option>
                            <option value="social_media"> Social Media Management</option>
                            <option value="branding"> Branding</option>
                            <option value="packaging"> Packaging</option>
                            <option value="online_marketing"> Online Marketing (E - Commerce)</option>
                            <option value="offline_marketing"> Offline Marketing</option>
                            <option value="governance_training"> Governance Training</option>
                            <option value="financial_management"> Financial Management</option>
                            <option value="raw_material"> Row Material Support</option>
                            <option value="other"> Other</option>

                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Describe Support
                            <span>*</span></label>
                        <input type="text" placeholder="Describe Support" name="support_describe"
                            id="support_describe">

                    </div>


                </div>
            </div>

            <div style="display: none;" id="digitalLiteracy">
                <h3 class="scr-registration-heading">Digital Literacy & Financial Inclusion</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled_digital" id="differently_abled_digital">
                            <option value="">Select Differently Abled</option>
                            <option value="yes"> Yes</option>
                            <option value="no"> No</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Area <span>*</span></label>
                        <select name="area" id="area">
                            <option value="">Select Area </option>
                            <option value="urban">Urban</option>
                            <option value="rural"> Rural</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Types of Sessions We Conduct<span>*</span></label>
                        <select name="session_conduct" id="session_conduct">
                            <option value="">Select Sessions </option>
                            <option value="digtal_litracy">Digital Literacy</option>
                            <option value="cyber_security"> Cyber Security</option>
                            <option value="financial_inclusion">Financial Inclusion</option>
                        </select>

                    </div>


                </div>
            </div>

            <div style="display: none;" id="communityCapacity">
                <h3 class="scr-registration-heading">Community Capacity</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled_community" id="differently_abled_community">
                            <option value="">Select Differently Abled</option>
                            <option value="yes"> Yes</option>
                            <option value="no"> No</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Area <span>*</span></label>
                        <select name="community_area" id="community_area">
                            <option value="">Select Area </option>
                            <option value="urban">Urban</option>
                            <option value="rural"> Rural</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Project<span>*</span></label>
                        <div style="position: relative; width: 100%; max-width: 400px;">
                            <input type="text" id="community_projectInput" name="community_project"
                                placeholder="Select or type project"
                                style="width: 100%; padding: 8px 12px; font-size: 15px; border: 1px solid #ccc; border-radius: 5px;"
                                autocomplete="off">
                            <ul id="communityProjectSuggestions"
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
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>NGO/SHG/Cooperative/FPO/Other
                            <span>*</span></label>
                        <input type="text" placeholder=" NGO/SHG/Cooperative/FPO" name="ngo" id="ngo">
                    </div>
                    <div class="scr-form-group">
                        <label>Organisation Representative Name

                            <span>*</span></label>
                        <input type="text" placeholder="oragnisation representative" name="org_rep_name"
                            id="org_rep_name">

                    </div>
                    <div class="scr-form-group">
                        <label>Type of Organisation<span>*</span></label>
                        <select name="org_type" id="org_type">
                            <option value="">Select Organisation </option>
                            <option value="ngo">NGO</option>
                            <option value="shg">SHG</option>
                            <option value="cooperative">Cooperative</option>
                            <option value="fpo">FPO</option>
                            <option value="fpc">FPC</option>
                            <option value="other">Other</option>
                        </select>

                    </div>



                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Working Period<span>*</span></label>
                        <select name="work_period" id="work_period">
                            <option value="">Select Working Period </option>
                            <option value="newley">Newley Registered</option>
                            <option value="1_year">1 Year</option>
                            <option value="1-3">1 year Above - 3 Year</option>
                            <option value="3">More Than 3 Year</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Number Of Members <span>*</span></label>
                        <select name="no_member" id="no_member">
                            <option value="">Select Number of Member </option>
                            <option value="1-5">01 - 05</option>
                            <option value="6-10">06 - 10</option>
                            <option value="11-20">11 - 20</option>
                            <option value="21-30">21 - 30</option>
                            <option value="30">30+</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Organisation Focused Working Area<span>*</span></label>
                        <select name="org_focus_work_area" id="org_focus_work_area">
                            <option value="">Select Working Area </option>
                            <option value="health">Health </option>
                            <option value="education">Education </option>
                            <option value="agriculture">Agriculture and Farmer Welfare </option>
                            <option value="livelihood">Livelihood</option>
                            <option value="cultural_promotion">Cultural Promotion</option>
                            <option value="food">Food</option>
                            <option value="other">Other</option>
                        </select>
                    </div>



                </div>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Organisational Support<span>*</span></label>
                        <select name="community_support" id="community_support">
                            <option value="">Select Support </option>
                            <option value="new_ngo">New Ngo Registration</option>
                            <option value="ngo_docs">Ngo Other Documentation Support</option>
                            <option value="new_shg">New SHG Registration</option>
                            <option value="shg_docs">SHG Documentation Support</option>
                            <option value="fpo_fpc">FPO/FPC Formation</option>
                            <option value="fpo_docs">FPO/FPC Documentation Support</option>
                            <option value="financial_management">Financial Management Training</option>
                            <option value="governance_training">Governance Training</option>
                            <option value="branding">Branding And Promotion</option>
                            <option value="financial_inlusion">Financial Inclusion</option>
                            <option value="marketing">Marketing</option>
                            <option value="legal">Legal Awareness</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Support <span>*</span></label>
                        <select name="community_suport2" id="community_suport2">
                            <option value="">Select Support </option>
                            <option value="community_vocational">Vocational Training</option>
                            <option value="community_social_media">Social Media Management</option>
                            <option value="community_packaging">Packaging</option>
                            <option value="community_online_market">Online Marketing (E - Commerce)</option>
                            <option value="community_offline_market">Offline Marketing</option>
                            <option value="community_governance_training">Governance Training</option>
                            <option value="community_financial_management">Financial Management</option>
                            <option value="community_financial_inclusion">Financial Inclusion</option>
                            <option value="community_oyhers">Other</option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Describe Support<span>*</span></label>
                        <input type="text" name="community_support_describe" id="community_support_describe">
                    </div>
                </div>
            </div>
            <div class="scr-form-group-btn">
                <button type="submit" class="scr-btn" style="padding: 8px 30px" id="subBtn">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- 1. jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
{{-- add required to the fields --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const programTypeSelect = document.getElementById("prog_type");

        const sections = {
            social_protection: document.getElementById("socialProtect"),
            livelihood_beneficiray: document.getElementById("livelihoodBeneficiary"),
            community_capacity: document.getElementById("communityCapacity"),
            digital_literacy: document.getElementById("digitalLiteracy")
        };

        function hideAllSections() {
            for (let key in sections) {
                sections[key].style.display = "none";
            }
        }

        programTypeSelect.addEventListener("change", function() {
            hideAllSections();

            const selected = programTypeSelect.value;
            if (sections[selected]) {
                sections[selected].style.display = "block";
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#subBtn').on('click', function(e) {
            e.preventDefault();
            let isValid = true;
            let subBtn = $('#subBtn');

            $('#duplicate-error').addClass('d-none').hide(); // Ensure it's hidden initially
            $('.field-error').remove();

            const fields = {
                prog_type: $('#prog_type'),
                from_date: $('#from_date'),
                state: $('#state'),
                district: $('#district'),
                donor_org: $('#donor_org'),
                project: $('#project'),
                support: $('#support'),
                team_member: $('#team_member'),
                bene_name: $('#bene_name'),
                age: $('#age'),
                gender: $('#gender'),
                caste: $('#caste'),
                mob_no: $('#mob_no'),
                religion: $('#religion'),
                occupation: $('#occupation'),
                family_income: $('#family_income')
            };

            const messages = {
                prog_type: 'Program Type is required.',
                from_date: 'Form Date is required.',
                state: 'State is required.',
                district: 'District is required.',
                donor_org: 'Donor Organisation is required.',
                project: 'Project is required.',
                support: 'Support Partner is required.',
                team_member: 'Team Member Name is required.',
                bene_name: 'Beneficiary Name is required.',
                age: 'Age is required.',
                gender: 'Gender is required.',
                caste: 'Caste is required.',
                mob_no: 'Mobile Number is required.',
                religion: 'Religion is required.',
                occupation: 'Occupation is required.',
                family_income: 'Family Income is required.'
            };

            $.each(fields, function(key, $field) {
                if (!$field.val() || $field.val().trim() === '' || $field.val().toLowerCase()
                    .includes('select')) {
                    $field.after(
                        `<div class="field-error text-danger mt-1">${messages[key]}</div>`);
                    isValid = false;
                }
            });

            const progType = $('#prog_type').val();

            if (progType === 'social_protection') {
                const extraFields = {
                    differently_abled: $('#differently_abled'),
                    document: $('#document'),
                    scheme: $('#scheme')
                };
                const extraMessages = {
                    differently_abled: 'Differently Abled is required.',
                    document: 'Document Apply/Update is required.',
                    scheme: 'Scheme Apply is required.'
                };

                $.each(extraFields, function(key, $field) {
                    if (!$field.val() || $field.val().toLowerCase().includes('select')) {
                        $field.after(
                            `<div class="field-error text-danger mt-1">${extraMessages[key]}</div>`
                        );
                        isValid = false;
                    }
                });
            }

            if (progType === 'livelihood_beneficiray') {
                const extraFields = {
                    differently_abled_beneficiary: $('#differently_abled_beneficiary'),
                    support_beneficiary: $('#support_beneficiary'),
                    support_describe: $('#support_describe')
                };
                const extraMessages = {
                    differently_abled_beneficiary: 'Differently Abled is required.',
                    support_beneficiary: 'Support is required.',
                    support_describe: 'Description of Support is required.'
                };

                $.each(extraFields, function(key, $field) {
                    if (!$field.val() || $field.val().trim() === '') {
                        $field.after(
                            `<div class="field-error text-danger mt-1">${extraMessages[key]}</div>`
                        );
                        isValid = false;
                    }
                });
            }

            if (progType === 'digital_literacy') {
                const extraFields = {
                    differently_abled_digital: $('#differently_abled_digital'),
                    area: $('#area'),
                    session_conduct: $('#session_conduct')
                };
                const extraMessages = {
                    differently_abled_digital: 'Differently Abled is required.',
                    area: 'Area is required.',
                    session_conduct: 'Session Type is required.'
                };

                $.each(extraFields, function(key, $field) {
                    if (!$field.val() || $field.val().toLowerCase().includes('select')) {
                        $field.after(
                            `<div class="field-error text-danger mt-1">${extraMessages[key]}</div>`
                        );
                        isValid = false;
                    }
                });
            }

            if (progType === 'community_capacity') {
                const extraFields = {
                    differently_abled_community: $('#differently_abled_community'),
                    community_area: $('#community_area'),
                    community_project: $('#community_project'),
                    ngo: $('#ngo'),
                    org_rep_name: $('#org_rep_name'),
                    org_type: $('#org_type'),
                    work_period: $('#work_period')
                };
                const extraMessages = {
                    differently_abled_community: 'Differently Abled is required.',
                    community_area: 'Area is required.',
                    community_project: 'Project is required.',
                    ngo: 'Organization Name is required.',
                    org_rep_name: 'Organization Representative is required.',
                    org_type: 'Organization Type is required.',
                    work_period: 'Working Period is required.'
                };

                $.each(extraFields, function(key, $field) {
                    if (!$field.val() || $field.val().trim() === '' || $field.val()
                        .toLowerCase().includes('select')) {
                        $field.after(
                            `<div class="field-error text-danger mt-1">${extraMessages[key]}</div>`
                        );
                        isValid = false;
                    }
                });
            }

            if (!isValid) {
                subBtn.prop('disabled', false);
                $('html, body').animate({
                    scrollTop: $('.field-error:first').offset().top - 100
                }, 500);
                return;
            }

            // AJAX duplicate check
            $.ajax({
                url: '/check-scheme-beneficiary',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    bene_name: $('#bene_name').val(),
                    gender: $('#gender').val(),
                    mob_no: $('#mob_no').val(),
                    scheme: $('#scheme').val()
                },
                success: function(response) {
                    if (response.existsRecord) {
                        const $errorBox = $('#duplicate-error');
                        $errorBox
                            .removeClass('d-none')
                            .hide()
                            .text('This beneficiary is already registered for this scheme.')
                            .fadeIn();

                        setTimeout(() => {
                            $('html, body').animate({
                                scrollTop: $errorBox.offset().top - 100
                            }, 500);
                        }, 100);

                        subBtn.prop('disabled', false);
                    } else {
                        $('#beneficiaryForm')[0].submit();
                    }
                },
                error: function() {
                    $('#duplicate-error').removeClass('d-none').text(
                        'Something went wrong. Please try again.'
                    );
                    subBtn.prop('disabled', false);
                }
            });
        });

        // Reset validation when user changes input
        $(':input, select').on('input change', function() {
            $('#subBtn').prop('disabled', false);
            $(this).next('.field-error').remove();
            $('#duplicate-error').addClass('d-none');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Suggestion for projectInput
        const suggestions = ["Sahyog", "Unnati", "Saksham", "Uttkarsh"];
        const input = document.getElementById('projectInput');
        const suggestionBox = document.getElementById('projectSuggestions');

        if (input && suggestionBox) {
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
        }

        // Suggestion for community_projectInput
        const communityInput = document.getElementById('community_projectInput');
        const communitySuggestionBox = document.getElementById('communityProjectSuggestions');

        if (communityInput && communitySuggestionBox) {
            communityInput.addEventListener('input', function() {
                const term = this.value.trim().toLowerCase();
                communitySuggestionBox.innerHTML = '';

                if (term === '') {
                    communitySuggestionBox.style.display = 'none';
                    return;
                }

                const filtered = suggestions.filter(s => s.toLowerCase().startsWith(term));

                if (filtered.length === 0) {
                    communitySuggestionBox.style.display = 'none';
                    return;
                }

                filtered.forEach(s => {
                    const li = document.createElement('li');
                    li.textContent = s;
                    li.style.padding = '8px 12px';
                    li.style.cursor = 'pointer';
                    li.addEventListener('click', function() {
                        communityInput.value = s;
                        communitySuggestionBox.style.display = 'none';
                    });
                    li.addEventListener('mouseover', function() {
                        li.style.background = '#f0f0f0';
                    });
                    li.addEventListener('mouseout', function() {
                        li.style.background = '#fff';
                    });
                    communitySuggestionBox.appendChild(li);
                });

                communitySuggestionBox.style.display = 'block';
            });
        }

        // Global click to hide suggestions
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#projectInput') && !e.target.closest('#projectSuggestions')) {
                if (suggestionBox) suggestionBox.style.display = 'none';
            }

            if (!e.target.closest('#community_projectInput') && !e.target.closest(
                    '#communityProjectSuggestions')) {
                if (communitySuggestionBox) communitySuggestionBox.style.display = 'none';
            }
        });
    });
</script>
