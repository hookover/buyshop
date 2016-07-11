<?php
/**
 * Created by hare.
 * Email: 688977@qq.com
 * Date: 16/7/11
 * Time: 下午1:00
 */

namespace Back\Controller;

use Think\Controller;
use Think\Image;
use Think\Upload;

class GoodsController extends Controller
{
    public function addAction()
    {
        if(IS_POST) {
            $m_goods = D('goods');
            if($m_goods->create()) {
                $goods_id = $m_goods->add();

                if($goods_id) {
                    $this->redirect('Back/Goods/list', [], 0);
                }
            }

            $this->error('商品添加失败：' . $m_goods->getError(), U('Back/Goods/add'), 2);

        } else {
            $this->assign('tax_list', M('tax')->select());
            $this->assign('stock_status_list', M('stock_status')->select());
            $this->assign('weight_unit_list', M('weight_unit')->select());
            $this->assign('length_unit_list', M('length_unit')->select());
            $this->assign('brand_list', [
                ['brand_id'=>'1', 'title'=>'假装有品牌'],
                ['brand_id'=>'2', 'title'=>'帕森新'],
                ['brand_id'=>'3', 'title'=>'邦师度'],
                ['brand_id'=>'4', 'title'=>'阿玛尼'],
                ['brand_id'=>'5', 'title'=>'阿木'],
                ['brand_id'=>'6', 'title'=>'暴龙'],
            ]);

            $this->assign('category_list', D('category')->getTree());
            $this->display();
        }
    }
    public function imageUploadAction()
    {
        $t_upload = new Upload();
        $t_upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $t_upload->rootPath = './Upload/Goods/';
        $info = $t_upload->uploadOne($_FILES['image_ajax']);


        if($info) {
            //上传成功
            $t_image = new Image();
            $t_image->open($t_upload->rootPath . $info['savepath'] . $info['savename']);
            $thumb_rootpath = './Public/Thumb/Goods/';
            $thumb_savepath = $info['savepath'];

            if(!is_dir($thumb_rootpath . $thumb_savepath)) {
                mkdir($thumb_rootpath . $thumb_savepath, 755);
            }

            $thumb_savename = $info['savename'];
            $t_image->thumb(40, 40, Image::IMAGE_THUMB_FILLED)->save($thumb_rootpath . $thumb_savepath . $thumb_savename);

            $this->ajaxReturn([
                'error'=>'0',
                'image'=>$info['savepath'] . $info['savename'],
                'image_thumb' => $thumb_savepath . $thumb_savename,
            ]);
        } else {
            $this->ajaxReturn(['error'=>1]);
        }
    }
    public function listAction()
    {
        echo 'OK';
    }
}