<?php
include_once '../../Config/config.php';
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\GroupsController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Grupos</title>
</head>
<body>
    <main>
        <section class="form-section">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Professor</th>
                        <th>Turma</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($group['teacher']); ?></td>
                        <td><?php echo htmlspecialchars($group['year_school']); ?></td>
                        <td><a class="btn-action" href="../../App/Providers/atualizarGroups.php?id=<?php echo $group['id_group'] ?>"><img src="../../Resources/Images/icons8-17372-0-73111-repetição-direita-43-setas-64.png" alt="Atualizar"></a></td>
                        <td><a class="btn-delete" href="#" onclick="confirmDelete(<?php echo $group['id_group']; ?>)"><img src="../../Resources/Images/icons8-remover-30.png" alt="Deletar"></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Tem certeza que deseja excluir o item?</p>
                    <div class="op">
                    <button class="confirm" id="confirmDeleteBtn">Sim</button>
                    <button class="close" onclick="closeModal()">Cancelar</button></div>
                </div>
            </div>
            <script>
                function openModal() {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";
                }
            
                function closeModal() {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                }
            
                function confirmDelete(id) {
                    openModal();
                    document.getElementById("confirmDeleteBtn").onclick = function() {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../../App/Providers/deleteGroups.php?id=" + id, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    if (xhr.responseText == "success") {
                                        window.location.href = "Groups.php";
                                    } else {
                                        alert("Falha ao excluir o grupo: " + xhr.responseText);
                                    }
                                }
                            }
                        };
                        xhr.send();
                    };
                }
            </script>
        </section>
    </main>
</body>
</html>
