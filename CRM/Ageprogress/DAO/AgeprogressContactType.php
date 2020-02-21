<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2019
 *
 * Generated from /home/as/_laptop/projects/com.joineryhq.ageprogress/xml/schema/CRM/Ageprogress/ageprogressContactType.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:2132dfb6f09d7572c76c33e573ac7df5)
 */

/**
 * Database access object for the AgeprogressContactType entity.
 */
class CRM_Ageprogress_DAO_AgeprogressContactType extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_ageprogress_contact_type';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique AgeprogressContactType ID
   *
   * @var int
   */
  public $id;

  /**
   * FK to Contact Type
   *
   * @var int
   */
  public $contact_type_id;

  /**
   * Should this sub-type be included in "Sub-Type by Age" processing?
   *
   * @var bool
   */
  public $is_ageprogress;

  /**
   * Is this the final sub-type in the progression?
   *
   * @var bool
   */
  public $is_ageprogress_final;

  /**
   * Contacts calculated to be above this age will be automatically removed from this sub-type.
   *
   * @var int
   */
  public $ageprogress_max_age;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_ageprogress_contact_type';
    parent::__construct();
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contact_type_id', 'civicrm_contact_type', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => CRM_Ageprogress_ExtensionUtil::ts('Unique AgeprogressContactType ID'),
          'required' => TRUE,
          'where' => 'civicrm_ageprogress_contact_type.id',
          'table_name' => 'civicrm_ageprogress_contact_type',
          'entity' => 'AgeprogressContactType',
          'bao' => 'CRM_Ageprogress_DAO_AgeprogressContactType',
          'localizable' => 0,
        ],
        'contact_type_id' => [
          'name' => 'contact_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => CRM_Ageprogress_ExtensionUtil::ts('FK to Contact Type'),
          'where' => 'civicrm_ageprogress_contact_type.contact_type_id',
          'table_name' => 'civicrm_ageprogress_contact_type',
          'entity' => 'AgeprogressContactType',
          'bao' => 'CRM_Ageprogress_DAO_AgeprogressContactType',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_ContactType',
        ],
        'is_ageprogress' => [
          'name' => 'is_ageprogress',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => CRM_Ageprogress_ExtensionUtil::ts('Progress by age'),
          'description' => CRM_Ageprogress_ExtensionUtil::ts('Should this sub-type be included in "Sub-Type by Age" processing?'),
          'required' => TRUE,
          'where' => 'civicrm_ageprogress_contact_type.is_ageprogress',
          'default' => '0',
          'table_name' => 'civicrm_ageprogress_contact_type',
          'entity' => 'AgeprogressContactType',
          'bao' => 'CRM_Ageprogress_DAO_AgeprogressContactType',
          'localizable' => 0,
        ],
        'is_ageprogress_final' => [
          'name' => 'is_ageprogress_final',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => CRM_Ageprogress_ExtensionUtil::ts('Final sub-type'),
          'description' => CRM_Ageprogress_ExtensionUtil::ts('Is this the final sub-type in the progression?'),
          'required' => TRUE,
          'where' => 'civicrm_ageprogress_contact_type.is_ageprogress_final',
          'default' => '0',
          'table_name' => 'civicrm_ageprogress_contact_type',
          'entity' => 'AgeprogressContactType',
          'bao' => 'CRM_Ageprogress_DAO_AgeprogressContactType',
          'localizable' => 0,
        ],
        'ageprogress_max_age' => [
          'name' => 'ageprogress_max_age',
          'type' => CRM_Utils_Type::T_INT,
          'title' => CRM_Ageprogress_ExtensionUtil::ts('Maximum age'),
          'description' => CRM_Ageprogress_ExtensionUtil::ts('Contacts calculated to be above this age will be automatically removed from this sub-type.'),
          'required' => TRUE,
          'where' => 'civicrm_ageprogress_contact_type.ageprogress_max_age',
          'default' => '0',
          'table_name' => 'civicrm_ageprogress_contact_type',
          'entity' => 'AgeprogressContactType',
          'bao' => 'CRM_Ageprogress_DAO_AgeprogressContactType',
          'localizable' => 0,
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'ageprogress_contact_type', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'ageprogress_contact_type', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}