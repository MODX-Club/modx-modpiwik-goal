<?php

$domains = preg_replace("/^https?:\/\/[www]+\.(.*)\/$/", '*.$1', $modx->getOption('site_url'));
$phone = $modx->getPlaceholder('piwik_phone');
$remote_url = $modx->getOption('modpiwikgoal.analytics_url');

if (!$remote_url) {
    return;
}

return <<<SCRIPT
  <script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(["setDomains", ["{$domains}"]]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//{$remote_url}/";

      _paq.push(['setCustomDimension', 2, "{$phone}"]);
      _paq.push(['setTrackerUrl', u+'piwik.php']);
      _paq.push(['setSiteId', 5]);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
SCRIPT;
