<?php

require_once 'ageprogress.civix.php';
use CRM_Ageprogress_ExtensionUtil as E;

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_buildForm/
 */
function ageprogress_civicrm_buildForm($formName, &$form) {
  // Get a list of the injected fields for this form.
  $fieldNames = _ageprogress_buildForm_fields($formName, $form);
  if (!empty($fieldNames)) {
    _ageprogress_add_bhfe($fieldNames, $form);
  }

  if ($formName == 'CRM_Admin_Form_ContactType') {

  }
};

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function ageprogress_civicrm_config(&$config) {
  _ageprogress_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function ageprogress_civicrm_xmlMenu(&$files) {
  _ageprogress_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function ageprogress_civicrm_install() {
  _ageprogress_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function ageprogress_civicrm_postInstall() {
  _ageprogress_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function ageprogress_civicrm_uninstall() {
  _ageprogress_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function ageprogress_civicrm_enable() {
  _ageprogress_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function ageprogress_civicrm_disable() {
  _ageprogress_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function ageprogress_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _ageprogress_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function ageprogress_civicrm_managed(&$entities) {
  _ageprogress_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function ageprogress_civicrm_caseTypes(&$caseTypes) {
  _ageprogress_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function ageprogress_civicrm_angularModules(&$angularModules) {
  _ageprogress_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function ageprogress_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _ageprogress_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function ageprogress_civicrm_entityTypes(&$entityTypes) {
  _ageprogress_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function ageprogress_civicrm_themes(&$themes) {
  _ageprogress_civix_civicrm_themes($themes);
}

/**
 * Add injected elements to $form (if provided), and in any case return a list
 * of the injected fields for $formName.
 *
 * @param type $formName
 * @param type $form
 * @return string
 */
function _ageprogress_buildForm_fields($formName, &$form = NULL) {
  $fieldNames = [];
  $descriptions = [];
  if ($formName == 'CRM_Admin_Form_ContactType') {
    if ($form !== NULL) {
      $parentId = $form->getVar('_parentId');
      if ($parentId) {
        $form->addElement('checkbox', 'is_ageprogress', E::ts('Progress by age'));
        $descriptions['is_ageprogress'] = E::ts('Should this sub-type be included in "Sub-Type by Age" processing?');

        $form->addElement('checkbox', 'is_ageprogress_final', E::ts('Final sub-type'));
        $descriptions['is_ageprogress_final'] = E::ts('Is this the final sub-type in the progression? (e.g., for "Adult" sub-type). If checked, contacts who match no other sub-types will be finally moved into this sub-type.');

        $form->addElement('text', 'ageprogress_max_age', E::ts('Maximum age'));
        $descriptions['ageprogress_max_age'] = E::ts('Contacts calculated to be above this age will be automatically removed from this sub-type.');
        $form->addRule('ageprogress_max_age', ts('Maximum age should be a positive number'), 'positiveInteger');

        CRM_Core_Resources::singleton()->addScriptFile('com.joineryhq.ageprogress', 'js/CRM_Admin_Form_ContactType-has-parent.js');
      }
    }
    $fieldNames = [
      'is_ageprogress',
      'is_ageprogress_final',
      'ageprogress_max_age',
    ];
  }

  // Use JS to inject any form element descriptions.
  if (!empty($descriptions)) {
    CRM_Core_Resources::singleton()->addVars('ageprogress', ['descriptions' => $descriptions]);
    CRM_Core_Resources::singleton()->addScriptFile('com.joineryhq.ageprogress', 'js/injectDescriptions.js');

  }
  return $fieldNames;
}

function _ageprogress_add_bhfe(array $elementNames, CRM_Core_Form &$form) {
  $bhfe = $form->get_template_vars('beginHookFormElements');
  if (!$bhfe) {
    $bhfe = [];
  }
  foreach ($elementNames as $elementName) {
    $bhfe[] = $elementName;
  }
  $form->assign('beginHookFormElements', $bhfe);
}
