var canvashack = {
    insertItem: function(menu, itemTitle, itemUrl) {
        $('.ReactTrayPortal:has(' + menu + ') ul').append('<li class="ic-NavMenu-list-item"><a href="' + itemUrl + '" class="ic-NavMenu-list-item__link">' + itemTitle + '</a></li>');
    },

    insertItems() {
        <?php

        foreach ($pluginMetadata['ITEMS'] as $item) {
            echo str_replace(
                '@USER_ID',
                $_REQUEST['current_user']['id'],
                "this.insertItem('{$item['menu']}', '{$item['title']}', '{$item['url']}');" . PHP_EOL
            );
        }

        ?>
    }
}
