<div class="bg-white vh-100 rounded dashboard">
    
    <main id="view-panel" >
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <?php include $page . '.php' ?>
    </main>
    
</div>