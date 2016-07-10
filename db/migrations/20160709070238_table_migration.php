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
    }
}
