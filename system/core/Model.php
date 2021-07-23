<?php

class Model
{
   public function __construct()
   {
       $this->session = new \Configuration\SessionManager();

       if (!$this->session->has('userID')) {
          header('Location: ' . base_url . 'auth/logout');
       }

   }

   public function model($model)
   {
        require_once '../app/models/'.$model . '.php';
        return new $model;
   }

   public function session()
   {
       $this->session = new \Configuration\SessionManager();

       if (!$this->session->has('userID')) {
          header('Location: ' . base_url . 'auth/logout');
       }
   }

   public function jsonResult($result){
        // header("Content-type:application/json");
        echo json_encode($result);
    }

    public function addcomma($array){
        $comma_separated = implode(', ', array_map(function($i) { return $i; }, $array));
        return $comma_separated;
    }
}