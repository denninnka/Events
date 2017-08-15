<?php
$errors = array();
if (isset($_POST['submitRegistration'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    if (mb_strlen($username) < 3 || mb_strlen($username) > 50) {
        $errors[] = "<p>Името не трябва да е по късо от 3 символа и не може да е по-дълго от 50 символа</p>";
    }
    if (mb_strlen($password) !== 6) {
        $errors[] = "<p>Паролата трябва да съдържа 6 символа</p>";
    }
    if ($password !== $repassword) {
        $errors[] = "<p>Паролата е грешна</p>";
    }
    $username = mysqli_real_escape_string($con, $username);
    $q = 'SELECT username FROM Users WHERE username = "' . $username .'"';
    if ($result = mysqli_query($con, $q)) {
        if (mysqli_error($con)) {
            echo "Грешка1";
            exit;
        }
        $rowcount = mysqli_num_rows($result);
        if ($rowcount != 0) {
            $errors[] = "<p>Съществува потребител с такова име</p>";
        }
    }
    if (count($errors) == 0) {
        $query = mysqli_query($con, 'INSERT INTO Users (username, password) VALUES ("' . $username . '" , "' . password_hash($password, PASSWORD_DEFAULT) . '")');
        if (mysqli_error($con)) {
            echo "Грешка2";
            exit;
        }
        if (mysqli_query($con, $q)) {
            echo '<div class="alert alert-success">
                    Вашата регистрация е успешна!
                 </div>';
        }

    }

    else{
        echo '<div class="alert alert-danger">';
        foreach ($errors as $value) {
            echo '<p>'.$value.'</p>';
        }
        echo '</div>';
    }
}

render('registration');
?>