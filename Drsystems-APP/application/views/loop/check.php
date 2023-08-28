<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport"      content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"   content="">
    <meta name="author"        content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator"     content="Jekyll v3.8.5">
    <meta http-equiv="refresh" content="0; url=<?php echo $url; ?>">

    <title>user/ check</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  
    <div class="container">
        <div class="row">
            
            <div class="col-12 text-center">
              <img class="col-8 img-fluid" src="http://localhost/server/money/app/gold.png" alt="">
              <?php echo "<h1 class=\"text-uppercase\">" . $session['Firstname'] . " " . $session['Secondname'] . "</h1>";?>
            </div>
            <div class="col-12">
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
                <h6 class="mt-5 mb-3 text-muted"><?php echo $sha1; ?></h6>
            </div>
        </div>
    </div>    

</body>
</html>
