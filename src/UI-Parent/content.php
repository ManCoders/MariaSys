<div class="bg-white h-100 rounded dashboard w-100 p-4" style="overflow-y: scroll;">
    
    <main id="view-panel" >
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <?php include $page . '.php' ?>
    </main>
    
</div>