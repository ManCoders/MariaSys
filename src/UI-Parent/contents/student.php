<section class="p-2">
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class=""><i class="fa fa-folder-open text-primary me-2"></i>Learner Registration</h4>
                <span>Manage and process student registration application</span>
            </div>
            <select id="statusFilter" class="form-select w-25">
                <option value="">Select Category</option>
                <option value="Pending">Pending</option>
                <option value="Validated">Validated</option>
                <option value="Rejected">Rejected</option>
            </select>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Learner
            </button>
        </div>
        <table class="table table-bordered table-hover mb-0" id="student-tbl-1">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Learner Name</th>
                    <th>Student LRN</th>
                    <th>Date Submitted</th>
                    <th>Parent Contact</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="status-Pending">
                    <th>1</th>
                    <th>PAGOTAISIDRO, MARCO JEAN F,</th>
                    <th>1118374859</th>
                    <th>12/23/2025</th>
                    <th>09358374977</th>
                    <th>Pending</th>
                    <th>
                        <button class="btn btn-sm" id="viewStudent">View</button>
                    </th>
                </tr>
                <tr class="status-Validated">
                    <th>2</th>
                    <th>PAGOTAISIDRO, MARCO JEAN F,</th>
                    <th>1118374859</th>
                    <th>12/23/2025</th>
                    <th>09358374977</th>
                    <th>Validated</th>
                    <th>
                        <button class="btn btn-sm" id="viewStudentValidated">View</button>
                    </th>
                </tr>
                <tr class="status-Rejected">
                    <th>3</th>
                    <th>PAGOTAISIDRO, MARCO JEAN F,</th>
                    <th>1118374859</th>
                    <th>12/23/2025</th>
                    <th>09358374977</th>
                    <th>Rejected</th>
                    <th>
                        <button class="btn btn-sm" id="viewStudentRejected">View</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>

    <style>
        .modal-lg {
            max-width: 1200px;
            width: 90%;
        }

        .name-cell {
            max-width: 150px;
            /* adjust width as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <!-- LEARNERS MANAGEMENT PENDING -->
    <div class="modal fade" id="learnersModal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-secondary" style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">STUDENT INFORMATIONS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body col-md-12 col-12 d-flex flex-wrap">
                        <div class="col-md-4 col-12 d-flex flex-column border align-items-center justify-content-center">
                            <img src="../../assets/image/users.png" alt="" style="width: 100px; height: 100px; border-radius: 50%;">
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">LRN: </label>
                                <span>11193849573</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Status: </label>
                                <span style="font-size: 12px !important;">PENDING</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 d-flex flex-column align-items-start justify-content-start ps-1">
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Name: </label>
                                <span class="ms-2">PAGOTAISIDRO, MARCO JEAN F.</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Grade: </label>
                                <span class="ms-2">6</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Section: </label>
                                <span class="ms-1">Venus</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Parent Contact: </label>
                                <span class="ms-1">09847384762</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="Button" id="viewForm">
                            Form
                        </button>
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fa fa-save me-1"></i>Validate Learner
                        </button>
                        <button class="btn btn-danger text-white" type="submit">
                            Reject
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- LEARNERS MANAGEMENT VALIDATED -->
    <div class="modal fade" id="learnersModalValidated" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success" style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">STUDENT INFORMATIONS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body col-md-12 col-12 d-flex flex-wrap">
                        <div class="col-md-4 col-12 d-flex flex-column border align-items-center justify-content-center">
                            <img src="../../assets/image/users.png" alt="" style="width: 100px; height: 100px; border-radius: 50%;">
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">LRN: </label>
                                <span>11193849573</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Status: </label>
                                <span style="font-size: 12px !important;">PENDING</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 d-flex flex-column align-items-start justify-content-start ps-1">
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Name: </label>
                                <span class="ms-2">PAGOTAISIDRO, MARCO JEAN F.</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Grade: </label>
                                <span class="ms-2">6</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Section: </label>
                                <span class="ms-1">Venus</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Parent Contact: </label>
                                <span class="ms-1">09847384762</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="Button" id="viewBtnLearners">
                            Profile
                        </button>
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fa fa-save me-1"></i>Validate
                        </button>
                        <button class="btn btn-danger text-white" type="submit">
                            Reject
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- LEARNERS MANAGEMENT REJECTED -->
    <div class="modal fade" id="learnersModalRejected" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-danger" style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">STUDENT INFORMATIONS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body col-md-12 col-12 d-flex flex-wrap">
                        <div class="col-md-4 col-12 d-flex flex-column border align-items-center justify-content-center">
                            <img src="../../assets/image/users.png" alt="" style="width: 100px; height: 100px; border-radius: 50%;">
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">LRN: </label>
                                <span>11193849573</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Status: </label>
                                <span style="font-size: 12px !important;">PENDING</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 d-flex flex-column align-items-start justify-content-start ps-1">
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Name: </label>
                                <span class="ms-2">PAGOTAISIDRO, MARCO JEAN F.</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Grade: </label>
                                <span class="ms-2">6</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Section: </label>
                                <span class="ms-1">Venus</span>
                            </div>
                            <div class="d-flex">
                                <label class="d-flex align-items-center m-0 p-0">Parent Contact: </label>
                                <span class="ms-1">09847384762</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="Button" id="viewBtnLearners">
                            Profile
                        </button>
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fa fa-save me-1"></i>Validate
                        </button>
                        <button class="btn btn-danger text-white" type="submit">
                            Delete
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="childModal" tabindex="-1">
        <div class="modal-dialog  modal-lg ">
            <div class="modal-content ">
            
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="child_id" id="childId">
                        <input type="hidden" name="status" value="Pending">
                        <input type="hidden" name="parent_id" id="parentId" value="1">
                        <div class="row text-center d-flex justify-content-center">
                            <p id="learnerlabel">LEARNER's PERSONAL INFORMATION</p>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Learner Reference No (LRN): *</label>
                                <input type="text" class="form-control" name="lrn" id="studentLRN" required
                                    placeholder="Enter 12-digit LRN">
                                <small class="text-muted">The official Learner Reference Number assigned to your
                                    child</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Grade level to Enroll *</label>
                                <select class="form-control" name="grade_level_id" id="grade_level" required>
                                    <option value="">Select Grade level</option>
                                    <option value="1">Grade 1</option>
                                    <option value="2">Grade 2</option>
                                    <option value="3">Grade 3</option>
                                    <option value="4">Grade 4</option>
                                    <option value="5">Grade 5</option>
                                    <option value="6">Grade 6</option>
                                    <option value="1">Kinder Garden 1</option>
                                    <option value="2">Kinder Garden 2</option>
                                </select>
                                <small class="text-muted">Select Incoming school grade</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">School Year</label>
                                <select class="form-control" name="school_year_id" id="school_year_id" required>
                                    <option value="">Select School Year</option>
                                    <option value="2024-2025" selected>2024-2025</option>
                                </select>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Family Name *</label>
                                <input type="text" class="form-control" name="family_name" id="familyName" required
                                    placeholder="Enter Family Name">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Given Name *</label>
                                <input type="text" class="form-control" name="given_name" id="givenName" required
                                    placeholder="Enter Given Name">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" name="middle_name" id="middleName" required
                                    placeholder="Enter Middle Name">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control" name="suffix" id="suffix"
                                    placeholder="e.g. Jr., Sr., III">
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Date of Birth *</label>
                                <input type="date" class="form-control" name="birthdate" id="childBirthdate" required>
                            </div>

                            <div class="col-md-3 mb-1">
                                <label class="form-label">Place of Birth*</label>
                                <input type="text" class="form-control" name="birth_place" id="birth_place"
                                    placeholder="Enter Place of Birth">
                            </div>
                            <div class="col-md-2 mb-1">
                                <label class="form-label">Gender*</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-1">
                                <label class="form-label">Mother Tongue*</label>
                                <select class="form-control" name="tongue" id="tongue" required>
                                    <option value="">Select Tongue</option>
                                    <option value="English">English</option>
                                    <option value="Bisaya">Bisaya</option>
                                    <option value="Chavacano">Chavacano</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Tagalog">Tagalog</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-1">
                                <label class="form-label">Religious *</label>
                                <select class="form-control" name="religious" id="religious" required>
                                    <option value="">Select Religion</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Islam (Muslim)">Islam (Muslim)</option>
                                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                    <option value="Evangelical Christianity">Evangelical Christianity</option>
                                    <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                                    <option value="Jehovah’s Witnesses">Jehovah’s Witnesses</option>
                                    <option value="Born Again Christian">Born Again Christian</option>
                                    <option value="Buddhism">Buddhism</option>
                                </select>

                            </div>
                            <div class="row text-center d-flex justify-content-between">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Additional Notes</label>
                                    <textarea class="form-control" name="notes" id="notes" rows="8"
                                        placeholder="Any special instructions or information..."></textarea>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="mt-2">
                                        <img id="profilePreview" src="../assets/image/users.png" alt="Profile Preview"
                                            class="img-thumbnail" width="200">
                                    </div>
                                    <input type="file" class="form-control" id="profilePicInput" required
                                        name="profile_picture" accept="image/*">
                                    <small class="text-muted">Upload a clear image (JPG, PNG)</small>

                                </div>


                            </div>

                            <div class="alert alert-light"
                                style="border: 1px solid #d1ecf1; background-color: #e8f4fd; color: #0c5460;">
                                <i class="fa fa-info-circle me-2"></i>
                                <strong>Note:</strong> Your enrollment request will be verified by the school
                                administration. You will receive a notification once the verification is complete.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success text-white" type="submit">
                                <i class="fa fa-save me-1"></i>Submit Request
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                </form>

            </div>
        </div>
    </div>

    <!-- form modal wtf ang dami tang ina -->
     


</section>
<script>
       $(document).ready(function () { 
            // Show modal when View button is clicked
            $('#viewStudent').click(function () {
                $('#learnersModal').modal('show');
            });
            $('#viewStudentValidated').click(function () {
                $('#learnersModalValidated').modal('show');
            });
            $('#viewStudentRejected').click(function () {
                $('#learnersModalRejected').modal('show');
            });
            $('#viewBtnLearners').off('click').on('click', function () {
                const id = $(this).data('id'); 
                sessionStorage.setItem('learners_id', id); 
                location.href = 'index.php?page=contents/users/view_learners'; 
            });
            $('#viewForm').off('click').on('click', function () {
                const id = $(this).data('id'); 
                sessionStorage.setItem('learners_id', id); 
                location.href = 'index.php?page=contents/users/form'; 
            });
        });


    const statusFilter = document.getElementById('statusFilter');
    const tableRows = document.querySelectorAll('#student-tbl-1 tbody tr');
    function filterTable() {
        const selectedStatus = statusFilter.value;
        
        tableRows.forEach(row => {
            const rowStatus = row.classList[0].replace('status-', '');
            
            if (selectedStatus === '' || selectedStatus === rowStatus) {
                row.style.display = ''; 
            } else {
                row.style.display = 'none'; 
            }
        });
    }
    statusFilter.addEventListener('change', filterTable);
</script>
