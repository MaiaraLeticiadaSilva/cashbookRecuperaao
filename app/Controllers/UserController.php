<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function __construct(){
        $modelUser = model('app/Models/User');
    }

    public function index()
    {
        $model = model("UserModel");
        $listUsers=$model->users();
		$data['users']=$listUsers;
        return view('user/index', $data);
    }

    public function login()
    {
        return view('user/login');
    }

    public function auth()
    {
        $session = \Config\Services::session();
        if(isset($_POST['user']['send_login'])){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $m = model('UserModel');
            $userEmail = $m->where('email', $email)->findAll();
            $userPass = $m->where('password', $password)->findAll();
            $user = [$userEmail, $userPass];
            print_r($userEmail);
            $session->set('idUser', $userEmail[0]['id']);
            $session->set('type', $userEmail[0]['type']);
        }
        header("Refresh: 2; url =".base_url());
    }

    public function logout()
    {
        
    }

    public function form()
    {
        return view('user/form');
    }

    public function add()
    {
        if(isset($_POST['save_user'])){
            $params['name'] = $this->request->getPost('name');
            $params['email'] = $this->request->getPost('email');
            $senha = $this->request->getPost('password');
            $params['password'] = md5($senha);
            $params['type'] = $this->request->getPost('type');
            // $params = [
            //     $name = $this->request->getPost('name'),
            //     $email = $this->request->getPost('email'),
            //     $password = $this->request->getPost('password'),
            //     $type = $this->request->getPost('type')
            // ];
            //var_dump($params);
            $model = model("UserModel");
            $resp = $model->add($params);
            if($resp) {
                header("url =".base_url()."/users");
            } else {
                header("url =".base_url()."/user/form");
            }
        }
    }
}
