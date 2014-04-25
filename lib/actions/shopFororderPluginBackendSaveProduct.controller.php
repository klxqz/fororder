<?php

class shopFororderPluginBackendSaveProductController extends waJsonController {

    public function execute() {
        try {
            $model = new shopProductSkusModel();
            $skus = waRequest::post('skus', array());
            foreach ($skus as $sku_id => $sku) {
                $model->updateById($sku_id, $sku);
            }

            $this->response['message'] = "Сохранено";
        } catch (Exception $e) {
            $this->setError($e->getMessage());
        }
    }

}
