<?php
	session_start();
	$logado = $_SESSION['user'];
	include('functions.php');
	
	
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="fonts/favicon.ico">
<title>Sua Dieta</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">



</script>


<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Diet's Healthy</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
						<?php
						echo $logado;
						?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Perfil</a></li>
							<li><a href="exit.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sair</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="home.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="active"><a href="diet.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Dieta</a></li>
			<li><a href="products.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Produtos</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sua Dieta</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sua Dieta</h1>
			</div>
		</div><!--/.row-->	
		<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
	<div class="panel panel-default">
					<div class="panel-body tabs">
					
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">Dieta</a></li>
							<li class=""><a href="#pilltab2" data-toggle="tab">Nova Dieta</a></li>
							
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane fade active in" id="pilltab1">
								<?php
								diet();
								?>
							</div>
							<div class="tab-pane fade" id="pilltab2">
								<div class="col-md-8">

								<div class="form-group" id="diet1">
								<form id="newDiet" action="new_diet.php" method="post"  class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-4 control-label">Data Inicial</label>
										<div class="col-sm-6">
										<input type="date" name="dat_init" required="required" maxlength="11" class="form-control form-control-login" placeholder="" >
										</div>
										 </div>
										<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">Data Final</label>
										 <div class="col-sm-6">
										<input type="date" name="dat_final" required="required" maxlength="11" class="form-control form-control-login" placeholder="" >
											</div>
										</div>
										<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">Peso Ideal</label>
										<div class="col-sm-3">
										<input type="text" name="ideal_weight" required="required" maxlength="11" class="form-control form-control-login" placeholder="" >
										</div>
										</div>
										<?php
										combo_objective();
										?>								
								    <div class="form-group">
							 	  <div class="col-sm-offset-2 col-sm-8">
							        <button type="submit" class="btn btn-default">Next</button>
							      </div>
							    </div>
								 </form>
								 </div>

								 <div class="form-group" id="next1" style="display :none;">	
								 <form action="request_diet1.php" method="post" class="form-horizontal">
								 <div class="form-group" id="newSchedule">
								<label for="inputEmail3" class="col-sm-4 control-label">Horário</label>
								<div class="col-sm-5">
								<input type="time" name="schedule" required="required" class="form-control form-control-login" placeholder="" >
								</div>
								</div>								
								<?php
								newDiet2();
								?>
								<div class="col-sm-4"> </div>


								<div class="form-group">
							 	<div class="col-sm-offset-2 col-sm-8">
							    <button type="submit" class="btn btn-default">Criar</button>
							    </div>
								</div>
								</form>
								</div>				

							</div>
							</div>
	
						</div>
					</div>
	</div>
		

		</div><!--/.row-->

	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
	<script type="text/javascript">



	 function mudarSelecao() {

	 	var id = $('#cod_category').val();
	 	var url =  window.location.protocol+ '//'+ window.location.hostname +'/Diet/food?cod_category=category.id&%27'+id+'%27=category.id';

	 	$.get( url, function( data ) {
		    var jsonObj = $.parseJSON(data);

		    var selectbox = $('#cod_food');
			selectbox.empty();
			for (var i = 0, l = jsonObj.length; i < l; i++) {
				var item = jsonObj[i];
				selectbox.append($('<option>', {
				 value: item.id,
				 text: item.food
				}));
			}
		});	     
	 };

	$(document).ready(function(){
		$('#newDiet').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "new_diet.php",
				data: dados,
				success: function( data )
				{
					alert( data );
					jQuery('#next1').css('display','block');
					jQuery('#diet1').css('display','none');


				}
			});
			
			return false;
		});

	});

	$('#cod_category').change(function() {
		mudarSelecao();
   })
	</script>	
	
</body>

</html>
