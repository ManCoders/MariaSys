<section class="p-2 overflow-scroll">
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h4 class="mb-0"><i class="fa fa-folder-open text-primary me-2"></i>Classroom Management</h4>
                <small class="text-muted">View and manage section and classroom</small>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Classroom
            </button>
        </div>

        <table class="table table-bordered table-hover mb-0" id="classroom-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Classroom Name</th>
                    <th>Section</th>
                    <th>Grade Level</th>
                    <th>Students No</th>
                    <th>Adviser</th>
                    <th>Room No.</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="classroom-data-body"></tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Classroom Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label class="form-label">Classroom Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Section</label>
                            <input type="text" class="form-control" id="editSection" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Grade Level</label>
                            <input type="text" class="form-control" id="editGrade" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Adviser</label>
                            <input type="text" class="form-control" id="editAdviser" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="editRoom" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
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
    const classroomData = [
        { id: 1, name: "Classroom A", section: "Section 1", grade: "Grade 6", adviser: "Mr. Rivera", room: "101", status: "Active", students: 30 },
        { id: 2, name: "Classroom B", section: "Section 2", grade: "Grade 7", adviser: "Ms. Cruz", room: "102", status: "Inactive", students: 25 },
        { id: 3, name: "Classroom C", section: "Section 3", grade: "Grade 8", adviser: "Mr. Santos", room: "103", status: "Active", students: 28 }
    ];

    let dataTable;

    function renderTable() {
        const tbody = $('#classroom-data-body');
        tbody.html('');
        let i = 1;

        classroomData.forEach(c => {
            const tr = $('<tr></tr>');
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(`<td>${c.name}</td>`);
            tr.append(`<td>${c.section}</td>`);
            tr.append(`<td>${c.grade}</td>`);
            tr.append(`<td class="text-center">${c.students || 0}</td>`);
            tr.append(`<td>${c.adviser}</td>`);
            tr.append(`<td class="text-center">${c.room}</td>`);
            tr.append(`<td class="text-center">${c.status}</td>`);
            tr.append(`
            <td class="text-center">
                <button class="btn btn-sm btn-success editBtn" data-id="${c.id}"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-danger deleteBtn" data-id="${c.id}"><i class="fa fa-trash"></i></button>
                <button class="btn btn-sm btn-primary viewBtn" data-id="${c.id}"><i class="fa fa-eye"></i></button>
            </td>
        `);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();
        dataTable = $('#classroom-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            columnDefs: [{ orderable: false, targets: 8 }]
        });

        $('.editBtn').click(function () {
            const id = $(this).data('id');
            const record = classroomData.find(e => e.id === id);
            if (record) {
                $('#editId').val(record.id);
                $('#editName').val(record.name);
                $('#editSection').val(record.section);
                $('#editGrade').val(record.grade);
                $('#editAdviser').val(record.adviser);
                $('#editRoom').val(record.room);
                $('#editStatus').val(record.status);
                $('#editStudents').val(record.students || 0); // Added
                new bootstrap.Modal(document.getElementById('editModal')).show();
            }
        });

        $('.deleteBtn').click(function () {
            const id = $(this).data('id');
            const index = classroomData.findIndex(e => e.id === id);
            if (index !== -1 && confirm("Are you sure you want to delete this classroom?")) {
                classroomData.splice(index, 1);
                renderTable();
            }
        });

        $('.viewBtn').click(function () {
            const id = $(this).data('id');
            //alert('test')
            const record = classroomData.find(e => e.id === id);
            if (record) {
                sessionStorage.setItem('classroom_id', JSON.stringify(record));
                location.href = 'index.php?page=contents/student/class_content';
            }
        });
    }



    $('#addNewBtn').click(function () {
        $('#editId').val('');
        $('#editName').val('');
        $('#editSection').val('');
        $('#editGrade').val('');
        $('#editAdviser').val('');
        $('#editRoom').val('');
        $('#editStatus').val('Active');
        $('#editStudents').val(0); // Added
        new bootstrap.Modal(document.getElementById('editModal')).show();
    });

    $('#editForm').submit(function (e) {
        e.preventDefault();
        const id = $('#editId').val();
        const students = parseInt($('#editStudents').val()) || 0; // Added

        if (id) {
            const index = classroomData.findIndex(e => e.id == id);
            if (index !== -1) {
                classroomData[index].name = $('#editName').val();
                classroomData[index].section = $('#editSection').val();
                classroomData[index].grade = $('#editGrade').val();
                classroomData[index].adviser = $('#editAdviser').val();
                classroomData[index].room = $('#editRoom').val();
                classroomData[index].status = $('#editStatus').val();
                classroomData[index].students = students; // Added
            }
        } else {
            const newId = classroomData.length ? classroomData[classroomData.length - 1].id + 1 : 1;
            classroomData.push({
                id: newId,
                name: $('#editName').val(),
                section: $('#editSection').val(),
                grade: $('#editGrade').val(),
                adviser: $('#editAdviser').val(),
                room: $('#editRoom').val(),
                status: $('#editStatus').val(),
                students: students // Added
            });
        }
        renderTable();
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    });

    $(document).ready(function () {
        renderTable();
    });

</script>