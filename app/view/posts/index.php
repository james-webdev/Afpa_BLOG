<?php include("app/view/layout/header.inc.php"); ?>

<!-- Page Header -->
  <header class="masthead" style="background-image: url('https://www.kids-world-travel-guide.com/images/xfrench_food_macarons_shutterstock_62967172-2.jpg.pagespeed.ic.1_Cll_AGWX.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1><?=SITE_NAME ?></h1>
            <span class="subheading">Food in France</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="btn-group" role="group" aria-label="Basic example">
      <?php foreach($data['categories'] as $categories){ ?>
      <a class="nav-link active" href="?cat=<?= $categories['cat_id'] ?>"><button type="button" class="btn btn-secondary"><?= $categories['cat_descr'] ?></button></a>
      <?php } ?>
    </div>
    
    <div class="row">

      <div class="col-lg-8 col-md-10 mx-auto">

        
      	<?php foreach($data['posts'] as $article){ ?>
        <div class="post-preview">
          <a href="index.php?action=view&id=<?= $article['post_ID'] ?>">
            <h2 class="post-title">
              <?= $article['post_title'] ?>
            </h2>
            <h3 class="post-subtitle">
             <?= $article['post_content'] ?>...
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?= $article['display_name'] ?></a>
            on <?= $article['date'] ?></p>
            <p class="post-meta">catégorie 
            <a href="?cat=<?= $article['cat_id'] ?>"><?= $article['cat_descr'] ?></a>
            </p>
        </div>
    
        <?php } ?>

        

      </div><!--col-->
    </div><!--row-->
    Nombre = <?= $data['nb'] ?>
  </div> <!--container-->


  <?php include("app/view/layout/footer.inc.php"); ?>

