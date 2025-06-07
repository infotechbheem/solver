<div class="scr-registration-section">
    <div class="container p-0">
        <div class="csr-registration-main-heading">
            <p>Edit Program</p>
        </div>
        <form class="scr-registration-form" action="{{ route('update-program',$editProgram->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Program Type <span>*</span></label>
                    <select name="prog_type" id="prog_type">
                        <option value="">Select Program Type</option>
                        <option value="social_protection"
                            {{ $editProgram->program_type == 'social_protection' ? 'selected' : '' }}>Social protection
                        </option>
                        <option value="livelihood_beneficiray"
                            {{ $editProgram->program_type == 'livelihood_beneficiray' ? 'selected' : '' }}>Livelihood
                            Beneficiary</option>
                        <option value="community_capacity"
                            {{ $editProgram->program_type == 'community_capacity' ? 'selected' : '' }}>Community
                            Capacity</option>
                        <option value="digital_literacy"
                            {{ $editProgram->program_type == 'digital_literacy' ? 'selected' : '' }}>Digital Literacy &
                            Financial Inclusion</option>
                    </select>
                </div>

                <div class="scr-form-group">
                    <div class="scr-form-group">
                        <label>Form Date <span>*</span></label>
                        <input type="date" name="from_date" id="from_date" value="{{ $editProgram->date }}">
                    </div>
                </div>
                <div class="scr-form-group">
                    <label>State <span>*</span></label>
                    <select id="state" name="state" data-selected="{{ $editProgram->state }}">
                        <option>Select State</option>
                    </select>
                </div>


            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>District <span>*</span></label>
                    <select name="district" id="district" data-selected="{{ $editProgram->district }}">

                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Donor Organisation <span>*</span></label>
                    <select name="donor_org" id="donor_org">
                        <option value="">Select Donor Organisation</option>
                        <option value="npcl" {{ $editProgram->donar_organisation == 'npcl' ? 'selected' : '' }}>NPCL
                        </option>
                        <option value="tata" {{ $editProgram->donar_organisation == 'tata' ? 'selected' : '' }}>TATA
                            Trust</option>
                        <option value="smile" {{ $editProgram->donar_organisation == 'smile' ? 'selected' : '' }}>Smile
                            Foundation</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Project <span>*</span></label>
                    <select name="project" id="project">
                        <option value="">Select Project</option>
                        <option value="sahyog" {{ $editProgram->project == 'sahyog' ? 'selected' : '' }}>Sahyog
                        </option>
                        <option value="unnati" {{ $editProgram->project == 'unnati' ? 'selected' : '' }}>Unnati
                        </option>
                        <option value="saksham" {{ $editProgram->project == 'saksham' ? 'selected' : '' }}>Saksham
                        </option>
                        <option value="uttkarsh" {{ $editProgram->project == 'uttkarsh' ? 'selected' : '' }}>Uttkarsh
                        </option>
                        <option value="others" {{ $editProgram->project == 'others' ? 'selected' : '' }}>Others
                        </option>
                    </select>
                </div>
            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Support Partner / Resource Organization <span>*</span></label>
                    <select name="support" id="support">
                        <option value="">Select Support Partner</option>
                        <option value="kunj" {{ $editProgram->support_partner == 'kunj' ? 'selected' : '' }}>Kunj
                            Innovation Trust</option>
                        <option value="bhraspati" {{ $editProgram->support_partner == 'bhraspati' ? 'selected' : '' }}>
                            Bhrashpati Foundation</option>
                        <option value="yuva" {{ $editProgram->support_partner == 'yuva' ? 'selected' : '' }}>Yuva
                            Bharat Trust</option>
                        <option value="uplift" {{ $editProgram->support_partner == 'uplift' ? 'selected' : '' }}>Uplift
                            Live Foundation</option>
                        <option value="mathura" {{ $editProgram->support_partner == 'mathura' ? 'selected' : '' }}>
                            Mathura Health Department</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Team Member Name <span>*</span></label>
                    <select name="team_member" id="team_member">
                        <option value="">Select Team Member Name</option>
                        @foreach($team as $team)
                            <option value="{{ $team->id }}" {{ $editProgram->team_member_name == $team->id ? 'selected' : '' }}>{{ $team->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Beneficiary Name <span>*</span></label>
                    <input type="text" placeholder="Beneficiary name" name="bene_name" id="bene_name"
                        value="{{ $editProgram->beneficiary_name }}">
                </div>

            </div>
            <div class="scr-registration-row">
                <div class="scr-form-group">
                    <label>Age <span>*</span></label>
                    <select name="age" id="age">
                        <option value="">Select Age</option>
                        <option value="1-10" {{ $editProgram->age == '1-10' ? 'selected' : '' }}>1-10</option>
                        <option value="11-18" {{ $editProgram->age == '11-18' ? 'selected' : '' }}>11-18</option>
                        <option value="19-25" {{ $editProgram->age == '19-25' ? 'selected' : '' }}>19-25</option>
                        <option value="26-40" {{ $editProgram->age == '26-40' ? 'selected' : '' }}>26-40</option>
                        <option value="41-59" {{ $editProgram->age == '41-59' ? 'selected' : '' }}>41-59</option>
                        <option value="60-69" {{ $editProgram->age == '60-69' ? 'selected' : '' }}>60-69</option>
                        <option value="70" {{ $editProgram->age == '70' ? 'selected' : '' }}>70 Above</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Gender <span>*</span></label>
                    <select name="gender" id="gender">
                        <option value="">Select gender</option>
                        <option value="male" {{ $editProgram->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $editProgram->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="transgender" {{ $editProgram->gender == 'transgender' ? 'selected' : '' }}>
                            Transgender</option>

                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Caste <span>*</span></label>
                    <select name="caste" id="caste">
                        <option value="">Select Caste</option>
                        <option value="general" {{ $editProgram->caste == 'general' ? 'selected' : '' }}>General
                        </option>
                        <option value="obc" {{ $editProgram->caste == 'obc' ? 'selected' : '' }}>OBC</option>
                        <option value="sc" {{ $editProgram->caste == 'sc' ? 'selected' : '' }}>SC</option>
                        <option value="st" {{ $editProgram->caste == 'st' ? 'selected' : '' }}>ST</option>
                        <option value="pvtg" {{ $editProgram->caste == 'pvtg' ? 'selected' : '' }}>PVTG's</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Mobile Number <span>*</span></label>
                    <input type="text" placeholder="Enter mobile number" name="mob_no" id="mob_no"
                        value="{{ $editProgram->mobile_number }}">
                </div>
            </div>
            <div class="scr-registration-row">

                <div class="scr-form-group">
                    <label>Religion <span>*</span></label>
                    <select name="religion" id="religion">
                        <option value="">Select Religion</option>
                        <option value="hindu" {{ $editProgram->religion == 'hindu' ? 'selected' : '' }}>Hindu
                        </option>
                        <option value="muslim" {{ $editProgram->religion == 'muslim' ? 'selected' : '' }}>Muslim
                        </option>
                        <option value="sikh" {{ $editProgram->religion == 'sikh' ? 'selected' : '' }}>Sikh</option>
                        <option value="christian" {{ $editProgram->religion == 'christian' ? 'selected' : '' }}>
                            Christian</option>
                        <option value="jain" {{ $editProgram->religion == 'jain' ? 'selected' : '' }}>Jain</option>
                        <option value="buddhist" {{ $editProgram->religion == 'buddhist' ? 'selected' : '' }}>Buddhist
                        </option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Occupation <span>*</span></label>
                    <select name="occupation" id="occupation">
                        <option value="">Select Occupation</option>
                        <option value="construction"
                            {{ $editProgram->occupation == 'construction' ? 'selected' : '' }}>Construction Worker
                        </option>
                        <option value="farmer" {{ $editProgram->occupation == 'farmer' ? 'selected' : '' }}>Farmer
                        </option>
                        <option value="housemaker" {{ $editProgram->occupation == 'housemaker' ? 'selected' : '' }}>
                            Housemaker</option>
                        <option value="shg" {{ $editProgram->occupation == 'shg' ? 'selected' : '' }}>SHG Groups
                        </option>
                        <option value="shopkeeper" {{ $editProgram->occupation == 'shopkeeper' ? 'selected' : '' }}>
                            Shopkeeper</option>
                        <option value="student" {{ $editProgram->occupation == 'student' ? 'selected' : '' }}>Student
                        </option>
                        <option value="unemployed" {{ $editProgram->occupation == 'unemployed' ? 'selected' : '' }}>
                            Unemployed</option>
                        <option value="none" {{ $editProgram->occupation == 'none' ? 'selected' : '' }}>None of the
                            Above</option>
                    </select>
                </div>
                <div class="scr-form-group">
                    <label>Family Income <span>*</span></label>
                    <select name="family_income" id="family_income">
                        <option value="">Select family Income</option>
                        <option value="no_income" {{ $editProgram->family_income == 'no_income' ? 'selected' : '' }}>
                            No Income</option>
                        <option value="1000-5000" {{ $editProgram->family_income == '1000-5000' ? 'selected' : '' }}>
                            1000 - 5000</option>
                        <option value="5001-15000"
                            {{ $editProgram->family_income == '5001-15000' ? 'selected' : '' }}>5001 - 15000</option>
                        <option value="15001-30000"
                            {{ $editProgram->family_income == '15001-30000' ? 'selected' : '' }}> 15001 - 30000
                        </option>
                        <option value="30000-45000"
                            {{ $editProgram->family_income == '30000-45000' ? 'selected' : '' }}>30000 - 45000</option>
                        <option value="45001-70000"
                            {{ $editProgram->family_income == '45001-70000' ? 'selected' : '' }}>45001 - 70000</option>
                        <option value="70001" {{ $editProgram->family_income == '70001' ? 'selected' : '' }}>70001
                            Above</option>
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
                            <option value="yes"
                                {{ optional($editProgram->socialProtections->first())->differently_abled == 'yes' ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="no"
                                {{ optional($editProgram->socialProtections->first())->differently_abled == 'no' ? 'selected' : '' }}>
                                No
                            </option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Document Apply or Update <span>*</span></label>
                        <select name="document" id="document">
                            <option value="">Select Document Apply or Update </option>
                            @php
                                $appliedDocument = optional($editProgram->socialProtections->first())->applied_document;
                            @endphp

                            <option value="abha" {{ $appliedDocument == 'abha' ? 'selected' : '' }}>ABHA Card
                            </option>
                            <option value="aadhaar" {{ $appliedDocument == 'aadhaar' ? 'selected' : '' }}>Aadhaar Card
                            </option>
                            <option value="aadhar_pvc" {{ $appliedDocument == 'aadhar_pvc' ? 'selected' : '' }}>
                                Aadhaar PVC Order</option>
                            <option value="pan_apply" {{ $appliedDocument == 'pan_apply' ? 'selected' : '' }}>PAN Card
                                Apply</option>
                            <option value="pan_correction"
                                {{ $appliedDocument == 'pan_correction' ? 'selected' : '' }}>PAN Card Correction
                            </option>
                            <option value="eshram" {{ $appliedDocument == 'eshram' ? 'selected' : '' }}>E - Shram Card
                            </option>
                            <option value="fssai" {{ $appliedDocument == 'fssai' ? 'selected' : '' }}>FSSAI
                                Registration</option>
                            <option value="fssai_renew" {{ $appliedDocument == 'fssai_renew' ? 'selected' : '' }}>
                                FSSAI Renewal</option>
                            <option value="family_benefit"
                                {{ $appliedDocument == 'family_benefit' ? 'selected' : '' }}>Family Benefit Scheme
                            </option>
                            <option value="udyam" {{ $appliedDocument == 'udyam' ? 'selected' : '' }}>Udyam
                                Registration (MSME)</option>
                            <option value="voter_apply" {{ $appliedDocument == 'voter_apply' ? 'selected' : '' }}>
                                Voter Id Card Apply</option>
                            <option value="voter_correction"
                                {{ $appliedDocument == 'voter_correction' ? 'selected' : '' }}>Voter Id Card Correction
                            </option>
                            <option value="ration" {{ $appliedDocument == 'ration' ? 'selected' : '' }}>Ration Card
                                Apply</option>
                            <option value="gst_registration"
                                {{ $appliedDocument == 'gst_registration' ? 'selected' : '' }}>GST Registration
                            </option>
                            <option value="bank_acc_open" {{ $appliedDocument == 'bank_acc_open' ? 'selected' : '' }}>
                                Bank Account Opening</option>
                            <option value="caste_certificate"
                                {{ $appliedDocument == 'caste_certificate' ? 'selected' : '' }}>Caste Certificate
                            </option>
                            <option value="domicile_register"
                                {{ $appliedDocument == 'domicile_register' ? 'selected' : '' }}>Domicile Registration
                            </option>
                        </select>
                    </div>
                    <div class="scr-form-group">
                        <label>Scheme Apply<span>*</span></label>
                        <select name="scheme" id="scheme">
                            <option value="">Select Scheme Apply </option>
                            @php
                                $appliedScheme = optional($editProgram->socialProtections->first())->applied_scheme;
                            @endphp

                            <option value="ayushman" {{ $appliedScheme == 'ayushman' ? 'selected' : '' }}>Ayushman
                                Card</option>
                            <option value="pradhanmantri_suraksha"
                                {{ $appliedScheme == 'pradhanmantri_suraksha' ? 'selected' : '' }}>Pradhan Mantri
                                Suraksha Bima Yojna</option>
                            <option value="pradhan_jeevan" {{ $appliedScheme == 'pradhan_jeevan' ? 'selected' : '' }}>
                                Pradhan Mantri Jeevan Bima Yojna</option>
                            <option value="shram_yogi" {{ $appliedScheme == 'shram_yogi' ? 'selected' : '' }}>Shram
                                Yogi Mandhan</option>
                            <option value="nps" {{ $appliedScheme == 'nps' ? 'selected' : '' }}>NPS Traders Scheme
                            </option>
                            <option value="kisan" {{ $appliedScheme == 'kisan' ? 'selected' : '' }}>Kisan Mandhan
                                Yojna</option>
                            <option value="pradhan_ujjwala"
                                {{ $appliedScheme == 'pradhan_ujjwala' ? 'selected' : '' }}>Pradhan Mantri Ujjwala
                                Yojna</option>
                            <option value="atal_pension" {{ $appliedScheme == 'atal_pension' ? 'selected' : '' }}>Atal
                                Pension Yojna</option>
                            <option value="family_benefit" {{ $appliedScheme == 'family_benefit' ? 'selected' : '' }}>
                                Family Benefit Scheme</option>
                            <option value="old_age_pension"
                                {{ $appliedScheme == 'old_age_pension' ? 'selected' : '' }}>Old Age Pension</option>
                            <option value="widow_pension" {{ $appliedScheme == 'widow_pension' ? 'selected' : '' }}>
                                Widow Pension</option>
                            <option value="disability_pension"
                                {{ $appliedScheme == 'disability_pension' ? 'selected' : '' }}>Disability Pension
                            </option>
                        </select>
                    </div>


                </div>
            </div>

            <div style="display: none;" id="livelihoodBeneficiary">
                <h3 class="scr-registration-heading">Livelihood Beneficiary</h3>
                @php
                    $livelihood = optional($editProgram->livelihoods->first());
                @endphp

                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled_beneficiary" id="differently_abled_beneficiary">
                            <option value="">Select Differently Abled</option>
                            <option value="yes" {{ $livelihood->differently_abled == 'yes' ? 'selected' : '' }}>Yes
                            </option>
                            <option value="no" {{ $livelihood->differently_abled == 'no' ? 'selected' : '' }}>No
                            </option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Support <span>*</span></label>
                        <select name="support_beneficiary" id="support_beneficiary">
                            <option value="">Select Support</option>
                            <option value="vocational_training"
                                {{ $livelihood->support == 'vocational_training' ? 'selected' : '' }}>
                                Vocational Training</option>
                            <option value="social_media"
                                {{ $livelihood->support == 'social_media' ? 'selected' : '' }}>Social Media
                                Management</option>
                            <option value="branding" {{ $livelihood->support == 'branding' ? 'selected' : '' }}>
                                Branding
                            </option>
                            <option value="packaging" {{ $livelihood->support == 'packaging' ? 'selected' : '' }}>
                                Packaging
                            </option>
                            <option value="online_marketing"
                                {{ $livelihood->support == 'online_marketing' ? 'selected' : '' }}>Online
                                Marketing (E - Commerce)</option>
                            <option value="offline_marketing"
                                {{ $livelihood->support == 'offline_marketing' ? 'selected' : '' }}>Offline
                                Marketing</option>
                            <option value="governance_training"
                                {{ $livelihood->support == 'governance_training' ? 'selected' : '' }}>
                                Governance Training</option>
                            <option value="financial_management"
                                {{ $livelihood->support == 'financial_management' ? 'selected' : '' }}>
                                Financial Management</option>
                            <option value="raw_material"
                                {{ $livelihood->support == 'raw_material' ? 'selected' : '' }}>Row
                                Material Support</option>
                            <option value="other" {{ $livelihood->support == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Describe Support <span>*</span></label>
                        <input type="text" placeholder="Describe Support" name="support_describe"
                            id="support_describe" value="{{ $livelihood->support_description ?? '' }}">
                    </div>
                </div>
            </div>

            <div style="display: none;" id="digitalLiteracy">
                <h3 class="scr-registration-heading">Digital Literacy & Financial Inclusion</h3>
                @php
                    $digital = optional($editProgram->digitalLiteracies->first());
                @endphp

                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled_digital" id="differently_abled_digital">
                            <option value="">Select Differently Abled</option>
                            <option value="yes" {{ $digital->differently_abled == 'yes' ? 'selected' : '' }}>Yes
                            </option>
                            <option value="no" {{ $digital->differently_abled == 'no' ? 'selected' : '' }}>No
                            </option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Area <span>*</span></label>
                        <select name="area" id="area">
                            <option value="">Select Area</option>
                            <option value="urban" {{ $digital->area == 'urban' ? 'selected' : '' }}>Urban</option>
                            <option value="rural" {{ $digital->area == 'rural' ? 'selected' : '' }}>Rural</option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Types of Sessions We Conduct<span>*</span></label>
                        <select name="session_conduct" id="session_conduct">
                            <option value="">Select Sessions</option>
                            <option value="digtal_litracy"
                                {{ $digital->type_of_sessions == 'digtal_litracy' ? 'selected' : '' }}>Digital
                                Literacy
                            </option>
                            <option value="cyber_security"
                                {{ $digital->type_of_sessions == 'cyber_security' ? 'selected' : '' }}>Cyber Security
                            </option>
                            <option value="financial_inclusion"
                                {{ $digital->type_of_sessions == 'financial_inclusion' ? 'selected' : '' }}>Financial
                                Inclusion</option>
                        </select>
                    </div>
                </div>
            </div>

            <div style="display: none;" id="communityCapacity">
                @php
                    $community = optional($editProgram->communities->first());
                @endphp

                <h3 class="scr-registration-heading">Community Capacity</h3>
                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Differently Abled <span>*</span></label>
                        <select name="differently_abled_community" id="differently_abled_community">
                            <option value="">Select Differently Abled</option>
                            <option value="yes"
                                {{ $community->differently_abled == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no"
                                {{ $community->differently_abled == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Area <span>*</span></label>
                        <select name="community_area" id="community_area">
                            <option value="">Select Area</option>
                            <option value="urban" {{ $community->area == 'urban' ? 'selected' : '' }}>
                                Urban</option>
                            <option value="rural" {{ $community->area == 'rural' ? 'selected' : '' }}>
                                Rural</option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Project <span>*</span></label>
                        <select name="community_project" id="community_project">
                            <option value="">Select Project</option>
                            <option value="utkarsh"
                                {{ $community->project == 'utkarsh' ? 'selected' : '' }}>Uttkarsh</option>
                        </select>
                    </div>
                </div>

                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>NGO/SHG/Cooperative/FPO/Other <span>*</span></label>
                        <input type="text" placeholder="NGO/SHG/Cooperative/FPO" name="ngo" id="ngo"
                            value="{{ $community->ngo_shg_cooperative_fpo_other }}">
                    </div>

                    <div class="scr-form-group">
                        <label>Organisation Representative Name <span>*</span></label>
                        <input type="text" placeholder="Organisation Representative" name="org_rep_name"
                            id="org_rep_name" value="{{ $community->org_representative_name }}">
                    </div>

                    <div class="scr-form-group">
                        <label>Type of Organisation<span>*</span></label>
                        <select name="org_type" id="org_type">
                            <option value="">Select Organisation</option>
                            <option value="ngo" {{ $community->org_type == 'ngo' ? 'selected' : '' }}>NGO</option>
                            <option value="shg" {{ $community->org_type == 'shg' ? 'selected' : '' }}>SHG</option>
                            <option value="cooperative"
                                {{ $community->org_type == 'cooperative' ? 'selected' : '' }}>Cooperative</option>
                            <option value="fpo" {{ $community->org_type == 'fpo' ? 'selected' : '' }}>FPO</option>
                            <option value="fpc" {{ $community->org_type == 'fpc' ? 'selected' : '' }}>FPC</option>
                            <option value="other" {{ $community->org_type == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                </div>

                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Working Period<span>*</span></label>
                        <select name="work_period" id="work_period">
                            <option value="">Select Working Period</option>
                            <option value="newley" {{ $community->working_period == 'newley' ? 'selected' : '' }}>Newley
                                Registered</option>
                            <option value="1_year" {{ $community->working_period == '1_year' ? 'selected' : '' }}>1 Year
                            </option>
                            <option value="1-3" {{ $community->working_period == '1-3' ? 'selected' : '' }}>1 year
                                Above - 3 Year</option>
                            <option value="3" {{ $community->working_period == '3' ? 'selected' : '' }}>More Than 3
                                Year</option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Number Of Members <span>*</span></label>
                        <select name="no_member" id="no_member">
                            <option value="">Select Number of Member</option>
                            <option value="1-5" {{ $community->no_of_members == '1-5' ? 'selected' : '' }}>01 - 05
                            </option>
                            <option value="6-10" {{ $community->no_of_members == '6-10' ? 'selected' : '' }}>06 - 10
                            </option>
                            <option value="11-20" {{ $community->no_of_members == '11-20' ? 'selected' : '' }}>11 - 20
                            </option>
                            <option value="21-30" {{ $community->no_of_members == '21-30' ? 'selected' : '' }}>21 - 30
                            </option>
                            <option value="30" {{ $community->no_of_members == '30' ? 'selected' : '' }}>30+</option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Organisation Focused Working Area<span>*</span></label>
                        <select name="org_focus_work_area" id="org_focus_work_area">
                            <option value="">Select Working Area</option>
                            <option value="health"
                                {{ $community->org_focused_working_area == 'health' ? 'selected' : '' }}>Health</option>
                            <option value="education"
                                {{ $community->org_focused_working_area == 'education' ? 'selected' : '' }}>Education
                            </option>
                            <option value="agriculture"
                                {{ $community->org_focused_working_area == 'agriculture' ? 'selected' : '' }}>Agriculture
                                and Farmer Welfare</option>
                            <option value="livelihood"
                                {{ $community->org_focused_working_area == 'livelihood' ? 'selected' : '' }}>Livelihood
                            </option>
                            <option value="cultural_promotion"
                                {{ $community->org_focused_working_area == 'cultural_promotion' ? 'selected' : '' }}>
                                Cultural Promotion</option>
                            <option value="food" {{ $community->org_focused_working_area == 'food' ? 'selected' : '' }}>
                                Food</option>
                            <option value="other"
                                {{ $community->org_focused_working_area == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <div class="scr-registration-row">
                    <div class="scr-form-group">
                        <label>Support<span>*</span></label>
                        <select name="community_support" id="community_support">
                            <option value="">Select Support</option>
                            <option value="new_ngo"
                                {{ $community->support == 'new_ngo' ? 'selected' : '' }}>New Ngo
                                Registration</option>
                            <option value="ngo_docs"
                                {{ $community->support == 'ngo_docs' ? 'selected' : '' }}>Ngo Other
                                Documentation Support</option>
                            <option value="new_shg"
                                {{ $community->support == 'new_shg' ? 'selected' : '' }}>New SHG
                                Registration</option>
                            <option value="shg_docs"
                                {{ $community->support == 'shg_docs' ? 'selected' : '' }}>SHG Documentation
                                Support</option>
                            <option value="fpo_fpc"
                                {{ $community->support == 'fpo_fpc' ? 'selected' : '' }}>FPO/FPC Formation
                            </option>
                            <option value="fpo_docs"
                                {{ $community->support == 'fpo_docs' ? 'selected' : '' }}>FPO/FPC
                                Documentation Support</option>
                            <option value="financial_management"
                                {{ $community->support == 'financial_management' ? 'selected' : '' }}>
                                Financial Management Training</option>
                            <option value="governance_training"
                                {{ $community->support == 'governance_training' ? 'selected' : '' }}>
                                Governance Training</option>
                            <option value="branding"
                                {{ $community->support == 'branding' ? 'selected' : '' }}>Branding And
                                Promotion</option>
                            <option value="financial_inlusion"
                                {{ $community->support == 'financial_inlusion' ? 'selected' : '' }}>
                                Financial Inclusion</option>
                            <option value="marketing"
                                {{ $community->support == 'marketing' ? 'selected' : '' }}>Marketing
                            </option>
                            <option value="legal" {{ $community->support == 'legal' ? 'selected' : '' }}>
                                Legal Awareness</option>
                            <option value="other" {{ $community->support == 'other' ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Support <span>*</span></label>
                        <select name="community_suport2" id="community_suport2">
                            <option value="">Select Support</option>
                            <option value="community_vocational"
                                {{ $community->community_support == 'community_vocational' ? 'selected' : '' }}>
                                Vocational Training</option>
                            <option value="community_social_media"
                                {{ $community->community_support == 'community_social_media' ? 'selected' : '' }}>
                                Social Media Management</option>
                            <option value="community_packaging"
                                {{ $community->community_support == 'community_packaging' ? 'selected' : '' }}>
                                Packaging</option>
                            <option value="community_online_market"
                                {{ $community->community_support == 'community_online_market' ? 'selected' : '' }}>
                                Online Marketing (E-Commerce)</option>
                            <option value="community_offline_market"
                                {{ $community->community_support == 'community_offline_market' ? 'selected' : '' }}>
                                Offline Marketing</option>
                            <option value="community_governance_training"
                                {{ $community->community_support == 'community_governance_training' ? 'selected' : '' }}>
                                Governance Training</option>
                            <option value="community_financial_management"
                                {{ $community->community_support == 'community_financial_management' ? 'selected' : '' }}>
                                Financial Management</option>
                            <option value="community_financial_inclusion"
                                {{ $community->community_support == 'community_financial_inclusion' ? 'selected' : '' }}>
                                Financial Inclusion</option>
                            <option value="community_oyhers"
                                {{ $community->community_support == 'community_oyhers' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>

                    <div class="scr-form-group">
                        <label>Describe Support<span>*</span></label>
                        <input type="text" name="community_support_describe" id="community_support_describe"
                            value="{{ $community->support_description }}">
                    </div>
                </div>
            </div>
            <div class="scr-form-group-btn">
                <button type="submit" class="scr-btn" style="padding: 8px 30px" id="subBtn">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                if (sections[key]) {
                    sections[key].style.display = "none";
                }
            }
        }

        function showSelectedSection() {
            const selected = programTypeSelect.value;
            if (sections[selected]) {
                sections[selected].style.display = "block";
            }
        }

        // Run once on page load
        hideAllSections();
        showSelectedSection();

        // Handle change event
        programTypeSelect.addEventListener("change", function() {
            hideAllSections();
            showSelectedSection();
        });
    });
</script>
