<?php
namespace LoremQuestions;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class LoremQuestions extends \Shopware\Components\Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Frontend_Questions'
            => 'onGetControllerPath',
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail'
            => 'onPostDispatchDetail'
        ];
    }

    public function build(ContainerBuilder $container)
    {
        // Set plugin path for shopware versions < 5.2.7
        $container->setParameter('lorem_questions.plugin_dir', $this->getPath());
        parent::build($container);
    }

    private function registerTemplateDir()
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views/'
        );
    }

    /**
     * Not needed for Shopware versions > 5.2.7
     */
    public function onGetControllerPath()
    {
        return $this->getPath() . '/Controllers/Frontend/LoremQuestions.php';
    }

    public function onPostDispatchDetail(\Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Frontend_Detail $detailController */
        $detailController = $args->getSubject();
        $view = $detailController->View();
        $this->registerTemplateDir();
        $view->assign('lorem_faq', [
            'Werden die Batterien direkt mitgeliefert' => [
                'Ja, werden Sie',
                'Ja, es sind 3 AAA-Batterien enthalten'
            ],
            'Gibt es eine Herstellergarantie?' => [
                'Ja, 3 Jahre',
                'Ja, 3 Jahre - aber nur wenn man sich beim Hersteller registriert'
            ]
        ]);
    }
}
