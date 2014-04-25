<?php

$model = new waModel();
try {
    $model->query("SELECT fororder FROM shop_product_skus WHERE 0");
} catch (waDbException $e) {
    $model->exec("ALTER TABLE shop_product_skus ADD fororder INT DEFAULT NULL");
}
try {
    $model->query("SELECT fororder_date FROM shop_product_skus WHERE 0");
} catch (waDbException $e) {
    $model->exec("ALTER TABLE shop_product_skus ADD fororder_date VARCHAR(255) DEFAULT NULL");
}



$plugin_id = array('shop', 'novelties');
$app_settings_model = new waAppSettingsModel();
$app_settings_model->set($plugin_id, 'status', '1');
$app_settings_model->set($plugin_id, 'page_title', 'Новинки');
$app_settings_model->set($plugin_id, 'default_output', '1');
$app_settings_model->set($plugin_id, 'count', '5');
$app_settings_model->set($plugin_id, 'days', '30');
