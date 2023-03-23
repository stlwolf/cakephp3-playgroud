<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class TestPostsController extends PostsController
{
    public $Posts;

    public function initialize()
    {
        $this->log('TestPostsController initialize', LOG_DEBUG);

        $this->Posts = TableRegistry::getTableLocator()->get('Posts', [
            'connectionName' => 'test',
        ]);

        parent::initialize();
    }

    // You can add methods or override existing methods here for testing purposes
    protected function loadAuthComponent()
    {
        $this->log('TestPostsController loadAuthComponent', LOG_DEBUG);
    }
}

