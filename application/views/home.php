<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verkoper Task</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

	<section class="container-fluid  main">
		<div class="row justify-content-center position-center">
			<div class="col-md-10 ">
				<!-- On tables -->
				<p>Note : first row avg input of table fetches data for less or equal to than entered value (eg:shows data for below 25%)</p>
				<p>second, third rows for ranged inputs (eg: 50-75)</p>
				<p>	fourth row avg input of table shows data for greater than or equal entered.</p>
				<table class="table">
					<thead class="table-dark">
						<tr>
							<th scope="col">Average (%)</th>
							<th scope="col">Total no. of stds</th>
							<th scope="col">Male</th>
							<th scope="col">Female</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$id=0;
						foreach($meta as $key=>$value){?>
						<tr>
							<th><input type="text" class="form-control" value="<?= $key?>" name="field1" id="<?= "f$id"?>"></th>
							<td id="<?= "c$id"?>"><?= $value['count'] ?></td>
							<td id="<?= "m$id"?>"><?= $value['male'] ?></td>
							<td id="<?= "fe$id"?>"><?= $value['female'] ?></td>
						</tr>
						<?php $id++;} ?>
					</tbody>
				</table>
			</div>
		</div>

	</section>

	<style>
		.main{
			width: 100vw;
			height: 100vh;
		}
		.position-center {
			padding: 150px;

		}
		td,th{
			text-align: center;
		}
	</style>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){

			const dynamic=()=>{

				let value1=$("#f0").val();
				let value2=$("#f1").val();
				let value3=$("#f2").val();
				let value4=$("#f3").val();
				const data={
					"0":value1,
					"1":value2,
					"2":value3,
					"3":value4
				};
				
				$.ajax({
					"url":"http://localhost/verkoper-task/index.php/home/dynamic_data",
					"method":"post",
					"data":data,
					"success":function(resp){
						let response=JSON.parse(resp);
						console.log(response[data[1]]);
						for (let index = 0; index <= 3; index++) {
							$("#c"+index).html(response[data[index]].count);
							$("#m"+index).html(response[data[index]].male);
							$("#fe"+index).html(response[data[index]].female);
						}
					},
					"error":function(resp){
						console.log(resp);
					}
				});

			}
			$("#f1").on("blur",function(){
				dynamic();
			});
			$("#f0").on("blur",function(){
				dynamic();
			});
			$("#f3").on("blur",function(){
				dynamic();
			});
			$("#f2").on("blur",function(){
				dynamic();
			});
		});
	</script>


</body>

</html>