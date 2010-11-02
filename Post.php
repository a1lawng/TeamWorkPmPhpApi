<?php

class TeamWorkPm_Post extends TeamWorkPm_Model
{
    /**
     *
     * @var array
     */
    protected $_fields = array(
        'title'=>true,
        'category_id'=>array('required'=>true, 'attributes'=>array('type'=>'integer')),
        'notify'=>array('required'=>false, 'attributes'=>array('type'=>'array'), 'element'=>'person'),
        'milestone_id'=>array('required'=>false, 'attributes'=>array('type'=>'integer')),
        'private'=>array('required'=>false, 'attributes'=>array('type'=>'boolean')),
        'body'=>true
    );

    private static $_instance;

    public function getInstance($company, $key)
    {
        if (null === self::$_instance) {
            self::$_instance = new self($company, $key, __CLASS__);
        }

        return self::$_instance;
    }

    public function getByProjectId($id, $archive = false)
    {
        if (is_numeric($id)) {
            $action = "projects/$id/posts";
            if ($archive) {
                $action .= '/archive';
            }
            return $this->_get($action);
        }
        return null;
    }
    
    public function getByCategoryId($project_id, $id, $archive = false)
    {
        if (is_numeric($id)) {
            $action = "projects/$project_id/cat/$id/posts";
            if ($archive) {
                $action .= '/archive';
            }
            return $this->_get($action);
        }
        return null;
    }
}