<?php
function saveFeedbackPage(): void
{
    $formValue['first-name'] = getPostParameter('first-name');
    $formValue['email'] = getPostParameter('email');
    $formValue['country'] = getPostParameter('country');
    $formValue['gender'] = getPostParameter('gender');
    $formValue['text-messege'] = getPostParameter('text-messege');
    $errors = [];
    if (!filter_var($formValue['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors['email_error_msg'] = 'Введите корректный e-mail';
    }
    if ($formValue['first-name'] === '')
    {
        $errors['first-name_error_msg'] = 'Поле должно быть заполнено. Введите имя';
    }
    if ($formValue['email'] === '')
    {
        $errors['email_error_msg'] = 'Поле должно быть заполнено. Введите e-mail';
    }
    if ($formValue['text-messege'] === '')
    {
        $errors['text-messege_error_msg'] = 'Поле должно быть заполнено. Введите сообщение';
    }
    if ($errors === [])
    {
        $file = fopen(__DIR__ . '/../../web/saved files/' . strtolower($formValue['email']) . '.txt', 'w');

        $text = serialize($formValue);

        fwrite($file, $text);
        fclose($file);
        $args['notification'] = 'Данные успешно сохранены';
    }
    else
    {
        $args = array_merge($errors, $formValue);
    }
    renderTemplate('main.tpl.php', $args);
}
