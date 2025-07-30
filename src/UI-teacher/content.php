<style>
    .dashboard::-webkit-scrollbar{
        display: none !important;
    }
</style>
<div class="bg-white dashboard rounded-2">
    
    <main id="" class="w-100 rounded-1 p-4 dashboard" style="height: 90vh; overflow-y: scroll !important; overflow-x: hidden !important;">
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <?php include $page . '.php' ?>
    </main>
    
</div>