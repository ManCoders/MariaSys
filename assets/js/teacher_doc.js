
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
                        let tr = $('<tr></tr>');
                        tr.append(`<td class="text-center">${i++}</td>`);
                        tr.append(`<td class="name-cell">${emp.teacher_name}</td>`);
                        tr.append(`<td>${emp.employeeid}</td>`);
                        tr.append(`<td>${emp.created_date}</td>`);
                        tr.append(`<td>${emp.cpno}</td>`);
                        tr.append(`<td class="text-center">${emp.teacher_status}</td>`);
                        tr.append(`
                        <td class="text-center">
                            <button class="btn btn-sm btn-success editBtn" data-id="${emp.teacher_id}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.teacher_id}"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.teacher_id}"><i class="fa fa-eye"></i></button>
                        </td>
                    `);
                        tbody.append(tr);
                    });

                    if ($.fn.DataTable.isDataTable('#student-tbl-2')) {
                        $('#student-tbl-2').DataTable().destroy();
                    }

                    dataTable = $('#student-tbl-2').DataTable({
                        pageLength: 5,
                        lengthMenu: [5, 10, 25],
                        columnDefs: [{ orderable: false, targets: 6 }]
                    });

                    $('.editBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        alert('Edit clicked for ID: ' + id);
                        // TODO: Populate and show modal for editing
                    });

                    $('.trashBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // TODO: Call backend to delete
                                alert('Deleted ID: ' + id);
                            }
                        });
                    });

                    $('.viewBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        sessionStorage.setItem('teacher_id', id);
                        location.href = 'index.php?page=contents/teacher/teacher_view';
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
    $('#childForm').submit(function (e) {
        e.preventDefault();


        const $form = $(this);
        const formData = new FormData(this); // Supports file + text data

        $.ajax({
            url: base_url + "/authentication/action.php?action=NewTeacher",
            method: "POST",
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            dataType: "json",
            beforeSend: function () {
                $form.find("button[type='submit']").html("Submitting...");
            },
            success: function (response) {
                Swal.fire({
                    title: response.status === 1 ? "Success!" : "Error",
                    text: response.message,
                    icon: response.status === 1 ? "success" : "error",
                    toast: true,
                    position: "top-end",
                    timer: 3000,
                    showConfirmButton: false,
                }).then(() => {
                    $('#childModal').modal('hide');
                    $form[0].reset();
                    renderTable();

                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.error("AJAX error:", textStatus, errorThrown);
                Swal.fire({
                    title: "Technical Error",
                    text: "Please contact the administration!",
                    icon: "error",
                    toast: true,
                    position: "top-end",
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    $('#childModal').modal('hide');
                    $form[0].reset();
                    renderTable();
                });
            },
            complete: function () {
                $form.find("button[type='submit']").html("Submit Request");
            }
        });
    });



    $(document).ready(function () {
        renderTable();

        $('#addNewBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#childModal').modal('show');
        });

        $('#employee_id').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 6) value = value.substring(0, 6);
            $(this).val(value);
        });
        $('#contact').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);
            $(this).val(value);
        });


        $('#childForm input, #childForm select, #childForm textarea').on('input change blur', function () {
            validateField($(this));
        });

        function validateField(field) {
            const val = field.val().trim();
            const name = field.attr('name');
            const type = field.attr('type');
            const isRequired = field.prop('required');

            // Remove previous error message
            field.removeClass('is-invalid');
            field.next('.error-feedback').remove();

            // Skip hidden fields
            if (field.is(':hidden')) return true;

            // LRN must be 12-digit number
            if (name === 'lrn' && val && !/^\d{6}$/.test(val)) {
                showError(field, "LRN must be exactly 12 digits.");
                return false;
            }

            // Required fields check
            if (isRequired && val === '') {
                showError(field, "This field is required.");
                return false;
            }

            // File validation
            if (type === 'file' && isRequired && field.prop('files').length === 0) {
                showError(field, "Please upload a file.");
                return false;
            }

            return true;
        }

        function showError(field, message) {
            field.addClass('is-invalid');
            if (field.next('.error-feedback').length === 0) {
                field.after(`<div class="error-feedback">${message}</div>`);
            }
        }
    });
});