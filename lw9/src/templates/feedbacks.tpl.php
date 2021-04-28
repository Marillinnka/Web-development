<!DOCTYPE html>
<html class="html" lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Обратная связь</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../web/css/style.css">
  </head>
  <body>
    <nav class="navbar">
      <a class="navbar-link" href="index.php">Главная</a>
      <a class="navbar-link" href="feedbacks.php">Обратная связь</a>
    </nav>
    <form method="post" class="block-form__form">
      <label class="block-form__form-title block-form__form-star">Ваш email</label>
      <input class="block-form__form-item" type="text" name="email" maxlength="255"
       value="<?php echo $args['email'] ?? ''; ?>" />
      <?php if (isset($args['email_error_msg'])): ?>
        <p class="email-error"><?php echo $args['email_error_msg']; ?></p>
      <?php endif; ?>
      <button class="block-form__button block-form__form-title-button" type="submit">Отправить</button>
      <?php if (!empty($args['first-name'])): ?>
        <ul>
          <li><?php echo $args['first-name'] ?? '' ?></li>
          <li><?php echo $args['email'] ?? '' ?></li>
          <li><?php echo $args['country'] ?? '' ?></li>
          <li><?php echo $args['gender'] ?? '' ?></li>
          <li><?php echo $args['text-messege'] ?? '' ?></li>
        </ul>
      <?php endif; ?>
    </form>
  </body>
</html>
