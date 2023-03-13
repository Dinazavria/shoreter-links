<?php
class Home extends Controller {
    public function index() {

        $data = [];

        if(isset($_POST['login'])) {
            $user = $this->model('UserModel');

            $user->setData($_POST['email'], $_POST['login'], $_POST['password'], $_POST['repass']);

            $isValid = $user->validForm($_POST['login']);
            if($isValid == "Происходит регистрация")
                $user->addUser();
            else
                $data['message'] = $isValid;
        }

        if(isset($_POST['link'])) {
            $slink = $this->model('ShorterModel');
            $slink->setData($_POST['link'], $_POST['keyword']);

            $isLinksValid = $slink->validLinkForm($_POST['keyword']);
            if($isLinksValid == "Сокращаем")
                $slink->addShorter();
            else
                $data['link_message'] = $isLinksValid;
        }

        if(isset($_POST['id'])) {
            $links = $this->model('ShorterModel');
            $links->deleteShorter($_POST['id']);
        }

        $this->view('home/index', $data);
    }

}