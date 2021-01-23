<?php include ("app/view/layout/header.inc.php"); ?>
    <header class="masthead" style="background-image: url('https://www.kids-world-travel-guide.com/images/xfrench_food_macarons_shutterstock_62967172-2.jpg.pagespeed.ic.1_Cll_AGWX.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1><?= SITE_NAME ?></h1>
              <span class="subheading">Commentaires</span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <table>
            <tr>
              <th>Id</th>
              <th>Date</th>
              <th>Commentaire</th>
              <th>Action</th>
            </tr>
            <?php foreach ($data['comments'] as $comment) { ?>
            <tr>

              <td><?= $comment["comment_ID"] ?></td>
              <td><?= $comment["comment_date"] ?></td>
              <td><?= $comment["comment_content"] ?></td>
              <td><a href="?module=comments&action=delete&id=<?= $comment["comment_ID"] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</a></td>

            </tr>
            <?php } ?>
            <tr>

              <th>Id</th>
              <th>Date</th>
              <th>Commentaire</th>
              <th>Action</th>

            </tr>
          </table>
        </div>
      </div>
    </div>
    <?php include ("app/view/layout/footer.inc.php"); ?>




