@extends('layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    @include('components.breadcrumb')
    <div class="employee-registration-container">
        <h1 class="employee-registration-title">Update Team Member Details</h1>
        <form class="employee-form" action="{{ url('/hr-department/team/update-team-member-registration', $teams->id) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="employee-form-grid">
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Type of Employment
                        <span class="validate-required">*</span>
                    </label>
                    <select id="employment_type" name="employment_type" class="employee-input" required>
                        <option value="">Select Employment Type</option>
                        <option value="permanent" {{ $teams->employment_type == 'permanent' ? 'selected' : '' }}>Permanent
                        </option>
                        <option value="project_based" {{ $teams->employment_type == 'project_based' ? 'selected' : '' }}>
                            Project Based</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Type of Position
                        <span class="validate-required">*</span>
                    </label>
                    <select id="position_type" name="position_type" class="employee-input" required>
                        <option value="">Select Position</option>
                        <option value="employee" {{ $teams->position_type == 'employee' ? 'selected' : '' }}>Employee
                        </option>
                        <option value="volunteer" {{ $teams->position_type == 'volunteer' ? 'selected' : '' }}>Volunteer
                        </option>
                        <option value="intern" {{ $teams->position_type == 'intern' ? 'selected' : '' }}>Intern</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="name" class="employee-label">Full Name
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="name" name="name" placeholder="Enter full name" class="employee-input"
                        value="{{ $teams->full_name }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="father_name" class="employee-label">Father's Name
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="father_name" name="father_name" class="employee-input"
                        placeholder="Enter father's name" value="{{ $teams->fathers_name }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="mother_name" class="employee-label">Mother's Name
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="mother_name" name="mother_name" class="employee-input"
                        placeholder="Enter mother name" value="{{ $teams->mothers_name }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="email" class="employee-label">Email ID
                        <span class="validate-required">*</span>
                    </label>
                    <input type="email" id="email" name="email" class="employee-input" placeholder="Enter email"
                        value="{{ $teams->email }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="phone" class="employee-label">Phone Number
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="phone_number" name="phone_number" class="employee-input"
                        placeholder="Enter phone number" value="{{ $teams->phone_number }}" required>
                </div>

                <div class="employee-form-group">
                    <label for="dob" class="employee-label">Date of Birth
                        <span class="validate-required">*</span>
                    </label>
                    <input type="date" id="dob" name="dob" class="employee-input"
                        value="{{ \Carbon\Carbon::parse($teams->dob)->format('Y-m-d') }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Gender
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="">Select Gender</option>
                        <option value="male" {{ $teams->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $teams->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $teams->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="qualification" class="employee-label">Qualification
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="qualification" name="qualification" placeholder="Enter Qualification"
                        class="employee-input" value="{{ $teams->qualification }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="qualification" class="employee-label">College/University
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="college_university" placeholder="Enter college/university"
                        name="college_university" class="employee-input" value="{{ $teams['college/university'] }}"
                        required>
                </div>
                <div class="employee-form-group">
                    <label for="experience" class="employee-label">Experience
                        <span class="validate-required">*</span>
                    </label>
                    <select id="experience" name="experience" class="employee-input" required>
                        <option value="">Select Experience</option>
                        <option value="fresher" {{ $teams->experience == 'fresher' ? 'selected' : '' }}>Fresher</option>
                        <option value="6month" {{ $teams->experience == '6month' ? 'selected' : '' }}>6 Month</option>
                        <option value="1year" {{ $teams->experience == '1year' ? 'selected' : '' }}>1 Year</option>
                        <option value="2year" {{ $teams->experience == '2year' ? 'selected' : '' }}>2 Year</option>
                        <option value="3year" {{ $teams->experience == '3year' ? 'selected' : '' }}>3 Year +</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="marital_status" class="employee-label">Marital Status
                        <span class="validate-required">*</span>
                    </label>
                    <select id="marital_status" name="marital_status" class="employee-input" required>
                        <option value="">Select Marital Status</option>
                        <option value="single" {{ $teams->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                        <option value="married" {{ $teams->marital_status == 'married' ? 'selected' : '' }}>Married
                        </option>
                        <option value="divorce" {{ $teams->marital_status == 'divorce' ? 'selected' : '' }}>Divource
                        </option>
                        <option value="other" {{ $teams->marital_status == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">Emergency Contact Number
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="emergency_contact" name="emergency_contact" class="employee-input"
                        placeholder="Emergency contact number" value="{{ $teams->emergency_contact_number }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="dob" class="employee-label">Date of Joining
                        <span class="validate-required">*</span>
                    </label>
                    <input type="date" class="employee-input" id="doj" name="doj"
                        value="{{ \Carbon\Carbon::parse($teams->date_of_joining)->format('Y-m-d') }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">Designation
                        <span class="validate-required">*</span>
                    </label>
                    <select id="designation" name="designation" class="employee-input" required>
                        <option value="">Select Designation</option>
                        <option value="Accountat" {{ $teams->designation == 'Accountat' ? 'selected' : '' }}>Accountant
                        </option>
                        <option value="HR" {{ $teams->designation == 'HR' ? 'selected' : '' }}>HR</option>
                        <option value="Developer" {{ $teams->designation == 'Developer' ? 'selected' : '' }}>Developer
                        </option>
                        <option value="Other" {{ $teams->designation == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="department" class="employee-label">Department
                        <span class="validate-required">*</span>
                    </label>
                    <select id="department" name="department" class="employee-input" required>
                        <option value="">Select Department</option>
                        <option value="hr_department" {{ $teams->department == 'hr_department' ? 'selected' : '' }}>Hr
                            Department </option>
                        <option value="finance_department"
                            {{ $teams->department == 'finance_department' ? 'selected' : '' }}>Finance Department</option>
                        <option value="other" {{ $teams->department == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="payment_type" class="employee-label">Payment Type
                        <span class="validate-required">*</span>
                    </label>
                    <select id="payment_type" name="payment_type" class="employee-input" required>
                        <option value="">Select Payment Type</option>
                        <option value="salary" {{ $teams->payment_type == 'salary' ? 'selected' : '' }}>Salary</option>
                        <option value="stipend" {{ $teams->payment_type == 'stipend' ? 'selected' : '' }}>Stipend</option>
                        <option value="honorarium" {{ $teams->payment_type == 'honorarium' ? 'selected' : '' }}>Honorarium
                        </option>

                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">Basic Amount
                        <span class="validate-required">*</span>
                    </label>
                    <input type="number" id="basic_amt" name="basic_amt" class="employee-input"
                        placeholder="Enter basic amount" value="{{ $teams->basic_amount }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">CTC Amount
                        <span class="validate-required">*</span>
                    </label>
                    <input type="number" id="ctc" name="ctc" class="employee-input"
                        placeholder="Enter ctc amount" value="{{ $teams->ctc_amount }}" required>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">EPF
                        <span class="validate-required">*</span>
                    </label>
                    <input type="number" id="epf" name="epf" value="{{ $teams->epf }}"
                        class="employee-input" placeholder="Enter epf" required>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">ESIC
                        <span class="validate-required">*</span>
                    </label>
                    <input type="number" id="esic" name="esic" class="employee-input"
                        value="{{ $teams->esic }}" placeholder="Enter esic" required>
                </div>
            </div>

            @php
                use Illuminate\Support\Str;

                $photoUrl = $teams->photo ? asset('storage/' . $teams->photo) : null;
                $resumeUrl = $teams->cv_resume ? asset('storage/' . $teams->cv_resume) : null;
                $adharUrl = $teams->aadhar_card ? asset('storage/' . $teams->aadhar_card) : null;
                $panUrl = $teams->pan_card ? asset('storage/' . $teams->pan_card) : null;
                $marksheetUrl = $teams->marksheet ? asset('storage/' . $teams->marksheet) : null;
            @endphp

            <div class="upload-photo-section">

                <!-- Photo Upload -->
                <div class="upload-container">
                    <label for="photoUpload" class="upload-label">Photo <span class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="photoUploadBox">
                        <input type="file" id="photoUpload" name="photoUpload" class="upload-input"
                            accept="image/*,application/pdf">

                        <span class="upload_icon" id="photoIcon" style="{{ $photoUrl ? 'display:none;' : '' }}">+</span>
                        <span class="upload_text" id="photoText"
                            style="{{ $photoUrl ? 'display:none;' : '' }}">Upload</span>

                        @if ($photoUrl)
                            @if (Str::endsWith($photoUrl, ['.pdf']))
                                <div id="photoPdfPreview" class="pdf-preview"><span>PDF</span></div>
                            @else
                                <img id="photoPreviewImage" class="upload-preview" src="{{ $photoUrl }}"
                                    alt="Photo Preview">
                            @endif
                            <div class="action-icon">
                                <div class="view-icon" id="photoView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="photoDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                        @else
                            <img id="photoPreviewImage" class="upload-preview" style="display:none;">
                            <div class="action-icon" style="display:none;">
                                <div class="view-icon" id="photoView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="photoDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                            <div id="photoPdfPreview" class="pdf-preview" style="display:none;"><span>PDF</span></div>
                        @endif
                    </div>
                </div>

                <!-- Resume Upload -->
                <div class="upload-container">
                    <label for="resumeUpload" class="upload-label">CV/Resume</label>
                    <div class="upload-box upload-hover" id="resumeUploadBox">
                        <input type="file" id="resumeUpload" name="resumeUpload" class="upload-input"
                            accept="image/*,application/pdf">

                        <span class="upload_icon" id="resumeIcon"
                            style="{{ $resumeUrl ? 'display:none;' : '' }}">+</span>
                        <span class="upload_text" id="resumeText"
                            style="{{ $resumeUrl ? 'display:none;' : '' }}">Upload</span>

                        @if ($resumeUrl)
                            @if (Str::endsWith($resumeUrl, ['.pdf']))
                                <div id="resumePdfPreview" class="pdf-preview"><span>PDF</span></div>
                            @else
                                <img id="resumePreviewImage" class="upload-preview" src="{{ $resumeUrl }}"
                                    alt="Resume Preview">
                            @endif
                            <div class="action-icon">
                                <div class="view-icon" id="resumeView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="resumeDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                        @else
                            <img id="resumePreviewImage" class="upload-preview" style="display:none;">
                            <div class="action-icon" style="display:none;">
                                <div class="view-icon" id="resumeView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="resumeDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                            <div id="resumePdfPreview" class="pdf-preview" style="display:none;"><span>PDF</span></div>
                        @endif
                    </div>
                </div>

                <!-- Aadhaar Upload -->
                <div class="upload-container">
                    <label for="adharUpload" class="upload-label">Aadhar <span class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="adharUploadBox">
                        <input type="file" id="adharUpload" name="adharUpload" class="upload-input"
                            accept="image/*,application/pdf">

                        <span class="upload_icon" id="adharIcon" style="{{ $adharUrl ? 'display:none;' : '' }}">+</span>
                        <span class="upload_text" id="adharText"
                            style="{{ $adharUrl ? 'display:none;' : '' }}">Upload</span>

                        @if ($adharUrl)
                            @if (Str::endsWith($adharUrl, ['.pdf']))
                                <div id="adharPdfPreview" class="pdf-preview"><span>PDF</span></div>
                            @else
                                <img id="adharPreviewImage" class="upload-preview" src="{{ $adharUrl }}"
                                    alt="Aadhar Preview">
                            @endif
                            <div class="action-icon">
                                <div class="view-icon" id="adharView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="adharDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                        @else
                            <img id="adharPreviewImage" class="upload-preview" style="display:none;">
                            <div class="action-icon" style="display:none;">
                                <div class="view-icon" id="adharView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="adharDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                            <div id="adharPdfPreview" class="pdf-preview" style="display:none;"><span>PDF</span></div>
                        @endif
                    </div>
                </div>

                <!-- PAN Upload -->
                <div class="upload-container">
                    <label for="panUpload" class="upload-label">PAN Card <span class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="panUploadBox">
                        <input type="file" id="panUpload" name="panUpload" class="upload-input"
                            accept="image/*,application/pdf">

                        <span class="upload_icon" id="panIcon" style="{{ $panUrl ? 'display:none;' : '' }}">+</span>
                        <span class="upload_text" id="panText"
                            style="{{ $panUrl ? 'display:none;' : '' }}">Upload</span>

                        @if ($panUrl)
                            @if (Str::endsWith($panUrl, ['.pdf']))
                                <div id="panPdfPreview" class="pdf-preview"><span>PDF</span></div>
                            @else
                                <img id="panPreviewImage" class="upload-preview" src="{{ $panUrl }}"
                                    alt="PAN Preview">
                            @endif
                            <div class="action-icon">
                                <div class="view-icon" id="panView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="panDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                        @else
                            <img id="panPreviewImage" class="upload-preview" style="display:none;">
                            <div class="action-icon" style="display:none;">
                                <div class="view-icon" id="panView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="panDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                            <div id="panPdfPreview" class="pdf-preview" style="display:none;"><span>PDF</span></div>
                        @endif
                    </div>
                </div>

                <!-- Marksheet Upload -->
                <div class="upload-container">
                    <label for="marksheetUpload" class="upload-label">Marksheet <span
                            class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="marksheetUploadBox">
                        <input type="file" id="marksheetUpload" name="marksheetUpload" class="upload-input"
                            accept="image/*,application/pdf">

                        <span class="upload_icon" id="marksheetIcon"
                            style="{{ $marksheetUrl ? 'display:none;' : '' }}">+</span>
                        <span class="upload_text" id="marksheetText"
                            style="{{ $marksheetUrl ? 'display:none;' : '' }}">Upload</span>

                        @if ($marksheetUrl)
                            @if (Str::endsWith($marksheetUrl, ['.pdf']))
                                <div id="marksheetPdfPreview" class="pdf-preview"><span>PDF</span></div>
                            @else
                                <img id="marksheetPreviewImage" class="upload-preview" src="{{ $marksheetUrl }}"
                                    alt="Marksheet Preview">
                            @endif
                            <div class="action-icon">
                                <div class="view-icon" id="marksheetView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="marksheetDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                        @else
                            <img id="marksheetPreviewImage" class="upload-preview" style="display:none;">
                            <div class="action-icon" style="display:none;">
                                <div class="view-icon" id="marksheetView"><i class="fa-regular fa-eye"></i></div>
                                <div class="delete-icon" id="marksheetDelete"><i class="fa-solid fa-trash-can"></i></div>
                            </div>
                            <div id="marksheetPdfPreview" class="pdf-preview" style="display:none;"><span>PDF</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="upload-container pt-5">
                    <small class="hint">Allowed formats: PNG, JPG, <br> JPEG, PDF. Max size: 40KB.</small>
                </div>

            </div>


            <div class="employee-form-optional-message">
                <div class="employee-form-group address-section">
                    <label for="address" class="employee-label">Address</label>
                    <textarea name="address" id="address" cols="30" rows="3">{{ $teams->address }}</textarea>
                </div>
                <div class="employee-form-group address-section">
                    <label for="message" class="employee-label">Message (optional)</label>
                    <textarea name="message" id="message" cols="30" rows="3">{{ $teams->message }}</textarea>
                </div>
            </div>

            <div class="employee-form-group employee-submit">
                <button type="submit" class="employee-submit-btn">Update</button>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <div id="imageModal" class="modal">
        <span class="close" id="modalClose"><i class="fa-solid fa-xmark"></i></span>
        <img class="modal-content" id="modalImage">
    </div>

    <script src="{{ asset('asset/js/team-member-update.js') }}"></script>

@endsection
