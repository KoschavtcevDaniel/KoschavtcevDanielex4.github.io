<html>
<head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
    <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
  background-color: rgb(255, 0, 0, 0.3); 
}
    </style>
  </head>

  <body>
  <?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

<div class = "body">
<form action="index.php" method="POST">
  <div class = "main">
 <div class = "name"><label>FIO</label>
 <input name="fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print strip_tags($values['fio']); ?>" /></div>
  <div class = "email"><label>E-MAIL</label>
  <input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print strip_tags($values['email']); ?>" /></div>
  <div class = "year"><label>YEAR</label>
  <select name="year" <?php if ($errors['year']) {print 'class="error"';} ?> value="<?php print strip_tags($values['year']); ?>">
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select></div>
  <div class = "sex" <?php if ($errors['sex']) {print 'class="error"';} ?>><label>Your SEX?</label>
  <label>Man</label><input type="radio" checked="checked" name="sex" value="0" <?php if($values['sex']=="male") {print 'checked';} ?>/>
  <label>WoMan</label><input type="radio" name="sex" value="1" <?php if($values['sex']=="female") {print 'checked';} ?>/>
  </div>
  
  <div class = "limbs"><label>Num Of LIMBS?</label> <?php if ($errors['limbs']) {print 'class="error"';} ?>
  <label>4 limbs</label>
  <input type="radio" checked="checked" name="limbs" value="4" <?php if($values['limbs']=="4") {print 'checked';} ?>/>
  <label>8 limbs</label>
  <input type="radio" name="limbs" value="8" <?php if($values['limbs']=="8") {print 'checked';} ?>/>
  <label>16 limbs</label>       
  <input type="radio" name="limbs" value="16" <?php if($values['limbs']=="16") {print 'checked';} ?>/>
  </div>

  <div class = "ability">  
  <select name="abilities[]" multiple="multiple" <?php if ($errors['ability']) {print 'class="error"';} ?>> 
    <option value="ab_in" <?php if($values['ab_in']==1){print 'selected';} ?>>невидимость</option>
    <option value="ab_t" <?php if($values['ab_t']==1){print 'selected';} ?>>телепортация</option>
    <option value="ab_l" <?php if($values['ab_l']==1){print 'selected';} ?>>левитация</option>
    <option value="ab_v" <?php if($values['ab_v']==1){print 'selected';} ?>>всезнание</option>
  </select>
  </div>

  <div class = "biography"><label> Ваша биография:</label> 
        <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?>><?php print $values['biography']; ?></textarea>
  </div>

  <div class="check" <?php if ($errors['check1']) {print 'error';} ?>>
    <input type="checkbox" name="check1"  <?php if($values['check1']==TRUE){print 'checked';} ?>/> С контрактом ознакомлен(а)
  </div>
  <input type="submit" value="отправить" />
  </div>
</form>
  </div>
  </body>
</html>
