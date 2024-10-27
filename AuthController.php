<?php

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'login':
            $email = $_POST['email'];
            $password = $_POST['password'];

            $authController = new AuthController();
            $authController->access($email, $password);
            break;
    }
}

class AuthController {
    
    public function access($email, $password) {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array('email' => $email, 'password' => $password)),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: XSRF-TOKEN=eyJpdiI6InhXUFNpbFpqTjZ6TnpCblcxc21sWHc9PSIsInZhbHVlIjoiMC9QWTQ5MHBqbDZZWXdtRk5qVE5oWjlHcEdxdDlEakd6SFVBU2RvY1NENWEyYjNiczhNcVNsRTBtenFCN1ZjNFFBWVdFVm80dkgvVDlJUXE5QVJpQW83Tko5d0FoaklxSE5hMW1ZUFVBTklVZERGdWtTRFNCQkJ0SWFxdEdMeTUiLCJtYWMiOiIxYjgxZDk5OTU1NTk2OWVhYWU2ZWI1MTk5YWQzMTZhMDJmMDRhMzUyYmI3YWIxNDk2NTI5YmVmODdjN2I0NWE2IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6ImN1MUNyRlgrampjK296bzZES29BUGc9PSIsInZhbHVlIjoiSCt0T3N4YW1zYlVZc2Jod1RVWnVqZHhIbjdQZFBXZDZhTW4wTUFZTUFJd21SSkFOd3VIeXBFY0U3Vzk1blZXekYwN0NraVU2NEIraVlreFd1OU5YRTF1Uy8zSTNHZERBOHJnUnRNK01iMW5aSVVKeGxVVEpsSnJ4NUxaeVcxd1giLCJtYWMiOiIxZDBjMTgzNTY4ZThmZDBiZTQ4ZmQ2NGU5YTk2YmM5YmY0MTA1ZmRkYTM4M2ZkY2MzZGE4NWM5NjkzNTY0YjVjIiwidGFnIjoiIn0%3D'
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        } else {
         //   echo $response; 

         header('Location: ../home.html');

        }

        curl_close($curl);
    }
}
?>