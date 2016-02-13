<?php
<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class myModel extends OracleModel {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getData($param1, $param2) {
        try {
            $variables[0] = array("parameter" => "p1", "value" => $param1, "size" => 100);
            $variables[1] = array("parameter" => "p2", "value" => $param2, "size" => 100);
            $variables[2] = array("parameter" => "p3", "value" => $param2, "size" => 100);
            $variables[3] = array("parameter" => "p4", "value" => $param2, "size" => 100);
            $variables[4] = array("parameter" => "v", "value" => $param2, "size" => 100);

            return $this->readCursor("PKG_INFOAGENDA.CARI('553000511308190147',:p1, :p2, :p3, v)", $variables);
        }
    }
}