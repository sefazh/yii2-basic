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

