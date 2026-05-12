<h3 class="mt-3 text-primary">
    Fornecedor
</h3>

<div class="card shadow mt-3">
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="txtnome" class="col-sm-2 col-form-label">Nome do Estado</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome"
                    placeholder="Ex: São Paulo" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="txtsigla" class="col-sm-2 col-form-label">Sigla - UF</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtsigla" name="txtsigla"
                    placeholder="Ex: SP" maxlength="2" value="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnsalvar" value="Cadastrar">
            </div>
            <a href="?p=fornecedor" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<?php
    if (filter_input(INPUT_POST, 'btnsalvar')) {
        $nome  = filter_input(INPUT_POST, 'txtnome');
        $sigla = filter_input(INPUT_POST, 'txtsigla');

        include_once '../models/Fornecedor.php';
        $forn = new Fornecedor();
        $forn->setId(NULL);
        $forn->setNome($nome);
        $forn->setSigla($sigla);

        if ($forn->salvar()) {
?>
            <div class="alert alert-primary mt-3" role="alert">
                Fornecedor cadastrado com sucesso!
            </div>
            <meta http-equiv="refresh" content="1;URL=?p=fornecedor">
<?php
        } else {
?>
            <div class="alert alert-danger mt-3" role="alert">
                Erro ao cadastrar fornecedor!
            </div>
            <meta http-equiv="refresh" content="1;URL=?p=fornecedor">
<?php
        }
    }
?>
