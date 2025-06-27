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
                <form id="childForm">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="childId">

                        <div class="row">
                            <!-- Row 2 -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Student LRN *</label>
                                <input type="text" class="form-control" id="studentLRN"
                                    placeholder="Enter 12-digit LRN">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Nickname</label>
                                <input type="text" class="form-control" id="nickname"
                                    placeholder="Enter Nickname (Optional)">
                            </div>



                            <!-- Row 1 -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Family Name *</label>
                                <input type="text" class="form-control" id="familyName" placeholder="Enter Family Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Given Name *</label>
                                <input type="text" class="form-control" id="givenName" placeholder="Enter Given Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Middle Name *</label>
                                <input type="text" class="form-control" id="middleName" placeholder="Enter Middle Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control" id="suffix" placeholder="e.g. Jr., Sr., III">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth *</label>
                                <input type="date" class="form-control" id="childBirthdate">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Relationship to Child *</label>
                                <select class="form-control" id="relationship">
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
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="verificationCode"
                                    placeholder="Code from school">
                                <small class="text-muted">Optional: Verification code provided by the school</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Emergency Contact Number *</label>
                                <input type="tel" class="form-control" id="emergencyContact" placeholder="09XXXXXXXXX">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="notes" rows="3"
                                placeholder="Any special instructions or information..."></textarea>
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
                <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.id}"><i class="fa fa-trash"></i></button>
                <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.id}" ><i class="fa fa-eye"></i></button>
                </td>`);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();
        dataTable = $('#student-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            /* buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export Excel',
                    className: 'btn btn-success btn-sm'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export PDF',
                    className: 'btn btn-danger btn-sm'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-dark btn-sm'
                }
            ], */
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

/*         $('#addNewBtn').click(function () {
            $('#editId').val('');
            $('#editName').val('');
            $('#editGrade').val('');
            $('#editDate').val('');
            $('#editContact').val('');
            $('#editType').val('New');
            $('#editStatus').val('Pending');
            new bootstrap.Modal(document.getElementById('childModal')).show();
        }); */

    }

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

    $(document).ready(function () {
        renderTable();

        $('#addNewBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#childModal').modal('show');
        });
        $('#childForm').submit(function (e) {
            e.preventDefault();

            const $form = $(this); // properly reference this form
            const formData = {
                id: $('#childId').val() || Date.now(),
                name: $('#childName').val(),
                lrn: $('#studentLRN').val(),
                grade: 'TBD',
                section: 'TBD',
                dateEnrolled: new Date().toISOString().split('T')[0],
                status: 'Pending',
                relationship: $('#relationship').val(),
                emergencyContact: $('#emergencyContact').val(),
                birthdate: $('#childBirthdate').val(),
                verificationCode: $('#verificationCode').val(),
                notes: $('#notes').val()
            };

            $.ajax({
                url: base_url + "/authentication/action.php?action=childForm",
                method: "POST",
                data: formData,
                dataType: "json",
                beforeSend: function () {
                    $(this).find("button[type='submit']").html("Submitting...");
                },
                success: function (response) {
                    if (response.status == 1) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            toast: true,
                            position: "top-end",
                            timer: 3000,
                            showConfirmButton: false,
                        }).then(() => {
                            $('#childModal').modal('hide');
                            $form[0].reset();
                            renderChildrenTable();
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error",
                            toast: true,
                            position: "top-end",
                            timer: 3000,
                            showConfirmButton: false,
                        }).then(() => {
                            $('#childModal').modal('hide');
                            $form[0].reset();
                            renderChildrenTable();
                        });

                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", textStatus, errorThrown);
                    Swal.fire({
                        title: "Technical Error",
                        text: 'Please contact the administration!',
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
                    $('#childModal').modal('hide');
                    $form[0].reset();
                    renderChildrenTable();
                }
            });
        });


    });
</script>