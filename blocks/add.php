<style>
.container {
    height: auto;
    width: 100%;
    background-color: #1A1C27;
}

h2 {
    width: 330px;
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


<div class="container">
    <h2>ტელეფონის დამატება</h2>
    <form method="post" class="frm" style="display: flex; flex-direction: column; width: 350px;">
        <label>Factory</label>
        <input type="text" name="factory" placeholder="Factory" required>
        <br>
        <label>Model</label>
        <input type="text" name="model" placeholder="Model" required>
        <br>
        <label>Price</label>
        <input type="number" name="price" placeholder="Price" required>
        <br>
        <label>Quantity</label>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <br>
        <label>CPU</label>
        <input type="text" name="cpu" placeholder="CPU" required>
        <br>
        <label>RAM</label>
        <input type="number" name="ram" placeholder="RAM" required>
        <br>
        <label>Storage</label>
        <input type="number" name="storage" placeholder="Storage" required>
        <br>
        <label>Image Url</label>
        <input type="text" name="imageurl" placeholder="URL" required>
        <br>
        <button type="submit" name="add">დამატება</button>
    </form>
</div>

<?php
    include "connection.php";
    if(isset($_POST["add"])) {
        $factory = $_POST["factory"];
        $model = $_POST["model"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $cpu = $_POST["cpu"];
        $ram = $_POST["ram"];
        $storage = $_POST["storage"];
        $imageurl = $_POST["imageurl"];
        $insert = "INSERT INTO phones(factory, model, price, quantity, cpu, ram, storage, imageurl) VALUES('$factory', '$model', '$price', '$quantity', '$cpu', '$ram', '$storage', '$imageurl')";
        if(mysqli_query($connection, $insert)) {
            header("location: index.php?nav=home");
        }
    }
?>