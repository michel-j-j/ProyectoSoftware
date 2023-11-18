<?php

namespace App\Models;

use CodeIgniter\Model;

class DenunciaModel extends Model
{
    protected $table = 'denuncia';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_usuario', 'id_estado_denuncia'];

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


    public function obtenerDenunciasPorIdUsuario($idUsuario)
    {
        return $this->query("SELECT * FROM denuncia WHERE id_usuario = $idUsuario;");
    }

    public function obtenerIdEstadoDenunciaPorNombre($estado)
    {
        $query = $this->query("SELECT id FROM estado_denuncia WHERE descripcion = '$estado';")->getResultArray();
        return $query[0]['id'];
    }

    public function obtenerEstadoPorId($idEstado)
    {
        $query = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = '$idEstado';")->getResultArray();
        return $query[0]['descripcion'];
    }

    public function isCancelado($idDenuncia)
    {
       
        $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idDenuncia;")->getResultArray();
        $descripcion = ($estado[0]['descripcion']);
        if ($descripcion == "Cancelado") {
            return true;
        } else {
            return false;
        }

    }

    public function isFinalizado($idDenuncia)
    {
        $estado = $this->query("SELECT descripcion FROM estado_denuncia WHERE id = $idDenuncia;")->getResultArray();
        $descripcion = ($estado[0]['descripcion']);
        if ($descripcion == "Finalizado") {
            return true;
        } else {
            return false;
        }
    }

    public function datosDeLaDenuncia($idDenuncia)
    {
        //recupera los datos del usuario, incluyendo los documentos asociados
        $queryDocumentacion = $this->query("SELECT u.nombre, u.apellido, u.email,doc.nombre AS nombre_documentacion, doc.numero, e.nombre AS 
        entidad FROM documentacion doc JOIN entidad e ON e.id_entidad = doc.id_entidad 
        JOIN denuncia_documentacion dd ON dd.id_documentacion = doc.id JOIN denuncia d ON d.id = dd.id_denuncia 
        JOIN usuario u ON u.id = doc.id_usuario WHERE d.id = $idDenuncia;")->getResultArray();

        return $queryDocumentacion;
    }
}