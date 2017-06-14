# 系统运行
### 系统运行需求
* Linux 内核版本 > 4.8
* docker 版本>1.9
* docker-compose
### 运行系统
```bash
cd cs-database
docker-compose up -d
```
### 导入数据
```bash
docker exec -ti csdatabase_db_1 psql -U postgres -W -c "CREATE DATABASE htu"
docker exec -ti csdatabase_db_1 psql -U postgres -W -d htu -f /workspace/init.sql
```
### 退出系统
```bash
docker-compose down
```
