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
                    # code...
                    break;
                case 'EXCLUIR':

                    break;
                case 'BUSCAR':

                    break;
            }

            break;
        case 'value':
            
            break;
        case 'value':
            
            break;
        
    }


?>