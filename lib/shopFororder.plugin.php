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

}
