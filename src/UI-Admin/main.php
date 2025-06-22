<!-- DataTables + Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Bootstrap (Modal & Toast) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    body {
        padding: 30px;
        background: #f4f4f4;
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="../css/style.css">

    <!-- ✅ CDN Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        .modal-dialog.large {
            width: 95%;
            max-width: inherit;
        }
    </style>
</head>

<body>
<?php include "sidebar.php" ?>
    <!-- ✅ Toast Notification -->
    <div class="toast align-items-center text-white bg-success position-fixed top-0 end-0 m-3" id="alert_toast"
        role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>

    <?php include "./dashboard.php"; ?>
    <?php /* $page = isset($_GET['page']) ? $_GET['page'] : 'home'; include $page . '.php'; */ ?>

    <!-- ✅ Modals -->

    <!-- ✅ Confirm Modal -->
    <div class="modal fade" id="confirm_modal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Confirmation</h5>
                </div>
                <div class="modal-body" id="delete_content"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="confirm">Continue</button>
                    <button type="button" class="btn btn-secondary back" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Universal Modal -->
    <div class="modal fade" id="uni_modal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary back" data-bs-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Exit Modal -->
    <div class="modal fade" id="uni_modal_exit" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary back" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Preloader & Back to Top -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- ✅ JS: Core Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ JS: DataTables + Export -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        // ✅ Preloader
        window.start_load = function () {
            if (!$('#preloader').length) {
                $('body').prepend('<div id="preloader"></div>');
            }
        };
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.back').forEach(btn => {
                btn.addEventListener('click', () => location.reload());
            });
            document.querySelectorAll('.back').forEach(btn => {
                btn.addEventListener('click', () => location.reload());
            });
        });

        window.end_load = function () {
            $('#preloader').fadeOut('fast', function () {
                $(this).remove();

            });

        };

        // ✅ Modal with Form
        window.uni_modal = function (title = '', url = '', md = '') {
            start_load();
            $.ajax({
                url: url,
                error: err => {
                    console.error(err);
                    alert("An error occurred");
                },
                success: function (resp) {
                    if (resp) {
                        $('#uni_modal .modal-title').html(title);
                        $('#uni_modal .modal-body').html(resp);
                        $('#uni_modal .modal-dialog').attr('class', 'modal-dialog ' + md);
                        $('#uni_modal').modal('show');
                        end_load();
                    }

                }
            });
        };

        // ✅ Modal without submit
        window.display_modal = function (title = '', url = '', md = '') {
            location.reload();
            start_load();
            $.ajax({
                url: url,
                error: err => {
                    console.error(err);
                    alert("An error occurred");
                },
                success: function (resp) {
                    if (resp) {
                        $('#uni_modal_exit .modal-title').html(title);
                        $('#uni_modal_exit .modal-body').html(resp);
                        $('#uni_modal_exit .modal-dialog').attr('class', 'modal-dialog ' + md);
                        $('#uni_modal_exit').modal('show');
                        end_load();

                    }
                }
            });
        };

        // ✅ Confirm Action Handler
        window._conf = function (msg = '', func = '', params = []) {
            $('#confirm_modal #confirm').attr('onclick', func + '(' + params.join(',') + ')');
            $('#confirm_modal #delete_content').html(msg);
            $('#confirm_modal').modal('show');
        };

        // ✅ Toast Notification
        window.alert_toast = function (msg = '', bg = 'success') {
            const toastEl = document.getElementById('alert_toast');
            const toast = new bootstrap.Toast(toastEl);
            $('#alert_toast')
                .removeClass('bg-success bg-danger bg-warning bg-info')
                .addClass('bg-' + bg);
            $('#alert_toast .toast-body').html(msg);
            toast.show();
        };
    </script>
</body>

</html>