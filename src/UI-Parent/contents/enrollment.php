<style>
    .stats-card {
        background: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    .stats-card i {
        font-size: 24px;
        margin-bottom: 10px;
        color: #666;
    }

    .stats-card h5 {
        margin: 5px 0;
        color: #333;
    }

    .stats-card small {
        color: #777;
    }

    .status-badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-approved {
        background-color: #e8f5e8;
        color: #2d5a2d;
        border: 1px solid #c3e6c3;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffda6a;
    }

    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .btn-action {
        padding: 4px 8px;
        margin: 0 2px;
        border-radius: 4px;
        border: 1px solid #ddd;
        background: white;
        color: #666;
        transition: 0.2s;
    }

    .btn-action:hover {
        background-color: #f8f9fa;
        border-color: #adb5bd;
    }

    .btn-action.view {
        border-color: #b3d7ff;
        color: #0056b3;
    }

    .btn-action.edit {
        border-color: #ffda6a;
        color: #664d03;
    }

    .btn-action.delete {
        border-color: #f5c6cb;
        color: #721c24;
    }

    .modal-lg {
        max-width: 1200px;
        width: 90%;
    }
</style>

<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h4 class="mb-0"><i class="fa fa-user-plus text-primary me-2"></i>Child Enrollment</h4>
                <small class="text-muted">Register and link your child to your parent account</small>
            </div>
            <button class="btn btn-success btn-sm" id="addChildBtn">
                <i class="fa fa-plus"></i> Link New Child
            </button>
        </div>

        <!-- Enrollment Status Cards -->
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-users"></i>
                    <h5 id="totalChildren">2</h5>
                    <small>Linked Children</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-clock"></i>
                    <h5 id="pendingEnrollments">1</h5>
                    <small>Pending Requests</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-check-circle"></i>
                    <h5 id="approvedEnrollments">2</h5>
                    <small>Approved</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-times-circle"></i>
                    <h5 id="rejectedEnrollments">0</h5>
                    <small>Rejected</small>
                </div>
            </div>
        </div>

        <!-- Children List Table -->
        <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                <h6 class="mb-0" style="color: #555;">My Children</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover mb-0" id="children-tbl">
                    <thead class="table-light text-dark">
                        <tr>
                            <th class="text-center" style="width:5%">#</th>
                            <th>Child Name</th>
                            <th>Student LRN</th>
                            <th>Grade Level</th>
                            <th>Section</th>
                            <th>Date Enrolled</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="children-data-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Child Modal -->
    <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="child_id" id="childId">
                        <input type="hidden" name="status" value="Pending">
                        <input type="hidden" name="parent_id" id="parentId" value="1">
                        <div class="row">
                            <p>LEARNER's PERSONAL INFORMATION</p>
                            <!-- Row 1 -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Learner Reference No (LRN): *</label>
                                <input type="text" class="form-control" name="lrn" id="studentLRN" required
                                    placeholder="Enter 12-digit LRN">
                                <small class="text-muted">The official Learner Reference Number assigned to your
                                    child</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" required name="verification_code"
                                    id="verificationCode" placeholder="Code from school">
                                <small class="text-muted">Optional: Verification code provided by the school
                                    admin</small>
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
                                <label class="form-label">Nickname</label>
                                <input type="text" class="form-control" id="nickname" name="nickname"
                                    placeholder="Enter Nickname (Optional)">
                                <small class="text-muted">Optional: Name of the child at home</small>
                            </div>

                            <!-- Row 2 -->
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


                        <div class="row">
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
                                <label class="form-label">Relationship of the child*</label>
                                <select class="form-control" name="relationship" id="relationship" required>
                                    <option value="">Select Relationship</option>
                                    <option value="guardian">Guardian</option>
                                    <option value="mother">Mother</option>
                                    <option value="father">Father</option>
                                </select>
                            </div>
                            <p>CURRENT ADDRESS </p>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Home No/Street Name*</label>
                                <input type="text" class="form-control" name="home_street" id="home_street"
                                    placeholder="Enter Home No/Street Name">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Barangay*</label>
                                <input type="text" class="form-control" name="Barangay" id="Barangay"
                                    placeholder="Enter Barangay">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Municipality/City*</label>
                                <input type="text" class="form-control" name="Municipality" id="Municipality"
                                    placeholder="Enter Municipality">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Province/Country*</label>
                                <input type="text" class="form-control" name="Province" id="Province"
                                    placeholder="Enter Province/Country">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Zip Code*</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode"
                                    placeholder="Enter zip code">
                            </div>
                        </div>

                        <div class="row">
                            <p>PARENT's/GUARDIAN's INFORMATION</p>
                            <small>Legal Guardian's Name</small>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" required name="guardian_lname"
                                    id="guardian_lname" placeholder="Enter Complete Lastname">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" required name="guardian_fname"
                                    id="guardian_fname" placeholder="Enter Complete Firstname">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" required name="guardian_mname"
                                    id="guardian_mname" placeholder="Enter Complete Middlename">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Contact Number *</label>
                                <input type="text" class="form-control" required name="guardian_contact"
                                    id="guardian_contact" placeholder="Enter Contact Number">
                            </div>
                            <small>Mother's Meiden Name</small>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" required name="mother_lname" id="mother_lname"
                                    placeholder="Enter Complete Lastname">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" required name="mother_fname" id="mother_fname"
                                    placeholder="Enter Complete Firstname">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" required name="mother_mname" id="mother_mname"
                                    placeholder="Enter Complete Middlename">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Contact Number *</label>
                                <input type="text" class="form-control" required name="mother_contact"
                                    id="mother_contact" placeholder="Enter Contact Number">
                            </div>
                            <small>Father's Name</small>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" required name="father_lname" id="father_lname"
                                    placeholder="Enter Complete Lastname">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" required name="father_fname" id="father_fname"
                                    placeholder="Enter Complete Firstname">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" required name="father_mname" id="father_mname"
                                    placeholder="Enter Complete Middlename">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Contact Number *</label>
                                <input type="text" class="form-control" required name="father_contact"
                                    id="father_contact" placeholder="Enter Contact Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Learner Profile Picture</label>
                                <input type="file" class="form-control" id="profilePicInput" required
                                    name="profile_picture" accept="image/*">
                                <small class="text-muted">Upload a clear image (JPG, PNG)</small>
                                <div class="mt-2 col-md-8">
                                    <img id="profilePreview" src="../assets/image/users.png" alt="Profile Preview"
                                        class="img-thumbnail" width="150">
                                </div>


                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Additional Notes</label>
                                <textarea class="form-control" name="notes" id="notes" rows="3"
                                    placeholder="Any special instructions or information..."></textarea>
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

    <!-- View Details Modal -->
    <div class="modal fade" id="viewChildModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                    <h5 class="modal-title" style="color: #555;">Child Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="childDetailsContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Sample data for demonstration
    const childrenData = [
        {
            id: 1,
            name: "Maria Santos",
            lrn: "123456789012",
            grade: "Grade 5",
            section: "Section A",
            dateEnrolled: "2024-08-15",
            status: "Approved",
            relationship: "Mother",
            emergencyContact: "09123456789"
        },
        {
            id: 2,
            name: "Juan Santos",
            lrn: "123456789013",
            grade: "Grade 3",
            section: "Section B",
            dateEnrolled: "2024-08-15",
            status: "Approved",
            relationship: "Mother",
            emergencyContact: "09123456789"
        },
        {
            id: 3,
            name: "Ana Santos",
            lrn: "123456789014",
            grade: "Grade 1",
            section: "Section C",
            dateEnrolled: "2024-11-20",
            status: "Pending",
            relationship: "Mother",
            emergencyContact: "09123456789"
        }
    ];

    let dataTable;

    function renderChildrenTable() {
        const tbody = $('#children-data-body');
        tbody.html('');
        let i = 1;

        childrenData.forEach(child => {
            const statusBadge = getStatusBadge(child.status);
            const actions = getActionButtons(child);

            const tr = $('<tr></tr>');
            tr.html(`
                <td class="text-center">${i++}</td>
                <td><strong>${child.name}</strong></td>
                <td><code style="background-color: #f8f9fa; padding: 2px 4px; border-radius: 3px;">${child.lrn}</code></td>
                <td>${child.grade}</td>
                <td>${child.section}</td>
                <td>${formatDate(child.dateEnrolled)}</td>
                <td class="text-center">${statusBadge}</td>
                <td class="text-center">${actions}</td>
            `);
            tbody.append(tr);
        });

        //updateStatsCards();
    }

    function getStatusBadge(status) {
        const badges = {
            'Approved': '<span class="status-badge status-approved">Approved</span>',
            'Pending': '<span class="status-badge status-pending">Pending</span>',
            'Rejected': '<span class="status-badge status-rejected">Rejected</span>'
        };
        return badges[status] || '<span class="status-badge">Unknown</span>';
    }

    function getActionButtons(child) {
        return `
            <button class="btn-action view" onclick="viewChild(${child.id})" title="View Details">
                <i class="fa fa-eye"></i>
            </button>
            <button class="btn-action edit" onclick="editChild(${child.id})" title="Edit">
                <i class="fa fa-edit"></i>
            </button>
            ${child.status === 'Pending' ?
                `<button class="btn-action delete" onclick="cancelRequest(${child.id})" title="Cancel Request">
                    <i class="fa fa-times"></i>
                </button>` : ''
            }
        `;
    }

    function updateStatsCards() {
        const total = childrenData.length;
        const pending = childrenData.filter(c => c.status === 'Pending').length;
        const approved = childrenData.filter(c => c.status === 'Approved').length;
        const rejected = childrenData.filter(c => c.status === 'Rejected').length;

        $('#totalChildren').text(total);
        $('#pendingEnrollments').text(pending);
        $('#approvedEnrollments').text(approved);
        $('#rejectedEnrollments').text(rejected);
    }

    function formatDate(dateStr) {
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    function viewChild(id) {
        const child = childrenData.find(c => c.id === id);
        if (child) {
            const content = `
                <div class="row">
                    <div class="col-6"><strong>Name:</strong></div>
                    <div class="col-6">${child.name}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>LRN:</strong></div>
                    <div class="col-6"><code style="background-color: #f8f9fa; padding: 2px 4px; border-radius: 3px;">${child.lrn}</code></div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Grade & Section:</strong></div>
                    <div class="col-6">${child.grade} - ${child.section}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Relationship:</strong></div>
                    <div class="col-6">${child.relationship}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Emergency Contact:</strong></div>
                    <div class="col-6">${child.emergencyContact}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Date Enrolled:</strong></div>
                    <div class="col-6">${formatDate(child.dateEnrolled)}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Status:</strong></div>
                    <div class="col-6">${getStatusBadge(child.status)}</div>
                </div>
            `;
            $('#childDetailsContent').html(content);
            $('#viewChildModal').modal('show');
        }
    }

    function editChild(id) {
        const child = childrenData.find(c => c.id === id);
        if (child) {
            $('#childId').val(child.id);
            $('#studentLRN').val(child.lrn);
            $('#childName').val(child.name);
            $('#relationship').val(child.relationship);
            $('#emergencyContact').val(child.emergencyContact);
            $('#childModal').modal('show');
        }
    }

    function cancelRequest(id) {
        if (confirm('Are you sure you want to cancel this enrollment request?')) {
            const index = childrenData.findIndex(c => c.id === id);
            if (index > -1) {
                childrenData.splice(index, 1);
                renderChildrenTable();

            }
        }
    }

    // Event Handlers
    $(document).ready(function () {
        //renderChildrenTable();

        $('#addChildBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#childModal').modal('show');
        });


        $('#childForm').submit(function (e) {
            e.preventDefault();

            
            const $form = $(this);
            const formData = new FormData(this); // Supports file + text data

            $.ajax({
                url: base_url + "/authentication/action.php?action=childForm",
                method: "POST",
                data: formData,
                processData: false, // Required for FormData
                contentType: false, // Required for FormData
                dataType: "json",
                beforeSend: function () {
                    $form.find("button[type='submit']").html("Submitting...");
                },
                success: function (response) {
                    Swal.fire({
                        title: response.status === 1 ? "Success!" : "Error",
                        text: response.message,
                        icon: response.status === 1 ? "success" : "error",
                        toast: true,
                        position: "top-end",
                        timer: 3000,
                        showConfirmButton: false,
                    }).then(() => {
                        $('#childModal').modal('hide');
                        $form[0].reset();
                        renderChildrenTable();
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //console.error("AJAX error:", textStatus, errorThrown);
                    Swal.fire({
                        title: "Technical Error",
                        text: "Please contact the administration!",
                        icon: "error",
                        toast: true,
                        position: "top-end",
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        $('#childModal').modal('hide');
                        $form[0].reset();
                        renderChildrenTable();
                    });
                },
                complete: function () {
                    $form.find("button[type='submit']").html("Submit Request");
                }
            });
        });


        // LRN validation
        $('#studentLRN').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 12) value = value.substring(0, 12);
            $(this).val(value);
        });

        $('#emergencyContact, #guardian_contact, #mother_contact, #father_contact').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);
            $(this).val(value);
        });

        $('#verificationCode').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 8) value = value.substring(0, 8);
            $(this).val(value);
        });

        // Realtime validation on any change/input
        $('#childForm input, #childForm select, #childForm textarea').on('input change blur', function () {
            validateField($(this));
        });

        // Field validation logic
        function validateField(field) {
            const val = field.val().trim();
            const name = field.attr('name');
            const type = field.attr('type');
            const isRequired = field.prop('required');

            // Remove previous error message
            field.removeClass('is-invalid');
            field.next('.error-feedback').remove();

            // Skip hidden fields
            if (field.is(':hidden')) return true;

            // LRN must be 12-digit number
            if (name === 'lrn' && val && !/^\d{12}$/.test(val)) {
                showError(field, "LRN must be exactly 12 digits.");
                return false;
            }

            // Required fields check
            if (isRequired && val === '') {
                showError(field, "This field is required.");
                return false;
            }

            // File validation
            if (type === 'file' && isRequired && field.prop('files').length === 0) {
                showError(field, "Please upload a file.");
                return false;
            }

            return true;
        }

        function showError(field, message) {
            field.addClass('is-invalid');
            if (field.next('.error-feedback').length === 0) {
                field.after(`<div class="error-feedback">${message}</div>`);
            }
        }

    });


    /* $('#relationship').on('change', function () {
        const selected = $(this).val();
        if (!selected) return;

        $.ajax({
            url: base_url + "/authentication/action.php?action=getRelationship",
            method: 'GET',
            data: { type: selected },
            dataType: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    const info = data.info;
                    if (selected === 'guardian') {
                        $('#guardian_lname').val(info.lname);
                        $('#guardian_fname').val(info.fname);
                        $('#guardian_mname').val(info.mname);
                        $('#guardian_contact').val(info.contact);
                    } else if (selected === 'mother') {
                        $('#mother_lname').val(info.lname);
                        $('#mother_fname').val(info.fname);
                        $('#mother_mname').val(info.mname);
                        $('#mother_contact').val(info.contact);
                    } else if (selected === 'father') {
                        $('#father_lname').val(info.lname);
                        $('#father_fname').val(info.fname);
                        $('#father_mname').val(info.mname);
                        $('#father_contact').val(info.contact);
                    }
                } else {
                    Swal.fire("No Data", data.message, "info");
                }
            },
            error: function () {
                Swal.fire("Error", "Failed to load relationship data", "error");
            }
        });
    }); */


    document.getElementById('profilePicInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('profilePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = "../assets/image/users.png";
        }
    });


</script>