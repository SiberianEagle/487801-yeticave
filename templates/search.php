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
         <?php if(count($foundLotsOnPage)):?>
        <h2>Результаты поиска по запросу «<span><?=$search; ?></span>»</h2>
        <ul class="lots__list">
           <?php foreach ($foundLotsOnPage as $key => $value): ?>
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
                            <span class="lot__cost"><?=price_correct($value['final_price']);?><b class="rub">р</b></span>
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
      <?php if(isset($pages) && count($pages)>1) :?>
      <ul class="pagination-list">
        <?php if($cur_page>1): ?>
          <li class="pagination-item pagination-item-prev">
            <a href="?search=<?=$search;?>&page=<?=$cur_page-1 ; ?>">Назад</a>
          </li>
        <?php endif; ?>
        <?php foreach ($pages as $page) : ?>
            <?php $classname = ($cur_page == $page) ? 'pagination-item-active' : ''; ?>
            <li class="pagination-item <?=$classname; ?>">
                <a href="?search=<?=$search;?>&page=<?=$page; ?>"><?=$page; ?></a>
            </li>
        <?php endforeach; ?>
        <?php if($cur_page<count($pages)): ?>
            <li class="pagination-item pagination-item-next">
                <a href="?search=<?=$search;?>&page=<?=$cur_page+1 ; ?>">Вперед</a>
            </li>
       <?php endif; ?>
      </ul>
      <?php endif; ?>
    </div>
  </main>
