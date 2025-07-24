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
        <!-- <table class="table table-bordered table-hover mb-0" id="parent-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Parent Name</th>
                    <th>Student Name</th>
                    <th>Date Submitted</th>
                    <th>Contact Number</th>
                    <th>Type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="parent-data-body"></tbody>
        </table> -->
    </div>

    <!-- Scrollable View Cards -->
    <div class="parent-view-grid mt-4">
        <h5 class="text-muted mb-3">OverView Card</h5>
        <div class="row parent-card-scroll" id="parent-card-view"></div>
    </div>
    <div class="overviewContents col-md-12 col-12 d-flex flex-wrap">
        <div class="col-md-5 col-md-12 rounded-3 shadow d-flex p-2 m-2">

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
<!-- 
<script>
   
</script> -->