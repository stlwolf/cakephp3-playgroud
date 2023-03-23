<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

class PostsControllerTest extends IntegrationTestCase
{
    public $Posts;
    public $fixtures = [
        'app.Posts',
    ];

    public function setUp()
    {
        parent::setUp();
        $this->Posts = TableRegistry::getTableLocator()->get('Posts', [
            'connectionName' => 'test',
        ]);
    }

    public function testIndex()
    {
        $this->get('/test-posts');

        $this->assertResponseOk();
        $this->assertContentType('application/json');

        $expectedJson = json_encode([
            'posts' => [
                [
                    'id' => 1,
                    'title' => 'First Post',
                    'body' => 'This is the first post.',
                    'created' => '2023-01-01T00:00:00+00:00',
                    'modified' => '2023-01-01T00:00:00+00:00',
                ],
                [
                    'id' => 2,
                    'title' => 'Second Post',
                    'body' => 'This is the second post.',
                    'created' => '2023-01-02T00:00:00+00:00',
                    'modified' => '2023-01-02T00:00:00+00:00',
                ],
            ],
        ]);

        $this->assertJsonStringEqualsJsonString($expectedJson, (string)$this->_response->getBody());
    }

    public function testAdd()
    {
        $postData = [
            'title' => 'New Post',
            'body' => 'This is a new post.',
        ];

        $this->post('/test-posts', $postData);
        $this->assertResponseCode(200);

//        $post = $this->Posts->find()->where(['title' => $postData['title']])->first();
//        $this->assertNotNull($post);
    }

//    public function testView()
//    {
//        $this->get('/test-posts/1');
//
//        $this->assertResponseOk();
//        $this->assertContentType('application/json');
//
//        $expectedJson = json_encode([
//            'post' => [
//                'id' => 1,
//                'title' => 'First Post',
//                'body' => 'This is the first post.',
//                'created' => '2023-01-01T00:00:00+00:00',
//                'modified' => '2023-01-01T00:00:00+00:00',
//            ],
//        ]);
//
//        $this->assertJsonStringEqualsJsonString($expectedJson, (string)$this->_response->getBody());
//    }

//    public function testEdit()
//    {
//        $postId = 1;
//        $postData = [
//            'title' => 'Updated Post',
//            'body' => 'This is an updated post.',
//        ];
//
//        $this->put("/posts/{$postId}", $postData);
//        $this->assertResponseCode(200);
//
//        $post = $this->Posts->get($postId);
//        $this->assertEquals($postData['title'], $post->title);
//        $this->assertEquals($postData['body'], $post->body);
//    }

//    public function testDelete()
//    {
//        $postId = 1;
//
//        $this->delete("/posts/{$postId}");
//        $this->assertResponseCode(200);
//
//        $post = $this->Posts->find('all', ['conditions' => ['id' => $postId]])->first();
//        $this->assertNull($post);
//    }
}
