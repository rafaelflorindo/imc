<div>
    <?php
            include("../Model/IMC.php");

            $obj = new IMC();

            $items = $obj->listarTodos();
            var_dump($items);
            if($items){
        ?>
    <table class="table table-success table-striped">
        <tbody>
            <th>ID</th>
            <th>PESSOA</th>
            <th>CADASTRO</th>
        </tbody>
        <?php
            foreach($items as $key => $value){
            ?>
                <tr>
                    <td><?=$value["id"];?></td>
                    <td><?=$value["Paciente_id"];?></td>
                    <td><?=$value["created"];?></td>
                </tr>
            <?php
            }
        ?>
    </table>
<?php } ?>
</div>