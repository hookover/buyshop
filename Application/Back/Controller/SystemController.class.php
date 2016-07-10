<?php
/**
 * Created by hare.
 * Email: 688977@qq.com
 * Date: 16/7/7
 * Time: 下午4:40
 */
namespace Back\Controller;

use Think\Controller;

class SystemController extends Controller{
    /**
     * 展示并管理配置项
     */
    public function settingAction()
    {
        // 利用模型，获取配置分组
        $m_setting_group = M('SettingGroup');
        $group_list = $m_setting_group->select();
        $this->assign('group_list', $group_list);

        // 利用模型，获取所有分组项
        $m_setting = M('Setting');
        $setting_list = $m_setting
            ->field('s.*, gt.group_title, gt.group_key, st.type_title')
            ->alias('s')
            ->join('left join __SETTING_TYPE__ AS st ON s.type_id=st.setting_type_id')
            ->order('s.group_id, s.sort_number')
            ->join('left join __SETTING_GROUP__ AS gt ON s.group_id=gt.setting_group_id')
            ->select();

        $setting_group_list = [];
        foreach($setting_list as $setting){
            $type = $setting['type_title'];
            if($type == 'radio' || $type == 'checkbox' || $type == 'select') {
                // [0-是, 1-否]
                $options_format = explode(',',$setting['option_list']);
                $options_format = array_map(function($var){
                    return explode('-',$var);   //[[0,是],[1,否]]
                }, $options_format);
                $setting['option_format'] = $options_format;

                if($type == 'checkbox') {
                    $setting['value_format'] = explode(',',$setting['value']);
                }
            }

            $group_id = $setting['group_id'];
            $setting_group_list[$group_id][] = $setting;
        }
        $this->assign('setting_group_list', $setting_group_list);

        $this->display();
    }
    public function updateAction()
    {
        $setting_data = $_POST['setting'];
        $m_setting = M('setting');

        foreach($setting_data as $key=>$value){
            $data['setting_id'] = $key;
            if(is_array($value)) {
                $value = implode(',', $value);
            }
            $data['value'] = $value;
            $m_setting->save($data);
        }

        $this->redirect('Back/System/setting', [], 0, '恭喜，更新完成！');
    }

    public function updateOneAction()
    {
        if(IS_POST)
        {
            $data['setting_id'] = $_POST['setting_id'];
            $data['value'] = $_POST['value'];
            $matchs = preg_match('/\d+/',$data['setting_id']);

            if($matchs > 0 && strlen($data['value']) > 0) {
                $m_setting = M('setting');
                $res = $m_setting->save($data);
                if ($res !== false) {
                    $this->ajaxReturn(['error' => 0, 'message' => 'success']);
                } else {
                    $this->ajaxReturn(['error' => 1, 'message' => 'error', 'detail'=>$res]);
                }
            } else {
                $this->ajaxReturn(['error'=>1, 'message'=>'error']);
            }
        } else {
            echo 'ALLOW POST';
        }
    }
}