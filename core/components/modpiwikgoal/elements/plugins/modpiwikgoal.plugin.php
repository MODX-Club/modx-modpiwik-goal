<?php

if ($modx->context->key == 'mgr') {
    return;
}

if ($modx->getOption('debug', false) && !$modx->hasPermission('debug')) {
    return;
}

$service_model_path = $modx->getObject('modNamespace', 'modpiwikgoal')->getCorePath().'model/';
$modx->getService('piwikgoal', 'modpiwikgoal.services.ModpiwikGoal', $service_model_path);

switch ($modx->event->name) {

  case 'OnHandleRequest':
    try {
        $phone = $modx->runSnippet('modpiwikgoal', array('ph' => 'piwik_phone'));
        $modx->piwikgoal->recordVisit();
    } catch (Exception $e) {
        $modx->log(MODX::LOG_LEVEL_ERROR, $e->getMessage());
    }
  break;

}

return true;
