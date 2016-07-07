create database buyplus charset=utf8;
use buyplus;
-- 配置类型（不提供管理接口)
create table setting_type(
  setting_type_id int unsigned auto_increment,
  type_title VARCHAR(32) not null DEFAULT '', -- 类型的说明

  PRIMARY KEY (setting_type_id)
)charset=utf8;

-- 加入测试数据
insert into setting_type values(1, 'text'); -- 文本
insert into setting_type values(2, 'select'); -- 单选
INSERT INTO setting_type VALUES (3, 'checkbox'); -- 多选
insert into setting_type values(4, 'textarea'); -- 文本域


-- 配置项分组
create table setting_group(
  setting_group_id int unsigned auto_increment,
  -- 分组的标题
  group_title VARCHAR(32) NOT NULL DEFAULT '',

  group_key VARCHAR(32) NOT NULL DEFAULT '',
  PRIMARY KEY (setting_group_id),
  -- 唯一约束 constraint
  constraint `unique key` UNIQUE KEY (group_key)
)charset=utf8;

insert into setting_group VALUEs(1,'商店设置','shop_setting');
insert into setting_group VALUEs(2,'服务器设置','server_setting');

-- 配项
create table setting(
  setting_id int unsigned not null auto_increment,
  -- 程序使用的key
  `key` varchar(32) not null default '',
  -- 配置项的值
  `value` VARCHAR(255) not NULL  DEFAULT '',
  -- 配置项的标题描述
  `title` VARCHAR(64) not NULL  DEFAULT '',
  -- 配置项类型ID
  type_id int UNSIGNED NOT NULL DEFAULT 0,
  -- 配置项分组类型ID
  group_id int UNSIGNED NOT NULL DEFAULT 0,
  -- 如果是单选select或者是多选checkbox，提供的选项列表:0-是,1-否
  option_list VARCHAR(255) NOT NULL DEFAULT '',
  -- 排序
  sort_number int not null DEFAULT 0,
  -- 排序字段、关联外键必须有索引
  PRIMARY KEY (setting_id),
  INDEX `type` (type_id),
  INDEX `group` (group_id),
  INDEX `order` (sort_number)
) charset=utf8;

insert into setting values(null,'shop_title','buyplus(败家shopping)','商店名称',1,1,'',0);
insert into setting values(null,'allow_comment','1','是否允许商品评论',2,1,'1-允许,0-不允许',0);
insert into setting values(null,'use_captcha','1,3','哪些页面使用验证码',3,2,'1-注册,2-登陆,3-商品评论',0);
insert into setting values(null,'use_captcha','4,3','meta描述description',4, 1,'',0);