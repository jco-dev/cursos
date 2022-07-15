<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $preinscripcion = [
        'ci' => [
            'label' => 'Carnet de Identidad',
            'rules' => 'required|min_length[6]|max_length[15]',
        ],
        'expedido' => [
            'label' => 'Expedido',
            'rules' => 'required',
        ],
        'nombre' => [
            'label'  => 'Nombre(s)',
            'rules'  => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/]',
            'errors' => [
                'regex_match' => 'El nombre(s) debe contener solo letras.',
            ],
        ],
        'paterno' => [
            'label'  => 'Apellido Paterno',
            'rules'  => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/]',
            'errors' => [
                'regex_match' => 'El Apellido Paterno debe contener solo letras.',
            ],
        ],
        'materno' => [
            'label'  => 'Apellido Materno',
            'rules'  => 'max_length[50]|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+|(^$)/]',
            'errors' => [
                'regex_match' => 'El Apellido Paterno debe contener solo letras.',
            ],
        ],
        'celular' => [
            'label'  => 'Celular',
            'rules'  => 'required|min_length[8]|max_length[8]|regex_match[/^(7|6)?[0-9]{7}$/]',
            'errors' => [
                'regex_match' => 'El número de celular debe empezar de 6 o 7.'
            ],
        ],
        'correo' => [
            'label' => 'Correo Electrónico',
            'rules' => 'required|min_length[6]|max_length[50]|valid_email',
        ],
        'respaldo_transaccion' => [
            'label'  => 'Respaldo transacción',
            'rules'  => 'uploaded[respaldo_transaccion]|max_size[respaldo_transaccion,7168]|mime_in[respaldo_transaccion,image/png,image/jpg,image/jpeg]|ext_in[respaldo_transaccion,png,jpg,jpeg]',
            'errors' => [
                'max_size' => 'El respaldo transacción no debe pesar mas de 7MB.',
                'mime_in'  => 'El respaldo transacción debe ser una imagen: png, jpg, jpeg.',
                'ext_in'   => 'El respaldo transacción debe ser de una extensión: .png, .jpg, .jpeg',
            ]
        ],
        'ciudad_residencia' => [
            'label' => 'Cuidad de residencia',
            'rules' => 'required',
        ],
        'modalidad_inscripcion' => [
            'label' => 'Modadalidad de inscripción',
            'rules' => 'required',
        ],
        'nro_transaccion' => [
            'label' => 'Nro transacción',
            'rules' => 'required',
        ],
        'fecha_pago' => [
            'label' => 'Fecha Pago',
            'rules' => 'required|valid_date[Y-m-d]',
        ],
        'monto_pago' => [
            'label' => 'Monto Pago',
            'rules' => 'required',
        ],
        'tipo_certificado_solicitado' => [
            'label' => 'Tipo Certificado',
            'rules' => 'required',
        ],
        'certificacion' => [
            'label' => 'Certificación',
            'rules' => 'required',
        ],
        'dia' => [
            'label' => 'Día de fecha de nacimiento',
            'rules' => 'required',
        ],
        'mes' => [
            'label' => 'Mes de fecha de nacimiento',
            'rules' => 'required',
        ],
        'gestion' => [
            'label' => 'Año de fecha de nacimiento',
            'rules' => 'required',
        ]
    ];

    public $tipoCertificado = [
        'metodo' => [
            'label' => 'Método',
            'rules' => 'required|is_unique[tipo_certificado.metodo]',
            'errors' => [
                'is_unique' => 'El campo Método debe contener un valor único',
            ],
        ],
        'posx_nombre_participante' => [
            'label' => 'Posición X Nombre Participante',
            'rules' => 'required',
        ],
        'posy_nombre_participante' => [
            'label' => 'Posición Y Nombre Participante',
            'rules' => 'required',
        ],
        'posx_nombre_curso' => [
            'label' => 'Posición X Nombre Curso',
            'rules' => 'required',
        ],
        'posy_nombre_curso' => [
            'label' => 'Posición Y Nombre Curso',
            'rules' => 'required',
        ],
        'posx_qr' => [
            'label' => 'Posición X QR',
            'rules' => 'required',
        ],
        'posy_qr' => [
            'label' => 'Posición Y QR',
            'rules' => 'required',
        ],
        'posx_tipo_participacion' => [
            'label' => 'Posición X Tipo Participación',
            'rules' => 'required',
        ],
        'posy_tipo_participacion' => [
            'label' => 'Posición Y Tipo Participación',
            'rules' => 'required',
        ],
        'posx_bloque_texto' => [
            'label' => 'Posición X Bloque Texto',
            'rules' => 'required',
        ],
        'posy_bloque_texto' => [
            'label' => 'Posición Y Bloque Texto',
            'rules' => 'required',
        ],
        'tamanio_texto_participante' => [
            'label' => 'Tamaño texto participante',
            'rules' => 'required',
        ],
        'tamanio_texto_curso' => [
            'label' => 'Tamaño texto curso',
            'rules' => 'required',
        ],
        'tamanio_texto_bloque' => [
            'label' => 'Tamaño texto bloque',
            'rules' => 'required',
        ],
        'orientacion' => [
            'label' => 'Orientación del certificado',
            'rules' => 'required',
        ],
    ];
}
