<?php
/**
 * Created by hare.
 * Email: 688977@qq.com
 * Date: 16/7/11
 * Time: 下午1:23
 */

namespace Back\Model;

use Think\Model;

class GoodsModel extends Model
{
    protected $_validate = [
        ['name', 'require', '商品名称必须填写！'],
        ['UPC', 'require', '商品条码必须填写'],
        ['UPC', '', '该商品编码已存在', 0, 'unique', 1]
    ];
    // 自动完成
    protected $_auto = [
        ['create_at', 'time', self::MODEL_INSERT, 'function'],
        ['update_at', 'time', self::MODEL_BOTH, 'function'],
        ['is_deleted', '0', self::MODEL_INSERT],
    ];
}