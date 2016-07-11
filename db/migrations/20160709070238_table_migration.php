<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class TableMigration extends AbstractMigration
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
    public function change()
    {
        // setting_type 表
        $this->table('setting_type',['id'=>false, 'primary_key'=>['setting_type_id']])
            ->addColumn('setting_type_id','integer', ['identity'=>true, 'signed'=>false])
            ->addColumn('type_title','string', ['limit'=>32, 'default'=>''])
            ->addIndex(['setting_type_id'])
            ->create()
        ;
       // setting_group 表
        $this->table('setting_group', ['id'=>false, 'primary_key'=>['setting_group_id']])
            ->addColumn('setting_group_id', 'integer', ['identity'=>true, 'signed'=>false])
            ->addColumn('group_title', 'string', ['limit'=>32, 'default'=>''])
            ->addColumn('group_key', 'string', ['limit'=>32, 'default'=>''])
            ->addIndex(['group_key'], ['unique'=>true])
            ->create();

        // setting 表
        $this->table('setting', ['id'=>false, 'primary_key'=>['setting_id']])
            ->addColumn('setting_id', 'integer', ['identity'=>true, 'signed'=>false])
            ->addColumn('key', 'string', ['limit'=>32, 'default'=>''])
            ->addColumn('value', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('title', 'string', ['limit'=>64, 'default'=>''])
            ->addColumn('type_id', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('group_id', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('option_list', 'string', ['limit'=>255, 'default'=>0])
            ->addColumn('sort_number', 'integer', ['default'=>0])
            ->addIndex(['type_id'])
            ->addIndex(['group_id'])
            ->addIndex(['sort_number'])
            ->create();

        // category 商品分类表
        $this->table('category', ['id'=>false, 'primary_key'=>['category_id']])
            ->addColumn('category_id', 'integer', ['identity'=>true, 'signed'=>false])
            ->addColumn('title', 'string', ['limit'=>32, 'default'=>''])
            ->addColumn('parent_id', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('sort_number', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('image', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('image_thumb', 'string', ['limit'=>255, 'signed'=>false,'default'=>''])
            //前台展示
            ->addColumn('is_used', 'boolean', ['default'=>1])
            ->addColumn('is_nav', 'integer', ['limit'=>MysqlAdapter::INT_TINY,'default'=>1])
            //SEO优化
            ->addColumn('meta_title', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('meta_keywords', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('meta_description', 'string', ['limit'=>1024, 'default'=>''])

            ->addIndex('parent_id')
            ->addIndex('sort_number')
            ->create();

        // goods 商品表
        $this->table('goods', ['id'=>false, 'primary_key'=>['goods_id']])
            ->addColumn('goods_id', 'integer', ['identity'=>true, 'signed'=>false])
            ->addColumn('name', 'string', ['limit'=>64, 'default'=>''])
            ->addColumn('image', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('image_thumb', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('SKU', 'string', ['limit'=>16, 'default'=>''])  //库存
            ->addColumn('UPC', 'string', ['limit'=>255, 'default'=>'']) //商品代码
            ->addColumn('price', 'decimal', ['precision'=>10, 'scale'=>4, 'default'=>0])
            ->addColumn('tax_id', 'integer', ['signed'=>false, 'default'=>0])   //税类型ID

            ->addColumn('quantity', 'integer', ['signed'=>false, 'default'=>0]) //库存
            ->addColumn('minimum', 'integer', ['signed'=>false, 'default'=>1])  //最小起订数量
            ->addColumn('subtract', 'integer', ['limit'=>MysqlAdapter::INT_TINY, 'default'=>1]) //是否减少库存
            ->addColumn('stock_status_id', 'integer', ['signed'=>false, 'default'=>0])  //库存状态ID
            ->addColumn('shipping', 'integer', ['limit'=>MysqlAdapter::INT_TINY, 'default'=>0]) //是否允许配送
            ->addColumn('date_available', 'date', ['default'=>'0000-00-00'])  //供货日期
            ->addColumn('length', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('width', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('height', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('length_unit_id', 'integer', ['signed'=>false, 'default'=>0])   //长度单位
            ->addColumn('weight', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('weight_unit_id', 'integer', ['signed'=>false, 'default'=>0])   //重量的单位
            ->addColumn('status', 'integer', ['limit'=>MysqlAdapter::INT_TINY, 'default'=>1])   //是否可用
            ->addColumn('sort_number', 'integer', ['signed'=>false, 'default'=>0])
            ->addColumn('description', 'text', ['null'=>true])
            //SEO优化
            ->addColumn('meta_title', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('meta_keywords', 'string', ['limit'=>255, 'default'=>''])
            ->addColumn('meta_description', 'string', ['limit'=>1024, 'default'=>''])

            ->addColumn('brand_id', 'integer', ['signed'=>false, 'default'=>0])     //所属品牌ID
            ->addColumn('category_id', 'integer', ['signed'=>false, 'default'=>0])  //所属分类ID

            ->addColumn('create_at', 'integer', ['default'=>0])
            ->addColumn('update_at', 'integer', ['default'=>0])

            ->addColumn('is_deleted', 'integer', ['limit'=>MysqlAdapter::INT_TINY, 'default'=>0])

            ->addIndex(['brand_id'])
            ->addIndex(['category_id'])
            ->addIndex(['tax_id'])
            ->addIndex(['stock_status_id'])
            ->addIndex(['length_unit_id'])
            ->addIndex(['weight_unit_id'])
            ->addIndex(['sort_number'])
            ->addIndex(['name'])
            ->addIndex(['price'])
            ->addIndex(['UPC'], ['unique'=>true])
            ->create();

        // length_unit 表
        $this->table('length_unit', ['id'=>false, 'primary_key'=>['length_unit_id']])
            ->addColumn('length_unit_id', 'integer', ['signed'=>false, 'identity'=>true])
            ->addColumn('title', 'string', ['limit'=>32, 'default'=>''])
            ->create();

        // weight_unit 表
        $this->table('weight_unit', ['id'=>false, 'primary_key'=>['weight_unit_id']])
            ->addColumn('weight_unit_id', 'integer', ['signed'=>false, 'identity'=>true])
            ->addColumn('title', 'string', ['limit'=>32, 'default'=>''])
            ->create();

        // tax 表
        $this->table('tax', ['id'=>false, 'primary_key'=>['tax_id']])
            ->addColumn('tax_id', 'integer', ['signed'=>false, 'identity'=>true])
            ->addColumn('title', 'string', ['limit'=>32, 'default'=>''])
            ->create();

        // stock_status 表
        $this->table('stock_status', ['id'=>false, 'primary_key'=>['stock_status_id']])
            ->addColumn('stock_status_id', 'integer', ['signed'=>false, 'identity'=>true])
            ->addColumn('title', 'string', ['limit'=>32, 'default'=>''])
            ->create();
    }
}
