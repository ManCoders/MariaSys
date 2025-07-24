<section class="p-2">
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class=""><i class="fa fa-folder-open text-primary me-2"></i>Classroom Management</h4>
                <span>Manage and process Classroom with departments</span>
            </div>
            <button class="btn btn-success btn-sm" id="addClassroom">
                <i class="fa fa-plus"></i> Add New Classroom
            </button>
        </div>
        <table class="table table-bordered table-hover   mb-0" id="student-tbl-1">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Academic Year</th>
                    <th>Grade Level</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Date Calenndar</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tb_data_body_Classroom"></tbody>
        </table>
    </div>

    <style>
        .modal-lg {
            max-width: 1200px;
            width: 90%;
        }

        .name-cell {
            max-width: 150px;
            /* adjust width as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <?php 
        date_default_timezone_set('Asia/Manila');
        $currentDate = date('Y-m-d'); 
    ?>
    <!-- Modal -->
    <div class="modal fade " id="classroomModal" tabindex="-1">
        <div class="modal-dialog  modal-md">
            <div class="modal-content ">
            
                <form id="classroomForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Create Classroom</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-2">
                            <label for="">Academic Year</label>
                            <select name="academic_year" id="" class="form-select">
                                <option value="">Select academic year</option>
                                <option value="">2024 - 2025</option>
                                <option value="">2025 - 2026</option>
                                <option value="">2026 - 2027</option>
                            </select>
                        </div>
                        <div class="m-2">
                            <label for="">Grade Level</label>
                            <select name="academic_year" id="" class="form-select">
                                <option value="">Select Grade Level</option>
                                <option value="">Kinder 1</option>
                                <option value="">kinder 2</option>
                                <option value="">grade 1</option>
                                <option value="">grade 2</option>
                                <option value="">grade 3</option>
                                <option value="">grade 4</option>
                                <option value="">grade 5</option>
                                <option value="">grade 6</option>
                            </select>
                        </div>
                        <div class="m-2">
                            <label for="">Section</label>
                            <select name="academic_year" id="" class="form-select">
                                <option value="">Select Section</option>
                                <option value="">JUPITURN</option>
                                <option value="">SATURN</option>
                                <option value="">EARTH</option>
                                <option value="">MARS</option>
                                <option value="">VENUS</option>
                                <option value="">URANUS</option>
                            </select>
                        </div>
                        <div class="m-2">
                            <label for="">Status</label>
                            <input type="text" class="form-control" value="Active" name="status" placeholder="Status">
                        </div>
                        <div class="m-2">
                            <label for="">School Calendar</label>
                            <input type="date" class="form-control" name="gradeLevel" value="<?= $currentDate ?>" placeholder="Grade Level">
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
    $(document).ready(function () {
        $('#addClassroom').click(function () {
            $('#classroomForm')[0].reset();
            $('#classroomModal').modal('show');
        });
    });

</script>
