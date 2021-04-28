<?php
function feedbackPage(): void
{
    renderTemplate('feedbacks.tpl.php');
}
function feedbacksListPage(): void
{
    $errors = [];
    $data = [];
    $email = getPostParameter('email');
    $pathFile = __DIR__ . '/../../web/saved files/' . $email . '.txt';
    if (file_exists($pathFile))
    {
        $rawData = file_get_contents($pathFile);
        $data = unserialize($rawData);
    }
    else
    {
        $errors['email_error_msg'] = 'E-mail не найден';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors['email_error_msg'] = 'Введите корректный e-mail';
    }
    if ($email === '')
    {
        $errors['email_error_msg'] = 'Поле должно быть заполнено. Введите e-mail';
    }
    renderTemplate('feedbacks.tpl.php', array_merge($errors, $data, ['email' => $email]));
}
