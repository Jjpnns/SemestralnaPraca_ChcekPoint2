<?php

namespace App\Models;

use App\Core\Model;

class historia_objed extends Model
{
protected  $id_historia;
protected $id_zak;
protected $obsah;
protected $datum;

    public function getIdHistoria()
    {
        return $this->id_historia;
    }

    public function setIdHistoria(int $id_historia): void
    {
        $this->id_historia = $id_historia;
    }

    public function getIdZak()
    {
        return $this->id_zak;
    }

    public function setIdZak(int $id_zak): void
    {
        $this->id_zak = $id_zak;
    }

    public function getObsah()
    {
        return $this->obsah;
    }

    public function setObsah(string $obsah): void
    {
        $this->obsah = $obsah;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum): void
    {
        $this->datum = $datum;
    }
}