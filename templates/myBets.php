 <main class="container">
  <div class="history">
          <h3>История моих ставок (<span><?=$betsNumber; ?></span>)</h3>
           <table class="history__list">
            <tr class="history__item" style="text-align:center">
                <td class="history__price">Название лота</td>
                <td class="history__price">цена</td>
                <td class="history__time">дата ставки</td>
                <td class="history__price">статус</td>
                <td class="history__price">контакты автора лота</td>
            </tr>
              <?php foreach ($bets as $key => $value) : ?>

              <?php $status = ($bets[$key]['idOfWinner'] == $_SESSION['id']) ? "победная!" : NULL; ?>
              <?php $style= ($bets[$key]['idOfWinner'] == $_SESSION['id']) ? "background:rgb(0, 160, 24, 0.7)" : NULL; ?>

              <tr class="history__item" style="<?=$style; ?>">
              	<td class="history__price">
              		<a href="lot.php?id=<?=$bets[$key]['bid']; ?>">
              		  <?=$bets[$key]['lotTitle']; ?>
              	  </a>
              	</td>
                <td class="history__price">
                  <?=price_correct($bets[$key]['sum'])." р"; ?>  
                </td>
                <td class="history__time"><?=$bets[$key]['date']; ?></td>
                <td class="history__price" style="width: 58px; color: white; transform: rotate(-20deg); ">
                  <?=$status; ?>
                </td>
                <td class="history__price"><?=$bets[$key]['contact']; ?></td>
              </tr>
              <?php endforeach; ?>
            
            </table>
 </div>
</main>
