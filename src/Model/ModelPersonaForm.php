<?php 

class ModelPersonaForm extends BaseForm
{
    protected static $lista_info = [
        'dni',
        'nombre',
        'apellido',
        'edad'
    ];

    protected static $lista_tipo = [
        'FieldText',
        'FieldText',
        'FieldText',
        'FieldDate'
    ];

    protected static $clase_modelo_asociado = 'ModelPersona';
}//BaseForm

?>