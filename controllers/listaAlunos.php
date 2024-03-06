<?php

require_once "../Atividade/models/aluno.php";
class ListaAlunos{
    public $listaAlunos = [];
    public function __construct(){
        $this->listaAlunos[] = new Aluno('Luiz','45','Engenharia De Software');
        $this->listaAlunos[] = new Aluno('Ives','24','Engenharia Elétrica');
        
        if(!isset($_SESSION['alunos'])){
            $_SESSION['alunos'] = [];
        }
    }
    public function cadastrarAluno(Aluno $aluno){
        $_SESSION['alunos'][] = $aluno;
        $this->listaAlunos = $aluno;
    }
    public function listarAluno(){
        return $_SESSION['alunos'];
    }
}
