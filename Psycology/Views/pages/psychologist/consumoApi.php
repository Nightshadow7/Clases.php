<?php
print_r($_GET);
/* if ($_SERVER["REQUEST_METHOD"] == "POST") { */
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,"http://localhost/SkylAb-109/PSYCOLOGY/Apirest/Controllers/campers.php?op=insert");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$_POST);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $server_output = curl_exec($ch);
  echo $server_output;
  curl_close($ch);
/* } */
?>