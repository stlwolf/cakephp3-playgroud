<?php
namespace App\Controller;

use App\Controller\AppController;

class ApiController extends AppController
{
    public $authUser = null;
    public $loginAdmin = null;

    protected function loadAuthComponent()
    {
        $this->log('ApiController loadAuthComponent', LOG_DEBUG);
    }

    /**
     * @throws \Exception
     */
    public function initialize()
    {
        $this->log('ApiController initialize', LOG_DEBUG);
        parent::initialize();

        $this->loadAuthComponent();
    }
}
