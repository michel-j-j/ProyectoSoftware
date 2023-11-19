<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\DenunciaModel;

class EstadoDenunciaModel extends Model
{
    protected $table = 'estado_denuncia';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['descripcion'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];



    public function isCancelado($idDenuncia)
    {
        $estado = $this->select('descripcion')->getWhere(['id' => $idDenuncia])->getRow();
        //$estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idDenuncia;")->getResultArray();
        if ($estado->descripcion == "Cancelado") {
            return true;
        } else {
            return false;
        }

    }

    public function isFinalizado($idDenuncia)
    {
        $estado = $this->select('descripcion')->getWhere(['id' => $idDenuncia])->getRow();
        // $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idDenuncia;")->getResultArray();
        //$descripcion = ($estado[0]['descripcion']);
        if ($estado->descripcion == "Finalizado") {
            return true;
        } else {
            return false;
        }
    }

}