<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class ZahradController extends AControllerBase
{

    public function index(): Response
    {
        $zahradnik = \App\Models\zahradnik::getAll();
        return $this->html([$zahradnik]);


    }

    public function naplnenie(): Response
    {

        $data = $this->request()->getPost();
        $meno = $data['meno'];
        $priezvisko = $data['priezvisko'];
        $email = $data['email'];
        $text = $data['text'];
        $cena = $data['cena'];




        if (!empty($data['email']) && !empty($data['meno']) && !empty($data['priezvisko'])) {

            $zahradnik = new zahradnik();
            $zahradnik->setMeno($meno);
            $zahradnik->setPriezvisko($priezvisko);
            $zahradnik->setEmail($email);
            $zahradnik->setText($text);
            $zahradnik->setText($cena);
            $zahradnik->save();



        } try {
        $zahradnik->save();
    }  catch (Exception $e) {
        error_log("Error" . $e->getMessage());

        return $this->errorResponse("Error");
    }
        return $this->redirect("?c=zahradnik");
    }


    public function editZahradnika(): Response {

        $recenzia = $_POST['editRecenzie'];
        $id = $this->request()->getValue('id');

        try {
            $editZahradnik = zahradnik::getOne($id);
            $editZahradnik->setZahradnik($recenzia);

            $editZahradnik->save();
        } catch (Exception $e) {
            error_log("Error" . $e->getMessage());

            return $this->errorResponse("Error");
        }

        return $this->redirect("?c=zahradnik");

    }
    public function vymazanieZahradnika(): Response {

        $id = $this->request()->getValue('id');

        $vymazanieZahradnika = recenzie::getOne($id);

        if ($vymazanieZahradnika) {
            $vymazanieZahradnika->delete();
        } else {
            return $this->errorResponse("Vymazanie bolo neúspešné");
        }

        return $this->redirect("?c=zahradnik");

    }

}