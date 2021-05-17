<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <?php 
        include_once("../../functions.php");
        error_reporting(E_ERROR);
    ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Informações do Clube</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Projeto - Futebol</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="../../index.php">Ligas</a>
            </nav>
        </div>
        <div class="container border">
            <div class="row">
                <?php
                $id = $_GET['id'];

                $api_time = GetTime($id);

                if($api_time != false){?>
                    <div class="col-md-8">
                        <p class="h5">Clube: <?=$api_time->name?></p>
                    </div>
                    <div class="col-md-4">
                    <?php
                        if($api_time->crestUrl != ""){?>
                            <img src="<?=$api_time->crestUrl?>" class="rounded float-right" width="240" height="120">
                        <?php 
                        }else{
                            echo "No Image";
                        }?>
                    </div>

                    </br>
                    <div class="col-md-12">
                        <p class="h6">Jogadores: </p>
                    </div>

                    <div class="col-md-4">
                        <p class="h6">Nome</p>
                    </div>
                    <div class="col-md-2">
                        <p class="h6">Posição</p>
                    </div>
                    <div class="col-md-4">
                        <p class="h6">Nacionalidade</p>
                    </div>
                    <div class="col-md-2">
                        <p class="h6">Idade</p>
                    </div> 

                    <?php
                    foreach ($api_time->squad as $jogador) {
                        if($jogador->position != NULL){?>  
                            <div class="col-md-4">
                                <?php echo $jogador->name?>
                            </div>
                            <div class="col-md-2">
                                <?php echo $jogador->position?>
                            </div>
                            <div class="col-md-4">
                                <?php echo $jogador->nationality?>
                            </div>
                            <div class="col-md-2">
                                <?php echo calcularIdade($jogador->dateOfBirth)?>
                            </div> 

                            <?php 
                                }else{
                                    $coach = $jogador->name;
                                    $coachNat = $jogador->nationality;
                                    $coachAge = calcularIdade($jogador->dateOfBirth);
                                }
                            } ?>
                        </br> </br>
                        <div class="col-md-6">
                            Técnico:<?php echo $coach?>
                        </div>
                        <div class="col-md-4">
                            <?php echo $coachNat?>
                        </div>
                        <div class="col-md-2">
                            <?php echo $coachAge?>
                        </div> 

                    <?php
                    }else{?>
                        <h3>Clube sem informações.</br>
                        <a href="../../index.php">Clique aqui para Voltar para Lista das Ligas.</a>
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