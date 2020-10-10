#   實作測驗改寫到 Laravel
domain: https://local.core_food.tw/
##  Function List：
### common
- Header -> search / list status
- 麵包屑
### Shop Info related
- List / Filter
- Search Shop
- Shop Comment
- Shop Detail
    
##  開發環境:
add to host
```
127.0.0.1	local.core_food.tw mysql
```
### 兩個環境選一個：         
- SQLite + Seeder    
    1. .env：DB_CONNECTION=sqlite
    2. database/database.sqlite
- LNMP 
    1. .env
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=mysql
        DB_PORT=3306
        DB_DATABASE=corefood
        DB_USERNAME=core
        DB_PASSWORD=food
        ```
    2. docker-compose up -d
    3. phpmyadmin http://127.0.0.1:8080/
    4. MySQL 8 的坑－密碼編碼方式不對稱
        ```mysql
        ALTER USER 'core'@'%' IDENTIFIED WITH mysql_native_password BY 'food';
        ```
 
 ### Data
1. php artisan migrate
2. php artisan db:seed --class=SqlSeeder

#   TODO
   - ShopList
        - ~~local_area~~
        - ~~摺疊*2~~
        - ~~pager~~
        - ~~右方 Area~~
            - ~~摺疊狀況與實際檢索同步~~
            - ~~切換時的 checkbox 切換~~
            - ~~search Area~~ 
            - ~~複合檢索 => search_result~~
                - ~~hidden 紀錄 master 的方式要換~~
                - ~~master, sub : single, multi => 4+ 可能性~~
        - 右方 Food
            - ~~摺疊狀況與實際檢索同步~~
            - ~~切換時的 checkbox 切換~~
            - search food category
            - 複合檢索
            - sub food
        - refactor Pager
   - Refactor
        - ~~Repository~~
        - Service
        - ~~DI~~
        - Singleton
        - 版面切割
   - ~~DEBUG: Url in Pagenation~~
   - SA
   - ShopRanking
        - order
        - ...
   - ~~ShopTop 圖片用亂數~~
   - OAuth
   - Restful API
        - ~~get~~
        - post
   - ShopComment
   - Android
   - MySQL -> LNMP
   - Vue
    
