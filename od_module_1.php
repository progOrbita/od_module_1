<?php

if (!defined('_PS_VERSION_'))
   exit;

class Od_module_1 extends Module
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
         && $this->registerHook('displayTop');
   }

   public function hookDisplayTop()
   {
      if ($this->context->controller->php_self == 'index')
         return;

      $this->context->smarty->assign($this->name . '_message', 'Módulo 1');
      return $this->fetch('module:od_module_1/views/templates/front/message.tpl');
   }
}
