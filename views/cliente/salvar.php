<h3 class="mt-3 text-primary">
    Cliente
</h3>

<div class="card shadow mt-3">
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="txtnome" class="col-sm-2 col-form-label">Nome do Cliente</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome"
                    placeholder="Nome do Cliente" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="txtcpf" class="col-sm-2 col-form-label">CPF</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtcpf" name="txtcpf"
                    placeholder="000.000.000-00" value="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnsalvar" value="Cadastrar">
            </div>
            <a href="?p=cliente" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<?php
    if (filter_input(INPUT_POST, 'btnsalvar')) {
        $nome = filter_input(INPUT_POST, 'txtnome');
        $cpf  = filter_input(INPUT_POST, 'txtcpf');

        include_once '../models/Cliente.php';
        $cli = new Cliente();
        $cli->setId(NULL);
        $cli->setNome($nome);
        $cli->setCpf($cpf);

        if ($cli->salvar()) {
?>
            <div class="alert alert-primary mt-3" role="alert">
                Cliente cadastrado com sucesso!
            </div>
            <meta http-equiv="refresh" content="1;URL=?p=cliente">
<?php
        } else {
?>
            <div class="alert alert-danger mt-3" role="alert">
                Erro ao cadastrar cliente!
            </div>
            <meta http-equiv="refresh" content="1;URL=?p=cliente">
<?php
        }
    }
?>
