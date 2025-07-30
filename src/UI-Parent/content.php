<style>
    .dashboard::-webkit-scrollbar{
        display: none !important;
    }
</style>
<div class="bg-white h-100 rounded-2 dashboard w-100 p-4" style="overflow-y: scroll;">
    
    <main id="view-pane dashboard" >
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
        <?php include $page . '.php' ?>
    </main>
    
</div>