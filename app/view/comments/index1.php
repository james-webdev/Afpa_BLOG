<?php include("app/view/layout/header.inc.php"); ?>

<!-- Page Header -->
  <header class="masthead" style="background-image: url('https://www.kids-world-travel-guide.com/images/xfrench_food_macarons_shutterstock_62967172-2.jpg.pagespeed.ic.1_Cll_AGWX.jpg'')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1><?=SITE_NAME ?></h1>
            <span class="subheading">Commentaires</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    
    <div class="row">

      <div class="col-lg-8 col-md-10 mx-auto">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Author</th>
              <th scope="col">Commentair</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['comments'] as $article){ ?>
            <tr>
              <th scope="row"><?= $article['comment_date'] ?></th>
              <td><?= $article['comment_author'] ?></td>
              <td><?= $article['comment_content'] ?></td>
              <td><a class="confirm" href="?module=comments&action=supprimer&id=<?= $article['comment_ID'] ?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

      </div><!--col-->
    </div><!--row-->
   
  </div> <!--container-->


  <?php include("app/view/layout/footer.inc.php"); ?>

