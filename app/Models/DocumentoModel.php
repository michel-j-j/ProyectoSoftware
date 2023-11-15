<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentoModel extends Model
{
    protected $table = 'documentacion';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['numero', 'fecha_vencimiento', 'fecha_emision', 'id_usuario', 'id_entidad', 'id_tipo_documentacion', 'id_estado_documentacion', 'nombre'];

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


    public function documentacionDeUnaDenuncia($idDenuncia)
    {
        $documentacion = $this->query("SELECT d.*, ed.descripcion estado FROM documentacion d JOIN denuncia_documentacion dd 
        ON d.id = dd.id_documentacion JOIN denuncia den ON dd.id_denuncia = den.id 
        JOIN estado_documentacion ed on ed.id_estado_documentacion = d.id_estado_documentacion 
        WHERE den.id = $idDenuncia;");

        return $documentacion->getResultArray();
    }

    public function obtenerDocumentacionPorUsuario($dato)
    {

        if ($dato != null) {
            if (is_numeric($dato)) {
                // Si $dato es un número (ID de usuario)
                return $this->query("SELECT * FROM documentacion WHERE id_usuario = $dato;")->getResultArray();
            } else {
                // Si $dato es un correo electrónico
                $email = $this->escapeString($dato);
                return $this->query("SELECT d.* FROM documentacion d JOIN usuario u ON d.id_usuario = u.id WHERE u.email = '$email';")->getResultArray();
            }
        }
        return null;
    }

    public function obtenerEstadoDocumento ($idEstado){
        $estado = null;
        switch ($idEstado) {
            case "1":
                $estado = "Activo";
                break;
            case "2":
                $estado = "Denunciado";
                break;
            case "3":
                $estado = "En recuperacion";
                break;
            case "4":
                $estado = "Recuperado";
                break;
        }

        return $estado;
    }
}