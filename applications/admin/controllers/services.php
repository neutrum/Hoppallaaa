<?php
  Class Services extends Controller
  {
    public $noRender = 1;
    function Services() {
        parent::Controller();
    }

    function index() {
        echo "Services";
    }
    // facebook functions
    function post() {
        $config =  array(
            'appId'  => '167107579994396',
            'secret' => '6b6d5dfbe3280dc4f650cf02d04c1274',
            'cookie' => true,
        );
        $this->facebook->init($config);

        $session = $this->facebook->getSession();
        $fbme = null;
        echo "session:";
        print_r($session);
        if ($session) {
         try {
            $uid = $this->facebook->getUser();
            $fbme = $this->facebook->api('/me');
          } catch (FacebookApiException $e) {
              print_r($e);
        }
       }

        $message = 'test msg from the outer space';

        $params = array(
            'method' => 'publish.stream',
            'message' => $message,
            'target_id' => '100001065983541',
        );

        try {
            $this->facebook->api($params);
        } catch (FacebookApiException $e) {
            print_r($e);
        }
    }
  }
?>
