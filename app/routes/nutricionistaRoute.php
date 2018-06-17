<?php
require "app/models/nutricionista/nutricionistaDAO.php";
require "app/models/nutricionista/nutricionistaVo.php";
require "app/models/nutricionista/nutricionistaModel.php";
require "app/class/json.php";
require "app/vendor/autoload.php";
use GuzzleHttp\Client;

class nutricionistaRoute{  

    public function login(){
        include "app/views/nutricionista/login.php";
    }

    public function signOut(){
        session_start();

        if(isset($_SESSION["email_nutricionista"])){
            session_destroy();
            header("Location: " . HOME_URI);
        }
    }

    public function signIn(){
        $nutricionistaVo = new nutricionistaVO();  
        
        try{
            if(isset($_GET["api"])){
                session_start();
                $api = $_GET["api"];
                $_SESSION['api'] = $api;
                
                // Prepara a URL de redirecionamento
                $url = '';
                if($api == 'google') {
                    $params = array(
                        "response_type" => "code",
                        "client_id" => GOOGLE_CLIENT_ID,
                        "redirect_uri" => CALLBACK_URL . "?api=google",
                        "scope" => GOOGLE_SCOPE
                    );
                    $url = GOOGLE_API_AUTH_URL . '?' . http_build_query($params);
                }

                // Rerireciona o usuário para o Servidor de Autorização
                header("Location: " . $url);
            }
            else{
                $nutricionistaModel = new nutricionistaModel();
                $nutricionistaVo->setEmail($_POST["email"]);
                $nutricionistaVo->setSenha($_POST["senha"]);
                $nutricionistaVo->setConta("nutrion");
                
                $logarModel = json_decode($nutricionistaModel->signIn($nutricionistaVo));
                
                if(strpos($logarModel->message, "sucesso") !== false){
                    session_start();
                    $_SESSION["email_nutricionista"] = $nutricionistaVo->getEmail();
                }
                echo json_encode($logarModel);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function apiCallback(){
        try{
            if(isset($_GET["code"])){
                $api = $_GET["api"];

                if($api == 'google') {

                    if(isset($_GET['code'])) {
                        $code = $_GET['code'];

                        $client  = new Client ();
                        $response = $client->request("POST", GOOGLE_API_TOKEN_URL, [
                            'verify' => false,
                            'http_errors' => false,
                            'form_params' => [
                                "code" => $code,
                                "client_id" => GOOGLE_CLIENT_ID,
                                "client_secret" => GOOGLE_CLIENT_SECRET_KEY,
                                "redirect_uri" => CALLBACK_URL . "?api=google",
                                "grant_type" => "authorization_code"            
                            ]
                        ]);

                        /*Obtem a token de acesso a partir do retorno do 
                        servidor de autorização e salva na sessão do usuário*/
                        $data = json_decode($response->getBody());
                        session_start();
                        $_SESSION['token'] = $data->access_token;

                        /*Redireciona para a página inicial que irá obter 
                        os dados do usuário a partir do Servidor de Recursos*/
                        header('Location: ' . HOME_URI . "nutricionista/signApi");
                    }
                }
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function signApi(){
        session_start();
        if (isset($_SESSION['token'])) {
            $token = $_SESSION['token'];
            
            try {
                $api = $_SESSION['api'];
                
                if ($api == 'google') {
                    // Dspara requisição para o Google para obter dados do usuário
                    $url =  GOOGLE_API_RESOURCE_URL . '?access_token=' . $token;
                    $client  = new Client ();
                    $response = $client->request ("GET", $url, [
                        'verify' => false, 
                        'http_errors' => false
                    ]);
                    switch ($response->getStatusCode()) {
                        case 200: 
                            $data = json_decode($response->getBody());
                            $nome = $data->displayName;
                            $email = $data->emails[0]->value;
                            $senha = "";
                            
                            $nutricionistaVo = new NutricionistaVo();
                            $nutricionistaVo->setNome($nome);
                            $nutricionistaVo->setEmail($email);
                            $nutricionistaVo->setSenha($senha);
                            $nutricionistaVo->setConta("google");

                            $nutricionistaModel = new nutricionistaModel();
                            $logarModel = json_decode($nutricionistaModel->signIn($nutricionistaVo));

                            if(strpos($logarModel->message, "sucesso") !== false){
                                $_SESSION["email_nutricionista"] = $nutricionistaVo->getEmail();
                                header('Location: ' . HOME_URI . "paciente/consultar");
                            }

                            break;
                    }            
                }
            }
            catch(Exception $e){
                echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
            }
        }
    }
}


?>