<?php
    include_once '../models/Categoria.php';
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($id) {
        try {
            $conn = new Conn();
            $sql  = $conn->prepare("CALL excluir_categoria(?)");
            $sql->bindValue(1, $id);
            $sql->execute();
?>
            <div class="alert alert-primary" role="alert">
                Categoria excluída com sucesso!
            </div>
<?php
        } catch (PDOException $erro) {
?>
            <div class="alert alert-danger" role="alert">
                Erro ao excluir: <?= $erro->getMessage() ?>
            </div>
<?php
        }
    } else {
?>
        <div class="alert alert-warning" role="alert">
            ID inválido para exclusão.
        </div>
<?php
    }
?>
<meta http-equiv="refresh" content="1;URL=?p=categorias">