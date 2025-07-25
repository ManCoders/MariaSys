<?php
include 'header.php';
include 'footer.php';
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Page</title>
</head>

<body>
    <main id="main" class="start-page">
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-white border-0">
                        <h4 class="card-title">Start Page</h4>
                       
                    </div>
                    <div class="card-body bg-white">
                         <p class="card-text"> Welcome to Sta. Maria Central School - SY: <?php echo getSchoolYear('school_year_name'); ?> </p>
                        
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?php echo (initInstaller() ? 'installation/index.php' : 'src/index.php'); ?>"
                            class="btn btn-danger">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>