<?php

/**
 * Description of User
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date May 24, 2016
 * 
 */

namespace Album\Model;

class User {

    public $idusuario;
    public $nome;
    public $user_name;
    public $pass;
    public $telefone;

    function exchangeArray($data) {

        $this->idusuario    = (!empty($data['idusuario']))  ? $data['idusuario']    : null;
        $this->nome         = (!empty($data['nome']))       ? $data['nome']         : null;
        $this->user_name    = (!empty($data['user_name']))  ? $data['user_name']    : null;
        $this->pass         = (!empty($data['pass']))       ? $data['pass']         : null;
        $this->telefone     = (!empty($data['telefone']))   ? $data['telefone']     : null;
    }

}
