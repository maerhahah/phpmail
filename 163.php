<?php

//邮件发送
require './mailer/class.phpmailer.php';
require './mailer/class.smtp.php';
date_default_timezone_set('PRC');
ignore_user_abort();
set_time_limit(0);

$mail = new PHPMailer();
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.163.com';
//$mail->SMTPSecure = 'ssl';
//设置ssl连接smtp服务器的远程服务器端口号 可选465或587
$mail->Port = 25;
$mail->Hostname = 'localhost';
$mail->CharSet = 'UTF-8';
$mail->FromName = '配置文件';
$mail->Username = '****@163.com';
$mail->Password = '123456789';
$mail->From = '****@163.com';
$mail->isHTML(true);
//$mail->addAddress('111111111@163.com', '这个QQ的昵称');
$mail->addAddress('*********@163.com', 'IPC');
$mail->Subject = '配置文件更新';
$mail->Body = "<b style=\"color:red;\">Hello World</b>";
$mail->addAttachment('./sendmail.php', 'gogogo.exe');
$status = $mail->send();
if ($status) {
    echo '发送邮件成功' . date('Y-m-d H:i:s');
} else {
    echo '发送邮件失败，错误信息未：' . $mail->ErrorInfo;
}

