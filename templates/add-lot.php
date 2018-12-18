<main>
    <nav class="nav">
      <ul class="nav__list container">
        <?php foreach ($categories as $key => $value): ?>
            <li class="nav__item">
                <a href="pages/all-lots.html">
                  <?=$value['title']; ?>   
                </a>
            </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <?php 
    $classname = count($errors) ? 'form--invalid' : '';
    ?>
    <form class="form form--add-lot container <?=$classname; ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
      <h2>Добавление лота</h2>
      <div class="form__container-two">
        <?php 
        $classname = isset($errors['lot_name']) ? 'form__item--invalid' : '';
        $val = isset($formValues['lot_name']) ? $formValues['lot_name'] : '';
        ?>
        <div class="form__item <?=$classname?>"> <!-- form__item--invalid -->
          <label for="lot-name">Наименование</label>
          <input id="lot-name" type="text" name="lot_name" placeholder="Введите наименование лота" 
          value="<?=$val; ?>">
          <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item">
          <label for="category">Категория</label>
          <select id="category" name="category" >
            <?php $i=1; foreach ($categories as $key => $value): ?>
              <option>
                  <?=$i++.' '.$value['title']; ?>   
              </option>
            <?php endforeach; ?>
          </select>
          <span class="form__error">Выберите категорию</span>
        </div>
      </div>
       <?php 
        $classname = isset($errors['message']) ? 'form__item--invalid' : '';
        $val = isset($formValues['message']) ? $formValues['message'] : '';
        ?>
      <div class="form__item form__item--wide <?=$classname; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$val; ?></textarea>
        <span class="form__error">Напишите описание лота</span>
      </div>
      <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
          </div>
        </div>
        <?php 
        $classname = isset($errors['file']) ? 'form__item--invalid' : '';
        ?>
        <div class="form__input-file form__item--invalid">
          <input class="visually-hidden" type="file" id="photo2" value="" name="userfile">
          <label for="photo2">
            <span>+ Добавить</span>
          </label>
          <span class="form__error">Добавьте изображение</span>
        </div>
      </div>
      <?php
      $classname = isset($errors['lot_rate']) ? 'form__item--invalid' : '';
      $val = isset($formValues['lot_rate']) ? $formValues['lot_rate'] : '';
        ?>
      <div class="form__container-three">
        <div class="form__item form__item--small <?=$classname; ?>">
          <label for="lot-rate">Начальная цена</label>
          <input id="lot-rate" name="lot_rate" placeholder="0" value="<?=$val; ?>">
          <span class="form__error">Введите начальную цену</span>
        </div>
        <?php
        $classname = isset($errors['lot_step']) ? 'form__item--invalid' : '';
        $val = isset($formValues['lot_step']) ? $formValues['lot_step'] : '';
        ?>
        <div class="form__item form__item--small <?=$classname; ?>">
          <label for="lot-step">Шаг ставки</label>
          <input id="lot-step" name="lot_step" placeholder="0" value="<?=$val;?>">
          <span class="form__error">Введите шаг ставки</span>
        </div>
         <?php
        $classname = isset($errors['lot_date']) ? 'form__item--invalid' : '';
        $val = isset($formValues['lot_date']) ? $formValues['lot_date'] : '';
        ?>
        <div class="form__item <?=$classname; ?>">
          <label for="lot-date">Дата окончания торгов</label>
          <input class="form__input-date" id="lot-date" type="date" name="lot_date" value="<?=$val;?>">
          <span class="form__error">Введите дату завершения торгов</span>
        </div>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Добавить лот</button>
    </form>
  </main>