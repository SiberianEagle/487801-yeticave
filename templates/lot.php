<main>
    <nav class="nav">
      <ul class="nav__list container">
            <?php foreach ($categories as $key => $value): ?>
            <li class="nav__item">
                <a href="pages/all-lots.html"><?=strip_tags($value['title']); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </nav>
    <section class="lot-item container">
      <h2><?=$item[0]['title']; ?></h2>
      <div class="lot-item__content">
        <div class="lot-item__left">
          <div class="lot-item__image">
            <img src="<?=$item[0]['picture']; ?>" width="730" height="548" alt="Сноуборд">
          </div>
          <p class="lot-item__category">Категория: <span><?=$item[0]['ctitle']; ?></span></p>

          <p class="lot-item__description"><?=strip_tags($item[0]['discription']); ?></p>
        </div>
        <div class="lot-item__right">

          <?php if(isset($_SESSION['name'])): ?>
          
          <div class="lot-item__state">
            <div class="lot-item__timer timer">
              <?=$offer_end; ?>
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost"><?=price_correct($item[0]['final_price']); ?></span>
              </div>
              <div class="lot-item__min-cost">
                Мин. ставка <span><?=$item[0]['bet_step']; ?></span>
              </div>
            </div>

            <?php
            $classname = isset($errors['cost']) ? 'form__item--invalid' : '';
            ?>
            <form class="lot-item__form" action="lot.php?id=<?=$id; ?>" method="post">
              <p class="lot-item__form-item form__item <?=$classname; ?>">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="text" name="cost" placeholder="12 000">
                <span class="form__error">Введите корректную ставку</span>
              </p>
              <button type="submit" class="button">Сделать ставку</button>
            </form>
          </div>

          <?php endif; ?>

          <div class="history">
            <h3>История ставок (<span><?=$betsNumber; ?></span>)</h3>
            <table class="history__list">

              <?php foreach ($bets as $key => $value) : ?>
              <tr class="history__item">
                <td class="history__name"><?=$bets[$key]['name']; ?></td>
                <td class="history__price"><?=price_correct($bets[$key]['sum'])." р"; ?></td>
                <td class="history__time"><?=$bets[$key]['date']; ?></td>
              </tr>
              <?php endforeach; ?>
            
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>