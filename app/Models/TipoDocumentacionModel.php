<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoDocumentacionModel extends Model
{
    protected $table = 'tipo_documentacion';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'pasos_recuperacion'];


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

    public function obtenerIdPorNombre($tipoDocumentacionNombre)
    {
        $idTipoDocumentacion = $this->select('id')->getWhere(['nombre' => $tipoDocumentacionNombre])->getRow();
        if ($idTipoDocumentacion) {
            return $idTipoDocumentacion->id;
        } else {
            return null; // O puedes lanzar una excepción u otro manejo de errores si el rol no se encuentra
        }
    }

    public function obtenerNombrePorId($idTipoDocumentacion)
    {
        $nombre = $this->select('nombre')->getWhere(['id' => $idTipoDocumentacion])->getRow();
        if ($nombre) {
            return $nombre->nombre;
        } else {
            return null; // O puedes lanzar una excepción u otro manejo de errores si el rol no se encuentra
        }
    }
    public function obtenerPasosPorIdTipoDocumentacion($idTipoDocumentacion)
    {
        $pasos = $this->select('pasos_recuperacion')->getWhere(['id' => $idTipoDocumentacion])->getRow();
        if ($pasos) {
            return $pasos->pasos_recuperacion;
        } else {
            return null; // O puedes lanzar una excepción u otro manejo de errores si el rol no se encuentra
        }
    }
}
