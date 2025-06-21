<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/custom-bs.min.css"> -->
</head>

<body>
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
    </div>




    <?php include "./UI-admin/index.php"; ?>

    <?php /* $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
<?php include $page . '.php' */ ?>


    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content ">
                <div class="modal-header bg-info">
                    <h5 class="modal-title  text-white">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn bg-info text-white" id='confirm' onclick=" ">Continue</button>
                    <button type="button" class="btn bg-info text-white" id="cancel"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="uni_modal" role='dialog'>
        <div class="modal-dialog  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn bg-info text-white" id='submit'
            onclick="$('#uni_modal form').submit()">Save</button> -->
                    <button type="button" class="btn bg-info text-white" id="cancel"
                        data-bs-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade " id="uni_modal_exit" role='dialog'>
        <div class="modal-dialog  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn bg-info text-white" id='exit' onclick="">Back</button> -->
                    <button type="button" class="btn bg-info text-white" id="cancel"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    .modal-dialog.large {
        width: 90%;
        height: 50%;
        max-width: inherit;
    }
</style>
<!-- Bootstrap 5 (no jQuery required) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script type="module" src="./js/bootstrap/bootstrap.bundle.min.js"></script> -->
<script>
    window.start_load = function () {
        $('body').prepend('<di id="preloader2"></di>')
    }
    window.end_load = function () {
        $('#preloader2').fadeOut('fast', function () {
            $(this).remove();
        })
    }
    window.uni_modal = function ($title = '', $url = '', $md = '') {
        start_load()
        $.ajax({
            url: $url,
            error: err => {
                console.log()
                alert("An error occured")
            },
            success: function (resp) {
                if (resp) {
                   /*  alert("Success") */
                    $('#uni_modal .modal-title').html($title);
                    $('#uni_modal .modal-body').html(resp);
                    if ($md == '')
                        $('#uni_modal .modal-dialog').removeAttr('class').addClass('modal-dialog');
                    else
                        $('#uni_modal .modal-dialog').addClass($md);
                    $('#uni_modal').modal('show');
                    end_load();
                }
            }
        })
    }


    window.display_modal = function ($title = '', $url = '', $md = '') {
        start_load()
        $.ajax({
            url: $url,
            error: err => {
                console.log()
                alert("An error occured")
            },
            success: function (resp) {
                if (resp) {
                    $('#uni_modal_exit .modal-title').html($title);
                    $('#uni_modal_exit .modal-body').html(resp);
                    if ($md == '')
                        $('#uni_modal_exit .modal-dialog').removeAttr('class').addClass('modal-dialog');
                    else
                        $('#uni_modal_exit .modal-dialog').addClass($md);
                    $('#uni_modal_exit').modal('show');
                    end_load();
                }
            }
        })
    }

    window._conf = function ($msg = '', $func = '', $params = []) {
        $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
        $('#confirm_modal .modal-body').html($msg)
        $('#confirm_modal').modal('show')
    }
    window.alert_toast = function ($msg = '', $bg = 'success') {
        $('#alert_toast').removeClass('bg-success')
        $('#alert_toast').removeClass('bg-danger')
        $('#alert_toast').removeClass('bg-info')
        $('#alert_toast').removeClass('bg-warning')

        if ($bg == 'success')
            $('#alert_toast').addClass('bg-success')
        if ($bg == 'danger')
            $('#alert_toast').addClass('bg-danger')
        if ($bg == 'info')
            $('#alert_toast').addClass('bg-info')
        if ($bg == 'warning')
            $('#alert_toast').addClass('bg-warning')
        $('#alert_toast .toast-body').html($msg)
        $('#alert_toast').toast({ delay: 3000 }).toast('show');
    }

</script>
</body>

</html>