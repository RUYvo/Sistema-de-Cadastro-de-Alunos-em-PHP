<?php

require_once "../Atividade/controllers/listaAlunos.php";
require_once "../Atividade/models/aluno.php";

session_start();

class CadastrarAlunos extends ListaAlunos{
    public function cadastrarNovoAluno(){
        if($_SERVER['REQUEST_METHOD'] ==  'POST'){
            if(isset($_POST['nome']) && isset($_POST['matricula']) && isset($_POST['curso'])){
            $novoAluno = new Aluno($_POST['nome'], $_POST['matricula'], $_POST['curso']);
            $this->cadastrarAluno($novoAluno);
            }
        }
    }
}