<?php

define('BASEPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('SYSPATH', BASEPATH . 'src' . DIRECTORY_SEPARATOR);

require_once SYSPATH . 'helper.php';
require_once SYSPATH . 'Loader.php';

// Loader::run();

$loader = new Loader();
$loader->run();

// $pdo = new PDO('mysql:host=localhost;dbname=zo_hrd', 'root','');
// $stmt = $pdo->prepare('select b.dept_id, b.dept_name, a.user_id, a.name from master_employee a left join master_department b on b.dept_id = a.default_deptid where a.user_id not in (?);');
// $result = $stmt->execute(['1,1']);
// var_dump(['yuli_manager','dc76e9f0c0006e8f919e0c515c66dbba3982f785',1,'Factory Manager',640,'Yulianto s']);

// var_dump($stmt->fetchAll());

// $stmt->debugDumpParams();

// var_dump($stmt->fetchAll());