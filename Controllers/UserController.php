<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Models/UserModel.php';

class UserController extends Respond
{
    public function index(): string|false
    {

        $userModel = new UserModel();
        return self::response(200, [
            'data' => $userModel->find()
        ]);

    }

    public function show($id): void
    {
        echo 'uye bilgisi' . $id;
    }

    public function update($id): void
    {
        echo 'uye kaydet' . $id;
    }

    public function create(): string
    {
        return 'uye ekle post';
    }
    public function delete($id): string
    {
        return self::responseDelete([
            'message' => 'Islem Basarili'
        ]);
    }
}