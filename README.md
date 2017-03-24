# Loreal_China_Redcarpe interface

注：先在applydb.php中配置数据库连接参数，数据表结构参考6edigitaltestdb.sql

---

### 1、提交表单

【POST】
> http://lorealchina.6edigital.cn/redcarpet/interface/apply.php 

【PARAMS】
```
    uuid      员工id
    title     天团名称
    number    天团人数
    slogan    天团口号
    feature   天团特色
    email     员工邮箱
    source    来源
    force     1：不覆盖 2：覆盖 
```

【RETURN】
```

-2:团名重复

-1:参数不全 

0:操作失败

1:操作成功 

2:已创建过，此时需要开启覆盖模式(即force=2)

```

---
 