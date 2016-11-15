(function () {
  // on document ready
  $(function () {
    $.ajax({
      url: "https://openapi.naver.com/v1/search/news.xml?query=%EC%A3%BC%EC%8B%9D&display=10&start=1&sort=sim",
      type: 'GET',
      headers: {
        'X-Naver-Client-Id': 'Nc5_d1WjNf8PzHCxyCqm',
        'X-Naver-Client-Secret': 'D1arqHt0tf',
      },
      error: function (jqXHR, errorStatus, result) {
        alert("뉴스 정보 가져오기 실패");
        console.log(errorStatus);
        console.log(result);
      },
      success: function (result, textStatus, jqXHR) {
        console.log(result);
      },
    });
  });
})();
