<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 14.02.2018
 * Time: 23:23
 */
?>
<nav class="nav">
    <ul class="nav__list container">
        <?php if ($categories): ?>
            <?php foreach ($categories as $cat): ?>
                <li class="nav__item">
                    <a href="index.php?cat_id=<?= $cat['id']; ?>"><?= $cat['name'] ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</nav>
<section class="lot-item container">
    <?php if (isset($lot)): ?>
    <h2><?= htmlspecialchars($lot['0']['name_lot']) ?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?= $lot['0']['picture'] ?>" width="730" height="548" alt="<?= htmlspecialchars($lot['name_lot']) ?>">
        </div>
        <p class="lot-item__category">Категория: <span><?= htmlspecialchars($lot['0']['categories_name']) ?></span></p>
        <p class="lot-item__description"><?= htmlspecialchars($lot['0']['description']) ?></p>
      </div>
      <div class="lot-item__right">
        <?php if ($authorization) : ?>
            <div class="lot-item__state">
              <div class="lot-item__timer timer"><?= calc_date(date('H:i:s')) ?></div>
              <div class="lot-item__cost-state">
                <div class="lot-item__rate">
                  <span class="lot-item__amount">Текущая цена</span>
                  <span class="lot-item__cost"><?= modify_price(htmlspecialchars($lot['price'])) ?></span>
                </div>
                  <?php if (isset($lot['user_name'])): ?>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span>12 000 р</span>
                    </div>
                  </div>
                  <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                    <p class="lot-item__form-item">
                      <label for="cost">Ваша ставка</label>
                      <input id="cost" type="number" name="cost" placeholder="12 000">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                  </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            <div class="history">
              <h3>История ставок (<span><?= count($lot['0']['user_name']) ? count($lot) : 'Нет ставок' ?></span>)</h3>
                <?php if (isset($lot['0']['user_name'])): ?>
                  <table class="history__list">
                      <?php foreach ($lot as $key => $value): ?>
                          <tr class="history__item">
                              <td class="history__name"><?= htmlspecialchars($value['user_name']) ?></td>
                              <td class="history__price"><?= htmlspecialchars($value['sut_bet']) ?></td>
                              <td class="history__time"><?= ($value['date_bet']) ?></td>
                          </tr>
                      <?php endforeach; ?>
                  </table>
                <?php endif; ?>
            </div>
      </div>
    </div>
    <?php endif; ?>
  </section>
