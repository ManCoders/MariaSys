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
