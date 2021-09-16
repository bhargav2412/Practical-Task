$(document).on("click", "#btn_enter_city", function () {
    $('form[id="validate_form"]').validate({
        errorClass: 'errors',
        rules: {
            "city": {
                required: true
            },
        },
        messages: {
            "city": 'Please enter city name',
        },
        submitHandler: function () {
            $.ajax({
                url: 'user/weather-details',
                type: 'post',
                data: $('#validate_form').serialize(),
                success: function (response) {
                    var weatherResponse = JSON.parse(response);
                    if (weatherResponse.code == 200) {
                        $("#err_divId").hide();
                        $("#img_divId").html('<img src="http://openweathermap.org/img/wn/' + weatherResponse.data.weather[0]['icon'] + '@4x.png"/>');
                        $("#temp_spanId").text(Math.round(weatherResponse.data.main.temp - 273.15) + '°');
                        $("#weatherCondition_divId").html(weatherResponse.data.weather[0]['main']);
                        $("#place_divId").html(weatherResponse.data.name);
                        $("#wind_divId").html(weatherResponse.data.wind.speed + " M/H");
                        $("#main_divId").show();
                    } else {
                        $("#main_divId").hide();
                        $("#err_divId").html("<span>" + weatherResponse.message + "</span>")
                        $("#err_divId").show();
                    }
                },
                error: function () {
                    console.log('internal server error');
                }
            });
        }
    });
});