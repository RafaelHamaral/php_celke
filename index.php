<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Data Tables</title>
</head>
<body>
    <h1>Listar Usuários</h1>
    <table id="listar-usuario" class="display" style="width:100%">
    <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Salario</th>
                <th>Idade</th>
            </tr>
        </thead>
    </table>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#listar-usuario').DataTable( {
                 "processing": true,
                 "serverSide": true,
                 "ajax": "listar_usuarios.php"
                } );
            } );
        </script>
</body>
</html>