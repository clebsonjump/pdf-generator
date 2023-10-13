
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- Title Page-->
    <title>Termo de Compromisso</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
	</head>
	<script>
	var doc = new jsPDF();
	var specialElementHandlers = {
		'#editor': function (element, renderer) {
			return true;
		}
	};

	$('#btGerarPDF').click(function () {
		doc.fromHTML($('#conteudo').html(), 15, 15, {
			'width': 170,
				'elementHandlers': specialElementHandlers
		});
		doc.save('exemplo-pdf.pdf');
	});
	</script>
	
	<script language="JavaScript" >
		function enviardados(){
		  
		if(document.dados.tx_nome.value=="" || 
		document.dados.tx_nome.value.length < 8)
		{
		alert( "Preencha campo NOME corretamente!" );
		document.dados.tx_nome.focus();
		return false;
		}
		  
		  
		if( document.dados.tx_email.value=="" || 
		document.dados.tx_email.value.indexOf('@')==-1 || 
		document.dados.tx_email.value.indexOf('.')==-1 )
		{
		alert( "Preencha campo E-MAIL corretamente!" );
		document.dados.tx_email.focus();
		return false;
		}
		  
		if (document.dados.tx_mensagem.value=="")
		{
		alert( "Preencha o campo MENSAGEM!" );
		document.dados.tx_mensagem.focus();
		return false;
		}
		  
		if (document.dados.tx_mensagem.value.length < 50 )
		{
		alert( "É necessario preencher o campo MENSAGEM com 
		mais de 50 caracteres!" );
		document.dados.tx_mensagem.focus();
		return false;
		}
		  
		return true;
		}
	</script>
	
	<script type="text/javascript">
		$("#telefone").mask("(00) 0000-0000");
		$("#cpf").mask("000.000.000-00");
	</script>
 
<body>
    
	<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">FIAE - FORMULÁRIO DE INDICAÇÃO E DE APRESENTAÇÃO DE ESTUDANTE PARA ESTÁGIO NA SECRETARIA DE EDUCAÇÃO DO DISTRITO FEDERAL </h2>
                </div>
                <div class="card-body">
				
				<form method="POST" action="gerarpdf.php">
					<h2 class="name">Dados do Estagiário</h2><hr><br>
                        <div class="form-row">
                            <div class="name">Nome</div>
                                <div class="value">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" required name="nome">
                                </div>
                             </div>
                        </div>

                       <div class="form-row m-b-2">
                            <div class="name">Matricula</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" required name="matricula" id="matricula">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
						
					   <div class="form-row m-b-2">
                         <div class="name">RG</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" required name="rg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="form-row m-b-2">
                         <div class="name">CPF</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" required name="cpf" id="cpf">
											<script type="text/javascript">$("#cpf").mask("000.000.000-00");</script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Endereço</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" required name="endereco">
                                </div>
                            </div>
                        </div>

                    <div class="form-row m-b-2">
                        <div class="name">Telefone</div>
                        <div class="value">
                            <div class="row row-refine">
                                <div class="col-9">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="tel" required name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}">
										<script type="text/javascript">$("#telefone").mask("(00) 0000-00009");</script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-row">
                                <div class="name">Instituição</div>
                                <div class="value">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" required name="instituicao">
                                    </div>
                                </div>
                            </div>
							
                    <div class="form-row">
                            <div class="name">Curso/<br>Habilitação</div>
                            <div class="value">

                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="curso">
                                            <option disabled="disabled" required name="curso">Escolha seu curso</option>
                                            <option>PROFORM - Física</option>
                                            <option>PROFORM - Biologia</option>
                                            <option>PROFORM - Matematica</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div><hr><br>
						<center><div>
							
							<button type="submit" name="submit" value="submit" id="submit"class="btn btn--radius-2 btn--red" >Gerar Termo</button>
                         
						</div>
					  </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->