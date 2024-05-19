$(document).ready(function(){
     
    // Функция для получения кук
    function get_cookie(cookie_name){
        var results = document.cookie.match ('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
        if (results)
            return (unescape(results[2]));
        else
            return null;
    }
    // Получаем наши куки голосания
    x = get_cookie("Golos");
     
    // Если куки не существует, то пояляется форма
    if (x != "Yes"){
        setTimeout(function () {
            $('#widjetmain').stop().animate({
                top: "0px"               
                },'slow','easeOutQuint');
            }, 1000);
    }       
}); //ready end
     
    // Закрытие формы, при клике на "Закрыть"
$('#wclose').click(function(){
    $('#widjetmain').stop().animate({
    top: "-500px"                
    },'slow','easeOutQuint');
    document.cookie = "Golos=Yes; expires=01/05/2015 00:00:00";
});
 
// При нажатии на проголосовать (ajax, закрытие, запись куки)
$('#widbtn').click(function(){
    $('#widbtn').remove();
    checked = $("input:radio:checked").val();
    $.ajax({
       type: 'POST',
    //   method: 'post',
      url: './scripts/obrab.php',
      data: ({
        'radio': checked
      }),     
      success: function(){
        document.cookie = "Golos=Yes; expires=01/05/2025 00:00:00";
      }
    });
    $('#widgetsps').html('Спасибо за ваш голос');
    setTimeout(function () {
        $('#widjetmain').stop().animate({
        top: "-300px"                
        },'slow','easeOutQuint');
    }, 1000);
   });