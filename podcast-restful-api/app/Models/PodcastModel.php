<?php
namespace App\Models;

use CodeIgniter\Model;

class PodcastModel extends Model
{
    protected $table = 'podcast';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        "title","category","image","voice",
    ];
    protected $returnType = 'App\Entities\Podcast';
    protected $useTimestamps = true;

    public function findById($id)
    {
        $data = $this->find($id);
        if($data)
        {
            return $data;
        }
        return false;
    }


}