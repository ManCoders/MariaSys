<style>
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

<section class="p-2">
    <div class="sub-section">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4><i class="fa fa-folder-open text-primary me-2"></i>Teacher Registration</h4>
                <span>Manage and process teacher registration application</span>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Teacher
            </button>
        </div>
        <table class="table table-bordered table-hover mb-0" id="student-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Teacher Name</th>
                    <th>Grade/Section</th>
                    <th>Date Submitted</th>
                    <th>Contact Number</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tb_data_body"></tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Teacher Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="status" value="Approved">
                        <div class="row text-center d-flex justify-content-center">
                            <p>TEACHER's PERSONAL INFORMATION</p>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Employee No : *</label>
                                <input type="text" class="form-control" name="employee_id" id="employee_id" required
                                    placeholder="Enter 6-digit Employee #">
                                <small class="text-muted">The official Employee Number from school</small>
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
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" name="middle_name" id="middleName" required
                                    placeholder="Enter Middle Name">
                            </div>
                            <div class="col-md-1 mb-3">
                                <label class="form-label">Suffix</label>
                                <select class="form-control" name="suffix" id="suffix">
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Contact no *</label>
                                <input type="text" class="form-control" name="contact" id="contact" required
                                    placeholder="Enter Contact NO">
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
                                <label class="form-label">Language*</label>
                                <select class="form-control" name="tongue" id="tongue" required>
                                    <option value="">Select Language</option>
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
</section>

<script>


    let dataTable;

    function renderTable() {
        let tbody = $('#tb_data_body');
        tbody.html('');
        let i = 1;

        $.ajax({
            url: base_url + "/authentication/action.php?action=getTeacher",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 1) {
                    const data = response.data;

                    data.forEach(emp => {
                        let tr = $('<tr></tr>');
                        tr.append(`<td class="text-center">${i++}</td>`);
                        tr.append(`<td class="name-cell">${emp.teacher_name}</td>`);
                        tr.append(`<td>${emp.employeeid}</td>`);
                        tr.append(`<td>${emp.created_date}</td>`);
                        tr.append(`<td>${emp.cpno}</td>`);
                        tr.append(`<td class="text-center">${emp.teacher_status}</td>`);
                        tr.append(`
                        <td class="text-center">
                            <button class="btn btn-sm btn-success editBtn" data-id="${emp.teacher_id}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.teacher_id}"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.teacher_id}"><i class="fa fa-eye"></i></button>
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
                        columnDefs: [{ orderable: false, targets: 6 }]
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
                        sessionStorage.setItem('teacher_id', id);
                        location.href = 'index.php?page=contents/teacher/teacher_view';
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
    $('#childForm').submit(function (e) {
        e.preventDefault();


        const $form = $(this);
        const formData = new FormData(this); // Supports file + text data

        $.ajax({
            url: base_url + "/authentication/action.php?action=NewTeacher",
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
                    location.href = base_url + "/src/UI-admin/index.php?page=contents/teacher";
                    renderTable();

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
                    renderTable();
                });
            },
            complete: function () {
                $form.find("button[type='submit']").html("Submit Request");
            }
        });
    });



    $(document).ready(function () {
        renderTable();

        $('#addNewBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#childModal').modal('show');
        });

        $('#employee_id').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 6) value = value.substring(0, 6);
            $(this).val(value);
        });
        $('#contact').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);
            $(this).val(value);
        });


        $('#childForm input, #childForm select, #childForm textarea').on('input change blur', function () {
            validateField($(this));
        });

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
            if (name === 'lrn' && val && !/^\d{6}$/.test(val)) {
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
</script>