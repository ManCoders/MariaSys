<section class="p-3">
    <div class="row mb-3 align-items-center">
        <div class="col-md-6 mb-2 mb-md-0">
            <h4><i class="fa fa-folder-open text-primary me-2"></i>Classroom Management</h4>
            <span>Manage classrooms, sections, and rooms</span>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-5 d-flex align-items-center">
                    <p for="managementSelect" class=" w-100  mb-0">Select Manage</p>
                    <select id="managementSelect" class="form-select">
                        <option value="">Select Category</option>
                        <option value="sy">School Year</option>
                        <option value="section">Sections</option>
                        <option value="grade_level">Grade Levels</option>
                        <option value="classroom">Classrooms</option>

                    </select>
                </div>
                <div class="col-5 d-flex align-items-center">
                    <p for="managementSelect2" class="w-100 mb-0">Add Category</p>
                    <select id="managementSelect2" class="form-select">
                        <option value="">Select Category</option>
                        <option value="syModal">Add School Year</option>
                        <option value="classroom">Add Classroom</option>
                        <option value="section">Add Section</option>
                        <option value="grade_level">Add Grade Level</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <!-- CLASSROOM LIST -->
    <div id="classroomCards" class="row g-3">
        <h5 class="mb-3 text-success"><i class="fa fa-school me-2"></i>All Classrooms</h5>
        <div class="col-md-4">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h5 class="card-title">Grade 3 - Saturn</h5>
                    <p class="card-text">
                        <strong>Academic Year:</strong> 2025-2026<br />
                        <strong>Status:</strong> Active<br />
                        <strong>Start:</strong> August 20, 2025
                    </p>
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more dynamically -->
    </div>

    <!-- grade level list -->
    <div id="gradeLevelCards" class="row g-3 d-none">
        <h5 class="mb-3 text-primary"><i class="fa fa-layer-group me-2 mx-auto"></i>Grade Levels</h5>
        <div class="col-md-4">
            <div class="card shadow-sm border">
                <div class="card-body ">
                    <h5 class="card-title">Grade 1</h5>
                    <p class="card-text">
                        Example descriptionasdasdsad asdasdasdasdasd<br />
                    </p>
                    <select class="form-select w-50 mx-auto text-center" name="levelstatus" id="levelstatus">
                        <option value="Active">Active</option>
                        <option value="InActive">In Active</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit grade level Modal -->
    <div class="modal fade" id="editGradeLevelModal" tabindex="-1" aria-labelledby="editGradeLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content" id="editGradeLevelForm">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="editGradeLevelModalLabel">Edit Grade Level</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="grade_LevelID" id="editGradeLevelId">
                    <div class="mb-3">
                        <label for="gradeLevelValueID" class="form-label">Grade Level</label>
                        <input type="text" class="form-control" id="gradeLevelValueID" name="gradeLevel" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateGradeLevel" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="deleteGradeLevelModal" tabindex="-1" aria-labelledby="deleteGradeLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-none">
            <form method="POST" class="modal-content" id="deleteGradeLevelForm">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="deleteGradeLevelModalLabel">Delete Grade Level</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- CHANGE: from grade_LevelID to gradeLevelID -->
                    <input type="hidden" name="gradeLevelID" id="deleteGradeLevelId">
                    <div class="mb-3">
                        <h5 class="form-label">Are you sure you want to delete this grade level?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="deleteGradeLevel" class="btn btn-danger">Yes, delete</button>
                </div>
            </form>
        </div>
    </div>


    <!-- SECTION LIST -->
    <div id="sectionCards" class="row g-3 d-none">
        <h5 class="mb-3 text-primary"><i class="fa fa-layer-group me-2"></i>All Sections</h5>
        <div class="col-md-4">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h5 class="card-title">Section: Jupiter</h5>
                    <p class="card-text">
                        <strong>Description:</strong> Advanced learners<br />
                        <strong>Level:</strong> Grade 4
                    </p>
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editSectionModal" tabindex="-1" aria-labelledby="editSectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content" id="editSectionForm">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="editSectionModalLabel">Edit Section</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="sectionID"  id="editSectionId">
                    <div class="mb-3">
                        <label for="sectionNameValueID" class="form-label">Section name</label>
                        <input type="text" class="form-control" id="sectionNameValueID" name="sectionName" required>
                    </div>
                    <div class="mb-3">
                        <label for="sectionDescriptionValueID" class="form-label">Section Description</label>
                        <input type="text" class="form-control" id="sectionDescriptionValueID" name="sectionDescription" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updatesection" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="deleteSectionModal" tabindex="-1" aria-labelledby="deleteSectionModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-none">
            <form method="POST" class="modal-content" id="deleteSectionForm">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="deleteSectionModalLabel">Delete Section</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- CHANGE: from grade_LevelID to SectionID -->
                    <input type="hidden" name="sectionID" id="deleteSectionId">
                    <div class="mb-3">
                        <h5 class="form-label">Are you sure you want to delete this grade level?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="deleteSection" class="btn btn-danger">Yes, delete</button>
                </div>
            </form>
        </div>
    </div>


    <!-- ROOM LIST -->
    <div id="roomCards" class="row g-3 d-none">
        <h5 class="mb-3 text-warning"><i class="fa fa-door-closed me-2"></i>All Rooms</h5>
        <div class="col-md-4">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h5 class="card-title">Room 101</h5>
                    <p class="card-text">
                        <strong>Type:</strong> Lecture<br />
                        <strong>Status:</strong> Available
                    </p>
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="syCards" class="d-none row g-3">
        <h5 class="mb-3 text-warning"><i class="fa fa-door-closed me-2"></i>All School Years</h5>
        <div class="col-md-4">
            <div class="card shadow-sm border position-relative">
                <h3>sample data</h3>
                <button type="button" class="btn btn-close position-absolute top-0 end-0 m-2"><i
                        class="fa fa-times text-dark" id="btnClose"></i></button>

                <div class="card-body text-center">
                    <h5 class="card-title">School Year</h5>
                    <h5>2023-2024</h5>
                    <p class="card-text text-center">
                        <strong>Default:</strong>
                        <select class="form-select mt-1 w-50 mx-auto text-center" name="sy_default">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </p>
                </div>
            </div>


        </div>
    </div>



    <!-- Add Section Modal -->
    <div class="modal fade" id="sectionModal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="sectionForm">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Create Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Section Name</label>
                            <input type="text" name="section_name" class="form-control" placeholder="e.g. Jupiter">
                        </div>
                        <!--   <div class="mb-2">
                            <label>Grade Level :</label>
                            <select name="section_grade_level" class="form-select">
                                <option value="">Select Grade Level</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                        </div> -->
                        <div class="mb-2">
                            <label>Description</label>
                            <textarea name="section_desc" class="form-control"
                                placeholder="Optional description..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save me-1"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="gradeLevelModal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="gradeLevelForm">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Create Grade Level</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Grade Level Name</label>
                            <input type="text" name="grade_level_name" class="form-control" placeholder="e.g. Jupiter">
                        </div>
                        <div class="mb-2">
                            <label>Description</label>
                            <textarea name="grade_level_desc" class="form-control"
                                placeholder="Optional description..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save me-1"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Room Modal -->
    <div class="modal fade" id="classRoomModal" tabindex="-1" aria-labelledby="classRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="roomForm">
                    <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title text-white" id="editGradeLevelModalLabel">Create Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Room Number</label>
                            <input type="text" name="room_number" class="form-control" placeholder="e.g. Room 101">
                        </div>
                        <div class="mb-2">
                            <label>Room Type</label>
                            <select name="room_type" class="form-select">
                                <option value="">Select</option>
                                <option value="Lecture">Lecture</option>
                                <option value="Computer Lab">Computer Lab</option>
                                <option value="Science Lab">Science Lab</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit"><i class="fa fa-save me-1"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Add School Year Modal -->
    <div class="modal fade" id="syModal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="syForm">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title">Create School Year</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>School Year</label>
                            <select name="sy_name" class="form-select">
                                <?php
                                $currentYear = date('Y');
                                for ($i = 0; $i < 5; $i++) {
                                    $start = $currentYear + $i;
                                    $end = $start + 1;
                                    echo "<option value=\"{$start}-{$end}\">{$start} - {$end}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label>Status</label>
                            <select name="sy_status" class="form-select">
                                <option value="Active">Default</option>
                                <option value="inactive">In Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"><i class="fa fa-save me-1"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<script>
$(document).ready(function() {

    // SHOW LIST ONLY
    $('#managementSelect').on('change', function() {
        const selected = $(this).val();

        // Hide all list containers initially
        $('#classroomCards, #sectionCards, #roomCards, #gradeLevelCards, #syCards').addClass('d-none');

        switch (selected) {
            case 'classroom':
                $('#classroomCards').removeClass('d-none');
                break;

            case 'section':
                $('#sectionCards').removeClass('d-none').empty();
                $.ajax({
                    type: "GET",
                    url: base_url + "/authentication/action.php?action=getDatas",
                    data: {
                        type: 'sections'
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 1) {
                            $('#sectionCards').append(response.data);
                        } else {
                            alert(response.message || 'Something went wrong.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("Request failed. Please try again.");
                    }
                });
                break;
            case 'grade_level':
                $('#gradeLevelCards').removeClass('d-none').empty();
                $.ajax({
                    type: "GET",
                    url: base_url + "/authentication/action.php?action=getDatas",
                    data: {
                        type: 'grade_level'
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 1) {
                            $('#gradeLevelCards').append(response.data);
                        } else {
                            alert(response.message || 'Something went wrong.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("Request failed. Please try again.");
                    }
                });
                break;
            case 'sy':
                $('#syCards').removeClass('d-none').empty();

                $.ajax({
                    type: "GET",
                    url: base_url + "/authentication/action.php?action=getDatas",
                    data: {
                        type: 'school_year'
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 1) {
                            $('#syCards').append(response.data);
                        } else {
                            alert(response.message || 'Something went wrong.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        alert("Request failed. Please try again.");
                    }
                });
                break;

            default:
                // Optional: Hide all cards again in default
                $('#classroomCards, #sectionCards, #roomCards, #syCards').addClass('d-none');
                break;
        }

        // Reset dropdown to default after handling
        $(this).val('');
    });

    // OPEN MODALS ONLY
    $('#managementSelect2').on('change', function() {
        const selected = $(this).val();

        if (selected === 'classroom') {
            $('#classroomForm')[0].reset();
            $('#classRoomModal').modal('show');
        } else if (selected === 'grade_level') {
            $('#gradeLevelForm')[0].reset();
            $('#gradeLevelModal').modal('show');
        } else if (selected === 'section') {
            $('#sectionForm')[0].reset();
            $('#sectionModal').modal('show');
            $('#sectionForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: base_url + "/authentication/action.php?action=sections",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 1) {
                            swal
                                .fire({
                                    title: "Success",
                                    text: response.message,
                                    icon: "success",
                                    position: "top-end",
                                    toast: true,
                                    timer: 3000,
                                    showConfirmButton: false,
                                })
                                .then(() => {
                                    $(this).val('');
                                    window.location.reload();
                                });
                        } else {
                            swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                                position: "top-end",
                                toast: true,
                                timer: 3000,
                                showConfirmButton: false,
                            });
                        }
                    }
                });
            });
        } else if (selected === 'syModal') {
            $('#syForm')[0].reset();
            $('#syModal').modal('show');
            $('#syForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: base_url + "/authentication/action.php?action=schoolYear",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 1) {
                            swal
                                .fire({
                                    title: "Success",
                                    text: response.message,
                                    icon: "success",
                                    position: "top-end",
                                    toast: true,
                                    timer: 3000,
                                    showConfirmButton: false,
                                })
                                .then(() => {
                                    $(this).val('');
                                    window.location.reload();
                                });
                        } else {
                            swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                                position: "top-end",
                                toast: true,
                                timer: 3000,
                                showConfirmButton: false,
                            });
                        }
                    }
                });
            });


        }

        $(this).val(''); // Reset dropdown
    });
});
</script>