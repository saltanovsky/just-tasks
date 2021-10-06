<?php

namespace JustTasks;

class CTasksController
{
    public static function getList() {
        $arParams = [];
        if (!empty($_SESSION['sort_field']) && !empty($_SESSION['sort_order'])) {
            $arParams['order'] = [$_SESSION['sort_field'] => $_SESSION['sort_order']];
        } else {
            $arParams['order'] = ['ID' => 'ASC'];
        }
        if (!empty($_SESSION['limit'])) {
            $arParams['limit'] = $_SESSION['limit'];
        } else {
            $arParams['limit'] = 3;
        }
        if (!empty($_SESSION['offset'])) {
            $arParams['offset'] = $_SESSION['offset'];
        } else {
            $arParams['offset'] = 0;
        }
        $resItems = CTasks::getList($arParams);
        $result = [
            'params' => $arParams,
            'total' => CTasks::getTotalCount(),
            'items' => [],
        ];
        while ($arItem = $resItems->fetch_assoc()) {
            $result['items'][$arItem['ID']] = $arItem;
        }
        return $result;
    }
    public static function checkFields($arFields) {
        $arRes = [];
        if (empty($arFields['NAME'])) {
            $arRes[] = 'Имя не заполнено';
        }
        if (empty($arFields['TEXT'])) {
            $arRes[] = 'Текст задачи обязателен к заполнению';
        }
        if (!preg_match('#^(?<email>[=_0-9a-z+~\'!\$&*^`|\#%/?{}-]+([=_0-9a-z+~\'!\$&*^`|\#%/?{}-]+)*@(([-0-9a-z]+\.)+)([a-z0-9-]{2,20}))$#i', $arFields['EMAIL'])) {
            $arRes[] = 'Email пуст или некорректен';
        }
        return $arRes;
    }
}