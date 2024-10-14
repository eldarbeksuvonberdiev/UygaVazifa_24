<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Janr;

class JanrController
{
    public function __construct()
    {
        if(!Auth::check()){
            header("location:/login");
        }
    }
    public function index()
    {
        $models = Janr::all();
        return view('Janr/index', 'Home', $models);
    }

    public function createJanr()
    {
        return view('Janr/create', 'Janr Yaratish');
    }

    public function notfound()
    {
        return view('notfound', '404 not found');
    }

    public function notAllowed()
    {
        return view('notallowed', '403 not found');
    }


    public function create()
    {
        if (isset($_POST['ok'])) {
            $data = [
                'name' => $_POST['name']
            ];
            Janr::create($data);
            header("location: /");
        }
    }

    public function delete()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            Janr::delete($id);
            header("location: /");
        }
    }

    public function show()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Janr::show($id);
            return view('show', 'Show', $models);
        }
    }

    public function edit()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Janr::show($id);
            return view('Janr/edit', 'Janr tahrirlash', $models);
        }
    }

    public function update()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $data = [
                'name' => $_POST['name']
            ];
            $models = Janr::update($data, $id);
            header("location: /");
        }
    }
}
