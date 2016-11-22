
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

    <title>Cadastre-se</title>

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

<form action="requests.php" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nome</label>
    <div class="col-sm-4">
      <input type="text" name="user" required="required" class="form-control form-control-login" id="inputEmail3" placeholder="nome" pattern="[a-z\s]+$">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" name="password" required="required" class="form-control form-control-login" id="inputEmail3" placeholder="password">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">CPF</label>
    <div class="col-sm-4">
      <input type="text" name="cpf" required="required" maxlength="11" class="form-control form-control-login" id="inputEmail3" placeholder="cpf" pattern="[0-9]+$">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
    <div class="col-sm-4">
      <input type="email" name="email" required="required" class="form-control form-control-login" id="inputEmail3" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Telefone</label>
    <div class="col-sm-4">
      <input type="text" name="phone" required="required" maxlength="13" class="form-control form-control-login" id="inputEmail3" placeholder="telefone">
	  <!-- pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" -->
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Peso</label>
    <div class="col-sm-4">
      <input type="text" name="weight" required="required" class="form-control form-control-login" id="inputEmail3" placeholder="peso">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Altura</label>
    <div class="col-sm-4">
      <input type="text" name="height" required="required" class="form-control form-control-login" id="inputEmail3" placeholder="altura">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Idade</label>
    <div class="col-sm-4">
      <input type="number" name="age" required="required" maxlength="3" class="form-control" id="inputPassword3" placeholder="idade" pattern="[0-9]+$">
	  <input type="hidden" name="active" value="1">
	  
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" id="signin" class="btn btn-default">Sign in</button>
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
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
