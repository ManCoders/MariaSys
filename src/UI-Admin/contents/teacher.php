<style>
    .modal-lg {
        max-width: 1200px;
        width: 90%;
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
                    <th>Grade Level</th>
                    <th>Date Submitted</th>
                    <th>Contact Number</th>
                    <th>Type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sample-data-body"></tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Teacher Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="child_id" id="childId">
                        <input type="hidden" name="status" value="Pending">
                        <div class="row text-center d-flex justify-content-center">
                            <p>TEACHER's PERSONAL INFORMATION</p>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Employee No : *</label>
                                <input type="text" class="form-control" name="employee_id" id="employee_id" required
                                    placeholder="Enter 6-digit Employee #">
                                <small class="text-muted">The official Employee Number from school</small>
                            </div>



                            <div class="col-md-3 mb-3">
                                <label class="form-label"> Section Adviser *</label>
                                <select class="form-control" name="section_id" id="section_id" required>
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
    const sampleData = [
        { id: 1, name: "Juan Dela Cruz", grade: "Grade 3", date: "June 1, 2025", contact: "09123456789", type: "New", status: "Pending" },
        { id: 2, name: "Maria Santos", grade: "Grade 6", date: "June 2, 2025", contact: "09234567890", type: "Transfer", status: "Approved" },
        { id: 3, name: "Pedro Reyes", grade: "Grade 4", date: "June 3, 2025", contact: "09345678901", type: "Regular", status: "Declined" },
        { id: 4, name: "Ana Lim", grade: "Grade 3", date: "June 4, 2025", contact: "09456789012", type: "New", status: "Pending" },
        { id: 5, name: "Carlos Rivera", grade: "Grade 2", date: "June 5, 2025", contact: "09567890123", type: "Transfer", status: "Approved" }
    ];


    let dataTable;

    function renderTable() {
        let tbody = $('#sample-data-body');
        tbody.html('');
        let i = 1;

        sampleData.forEach(emp => {
            let tr = $('<tr></tr>');
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(`<td>${emp.name}</td>`);
            tr.append(`<td>${emp.grade}</td>`);
            tr.append(`<td>${emp.date}</td>`);
            tr.append(`<td>${emp.contact}</td>`);
            tr.append(`<td>${emp.type}</td>`);
            tr.append(`<td class="text-center">${emp.status}</td>`);
            tr.append(`
                <td class="text-center">
                <button class="btn btn-sm btn-success editBtn" data-id="${emp.id}"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-danger trashBtn"><i class="fa fa-trash"></i></button>
                <button class="btn btn-sm btn-primary viewBtn"><i class="fa fa-eye"></i></button>
                </td>`);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();
        dataTable = $('#student-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            columnDefs: [
                { orderable: false, targets: 7 }
            ]
        });


        $('.editBtn').click(function () {
            const id = $(this).data('id');
            const record = sampleData.find(e => e.id === id);
            if (record) {
                $('#editId').val(record.id);
                $('#editName').val(record.name);
                $('#editGrade').val(record.grade);
                $('#editDate').val(record.date);
                $('#editContact').val(record.contact);
                $('#editType').val(record.type);
                $('#editStatus').val(record.status);
                new bootstrap.Modal(document.getElementById('editModal')).show();
            }
        });

        $('#addNewBtn').click(function () {
            $('#childForm')[0].reset();
            $('#profilePreview').attr('src', '../assets/image/users.png');
            $('#editModal').modal('show');
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



    $(document).ready(function () {
        renderTable();

        $('#employee_id').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 6) value = value.substring(0, 6);
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