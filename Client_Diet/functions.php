<?php
//include('../Diet/db/db_manager.php');
include('httpful.phar');


	
	function combo_alimentos(){
	$get_request = 'http://localhost/Diet/food/category?cod_category=category.id';

	$response = \Httpful\Request::get($get_request)->send();
	$array = json_decode($response->body, true);
	foreach ($array as $value => $key) {
		
	echo '<div class="checkbox"><label>
	<input type="checkbox" value="food.id">'.$key['food'].' - '.$key['calories'].'Kcal'.' - '.$key['category'].'</label>
	</div>';	
	}
	}
	
	function combo_objetivo(){
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
	
	function table_diet(){																		
	$get_request = 'http://localhost/Diet/user/diet?cod_user=user.id&cod_diet=diet.id&user='.$_SESSION['user'];

	$response = \Httpful\Request::get($get_request)->send();
	
	$array = json_decode($response->body, true);
	$query= "SELECT cod_user, cod_diet, weight, height, dat_init, dat_final, ideal_weight FROM `user_diet` join user join diet WHERE ";
	$conn1 = $conn->query($query);
	var_dump($values = $conn1->fetchAll(PDO::FETCH_ASSOC));	
	foreach ($values as $value => $key) {
	}
	$query2= 'SELECT cod_diet, cod_food, schedule, objective, food, calories, amount FROM `diet_food` join diet join objective join food WHERE cod_diet=1 and cod_food=food.id and cod_objective=objective.id';
	$conn2 = $conn->query($query2);
	$values2 = $conn2->fetchAll(PDO::FETCH_ASSOC);

	foreach($values2 as $value2 => $key2){
		echo '<tr> <th scope="row">'.$key2['schedule'].'</th> <td>'.$key2['food'].'</td> <td>'.$key2['amount'].'</td> </tr>';
	}
	}								
	



?>
