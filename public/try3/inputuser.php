<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="cyberpunk-bg">
  <div class="login-box">
    <h2>
<?php
$username = $_GET['username'] ?? '';
$useraddress = $_GET['useraddress'] ?? '';
$usermail = $_GET['usermail'] ?? '';

$errors = [];

if (!mb_ereg('^[ぁ-んァ-ヶ一-龠々]{1,20}$', $username)) {
  $errors[] = "20文字以内で名前を入力してください。記号等は利用できません。";
}

if (!mb_ereg('^[ぁ-んァ-ヶ一-龠々0-9\-]{1,30}$', $useraddress)) {
  $errors[] = "30文字以内で住所を入力してください。記号等は利用できません。";
}

if (!mb_ereg('^[a-zA-Z0-9._\-]+@[a-zA-Z0-9._\-]+\.[a-zA-Z]{2,}$', $usermail) || mb_strlen($usermail) > 100) {
  $errors[] = "正しいメールアドレス形式で入力してください。記号は.-_@のみ利用可能。";
}

if (!empty($errors)) {
  echo "エラーがあります：<br>";
  foreach ($errors as $e) {
    echo "・" . htmlspecialchars($e) . "<br>";
  }
  echo "</h2></div></body></html>";
  exit;
}

echo "あなたが入力した値<br>";
echo "名前：" . htmlspecialchars($username) . "<br>";
echo "住所：" . htmlspecialchars($useraddress) . "<br>";
echo "メールアドレス：" . htmlspecialchars($usermail);
?>
    </h2>
  </div>
</body>
</html>
