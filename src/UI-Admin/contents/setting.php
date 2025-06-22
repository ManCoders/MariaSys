<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h4 class="mb-0">System Settings</h4>
                <small class="text-muted">Configure and manage basic system preferences</small>
            </div>
            <button class="btn btn-success btn-sm" id="addSettingBtn">
                <i class="fa fa-plus"></i> Add Setting
            </button>
        </div>

        <table class="table table-bordered table-hover mb-0" id="settings-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:5%">#</th>
                    <th>Setting Name</th>
                    <th>Value</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="settings-data-body"></tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="settingModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="settingForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">System Setting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="settingId">
                        <div class="mb-2">
                            <label class="form-label">Setting Name</label>
                            <input type="text" class="form-control" id="settingName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Value</label>
                            <input type="text" class="form-control" id="settingValue" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="settingDescription" rows="2"></textarea>
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
    const settingsData = [
        { id: 1, name: "System Name", value: "School Portal", description: "Main system title" },
        { id: 2, name: "Default Language", value: "English", description: "Interface language" },
        { id: 3, name: "Maintenance Mode", value: "Off", description: "System availability mode" }
    ];

    let dataTable;

    function renderSettingsTable() {
        const tbody = $('#settings-data-body');
        tbody.html('');
        let i = 1;

        settingsData.forEach(setting => {
            const tr = $('<tr></tr>');
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(`<td>${setting.name}</td>`);
            tr.append(`<td>${setting.value}</td>`);
            tr.append(`<td>${setting.description}</td>`);
            tr.append(`
                <td class="text-center">
                    <button class="btn btn-sm btn-success editBtn" data-id="${setting.id}"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="${setting.id}"><i class="fa fa-trash"></i></button>
                </td>`);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();
        dataTable = $('#settings-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 20],
            columnDefs: [{ orderable: false, targets: 4 }]
        });

        $('.editBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const record = settingsData.find(e => e.id === id);
            if (record) {
                $('#settingId').val(record.id);
                $('#settingName').val(record.name);
                $('#settingValue').val(record.value);
                $('#settingDescription').val(record.description);
                new bootstrap.Modal(document.getElementById('settingModal')).show();
            }
        });

        $('.deleteBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const index = settingsData.findIndex(e => e.id === id);
            if (index !== -1 && confirm('Delete this setting?')) {
                settingsData.splice(index, 1);
                renderSettingsTable();
            }
        });
    }

    $('#addSettingBtn').click(function () {
        $('#settingId').val('');
        $('#settingName').val('');
        $('#settingValue').val('');
        $('#settingDescription').val('');
        new bootstrap.Modal(document.getElementById('settingModal')).show();
    });

    $('#settingForm').submit(function (e) {
        e.preventDefault();
        const id = $('#settingId').val();
        if (id) {
            const index = settingsData.findIndex(e => e.id == id);
            if (index !== -1) {
                settingsData[index].name = $('#settingName').val();
                settingsData[index].value = $('#settingValue').val();
                settingsData[index].description = $('#settingDescription').val();
            }
        } else {
            const newId = settingsData.length ? settingsData[settingsData.length - 1].id + 1 : 1;
            settingsData.push({
                id: newId,
                name: $('#settingName').val(),
                value: $('#settingValue').val(),
                description: $('#settingDescription').val()
            });
        }
        renderSettingsTable();
        bootstrap.Modal.getInstance(document.getElementById('settingModal')).hide();
    });

    $(document).ready(function () {
        renderSettingsTable();
    });
</script>
