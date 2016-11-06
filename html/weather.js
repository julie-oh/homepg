(function() {
  $(function() {
    // 날씨
    $.ajax({
      url: "http://api.openweathermap.org/data/2.5/weather?q=Seoul&appid=1fb9f83dc1c028afb491baa04f84cb71",
      type: "GET",
      error: function (jqXHR, errorStatus, result) {
        alert("날씨 정보를 가져오는데 실패했습니다");
      },
      success: function (result, textStatus, jqXHR) {
        // 상태
        $("#weather_main").html(result.weather[0].main);
        // 온도
        $("#weather_temp").html((result.main.temp - 273.0).toPrecision(3));
        // 습도
        $("#weather_humidity").html(result.main.humidity);
      }
    });
  })
})();
