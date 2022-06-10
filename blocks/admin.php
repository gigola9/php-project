<style>
.container {
    height: 100vh;
    width: 100%;
    background-color: #1A1C27;
}

.frm {
    margin: 0 auto;
    padding-top: 50px;
    color: white;
}

.frm input {
    height: 35px;
    border-radius: 5px;
    border: none;
    font-size: 15px;
    padding-left: 5px;
    margin-bottom: 10px;
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

h1 {
    width: 330px;
    text-align: right;
    color: white;
    padding: 50px 0 4px 80px;
    border-bottom: 3px solid #03FBCA;
}

.anch {
    width: 330px;
    color: #03FBCA;
    padding: 0 0 4px 80px;
    border-bottom: 3px solid white;
    text-decoration: none;
}

</style>

<div class="container">
<?php 
    $status = "";
    if(isset($_SESSION) && isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }
    if($status == "authorized") {
        include "blocks/adm.php"; 
    } else {
        if($_GET["page"] == "login") { 
           ?>
            <h1>შესვლა</h1>
            <form style="display: flex; flex-direction: column; width: 350px;" method="post" class="frm">
                <label>მეილი</label>
                <input type="email" name="nickname" required>
                <label>პაროლი</label>
                <input type="password" name="password" required>
                <?php 
                 if(isset($_COOKIE["wrongg"]) && $_COOKIE["wrongg"] > 3) {
                    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomStrings = '';
                    $randomNUmbersForCompanyName = rand(5, 10);
                    for ($i = 0; $i < $randomNUmbersForCompanyName; $i++) {
                        $randomStrings .= $alphabet[rand(0, strlen($alphabet) - 1)];
                    }
                ?>
                <label>უსაფრთხოების კოდი: </label>
                <input type="text" value="<?=$randomStrings?>" name="codeoriginals">
                <input type="text" name="codes" required>
                <?php
                }
                
                ?>
                <button type="submit" name="login">შესვლა</button>
            </form>
            <a href="?nav=admin&page=register" class="anch">რეგისტრაცია</a>
           <?php
        } else if($_GET["page"] == "register") {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            $randomNUmbersForCompanyName = rand(5, 10);
            for ($i = 0; $i < $randomNUmbersForCompanyName; $i++) {
                $randomString .= $alphabet[rand(0, strlen($alphabet) - 1)];
            }
            ?>
            <h1>რეგისტრაცია</h1>
            <form style="display: flex; flex-direction: column; width: 350px;" method="post" class="frm">
                <label>მეილი</label>
                <input type="email" name="nickname" required>
                <label>პაროლი</label>
                <input type="password" name="password" required pattern="^[A-Za-z0-9]*$" minlength="7">
                <label>გაიმეორეთ პაროლი</label>
                <input type="password" name="reppassword" required pattern="^[A-Za-z0-9]*$" minlength="7">
                <label>უსაფრთხოების კოდი </label>
                <input type="text" value="<?=$randomString?>" name="codeoriginal">
                <input type="text" name="code" required>
                <button type="submit" name="register">რეგისტრაცია</button>
            </form>
            <a href="?nav=admin&page=login" class="anch">ავტორიზაცია</a>
            <?php
        }
    }
?>

<?php
    if(isset($_POST["register"])) {
        if($_POST["code"] == $_POST["codeoriginal"]) {
            $nickname = $_POST["nickname"];
            $query = "SELECT * FROM users WHERE nickname='$nickname'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3 style='color: red;'>ასეთი მომხმარებელი უკვე არსებობს</h3>";
            } else {
                $nickname = $_POST["nickname"];
                $password = $_POST["password"];
             
                $insert = "INSERT INTO users(nickname, password) VALUES('$nickname', '$password')";
                if(mysqli_query($connection, $insert)) {
                   header("location: index.php?nav=admin&page=login");
                }
            }
        } else {
            echo "<h3 style='color: red;'>კოდი არასწორია</h3>";
        }
    }

    if(isset($_POST["login"])) {
            $nickname = $_POST["nickname"];
            $password = $_POST["password"];
         
            $query = "SELECT * FROM users WHERE nickname='$nickname'  and password='$password'";
    
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION["status"]="authorized";
                header("location: index.php?nav=admin&page=login");
                setcookie("wrongg", 0, time()-60, "/");
            } else {
                if(isset($_COOKIE) && isset($_COOKIE["wrongg"])) {
                    $wrng = $_COOKIE["wrongg"] + 1;
                    setcookie("wrongg", $wrng, time()+10, "/");
                } else {
                    setcookie("wrongg", 1, time()+10, "/");
                }
            }
    }
?>
</div>