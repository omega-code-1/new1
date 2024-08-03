<?php

class pageLogin
{
    private $baseURLAPI = "http://localhost/v1_steak/controller";
    function aksesLoginPelanggan()
    {
        // if (isset($_SESSION['apikey'])) {
        if (isset($_SESSION['Token'])) {
            header("Location: reservasi.php");
        }
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        if ($username != '' && $password != '') {
            try {
                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => $this->baseURLAPI . "/user.php?username=$username&password=$password",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                    )
                );
                $response = curl_exec($curl);
                // var_dump($response);
                curl_close($curl);
                $responseData = json_decode($response);
                // var_dump($responseData->data->rows_returned);
                if (isset($responseData->data->rows_returned) && $responseData->data->rows_returned === 1) {
                    // $apikey = $responseData->data->user[0]->apikey;
                    // $_SESSION['apikey'] = $apikey;
                    $_SESSION['Token'] = "xx123";
                    $_SESSION['username'] = $username;
                    header("Location: reservasi");
                    exit;
                } else {
                    return "Login gagal";
                }
            } catch (error $e) {
                echo $e;
            }
        } else {
            // echo "username dan password kosong";
        }
    }
}

class pageReser
{
    private $baseURLAPI = "http://localhost/v1_steak/controller/reservasi.php";
    // function getApikey()
    // {
    //     if (empty($_SESSION['apikey'])) {
    //         header("Location: login");
    //         // exit;
    //     } else {
    //         return $_SESSION['apikey'];
    //     }
    // }
    function getToken()
    {
        if (empty($_SESSION['Token'])) {
            header("Location: login");
            // exit;
        } else {
            return $_SESSION['Token'];
        }
    }

    // function getJSONData($apikey)
    function getJSONData($token)
    {
        try {
            $curl = curl_init();
            // curl_setopt_array($curl, array(
            //         CURLOPT_URL => $this->baseURLAPI . "?userid=$userid",
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => '',
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 0,
            //         CURLOPT_FOLLOWLOCATION => true,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => 'GET',
            //     )
            // );
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => $this->baseURLAPI,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization:' . $token
                    ),
                )
            );
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            return $response;
        } catch (error $e) {
            return $e;
        }
    }

    // function createNewReservation($apikey, $a, $b, $c, $d)
    function createNewReservation($token, $a, $b, $c, $d)
    {
        try {
            $postfields = array(
                "tanggal_reservasi" => $a,
                "nomor_meja" => $b,
                "jam_mulai" => $c,
                "jam_selesai" => $d
            );
            $curl = curl_init();
            // curl_setopt_array(
            //     $curl,
            //     array(
            //         CURLOPT_URL => $this->baseURLAPI . "?apikey=$apikey",
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => '',
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 0,
            //         CURLOPT_FOLLOWLOCATION => true,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => 'POST',
            //         CURLOPT_POSTFIELDS => json_encode($postfields),
            //         CURLOPT_HTTPHEADER => array(
            //             'Content-Type: application/json'
            //         ),
            //     )
            // );
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->baseURLAPI,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postfields),
                CURLOPT_HTTPHEADER => array(
                    'Authorization:' . $token,
                    'Content-Type: application/json'
                ),
            )
            );
            $response = curl_exec($curl);
            curl_close($curl);
            $RD = json_decode($response);
            if ($RD->statusCode == 400) {
                return $RD->messages[0];
            }
            return $RD->messages[0][0];
        } catch (error $e) {
            echo $e;
        }
    }

    // function editReservasiOK($apikey, $a, $b, $c, $d, $e)
    function editReservasiOK($token, $a, $b, $c, $d, $e)
    {
        try {
            $postfields2 = array(
                "reservasi_id" => $a,
                "tanggal_reservasi" => $b,
                "nomor_meja" => $c,
                "jam_mulai" => $d,
                "jam_selesai" => $e
            );

            $curl = curl_init();
            // curl_setopt_array(
            //     $curl,
            //     array(
            //         CURLOPT_URL => $this->baseURLAPI . "?apikey=$apikey",
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => '',
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 0,
            //         CURLOPT_FOLLOWLOCATION => true,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => 'PATCH',
            //         CURLOPT_POSTFIELDS => json_encode($postfields2),
            //         CURLOPT_HTTPHEADER => array(
            //             'Content-Type: application/json'
            //         ),
            //     )
            // );
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->baseURLAPI,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PATCH',
                CURLOPT_POSTFIELDS => json_encode($postfields2),
                CURLOPT_HTTPHEADER => array(
                    'Authorization:' . $token,
                    'Content-Type: application/json'
                ),
            )
            );
            $response = curl_exec($curl);
            curl_close($curl);
            $RD = json_decode($response);
            $RD = $RD->messages[0];
            return $RD;
        } catch (error $e) {
            echo $e;
        }
    }

    // function hapusReservasiOK($apikey, $a)
    function hapusReservasiOK($token, $a)
    {
        try {
            $curl = curl_init();
            // curl_setopt_array(
            //     $curl,
            //     array(
            //         CURLOPT_URL => $this->baseURLAPI . "?userid=$userid&reservasi_id=$a",
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => '',
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 0,
            //         CURLOPT_FOLLOWLOCATION => true,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => 'DELETE',
            //     )
            // );
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->baseURLAPI. "?reservasi_id=$a",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE',
                CURLOPT_HTTPHEADER => array(
                  'Authorization: '.$token
                ),
              ));
            $response = curl_exec($curl);
            curl_close($curl);
            $RD = json_decode($response);
            $RD = $RD->messages[0][0];
            return $RD;
        } catch (error $e) {
            echo $e;
        }
    }
}
?>