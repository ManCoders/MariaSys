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
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4 class="card-title text-center">Start Page</h4>
                            <p class="card-text text-center">Welcome to the start page. Please proceed with the setup.</p>
                        </div>
                    <!-- <h1> <?php echo __DIR__ ?></h1> -->
                        <div class="card-body text-center">
                            <a href="<?php echo (initInstaller() ? "installation/index.php" : "src/index.php"); ?>" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

