<html>
<head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
    <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
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
<form action="" method="POST">
  <div class = "main">
 <div class = "name"><label>FIO</label>
 <input name="fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" /></div>
  <div class = "email"><label>E-MAIL</label>
  <input name="email" <?php if ($errors['email'] ) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" /></div>
  <div class = "year"><label>YEAR</label>
  <select name="year">
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select></div>
  <div class = "sex"><label>Your SEX?</label>
  <label>Man</label><input type="radio" checked="checked" name="sex" value="0" />
  <label>WoMan</label><input type="radio" name="sex" value="1" />
  </div>
  
  <div class = "limbs"><label>Num Of LIMBS?</label>
  <label>4 limbs</label>
  <input type="radio" checked="checked" name="limbs" value="4" />
  <label>8 limbs</label>
  <input type="radio" name="limbs" value="8" />   
  <label>16 limbs</label>       
  <input type="radio" name="limbs" value="16" /> 
  </div>

  <div class = "ability">
  <select name="abilities[]" multiple="multiple">
    <option select="selected" value="0">нет</option>
    <option value="1">невидимость</option>
    <option value="2">телепортация</option>
    <option value="3">левитация</option>
    <option value="4">всезнание</option>
  </select>
  </div>

  <div class = "biography"><label> Ваша биография:</label>
        <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?> value="<?php print $values['biography']; ?>"></textarea>
  </div>

  <p>
    <input type="checkbox" name="check1" /> С контрактом ознакомлен(а)
 </p>
  <input type="submit" value="отправить" />
  </div>
</form>
  </div>
  </body>
</html>
