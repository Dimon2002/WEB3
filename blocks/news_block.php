<div id=content>
   <?php 
      $rows = get_all_news();

      while ($row = $rows->fetch_assoc())
      { 
   ?>
      <div class="row g-0 rounded-4 background mb-4 text-white">
            <div class=" col-sm-12 col-md-12 col-lg-6 p-lg-4 p-4">
                <a href="Post.php?id=<?=$row["id"]?>"><img width="640" height="360" src="php/<?=$row["image_path"]?>" 
                    class="img-fluid rounded-4" alt="Картиночка"></a>               
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 p-4">
                <div class="pt-sm-0 pt-md-3 pt-lg-0">
                    <h1><a href="Post.php?id=<?=$row["id"]?>" class="d-inline-block nav-link mb-2 text-white "><?=$row["title"]?></a></h1>
                    <h5 class="card-text mb-auto text-white mt-4"><?=$row["preview"]?></h5>
                    <div class="date mb-2 text-white mt-4"><h4><?=$row["date"]?></h4></div>
                </div>
            </div>
      </div>

   <?php } ?>
</div>
