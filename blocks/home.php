<style>
    .latest {
    height: auto;
    width: 100%;
    background-color: #1A1C27;
}

.latest h2 {
    width: 330px;
    color: white;
    padding: 50px 0 4px 80px;
    border-bottom: 3px solid white;
    text-align: right;
}

.latest span {
    color: #03FBCA;
}

.items {
    margin: 40px auto;
    margin-bottom: 0;
    width: 850px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.items-all {
    padding-top: 50px;
    margin: 0 auto;
    width: 850px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: start;
    gap: 110px;
}

.items .item {
    font-family: Arial, Helvetica, sans-serif;
    width: 210px;
    height: 300px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    border-bottom: 3px solid #03FBCA;
}

.item img {
    width: 210px;
    height: 180px;
    object-fit: cover;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.item h4 {
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 700;
    margin-top: 10px;
}

.item p {
    color: white;
    font-size: 14px;
    margin-top: 10px;
}

a {
    text-decoration: none;
    color: white;
    cursor: pointer;
}
</style>

<div class="latest">
    <h2>უახლესი <span>ფლაგმანები</span></h2>
    <div class="items">
        <?php
        $query = "SELECT * FROM phones order by id desc limit 3";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="item">
                    <img src="<?= $row['imageurl'] ?>">
                    <h4><a href="?nav=phone&id=<?= $row['id'] ?>"><?= $row['factory'] ?> <?= $row['model'] ?></a></h4>
                    <p><span>CPU:</span> <?= $row['cpu'] ?></p>
                    <p><span>RAM:</span> <?= $row['ram'] ?></p>
                    <h3 style="text-align: right; color: #1ABC9C;"><?= $row['price'] ?>₾</h3>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<div class="latest">
    <h2><span>სმართფონები</span></h2>
    <div class="items-all" style="padding-bottom: 40px;">
        <?php
        $query = "SELECT * FROM phones";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="item" style="border-bottom: 3px solid #03FBCA;">
                    <img src="<?= $row['imageurl'] ?>">
                    <h4><a href="?nav=phone&id=<?= $row['id'] ?>"><?= $row['factory'] ?> <?= $row['model'] ?></a></h4>
                    <p><span>CPU:</span> <?= $row['cpu'] ?></p>
                    <p><span>RAM:</span> <?= $row['ram'] ?></p>
                    <h3 style="text-align: right; color: #1ABC9C;"><?= $row['price'] ?>₾</h3>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>