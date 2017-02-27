数据字典
---

#### 管理员表 admin

字段 | 格式 | 含义
---|--- | ---
id | int | 唯一主键
username | varchar(50) | 账号
password | char(32) | 密码
salt | char(32) | 密钥
status | bit | 状态

```
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `salt` char(32) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL COMMENT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
```


#### 事件表 event

字段 | 格式 | 含义
---|--- | ---
id | int | 唯一主键
time | int | 事件触发时间戳
date | char(8) | 日期
hour | tinyint | 小时
minute | tinyint | 分钟
type | enum('mail') | 时间类型，决定处理方式
content | varchar(255) | 内容
status | tinyint | 状态 -1 删除 0 无效 1 有效

```
CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL COMMENT '时间戳',
  `date` char(8) CHARACTER SET utf8 DEFAULT '' COMMENT '日期',
  `hour` tinyint(4) DEFAULT NULL COMMENT '小时',
  `minute` tinyint(4) DEFAULT NULL COMMENT '分钟',
  `type` enum('mail') DEFAULT 'mail' COMMENT '事件类型',
  `content` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态 -1 删除 0 无效 1 有效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
```

#### 日历事件表 calendar

字段 | 格式 | 含义
---|--- | ---
id | int | 事件id
title | varchar(30) | 事件显示标题
allday | bit | 是否全天事件
starttime | int | 事件开始时间
endtime | int | 事件结束时间
url | varchar(100) | 当指定后，事件被点击将打开对应url
style | tinyint | 样式类型
status | tinyint | 事件状态

- TODO 应当将事件的时间和事件内容拆分为两张表，使得在不同时间可以添加同一个事件

```
CREATE TABLE `calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '事件id',
  `title` varchar(30) DEFAULT NULL COMMENT '事件显示标题',
  `allday` bit(1) DEFAULT NULL COMMENT '是否全天事件',
  `starttime` int(11) DEFAULT NULL COMMENT '事件开始时间',
  `endtime` int(11) DEFAULT NULL COMMENT '事件结束时间',
  `url` varchar(100) DEFAULT NULL COMMENT '当指定后，事件被点击将打开对应url',
  `style` tinyint(4) DEFAULT NULL COMMENT '样式类型',
  `status` tinyint(4) DEFAULT NULL COMMENT '事件状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```


#### 日历事件表 event_calendar

```
CREATE TABLE `event_calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `event_id` int(10) unsigned DEFAULT NULL COMMENT '时间id',
  `year` tinyint(4) DEFAULT NULL,
  `month` tinyint(4) DEFAULT NULL,
  `day` tinyint(4) DEFAULT NULL,
  `during` smallint(6) DEFAULT NULL,
  `type` enum('daily','weekly','monthly','yearly') DEFAULT NULL,
  `weekday` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```



#### 日历事件表 event_content

```
CREATE TABLE `event_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL COMMENT '标题',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `style` tinyint(4) DEFAULT NULL COMMENT '样式编号',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

