<?php
namespace Crud\Test\TestCase\Action\Bulk;

use Cake\Routing\DispatcherFactory;
use Cake\Routing\Router;
use Crud\TestSuite\IntegrationTestCase;

/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
class SetValueActionTest extends IntegrationTestCase
{

    /**
     * fixtures property
     *
     * @var array
     */
    public $fixtures = ['plugin.crud.blogs'];

    /**
     * Table class to mock on
     *
     * @var string
     */
    public $tableClass = 'Crud\Test\App\Model\Table\BlogsTable';

    /**
     * Data provider with all HTTP verbs
     *
     * @return array
     */
    public function allHttpMethodProvider()
    {
        return [
            ['post'],
            ['put'],
        ];
    }

    /**
     * Test the normal HTTP flow for all HTTP verbs
     *
     * @dataProvider allHttpMethodProvider
     * @return void
     */
    public function testAllRequestMethods($method)
    {
        $this->_eventManager->on(
            'Dispatcher.beforeDispatch',
            ['priority' => 1000],
            function ($event) {
                $this->_controller->Flash = $this->getMock(
                    'Cake\Controller\Component\Flash',
                    ['set']
                );

                $this->_controller->Flash
                    ->expects($this->once())
                    ->method('set')
                    ->with(
                        'Set value successfully',
                        [
                            'element' => 'default',
                            'params' => ['class' => 'message success', 'original' => 'Set value successfully'],
                            'key' => 'flash'
                        ]
                    );

                $this->_subscribeToEvents($this->_controller);
            }
        );

        $this->{$method}('/blogs/deactivateAll', [
            'id' => [
                1 => 1,
                2 => 2,
            ],
        ]);

        $this->assertEvents(['beforeBulk', 'afterBulk', 'setFlash', 'beforeRedirect']);
        $this->assertTrue($this->_subject->success);
        $this->assertRedirect('/blogs');
    }

    /**
     * Test the flow when the beforeBulk event is stopped
     *
     * @return void
     */
    public function testStopBeforeBulk()
    {
        $this->_eventManager->on(
            'Dispatcher.beforeDispatch',
            ['priority' => 1000],
            function ($event) {
                $this->_controller->Flash = $this->getMock(
                    'Cake\Controller\Component\Flash',
                    ['set']
                );

                $this->_controller->Flash
                    ->expects($this->once())
                    ->method('set')
                    ->with(
                        'Could not set value',
                        [
                            'element' => 'default',
                            'params' => ['class' => 'message error', 'original' => 'Could not set value'],
                            'key' => 'flash'
                        ]
                    );

                $this->_subscribeToEvents($this->_controller);

                $this->_controller->Crud->on('beforeBulk', function ($event) {
                    $event->stopPropagation();
                });
            }
        );

        $this->post('/blogs/deactivateAll', [
            'id' => [
                1 => 1,
                2 => 2,
            ],
        ]);

        $this->assertEvents(['beforeBulk', 'setFlash', 'beforeRedirect']);
        $this->assertFalse($this->_subject->success);
        $this->assertRedirect('/blogs');
    }
}
