
$(document).ready(function () {
    let dataTable;

    function renderTable() {
        let tbody = $('#tb_data_body-2');
        tbody.html('');
        let i = 1;

        $.ajax({
            url: base_url + "/authentication/action.php?action=getTeacher",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 1) {
                    const data = response.data;

                    data.forEach(emp => {
                        let tr = $(`<tr class="text-sm p-0 table-row hand-cursor" data-id="${emp.parent_id}"></tr>`);
                        tr.append(`<td class="text-center">${i++}</td>`);
                        tr.append(`<td class="name-cell">${emp.lastname +' '+emp.suffix+' '+emp.firstname+' '+emp.middlename[0]+'.'}</td>`);
                        tr.append(`<td>${emp.email}</td>`);
                        tr.append(`<td>${emp.cpno}</td>`);
                        tr.append(`<td>${emp.created_date}</td>`);
                        tr.append(`<td class="text-center">${emp.reg_status}</td>`);
                        
                        tbody.append(tr);
                    });

                    if ($.fn.DataTable.isDataTable('#student-tbl-2')) {
                        $('#student-tbl-2').DataTable().destroy();
                    }

                    dataTable = $('#student-tbl-2').DataTable({
                        pageLength: 5,
                        lengthMenu: [5, 10, 25],
                        columnDefs: [{ orderable: false, targets: 4 }]
                    });

                    $('#student-tbl-2 tbody').off('click').on('click', 'tr.table-row', function () {
                        const teacherId = $(this).data('id');
                        alert("Clicked Teacher ID: " + teacherId);

                    });

                } else {
                    Swal.fire("Error", response.message, "error");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                Swal.fire("Error", "Unable to fetch data from server.", "error");
            }
        });

    }
    
    renderTable();
});