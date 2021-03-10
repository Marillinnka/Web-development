<?php
// пароль
$password = isset($_GET['password']) ? (string) $_GET['password'] : null;
$length = strlen($password); // длинна пароля
$recurringChar = 0; // кол-во повторяющихся символов
$quantityDigits = 0; // кол-во цифр
$charUppercase = 0; // кол-во букв верхнего регистра
$charLowercase = 0; // кол-во букв нижнего регистра
/*
 * Вычисление кол-ва повторяющихся символов
 * count_chars() - подсчитывает кол-во вхождений каждого из символов
 * и формирует массив данных
 */
foreach (count_chars($password) as $number)
{
    // если количество символов больше 1, тогда <повторяющиеся символы> + <кол-во символов>
    $number > 1 ? $recurringChar = $recurringChar + $number : null;
}
// вычисление кол-ва цифр, символов нижнего и верхнего регистра
foreach (str_split($password , 1 ) as $char)
{
    // если $char число, то $quantityDigits + 1
    ctype_digit($char) ? $quantityDigits++ : null;
    // если $char буква в ниж. регистре, то $charUppercase + 1
    ctype_upper($char) ? $charUppercase++ : null;
    // если $char буква в ниж. регистре, то $charLowercase + 1
    ctype_lower($char) ? $charLowercase++ : null;
}
/*
 * Вычисление надежности
 */
// надежность пароля
$strength = 0;
// 4 * <длинна>
$strength = $strength + 4 * $length;
// 4 * <кол-во цифр>
$strength = $strength + 4 * $quantityDigits;
// если букв в верх. рег. больше 0, то (<длинна> - <буквы в верх.рег>) *2
$charUppercase > 0 ? $strength = $strength + ($length - $charUppercase) * 2 : null;
// если букв в ниж. рег. больше 0, то (<длинна> - <буквы в ниж.рег>) *2
$charLowercase > 0 ? $strength = $strength + ($length - $charLowercase) * 2 : null;
// если пароль состоит только из букв, то <надежность> - <длинна>
ctype_alpha($password) ? $strength = $strength - $length : null;
// если пароль состоит только из цифр, то <надежность> - <длинна>
ctype_digit($password) ? $strength = $strength - $length : null;
// <надежность> - <повторяющиеся символы>
$strength = $strength - $recurringChar;

header("Content-Type: text/plain");
echo $strength;


