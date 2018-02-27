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
<form class="form form--add-lot container<?= isset($errors) ? ' form--invalid' : ''; ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php $classname = isset($errors['title']) ?  ' form__item--invalid' : '';
        $value = isset($lot['title']) ? $lot['title'] : ''; ?>
        <div class="form__item<?= $classname ?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="title" placeholder="Введите наименование лота" value="<?= $value ?>" required>
            <span class="form__error"><?= isset($errors['title']) ? $errors['title'] : '' ?></span>
        </div>
        <?php $classname = isset($errors['category']) ?  ' form__item--invalid' : '';
        $value = isset($lot['category']) ? $lot['category'] : ''; ?>
        <div class="form__item<?= $classname ?>">
            <label for="category">Категория</label>
            <select id="category" name="category" required>
                <?php if (!$value): ?>
                    <option selected disabled>Выберите категорию</option>
                    <option>Доски и лыжи</option>
                    <option>Крепления</option>
                    <option>Ботинки</option>
                    <option>Одежда</option>
                    <option>Инструменты</option>
                    <option>Разное</option>
                <?php else: ?>
                    <option disabled>Выберите категорию</option>
                    <?php foreach ($categories as $value_array): ?>
                        <?php if ($value !== $value_array): ?>
                            <option><?= $value_array ?></option>
                        <?php else: ?>
                            <option selected><?= $value_array ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <span class="form__error"><?= isset($errors['category']) ? $errors['category'] : '' ?></span>
        </div>
    </div>
    <?php $classname = isset($errors['description']) ?  ' form__item--invalid' : '';
    $value = isset($lot['description']) ? $lot['description'] : ''; ?>
    <div class="form__item form__item--wide<?= $classname ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="description" placeholder="Напишите описание лота" required><?= $value ?></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <?php $classname = isset($errors['image_url']) ?  ' form__item--invalid' : '';
    $value = isset($lot['image_url']) ? $lot['image_url'] : ''; ?>
    <div class="form__item form__item--file<?= $classname ?>"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" name="add_img" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <?php $classname = isset($errors['price']) ?  ' form__item--invalid' : '';
        $value = isset($lot['price']) ? $lot['price'] : ''; ?>
        <div class="form__item form__item--small<?= $classname ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="price" placeholder="0" value="<?= $value ?>" required>
            <span class="form__error"><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
        </div>
        <?php $classname = isset($errors['lot-step']) ?  ' form__item--invalid' : '';
        $value = isset($lot['lot-step']) ? $lot['lot-step'] : ''; ?>
        <div class="form__item form__item--small<?= $classname ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $value ?>" required>
            <span class="form__error"><?= isset($errors['lot-step']) ? $errors['lot-step'] : '' ?></span>
        </div>
        <?php $classname = isset($errors['lot-date']) ?  ' form__item--invalid' : '';
        $value = isset($lot['lot-date']) ? $lot['lot-date'] : ''; ?>
        <div class="form__item <?= $classname ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $value ?>" required>
            <span class="form__error"><?= isset($errors['lot-date']) ? $errors['lot-date'] : '' ?></span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <ul>
        <?php if (isset($errors)) {
            foreach ($errors as $key => $value): ?>
                <li><strong><?= $dict[$key] ?>: </strong><?= $value ?></li>
            <?php endforeach;
        } ?>
    </ul>
    <button type="submit" class="button">Добавить лот</button>
</form>
