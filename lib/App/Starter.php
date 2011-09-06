<?php

namespace App;

use \Fc\Router\Router as Router;
use \Fc\DependencyInjection\Container as Container;
use \Fc\Action\Helper\Broker as HelperBroker;
use \Fc\Action\Dispatcher\StandardDispatcher as StandardDispatcher;

/**
 * Author: Szymon Wygnański
 * Date: 06.09.11
 * Time: 01:46
 */
class Starter
{

    protected $options;

    /**
     * @var \Fc\Action\Helper\Broker
     */
    private $broker;

    /**
     * @var \Fc\Action\Dispatcher
     */
    private $dispatcher;

    /**
     * @var \Fc\Router\Router
     */
    private $router;

    /**
     * @var \Fc\DependencyInjection\Container
     */
    private $di;

    public function __construct()
    {
        $this->di = new Container();
        $this->router = new Router();
        $this->broker = new HelperBroker();
        $this->dispatcher = new StandardDispatcher($this->router);

        $this->options = array(
            'di' => $this->di,
            'router' => $this->router,
            'helper_broker' => $this->broker,
            'action_dispatcher' => $this->dispatcher,
        );

        $this->di->router = $this->router;
        $this->di->helper_broker = $this->broker;
        $this->di->action_dispatcher = $this->dispatcher;
    }

    public function start()
    {
        $this->init_helpers();
        $this->init_layouts();
        $this->init_routes();
        $this->init_action();
    }

    private function init_helpers()
    {
        $this->broker->title = $this->broker->share(
            $this->broker->helper('\Fc\Action\Helper\Head\Title', $this->options)
        );
        $this->broker->menu = $this->broker->helper('\App\Admin\Helper\Menu', $this->options);
    }

    private function init_layouts()
    {
        $this->di->admin_layout = $this->di->configurable('\App\Admin\Layout', $this->options);
    }

    private function init_routes()
    {
        $this->router->action('\App\Admin\Articles\Index');
        $options = $this->options;

        $this->router['/'] = $this->router['/admin/articles'] =
                $this->router->action('\App\Admin\Articles\Index', $options);

        $this->router['/admin/articles/:id'] = $this->router->inline(function($router) use($options) {
                $di = $options['di'];
                echo $di->admin_layout->set_content('Hello from inline action');
        });

        $this->router['/admin/users'] = $this->router->action('\App\Admin\Users\Index', $options);
    }

    private function init_action()
    {
        $this->dispatcher->dispatch_uri($_SERVER['REQUEST_URI']);
    }


}
