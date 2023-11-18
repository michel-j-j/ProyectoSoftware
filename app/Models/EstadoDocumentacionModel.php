<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\DenunciaModel;

class EstadoDocumentacionModel extends Model
{
    protected $table = 'estado_documentacion';
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

    public function obtenerEstadoPorId($id)
    {
        $estado = $this->select('descripcion')->getWhere(['id' => $id])->getRow();
        return $estado->descripcion;
    }

    public function obtenerIdPorEstado($estado)
    {
        $id = $this->select('id')->getWhere(['descripcion' => $estado])->getRow();
        return $id->id;
    }

    public function isCancelado($denuncia)
    {
        $idEstadoDenuncia = $denuncia['id_estado_denuncia'];
        $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idEstadoDenuncia;")->getResultArray();
        $descripcion = ($estado[0]['descripcion']);
        if ($descripcion == "Cancelado") {
            return true;
        } else {
            return false;
        }
    }

    public function isIniciada($denuncia)
    {
        $idEstadoDenuncia = $denuncia['id_estado_denuncia'];
        $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idEstadoDenuncia;")->getResultArray();
        $descripcion = ($estado[0]['descripcion']);
        if ($descripcion == "Iniciada") {
            return true;
        } else {
            return false;
        }
    }
    public function isEnCurso($denuncia)
    {
        $idEstadoDenuncia = $denuncia['id_estado_denuncia'];
        $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idEstadoDenuncia;")->getResultArray();
        $descripcion = ($estado[0]['descripcion']);
        if ($descripcion == "En curso") {
            return true;
        } else {
            return false;
        }
    }

    public function isFinalizado($denuncia)
    {
        $idEstadoDenuncia = $denuncia['id_estado_denuncia'];
        $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idEstadoDenuncia;")->getResultArray();
        $descripcion = ($estado[0]['descripcion']);
        if ($descripcion == "Finalizado") {
            return true;
        } else {
            return false;
        }
    }
}
