    <?php
    include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\UsersController.php';
    include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';

    echo "<h2>Usuários Cadastrados</h2>";

    function renderUserTable($title, $users, $filterType)
    {
        // Filtrar usuários por tipo
        $filteredUsers = array_filter($users, fn($user) => $user['user_type'] == $filterType);

        // Identificar colunas que possuem dados
        $columns = [
            'name' => 'Nome',
            'email' => 'Email',
            'school_year' => 'Ano Escolar',
            'subject' => 'Matéria'
        ];

        // Verificar quais colunas têm valores não vazios
        $nonEmptyColumns = [];
        foreach ($columns as $key => $label) {
            foreach ($filteredUsers as $user) {
                if (!empty($user[$key])) {
                    $nonEmptyColumns[$key] = $label;
                    break;
                }
            }
        }

        // Adicionar coluna de opções
        $nonEmptyColumns['options'] = 'Opções';

        // Exibir a tabela apenas se houver usuários
        if (!empty($filteredUsers)) {
            echo "<h3>{$title}</h3>";
            echo "<table class='users-table'>";
            echo "<tr>";

            // Cabeçalhos dinâmicos
            foreach ($nonEmptyColumns as $label) {
                echo "<th>{$label}</th>";
            }
            echo "</tr>";
    ?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../../Resources/Css/ADM/styledelete.css">
                <link rel="stylesheet" href="../../Resources/Css/ADM/sing-up.css">
                <title>Listar usuários</title>
            </head>

            <body>


        <?php
            // Dados da tabela
            foreach ($filteredUsers as $user) {
                echo "<tr>";
                foreach ($nonEmptyColumns as $key => $label) {
                    if ($key === 'options') {
                        // Adicionar ícones de ação na coluna de opções
                        echo "<td class='container-button'>
                        <a class='btn-action' href='../../Public/Adm/updateUser.php?id=" . htmlspecialchars($user['id_users']) . "'>
                        <img src='../../Resources/Images/icons8-17372-0-73111-repetição-direita-43-setas-64.png' alt='Atualizar'>
                        </a>
                        <a class='btn-delete' href='#' onclick='confirmDelete(" . htmlspecialchars($user['id_users']) . ")'>
                        <img src='../../Resources/Images/icons8-remover-30.png' alt='Deletar'>
                        </a>
                        </td>";
                    } else {
                        echo "<td>" . htmlspecialchars($user[$key] ?? '-') . "</td>";
                    }
                }
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhum usuário encontrado para {$title}.</p>";
        }
    }

    try {
        // Tabela para Administradores
        renderUserTable('Administradores', $users, 3);

        // Tabela para Professores
        renderUserTable('Professores', $users, 1);

        // Tabela para Alunos
        renderUserTable('Alunos', $users, 2);
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir usuários: " . $e->getMessage() . "</p>";
    }
        ?>

        <section>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Tem certeza que deseja excluir o item?</p>
                    <div class="op">
                        <button class="confirm" id="confirmDeleteBtn">Sim</button>
                        <button class="close" onclick="closeModal()">Cancelar</button>
                    </div>
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
                        xhr.open("POST", "../../Public/Adm/deleteUser.php?id=" + id, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    if (xhr.responseText.trim() === "success") {
                                        alert("Usuário excluído com sucesso!");
                                        closeModal(); // Fecha o modal
                                        window.location.reload(); // Recarrega a página
                                    } else {
                                        alert("Falha ao excluir o usuário: " + xhr.responseText);
                                    }
                                } else {
                                    alert("Erro ao processar a requisição.");
                                }
                            }
                        };
                        xhr.send();
                    };
                }
            </script>
        </section>

            </body>

            </html>