<style>
.container {
    height: auto;
    width: 100%;
    background-color: #1A1C27;
}

h2 {
    width: 380px;
    text-align: right;
    color: white;
    padding: 50px 0 4px 80px;
    border-bottom: 3px solid #03FBCA;
}

.frm {
    margin: 0 auto;
    padding-top: 20px;
    color: white;
}

.frm input {
    width: 100%;
    height: 35px;
    border-radius: 5px;
    border: none;
    font-size: 15px;
    padding-left: 5px;
    margin-bottom: 5px;
}

.frm button {
    margin-left: 10px;
    width: 150px;
    height: 50px;
    border-radius: 5px;
    border: 3px solid white;
    color: white;
    background-color: transparent;
    font-size: 16px;
    transition: 0.2s ease-in;
}

.frm label {
    color: #a3a3a3;
    text-align: center;
}

.frm button{
    margin: 20px auto;
}
</style>

<?php 
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $select_row = "SELECT * FROM phones WHERE ID = '$id'";
        $result = mysqli_query($connection, $select_row);
        $row = mysqli_fetch_assoc($result);
    }
?>

<div class="container">
    <h2>ჩანაწერის რედაქტირება</h2>
    <form method="post" class="frm" style="display: flex; flex-direction: column; width: 350px;">
        <label>Factory</label>
        <input type="text" name="factory" value="<?=$row['factory']?>" placeholder="Factory" required>
        <br>
        <label>Model</label>
        <input type="text" name="model" value="<?=$row['model']?>" placeholder="Model" required>
        <br>
        <label>Price</label>
        <input type="number" name="price" value="<?=$row['price']?>" placeholder="Price" required>
        <br>
        <label>Quantity</label>
        <input type="number" name="quantity" value="<?=$row['quantity']?>" placeholder="Quantity" required>
        <br>
        <label>CPU</label>
        <input type="text" name="cpu" value="<?=$row['cpu']?>" placeholder="CPU" required>
        <br>
        <label>RAM</label>
        <input type="number" name="ram" value="<?=$row['ram']?>" placeholder="RAM" required>
        <br>
        <label>Storage</label>
        <input type="number" name="storage" value="<?=$row['storage']?>" placeholder="Storage" required>
        <br>
        <label>Image Url</label>
        <input type="text" name="imageurl" value="<?=$row['imageurl']?>" placeholder="URL" required>
        <br>
        <button type="submit" name="edit">რედაქტირება</button>
    </form>
</div>

<?php
    if(isset($_POST["edit"])) {
        $factory = $_POST["factory"];
        $model = $_POST["model"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $cpu = $_POST["cpu"];
        $ram = $_POST["ram"];
        $storage = $_POST["storage"];
        $imageurl = $_POST["imageurl"];
        $edit = "UPDATE phones set ram='$ram', storage='$storage', imageurl='$imageurl', price='$price', quantity='$quantity', cpu='$cpu', factory='$factory', model='$model' where id='$id'";
        if(mysqli_query($connection, $edit)) {
            header("location: index.php?nav=home");
        }
    }
?>