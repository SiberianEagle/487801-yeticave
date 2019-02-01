<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $key => $value): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="lot-cat.php?id=<?=$value['id']; ?>"><?=$value['title']; ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Все лоты в категории <?=$category_name; ?></h2>
        </div>
        <ul class="lots__list">
           <?php foreach ($items as $key => $value): ?>
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
    </section>
    <?php if(isset($pages) && count($pages)>1) :?>
      <ul class="pagination-list">
        <?php if($cur_page>1): ?>
          <li class="pagination-item pagination-item-prev">
            <a href="?id=<?=$_GET['id']; ?>&page=<?=$cur_page-1 ; ?>">Назад</a>
          </li>
        <?php endif; ?>
        <?php foreach ($pages as $page) : ?>
            <?php $classname = ($cur_page == $page) ? 'pagination-item-active' : ''; ?>
            <li class="pagination-item <?=$classname; ?>">
                <a href="?id=<?=$_GET['id']; ?>&page=<?=$page; ?>"><?=$page; ?></a>
            </li>
        <?php endforeach; ?>
        <?php if($cur_page<count($pages)): ?>
            <li class="pagination-item pagination-item-next">
                <a href="?id=<?=$_GET['id']; ?>&page=<?=$cur_page+1 ; ?>">Вперед</a>
            </li>
       <?php endif; ?>
      </ul>
      <?php endif; ?>
</main>