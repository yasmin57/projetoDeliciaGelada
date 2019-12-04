<?php
    $controller = strtoupper($_GET['controller']);
    $modo = strtoupper($_GET['modo']);

    switch ($controller) {
        case 'CATEGORIAS':
            require_once('controller/categoriaController.php');

            switch ($modo) {
                case 'NOVO':
                    //Instancia da classe controller
                    $categoriaController = new CategoriaController();

                    //Método p/ inserir
                    $categoriaController->novaCategoria();

                    break;
                
                case 'EDITAR':
                    $id = $_GET['id'];

                    //Instancia da classe controller
                    $categoriaController = new CategoriaController();

                    //Método p/ inserir
                    $categoriaController->editaCategoria($id);

                    break;

                case 'EXCLUIR':
                    //Resgata o id, instancia a classe controller 
                    // e chama o método p/ deletar, passando o id

                    $id = $_GET['id'];

                    $categoriaController = new CategoriaController();

                    $categoriaController->excluiCategoria($id);

                    break;

                case 'BUSCAR':
                    //Resgata o id, instancia a classe controller 
                    // e chama o método p/ buscar, passando o id

                    $id = $_GET['id'];

                    $categoriaController = new CategoriaController();

                    $categoriaController->buscaCategoria($id);

                    break;
                case 'STATUS':
                    //Resgata o id, instancia a classe controller 
                    // e chama o método p/ editar o status, passando o id e o status

                    $id = $_GET['id'];
                    $status = $_GET['status'];

                    $categoriaController = new CategoriaController();

                    $categoriaController->statusCategoria($id, $status);

                    break;
            }

            break;
        case 'value':
            
            break;
        case 'value':
            
            break;
        
    }


?>