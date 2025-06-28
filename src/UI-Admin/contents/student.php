<section class="p-2">
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class=""><i class="fa fa-folder-open text-primary me-2"></i>Learner Registration</h4>
                <span>Manage and process student registration application</span>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Learner
            </button>
        </div>
        <table class="table table-bordered table-hover mb-0" id="student-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Learner Name</th>
                    <th>Student LRN</th>
                    <th>Date Submitted</th>
                    <th>Contact Number</th>
                    <th>Type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tb_data_body"></tbody>
        </table>
    </div>

    <style>

    </style>
    <!-- Modal -->
    <div class="modal fade " id="childModal" tabindex="-1">
        <div class="modal-dialog  modal-lg ">
            <div class="modal-content ">
                <!-- <form id="editForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Update Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label class="form-label">Learner Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Grade Level</label>
                            <input type="text" class="form-control" id="editGrade" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Date Submitted</label>
                            <input type="text" class="form-control" id="editDate" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="editContact" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Type</label>
                            <select class="form-select" id="editType">
                                <option>New</option>
                                <option>Transfer</option>
                                <option>Regular</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Declide</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="submit">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form> -->
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="child_id" id="childId">
                        <input type="hidden" name="status" value="Approved">

                        <div class="row">
                            <!-- Row 2 -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Student LRN *</label>
                                <input type="text" class="form-control" name="lrn" id="studentLRN" required
                                    placeholder="Enter 12-digit LRN">
                                <small class="text-muted">The official Learner Reference Number assigned to your
                                    child</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Nickname</label>
                                <input type="text" class="form-control" id="nickname" name="nickname"
                                    placeholder="Enter Nickname (Optional)">
                            </div>



                            <!-- Row 1 -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Family Name *</label>
                                <input type="text" class="form-control" name="family_name" id="familyName" required
                                    placeholder="Enter Family Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Given Name *</label>
                                <input type="text" class="form-control" name="given_name" id="givenName" required
                                    placeholder="Enter Given Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" name="middle_name" id="middleName" required
                                    placeholder="Enter Middle Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control" name="suffix" id="suffix"
                                    placeholder="e.g. Jr., Sr., III">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date of Birth *</label>
                                <input type="date" class="form-control" name="birthdate" id="childBirthdate" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Relationship to Child *</label>
                                <select class="form-control" name="relationship" id="relationship" required>
                                    <option value="">Select Relationship</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Guardian">Guardian</option>
                                    <option value="Grandmother">Grandmother</option>
                                    <option value="Grandfather">Grandfather</option>
                                    <option value="Aunt">Aunt</option>
                                    <option value="Uncle">Uncle</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Gender*</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" required name="verification_code"
                                    id="verificationCode" placeholder="Code from school">
                                <small class="text-muted">Optional: Verification code provided by the school</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Emergency Contact Number *</label>
                                <input type="tel" class="form-control" required name="emergency_contact"
                                    id="emergencyContact" placeholder="09XXXXXXXXX">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Profile Picture</label>
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
            new bootstrap.Modal(document.getElementById('childModal')).show();
        }
    });

    $('.viewBtn').click(function () {
        const id = $(this).data('id');
        const record = sampleData.find(e => e.id === id);
        if (record) {
            sessionStorage.setItem('learner_id', JSON.stringify(record));
            location.href = 'index.php?page=contents/student/student_view';
        }
    });

    $('#addNewBtn').click(function () {
        $('#editId').val('');
        $('#editName').val('');
        $('#editGrade').val('');
        $('#editDate').val('');
        $('#editContact').val('');
        $('#editType').val('New');
        $('#editStatus').val('Pending');
        new bootstrap.Modal(document.getElementById('childModal')).show();
    });



    /*   $('#editForm').submit(function (e) {
          e.preventDefault();
          const id = $('#editId').val();
          if (id) {
              const index = sampleData.findIndex(e => e.id == id);
              if (index !== -1) {
                  sampleData[index].name = $('#editName').val();
                  sampleData[index].grade = $('#editGrade').val();
                  sampleData[index].date = $('#editDate').val();
                  sampleData[index].contact = $('#editContact').val();
                  sampleData[index].type = $('#editType').val();
                  sampleData[index].status = $('#editStatus').val();
              }
          } else {
              const newId = sampleData.length ? sampleData[sampleData.length - 1].id + 1 : 1;
              sampleData.push({
                  id: newId,
                  name: $('#editName').val(),
                  grade: $('#editGrade').val(),
                  date: $('#editDate').val(),
                  contact: $('#editContact').val(),
                  type: $('#editType').val(),
                  status: $('#editStatus').val()
              });
          }
          renderTable();
          bootstrap.Modal.getInstance(document.getElementById('childModal')).hide();
      });
   */

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
                    tr.append(`<td>${emp.name}</td>`);
                    tr.append(`<td>${emp.lrn}</td>`);
                    tr.append(`<td>${emp.date}</td>`);
                    tr.append(`<td>${emp.contact}</td>`);
                    tr.append(`<td>${emp.relationship}</td>`);
                    tr.append(`<td class="text-center">${emp.status}</td>`);
                    tr.append(`
                        <td class="text-center">
                            <button class="btn btn-sm btn-success editBtn" data-id="${emp.id}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.id}"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.id}"><i class="fa fa-eye"></i></button>
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
   /* setInterval(() => {
    if (!$('#childModal').hasClass('show')) {
        renderTable();
    }
}, 1000); */


    $(document).ready(function () {
        renderTable();

        $('#addNewBtn').click(function () {
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
                        $('#profilePreview').val('');
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", textStatus, errorThrown);
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
                    $('#profilePreview').val('');
                }
            });
        });

        $('#studentLRN').on('input', function () {
            let value = $(this).val().replace(/\D/g, ''); // Remove non-digits
            if (value.length > 12) {
                value = value.substring(0, 12);
            }
            $(this).val(value);
        });

        // Phone number validation
        $('#emergencyContact').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) {
                value = value.substring(0, 11);
            }
            $(this).val(value);
        });

        $('#verificationCode').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 8) {
                value = value.substring(0, 8);
            }
            $(this).val(value);
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
    });


</script>