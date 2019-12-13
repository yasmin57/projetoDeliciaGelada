<?php
    $controller = strtoupper($_GET['controller']);
    $modo = strtoupper($_GET['modo']);

    switch ($controller) {
        // Categorias
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
        // Subategorias
        case 'SUBCATEGORIAS':
            //Importe do arquivo controller
            require_once('controller/subController.php');

            //Verifica o valor da var modo
            switch ($modo){
                case 'NOVO':
                    //Instancia da classe controller
                    $subcategoriaController = new SubcategoriaController();

                    //Método p/ inserir
                    $subcategoriaController->novaSubcategoria();

                    break;

                case 'EDITAR':
                    $id = $_GET['id'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->editaSubcategoria($id);

                    break;

                case 'EXCLUIR':
                    $id = $_GET['id'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->excluiSubcategoria($id);
                    break;

                case 'BUSCAR':
                    $id = $_GET['id'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->buscaSubcategoria($id);

                    break;

                case 'STATUS':
                    $id = $_GET['id'];
                    $status = $_GET['status'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->statusSubcategoria($id, $status);
                    break;

                case 'BUSCARPORCATEGORIA':
                    $id = $_POST['sltcategorias'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->buscaSubcategoriaPorCategoria($id);

                    break;
            }

            break;
        // Produtos
        case 'PRODUTOS':
            //Importe do arquivo controller
            require_once('controller/produtoController.php');
            
            switch ($modo) {
                case 'CHKDEST':
                    //instancia da classe controler
                    $produtosController = new ProdutoController();

                    //chama o método p/ fazer upload
                    $produtosController->acionaFormDestaque();

                    break;
                
                case 'NOVO':
                
                    //instancia da classe controler
                    $produtosController = new ProdutoController();

                    $produtosController->novoProduto();
    
                    break;
                case 'BUSCAR':
            
                    //instancia da classe controler
                    $produtosController = new ProdutoController();
    
                    break;
                case 'EDITAR':
        
                    //instancia da classe controler
                    $produtosController = new ProdutoController();
    
                    break;
            }

            break;
        
    }


?>