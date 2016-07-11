<?php
/**
 * Created by hare.
 * Email: 688977@qq.com
 * Date: 16/7/10
 * Time: 下午2:59
 */

namespace Back\Controller;

use Think\Controller;
use Think\Upload;

class CategoryController extends Controller
{
    public function listAction()
    {
        $m_category = D('category');
        $category_list = $m_category->getTree();

        $this->assign('category_list', $category_list);
        $this->display();
    }
    public function addAction()
    {
        $m_category = D('category');

        if(IS_POST) {
            $t_upload = new Upload();
            $t_upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $t_upload->rootPath = './Upload/Category';  //设置附件上传根目录

            if($info = $t_upload->uploadOne($_FILES['image'])) {
                $_POST['image'] = $info['savepath'].$info['savename'];
            }

            $res = $m_category->create();   //默认去post中获取数据

            if($res) {
                $category_id = $m_category->add();
                if($category_id) {
                    S(['type'=>'File']);

                    S('category_tree_0', null);
                    S('category_nested_0', null);   //删除缓存

                    $this->redirect('Back/Category/list', [], 0);
                }
            }

            $this->error('添加失败' . $m_category->getError(), U('Back/Category/add'), 2);

        } else {

            $category_list = $m_category->getTree();
            $this->assign('category_list', $category_list);
            $this->display();
        }
    }
}