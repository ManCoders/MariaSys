<style>
    .dashboard::-webkit-scrollbar{
        display: none !important;
    }
</style>
<div class="bg-white dashboard rounded-2">
   
    <main id="" class="p-4 dashboard rounded-2" style="height: 89.5vh !important; overflow-y: scroll;">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include $page . '.php' ?>
  </main>
</div>  

