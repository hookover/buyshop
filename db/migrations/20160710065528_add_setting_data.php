<?php

use Phinx\Migration\AbstractMigration;

class AddSettingData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        // 表 setting_type 默认数据
        $types = [
            ['setting_type_id'=>1, 'type_title'=>'text'],
            ['setting_type_id'=>2, 'type_title'=>'select'],
            ['setting_type_id'=>3, 'type_title'=>'checkbox'],
            ['setting_type_id'=>4, 'type_title'=>'textarea'],
            ['setting_type_id'=>5, 'type_title'=>'radio'],
        ];
        $this->insert('setting_type',$types);

        // 表 setting_group 默认数据
        $groups = [
            ['setting_group_id'=>1, 'group_title'=>'商店设置', 'group_key'=>'shop_setting'],
            ['setting_group_id'=>2, 'group_title'=>'服务器设置', 'group_key'=>'server_setting'],
        ];
        $this->insert('setting_group', $groups);

        // 表 setting 默认数据
        $settings = [
            ['setting_id'=>null, 'key'=>'shop_title', 'value'=>'buyplus(败家shopping)', 'title'=>'商店名称', 'type_id'=>1, 'group_id'=>1, 'option_list'=>'', 'sort_number'=>0],
            ['setting_id'=>null, 'key'=>'allow_comment', 'value'=>'1', 'title'=>'是否允许商品评论', 'type_id'=>5, 'group_id'=>1, 'option_list'=>'1-允许,0-不允许', 'sort_number'=>0],
            ['setting_id'=>null, 'key'=>'use_captcha', 'value'=>'1,3', 'title'=>'哪些页面使用验证码', 'type_id'=>3, 'group_id'=>2, 'option_list'=>'1-注册,2-登陆,3-商品评论', 'sort_number'=>0],
            ['setting_id'=>null, 'key'=>'mate_description', 'value'=>'哈哈哈哈士奇工', 'title'=>'meta描述description', 'type_id'=>4, 'group_id'=>1, 'option_list'=>'', 'sort_number'=>0],
            ['setting_id'=>null, 'key'=>'area', 'value'=>'1', 'title'=>'地区', 'type_id'=>2, 'group_id'=>1, 'option_list'=>'1-中国,0-海外', 'sort_number'=>0],
        ];
        $this->insert('setting', $settings);

        // 表 category 默认数据
        $categorys = [
            ['category_id'=>1,'title'=>'未分类','parent_id'=>0,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>0,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>2,'title'=>'手机数码','parent_id'=>0,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>1,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>3,'title'=>'手机','parent_id'=>2,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>0,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>4,'title'=>'MP3','parent_id'=>2,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>0,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>5,'title'=>'男士眼睛','parent_id'=>0,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>0,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>6,'title'=>'近视镜','parent_id'=>5,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>0,'is_nav'=>1,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>7,'title'=>'飞行镜','parent_id'=>5,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>0,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
        ];
        $this->insert('category', $categorys);
    }
}
