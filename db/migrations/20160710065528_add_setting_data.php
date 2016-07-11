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
            ['category_id'=>5,'title'=>'眼镜','parent_id'=>0,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>1,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>6,'title'=>'男士眼睛','parent_id'=>5,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>7,'title'=>'近视镜','parent_id'=>5,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>8,'title'=>'飞行镜','parent_id'=>5,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>9,'title'=>'太阳镜','parent_id'=>5,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>11,'title'=>'图书','parent_id'=>0,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>1,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>12,'title'=>'历史','parent_id'=>11,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>13,'title'=>'科技','parent_id'=>11,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>14,'title'=>'计算机','parent_id'=>11,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>15,'title'=>'电子书','parent_id'=>11,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>16,'title'=>'科普','parent_id'=>14,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>17,'title'=>'建筑','parent_id'=>14,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>18,'title'=>'工业技术','parent_id'=>14,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>19,'title'=>'电子通信','parent_id'=>14,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>20,'title'=>'互联网','parent_id'=>15,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>21,'title'=>'计算机编程','parent_id'=>15,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>22,'title'=>'硬件，攒机','parent_id'=>15,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>23,'title'=>'大数据','parent_id'=>15,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>24,'title'=>'移动开发','parent_id'=>15,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>25,'title'=>'PHP','parent_id'=>15,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>26,'title'=>'近代史','parent_id'=>12,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>27,'title'=>'当代史','parent_id'=>12,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>28,'title'=>'古代史','parent_id'=>12,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>29,'title'=>'先秦百家','parent_id'=>12,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>30,'title'=>'三皇五帝','parent_id'=>12,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>31,'title'=>'励志','parent_id'=>16,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>32,'title'=>'小说','parent_id'=>16,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>33,'title'=>'成功学','parent_id'=>16,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>34,'title'=>'经济金融','parent_id'=>16,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
            ['category_id'=>35,'title'=>'少儿不宜','parent_id'=>16,'sort_number'=>0,'image'=>'','image_thumb'=>'','is_used'=>1,'is_nav'=>0,'meta_title'=>'','meta_keywords'=>'','meta_description'=>''],
        ];
        $this->insert('category', $categorys);

        // 表 length_unit 默认数据
        $rows = [
            ['length_unit_id'=>1, 'title'=>'厘米'],
            ['length_unit_id'=>2, 'title'=>'毫米'],
            ['length_unit_id'=>3, 'title'=>'英寸'],
            ['length_unit_id'=>4, 'title'=>'米'],
        ];
        $this->insert('length_unit', $rows);

        // 表 weight_unit 默认数据
        $rows = [
            ['weight_unit_id'=>1, 'title'=>'克'],
            ['weight_unit_id'=>2, 'title'=>'千克'],
            ['weight_unit_id'=>3, 'title'=>'500克(斤)'],
        ];
        $this->insert('weight_unit', $rows);

        // 表 weight_unit 默认数据
        $rows = [
            ['tax_id'=>1, 'title'=>'免税产品'],
            ['tax_id'=>2, 'title'=>'缴税产品'],
        ];
        $this->insert('tax', $rows);

        // 表 weight_unit 默认数据
        $rows = [
            ['stock_status_id'=>1, 'title'=>'库存充足'],
            ['stock_status_id'=>2, 'title'=>'1-3周'],
            ['stock_status_id'=>3, 'title'=>'1-3天'],
            ['stock_status_id'=>4, 'title'=>'脱销'],
            ['stock_status_id'=>5, 'title'=>'预定'],
        ];
        $this->insert('stock_status', $rows);
    }
}
