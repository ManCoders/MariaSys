$(document).ready(function () {
  $("#printSectionBtn").on("click", function () {
    var content = $("#printArea").html();
    var original = $("body").html();

    $("body").html(content);
    window.print();
    $("body").html(original);
  });

  let dataTable;

  function renderTable() {
    let tbody = $("#tb_data_body-2");
    tbody.html("");
    let i = 1;

    $.ajax({
      url: base_url + "/authentication/action.php?action=getTeacher",
      method: "GET",
      dataType: "json",
      success: function (response) {
        if (response.status === 1) {
          const data = response.data;

          data.forEach((emp) => {
            let tr = $(
              `<tr class="text-sm p-0 table-row hand-cursor select-option" data-id="${emp.parent_id}"></tr>`
            );
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(
              `<td class="name-cell select-cell">${
                emp.lastname +
                " " +
                emp.suffix +
                " " +
                emp.firstname +
                " " +
                emp.middlename[0] +
                "."
              }</td>`
            );
            tr.append(`<td class="grade-cell select-cell">${emp.email}</td>`);
            tr.append(`<td class="contact-cell select-cell">${emp.cpno}</td>`);
            tr.append(`<td>${emp.created_date}</td>`);
            tr.append(`
              <td class="text-center">
              <form class="update-status-form">
                        <input type="hidden" name="parent_id" value="${
                          emp.parent_id
                        }">
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
            `);

            tbody.append(tr);
          });

          // Only select name, grade, and contact cells
          $("#student-tbl-2 tbody")
            .off("click")
            .on("click", "tr.table-row td.select-cell", function () {
              const teacherId = $(this).closest("tr").data("id");
              $("#postteacherid").val(teacherId);
              $("#teacherpostform").attr(
                "action",
                "index.php?page=contents/teacher/teacher_view"
              );
              $("#teacherpostform").submit();
            });
          $(document).on("change", "select[name='reg_status_parent']", function () {
            $(this).closest("form").submit();
            $.ajax({
              url:
                base_url + "/authentication/action.php?action=reg_status_parent",
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

          if ($.fn.DataTable.isDataTable("#student-tbl-2")) {
            $("#student-tbl-2").DataTable().destroy();
          }

          dataTable = $("#student-tbl-2").DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            columnDefs: [{ orderable: false, targets: 4 }],
          });
        } else {
          Swal.fire("Error", response.message, "error");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", status, error);
        Swal.fire("Error", "Unable to fetch data from server.", "error");
      },
    });
  }

  renderTable();
});
