<?php
    $controller = strtoupper($_GET['controller']);
    $modo = strtoupper($_GET['modo']);


    // if(isset($_GET['menu'])){
    //     switch ($_GET['menu']) {
    //         case 'produtos':
    //             require_once('view/produtos/adm_produtos.php');
    //             break;
            
    //         default:
    //             # code...
    //             break;
    //     }
    // }

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
                    //Resgata o id, instancia a classe controller 
                    // e chama o método p/ deletar, passando o id

                    $_SERVER['REQUEST_METHOD'] = 'POST';

                    $id = $_GET['id'];

                    $categoriaController = new CategoriaController();

                    $categoriaController->excluiCategoria($id);

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