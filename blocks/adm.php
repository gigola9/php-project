<style>
.anch {
    width: 330px;
    color: #03FBCA;
    padding: 0 0 4px 80px;
    border-bottom: 3px solid white;
    text-decoration: none;
}

.an {
    color: #03FBCA;
    text-decoration: none;
    cursor: pointer;
}

table {
    width: 80%;
    margin: 40px auto;
}
</style>

<?php 
    $status = "";
    if(isset($_SESSION) && isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }
    if($status == "authorized") {
        ?>
            <a href="?nav=add" class="anch" style="font-size: 22px;">ტელეფონის დამატება</a>
            <table>
                <tr>
                    <th>Factory</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                include "connection.php";

                $query = "SELECT * FROM phones";
      
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $row['factory'] ?></td>
                            <td><?= $row['model'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><a href="?nav=edit&id=<?=$row['id']?>" class="an">რედაქტირება</a></td>
                            <td><a href="?nav=delete&id=<?=$row['id']?>" class="an">წაშლა</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
        </table>
        <?php
    } 
?>
    