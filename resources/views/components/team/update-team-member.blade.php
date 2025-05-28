@extends('layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    @include('components.breadcrumb')
    <div class="employee-registration-container">
        <h1 class="employee-registration-title">Update Team Member Details</h1>
        <form class="employee-form">
            <div class="employee-form-grid">
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Type of Employment
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="">Permanent</option>
                        <option value="">Project Based</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Type of Position
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="employee">Employee</option>
                        <option value="volunteer">Volunteer</option>
                        <option value="intern">Intern</option>
                    </select>
                </div>
                <div class="employee-form-group">

                    <label for="name" class="employee-label">Full Name
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="name" name="name" placeholder="Enter full name" class="employee-input"
                        required>
                </div>
                <div class="employee-form-group">
                    <label for="father_name" class="employee-label">Father's Name
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="father_name" name="father_name" class="employee-input"
                        placeholder="Enter father's name" required>
                </div>
                <div class="employee-form-group">
                    <label for="mother_name" class="employee-label">Mother's Name
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="mother_name" name="mother_name" class="employee-input"
                        placeholder="Enter mother name" required>
                </div>
                <div class="employee-form-group">
                    <label for="email" class="employee-label">Email ID
                        <span class="validate-required">*</span>
                    </label>
                    <input type="email" id="email" name="email" class="employee-input" placeholder="Enter email"
                        required>
                </div>
                <div class="employee-form-group">
                    <label for="phone" class="employee-label">Phone Number
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="phone" name="phone" class="employee-input"
                        placeholder="Enter phone number" required>
                </div>

                <div class="employee-form-group">
                    <label for="dob" class="employee-label">Date of Birth
                        <span class="validate-required">*</span>
                    </label>
                    <input type="date" id="dob" name="dob" class="employee-input" required>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Gender
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="qualification" class="employee-label">Qualification
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="qualification" name="qualification" placeholder="Enter Qualification"
                        class="employee-input" required>
                </div>
                <div class="employee-form-group">
                    <label for="qualification" class="employee-label">College/University
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" id="college_university" placeholder="Enter collge/university"
                        name="college_university" class="employee-input" required>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Experience
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="">Select Experience</option>
                        <option value="fresher">Fresher</option>
                        <option value="6month">6 Month</option>
                        <option value="1year">1 Year</option>
                        <option value="2year">2 Year</option>
                        <option value="3year">3 Year +</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Marital Status
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="">Select Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorce">Divource</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">Emergency Contact Number
                        <span class="validate-required">*</span>
                    </label>
                    <input type="text" class="employee-input" placeholder="Emergency contact number" required>
                </div>
                <div class="employee-form-group">
                    <label for="dob" class="employee-label">Date of Joining
                        <span class="validate-required">*</span>
                    </label>
                    <input type="date" class="employee-input" required>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label">Designation
                        <span class="validate-required">*</span>
                    </label>
                    <select id="" name="" class="employee-input" required>
                        <option value="">Select Designation</option>
                        <option value="">Accountant</option>
                        <option value="">HR</option>
                        <option value="">Developer</option>
                        <option value="">Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="department" class="employee-label">Department
                        <span class="validate-required">*</span>
                    </label>
                    <select id="" name="" class="employee-input" required>
                        <option value="">Select Department</option>
                        <option value="">Hr Department </option>
                        <option value="">Finance Department</option>
                        <option value="">Other</option>
                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="gender" class="employee-label">Payment Type
                        <span class="validate-required">*</span>
                    </label>
                    <select id="gender" name="gender" class="employee-input" required>
                        <option value="">Select Payment Type</option>
                        <option value="salary">Salary</option>
                        <option value="stipend">Stipend</option>
                        <option value="honorarium">Honorarium</option>

                    </select>
                </div>
                <div class="employee-form-group">
                    <label for="" class="employee-label"> Amount
                        <span class="validate-required">*</span>
                    </label>
                    <input type="number" id="" name="" class="employee-input"
                        placeholder="Enter amount" required>
                </div>
            </div>
            <div class="upload-photo-section">


                <!-- Repeat similar structure for Photo, Aadhaar, PAN, Marksheet -->

                <div class="upload-container">
                    <label for="photoUpload" class="upload-label">Photo <span class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="photoUploadBox">
                        <input type="file" id="photoUpload" name="photoUpload" class="upload-input"
                            accept="image/*,application/pdf">
                        <span class="upload_icon" id="photoIcon">+</span>
                        <span class="upload_text" id="photoText">Upload</span>
                        <img id="photoPreviewImage" class="upload-preview">
                        <div class="action-icon">
                            <div class="view-icon " id="photoView">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <div class="delete-icon" id="photoDelete">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>

                        </div>
                        <div id="photoPdfPreview" class="pdf-preview">
                            <span>PDF</span>
                        </div>
                    </div>
                </div>
                <!-- Example for Resume Upload (others follow same pattern) -->
                <div class="upload-container">
                    <label for="resumeUpload" class="upload-label">CV/Resume</label>
                    <div class="upload-box upload-hover" id="resumeUploadBox">
                        <input type="file" id="resumeUpload" name="resumeUpload" class="upload-input"
                            accept="image/*,application/pdf">
                        <span class="upload_icon" id="resumeIcon">+</span>
                        <span class="upload_text" id="resumeText">Upload</span>
                        <img id="resumePreviewImage" class="upload-preview">
                        <div class="action-icon">
                            <div class="view-icon " id="photoView">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <div class="delete-icon" id="photoDelete">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>

                        </div>
                        <div id="resumePdfPreview" class="pdf-preview">
                            <span>PDF</span>
                        </div>
                    </div>
                </div>
                <!-- Aadhaar -->
                <div class="upload-container">
                    <label for="adharUpload" class="upload-label">Aadhar <span class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="adharUploadBox">
                        <input type="file" id="adharUpload" name="adharUpload" class="upload-input"
                            accept="image/*,application/pdf">
                        <span class="upload_icon" id="adharIcon">+</span>
                        <span class="upload_text" id="adharText">Upload</span>
                        <img id="adharPreviewImage" class="upload-preview">
                        <div class="action-icon">
                            <div class="view-icon " id="photoView">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <div class="delete-icon" id="photoDelete">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>

                        </div>
                        <div id="adharPdfPreview" class="pdf-preview">
                            <span>PDF</span>
                        </div>
                    </div>
                </div>

                <!-- PAN -->
                <div class="upload-container">
                    <label for="panUpload" class="upload-label">PAN Card <span class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="panUploadBox">
                        <input type="file" id="panUpload" name="panUpload" class="upload-input"
                            accept="image/*,application/pdf">
                        <span class="upload_icon" id="panIcon">+</span>
                        <span class="upload_text" id="panText">Upload</span>
                        <img id="panPreviewImage" class="upload-preview">
                        <div class="action-icon">
                            <div class="view-icon " id="photoView">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <div class="delete-icon" id="photoDelete">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>

                        </div>
                        <div id="panPdfPreview" class="pdf-preview">
                            <span>PDF</span>
                        </div>
                    </div>
                </div>

                <!-- Marksheet -->
                <div class="upload-container">
                    <label for="marksheetUpload" class="upload-label">Marksheet <span
                            class="validate-required">*</span></label>
                    <div class="upload-box upload-hover" id="marksheetUploadBox">
                        <input type="file" id="marksheetUpload" name="marksheetUpload" class="upload-input"
                            accept="image/*,application/pdf">
                        <span class="upload_icon" id="marksheetIcon">+</span>
                        <span class="upload_text" id="marksheetText">Upload</span>
                        <img id="marksheetPreviewImage" class="upload-preview">
                        <div class="action-icon">
                            <div class="view-icon " id="photoView">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <div class="delete-icon" id="photoDelete">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>

                        </div>
                        <div id="marksheetPdfPreview" class="pdf-preview">
                            <span>PDF</span>
                        </div>
                    </div>
                </div>
                <div class="upload-container pt-5">
                    <small class="hint">
                        Allowed formats: PNG, JPG, <br> JPEG, PDF. Max size: 40KB.
                    </small>
                </div>
            </div>
            <div class="employee-form-optional-message">
                <div class="employee-form-group address-section">
                    <label for="address" class="employee-label">Address</label>
                    <textarea name="address" id="address" cols="30" rows="3"></textarea>
                </div>
                <div class="employee-form-group address-section">
                    <label for="address" class="employee-label">Message (optional)</label>
                    <textarea name="address" id="address" cols="30" rows="3"></textarea>
                </div>
            </div>

            <div class="employee-form-group employee-submit">
                <button type="submit" class="employee-submit-btn">Register</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('asset/js/employee-registration.js') }}"></script>
@endsection
