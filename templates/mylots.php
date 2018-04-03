<?php
  require('lot-data.php');
  $mylotsData = $dataArray;
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
  <section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
      <?php foreach ($mylotsData as $key => $val) : ?>
      <tr class="rates__item">
        <td class="rates__info">
          <div class="rates__img">
            <img src="../<?=$goods[$val['lot-number']]['url'] ?>" width="54" height="40" alt="Сноуборд">
          </div>
          <h3 class="rates__title"><a href="lot.php?lot=<?=$val['lot-number'] ?>"><?=$goods[$val['lot-number']]['name'] ?></a></h3>
        </td>
        <td class="rates__category">
          <?=$goods[$val['lot-number']]['category'] ?>
        </td>
        <td class="rates__timer">
          <div class="timer timer--finishing"><?=$val['time-remaining'] ?></div>
        </td>
        <td class="rates__price">
          <?=$val['cost'] ?>
        </td>
        <td class="rates__time">
          <?=getBetTime($val['time']) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </section>