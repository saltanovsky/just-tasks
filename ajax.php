<?php
require_once(__DIR__ . '/lib/autoload.php');
$templatesPath = __DIR__ . '/lib/templates';
$loader = new \JustTasks\Loader();

if (!empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'taskForm') {
        $oTask = new \JustTasks\CTasks($_REQUEST['id']);
        include $templatesPath . '/taskEditForm.php';
    }
    elseif ($_REQUEST['action'] == 'saveTask') {
        if (!empty($_REQUEST['fields'])) {
            $arFields = $_REQUEST['fields'];
            $oTask =  new \JustTasks\CTasks();
            $checkRes = \JustTasks\CTasksController::checkFields($arFields);
            if (empty($checkRes)) {
                if (empty($arFields['ID'])) {
                    $res = $oTask->Add($arFields);
                } else {
                    $res = $oTask->Update($arFields['ID'], $arFields);
                }
                if ($res) {
                    echo json_encode(['success' => $arFields['ID']]);
                } else {
                    echo json_encode(['errors' => $oTask->arErrors]);
                }
            } else {
                echo json_encode(['errors' => $checkRes]);
            }
        }
    }
}