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
        padding: 4px 6px;
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


    .modal-lg {
        max-width: 1200px;
        width: 90%;
    }
    .name-cell {
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<?php

/* $qry = $pdo->query("SELECT * FROM grade_level");

if ($qry && $qry->rowCount() > 0) {
    $meta = $qry->fetch(PDO::FETCH_ASSOC);
} */

?>
<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h4 class="mb-0"><i class="fa fa-user-plus text-primary me-2"></i>Child Enrollment </h4>
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

            <div class="card-body">

                <table class="table table-bordered table-hover mb-0" id="student-tbl">
                    <thead class="table-light text-dark">
                        <tr>
                            <th class="text-center" style="width:4%">#</th>
                            <th>Learner Name</th>
                            <th>Student LRN</th>
                            <th>Date Submitted</th>
                            <th>Grade Level</th>
                            <th>School Year</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tb_data_body"></tbody>
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
                        <input type="hidden" name="parent_id" id="parentId"
                            value="<?php echo isset($_SESSION['parentData']) ? $_SESSION['parentData']['parent_id'] : '1' ?>">
                        <div class="row text-center d-flex justify-content-center">
                            <p>LEARNER's PERSONAL INFORMATION</p>
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
                                    <?php
                                    $qry = $pdo->query("SELECT * FROM grade_level ORDER BY grade_level_name ASC");
                                    if ($qry && $qry->rowCount() > 0):
                                        while ($row = $qry->fetch(PDO::FETCH_ASSOC)):
                                            ?>
                                            <option value="<?= htmlspecialchars($row['grade_level_id']) ?>">
                                                <?= htmlspecialchars($row['grade_level_name']) ?>
                                            </option>
                                            <?php
                                        endwhile;
                                    else:
                                        echo '<option disabled>No grade levels available</option>';
                                    endif;
                                    ?>
                                </select>
                                <small class="text-muted">Select Incoming school grade</small>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">School Year</label>
                                <select class="form-control" name="school_year_id" id="school_year_id" required>
                                    <option value="">Select School Year</option>
                                    <?php
                                    $qry = $pdo->query("SELECT * FROM school_year");
                                    if ($qry && $qry->rowCount() > 0):
                                        while ($row = $qry->fetch(PDO::FETCH_ASSOC)):
                                            ?>
                                            <option selected value="<?= htmlspecialchars($row['school_year_id']) ?>">
                                                <?= htmlspecialchars($row['school_year_name']) ?>
                                            </option>
                                            <?php
                                        endwhile;
                                    else:
                                        echo '<option disabled>No grade levels available</option>';
                                    endif;
                                    ?>
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
    let dataTable;

    function renderTable() {
        let tbody = $('#tb_data_body');
        tbody.html('');
        let i = 1;

        $.ajax({
            url: base_url + "/authentication/action.php?action=getLearner",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 1) {
                    const data = response.data;

                    data.forEach(emp => {
                        let tr = $('<tr></tr>');
                        tr.append(`<td class="text-center">${i++}</td>`);
                        tr.append(`<td class="name-cell">${emp.name}</td>`);
                        tr.append(`<td>${emp.lrn}</td>`);
                        tr.append(`<td>${emp.date}</td>`);
                        tr.append(`<td>${emp.parent_contact}</td>`);
                        tr.append(`<td>${emp.school_year_id}</td>`);
                        tr.append(`<td class="text-center">${emp.learner_status}</td>`);
                        tr.append(`
                        <td class="text-center">
                            <button class="btn btn-sm btn-success editBtn" data-id="${emp.learner_id}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.learner_id}"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.learner_id}"><i class="fa fa-eye"></i></button>
                        </td>
                    `);
                        tbody.append(tr);
                    });

                    if ($.fn.DataTable.isDataTable('#student-tbl')) {
                        $('#student-tbl').DataTable().destroy();
                    }

                    dataTable = $('#student-tbl').DataTable({
                        pageLength: 5,
                        lengthMenu: [5, 10, 25],
                        columnDefs: [{ orderable: false, targets: 7 }]
                    });

                    $('.editBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        alert('Edit clicked for ID: ' + id);
                        // TODO: Populate and show modal for editing
                    });

                    $('.trashBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // TODO: Call backend to delete
                                alert('Deleted ID: ' + id);
                            }
                        });
                    });

                    $('.viewBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        sessionStorage.setItem('learner_id', id);
                        location.href = 'index.php?page=contents/student';
                    });

                } else {
                    Swal.fire("Error", response.message, "error");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                Swal.fire("Error", "Unable to fetch data from server.", "error");
            }
        });
    }

    /*    function getStatusBadge(status) {
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
    */
    // Event Handlers
    $(document).ready(function () {

        renderTable();

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
                        location.href = base_url + "/src/UI-Parent/index.php?page=contents/enrollment";
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