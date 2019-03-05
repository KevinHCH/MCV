<?php 

class ModelUsuarioLoginForm extends BaseForm
{
    protected static $lista_info = [
        'email',
        'pass'
    ];

    protected static $lista_tipo = [
        'FieldText',
        'FieldText'
    ];

    protected static $clase_modelo_asociado = 'ModelUsuario';
}//BaseForm

?>