<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once("functions.php")?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Projeto</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Projeto - Futebol</h5>
        </div>
        <div class="container border">
            <div class="row">
                <div class="col-md-4">
                    <p class="h6">País</p>
                </div>
                <div class="col-md-8">
                    <p class="h6">Nome da Competição</p>
                </div>
                <?php
                    $api_competitions = GetCompeticoes();

                    foreach ($api_competitions->competitions as $competicoes) {?>
                        <div class="col-md-4">
                            <?php echo $competicoes->area->name?>
                        </div>
                        <div class="col-md-8">
                            <a href="competicao/competicao.php?id=<?=$competicoes->id?> "><?php echo $competicoes->name?></a>
                        </div>
                            

                <?php }
                ?>
            </div>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="container">
                <span class="text-muted">Projeto feito por Rafael Nathan Bastos Borges.</span>
            </div>
        </footer>

    </body>
</html>
    