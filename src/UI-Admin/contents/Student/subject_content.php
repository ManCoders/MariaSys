<section class="p-2">
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class=""><i class="fa fa-folder-open text-primary me-2"></i>Learner Claster</h4>
                <span>Master list of each sections</span>
            </div>
            <div>
                
                <button class="btn btn-success btn-sm" id="backPrevious">
                    <i class="fa fa-arrow-left"></i>Back
                </button>
                <br>
                <!-- <button class="btn btn-success btn-sm" id="addNewBtn">
                    <i class="fa fa-plus"></i> Add New Learner
                </button> -->
                
            </div>

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


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
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

        $('.viewBtn').click(function () {
            const id = $(this).data('id');
            const record = sampleData.find(e => e.id === id);
            if (record) {
                sessionStorage.setItem('learner_id', JSON.stringify(record));
                location.href = 'index.php?page=contents/student/masterlist';
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
            new bootstrap.Modal(document.getElementById('editModal')).show();
        });

        $('#backPrevious').click(function (){
            location.href = 'index.php?page=contents/subject';
        });

    }

    $('#editForm').submit(function (e) {
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
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    });


    $(document).ready(function () {
        renderTable();
    });
</script>