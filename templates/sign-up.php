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
    <form class="form container <?=$classname; ?>" action="sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
      <h2>Регистрация нового аккаунта</h2>
      <?php 
        $classname = isset($errors['email']) ? 'form__item--invalid' : '';
        $val = isset($formValues['email']) ? $formValues['email'] : '';
      ?>
      <div class="form__item  <?=$classname; ?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$val; ?>">
        <span class="form__error">Данный e-mail либо используется, либо введен некоректно</span>
      </div>
      <?php 
        $classname = isset($errors['password']) ? 'form__item--invalid' : '';
        $val = isset($formValues['password']) ? $formValues['password'] : '';
      ?>
      <div class="form__item <?=$classname; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?=$val; ?>">
        <span class="form__error">Введите пароль</span>
      </div>
      <?php 
        $classname = isset($errors['name']) ? 'form__item--invalid' : '';
        $val = isset($formValues['name']) ? $formValues['name'] : '';
      ?>
      <div class="form__item <?=$classname; ?>">
        <label for="name">Имя*</label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="<?=$val; ?>">
        <span class="form__error">Введите имя</span>
      </div>
      <?php 
        $classname = isset($errors['message']) ? 'form__item--invalid' : '';
        $val = isset($formValues['message']) ? $formValues['message'] : '';
      ?>
      <div class="form__item <?=$classname; ?>">
        <label for="message">Контактные данные*</label>
        <textarea id="message" name="message" placeholder="Напишите как с вами связаться">  <?=$val; ?>
        </textarea>
        <span class="form__error">Напишите как с вами связаться</span>
      </div>
      <div class="form__item form__item--file form__item--last">
        <label>Аватар</label>
        <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
          </div>
        </div>
        <?php
        $classname = isset($errors['file']) ? 'form__item--invalid' : '';
        ?>
        <div class="form__input-file <?=$classname; ?>">
          <input class="visually-hidden" type="file" id="photo2" value="" name="userfile">
          <label for="photo2">
            <span>+ Добавить</span>
          </label>
          <span class="form__error">Добавьте изображение</span>
        </div>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Зарегистрироваться</button>
      <a class="text-link" href="#">Уже есть аккаунт</a>
    </form>
  </main>