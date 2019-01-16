<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once("tbs_class.php");

class Tbswrapper{

    /**
     * TinyButStrong instance
     *
     * @var object
     */

    /**
     * default constructor
     *
     */
    public function __construct(){
//        if(self::$TBS == null) Tbswrapper::getInstance()->TBS = new clsTinyButStrong();
    }

    public static function getInstance() {
        static $TBS = null;
        if ($TBS == null) {
            $TBS = new clsTinyButStrong();
        }
        return $TBS;
    }

    public function tbsLoadTemplate($File, $HtmlCharSet=''){
        return Tbswrapper::getInstance()->TBS->LoadTemplate($File, $HtmlCharSet);
    }

    public function tbsMergeBlock($BlockName, $Source){
        return Tbswrapper::getInstance()->TBS->MergeBlock($BlockName, $Source);
    }

    public function tbsMergeField($BaseName, $X){
        return Tbswrapper::getInstance()->TBS->MergeField($BaseName, $X);
    }

    public function tbsRender(){
        Tbswrapper::getInstance()->TBS->Show(TBS_NOTHING);
        return Tbswrapper::getInstance()->TBS->Source;
    }

}

?> 
