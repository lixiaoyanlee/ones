<?php

/**
 * @filename NetestCategoryAction.class.php 
 * @encoding UTF-8 
 * @author nemo.xiaolan <a href="mailto:335454250@qq.com">335454250@qq.com</a>
 * @link <a href="http://www.sep-v.com">http://www.sep-v.com</a>
 * @license http://www.sep-v.com/code-license
 * @datetime 2013-11-18  13:25:14
 * @Description
 * 
 */
class NetestCategoryAction extends CommonAction {
    
    public function index() {
        $name = $this->indexModel ? $this->indexModel : $this->getActionName();
        $categoryModel = D($name);
        $tree = $categoryModel->getTree(1);
        foreach($tree as $k=>$t) {
            $tree[$k]["prefix_name"] = $t["prefix"].$t["name"];
        }
        
        $this->response($tree);
    }
    
    
    public function insert() {
        $catModel = D(MODULE_NAME);
        $rs = $catModel->addChildNode($_POST);
        if($rs) {
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }
    
    public function delete() {
        $catModel = D(MODULE_NAME);
        if($catModel->deleteNode($_GET["id"])) {
            $this->success("operate_success");
        } else {
            $this->error("operate_failed");
        }
    }
    
}
