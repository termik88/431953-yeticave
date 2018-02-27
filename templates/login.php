<?php
?>

<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $key => $category) : ?>
            <li class="nav__item">
                <a href="all-lots.html"><?=$category?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<form class="form container<?= isset($errors) ? ' form--invalid' : ''; ?>" action="login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item<?= isset($errors['email']) ?  ' form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail"
               value="<?= isset($login_form['email']) ? $login_form['email'] : ''; ?>" >
        <span class="form__error"><?= isset($errors['email']) ? $errors['email'] : ''; ?></span>
    </div>
    <div class="form__item form__item--last<?= isset($errors['password']) ?  ' form__item--invalid' : ''; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль"
               value="<?= isset($login_form['password']) ? $login_form['password'] : ''; ?>" >
        <span class="form__error"><?= isset($errors['password']) ? $errors['password'] : ''; ?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
