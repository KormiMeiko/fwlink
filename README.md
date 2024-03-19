# fwlink
*A simple URL jump program similar to Microsoft fwlink.*

### Example usage
> http://example.com/fwlink.php?linkid=114514

> http://example.com/fwlink.php?linkid=1919810

### Deployment
**PHP recommended version: 7.4; MySQL version: 5.7**
1. Create a database and execute the following SQL query:
```sql
CREATE TABLE fwlinks (
    linkid INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    link VARCHAR(2048) NOT NULL,
    visitcount BIGINT(12) NOT NULL,
    waitingtime INT(12) NOT NULL,
    ad BOOLEAN DEFAULT FALSE,
    adimg VARCHAR(2048),
    adlink VARCHAR(2048)
);
```
2. Configure database connection information;
3. Insert data and then access and use it.

**Brief introduction**

|Item|Description|
| :------------ | :------------ |
|linkid   |Link ID, auto-increment type. For example fwlink.php?linkid=123   |
|link   |The target link to jump to.   |
|visitcount   |Number of visits.   |
|waitingtime   |Number of seconds to wait.   |
|ad   |Whether to display ads.   |
|adimg   |The ad's image file URL.   |
|adlink   |Click the ad image to jump to the ad URL.   |


### Data management
- You can use the "Data insertion tool" in the warehouse to insert data. (Tip: If you want to add this tool to the site directory, please modify the names of the relevant directories and files, and configure Basic Auth for the tool's folder)；
- You can also use phpMyAdmin for data management;
- You can also write a management tool yourself :-).