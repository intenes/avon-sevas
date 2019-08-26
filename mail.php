<?php
 
$sendto = "mail@avon-sevas.ru"; // почта, на которую будет приходить письмо !!! Измените на свою!!!
$fio = $_POST['fio'];
$index = $_POST['index'];
$date_of_birth = $_POST['date_of_birth'];
$registration_region = $_POST['registration_region'];
$phone = $_POST['phone'];
$area = $_POST['area'];
$mail = $_POST['mail'];
$settlement = $_POST['settlement'];
$passport_series_and_number = $_POST['passport_series_and_number'];
$street_house_building_apartment = $_POST['street_house_building_apartment'];
$department_code = $_POST['department_code'];
$fact_index = $_POST['fact_index'];
$passport_date = $_POST['passport_date'];
$region_of_residence = $_POST['region_of_residence'];
$issued_passport = $_POST['issued_passport'];
$settlement_fact = $_POST['settlement_fact'];
$comment = $_POST['comment'];
$street_house_building_apartment_fact = $_POST['street_house_building_apartment_fact'];

 
// проверяем наличие данных в радиокнопке  и сохраняем их
  $whoareyou = '';
    if (empty($_POST["whoareyou"]))
    {
       $whoareyou = "SEO оптимизация не требуется";
    }
    elseif (!empty($_POST["whoareyou"]) && is_array($_POST["whoareyou"]))
    {
       $whoareyou = implode(" ", $_POST["whoareyou"]);
    }

    //проверяем наличие данных в чекбоксе и сохраняем их
  $consent1 = '';
    if (empty($_POST["consent1"]))
    {
       $consent1 = "не согласен с условиями";
    }
    elseif (!empty($_POST["consent1"]) && is_array($_POST["consent1"]))
    {
       $consent1 = implode(" ", $_POST["consent1"]);
     }
 $consent2 = '';
    if (empty($_POST["consent2"]))
    {
       $consent2 = "не хочу получать продукцию";
    }
    elseif (!empty($_POST["consent2"]) && is_array($_POST["consent2"]))
    {
       $consent2 = implode(" ", $_POST["consent2"]);
     }
 
  
 
// Формирование заголовка письма
  $subject = "Новая анкета с сайта $fio";
  $headers = "From: " . strip_tags($mail) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($mail) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
 
// Формирование тела письма
  $msg = "<html><body style='font-family:Arial,sans-serif;'>";
  $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>".$fio."</h2>\r\n";
  $msg .= "<p><strong>Фамилия Имя Отчество:</strong> ".$fio."</p>\r\n";
  $msg .= "<p><strong>Индекс:</strong> ".$index."</p>\r\n";
  $msg .= "<p><strong>Дата рождения:</strong> ".$date_of_birth."</p>\r\n";
  $msg .= "<p><strong>Регион регистрации:</strong> ".$registration_region."</p>\r\n";
  $msg .= "<p><strong>Контактный телефон:</strong> ".$phone."</p>\r\n";
  $msg .= "<p><strong>Район:</strong> ".$area."</p>\r\n";
   $msg .= "<p><strong>E-mail:</strong> ".$mail."</p>\r\n";
   $msg .= "<p><strong>Населенный пункт:</strong> ".$settlement."</p>\r\n";
   $msg .= "<p><strong>Серия и номер паспорта:</strong> ".$passport_series_and_number."</p>\r\n";
   $msg .= "<p><strong>Улица Дом Корпус Квартира:</strong> ".$street_house_building_apartment."</p>\r\n";
  $msg .= "<p><strong>Код подразделения:</strong> ".$department_code."</p>\r\n";
  $msg .= "<p><strong>Индекс проживания:</strong> ".$fact_index."</p>\r\n";
  $msg .= "<p><strong>Дата выдачи паспорта:</strong> ".$passport_date."</p>\r\n";
  $msg .= "<p><strong>Регион проживания:</strong> ".$region_of_residence."</p>\r\n";
   $msg .= "<p><strong>Кем выдан паспорт:</strong> ".$issued_passport."</p>\r\n";
   $msg .= "<p><strong>Населенный пункт проживания:</strong> ".$settlement_fact."</p>\r\n";
     $msg .= "<p><strong>Комментарий:</strong> ".$comment."</p>\r\n";
     $msg .= "<p><strong>Улица Дом Корпус Квартира проживания:</strong> ".$street_house_building_apartment_fact."</p>\r\n";
  
  $msg .= "<p><strong>Дополнительные параметры учетной записи:<br/> </strong> ".$fio."</p>\r\n";
  $msg .= "<p><strong>Кем хочу быть:<br/> </strong>".$whoareyou."</p>\r\n";
  $msg .= "<p>".$consent1."</p>\r\n";
  $msg .= "<p>".$consent2."</p>\r\n";
  $msg .= "</body></html>";
 
// отправка сообщения
  if(@mail($sendto, $subject, $msg, $headers)) {
  echo "<html><head><meta http-equiv='Refresh' content='5; URL=/".$_SESSION['id']."'></head><body><h2>Ваша анкета отправлена.</h2> <p>Вы будете перемещены через 5 сек. Если не хотите ждать, то <a href='https://avon-sevas.ru'>нажмите сюда.</a></p></body></html>";//отправляем пользователя назад
  } 

?>