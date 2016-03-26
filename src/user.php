<?php

namespace forum;

require_once('includes/db.php');

$db = new database\Database();
$db->connect();

if ($result = $db->query('SELECT * FROM users WHERE id=1')) {
	$user = $result->fetch_assoc();
}

$db->disconnect();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Forum</title>
</head>
<body>
	<div id="userInfo">
		<h2 id="username"><?php echo $user['username']; ?></h2>
		<h3 id="realname"><?php echo $user['real_name']; ?></h3>
		<img src="/assets/uploads/profile/<?php echo md5($user['id']); ?>.jpg" alt="profile">
	</div>
</body>
</html>
