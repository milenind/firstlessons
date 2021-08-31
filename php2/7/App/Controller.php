<?php

namespace App;

abstract class Controller
{
    protected View $view;


    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }

    abstract protected function handle($params = null): void;

    /**
     * @param $action - передаем нужный экшн
     * @param null $params
     */
    public function __invoke($action, $params = null): void
    {
        if (!$this->access()) {
            die('Доступ закрыт');
        }
        $this->$action($params);
    }
}