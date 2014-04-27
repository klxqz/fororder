<?php

class shopFororderPlugin extends shopPlugin {

    public function backendProduct($product) {
        $view = wa()->getView();
        $template_path = wa()->getAppPath('plugins/fororder/templates/BackendProduct.html', 'shop');
        $view->assign('product', $product);
        $html = $view->fetch($template_path);
        return array(
            'toolbar_section' => $html
        );
    }

    public function frontendProduct($product) {
        $view = wa()->getView();
        $template_path = wa()->getAppPath('plugins/fororder/templates/FrontendProduct.html', 'shop');
        $view->assign('product', $product);
        $html = $view->fetch($template_path);
        return array(
            'cart' => $html
        );
    }

    public function frontendCart() {
        $model = new shopProductSkusModel();
        $view = wa()->getView();
        if (isset($view->smarty->tpl_vars['cart'])) {
            $tpl_var = &$view->smarty->tpl_vars['cart'];
            $value = &$tpl_var->value;
            foreach ($value['items'] as &$item) {
                $sku_id = $item['sku_id'];
                $sku = $model->getById($sku_id);
                if (($sku['count'] === '0' || $sku['count'] < 0 ) && $sku['fororder']) {
                    $item['sku_name'] .= '(Под заказ' . ($sku['fororder_date'] ? ' ' . $sku['fororder_date'] : '') . ')';
                }
            }
        }
    }

}
