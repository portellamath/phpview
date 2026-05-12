<?php include_once '../models/Fornecedor.php'; ?>

<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Fornecedores
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/fornecedor">
                    <i class="bi bi-database-fill-add"></i>
                </a>
            </h3>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            $conn = new Conn();
                            $sql  = $conn->prepare("CALL listar_fornecedor(NULL)");
                            $sql->execute();
                            $registros = $sql->fetchAll(PDO::FETCH_ASSOC);

                            if (count($registros) > 0) {
                                foreach ($registros as $row) {
                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['nome'] ?></td>
                                        <td><?= $row['sigla'] ?></td>
                                        <td>
                                            <a href="?p=add/fornecedor&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="?p=excluir/fornecedor&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Deseja excluir este fornecedor?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                    <?php
                                }
                            } else {
                    ?>
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum fornecedor cadastrado.</td>
                                </tr>
                    <?php
                            }
                        } catch (PDOException $erro) {
                            echo "<tr><td colspan='4' class='text-danger'>" . $erro->getMessage() . "</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>