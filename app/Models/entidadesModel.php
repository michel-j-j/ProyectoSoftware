<?php

namespace App\Models;

use CodeIgniter\Model;

class EntidadesModel extends Model
{
    protected $table = 'entidad';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nombre', 'localidad', 'direccion', 'telefono', 'email', 'id_usuario'];

    public function recuperarIdPorNombreEntidad($nombreEntidad)
    {
        $idEntidad = $this->select('id_entidad')->getWhere(['nombre' => $nombreEntidad])->getRow();
        return $idEntidad->id_entidad;
    }
    public function recuperarNombreEntidadPorId($idEntidad)
    {
        $nombreEntidad = $this->select('nombre')->getWhere(['id_entidad' => $idEntidad])->getRow();
        return $nombreEntidad->nombre;
    }
}
