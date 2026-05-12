<h3 class="mt-3 text-primary">
    Categoria
</h3>

<div class="card shadow mt-3">
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="txtnome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome"
                    placeholder="Nome da Categoria" value="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnsalvar" value="Cadastrar">
            </div>
            <a href="?p=categorias" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<?php
    if (filter_input(INPUT_POST, 'btnsalvar')) {
        $nome = filter_input(INPUT_POST, 'txtnome');

        include_once '../models/Categoria.php';
        $cat = new Categoria();
        $cat->setId(NULL);
        $cat->setNome($nome);

        if ($cat->salvar()) {
?>
            <div class="alert alert-primary mt-3" role="alert">
                Categoria cadastrada com sucesso!
            </div>
            <meta http-equiv="refresh" content="1;URL=?p=categorias">
<?php
        } else {
?>
            <div class="alert alert-danger mt-3" role="alert">
                Erro ao cadastrar categoria!
            </div>
            <meta http-equiv="refresh" content="1;URL=?p=categorias">
<?php
        }
    }
?>
