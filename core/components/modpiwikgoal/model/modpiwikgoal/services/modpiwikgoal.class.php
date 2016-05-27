<?php

class modPiwikGoal extends modProcessor
{
    private $token;
    private $cookie;

    public function __construct(modX $modx, $properties = array())
    {
        parent::__construct($modx, $properties);
        $this->cmpPath = $this->modx->getObject('modNamespace', array('name' => 'modpiwikgoal'))->getCorePath();
    }

    public function process()
    {
        # code...
    }

    private function getCurrentUserCredentials()
    {
        $user = $this->modx->user;

        if (!$user) {
            throw new Exception('User is not specified', 1);
        }

        $this->token = $user->getUserToken();
        $this->cookie = $_COOKIE['PHPSESSID'];
    }

    protected function mapping()
    {
        return array(
        'campaign' => 'utm_campaign',
        'keyword' => 'utm_term',
        'phone' => 'phone',
        'cookie' => 'cookie',
        'user_id' => 'user_id',
        'token' => 'token',
        'raw' => 'raw',
      );
    }

    public function getReferralParameters()
    {
        $list = array_slice(array_values($this->mapping()), 0, 2);
        $params = array();
        foreach ($list as $param) {
            $params[$param] = $this->modx->request->getParameters($param);
        }

        return $params;
    }

    public function getRawVisitData()
    {
        $data = array();
        $data = array_merge($data, $this->getReferralParameters());

        $this->getCurrentUserCredentials();
        $data['cookie'] = $this->cookie;
        $data['token'] = $this->token;
        $data['user_id'] = $this->modx->user->id;
        $data['phone'] = $this->modx->getPlaceholder('piwik_phone');
        $data['raw'] = json_encode($this->modx->request->getParameters());

        return $data;
    }

    public function mapVisitData()
    {
        $raw = $this->getRawVisitData();

        return array_map(function ($key) use ($raw) {
          return isset($raw[$key]) ? $raw[$key] : '';
        }, $this->mapping());
    }

    protected function filterDumbData($data)
    {
        $return = false;

        if ($data['cookie'] || ($data['raw'] != '[]' && !$data['cookie'])) {
            return true;
        }

        return $return;
    }

    public function recordVisit($phone = null)
    {
        $visit = $this->modx->newObject('ModpiwikVisit');
        $visitData = $this->mapVisitData();

        if (!$this->filterDumbData($visitData)) {
            return;
        }

        $visit->fromArray($visitData);
        if (!$visit->save()) {
            throw new Exception('Error Processing Save', 1);
        }
    }

    public function getPhoneAccordingToReferral()
    {
        $phoneList = file_get_contents($this->cmpPath.'misc/phones.json');
        $phoneReferrerMatching = file_get_contents($this->cmpPath.'misc/matching.json');

        if (!$phoneList || !$phoneReferrerMatching) {
            throw new Exception("Can't load files", 1);
        }

        $refs = $this->getReferralParameters();
        $intersections = array();
        foreach (json_decode($phoneReferrerMatching, 1) as $match) {
            switch ($match['entry']) {
              case 'campaign':
                $_key = 'utm_campaign';
                $_priority = 0;
              break;

              case 'keyword':
              $_key = 'utm_term';
              $_priority = 1;

              break;
            }

            if ($match['entryValue'] == $refs[$_key]) {
                $intersections[$_priority] = $match['phone'];
            }
        }

        if (!$intersections) {
            $phoneList = json_decode($phoneList, 1);

            return $phoneList[array_rand($phoneList)];
        } else {
            return end($intersections);
        }
    }
}
