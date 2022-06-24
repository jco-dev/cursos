<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursoModel;

class Ofertas extends BaseController
{
    public $curso_model;
    public function __construct()
    {
        $this->curso_model = new CursoModel();
    }

    public function index()
    {
        $data = $this->curso_model->getCursosVigentes();
        $cursos = $this->listadoCursos($data);
        return view('ofertas/index', ['curso' => $cursos]);
    }

    public function listadoCursos($data)
    {
        $curso = NULL;
        if (count($data) > 0) {
            foreach ($data as $value)
                $curso .= view('ofertas/card/index', ['curso' => $value]);
        } else
            $curso = '<div class="alert alert-primary d-flex align-items-center p-5 mb-10">
                <span class="svg-icon svg-icon-2hx svg-icon-primary me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                    </svg>
                </span>
                <div class="d-flex flex-column">
                    <span>Por el momento no tenemos cursos disponibles, para más información contáctese con el número: 70648629.</span>
                </div>
            </div>';

        return $curso;
    }
}
