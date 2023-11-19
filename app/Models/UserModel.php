<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'apellido', 'email', 'contraseña', 'dni', 'fecha_nacimiento', 'localidad', 'direccion', 'nacionalidad', 'id_usuario', 'id_rol', 'sobre_mi', 'telefono'];

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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function existeDni($dni)
    {
        //retorna verdadero si el dni existe
        return $this->where('dni', $dni)->countAllResults() > 0;
    }

    public function recuperarIdPorEmail($email)
    {
        $idUsuario = $this->select('id')->getWhere(['email' => $email])->getRow();
        return $idUsuario->id;
    }
}
