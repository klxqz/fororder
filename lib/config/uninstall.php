<?php

$model = new waModel();
try {
    $model->exec("ALTER TABLE shop_product_skus DROP fororder");
} catch (waDbException $e) {
}
try {
    $model->exec("ALTER TABLE shop_product_skus DROP fororder_date");
} catch (waDbException $e) {
}

