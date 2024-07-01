<?php

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

if (!defined('_PS_VERSION_'))
   exit;

class Od_module_1 extends Module implements WidgetInterface
{
   public function __construct()
   {
      $this->name = 'od_module_1';
      $this->tab = 'front_office_features';
      $this->version = '1.0.0';
      $this->author = 'Malva Pérez';
      $this->need_instance = 0;
      $this->ps_versions_compliancy = ['min' => '1.6', 'max' => _PS_VERSION_];
      $this->bootstrap = true;

      parent::__construct();

      $this->displayName = $this->l('Módulo 1');
      $this->description = $this->l('Muestra un mensaje en todas las páginas menos el home');
   }


   public function install()
   {
      return parent::install()
         && $this->registerHook('displayLeftColumn')
         && $this->registerHook('displayOrderConfirmation')
         && $this->registerHook('displayDetail')
         && $this->registerHook('displayProductAdditionalInfo');
   }

   public function hookDisplayHome()
   {
      $this->context->smarty->assign($this->name . '_message', 'Módulo 1');
      return $this->fetch('module:od_module_1/views/templates/front/message.tpl');
   }

   public function renderWidget($hookName = null, array $configuration = []){
      $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
      return $this->display(__FILE__, 'views/templates/front/message.tpl');
   }

   public function getWidgetVariables($hookName = null, array $configuration = []){
      return [$this->name . '_message' => $this->l('Módulo 1')];
   }
}
