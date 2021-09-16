<?php

use yii\web\View;

$this->title = 'WeatherApp';
?>
<div class="site-index">

   

    <div class="body-content">
        <div class="form">
            <form style="width:100%;" method="post" id="validate_form">
                <input type="text" class="text" placeholder="Enter city name" name="city" />
                <input type="submit" value="Submit" class="submit" name="submit" id="btn_enter_city" />
            </form>
        </div>

        <div id="err_divId" style="display: none;"></div>
        <article class="widget" style="display: none;" id="main_divId">
            <div class="weatherIcon" id="img_divId">

            </div>
            <div class="weatherInfo">
                <div class="temperature">
                    <span id="temp_spanId"></span>
                </div>
                <div class="description mr45">
                    <div class="weatherCondition" id="weatherCondition_divId"></div>
                    <div class="place" id="place_divId"></div>
                </div>
                <div class="description">
                    <div class="weatherCondition">Wind</div>
                    <div class="place" id="wind_divId"></div>
                </div>
            </div>
            <div class="date">
                <?php echo date('d M') ?>
            </div>
        </article>
    </div>
</div>
<?php
$this->registerJsFile('https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/custom.js', ['depends' => 'yii\web\JqueryAsset', 'position' => View::POS_END]);
?>