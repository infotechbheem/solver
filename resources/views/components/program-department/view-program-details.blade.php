 <div class="employee-card">
     <div class="employee-header">
         <div class="employee-name-details">
             <h2 class="employee-name">Project Type</h2>

             <p class="employee-position">
                 @php
                     $programTypeLabels = [
                         'social_protection' => 'Social Protection',
                         'livelihood_beneficiray' => 'Livelihood Beneficiary',
                         'community_capacity' => 'Community Capacity',
                         'digital_literacy' => 'Digital Literacy & Financial Inclusion',
                     ];
                     $donar = [
                         'npcl' => 'NPCL',
                         'tata' => 'TATA Trust',
                         'smile' => 'Smile Foundation',
                     ];
                     $project = [
                         'sahyog' => 'Sahyog',
                         'unnati' => 'Unnati',
                         'saksham' => 'Saksham',
                         'uttkarsh' => 'Uttkarsh',
                         'others' => 'Others',
                     ];
                     $support = [
                         'kunj' => 'Kunj Innovation Trust',
                         'bhraspati' => 'Bhrashpati Foundation',
                         'yuva' => 'Yuva Bharat Trust',
                         'uplift' => 'Uplift Live Foundation',
                         'mathura' => 'Mathura Health Department',
                     ];

                 @endphp

                 {{ $programTypeLabels[$programDetails->program_type] ?? ucfirst(str_replace('_', ' ', $programDetails->program_type)) }}
             </p>

         </div>
     </div>
     <div class="employee-body">
         <table class="employee-table">
             <tr>
                 <th>Form Date</th>
                 <th>State</th>
                 <th>District</th>
             </tr>
             <tr>
                 <td>{{ \Carbon\Carbon::parse($programDetails->date)->format('d-m-Y') }}</td>
                 <td>{{ $programDetails->state }}</td>
                 <td>{{ $programDetails->district }}</td>
             </tr>
             <tr>
                 <th>Donor Organisation</th>
                 <th>Project</th>
                 <th>Support Partner</th>
             </tr>
             <tr>
                 <td>{{ $donar[$programDetails->donar_organisation] ?? '-' }}</td>
                 <td>{{ $project[$programDetails->project] ?? '-' }}</td>
                 <td>{{ $support[$programDetails->support_partner] ?? '-' }}</td>
             </tr>
             <tr>
                 <th>Team Member Name</th>
                 <th>Beneficiary Name</th>
                 <th>Age</th>
             </tr>
             <tr>
                 <td>{{ $programDetails->team->full_name }}</td>
                 <td>{{ $programDetails->beneficiary_name }}</td>
                 <td>{{ $programDetails->age }}</td>
             </tr>
             <tr>
                 <th>Gender</th>
                 <th>Caste</th>
                 <th>Mobile Numnber</th>

             </tr>
             <tr>
                 <td>{{ $programDetails->gender }}</td>
                 <td>{{ $programDetails->caste }}</td>
                 <td>{{ $programDetails->mobile_number }}</td>
             </tr>
             <tr>

                 <th>Religion</th>
                 <th>Occupation</th>
                 <th>Family Income</th>
             </tr>
             <tr>
                 <td>{{ $programDetails->religion }}</td>
                 <td>{{ $programDetails->occupation }}</td>
                 <td>{{ $programDetails->family_income }}</td>
             </tr>

             <!-- Dynamic Section Row -->
             @php
                 $documentOptions = [
                     'abha' => 'ABHA Card',
                     'aadhaar' => 'Aadhaar Card',
                     'aadhar_pvc' => 'Aadhaar PVC Order',
                     'pan_apply' => 'PAN Card Apply',
                     'pan_correction' => 'PAN Card Correction',
                     'eshram' => 'E - Shram Card',
                     'fssai' => 'FSSAI Registration',
                     'fssai_renew' => 'FSSAI Renewal',
                     'family_benefit' => 'Family Benefit Scheme',
                     'udyam' => 'Udyam Registration (MSME)',
                     'voter_apply' => 'Voter Id Card Apply',
                     'voter_correction' => 'Voter Id Card Correction',
                     'ration' => 'Ration Card Apply',
                     'gst_registration' => 'GST Registration',
                     'bank_acc_open' => 'Bank Account Opening',
                     'caste_certificate' => 'Caste Certificate',
                     'domicile_register' => 'Domicile Registration',
                 ];

                 $schemeOptions = [
                     'ayushman' => 'Ayushman Card',
                     'pradhanmantri_suraksha' => 'Pradhan Mantri Suraksha Bima Yojna',
                     'pradhan_jeevan' => 'Pradhan Mantri Jeevan Bima Yojna',
                     'shram_yogi' => 'Shram Yogi Mandhan',
                     'nps' => 'NPS Traders Scheme',
                     'kisan' => 'Kisan Mandhan Yojna',
                     'pradhan_ujjwala' => 'Pradhan Mantri Ujjwala Yojna',
                     'atal_pension' => 'Atal Pension Yojna',
                     'family_benefit' => 'Family Benefit Scheme',
                     'old_age_pension' => 'Old Age Pension',
                     'widow_pension' => 'Widow Pension',
                     'disability_pension' => 'Disability Pension',
                 ];

                 $supportOptions = [
                     'vocational_training' => 'Vocational Training',
                     'social_media' => 'Social Media Management',
                     'branding' => 'Branding',
                     'packaging' => 'Packaging',
                     'online_marketing' => 'Online Marketing (E-Commerce)',
                     'offline_marketing' => 'Offline Marketing',
                     'governance_training' => 'Governance Training',
                     'financial_management' => 'Financial Management',
                     'raw_material' => 'Raw Material Support',
                     'other' => 'Other',
                 ];

                 $areaOptions = [
                     'urban' => 'Urban',
                     'rural' => 'Rural',
                 ];

                 $sessionsWeCOnduct = [
                     'digtal_litracy' => 'Digital Literacy',
                     'cyber_security' => 'Cyber Security',
                     'financial_inclusion' => 'Financial Inclusion',
                 ];

                 $project = [
                     'utkarsh' => 'Uttkarsh',
                 ];
                 $organisation_type = [
                     'ngo' => 'NGO',
                     'shg' => 'SHG',
                     'cooperative' => 'Cooperative',
                     'fpo' => 'FPO',
                     'fpc' => 'FPC',
                     'other' => 'Other',
                 ];

                 $working_period = [
                     'newley' => 'Newley Registered',
                     '1_year' => '1 Year',
                     '1-3' => '1 year Above - 3 year',
                     '3' => 'More Than 3 Year',
                 ];
                 $members = [
                     '1-5' => '01 - 05',
                     '6-10' => '06 - 10',
                     '11-20' => '11 -20',
                     '21-30' => '21 - 30',
                     '30' => '30+',
                 ];
                 $org_focus_working_area = [
                     'health' => 'Health',
                     'education' => 'Education',
                     'agriculture' => 'Agriculture and Farmer Welfare',
                     'livelihood' => 'Livelihood',
                     'cultural_promotion' => 'Cultural Promotion',
                     'food' => 'Food',
                     'other' => 'Other',
                 ];

                 $org_support = [
                     'new_ngo' => 'New Ngo Registration',
                     'ngo_docs' => 'Ngo Other Documentation Support',
                     'new_shg' => 'New SHG Registration',
                     'shg_docs' => 'SHG Documentation Support',
                     'fpo_fpc' => 'FPO/FPC Formation',
                     'fpo_docs' => 'FPO/FPC Documentation Support',
                     'financial_management' => 'Financial Management Training',
                     'governance_training' => 'Governance Training',
                     'branding' => 'Branding And Promotion',
                     'financial_inlusion' => 'Financial Inclusion',
                     'marketing' => 'Marketing',
                     'legal' => 'Legal Awareness',
                     'other' => 'Other',
                 ];
                 $communitySupport = [
                     'community_vocational' => 'Vocational Training',
                     'community_social_media' => 'Social Media Management',
                     'community_packaging' => 'Packaging',
                     'community_online_market' => 'Online Marketing (E - Commerce)',
                     'community_offline_market' => 'Offline Marketing',
                     'community_governance_training' => 'Governance Training',
                     'community_financial_management' => 'Financial Management',
                     'community_financial_inclusion' => 'Financial Inclusion',
                     'community_oyhers' => 'Other',
                 ];

                 $yesNoOptions = ['yes' => 'Yes', 'no' => 'No'];
             @endphp

             <tbody id="socialProtect" style="display: none;">
                 <tr>
                     <th>Differently Abled</th>
                     <th>Document Apply or Update</th>
                     <th>Scheme Apply</th>
                 </tr>
                 @foreach ($programDetails->socialProtections as $social)
                     <tr>
                         <td>{{ $yesNoOptions[$social->differently_abled] ?? ucfirst($social->differently_abled) }}
                         </td>
                         <td>{{ $documentOptions[$social->applied_document] ?? ucfirst(str_replace('_', ' ', $social->applied_document)) }}
                         </td>
                         <td>{{ $schemeOptions[$social->applied_scheme] ?? ucfirst(str_replace('_', ' ', $social->applied_scheme)) }}
                         </td>
                     </tr>
                 @endforeach
             </tbody>

             <tbody id="livelihoodBeneficiary" style="display: none;">
                 <tr>
                     <th>Differently Abled</th>
                     <th>Support</th>
                     <th>Support Description</th>
                 </tr>
                 @foreach ($programDetails->livelihoods as $livelihood)
                     <tr>
                         <td>{{ $yesNoOptions[$livelihood->differently_abled] ?? ucfirst($livelihood->differently_abled) }}
                         </td>
                         <td>{{ $supportOptions[$livelihood->support] ?? ucfirst(str_replace('_', ' ', $livelihood->support)) }}
                         </td>
                         <td>{{ $livelihood->support_description }}</td>
                     </tr>
                 @endforeach
             </tbody>

             <tbody id="communityCapacity" style="display: none;">
                 @foreach ($programDetails->communities as $community)
                     <tr>
                         <th>Differently Abled</th>
                         <th>Area</th>
                         <th>Project</th>
                     </tr>
                     <tr>
                         <td>{{ $yesNoOptions[$community->differently_abled] ?? ucfirst($community->differently_abled) }}
                         </td>
                         <td>{{ $areaOptions[$community->area] ?? ucfirst(str_replace('_', ' ', $community->area)) }}
                         </td>
                         <td>{{ $project[$community->project] ?? ucfirst(str_replace('_', ' ', $community->project)) }}
                         </td>
                     </tr>
                     <tr>
                         <th>NGO/SHG/Cooperative/FPO/Other</th>
                         <th>Organisation Representative Name</th>
                         <th>Type of Organisation</th>
                     </tr>
                     <tr>
                         <td>{{ $community->ngo_shg_cooperative_fpo_other }}</td>
                         <td>{{ $community->org_representative_name }}</td>
                         <td>{{ $organisation_type[$community->org_type] ?? ucfirst(str_replace('_', ' ', $community->org_type)) }}
                         </td>
                     </tr>
                     <tr>
                         <th>Working Period</th>
                         <th>Number Of Members</th>
                         <th>Organisation Focused Working Area</th>
                     </tr>
                     <tr>
                         <td>{{ $working_period[$community->working_period] ?? ucfirst($community->working_period) }}
                         </td>
                         <td>{{ $members[$community->no_of_members] ?? ucfirst(str_replace('_', ' ', $community->no_of_members)) }}
                         </td>
                         <td>{{ $org_focus_working_area[$community->org_focused_working_area] ?? ucfirst($community->org_focused_working_area) }}
                         </td>
                     </tr>
                     <tr>
                         <th>Organisational Support</th>
                         <th>Support</th>
                         <th>Describe Support</th>

                     </tr>
                     <tr>
                         <td>{{ $org_support[$community->support] ?? ucfirst(str_replace('_', ' ', $community->support)) }}
                         </td>
                         <td>{{ $communitySupport[$community->community_support] ?? ucfirst(str_replace('_', ' ', $community->community_support)) }}
                         </td>
                         <td>{{ $community->support_description }}</td>
                     </tr>
                 @endforeach
             </tbody>

             <tbody id="digitalLiteracy" style="display: none;">
                 <tr>
                     <th>Differently Abled</th>
                     <th>Area</th>
                     <th>Type Of Sessions We Conduct</th>
                 </tr>
                 @foreach ($programDetails->digitalLiteracies as $digital)
                     <tr>
                         <td>{{ $yesNoOptions[$digital->differently_abled] ?? ucfirst($digital->differently_abled) }}
                         </td>
                         <td>{{ $areaOptions[$digital->area] ?? ucfirst(str_replace('_', ' ', $digital->area)) }}</td>
                         <td>{{ $sessionsWeCOnduct[$digital->type_of_sessions] ?? ucfirst(str_replace('_', ' ', $digital->type_of_sessions)) }}
                         </td>
                     </tr>
                 @endforeach
             </tbody>

         </table>
         <input type="hidden" id="prog_type" value="{{ $programDetails->program_type }}">
     </div>
 </div>

 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const programType = document.getElementById("prog_type").value;

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
             if (sections[programType]) {
                 sections[programType].style.display = "table-row-group"; // works for <tbody>
             }
         }

         hideAllSections();
         showSelectedSection();
     });
 </script>
