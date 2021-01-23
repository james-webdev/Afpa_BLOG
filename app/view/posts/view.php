<?php include("app/view/layout/header.inc.php"); ?>




  <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?= $data['post']["post_img_url"] ?>')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= $data['post']["post_title"] ?></h1>
            
            <span class="meta">Posted by
              <a href="#"><?= $data['post']["display_name"] ?></a>
              on <?= $data['post']["post_date"] ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <p><?= $data['post']["post_content"] ?></p>

          <a href="#">
             <img class="img-fluid" src="<?= $data["post"]["post_img_url"]?>" alt="">
          </a>
          

        </div>
      </div>
    </div>
  </article>
  <div class="container">
  	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
    <?php foreach($data['comments'] as $commentaire){ ?>
	      <div class="card">
	        <div class="card-body d_flex justify-content-center">
			      <h5> <?= $commentaire["display_name"] ?><i class="fa fa-comment-o"></i></h5>
			       <p><?= $commentaire["comment_content"] ?></p>
			       <p class="text-info h6"><?=$commentaire['date']?></p>
	        </div>
     		</div>
      
      <?php } ?>
    	</div>
		</div>
  
	</div>

 

<?php include("app/view/layout/footer.inc.php"); ?>