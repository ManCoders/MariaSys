<?php
$teacher_id = 1;
?>
<section class="nav d-flex justify-content-evenly text-center m-3  w-90">
    <div class="card p-4 w-20 shadow" style="cursor:pointer;" id="total"><span id="total">0</span>
        <span>Total Students</span>
    </div>
    <div class="card p-4 w-20 shadow" style="cursor:pointer;" id="passed"><span id="Passed">0</span>
        <span>Promotion</span>
    </div>
    <div class="card p-4 w-20 shadow" style="cursor:pointer;" id="failed"><span id="Failed">0</span>
        <span>Retained</span>
    </div>
    <div class="card p-4 w-20 shadow" style="cursor:pointer;" id="retained"><span>0%</span> <span>Retained</span></div>
</section>
<section class="attendance-overview">
    <div class="overview-grid row g-3">

        <!-- Attendance Card with Tabs -->
        <div class="col-md-12 p-3">
            <div class=" m-2">
                <ul class="nav nav-tabs nav-justified w-100" id="sectionTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-sec1" data-bs-toggle="tab" data-bs-target="#sec1"
                            type="button" role="tab">
                            <?php echo get_section($teacher_id, 'section_name'); ?>
                        </button>
                    </li>
                </ul>


                <!-- Tab Content Per Section -->
                <div class="tab-content pt-3" id="sectionTabsContent">
                    <!-- Section 1 -->
                    <div class="tab-pane fade show active" id="sec1" role="tabpanel" aria-labelledby="tab-sec1">
                        <div class="card p-3">
                            <section class="p-2">
                                <div class="">
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <div>
                                            <h5 class=""><i class="fa fa-folder-open text-primary me-2"></i>Student
                                                Management</h5>
                                            <span>Manage and process student registration application</span>
                                        </div>
                                        <button class="btn btn-success btn-sm" id="addNewBtn" data-section="1">
                                            <i class="fa fa-plus"></i> Add New Learner
                                        </button>
                                    </div>
                                    <table class="table table-bordered table-hover " style="min-width: 95%;"
                                        id="student-tbl-1">
                                        <thead class="table-light text-dark">
                                            <tr>
                                                <th class="text-center" style="width:4%">#</th>
                                                <th>LRN</th>
                                                <th>Learner Complete Name</th>
                                                <th>Date Enrolled</th>
                                                <th>Parent Contact</th>
                                                <th>Type</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data_body"></tbody>
                                    </table>
                                </div>


                                <!-- Modal -->

                            </section>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>


<!-- Retained Modal -->
<div class="modal fade" id="retainedModal" tabindex="-1" aria-labelledby="retainedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="retainedModalLabel">Retained Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Display list or count of students who are retained here.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Total Modal -->
<div class="modal fade" id="totalModal" tabindex="-1" aria-labelledby="totalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="totalModalLabel">Total Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Show overall total students statistics here.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Passed Modal -->
<div class="modal fade" id="passedModal" tabindex="-1" aria-labelledby="passedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="passedModalLabel">Passed Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Display passed students summary or table.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Failed Modal -->
<div class="modal fade" id="failedModal" tabindex="-1" aria-labelledby="failedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="failedModalLabel">Failed Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                You can list failed students or explain why they failed.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Unified Modal (Place only once at the end of section) -->
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

<script>
    
</script>