<div class="bg-white dashboard">
    
    <main id="" class="w-100 rounded-1" style="height: 90.5vh; overflow-y: auto;">
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <?php include $page . '.php' ?>
    </main>
    
</div>