<?php

$xpdo_meta_map['ModpiwikVisitors'] = array(
  'package' => 'modpiwikgoal',
  'version' => '1.1',
  'table' => 'visitors',
  'extends' => 'xPDOSimpleObject',
  'fields' => array(
    'date' => null,
    'url' => null,
    'referer' => null,
    'userAgent' => null,
    'user_id' => null,
    'ip' => null,
    'status' => null,
    'cookie' => null,
    'repaired' => null,
  ),
  'fieldMeta' => array(
    'date' => array(
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'url' => array(
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'referer' => array(
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'userAgent' => array(
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'user_id' => array(
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => true,
      'index' => 'index',
    ),
    'ip' => array(
      'dbtype' => 'varchar',
      'precision' => '130',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'status' => array(
      'dbtype' => 'smallint',
      'precision' => '3',
      'phptype' => 'integer',
      'null' => false,
    ),
    'cookie' => array(
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'string',
      'null' => false,
    ),
    'repaired' => array(
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
  ),
  'indexes' => array(
    'ip' => array(
      'alias' => 'ip',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => array(
        'ip' => array(
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_id' => array(
      'alias' => 'user_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => array(
        'user_id' => array(
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'repaired' => array(
      'alias' => 'repaired',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => array(
        'repaired' => array(
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'url' => array(
      'alias' => 'url',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => array(
        'url' => array(
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
      ),
    ),
    'referer' => array(
      'alias' => 'referer',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => array(
        'referer' => array(
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
      ),
    ),
    'userAgent' => array(
      'alias' => 'userAgent',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => array(
        'userAgent' => array(
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
      ),
    ),
  ),
);
