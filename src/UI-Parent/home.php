<div class="container h-100">
  <!-- Dashboard Header -->
  <div class="text-center mb-2">
    <h3 class="fw-bold text-danger mb-0 ">Welcome to Parent Dashboard</h3>
    <p class="text-muted mb-2">Here are your children's profiles and their current statuses.</p>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#childModal" id="addChildBtn"> <i class="fa fa-user-plus me-3"></i>Enrolled Your Child </button>

  </div>
  <div class="modal fade" id="childModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="linkNewChild" enctype="multipart/form-data">
          <div class="modal-header bg-danger " style="border-bottom: 1px solid #ddd;">
            <h5 class="modal-title text-white">Link Child Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body d-flex flex-column align-items-center justify-content-center">


            <input type="hidden" name="parent_id" id="parentId"
              value="<?php echo isset($_SESSION['parentData']) ? $_SESSION['parentData']['parent_id'] : ''; ?>">

            <div class="row gap-1 col-md-12 d-flex justify-content-between">
              <div class="col-md-4 p-0">
                <div class="mb-2">
                  <label class="m-0" class="form-label">Student LRN <span class="text-danger">*</span></label>
                  <input type="text" name="lrn" id="lrn" placeholder="LRN (12 digits only)"
                    maxlength="12" class="form-control" pattern="\d{12}" required>
                </div>
              </div>
              <div class="col-md-3 p-0">
                <div class="mb-2">
                  <label class="m-0" class="form-label">Grade Level <span class="text-danger">*</span></label>
                  <select class="form-select" required id="gradeLevel" name="gradeLevel">
                        <option value="">Student Incoming Grade Level</option>
                        <option value="kindergarten">Kindergarten</option>
                        <option value="grade1">Grade 1</option>
                        <option value="grade2">Grade 2</option>
                        <option value="grade3">Grade 3</option>
                        <option value="grade4">Grade 4</option>
                        <option value="grade5">Grade 5</option>
                        <option value="grade6">Grade 6</option>
                    </select>
                </div>
              </div>
              <div class="col-md-2 p-0">
                <div class="mb-2">
                  <label class="form-label m-0">Nickname</label>
                  <input type="text" class="form-control" name="nickname" id="nickname"
                    placeholder="Enter nickname (optional)">
                </div>
              </div>
              <div class="col-md-2 p-0">
                <div class="mb-2">
                  <label class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row col-md-12 col-12 gap-2 d-flex justify-content-between">
              <div class="col-md-3  p-0 ">
                <div class="mb-2 p-0 m-0">
                  <label class="form-label">Family Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="family_name" id="familyName"
                    placeholder="Enter family name">
                </div>
              </div>
              <div class="col-md-3  p-0 ">
                <div class="mb-3 p-0 m-0">
                  <label class="form-label">Given Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="given_name" id="givenName"
                    placeholder="Enter given name">
                </div>
              </div>
              <div class="col-md-3  p-0 ">
                <div class="mb-3 p-0 m-0">
                  <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="middle_name" id="middleName"
                    placeholder="Enter middle name">
                </div>
              </div>
              <div class="col-md-2 p-0">
                <div class="mb-3 m-0 p-0">
                  <label for="suffix" class="form-label">Suffix</label>
                  <select class="form-select" name="suffix" id="suffix">
                    <option value="" selected>Select Suffix</option>
                    <option value="Jr">Jr</option>
                    <option value="Sr">Sr</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>

            </div>



            <div class="row col-md-12 gap-2 d-flex justify-content-between">
              <div class="col-md-4 p-0">
                <div class="mb-3">
                  <label for="religious" class="form-label">Religious Affiliation <span class="text-danger">*</span></label>
                  <select class="form-select" name="religious" id="religious">
                    <option value="">Select Religion</option>
                    <option value="Roman Catholic">Roman Catholic</option>
                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                    <option value="Evangelical">Evangelical</option>
                    <option value="Islam">Islam</option>
                    <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                    <option value="Aglipayan (IFI)">Aglipayan (IFI)</option>
                    <option value="Baptist">Baptist</option>
                    <option value="Born Again Christian">Born Again Christian</option>
                    <option value="Jehovah's Witness">Jehovah's Witness</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3 m-0 p-0">
                <div class="m-0">
                  <label class="form-label">Birthdate <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="birthdate" id="birthdate">
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="mb-2">
                  <label class="form-label">Birth Place</label>
                  <input type="text" class="form-control" name="birth_place" id="birthPlace"
                    placeholder="Enter birth place">
                </div>
              </div>
            </div>

            <div class="row col-md-12 gap-2 d-flex justify-content-between">
              <div class="col-md-6 p-0">
                <div class="mb-2">
                  <label class="form-label">Additional Notes</label>
                  <textarea class="form-control" name="notes" id="notes" rows="3"
                    placeholder="Any special instructions or information..."></textarea>
                </div>
                <div class="alert alert-light" style="border: 1px solid #d1ecf1; background-color: #e8f4fd; color: #0c5460;">
                  <i class="fa fa-info-circle me-2"></i>
                  <strong>Note:</strong> Your enrollment request will be verified by the school administration.
                  You will receive a notification once the verification is complete.
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="mb-2">
                  <label class="form-label">Profile Picture</label>
                  <div class="text-center mb-2 w-100">
                    <img id="profilePreview" src="../../assets/image/users.png" alt="Profile Preview"
                      class="img-thumbnail" style="height: 100px; width: 100px; border-radius: 50%;">
                  </div>
                  <input type="file" class="form-control" id="profilePicInput" name="profile_picture"
                    accept="image/*">
                  <small class="text-muted">Upload a clear image (JPG, PNG)</small>
                </div>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button class="btn btn-danger text-white" id="submitRequest" type="submit">
              <i class="fa fa-save me-1"></i>Submit Request
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<script>
/*   $(document).ready(function() {
    $("#submitRequest").click(function(e) {
      e.preventDefault();
      $(this).addClass("processing");
      
      setTimeout(() => {
        $(this).removeClass("processing");
        
      }, 2000);
    });
  }); */
</script>