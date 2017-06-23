<?php

class Shopware_Controllers_Frontend_Questions extends \Enlight_Controller_Action
{
    public function preDispatch()
    {
        $pluginPath = $this->container->getParameter('lorem_questions.plugin_dir');

        $this->get('template')->addTemplateDir($pluginPath . '/Resources/views/');
    }

    public function indexAction()
    {
    }
}
