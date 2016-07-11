<?php
/**
 * Created by hare.
 * Email: 688977@qq.com
 * Date: 16/7/10
 * Time: 下午4:53
 */

namespace Back\Model;

use Think\Model;

class CategoryModel extends Model
{
    protected $_validate = [
        ['title', 'require', '分类标题不能为空']
    ];
    public function getTree()
    {
        S(['type'=>'File']);    // 初始化缓存

        if(! ($tree_list = S('category_tree_0'))) {
            $list = $this->order('sort_number')
                ->select();

            $tree_list = $this->tree($list);

            S('category_tree_0', $tree_list);   //存入缓存
        }

        return $tree_list;
    }
    protected function tree($list = [], $category_id = 0, $deep = 0)
    {
        static $tree = [];
        foreach($list as $row) {
            if($row['parent_id'] == $category_id) {
                $row['deep'] = $deep;
                $tree[] = $row;
                $this->tree($list, $row['category_id'], $deep + 1);
            }
        }
        return $tree;
    }
}