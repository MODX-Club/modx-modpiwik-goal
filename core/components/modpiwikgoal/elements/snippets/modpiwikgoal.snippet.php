<?php

$ph = isset($scriptProperties['ph']) ? $scriptProperties['ph'] : false;

$path = $modx->getObject('modNamespace', 'modpiwikgoal')->getCorePath().'model/';
$modx->getService('piwikgoal', 'modpiwikgoal.services.modPiwikGoal', $path);
try {
    $phone = $modx->piwikgoal->getPhoneAccordingToReferral();
} catch (Exception $e) {
    $modx->log(MODX::LOG_LEVEL_ERROR, $e->getMessage());
}

if ($ph) {
    $modx->setPlaceholder($ph, $phone);
}

return $phone;
