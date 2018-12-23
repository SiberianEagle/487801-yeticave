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
    <div class="container">
      <section class="lots">
         <?php if(count($foundLots)):?>
        <h2>Результаты поиска по запросу «<span><?=$search; ?></span>»</h2>
        <ul class="lots__list">
           <?php foreach ($foundLots as $key => $value): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$value['picture']; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$value['ctitle']; ?></span>
                    <h3 class="lot__title">
                        <a class="text-link" href="lot.php?id=<?=$value['id']; ?>"><?=strip_tags($value['title']); ?>
                        </a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?=$value['start_price']; ?></span>
                            <span class="lot__cost"><?=price_correct($value['start_price']);?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <?=$offer_end ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <h2>Ничего не найдено по вашему запросу</h2>
      <?php endif; ?>
      </section>
      <ul class="pagination-list">
        <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
        <li class="pagination-item pagination-item-active"><a>1</a></li>
        <li class="pagination-item"><a href="#">2</a></li>
        <li class="pagination-item"><a href="#">3</a></li>
        <li class="pagination-item"><a href="#">4</a></li>
        <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
      </ul>
    </div>
  </main>
