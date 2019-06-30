<?php 
require_once('header.php');
require_once('../include_dao.php');
session_start();

if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}

$acao = isset($_POST['acao'])?$_POST['acao']:"";
$cod = isset($_POST['cod'])?$_POST['cod']:"";
$cod_cat = isset($_POST['cod_cat'])?$_POST['cod_cat']:"";

$funcoesProdutos = new ProdutoDAO();
$funcoesCategoria = new CategoriaDAO();
$funcoesPC = new Produto_categoriaDAO();

$produtos = $funcoesProdutos -> listarTodos();
$categorias = $funcoesCategoria -> listarTodos();
$pcs = $funcoesPC ->listarTodos();

if($acao == "apagar"){
		$funcoesProdutos->deletarCat($cod);
		$funcoesProdutos->deletar($cod);
}
if($acao == "editar"){
		atualizar($produto);
}

?>
<div class="row justify-content-center no-gutters block-1" style="padding-top: 10%">  
	<a class="nav-link px-4" id="v-pills-3-tab"  href="logout.php" role="tab" aria-controls="v-pills-3" aria-selected="false" style="margin-left: 60%"><h3><span class="icon-remove"></span>Logout</h3></a>

	<a class="nav-link px-4" id="v-pills-3-tab"  href="escolhaView.php" role="tab" aria-controls="v-pills-3" aria-selected="false"><h3><span class="icon-remove"></span>Voltar</h3></a>

	<a class="nav-link px-4" id="v-pills-3-tab"  href="cadastrarProdutoView.php" role="tab" aria-controls="v-pills-3" aria-selected="false"><h3><span class="icon-remove"></span>Adicionar</h3></a>
	<table border="1px" class="celled table">
			<tr>
				<th style="text-align: center;"><b>Nome</b></th>
				<th style="text-align: center;"><b>Preço</b></th>
				<th colspan="2" style="text-align: center;"><b>Opções</b></th>
			</tr>
			<?php 
				$produtos = $funcoesProdutos->listarTodos();
				foreach ($produtos as $produto){
			?>
			<tr>
				<td style="text-align: center;"><?=$produto['nome']?></td>
				<td style="text-align: center;"><?=$produto['preco']?></td>
				<td style="text-align: center;">
					<form method="POST">							
						<input type="hidden" name="acao" value="apagar">
						<input type="hidden" name="cod" value="<?=$produto['cod']?>">
						<input type="hidden" name="cod_cat" value="<?=$produto['cod_cat']?>">
						<button  type="submit" value="apagar" tabindex="0" class="btn py-3 px-5" style="background-color: #E8DB3F">
							<font>Apagar</font>
						</button>
					</form>
				</td>
				<td style="text-align: center;">
					<form method="POST" action="editarProdutoView.php">
						<input type="hidden" name="cod" value="<?=$produto['cod']?>">
						<input name="nome" type="hidden" value="<?=$produto['nome']?>">
						<input name="preco" type="hidden" value="<?=$produto['preco']?>">
						<input name="imagem" type="hidden" value="<?=$produto['imagem']?>">
						<input name="descricao" type="hidden" value="<?=$produto['descricao']?>">
						<button type="submit" value="editar" class="btn py-3 px-5" style="background-color: #E8DB3F">Editar</button>
					</form>
				</td>
			</tr>
		</div>
		<?php	
			}
		?>
	</table>
</div>
<?php require_once('footer.php') ?>