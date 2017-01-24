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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
```
