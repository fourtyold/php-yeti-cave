<?php 
  $email = $dataArray['email'];
  $password = $dataArray['password'];
  $fieldsInvalid = $dataArray['fields-invalid'];
?>

<nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
  <?php if (count($fieldsInvalid)) : ?>
  <form class="form container form--invalid" action="login.php" method="post"> <!-- form--invalid -->
  <?php else : ?>
  <form class="form container" action="login.php" method="post"> <!-- form--invalid -->
  <?php endif; ?>
    <h2>Вход</h2>
    <?php if (in_array('email', $fieldsInvalid)) : ?>
    <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
    <?php else : ?>
    <div class="form__item">
    <?php endif; ?>
      <label for="email">E-mail*</label>
      <input id="email" type="email" name="email" placeholder="Введите e-mail"  value="<?=$email; ?>" >
      <?php if (in_array('unknown-user', $fieldsInvalid)) : ?>
      <span class="form__error">Введенный e-mail не найден</span>
      <?php else : ?>
      <span class="form__error">Введите e-mail</span>
      <?php endif; ?>
    </div>
    <?php if (in_array('password', $fieldsInvalid)) : ?>
    <div class="form__item form__item--last form__item--invalid">
    <?php else : ?>
    <div class="form__item form__item--last">
    <?php endif; ?>  
      <label for="password">Пароль*</label>
      <input id="password" type="password" name="password" placeholder="Введите пароль"  value="<?=$password; ?>" >
      <?php if (in_array('incorrect-password', $fieldsInvalid)) : ?>
      <span class="form__error">Введенный пароль не верный</span>
      <?php else : ?>
      <span class="form__error">Введите пароль</span>
      <?php endif; ?>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>