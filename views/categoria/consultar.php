<?php include_once '../models/Categoria.php'; ?>

<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Categorias
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/categoria">
                    <i class="bi bi-database-fill-add"></i>
                </a>
            </h3>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            $conn = new Conn();
                            $sql  = $conn->prepare("CALL listar_categoria(NULL)");
                            $sql->execute();
                            $registros = $sql->fetchAll(PDO::FETCH_ASSOC);

                            if (count($registros) > 0) {
                                foreach ($registros as $row) {
                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['nome'] ?></td>
                                        <td>
                                            <a href="?p=add/categoria&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="?p=excluir/categoria&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Deseja excluir esta categoria?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                    <?php
                                }
                            } else {
                    ?>
                                <tr>
                                    <td colspan="3" class="text-center">Nenhuma categoria cadastrada.</td>
                                </tr>
                    <?php
                            }
                        } catch (PDOException $erro) {
                            echo "<tr><td colspan='3' class='text-danger'>" . $erro->getMessage() . "</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>