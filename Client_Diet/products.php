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
<title>Produtos</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

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
<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Configurações</a></li>
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
<li><a href="diet.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Dieta</a></li>
<li class="active"><a href="products.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Produtos</a></li>
<li><a href="buy.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Onde comprar</a></li>
<li><a href="suport.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Suporte</a></li>
</ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
<div class="row">
<ol class="breadcrumb">
<li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
<li class="active">Produtos</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Produtos</h1>
</div>
</div><!--/.row-->

	<div class="panel panel-default">
	<div class="panel-body">
	<div class="bootstrap-table">
	<div class="fixed-table-toolbar">
	<div class="columns btn-group pull-right">
	<button class="btn btn-default" type="button" name="refresh" title="Refresh">
	<i class="glyphicon glyphicon-refresh icon-refresh"></i></button>
	<button class="btn btn-default" type="button" name="toggle" title="Toggle"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
	<div class="keep-open btn-group" title="Columns">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	<i class="glyphicon glyphicon-th icon-th">
	</i> 
	<span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><label><input type="checkbox" data-field="id" value="1" checked="checked"> Nome</label></li><li><label><input type="checkbox" data-field="name" value="2" checked="checked"> Calorias</label></li><li><label><input type="checkbox" data-field="price" value="3" checked="checked"> Peso</label></li></ul></div></div><div class="pull-right search"><input class="form-control" type="text" placeholder="Search"></div></div><div class="fixed-table-container"><div class="fixed-table-header"><table></table></div><div class="fixed-table-body"><div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div><table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
	<thead>
	<tr><th style=""><div class="th-inner sortable">Nome</div><div class="fht-cell"></div></th><th style=""><div class="th-inner sortable">Calorias<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div><div class="fht-cell"></div></th><th style=""><div class="th-inner sortable">Categoria</div><div class="fht-cell"></div></th></tr>
	</thead>
	<tbody><tr class="no-records-found">
	<?php
	table_foods();

	?>
	
	</tr>
	</tbody></table></div><div class="fixed-table-pagination"><div class="pull-left pagination-detail"><span class="pagination-info">Showing 1 to 0 of 0 rows</span><span class="page-list"><span class="btn-group dropup"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="page-size">10</span> <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li class="active"><a href="javascript:void(0)">10</a></li><li><a href="javascript:void(0)">25</a></li><li><a href="javascript:void(0)">50</a></li><li><a href="javascript:void(0)">100</a></li></ul></span> records per page</span></div><div class="pull-right pagination"><ul class="pagination"><li class="page-first disabled"><a href="javascript:void(0)">&lt;&lt;</a></li><li class="page-pre disabled"><a href="javascript:void(0)">&lt;</a></li><li class="page-next disabled"><a href="javascript:void(0)">&gt;</a></li><li class="page-last disabled"><a href="javascript:void(0)">&gt;&gt;</a></li></ul></div></div></div></div>
	
	<div class="clearfix"></div>
	</div>
	</div>


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
</body>

</html>
