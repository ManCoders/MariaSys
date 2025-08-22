$("#printSectionBtn").on("click", function () {
  var content = $("#printArea").html();
  var original = $("body").html();

  $("body").html(content);
  window.print();
  $("body").html(original);
});

// Only select name, grade, and contact cells
$("#student-tbl-2 tbody")
  .off("click")
  .on("click", "tr.table-row td.select-cell", function () {
    const row = $(this).closest("tr");
    const userId = row.data("id");
    const userType = row.data("type");

    $("#postteacherid").val(userId);
    $("#postuserrole").val(userType);
    $("#teacherpostform").attr(
      "action",
      "index.php?page=contents/teacher/profile_view"
    );
    $("#teacherpostform").submit();
  });

$(document).on("change", "select[name='reg_status_parent']", function () {
  $(this).closest("form").submit();
  $.ajax({
    url: base_url + "/authentication/action.php?action=reg_status_parent",
    method: "POST",
    dataType: "json",
    data: $(this).closest("form").serialize(),
    success: function (response) {
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
    },
    error: function () {
      swal.fire({
        title: "Error",
        text: "Unable to update status.",
        icon: "error",
        position: "top-end",
        toast: true,
        timer: 3000,
        showConfirmButton: false,
      });
    },
  });
});

function renderTable(userRole = "all") {
  const tbody = $("#tb_data_body-2");
  tbody.html(`<tr><td colspan="7" class="text-center">Loading...</td></tr>`); // show loading
  let i = 1;

  $.ajax({
    url:
      base_url +
      "/authentication/action.php?action=getTeacher&role=" +
      userRole,
    method: "GET",
    dataType: "json",

    success: function (response) {
      tbody.empty(); // clear loading message
      if ($.fn.DataTable.isDataTable("#student-tbl-2")) {
        $("#student-tbl-2").DataTable().destroy();
        $("#tb_data_body-2").empty();
      }

      if (response.status === 1) {
        const data = response.data;

        data.forEach((emp) => {
          const id = emp.teacher_id ?? emp.parent_id ?? "";
          const userRoleText = emp.user_role ?? "";
          const fullName = `${emp.lastname ?? ""} ${emp.suffix ?? ""} ${
            emp.firstname ?? ""
          } ${emp.middlename?.[0] ?? ""}.`;

          const tr = $(`
            <tr class="text-sm p-0 table-row hand-cursor select-option" 
                data-id="${id}" data-type="${userRoleText}">
            </tr>
          `);

          tr.append(`<td class="text-center">${i++}</td>`);
          tr.append(`<td class="name-cell select-cell">${fullName}</td>`);
          tr.append(
            `<td class="grade-cell select-cell">${emp.email ?? ""}</td>`
          );
          tr.append(`<td class="grade-cell select-cell">${userRoleText}</td>`);
          tr.append(
            `<td class="contact-cell select-cell">${emp.cpno ?? ""}</td>`
          );
          tr.append(`<td>${emp.created_date ?? ""}</td>`);
          tr.append(`
            <td class="text-center">
              <form class="update-status-form">
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="user_role" value="${userRoleText}">
                <select class="form-select-sm reg-status-select" name="reg_status_parent">
                  <option value="Approved" ${
                    emp.reg_status === "Approved" ? "selected" : ""
                  }>Approved</option>
                  <option value="Rejected" ${
                    emp.reg_status === "Rejected" ? "selected" : ""
                  }>Rejected</option>
                  <option value="Pending" ${
                    emp.reg_status === "Pending" ? "selected" : ""
                  }>Pending</option>
                  <option value="Invalidation" ${
                    emp.reg_status === "Invalidation" ? "selected" : ""
                  }>Invalidation</option>
                </select>
              </form>
            </td>
          `);

          tbody.append(tr);
        });

        $("#student-tbl-2").DataTable({
          pageLength: 5,
          lengthMenu: [5, 10, 25],
          columnDefs: [{ orderable: false, targets: 6 }],
        });
      } else {
        tbody.html(
          `<tr><td colspan="7" class="text-center">No data found.</td></tr>`
        );
        Swal.fire("Error", response.message, "error");
      }
    },
    error: function (xhr, status, error) {
      tbody.html(
        `<tr><td colspan="7" class="text-center">Failed to load data.</td></tr>`
      );
      console.error("AJAX error:", status, error);
      Swal.fire("Error", "Unable to fetch data from server.", "error");
    },
  });
}

$(document).ready(function () {
  $(document).on("change", "#user-role-filter", function () {
    const selectedRole = $(this).val();
    renderTable(selectedRole);
  });
  renderTable("all");
});
