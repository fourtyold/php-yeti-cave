  <?php 
     $lotName = $dataArray['lot-name'];
     $message = $dataArray['message'];
     $lotRate = $dataArray['lot-rate'];
     $lotStep = $dataArray['lot-step'];
     $lotDate = $dataArray['lot-date'];
     $fieldsInvalid = $dataArray['invalid-fields'];
     $formSent = $dataArray['form-sent'];
  ?>
  
  <?php if(!$formSent) : ?>
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
  <?php if(count($fieldsInvalid)) : ?>
  <form class="form form--add-lot container form--invalid" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
  <?php else : ?>
  <form class="form form--add-lot container" action="add.php" method="post" enctype="multipart/form-data">
  <?php endif; ?>
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <?php if(in_array('lot-name', $fieldsInvalid)) : ?>
      <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
      <?php else : ?>
      <div class="form__item">
      <?php endif; ?>
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$lotName;?>" required>
        <span class="form__error"><?php if(in_array('lot-name', $fieldsInvalid)) : ?>Обязательное поле<?php endif; ?></span>
      </div>
      <?php if(in_array('category', $fieldsInvalid)) : ?>
      <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
      <?php else : ?>
      <div class="form__item">
      <?php endif; ?>
        <label for="category">Категория</label>
        <select id="category" name="category" required>
          <option>Выберите категорию</option>
          <option>Доски и лыжи</option>
          <option>Крепления</option>
          <option>Ботинки</option>
          <option>Одежда</option>
          <option>Инструменты</option>
          <option>Разное</option>
        </select>
        <span class="form__error"><?php if(in_array('category', $fieldsInvalid)) : ?>Укажите категорию товара<?php endif; ?></span>
      </div>
    </div>
    <?php if(in_array('message', $fieldsInvalid)) : ?>
    <div class="form__item form__item--wide form__item--invalid">
    <?php else : ?>
    <div class="form__item form__item--wide">
    <?php endif; ?>
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required><?=$message; ?></textarea>
      <span class="form__error"><?php if(in_array('message', $fieldsInvalid)) : ?>Обязательное поле<?php endif; ?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="lot-picture" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
      <?php if(in_array('lot-rate', $fieldsInvalid)) : ?>
      <div class="form__item form__item--small form__item--invalid">
      <?php else : ?>
      <div class="form__item form__item--small">
      <?php endif; ?>
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$lotRate; ?>" required>
        <span class="form__error"><?php if(in_array('lot-rate', $fieldsInvalid)) : ?>Обязательное поле<br>(только цифры)<?php endif; ?></span>
      </div>
      <?php if(in_array('lot-step', $fieldsInvalid)) : ?>
      <div class="form__item form__item--small form__item--invalid">
      <?php else : ?>
      <div class="form__item form__item--small">
      <?php endif; ?>
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$lotStep; ?>" required>
        <span class="form__error"><?php if(in_array('lot-step', $fieldsInvalid)) : ?>Обязательное поле<br>(только цифры)<?php endif; ?></span>
      </div>
      <?php if(in_array('lot-date', $fieldsInvalid)) : ?>
      <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
      <?php else : ?>
      <div class="form__item">
      <?php endif; ?>
        <label for="lot-date">Дата завершения</label>
        <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017" value="<?=$lotDate; ?>" required>
        <span class="form__error"><?php if(in_array('lot-date', $fieldsInvalid)) : ?>Обязательное поле<?php endif; ?></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>


  <?php else : ?>
  <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="">Разное</a>
            </li>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$_POST['lot-name'] ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="img/<?=$_FILES['lot-picture']['name']?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=$_POST['category'] ?></span></p>
                <p class="lot-item__description"><?=$_POST['message'] ?></p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?=$_POST['lot-rate'] ?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?=$_POST['lot-rate'] + $_POST['lot-step'] ?></span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
  <?php endif; ?>