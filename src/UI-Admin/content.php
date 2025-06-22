<div class="bg-white dashboard">
   
    <main id="">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include $page . '.php' ?>
  </main>
</div>  

