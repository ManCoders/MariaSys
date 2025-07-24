<style>
.fontSize {
    font-size: 15px !important;
}
</style>
<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class=""><i class="fa fa-folder-open text-primary me-2"></i>Parents Management</h4>
                <small class="text-muted">Manage and process parents' applications and concerns</small>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Parent
            </button>
        </div>
    </div>

    <!-- Scrollable View Cards -->
    <div class="parent-view-grid mt-4">
        <h5 class="text-muted mb-3">OverView Card</h5>
        <div class="row parent-card-scroll" id="parent-card-view"></div>
    </div>
    <div class="overviewContents col-md-12 col-12 d-flex flex-wrap align-items-start justify-content-center" style="height: 70vh; overflow-y: scroll;">
        <div class="col-md-5 col-5 rounded-3 shadow d-flex p-2 px-4 m-2 flex-row">
            <div class="image col-md-4 col-4 d-flex flex-column align-items-center justify-content=center">
                <img src="../../assets/image/users.png" alt="" style="width: 100px; height: 100px; border-radius: 50%;">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="fontSize">Status: </span>
                    <span class="ms-1 fw-bold text-muted fontSize">ACTIVE</span>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start justify-content-start col-md-8 col-8">
                <div class="d-flex flex-row">
                    <label class="fontSize">Name: </label>
                    <span class="text-center text-muted ms-1">NAME OF THE PARENTS</span>
                </div>
                <div class="d-flex flex-row">
                    <label class="fontSize">Gender: </label>
                    <span class="text-center text-muted ms-1">MALE</span>
                </div>
                <div class="d-flex flex-row">
                    <label class="fontSize">Gmail: </label>
                    <span class="text-center text-muted ms-1">parent@example.edu.ph</span>
                </div>
                <div class="button col-md-12 justify-content-end align-items-end d-flex">
                    <button class="btn btn-sm m-0 mb-2 viewBtnUsers">view</button>
                </div>
            </div>

        </div>

        <!-- SECOND SAMPLE USER -->
        <div class="col-md-5 col-5 rounded-3 shadow d-flex p-2 px-4 m-2 flex-row">
            <div class="image col-md-4 col-4 d-flex flex-column align-items-center justify-content=center">
                <img src="../../assets/image/users.png" alt="" style="width: 100px; height: 100px; border-radius: 50%;">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="fontSize">Status: </span>
                    <span class="ms-1 fw-bold text-muted fontSize">ACTIVE</span>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start justify-content-start col-md-8 col-8">
                <div class="d-flex flex-row">
                    <label class="fontSize">Name: </label>
                    <span class="text-center text-muted ms-1">NAME OF THE PARENTS</span>
                </div>
                <div class="d-flex flex-row">
                    <label class="fontSize">Gender: </label>
                    <span class="text-center text-muted ms-1">MALE</span>
                </div>
                <div class="d-flex flex-row">
                    <label class="fontSize">Gmail: </label>
                    <span class="text-center text-muted ms-1">parent@example.edu.ph</span>
                </div>
                <div class="button col-md-12 justify-content-end align-items-end d-flex">
                    <button class="btn btn-sm m-0 mb-2 viewBtnUsers">view</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Update Parent Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label class="form-label">Parent Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="editStudent" required>
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
                                <option>Declined</option>
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

<style>
.parent-view-grid .parent-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    background: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.parent-view-grid .parent-card h6 {
    margin: 0 0 5px 0;
    font-weight: bold;
}

.parent-view-grid .parent-card small {
    font-size: 0.85rem;
    color: #555;
}

/* ✅ Scroll container */
.parent-card-scroll {
    max-height: 350px;
    overflow-y: auto;
    padding-right: 10px;
}

.parent-card-scroll::-webkit-scrollbar {
    width: 8px;
}

.parent-card-scroll::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}
</style>

<script>
$('.viewBtnUsers').off('click').on('click', function() {
    const id = $(this).data('id');
    sessionStorage.setItem('teacher_id', id);
    location.href = 'index.php?page=contents/users/view_users';
});
</script>