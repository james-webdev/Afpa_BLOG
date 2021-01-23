<!DOCTYPE html>
<html lang="<?= APP_LANG ?>">

<head>

  <meta charset="<?= APP_CHARSET ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Blog3">
  <meta name="author" content="">

  <title><?= PAGE_TITLE ?></title>

  <!-- Bootstrap core CSS -->
  <link href="webroot/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="webroot/css/my_css.css">
  <!-- Custom fonts for this template -->
  <link href="webroot/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="webroot/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

    <div class="container">


      <a class="navbar-brand" href="index.php"><?= SITE_NAME ?></a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catégories</a>
            <div class="dropdown-menu">
              <?php foreach($data['categories'] as $categories){ ?> 

                <a class="dropdown-item" href="?cat=<?= $categories['cat_id'] ?>"><?= $categories['cat_descr'] ?></a>
              
              <?php } ?>
             
              
            </div>
          </li>
          
          
          <?php if (!isset($_SESSION['user'])) { ?>  
          <li class="nav-item">
            <a class="nav-link" href="index.php?module=users&action=login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?module=users&action=register">S'inscrire</a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?module=users&action=logout">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>


    </div> 
    

  </nav>


     <?php $this->flashDisplayBS(); ?>
 
  
  
 

