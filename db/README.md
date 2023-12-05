# Create MySQL Tables for the Application

## Lost and Found - Entity-Relationship Diagram (ERD)

```
   [Users]                [Items]                [Comments]
 (UserID PK) --1----*-- (ItemID PK) --1----*-- (CommentID PK)
 (Email)                (UserID FK)            (ItemID FK)
 (Password)             (Type)                 (UserID FK)
 (username)             (Title)                (CommentText)
 (RegistrationTime)     (Description)          (CommentTime)
                        (Image)
                        (PostTime)
```

## Create the Database and Tables

```bash
# Connect to MySQL in the Docker container
$ docker-compose exec db bash
$ mysql -u root -p
```

Excute the SQL statements in the file `db/database.sql` to create the database and tables.


```bash
mysql> SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| lost_and_found     |
| my_database        |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
6 rows in set (0.00 sec)
```

```sql
mysql> SHOW TABLES;
+--------------------------+
| Tables_in_lost_and_found |
+--------------------------+
| Comments                 |
| Items                    |
| Users                    |
+--------------------------+
3 rows in set (0.02 sec)
```

## Backup and Restore the Database

```bash
# Backup the database
$ docker-compose exec db bash
$ mysqldump -u root -p lost_and_found > lost_and_found.sql
```

```bash
# Backup the database to a backup file
# There's no space between -p and [password]
# docker exec -it [container_name_or_id] mysqldump -u[user] -p[password] [database_name] > [backup_file_name].sql
# For example:
$ docker exec -it lost-and-found-db-1 mysqldump -u root -prootpassword lost_and_found > ./db/backup-lost-and-found-20231204.sql
```

```bash
# Restore the database from a backup file
# For example:
$ docker exec -i lost-and-found-db-1 mysql -u root -prootpassword lost_and_found < ./db/backup-lost-and-found-20231204.sql
```
