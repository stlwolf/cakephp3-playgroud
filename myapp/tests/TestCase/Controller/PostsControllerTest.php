<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PostsController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class PostsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public $Posts;
    
    public function setUp()
    {
        parent::setUp();

        $this->Posts = TableRegistry::getTableLocator()->get('Posts', [
            'connectionName' => 'test',
        ]);
    }

    public function testIndex()
    {
        $this->get('/posts');
        $this->assertResponseOk();
        $this->assertContentType('application/json');
    }

    // Add more test methods for other actions (view, add, edit, delete)
}
