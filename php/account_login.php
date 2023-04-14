<?php
    require_once("functions.php");
    if (isset($_GET))
    {
        if (isset($_POST) && isset($_POST['email']) && isset($_POST['password']))
        {
            if ($user = get_user($_POST['email'], $_POST['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['password'] = $_POST['password'];
                header('Location: ../index.php');
            }

            else{ ?>
                <!-- Пользователь с таким именем уже существует -->
            <div id="error">
                <span>Такого пользователья не существует.</span>
            </div>
<?php       }
        }
    }
?>