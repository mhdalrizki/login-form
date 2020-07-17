<?php

namespace App\Controllers;

class User extends BaseController
{
   public function index()
   {
      if (session()->get('user_nama') == '') {
         session()->setFlashdata('gagal', 'Silahkan Login');
         return redirect()->to(base_url('login'));
      }
      return view('user_view');
   }
public function add_new()
   {
      $model = new M_user();
      $data['user'] = $model->getUser();
      return view('user_tambah', $data);
   }

   public function save()
   {
      $model = new M_user();
      $data = [
         'user_id' => $this->request->getPost('user_id'),
         'user_nama' => $this->request->getPost('user_nama'),
         'user_email' => $this->request->getPost('user_email')
      ];
      $model->saveUser($data);
      return redirect()->to('/user');
   }

   public function edit($id)
   {
      $model = new M_user();
      $data['user'] = $model->getUser($id)->getRow();
      return view('user_edit', $data);
   }

   public function updateData()
   {
      $model = new M_user();
      $id = $this->request->getPost('user_id');
      $data = [
         'user_nama' => $this->request->getPost('user_nama'),
         'user_email' => $this->request->getPost('user_email')
      ];
      $model->updateUser($data, $id);
      return redirect()->to('/user');
   }

   public function delete($id)
   {
      $model = new M_user();
      $model->deleteUser($id);
      return redirect()->to('/user');
   }
   //--------------------------------------------------------------------

}