
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="fonts/favicon.ico">

    <title>Entre</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	
    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Diet's Healthy</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="index.php">Início</a></li>
                  <li><a href="meet.html">Conheça</a></li>
                  <li><a href="#">Contato</a></li>
                </ul>
              </nav>
            </div>
          </div>

<form action="request_login.php"  method="post" class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nome</label>
    <div class="col-sm-4">
      <input type="text" name="user" required="required" maxlength="20" class="form-control form-control-login" id="inputEmail3" placeholder="user">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" name="password" required="required" class="form-control" id="inputPassword3" placeholder="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" id="login" class="btn btn-default">Log in</button>
    </div>
  </div>
</form>

          <div class="mastfoot">
            <div class="inner">
              <p>Copyright © 2016 Companhia Diet's Healthy. Todos os direitos reservados.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
