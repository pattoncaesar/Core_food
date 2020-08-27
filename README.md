#   實作測驗改寫到 Laravel

LN_P    
domain: https://local.core_food.tw/

##  dev:         
- SQLite + Seeder    
    1. .env：DB_CONNECTION=sqlite
    2. database/database.sqlite
    3. php artisan migrate
    4. php artisan db:seed --class=SqlSeeder

#   TODO
   - ShopList
        - ~~local_area~~
        - ~~摺疊*2~~
        - ~~pager~~
        - 右方 Area
            - ~~摺疊狀況與實際檢索同步~~
            - 切換時的 checkbox 切換
            - search Area 
            - 複合檢索
        - 右方 Food
            - 摺疊狀況與實際檢索同步
            - 切換時的 checkbox 切換
            - search food category
            - 複合檢索
        - refactor Pager
   - ShopRanking
        - order
        - ...
   - ShopTop 圖片用亂數
   - Refactor + SA
   - Restful API
   - OAuth
   - ShopComment
   - Android
   - MySQL -> LNMP
   - Vue
    
