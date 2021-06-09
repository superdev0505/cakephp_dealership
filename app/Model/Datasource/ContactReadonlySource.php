<?php

class ContactReadonlySource extends Mysql {

/**
 * An optional description of your datasource
 */
    public $description = 'Read only datasource for contacts table';

    public function read(Model $Model, $queryData = array(), $recursive = null) {
      if (!empty($Model->useIndex)) {
             $this->useIndex = $Model->useIndex;
     }
     return parent::read($Model, $queryData);
    }

    public function renderStatement($type, $data) {
      extract($data);
  		$aliases = null;
      if (strtolower($type) == 'select' && !empty($this->useIndex)) {
        $res = "SELECT {$fields} FROM {$table} {$alias} {$this->useIndex} {$joins} {$conditions} {$group} {$order} {$limit}";
      } else {
              $res = parent::renderStatement($type, $data);
      }

      $this->useIndex = null;
      return $res;
    }

}
?>
