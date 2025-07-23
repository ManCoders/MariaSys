<section class="p-2">
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h4 class="mb-0"><i class="fa fa-folder-open text-primary me-2"></i>Subject Management</h4>
                <small class="text-muted">View and manage all subjects</small>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Subject
            </button>
        </div>

        <table class="table table-bordered table-hover mb-0" id="subject-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th >Learner No</th>
                    <th>Grade Level</th>
                    <th>Units</th>
                    <th>Teacher Assigned</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="subject-data-body"></tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Subject Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="editCode" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Grade Level</label>
                            <input type="text" class="form-control" id="editGrade" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Units</label>
                            <input type="number" class="form-control" id="editUnits" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Teacher Assigned</label>
                            <input type="text" class="form-control" id="editTeacher" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="submit">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    const subjectData = [
        { id: 1, code: "ENG101", student:"38", name: "English Grammar", grade: "Grade 7", units: 3, teacher: "Mr. Cruz", status: "Active" },
        { id: 2, code: "MATH201",student:"40", name: "Algebra", grade: "Grade 8", units: 4, teacher: "Ms. Santos", status: "Inactive" },
        { id: 3, code: "SCI102",student:"42", name: "Earth Science", grade: "Grade 7", units: 2, teacher: "Mr. Tan", status: "Active" }
    ];

    let dataTable;

    function renderTable() {
        const tbody = $('#subject-data-body');
        tbody.html('');
        let i = 1;

        subjectData.forEach(sub => {
            const tr = $('<tr></tr>');
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(`<td>${sub.code}</td>`);
            tr.append(`<td>${sub.name}</td>`);
            tr.append(`<td class="text-center">${sub.student}</td>`);
            tr.append(`<td class="text-center">${sub.grade}</td>`);
            tr.append(`<td>${sub.units}</td>`);
            tr.append(`<td>${sub.teacher}</td>`);
            tr.append(`
                <td class="text-center">
                    <button class="btn btn-sm btn-success editBtn" data-id="${sub.id}"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="${sub.id}"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-sm btn-secondary viewBtn" data-id="${sub.id}"><i class="fa fa-eye"></i></button>
                </td>`);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();
        dataTable = $('#subject-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            columnDefs: [
                { orderable: false, targets: 7 }
            ]
        });

        $('.editBtn').click(function () {
            const id = $(this).data('id');
            const record = subjectData.find(e => e.id === id);
            if (record) {
                $('#editId').val(record.id);
                $('#editCode').val(record.code);
                $('#editName').val(record.name);
                $('#editGrade').val(record.grade);
                $('#editUnits').val(record.units);
                $('#editTeacher').val(record.teacher);
                $('#editStatus').val(record.status);
                new bootstrap.Modal(document.getElementById('editModal')).show();
            }
        });

        $('.deleteBtn').click(function () {
            const id = $(this).data('id');
            const index = subjectData.findIndex(e => e.id === id);
            if (index !== -1) {
                if (confirm("Are you sure you want to delete this subject?")) {
                    subjectData.splice(index, 1);
                    renderTable();
                }
            }
        });

        $('.viewBtn').click(function (){
            const id = $(this).data('id');
            const record = subjectData.find(e => e.id===id);
            if (record) {
                sessionStorage.setItem('learner_id', JSON.stringify(record));
                location.href = 'index.php?page=contents/student/subject_content';
            }
                

        })
    }

    $('#addNewBtn').click(function () {
        $('#editId').val('');
        $('#editCode').val('');
        $('#editName').val('');
        $('#editGrade').val('');
        $('#editUnits').val('');
        $('#editTeacher').val('');
        $('#editStatus').val('Active');
        new bootstrap.Modal(document.getElementById('editModal')).show();
    });

    $('#editForm').submit(function (e) {
        e.preventDefault();
        const id = $('#editId').val();
        if (id) {
            const index = subjectData.findIndex(e => e.id == id);
            if (index !== -1) {
                subjectData[index].code = $('#editCode').val();
                subjectData[index].name = $('#editName').val();
                subjectData[index].grade = $('#editGrade').val();
                subjectData[index].units = $('#editUnits').val();
                subjectData[index].teacher = $('#editTeacher').val();
                subjectData[index].status = $('#editStatus').val();
            }
        } else {
            const newId = subjectData.length ? subjectData[subjectData.length - 1].id + 1 : 1;
            subjectData.push({
                id: newId,
                code: $('#editCode').val(),
                name: $('#editName').val(),
                grade: $('#editGrade').val(),
                units: $('#editUnits').val(),
                teacher: $('#editTeacher').val(),
                status: $('#editStatus').val()
            });
        }
        renderTable();
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    });

    $(document).ready(function () {
        renderTable();
    });
</script>
