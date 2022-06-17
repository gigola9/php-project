<style>
.container {
    height: calc(100vh - 80px);
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

.all {
    width: 1050px;
    margin: 0 auto;
    padding-top: 80px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.phone {
    width: 600px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.phone img {
    width: 320px;
    height: 320px;
    border-radius: 15px;
}

.info {
    margin-left: 40px;
}

h4 {
    color: white;
    font-size: 26px;
}

span {
    color: #03FBCA;
    font-size: 18px;
}

p {
    color: white;
    font-size: 18px;
}

.sell {
    width: 290px;
    height: 320px;
    border-radius: 15px;
    background-color: #393b48;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.inside {
    width: 280px;
    height: 274px;
    padding: 15px;
    border-radius: 15px;
    margin-top: 35px;
    background-color: white;
}

button {
    width: 250px;
    margin-bottom: 15px;
    color: white;
    height: 40px;
    border-radius: 10px;
    border: none;
    background-color: #0fb796;
    font-weight: bold;
    font-size: 18px;
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
    <div class="all">
        <div class="phone">
            <img src="<?= $row['imageurl'] ?>">
            <div class="info">
                <h4><?= $row['factory'] ?> <?= $row['model'] ?></h4>
                <hr style="border: 2px solid #03FBCA; margin-bottom: 10px; margin-top: 5px;">
                <p><span>CPU</span> <?= $row['cpu'] ?></p>
                <p><span>RAM</span> <?= $row['ram'] ?></p>
                <p><span>Storage</span> <?= $row['storage'] ?></p>
            </div>
        </div>
        <div class="sell">
           <h3 style="position: absolute; color: white; top: 7px; left: 20px; font-size: 18px;">დარჩენილია 3 დღე</h3>
           <div class="inside">
            <h3 style="color: #0fb796; font-size: 24px; font-weight: bold; margin-bottom: 30px; margin-top: 10px;"><?= $row['price'] ?>₾</h3>
            <img style="width:250px; margin-bottom: 20px;" src="https://i.ibb.co/RDb6dRL/cards.png">
            <button class="buy">ყიდვა</button>
            <button style="background-color: #393b48;">განვადებით ყიდვა <?= round($row['price']/12) ?>-დან</button>
           </div>
        </div>
    </div>
</div>