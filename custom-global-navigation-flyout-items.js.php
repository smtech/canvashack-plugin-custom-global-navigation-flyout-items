<?php

require_once __DIR__ . '/common.inc.php';

if (empty($_REQUEST['current_user'])) {
    echo  "
var canvashack = {
  insertItems: function() {
    console.log('CanvasHack: Custom global navigation flyout items were not loaded because no user is logged in.');
  }
};
";
    exit;
}

?>
var canvashack = {
    insertItem: function(menu, itemTitle, itemUrl) {
        MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
        var observer = new MutationObserver(function (mutations, observer) {
            mutations.forEach(function(mutation) {
                if($(mutation.addedNodes).find(menu).length > 0) {
                    $('.ReactTrayPortal ul').append('<li class="ic-NavMenu-list-item"><a href="' + itemUrl + '" class="ic-NavMenu-list-item__link">' + itemTitle + '</a></li>');
                }
            });
        });
        $('.ReactTrayPortal').each(function() {
            observer.observe(this, {subtree: true, childList: true});
        })
    },

    insertItems: function() {
        <?php

        foreach ($pluginMetadata['ITEMS'] as $item) {
            echo str_replace(
                '@USER_ID',
                $_REQUEST['current_user']['id'],
                "this.insertItem('#{$item['menu']}', '{$item['title']}', '{$item['url']}');" . PHP_EOL
            );
        }

        ?>
    }
};
