<div class="bg-white dashboard">
    
    <main id="" class="container-fluid table-responsive" style="height: calc(100vh - 100px); overflow-y: auto;">
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <?php include $page . '.php' ?>
    </main>
    
</div>