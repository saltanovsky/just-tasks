<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KPI</title>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css"/>
	<script src="script.js"></script>
</head>
<body>
<?php
const LIB_PATH = '/home/bitrix/www/test/just-tasks';
if (defined('LIB_PATH')) {
    require_once(LIB_PATH . '/lib/autoload.php');
	$templatesPath = LIB_PATH . '/lib/templates';
} else {
    require_once(__DIR__ . '/lib/autoload.php');
    $templatesPath = __DIR__ . '/lib/templates';
}
$loader = new \JustTasks\Loader();

?>
<div id="main">
    <div class="preloader">
        <div class="spinner-border text-secondary preloader__loader" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div id="progressInfo"></div>
        <div id="progressbar"><div id="progressScale"></div></div>
    </div>
	<div id="interactive"></div>
	<div id="AddBtn"><button class="js-addTask btn btn-info">Добавить задачу</button></div>
	<div id="AuthBtn"><?
        require_once($templatesPath . '/authButton.php');
	?></div>
	<div id="list"><?
		$arResult = \JustTasks\CTasksController::getList();
		require_once($templatesPath . '/taskList.php');
	?></div>
</div>

</body>
</html>
