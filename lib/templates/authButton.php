<?php
$user = new \JustTasks\CUser();
if ($user->isAuthorized) {
    ?>Вы авторизованы как <?= $user->getName() ?><br><button class="js-logout btn btn-info">Выйти</button><?
} else {
    ?><button class="js-login btn btn-info">Авторизация</button><?
}