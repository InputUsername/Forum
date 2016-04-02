<?php

namespace forum;

require_once('includes/db.php');

// Connect to database
$db = new database\Database();
$db->connect();

// Get request parameters
if (!isset($_GET['id'])) {
	//TODO: error
	die();
}

$request_id = $_GET['id'];

if ($result = $db->query('SELECT * FROM users WHERE id=' . $request_id)) {
	$user = $result->fetch_assoc();
}

$db->disconnect();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Forum</title>

	<style type="text/css">
		.admin:after {
			content: "•";
			color: #f00;
		}
	</style>
</head>
<body>
	<div id="userInfo">
		<h2 id="username" <?php echo ($user['is_admin'] ? 'class="admin"' : ''); ?>><?php echo $user['username']; ?></h2>
		<h3 id="realname"><?php echo $user['real_name']; ?></h3>
		<p title="<?php echo $user['registered']; ?>">Member since <?php echo \DateTime::createFromFormat('Y-m-d H:i:s', $user['registered'])->format('F d, Y'); ?></p>
		<img src="<?php echo $config['profile_upload_dir'] . md5($user['id']); ?>.jpg" alt="profile">
	</div>
</body>
</html>
