<style>
    .dashboard::-webkit-scrollbar{
        display: none !important;
    }
</style>
<div class="bg-white dashboard ">
   
    <main id="" class="p-4" style="height: 90vh; overflow-y: scroll;">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include $page . '.php' ?>
  </main>
</div>  

