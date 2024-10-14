<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Kitoblar;

class KitoblarController
{
    public function __construct()
    {   
        if(Auth::user()->role != "admin"){
            header("location: /notfound403");
        }
    }

    public function index()
    {
        $models = Kitoblar::all();
        return view('Kitoblar/index', 'Kitoblar', $models);
    }

    public function create()
    {
        if(isset($_POST['ok']) && !empty($_POST['title']) && !empty($_POST['desc']) && !empty($_POST['text'])){
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $text = $_POST['text'];
            $img = explode($_FILES['img']['name'],'.');
            dd($img);
            $typ = end($img);
            // $types = ['jpg','svg','jpeg','png'];
            $path = 'images/'.date("y-m-d_h-i-s.").$typ;
            move_uploaded_file($_FILES['img']['tmp_name'],$path);
            $data = [
                "title" => $title,
                "description" => $desc,
                "text" => $text,
                "img" => $path,
                "janr_id" => $_POST['janr'],
                "muallif_id" => $_POST['muallif']
            ];
            // Kitoblar::create($data);
            // header("location: /kitob");

        }
        // return view('Kitoblar/create', "Yangi kitob qo'shish");
    }

    public function createKitob()
    {
        $models = Kitoblar::getJM();
        return view('Kitoblar/create', "Yangi kitob qo'shish",$models);
    }

    public function delete()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            Kitoblar::delete($id);
            header("location: /kitob");
        }
    }

    public function show()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Kitoblar::show($id);
            return view('showStudent', 'Show Student info', $models);
        }
    }

    public function edit()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Kitoblar::show($id);
            return view('edit', 'Show', $models);
        }
    }

    public function update()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            if ($_FILES['img']['name']) {
                $img = explode('.', $_FILES['img']['name']);
                $timg = ['jpg', 'png', 'svg'];
                $end = end($img);
                if (in_array($end, $timg)) {
                    $path = 'Images/' . date("Y-m-d_H-i-s.") . $end;
                } else {
                    header("location: /sedit");
                }
            } else {
                $path = $_POST['rasm'];
            }
            $data = [
                'name' => $_POST['name'],
                'password' => $_POST['password'],
                'tel' => $_POST['tel'],
                'manzil' => $_POST['manzil'],
                'img' => $path
            ];
            $models = Kitoblar::update($data, $id);
            header("location: /student");
        }
    }

    public function editStudent()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Kitoblar::show($id);
            return view('editStudent', 'Edit Students', $models);
        }
    }
}
