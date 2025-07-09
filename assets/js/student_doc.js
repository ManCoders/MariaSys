$(document).ready(function () {
    let dataTable;

    function renderTable2() {
        let tbody = $('#tb_data_body_student');
        tbody.html('');
        let i = 1;

        if ($.fn.DataTable.isDataTable('#student-tbl')) {
            $('#student-tbl').DataTable().clear().destroy();
        }

        $.ajax({
            url: base_url + "/authentication/action.php?action=getLearner",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 1) {
                    const data = response.data;

                    data.forEach(emp => {
                        let tr = $('<tr></tr>');

                        tr.append(`<td class="text-center">${i++}</td>`);
                        tr.append(`<td class="name-cell">${emp.family_name}, ${emp.given_name} ${emp.middle_name}.</td>`);
                        tr.append(`<td>${emp.lrn}</td>`);
                        tr.append(`<td>${emp.date}</td>`);
                        tr.append(`<td>${emp.parent_contact}</td>`);
                        tr.append(`<td>${emp.parent_name}</td>`);
                        tr.append(`<td class="text-center">${emp.learner_status}</td>`);

                        tr.append(`
                        <td class="text-center">
                            <button class="btn btn-sm btn-success editBtn" 
                                data-id="${emp.learner_id}"
                                data-lrn="${emp.lrn}"
                                data-lastname="${emp.family_name}"
                                data-firstname="${emp.given_name}"
                                data-middlename="${emp.middle_name}"
                                data-suffix="${emp.suffix}"
                                data-birth="${emp.birthdate}"
                                data-bplace="${emp.birth_place}"
                                data-gender="${emp.learner_gender}"
                                data-rel="${emp.religious}"
                                data-tongue="${emp.tongue}"
                                data-status="${emp.learner_status}"
                                data-grade="${emp.grade_level_id}"
                                data-year="${emp.school_year_name}"
                                data-note="${emp.notes}"
                                data-picture="${emp.learner_picture}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.learner_id}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.learner_id}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    `);

                        tbody.append(tr);
                    });

                    // Initialize DataTable after fresh rendering
                    dataTable = $('#student-tbl').DataTable({
                    pageLength: 5,
                    lengthMenu: [5, 10, 25],
                    columnDefs: [{ orderable: false, targets: 7 }]
                });

                    // Handle edit modal
                    $('.editBtn').off('click').on('click', function () {

                        const el = $(this);
                        $('#childModal').modal('show');
                        $('#learnerlabel').text('UPDATE LEARNER PERSONAL INFORMATION');

                        $('#childId').val(el.data('id'));
                        $('#studentLRN').val(el.data('lrn'));
                        $('#familyName').val(el.data('lastname'));
                        $('#givenName').val(el.data('firstname'));
                        $('#middleName').val(el.data('middlename'));
                        $('#suffix').val(el.data('suffix'));
                        $('#childBirthdate').val(el.data('birth'));
                        $('#birth_place').val(el.data('bplace'));
                        $('#gender').val(el.data('gender'));
                        $('#religious').val(el.data('rel'));
                        $('#tongue').val(el.data('tongue'));
                        $('#studentStatus').val(el.data('status'));
                        $('#grade_level').val(el.data('grade'));
                        $('#school_year_id').val(el.data('year'));
                        $('#notes').val(el.data('note'));

                        const picture = el.data('picture');
                        if (picture) {
                            $('#profilePreview').attr('src', base_url + '/authentication/' + picture);
                        } else {
                            $('#profilePreview').attr('src', '../assets/image/users.png');
                        }
                    });

                    // Trash button
                    $('.trashBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'This learner will be permanently deleted.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!'
                        }).then(result => {
                            if (result.isConfirmed) {
                                // TODO: Add delete AJAX call
                                alert('Deleting learner ID: ' + id);
                            }
                        });
                    });

                    // View button
                    $('.viewBtn').off('click').on('click', function () {
                        const id = $(this).data('id');
                        sessionStorage.setItem('learner_id', id);
                        location.href = 'index.php?page=contents/student/student_view';
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

    $(document).ready(function () {
        renderTable2();
        $('#addNewBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#profilePreview').attr('src', '../assets/image/users.png');
            $('#childModal').modal('show');
        });

        // LRN validation
        $('#studentLRN').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 12) value = value.substring(0, 12);
            $(this).val(value);
        });

        // Suffix validation
        $('#suffix').on('input', function () {
            let value = $(this).val().replace(/[^a-zA-Z]/g, '');
            if (value.length > 3) value = value.substring(0, 3);
            $(this).val(value);
        });

        // Live preview for uploaded image
        $('#profilePicInput').on('change', function () {
            const file = this.files[0];
            const preview = document.getElementById('profilePreview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '../assets/image/users.png';
            }
        });
    });
});