<?php

namespace frontend\controllers;

use Exception;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    // Get weather details
    public function actionWeatherDetails()
    {
        $response = ['code' => '', 'message' => '', 'data' => ''];
            if (!empty(Yii::$app->request->post('city'))) {
                $city = Yii::$app->request->post('city');
                $key = 'b06ca8c3ba6dbbbef857b8c8341533e4';
                $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$key";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($result, true);
                if ($result['cod'] == 200) {
                    $response = ['code' => 200, 'message' => 'success', 'data' => $result];
                } else {
                    $response = ['code' => 400, 'message' => 'No result found!', 'data' => ''];
                }
            }else{
                 $response = ['code' => 400, 'message' => 'No found', 'data' => ''];
            }
        echo json_encode($response);
        exit;
    }
}
