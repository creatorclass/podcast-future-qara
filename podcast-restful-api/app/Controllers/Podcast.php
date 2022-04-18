<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Podcast extends ResourceController
{
    protected $modelName = 'App\Models\PodcastModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {

        $time = date("Y-m-d H:i:s");
        
        // ----------------Image Handler------------------------------------
        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getName();
        $imageFile->move('img');

        // Change to Base Url
        $imageUrl = base_url("img/$imageName");
        // ----------------Image Handler------------------------------------

        // --------------Voice Handler---------------------------------------
        $voiceFile = $this->request->getFile('voice');
        $voiceName = $voiceFile->getName();
        $voiceFile->move('audio');

        // Change to Base Url
        $voiceUrl = base_url("audio/$voiceName");

        // ----------------Image Handler------------------------------------

        // --------------Voice Handler--------------------------------------

        if ($this->model->save([
            'title' => $this->request->getVar('title'),
            'voice' => $voiceUrl,
            'category' => $this->request->getVar('category'),
            'image' => $imageUrl,
            'created_at' => $time,
        ])) {
            return $this->respondCreated('USER CREATED');
        }
    }


    public function delete($id = null)
    {
        if(!$this->model->findById($id))
        {
            return $this->fail('id tidak ditemukan');
        }

        if($this->model->delete($id)){
            return $this->respondDeleted(['id'=>$id.' Deleted']);
        }
    }

    
}