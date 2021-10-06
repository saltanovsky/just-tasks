<?php

namespace JustTasks;

class CTasks
{
    public $arErrors = [];
    public $arFields = [];

    public function __construct($id = 0) {
        if ($id > 0) {
            $mysqli = new DB();
            $res = $mysqli->query('SELECT * FROM jt_tasks WHERE ID=' . $id);
            if ($arTask = $res->fetch_assoc()) {
                $this->arFields = $arTask;
            }
        }
    }

    public static function getList($params) {
        $mysqli = new DB();
        $sql = 'SELECT ';
        $strFrom = '';
        if (empty($params['select'])) {
            $strFrom = '*';
        } else {
            foreach ($params['select'] as $val) {
                if (strlen($strFrom) > 0) {
                    ', ';
                }
                $strFrom .= $val;
            }
        }
        $sql .= $strFrom . ' FROM jt_tasks';
        // для фильтрации понадобится расширять функционал модели, чтоб она знала типы полей
//        if (!empty($params['filter'])) {
//            $sql .= ' WHERE '
//        }
        if (!empty($params['order'])) {
            $sql .= ' ORDER BY ' . array_keys($params['order'])[0] . ' ' . reset($params['order']);
        }
        if (!empty($params['limit'])) {
            $sql .= ' LIMIT ';
            if (!empty($params['offset'])) {
                $sql .= $params['offset'] . ', ';
            }
            $sql .= $params['limit'];
        }
        return $mysqli->query($sql);
    }

    public static function getTotalCount() {
        $mysqli = new DB();
        $sql = 'SELECT COUNT(*) AS cnt FROM jt_tasks';
        return $mysqli->query($sql)->fetch_assoc()['cnt'];
    }

    public function Add($arFields) {
        $mysqli = new DB();
        $stmt = $mysqli->stmt_init();
        $stmt->prepare('INSERT INTO jt_tasks (`NAME`, `EMAIL`, `TEXT`) VALUES (?,?,?)');
        $stmt->bind_param('sss', $arFields['NAME'], $arFields['EMAIL'], $arFields['TEXT']);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return $stmt->insert_id;
        } else {
            $this->arErrors = $stmt->error_list;
            return false;
        }
    }

    public function Update($id, $arFields) {
        $mysqli = new DB();
        $stmt = $mysqli->stmt_init();
        $stmt->prepare('UPDATE jt_tasks SET `NAME`=?, `EMAIL`=?, `TEXT`=? WHERE ID=?');
        $stmt->bind_param('sssi', $arFields['NAME'], $arFields['EMAIL'], $arFields['TEXT'], $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return $id;
        } else {
            $this->arErrors = $stmt->error_list;
            return false;
        }
    }
}