<?php
include_once('config.php');
?>
 
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>NTE - UCB</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background:#dee2e6;">
	
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
				<nav class="navbar navbar-expand-lg navbar-light bg-light"> <img src="img/UCB.png" width="200px">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						</ul>
					</div>
				</nav>
			</header>
		</div> <!--/.container-->
	</div>
	
	<?php

	$condition	='';

	if(isset($_REQUEST['nome']) and $_REQUEST['nome']!=""){
		$condition	.=	' AND nome LIKE "%'.$_REQUEST['nome'].'%" ';
	}
	if(isset($_REQUEST['matricula']) and $_REQUEST['matricula']!=""){
		$condition	.=	' AND matricula LIKE "%'.$_REQUEST['matricula'].'%" ';
	}
	if(isset($_REQUEST['termo']) and $_REQUEST['termo']!=""){
		$condition	.=	' AND termo LIKE "%'.$_REQUEST['termo'].'%" ';
	}
	if(isset($_REQUEST['curso']) and $_REQUEST['curso']!=""){
		$condition	=	' AND curso LIKE "%'.$_REQUEST['curso'].'%" ';
	}
	
	$userData	=	$db->getAllRecords('fiae','*',$condition,'ORDER BY id desc');
			
	?>
   	<div class="container">
		<hr>
		<h1>Consulta - Termos de Estágio </h1>
		<hr>
		<div class="card">
			<div class="card-header"> </div>
			
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Solicitação concluída com sucesso!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Busca de Solicitações</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Nome</label>
									<input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($_REQUEST['nome'])?$_REQUEST['nome']:''?>" >
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Matrícula</label>
									<input type="text" name="matricula" id="matricula" class="form-control" value="<?php echo isset($_REQUEST['matricula'])?$_REQUEST['matricula']:''?>" >
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Termo</label>
									<select type="text" name="termo" id="termo" class="form-control" value="<?php echo isset($_REQUEST['termo'])?$_REQUEST['termo']:''?>">
										<option value="">Selecione</option>
										<option value="FIAE - Pedagogia">FIAE - Pedagogia</option>
										<option value="FIAE - Filosofia">FIAE - Filosofia</option>
									</select>
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Curso</label>
									<select type="text" name="curso" id="curso" class="form-control" value="<?php echo isset($_REQUEST['curso'])?$_REQUEST['curso']:''?>">
										<option value="">Selecione</option>
										<option value="Pedagogia">Pedagogia</option>
										<option value="Fisica">Fisica</option>
									</select>
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Buscar</button>
									    </div>
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										 <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Limpar</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Matricula</th>
						<th>Nome</th>
						<th>Instituicao</th>
						<th>Curso</th>
						<th>Telefone</th>
						<th>Data da Emissão</th>
						<th>Termo</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;

						//$date1=date('d',strtotime($val['dt']));
						//$date2=date('d');
						//$diff1=$date1 - $date2;
						
						//$date1=date("Y-m-d",strtotime($val['dt']));
						//$date2=date_create(date('Y-m-d'));
						//$diff=date_diff($date1,$date2);
						//echo $diff;
						
						
						?>

					<tr>
						
						<td><?php echo $val['Matricula'];?></td>
						<td><?php echo $val['Nome'];?></td>
						<td><?php echo $val['Instituicao'];?></td>
						<td><?php echo $val['Curso'];?></td>
						<td><?php echo $val['Telefone'];?></td>
						<td><?php echo date('d-m-Y H:i:s',strtotime($val['Data']));?></td>
						<td><?php echo $val['Termo'];?></td>
		
					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="7" align="center">Nada a ser mostrado!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		<hr>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//From, To date range End here	
			
		});
	</script>
</body>
</html>
