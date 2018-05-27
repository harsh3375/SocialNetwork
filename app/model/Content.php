<?php
namespace SocialNetwork\app\model;

use SocialNetwork\app\lib\BaseModel;
use SocialNetwork\app\lib\ConfigureBackend;

/**
 * Class Content
 * @package SocialNetwork\app\model
 */
class Content extends BaseModel
{
    const maxid= 1000000000;

    public $id = "";
    public $user_id = "";
    public $data = "";
    public $media = "";
    public $date = "";

    /**
     * @return ConfigureBackend
     */
    public function getBackendConfiguration(){
     $backend = new ConfigureBackend;
     $backend->setEditable(array("id", "user_id", "data", "media", "date"));
     $backend->setVisible(array("id", "user_id", "data",  "date"));
     
     $backend->setRelation("user_id", "User", "id")->showFields("name");
     $backend->addLabel("user_id", "Username");
     
     $backend->setSearchable(array("id", "data", "media"));
     $backend->addTextarea("data");
     

     return $backend;
    }

}
