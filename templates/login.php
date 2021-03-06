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
    <form class="form container <?=$classname; ?>" action="login.php" method="post"> <!-- form--invalid -->
      <h2>Вход</h2>
      <?php 
        $classname = isset($errors['email']) ? 'form__item--invalid' : '';
        $val = isset($formValues['email']) ? $formValues['email'] : '';
      ?>
      <div class="form__item <?=$classname; ?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$val; ?>">
        <span class="form__error">Введите верный e-mail</span>
      </div>
      <?php 
        $classname = isset($errors['password']) ? 'form__item--invalid' : '';
        $val = isset($formValues['password']) ? $formValues['password'] : '';
      ?>
      <div class="form__item form__item--last <?=$classname; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?=$val; ?>">
        <span class="form__error">Введите верный пароль</span>
      </div>
      <button type="submit" class="button">Войти</button>
    </form>
  </main>