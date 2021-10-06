<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr><th>Имя</th><th>email</th><th>Текст</th><th>Статус</th></tr>
    </thead>
    <tbody>
    <?
	/* @var $arResult array */
    foreach ($arResult['items'] as $taskID => $arTask) {
        ?><tr><td><?= $arTask['NAME']?></td><td><?= $arTask['EMAIL']?></td><td><?= $arTask['TEXT']?></td><td><?= $arTask['STATUS']?><?= ($arTask['MODERATED'] == 'Y') ? '<br>Изменено администратором' : '' ?></td></tr><?
    }
    ?>
    </tbody>
</table>