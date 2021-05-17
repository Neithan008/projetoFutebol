<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <?php 
        include_once("../functions.php");
        error_reporting(E_ERROR);
    ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Clubes da Liga</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Projeto - Futebol</h5>
            <a class="p-2 text-dark" href="../index.php">Ligas</a>
        </div>

        <div class="container border">
            <div class="row">
                <?php
                $id = $_GET['id'];

                $api_competicao = GetCompeticao($id);
                //var_dump($api_competicao);
                if($api_competicao != false){?>
                
                    <div class="col-md-12">
                        <p class="h5">Competição: <?=$api_competicao->competition->name?> do <?=$api_competicao->competition->area->name?></p>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <p class="h6">Clubes: </p>
                    </div>

                    <div class="col-md-4">
                        <p class="h6">Sigla dos Clubes</p>
                    </div>
                    <div class="col-md-8">
                        <p class="h6">Nome dos Clubes</p>
                    </div> 

                    <?php
                    foreach ($api_competicao->teams as $times) {?>  

                        <div class="col-md-4">
                            <?php echo $times->tla?>
                        </div>
                        
                        <div class="col-md-8">
                            <a href="time/time.php?id=<?=$times->id?>"><?php echo $times->name?></a>
                        </div>    
                    <?php 
                    } ?>

                <?php
                }else{?>
                    <h3>Competição sem informação. </br>
                    <a href="../index.php">Clique aqui para Voltar para Lista das Ligas.</a>
                    </h3>
                <?php 
                }?>
            </div>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="container">
                <span class="text-muted">Projeto feito por Rafael Nathan Bastos Borges.</span>
            </div>
        </footer>
    </body>
</html>