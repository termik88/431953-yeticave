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
        <?php foreach ($categories as $key => $category) : ?>
            <li class="nav__item">
                <a href="all-lots.html"><?=$category?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section class="lot-item container">
    <?php if (isset($lot)): ?>
    <h2><?= htmlspecialchars($lot['title']) ?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?= $lot['image_url'] ?>" width="730" height="548" alt="<?= htmlspecialchars($lot['title']) ?>">
        </div>
        <p class="lot-item__category">Категория: <span><?= htmlspecialchars($lot['category']) ?></span></p>
        <p class="lot-item__description"><?= htmlspecialchars($lot['description']) ?></p>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <div class="lot-item__timer timer"><?= calc_date(date('H:i:s')) ?></div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?= modify_price(htmlspecialchars($lot['price'])) ?></span>
            </div>
              <?php if ($bets): ?>
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
          <?php if (isset($bets)): ?>
            <div class="history">
              <h3>История ставок (<span><?= count($bets) ?></span>)</h3>
              <table class="history__list">
                  <?php foreach ($bets as $key => $value): ?>
                      <tr class="history__item">
                          <td class="history__name"><?= htmlspecialchars($value['name']) ?></td>
                          <td class="history__price"><?= htmlspecialchars($value['price']) ?></td>
                          <td class="history__time"><?= date('H:i', strtotime('-' . rand(1, 50) .' minute')) ?></td>
                      </tr>
                  <?php endforeach; ?>
              </table>
            </div>
          <?php endif; ?>
      </div>
    </div>
    <?php else: ?>
        <h1>Лот с ID "<?= $lot_id ?>" не найден</h1>
    <?php endif; ?>
  </section>
