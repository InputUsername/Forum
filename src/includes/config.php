<?php

namespace forum;

$config = array();

// Upload directory for profile images
$config['profile_upload_dir'] = 'assets/uploads/profile/';

$config['mysql'] = array();
$config['mysql']['host'] = 'localhost';
$config['mysql']['user'] = 'root';
$config['mysql']['pass'] = '';
$config['mysql']['db'] = 'forum';

// Smarty include dir
$config['smarty_dir'] = 'includes/smarty-3.1.29/libs/';
