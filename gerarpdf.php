<?php
// Incluindo o autoload do DOM PDF
require_once 'dompdf/autoload.inc.php';


//===============================================================================================
//===============================================================================================
//===============================================================================================
//===============================================================================================	
	
	date_default_timezone_set('America/Sao_Paulo');
	$date = date_create();
	$data=date_format($date, 'Y-m-d H:i:s');
	
	$nome =$_POST['nome'];
	$matricula =$_POST['matricula'];
	$rg =$_POST['rg'];
	$cpf =$_POST['cpf'];
	$endereco =$_POST['endereco'];
	$curso =$_POST['curso'];
	$telefone =$_POST['telefone'];
	$instituicao =$_POST['instituicao'];
	$termo="Nome do Termo";
		
	strtoupper($nome);
	strtoupper($matricula);
	strtoupper($rg);
	strtoupper($cpf);
	strtoupper($endereco);
	strtoupper($curso);
	strtoupper($telefone);
	strtoupper($instituicao);
	
?>

<?php 
include_once('config.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nome==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($matricula==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($instituicao==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}

	elseif($curso==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('fiae','id');
		if($userCount[0]['total']<5000){
			$data	=	array(
							'matricula'=>strtoupper($matricula),
							'nome'=>strtoupper($nome),
							'instituicao'=>strtoupper($instituicao),
							'curso'=>strtoupper($curso),
							'data'=>strtoupper($data),
							'telefone'=>strtoupper($telefone),
							'termo'=>strtoupper($termo),
						);
			$insert	=	$db->insert('fiae',$data);

		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>


<?php
//Criando a instancia do Dom PDF.
//Criando o namespace para evitar erros
use Dompdf\Dompdf;
 
// Instanciando a classe do Dom DPF
$dompdf = new Dompdf();
 
$dompdf->loadHtml('

		<style>
			body {  
				font-family: "Helvetica";
				font-size: 15px;
			}
		</style>
		
		
    	<table border=1 width="100%" cellspacing=0 cellpadding=2 bordercolor="666633">
			<tr>
				<td colspan="2"align="center"><img src="img/logoead.jpg"></td>
			</tr>
			<tr>
				<td colspan="2"align="center"><b>UNIVERSIDADE CATÓLICA DE BRASÍLIA</b> <br>PRÓ-REITORIA ACADÊMICA<br>COORDENAÇÃO ACADÊMICA</td>
			</tr>
		</table>
	
	

	
	
		<table border=1 width="100%" cellspacing=0 cellpadding=8 bordercolor="666633">
			<tr bgcolor="#e0dbdb">
				<td colspan="3" align="center"><b>FIAE - FORMULÁRIO DE INDICAÇÃO E DE APRESENTAÇÃO DE ESTUDANTE PARA ESTÁGIO NA SECRETARIA DE EDUCAÇÃO DO DISTRITO FEDERAL</b> </td>
			</tr>
			
			<tr>
				<td colspan="3"><center>IDENTIFICAÇÃO DO(A) ESTAGIÁRIO(A)</center></td>
			</tr>
			
			<tr>
				<td><b>Nome:</b> 
					'.mb_strtoupper ($nome,"utf-8").'
				</td>
				<td colspan="2"><b>Matricula:</b>
					'.mb_strtoupper ($matricula,"utf-8").'
				</td>
			</tr>
			
			<tr>
				<td><b>Endereço:</b>
					'.mb_strtoupper ($endereco,"utf-8").'
				</td>
				<td colspan="2"><b>Telefone:</b>
					'.mb_strtoupper ($telefone,"utf-8").'
				</td>
			</tr>
			
			<tr>
				<td colspan="3"><b>Curso/Habilitação:</b>
					'.mb_strtoupper ($curso,"utf-8").'
				</td>
			</tr>
		</table>

		
		
		
		
	
		<table border=1 width="100%" cellspacing=0 cellpadding=2 bordercolor="666633">
			<tr bgcolor="#e0dbdb">
				<td colspan="2" align="center"><b>ATIVIDADES DE ESTÁGIO - Descrição (de acordo com o Termo de Compromisso de Convênio):</b> </td>
				<td align="center"><b>Carga Horária</b> </td>
	
			</tr>
			
			<tr>
				<td colspan="2">Observação/participação como auxílio ao professor da disciplina, e com vistas à organização do processo de regência – definição das turmas e planejamento das aulas.</td>
				<td align="center">10h</td>
			</tr>
			
			<tr>
				<td colspan="2">Regência realizada nas três séries do ensino médio (10h/a em cada série).</td>
				<td align="center">30h</td>
			</tr>
			
			<tr>
				<td colspan="2" align="right"><b>Carga Horária TOTAL:</b></td>
				<td align="center">40h</td>
			</tr>
			
			<tr bgcolor="#e0dbdb">
				<td colspan="3" align="center"><b>Segmento:</b></td>
			</tr>
			
			<tr>
				<td colspan="3" align="left">(   ) Creche  &nbsp;&nbsp;   (     ) Educação Infantil  &nbsp;&nbsp;  (     ) Anos Iniciais (EF)  &nbsp;&nbsp;  (     ) Anos Finais (EF)  &nbsp; &nbsp; (     ) Ensino Médio</td>
			</tr>
			
			<tr bgcolor="#e0dbdb">
				<td colspan="3" align="center"><b>Nome da Disciplina / Componente Curricular Escolar:</b></td>
			</tr>
			
			<tr>
				<td colspan="3" align="left">(     ) Não se aplica   &nbsp;&nbsp; (     ) Disciplina   </td>
			</tr>
			
			<tr bgcolor="#e0dbdb">
				<td colspan="2" align="center"><b>Modalidade:</b></td>
				<td align="center"><b>Turno de realização do Estágio:</b></td>
			</tr>
			
			<tr>
				<td colspan="2" align="left">(   ) Ensino Regular  &nbsp;&nbsp;    (    ) EJA - Educação de Jovens e Adultos  &nbsp;&nbsp;   (    ) Outros </td>
				<td align="left">(   ) Manhã  (   ) Tarde <br> (   ) Noite</td>
			</tr>
			
			<tr>
				<td colspan="3" align="center"><b>Supervisor de Estágio na Escola:</b></td>
			</tr>
			<tr>
				<td colspan="3" align="left">(  ) Professor-Regente  &nbsp;&nbsp;     (  ) Coordenador Pedagógico      &nbsp;&nbsp;    (  ) Supervisor Pedagógico   &nbsp;&nbsp;  (     ) Diretor/Vice-Diretor &nbsp;&nbsp; (    ) Outro (especifique):</td>
			</tr>
		</table>
		
		
		
		
	
		<table border=0 width="100%">
	
			<tr>
				<td align="center"><b><br></b><img src="img/assi.jpg" width="150px"><br> Professor/Coordenaor/Orientador de Estágio na IES:<br><b>Assinatura e Carimbo</b></td>
				<td align="center"><b><br></b><img src="img/assi.jpg" width="150px"><br> Diretor ou Coordenador do Curso na IES:<br><b>Assinatura e Carimbo</b></td>
			
			</tr>

			<tr>
				<td align="center" colspan="2"><b>Recebido na CRE<br></b></td>
				
			</tr>
			
			<tr>
				<td align="center"><br><br><br>________________________<br><b>Local e Data de Recebimento na <br> CRE</b></td>
				<td align="center"><br><br><br>________________________<br><b>Assinatura e Carimbo com Nome e Matrícula <br> CRE</b></td>
			</tr>
		</table>
');
 
//Define o tipo de papel de impressão (opcional)
//tamanho (A4, A3, A2, etc)
//oritenação do papel:'portrait' (em pé) ou 'landscape' (deitado)
$dompdf->setPaper('A4', 'portrait');
 
// Vai renderizar o HTML como PDF
$dompdf->render();
 
// Saída do pdf para a renderização do navegador.
//Coloca o nome que deseja que seja renderizado.
$dompdf->stream($matricula."_termo.pdf", array(true)); 
 
?>