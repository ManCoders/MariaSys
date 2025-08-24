$(document).ready(function () {
  $("#systemLogo").on("change", function (event) {
    const fileInput = event.target;
    const preview = $(".preview");

    preview.empty();

    const files = fileInput.files;
    for (const file of files) {
      if (file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.attr("src", e.target.result);
          $("input[name=system_logo]").attr("value", e.target.result);
        };
        reader.readAsDataURL(file);
      } else {
        const para = $("<p>").text(
          `File ${file.name} is not a valid image file.`
        );
        preview.append(para);
      }
    }
  });

  $("#profile").on("change", function (event) {
    const fileInput = event.target;
    const preview = $(".profilePict");

    preview.empty();

    const files = fileInput.files;
    for (const file of files) {
      if (file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.attr("src", e.target.result);
          $("input[name=user_profile]").attr("value", e.target.result);
        };
        reader.readAsDataURL(file);
      } else {
        const para = $("<p>").text(
          `File ${file.name} is not a valid image file.`
        );
        preview.append(para);
      }
    }
  });
  $("#profilePicInput").on("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      $("#profilePreview").attr("src", e.target.result);
    };
    reader.readAsDataURL(file);
  }
});


  $("body").on("submit", "#install-form", function (e) {
    e.preventDefault();
    $this = $(this);
    const inputs = $("input");
    const data = new FormData();
    data.append("action", "save_installation_data");
    const fileInput = $(".custom-file-input");
    for (let i = 0; i < inputs.length; i++) {
      if (
        $(inputs[i]).attr("name") &&
        $(inputs[i]).attr("name") != "system_logo"
      ) {
        data.append($(inputs[i]).attr("name"), $(inputs[i]).val());
      }
    }
    const selectedFile = fileInput[0].files[0];
    if (selectedFile) {
      data.append("system_logo", selectedFile);
    }

    if (!$this.hasClass("processing")) {
      $this.addClass("processing");
      $.ajax({
        url:
          base_url + "/authentication/action.php?action=save_installation_data",
        method: "POST",
        data: data,
        processData: false,
        contentType: false,
        dataType: "json",
        beforeSend: function () {
          $this.find("button").text("Processing...");
        },
        success: function (response) {
          if (response.status == 1) {
            $this.find("button").text("Installation Success!");
            Swal.fire({
              title: "Success!",
              text: response.message,
              icon: "success",
              toast: true,
              position: "top-end",
              timer: 3000,
              showConfirmButton: false,
            }).then(() => {
              window.location.href = base_url + "index.php";
            });
          } else {
            showError(response.message);
            $this.find("button").text("Please try again!");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("AJAX error:", textStatus, errorThrown);
        },
      });
    }
  });

  $("body").on("submit", "#login-form", function (e) {
    e.preventDefault();
    const $this = $(this);
    const username = $this.find("input[name=username]").val();
    const password = $this.find("input[name=password]").val();

    if (!$this.hasClass("processing")) {
      $this.addClass("processing");
      $.ajax({
        url: base_url + "/authentication/action.php?action=login",
        method: "POST",
        dataType: "json",
        data: {
          username: username,
          password: password,
        },
        beforeSend: function () {
          $this.find("button").text("Processing...");
        },
        success: function (response) {
          if (response.status == 1) {
            $this.find("button").text("Login Success!");
            Swal.fire({
              title: "Success!",
              text: response.message,
              icon: "success",
              toast: true,
              position: "top-end",
              timer: 3000,
              showConfirmButton: false,
            }).then(() => {
              window.location.href =
                base_url + response.redirect_url || base_url + "src/";
            });
            $this.removeClass("processing");
          } else {
            Swal.fire({
              title: "Error",
              text: response.message,
              icon: "error",
              toast: true,
              position: "top-end",
              timer: 3000,
              showConfirmButton: false,
            }),
              $this.find("button").text("Please try again!");
            $this.removeClass("processing");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("AJAX error:", textStatus, errorThrown);
          $$this.removeClass("processing");
        },
      });
    }
  });

  /*  $("body").on("submit", "#register-form", function (e) {
  e.preventDefault();
  const $this = $(this);
  const data = new FormData(this);

  if (!$this.hasClass("processing")) {
    $this.addClass("processing");
    $this.find("button[type='submit']").prop("disabled", true);

    $.ajax({
      url: base_url + "/authentication/action.php?action=register-form",
      method: "POST",
      data: data,
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function () {
        $this.find("button[type='submit']").html(
          '<i class="fas fa-spinner fa-spin me-1"></i> Processing...'
        );
      },
      success: function (response) {
        if (response.status == 1) {
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          }).then(() => {
            $(".modal").modal("hide"); // ✅ Correct usage
            window.location.reload();
          });
        } else {
          Swal.fire({
            title: "Failed!",
            text: response.message,
            icon: "error",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          });
          $this.find("button[type='submit']").text("Please try again!");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX error:", textStatus, errorThrown);
      },
      complete: function () {
        $this.removeClass("processing");
        $this.find("button[type='submit']").prop("disabled", false).text("Register");
      },
    });
  }
}); */
  $("body").on("submit", "#register-form", function (e) {
    e.preventDefault();
    const $form = $(this);

    if ($form.data("isSubmitted")) return; // prevent multiple submissions
    $form.data("isSubmitted", true);

    const formData = new FormData(this);
    const $btn = $form.find("button[type='submit']");

    $btn.prop("disabled", true);
    $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Processing...');

    $.ajax({
      url: base_url + "/authentication/action.php?action=register-form",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        if (response.status === 1) {
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          }).then(() => {
            $(".modal").modal("hide");
            window.location = response.redirect_url || window.location.href;
          });
        } else {
          Swal.fire({
            title: "Error",
            text: response.message,
            icon: "error",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          });
          $btn.text("Please try again!");
        }
      },
      error: function (jqXHR, textStatus, err) {
        console.error("AJAX error:", textStatus, err);
      },
      complete: function () {
        $form.data("isSubmitted", false);
        $btn
          .prop("disabled", false)
          .html('<i class="fas fa-user-plus me-1"></i> Register');
      },
    });
  });

  $("body").on("click", "#logout", function (e) {
    e.preventDefault();
    const $this = $(this);
    $.ajax({
      url: base_url + "authentication/action.php?action=logout",
      method: "POST",
      dataType: "json",
      beforeSend: function () {
        $this.html('<i class="fas fa-door-open me-2"></i>Logging out');
      },
      success: function (response) {
        if (response.status == 1) {
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          }).then(() => {
            window.location.href =
              response.redirect_url || base_url + "index.php";
          });
        } else {
          showError(response.message, "error", "Error!");
        }
      },
      error: function () {
        console.error("AJAX error");
      },
    });
  });

  /* $("body").on("submit", "#linkNewChild", function (e) {
    e.preventDefault();
    const $this = $(this);
    const data = new FormData(this);

    if (!$this.hasClass("processing")) {
      $this.addClass("processing");

      $.ajax({
        url: base_url + "/authentication/action.php?action=LinkNewChild",
        method: "POST",
        data: data,
        processData: false,
        contentType: false,
        dataType: "json",
        beforeSend: function () {
          $this.find("button[type='submit']").text("Processing..");
        },
        success: function (response) {
          if (response.status == 1) {
            Swal.fire({
              title: "Success!",
              text: response.message,
              icon: "success",
              toast: true,
              position: "top-end",
              timer: 3000,
              showConfirmButton: false,
            }).then(() => {
              $(".modal").hide("modal");
              window.location.reload();
            });
          } else {
            $this.find("button[type='submit']").text("Please try again!");
            $this.removeClass("processing");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("AJAX error:", textStatus, errorThrown);
          $this.removeClass("processing");
        },
        complete: function () {
          $this.removeClass("processing");
        },
      });
    }
  }); */
  $("body").on("submit", "#linkNewChild", function (e) {
    e.preventDefault();
    const $form = $(this);
    const formData = new FormData(this);
    const $btn = $form.find("button[type='submit']");

    if ($form.hasClass("processing")) return;
    $form.addClass("processing");
    $btn.prop("disabled", true).html('<i class="fas fa-spinner fa-spin me-1"></i> Submitting...');

    $.ajax({
      url: base_url + "/authentication/action.php?action=LinkNewChild",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",

      success: function (response) {
        if (response.status == 1) {
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          }).then(() => {
            $("#linkNewChild").closest(".modal").modal("hide"); // Correct modal close
            window.location.reload();
          });
        } else {
          Swal.fire({
            title: "Error",
            text: response.message || "Submission failed.",
            icon: "error",
            toast: true,
            position: "top-end",
            timer: 3000,
            showConfirmButton: false,
          });
          $btn.html('<i class="fa fa-save me-1"></i> Try Again');
        }
      },

      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX error:", textStatus, errorThrown);
        Swal.fire({
          title: "Error",
          text: "An unexpected error occurred.",
          icon: "error",
          toast: true,
          position: "top-end",
          timer: 3000,
          showConfirmButton: false,
        });
      },

      complete: function () {
        $form.removeClass("processing");
        $btn.prop("disabled", false).html('<i class="fa fa-save me-1"></i> Submit Request');
      },
    });
  });


  // kalokohan ni marco jean hahahahaha
  $(document).on("click", "#editGradeLevel", function () {
      const gradeLevelID = $(this).data('id');
      document.getElementById('editGradeLevelId').value = gradeLevelID;
      // const editModal = new bootstrap.Modal(document.getElementById('editGradeLevelModal'));
      // editModal.show();
      $("#editGradeLevelModal").show('modal');
  });
  $(document).on("click", "#editGradeLevel", function () {
      const gradeLevelID = $(this).data('id');
      document.getElementById('editGradeLevelId').value = gradeLevelID;
      
      // Fetch the existing grade level data first
      $.ajax({
          url: base_url + "authentication/action.php?action=getGradeLevel",
          method: "POST",
          data: { id: gradeLevelID },
          dataType: "json",
          success: function (response) {
              console.log('Get Grade Level Response:', response); // Debug log
              if (response.status === 1) {
                  // Populate the form with existing data
                  $('#gradeLevelValueID').val(response.data.grade_level_name);
                  
                  // Show the modal
                  const editModal = new bootstrap.Modal(document.getElementById('editGradeLevelModal'));
                  editModal.show();
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message || "Failed to load grade level data",
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "Failed to load grade level data",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          }
      });
  });
  $("body").on("submit", "#editGradeLevelForm", function (e) {
      e.preventDefault();
      const $form = $(this);

      if ($form.data("isSubmitted")) return; 
      $form.data("isSubmitted", true);

      const formData = new FormData(this);
      const $btn = $form.find("button[type='submit']");

      $btn.prop("disabled", true);
      $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Saving...');

      $.ajax({
          url: base_url + "authentication/action.php?action=updateGradeLevel",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
              console.log('Update Grade Level Response:', response); 
              if (response.status === 1) {
                  Swal.fire({
                      title: "Success!",
                      text: response.message,
                      icon: "success",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  }).then(() => {
                      $('#editGradeLevelModal').modal('hide');
                      window.location = response.redirect_url || window.location.href;
                  });
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message,
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
                  $btn.text("Please try again!");
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "An error occurred while updating. Please try again.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          },
          complete: function () {
              $form.data("isSubmitted", false);
              $btn
                  .prop("disabled", false)
                  .html('Save Changes');
          },
      });
  });

  $(document).on("click", "#deleteGradeLevel", function () {
      const deleteGradeLevelId = $(this).data('id');
      console.log('Setting deleteGradeLevelId:', deleteGradeLevelId);
      document.getElementById('deleteGradeLevelId').value = deleteGradeLevelId;
      const deleteModal = new bootstrap.Modal(document.getElementById('deleteGradeLevelModal'));
      deleteModal.show();
  });
  $("body").on("submit", "#deleteGradeLevelForm", function (e) { 
      e.preventDefault();
      const $form = $(this);

      // Debug form data
      const formData = new FormData(this);
      console.log('Form data being sent:');
      for (let [key, value] of formData.entries()) {
          console.log(key + ': ' + value);
      }

      if ($form.data("isSubmitted")) return; 
      $form.data("isSubmitted", true);

      const $btn = $form.find("button[type='submit']");
      $btn.prop("disabled", true);
      $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Deleting...');

      $.ajax({
          url: base_url + "authentication/action.php?action=deleteGradeLevel",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
              console.log('Delete Grade Level Response:', response); 
              if (response.status === 1) {
                  Swal.fire({
                      title: "Success!",
                      text: response.message,
                      icon: "success",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  }).then(() => {
                      $('#deleteGradeLevelModal').modal('hide');
                      window.location = response.redirect_url || window.location.href;
                  });
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message,
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
                  $btn.text("Please try again!");
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "An error occurred while deleting. Please try again.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          },
          complete: function () {
              $form.data("isSubmitted", false);
              $btn
                  .prop("disabled", false)
                  .html('Yes, delete'); 
          },
      });
  });

  $(document).on("click", "#editSection", function () {
      const sectionID = $(this).data('id');
      // document.getElementById('editSectionId').value = sectionID;
      $("#editSectionId").val(sectionID);
      // const editModal = new bootstrap.Modal(document.getElementById('editSectionModal'));
      $("#editSectionModal").show('modal');
      // editModal.show();
      $(document).on("submit", "#editSectionForm", function () {
          $.ajax({
          type: "post",
          url: base_url + "authentication/action.php?action=updateSection",
          data: $(this).closest("form").serialize(),
          dataType: "dataType",
          success: function (response) {
            if(response.status == 1){
              alert('successfully updated');
            }
          }
        });
      });
      
  });
  $(document).on("click", "#editSection", function () {
      const sectionID = $(this).data('id');
      document.getElementById('editSectionId').value = sectionID;
      $.ajax({
          url: base_url + "authentication/action.php?action=getSection",
          method: "POST",
          data: { id: sectionID },
          dataType: "json",
          success: function (response) {
              console.log('Get Grade Level Response:', response); 
              if (response.status === 1) {
                  $('#sectionNameValueID').val(response.data.section_name);
                  $('#sectionDescriptionValueID').val(response.data.section_description);
                  
                  const editModal = new bootstrap.Modal(document.getElementById('editSectionModal'));
                  editModal.show();
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message || "Failed to load grade level data",
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "Failed to load grade level data",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          }
      });
  });
  $("body").on("submit", "#editSectionForm", function (e) {
      e.preventDefault();
      const $form = $(this);

      if ($form.data("isSubmitted")) return; 
      $form.data("isSubmitted", true);

      const formData = new FormData(this);
      const $btn = $form.find("button[type='submit']");

      $btn.prop("disabled", true);
      $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Saving...');

      $.ajax({
          url: base_url + "authentication/action.php?action=updateSection",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
              console.log('Update Grade Level Response:', response); 
              if (response.status === 1) {
                  Swal.fire({
                      title: "Success!",
                      text: response.message,
                      icon: "success",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  }).then(() => {
                      $('#editSectionModal').modal('hide');
                      window.location = response.redirect_url || window.location.href;
                  });
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message,
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
                  $btn.text("Please try again!");
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "An error occurred while updating. Please try again.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          },
          complete: function () {
              $form.data("isSubmitted", false);
              $btn
                  .prop("disabled", false)
                  .html('Save Changes');
          },
      });
  });

  $(document).on("click", "#editClassroom", function () {
    const classroomID = $(this).data('id');
    $('#editClassroomsID').val(classroomID);
    // $("#editClassroomsModal").show('modal');
    $.ajax({
      type: "POST",
      url: base_url + "authentication/action.php?action=fetch_classroom",
      data: { id: classroomID },
      dataType: "json",
      success: function (response) {
        $('#classroomNameValueID').val(response.data.room_name);
        $('#classroomTypeValueID').val(response.data.room_type);
        const editModal = new bootstrap.Modal(document.getElementById('editClassroomsModal'));
        editModal.show();
      },
      error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "Failed to load classroom data",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          }
    });
  });
  $(document).on("submit" , "#editClassroomsForm", function () {
    // alert('Button clicked!');
      // e.preventDefault();
      const $form = $(this);

      if ($form.data("isSubmitted")) return; 
      $form.data("isSubmitted", true);

      const formData = new FormData(this);
      const $btn = $form.find("button[type='submit']");

      $btn.prop("disabled", true);
      $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Saving...');

      $.ajax({
          url: base_url + "authentication/action.php?action=edit_classroom",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
              console.log('Update Classroom Response:', response); 
              if (response.status === 1) {
                  Swal.fire({
                      title: "Success!",
                      text: response.message,
                      icon: "success",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  }).then(() => {
                      $('#editClassroomsModal').modal('hide');
                      window.location = response.redirect_url || window.location.href;
                  });
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message,
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
                  $btn.text("Please try again!");
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "An error occurred while updating. Please try again.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          },
          complete: function () {
              $form.data("isSubmitted", false);
              $btn
                  .prop("disabled", false)
                  .html('Save Changes');
          },
      });
  });
  $(document).on("click", "#deleteClassroom", function () {
    const classroom_id = $(this).data('id');
    $("#deleteClassroomId").val(classroom_id);
    $("#deleteClassroomsModal").show('modal');
    // alert('delete button delete');
  });
  $("body").on("submit", "#deleteClassroomForm", function (e) { 
      e.preventDefault();
      const $form = $(this);

      // Debug form data
      const formData = new FormData(this);
      console.log('Form data being sent:');
      for (let [key, value] of formData.entries()) {
          console.log(key + ': ' + value);
      }

      if ($form.data("isSubmitted")) return; 
      $form.data("isSubmitted", true);

      const $btn = $form.find("button[type='submit']");
      $btn.prop("disabled", true);
      $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Deleting...');

      $.ajax({
          url: base_url + "authentication/action.php?action=delete_classroom",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
              console.log('Delete Class Room Response:', response); 
              if (response.status === 1) {
                  Swal.fire({
                      title: "Success!",
                      text: response.message,
                      icon: "success",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  }).then(() => {
                      $('#deleteClassroomForm').modal('hide');
                      window.location = response.redirect_url || window.location.href;
                  });
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message,
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
                  $btn.text("Please try again!");
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "An error occurred while deleting. Please try again.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          },
          complete: function () {
              $form.data("isSubmitted", false);
              $btn
                  .prop("disabled", false)
                  .html('Yes, delete'); 
          },
      });
  });

  $(document).on("click", "#deleteSection", function () {
      const deleteSectionId = $(this).data('id');
      console.log('Setting deleteSectionId:', deleteSectionId);
      document.getElementById('deleteSectionId').value = deleteSectionId;
      const deleteModal = new bootstrap.Modal(document.getElementById('deleteSectionModal'));
      deleteModal.show();
  });
  $("body").on("submit", "#deleteSectionForm", function (e) { 
      e.preventDefault();
      const $form = $(this);

      // Debug form data
      const formData = new FormData(this);
      console.log('Form data being sent:');
      for (let [key, value] of formData.entries()) {
          console.log(key + ': ' + value);
      }

      if ($form.data("isSubmitted")) return; 
      $form.data("isSubmitted", true);

      const $btn = $form.find("button[type='submit']");
      $btn.prop("disabled", true);
      $btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Deleting...');

      $.ajax({
          url: base_url + "authentication/action.php?action=deleteSection",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
              console.log('Delete Section Response:', response); 
              if (response.status === 1) {
                  Swal.fire({
                      title: "Success!",
                      text: response.message,
                      icon: "success",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  }).then(() => {
                      $('#deleteSectionModal').modal('hide');
                      window.location = response.redirect_url || window.location.href;
                  });
              } else {
                  Swal.fire({
                      title: "Error",
                      text: response.message,
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      timer: 3000,
                      showConfirmButton: false,
                  });
                  $btn.text("Please try again!");
              }
          },
          error: function (jqXHR, textStatus, err) {
              console.error("AJAX error:", textStatus, err);
              Swal.fire({
                  title: "Error",
                  text: "An error occurred while deleting. Please try again.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
              });
          },
          complete: function () {
              $form.data("isSubmitted", false);
              $btn
                  .prop("disabled", false)
                  .html('Yes, delete'); 
          },
      });
  });
  $(document).on("submit", "#roomForm", function(e) { 
      e.preventDefault();
      
      const submitBtn = $(this).find('button[type="submit"]');
      const originalText = submitBtn.html();
      submitBtn.html('<i class="fa fa-spinner fa-spin me-1"></i> Saving...');
      submitBtn.prop('disabled', true);
      $.ajax({
          type: "POST",
          url: base_url + "authentication/action.php?action=create_classroom",
          data: $(this).serialize(),
          dataType: "json", 
          success: function(response) {
              submitBtn.html(originalText);
              submitBtn.prop('disabled', false);
              
              if (response.status === 1) {
                  Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    toast: true,
                    position: "top-end",
                    timer: 3000,
                    showConfirmButton: false,
                  }).then(() => {
                    $("#classRoomModal").closest(".modal").modal("hide"); // Correct modal close
                    // window.location.reload();
                  });
              } else {
                Swal.fire({
                  title: "Error",
                  text: response.message || "Submission failed.",
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  timer: 3000,
                  showConfirmButton: false,
                });
                $btn.html('<i class="fa fa-save me-1"></i> Try Again');
              }
          },
          error: function(xhr, status, error) {
              submitBtn.html(originalText);
              submitBtn.prop('disabled', false);
              
              // Check if it's a JSON parse error
              if (xhr.responseText && xhr.responseText.trim().startsWith('<')) {
                  console.error('Server returned HTML instead of JSON:', xhr.responseText);
                  alert('Server error: Invalid response format. Please check console for details.');
              } else {
                  alert('Request failed: ' + error);
              }
          }
      });
  });

  function showError(message, icon, title, url) {
    Swal.fire({
      title: title,
      text: message,
      icon: icon,
      toast: true,
      position: "top-end",
      timer: 3000,
      showConfirmButton: false,
    });
  }
});
