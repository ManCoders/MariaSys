$(document).ready(function () {
  let dataTable;
  /* renderTable();
  function renderTable() {
    
  } */
  let tbody = $("#tb_data_body-1");
  tbody.html("");
  let i = 1;

  $.ajax({
    url: base_url + "/authentication/action.php?action=getLearner",
    method: "GET",
    dataType: "json",
    success: function (response) {
      if (response.status === 1) {
        const data = response.data;

        data.forEach((emp) => {
          let tr = $(
            `<tr class="text-sm p-0 table-row hand-cursor" data-id="${emp.learner_id}"></tr>`
          );
          tr.append(`<td class="text-center">${i++}</td>`);
          tr.append(
            `<td class="name-cell">${
              emp.family_name +
              " " +
              emp.suffix +
              " " +
              emp.given_name +
              " " +
              emp.middle_name[0] +
              "."
            }</td>`
          );
          tr.append(`<td class="select-cell">${emp.lrn}</td>`);
          tr.append(`<td class="select-cell">${emp.gender}</td>`);
          tr.append(`<td class="select-cell">${emp.created_at}</td>`);
          tr.append(`
                    <td class="text-center">
                      <form class="update-status-form">
                        <input type="hidden" name="learner_id" value="${
                          emp.learner_id
                        }">
                        <select class="form-select-sm reg-status-select" name="reg_status">
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

        if ($.fn.DataTable.isDataTable("#student-tbl-1")) {
          $("#student-tbl-1").DataTable().destroy();
        }

        dataTable = $("#student-tbl-1").DataTable({
          pageLength: 5,
          lengthMenu: [5, 10, 25],
          columnDefs: [{ orderable: false, targets: 4 }],
        });

        /* Update Registration Status */

        $("#student-tbl-1 tbody")
          .off("click")
          .on("click", "tr.table-row td.select-cell", function () {
            const dataId = $(this).closest("tr").data("id");
            alert(dataId)
            $("#postid").val(dataId);
            $("#postidform").attr(
              "action",
              "index.php?page=contents/student/view_learners"
            );
            $("#postidform").submit();

            setTimeout(() => {
              $.ajax({
                url: base_url + "authentication/action.php?action=getLearner",
                type: "GET",
                dataType: "json",
                success: function (res) {
                  if (res.status === 1) {
                    res.data.forEach((learner) => {
                      if (learner.learner_id == dataId) {
                        $("#studentStatus").text(learner.reg_status);
                        $("#learner_picture").attr(
                          "src",
                          base_url + learner.learner_picture
                        );
                        $("#infoLrn").text(learner.lrn);
                        $("#infoName").text(
                          learner.family_name +
                            " " +
                            learner.suffix +
                            ". " +
                            learner.given_name +
                            " " +
                            learner.middle_name[0]
                        );

                        $("#infoBirthdate").text(learner.birthdate);
                        const b = new Date(learner.birthdate);
                        const t = new Date();
                        const age =
                          t.getFullYear() -
                          b.getFullYear() -
                          (t <
                          new Date(t.getFullYear(), b.getMonth(), b.getDate())
                            ? 1
                            : 0);
                        $("#infoAge").text(age);
                        $("#infoGender").text(learner.gender);
                        $("#infoPlace").text(learner.birth_place);
                      }
                    });
                  }
                },
                error: function () {
                  console.error("Failed to load learners");
                },
              });
            }, 500);
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
  $(document).on("change", "select[name='reg_status']", function () {
    $(this).closest("form").submit();
    // alert("Status updated successfully!");
    $.ajax({
      url: base_url + "/authentication/action.php?action=updateLearnerReg",
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
});
