<div class="container">
    <div class="row">
        <div class="col-md-8">
            &nbsp;
        </div>
    </div>
</div>

<h2>Fomulário para cadastro de Atendimento</h2>

<?php
if (
    isset($_GET["erro"]) && isset($_GET["mensagem"]) &&
    !empty($_GET["erro"]) && !empty($_GET["mensagem"])
) {
    if ($_GET["erro"] == "sim") {
?>
        <div class="alert alert-danger" role="alert">
            <?= $_GET["mensagem"] ?>
        </div>
    <?php
    }
    if ($_GET["erro"] == "nao") {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $_GET["mensagem"] ?>
        </div>
<?php
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            &nbsp;
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form action="Controller/controllerIMC.php" method="post" class="row g-3">
                <?php
                include("Model/IMC.php");

                $paciente = new IMC();

                $listaPaciente = $paciente->listarPacientes();

                // var_dump($listaPaciente);

                ?>
                <div class="col-md-12">
                    <label for="peso" class="form-label">Paciente:</label>
                    <select id="pessoa_id" class="form-select form-select-lg mb-3" name="pessoa_id">
                        <?php
                        foreach ($listaPaciente as $key => $value) {
                        ?>
                            <option value=<?= $value["id"] ?>><?= $value["nome"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="peso" class="form-label">Peso:</label>
                    <input type="number" step='000.01' value='0.00' placeholder='0.00' name="peso" class="form-control form-control-lg" id="peso" required>
                </div>
                <div class="col-md-3">
                    <label for="altura" class="form-label">Altura</label>
                    <input type="number" step='0.01' value='0.00' placeholder='0.00' name="altura" class="form-control form-control-lg" id="altura">
                </div>
                <div class="col-md-3">
                    <label for="pressao" class="form-label">Aferição : </label>
                    <input type="text" name="pressao" class="form-control  form-control-lg" id="pressao" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">

            <?php

            if (isset($_GET["resultado"]) && !empty($_GET["resultado"])) {
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="View/img/card1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Resultado</h5>
                        <p class="card-text">
                        <?php

                        $resultado = filter_input(INPUT_GET, 'resultado');
                        echo "Índice de massa : " . number_format($resultado, 2, '.', '');
                        echo "<br>";

                        if ($resultado < 18.5) {
                            echo "Classificação: Magresa";
                            echo "<br>Grau de Obesidade: 0";
                        } elseif ($resultado < 24.9) {
                            echo "Classificação: Normal";
                            echo "<br>Grau de Obesidade: 0";
                        } elseif ($resultado < 29.9) {
                            echo "Classificação: SOBREPESO";
                            echo "<br>Grau de Obesidade: I";
                        } elseif ($resultado < 39.9) {
                            echo "Classificação: Obesidade";
                            echo "<br>Grau de Obesidade: II";
                        } elseif ($resultado > 40) {
                            echo "Classificação: Obesidade Grave";
                            echo "<br>Grau de Obesidade: III";
                        } else {
                            echo "---";
                        }
                    }
                        ?></p>
                        <a href="#" class="btn btn-primary">Indicação de dietas</a>
                    </div>
                </div>
        </div>
    </div>
</div>