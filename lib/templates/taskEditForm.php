<?
/* @var $oTask JustTasks\CTasks */
?><form>
    <div class="form-group">
        <label for="inputName">Имя</label>
        <input type="text" class="form-control" id="inputName" placeholder="Введите имя" value="<?= $oTask->arFields['NAME']?>">
    </div>
    <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="mailbox@maildomain.com" value="<?= $oTask->arFields['NAME']?>">
    </div>
    <div class="form-group">
        <label for="inputText">Текст</label>
        <textarea class="form-control" id="inputText" rows="3"><?= $oTask->arFields['TEXT']?></textarea>
    </div>
    <div id="inputAlert" class="alert alert-danger" role="alert">
    </div>
    <button class="js-submitTask btn btn-primary" data-id="<?= $oTask->arFields['ID']?>">Сохранить</button><button class="js-clearForm btn btn-secondary">Отмена</button>
</form>
