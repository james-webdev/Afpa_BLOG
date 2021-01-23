<?php
$html =<<<EOT
<!DOCTYPE html>
<html lang='fr'>
   <head>
   	<title>Mail confirmation</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>

    <style>
    	body {
    		width: 50%; 
    		margin:auto;
    		background-color:gray;
    	}

    	h1 {
    		color: red;
    		font-size: 3em;
    		text-align: center;
    	}

    	.part1 {
    		border: 5px solid pink;
    		text-align: center;
    		 font-siz:2em;
    		 padding: 50px;
    	}

    	.part2 {
				background-color:green;
    	}

    	.part3 {
    		display:flex;
    		flex-direction: row;
    		justify-content: space-around;
    		list-style: none;
    	}

    </style>
  </head>
  <body>
  	<h1>Bienvenue sur notre blog !</h1>
  	<div class='part1'>
      <p>Merci de votre inscription</p>
      <p>Clickquez <a href="$url/index.php?module=users&action=confirm&token=$token"> ici </a></p>
    </div>
  	<div>
  		<ul class='part2'>
  			<li>wakana</li>
  			<li>lino</li>
  			<li>trévis</li>
  		</ul>
  		<ul class='part3'>
  			<li><img src='https://source.unsplash.com/random/150x150'></li>
  			<li><img src='https://source.unsplash.com/random/150x150'></li>
  			<li><img src='https://source.unsplash.com/random/150x150'></li>
  		</ul>
  	</div>
  </body>
</html>
EOT;
