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

  $("body").on("submit", "#register-form", function (e) {
    e.preventDefault();
    const $this = $(this);
    const data = new FormData(this);

    if (!$this.hasClass("processing")) {
      $this.addClass("processing");

      $.ajax({
        url: base_url + "/authentication/action.php?action=register-form",
        method: "POST",
        data: data,
        processData: false,
        contentType: false,
        dataType: "json",
        beforeSend: function () {
          $("#nextBtn button").text("Processing...");
        },
        success: function (response) {
          if (response.status == 1) {
            showError(response.message, "success", "Success!", response.redirect_url);
            $this.removeClass("processing");
          } else {
            showError(response.message, 'error', 'Error!', response.redirect_url);
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
  });

  $("body").on("click", "#logout", function (e) {
    e.preventDefault();
    const $this = $(this);
    $.ajax({
      url: base_url + "authentication/action.php?action=logout",
      method: "POST",
      dataType: "json",
      beforeSend: function () {
        $this.text("Logging out...");
      },
      success: function (response) {
        if (response.status == 1) {
          showError(response.message, "success", "Success!", response.redirect_url);
        } else {
          showError(response.message, 'error', 'Error!');
        }
      },
      error: function () {
        console.error("AJAX error");
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
    }).then(() => {
      window.location.href = base_url + url;
    });
  }
});
