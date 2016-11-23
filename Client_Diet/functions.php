<?php
include('httpful.phar');


	
	function combo_foods(){
	$get_request = 'http://localhost/Diet/food/category?cod_category=category.id';

	$response = \Httpful\Request::get($get_request)->send();
	$array = json_decode($response->body, true);
	foreach ($array as $value => $key) {
		
	echo '<div class="checkbox"><label>
	<input type="checkbox" value="food.id">'.$key['food'].' - '.$key['calories'].'Kcal'.' - '.$key['category'].'</label>
	</div>';	
	}
	}
	
	function combo_objective(){
	$get_request = 'http://localhost/Diet/objective';

	$response = \Httpful\Request::get($get_request)->send();
	
	$array = json_decode($response->body, true);
	
	echo '<div class="form-group">
	<label>Objetivo</label>
	<select class="form-control">';
	foreach ($array as $value => $key) {
	echo '<option value="objective.id">'.$key['objective'].'</option>';
	}
	echo '</select></div>';
	}
	
	function table_foods(){
	$get_request = 'http://localhost/Diet/food/category?cod_category=category.id';

	$response = \Httpful\Request::get($get_request)->send();
	$array = json_decode($response->body, true);
	foreach ($array as $value => $key) {
		echo '<td colspan="1">'.$key['food'].'</td>';
		echo '<td colspan="1">'.$key['calories'].'</td>';
		echo '<td colspan="1">'.$key['category'].'</td></tr>';
	}
	}
	
	function diet(){
	$logado = $_SESSION['user'];
	//$id = $_SESSION['id'];
	$get_request = 'http://localhost/Diet/user/diet?cod_user=user.id&cod_diet=diet.id&1=user.id';

	$response = \Httpful\Request::get($get_request)->send();

	$array = json_decode($response->body, true);
	//$query= "SELECT cod_user, cod_diet, weight, height, dat_init, dat_final, ideal_weight FROM `user_diet` join user join diet WHERE ";
	echo 
    '<div class="panel panel-default">';
    $cod_diet="";
	foreach ($array as $value => $key) {
		$cod_diet = $key['cod_diet'];
		echo '<p>Minhas informações '.'</br>'. 'Seu peso: '.$key['weight'].'</br>'.'Seu peso ideal: '.$key['ideal_weight'].'</br>'.'Data inicial da dieta: '.$key['dat_init'].'</br>'.'Data final da dieta: '.$key['dat_final'].'</br>'.'</p>';
	}
	echo '</div>';
	
	$url = 'http://localhost/Diet/diet/food/objective/category?cod_food=food.id&cod_objective=objective.id&cod_category=category.id&cod_diet=diet.id&'.$cod_diet.'=diet.id';

	$response2 = \Httpful\Request::get($url)->send();
	
	$array2 = json_decode($response2->body, true);

	//$query = 'SELECT cod_diet, cod_food, schedule, objective, food, category, calories, amount FROM diet join objective join category join food join diet_food WHERE cod_diet=diet.id and cod_food=food.id and cod_objective=objective.id and cod_category=category.id and diet.id=1';

	echo'<table class="table"> 
			<thead> 
			<tr> <th>Horário</th> <th>Alimento</th> <th>Grupo Alimentar</th><th>Quantidade(g)</th> </tr>';
	foreach($array2 as $value2 => $key2){
		echo '<tr> <th scope="row">'.$key2['schedule'].'</th> <td>'.$key2['food'].'</td> <td>'.$key2['category'].'</td>'.'<td>'.$key2['amount'].'</td> </tr>';
	}
		echo '</thead> 
			<tbody> 
			</tbody> 
			</table>';

	}


?>
