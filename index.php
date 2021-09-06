<?php
echo "Enviando e-mails em massa<br>"; 
$curl = curl_init(' https://nacionalpg.ip-zone.com/ccm/admin/api/version/2/&type=json');
 
// Create rcpt array to send emails to 2 rcpts
$rcpt = array(
    array(
        'name' => 'Thyago Henrique Pacher - 1', 
        'email' => 'thyago.pacher@gmail.com'
    ), 
    array(
        'name' => "Thyago Henrique Pacher - 2", 
        'email' => 'oldwolf1602@hotmail.com'
    ), 
    array(
        'name' => "Thyago Henrique Pacher - 3", 
        'email' => 'thyagopacher@bol.com.br'
    )
);
 
$postData = array(
    'function' => 'sendMail',
    'apiKey' => 'apiKey',
    'subject' => 'Oferecendo Serviços de Desenvolvimento de Sites e Sistemas',
    'html' => '<html><head><title>Title</title></head><body><h1>Programador - Thyago Henrique Pacher</h1> Olá posso desenvolver o que tu quiser e do jeito que quiser!</body></html>',
    'mailboxFromId' => 1,
    'mailboxReplyId' => 1,
    'mailboxReportId' => 1,
    'packageId' => 2,
    'emails' => $rcpt
);
 
$post = http_build_query($postData);
 
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
$json = curl_exec($curl);
$result = json_decode($json);
 
if ($result->status == 0) {
    throw new Exception('Bad status returned. Something went wrong.');
}
 
var_dump($result->data);