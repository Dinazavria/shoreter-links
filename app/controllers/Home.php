<?php
class Home extends Controller {
    public function index($name = '') {
        $user = $this->model("User");
        $user->name = $name;
        $user->getInfo();

        $this->view(
            'home/index',
            ['name' => $user->name, 'test' => 'Hello World' ]);
    }

    public function about() {
        echo "home/about";
    }
}