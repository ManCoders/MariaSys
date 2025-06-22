
    <title>Document Management</title>
    <style>
        .document-section .card {
            border-radius: 10px;
        }

        .table thead th {
            font-weight: 600;
        }

        .modal-title i {
            font-size: 1.2rem;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>

<section class="p-3 document-section">
    <div class="border-0 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold text-dark mb-0"><i class="fa fa-folder-open text-primary me-2"></i>Document Management</h4>
                <small class="text-muted">View and manage document hardcopies for reporting</small>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn"><i class="fa fa-plus"></i>Add New Document
            </button>
        </div>
    </div>

    <div class=" border-0 mb-4">
        <div class="table-responsive p-0">
            <table class="table table-hover align-middle mb-0" id="classroom-tbl">
                <thead class="table-light text-dark">
                    <tr>
                        <th class="text-center" style="width:4%">#</th>
                        <th>Document Title</th>
                        <th>Category</th>
                        <th>Grade Level</th>
                        <th>Owner</th>
                        <th>Reference Code</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="classroom-data-body"></tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fa fa-file-alt me-2"></i>Document Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId">
                    <div class="mb-2">
                        <label class="form-label">Document Title</label>
                        <input type="text" class="form-control" id="editName" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" id="editSection" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Grade Level</label>
                        <input type="text" class="form-control" id="editGrade" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Document Owner</label>
                        <input type="text" class="form-control" id="editAdviser" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Reference Code</label>
                        <input type="text" class="form-control" id="editRoom" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="editStatus">
                            <option>Active</option>
                            <option>Archived</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-white" type="submit">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

<script>
    const documentData = [
        { id: 1, name: "Form 137", section: "Student Records", grade: "Grade 6", adviser: "Ms. Reyes", room: "DOC-137", status: "Active" },
        { id: 2, name: "Attendance Log", section: "HR Reports", grade: "Grade 7", adviser: "Mr. Tan", room: "ATT-2025", status: "Archived" },
        { id: 3, name: "Health Clearance", section: "Medical", grade: "Grade 8", adviser: "Ms. Lim", room: "MED-CL", status: "Active" }
    ];

    let dataTable;

    function renderTable() {
        const tbody = $('#classroom-data-body');
        tbody.html('');
        let i = 1;

        documentData.forEach(doc => {
            const tr = $('<tr></tr>');
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(`<td>${doc.name}</td>`);
            tr.append(`<td>${doc.section}</td>`);
            tr.append(`<td>${doc.grade}</td>`);
            tr.append(`<td>${doc.adviser}</td>`);
            tr.append(`<td>${doc.room}</td>`);
            tr.append(`<td class="text-center">${doc.status}</td>`);
            tr.append(`
                <td class="text-center">
                    <button class="btn btn-sm btn-success editBtn" data-id="${doc.id}"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="${doc.id}"><i class="fa fa-trash"></i></button>
                </td>`);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();

        dataTable = $('#classroom-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            columnDefs: [{ orderable: false, targets: 7 }]
        });

        $('.editBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const doc = documentData.find(d => d.id === id);
            if (doc) {
                $('#editId').val(doc.id);
                $('#editName').val(doc.name);
                $('#editSection').val(doc.section);
                $('#editGrade').val(doc.grade);
                $('#editAdviser').val(doc.adviser);
                $('#editRoom').val(doc.room);
                $('#editStatus').val(doc.status);
                new bootstrap.Modal(document.getElementById('editModal')).show();
            }
        });

        $('.deleteBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const index = documentData.findIndex(d => d.id === id);
            if (index !== -1 && confirm("Are you sure you want to delete this document?")) {
                documentData.splice(index, 1);
                renderTable();
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
        new bootstrap.Modal(document.getElementById('editModal')).show();
    });

    $('#editForm').submit(function (e) {
        e.preventDefault();
        const id = $('#editId').val();
        if (id) {
            const index = documentData.findIndex(d => d.id == id);
            if (index !== -1) {
                documentData[index].name = $('#editName').val();
                documentData[index].section = $('#editSection').val();
                documentData[index].grade = $('#editGrade').val();
                documentData[index].adviser = $('#editAdviser').val();
                documentData[index].room = $('#editRoom').val();
                documentData[index].status = $('#editStatus').val();
            }
        } else {
            const newId = documentData.length ? documentData[documentData.length - 1].id + 1 : 1;
            documentData.push({
                id: newId,
                name: $('#editName').val(),
                section: $('#editSection').val(),
                grade: $('#editGrade').val(),
                adviser: $('#editAdviser').val(),
                room: $('#editRoom').val(),
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
