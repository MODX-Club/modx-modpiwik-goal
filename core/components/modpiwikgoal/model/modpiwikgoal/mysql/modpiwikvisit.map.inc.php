<?php

$xpdo_meta_map['ModpiwikVisit'] = array(
  'package' => 'modpiwikgoal',
  'version' => '1.1',
  'table' => 'modpiwik_visit',
  'extends' => 'xPDOSimpleObject',
  'fields' => array(
    'campaign' => null,
    'keyword' => null,
    'phone' => null,
    'cookie' => null,
    'token' => null,
    'timestamp' => 'CURRENT_TIMESTAMP',
    'visitor_id' => null,
    'user_id' => null,
    'order_id' => null,
    'raw' => null,
  ),
  'fieldMeta' => array(
    'campaign' => array(
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
    ),
    'keyword' => array(
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'phone' => array(
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => false,
    ),
    'cookie' => array(
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'string',
      'null' => false,
    ),
    'token' => array(
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
    ),
    'timestamp' => array(
      'dbtype' => 'timestamp',
      'phptype' => 'timestamp',
      'null' => false,
      'default' => 'CURRENT_TIMESTAMP',
    ),
    'visitor_id' => array(
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => true,
    ),
    'user_id' => array(
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => true,
    ),
    'order_id' => array(
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => true,
    ),
    'raw' => array(
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
  ),
  'aggregates' => array(
    'Visitor' => array(
      'class' => 'VisiModpiwikVisitorstors',
      'local' => 'visitor_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
