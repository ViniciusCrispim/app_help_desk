<?php
    //Iniciando a sessão
    session_start();
    //Variáveis de autenticação
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    //Definição de perfil
    $perfis = array( 1 => 'administrativo', 2 => 'usuario');

    //Array com usuários do sistema
    $usuarios_sistema = array( 
        array('id' => '1','email' => 'adm@teste.com.br', 'senha' => '12345', 'perfil_id' => 1),
        array('id' => '2','email' => 'user@teste.com.br', 'senha' => '12345', 'perfil_id' => 1),
        array('id' => '3','email' => 'fulano@teste.com.br', 'senha' => '12345', 'perfil_id' => 2),
        array('id' => '4','email' => 'beltrano@teste.com.br', 'senha' => '12345', 'perfil_id' => 2)
    );
    //Realiza a autenticação do usuário
    foreach ($usuarios_sistema as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }
    //Lógica de sucesso/erro no login
    if ($usuario_autenticado){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }

?>