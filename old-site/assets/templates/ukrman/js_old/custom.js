/* Theme Name: Worthy - Free Powerful Theme by HtmlCoder
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Version:1.0.0
 * Created:November 2014
 * License: Creative Commons Attribution 3.0 License (https://creativecommons.org/licenses/by/3.0/)
 * File Description: Place here your custom scripts
 */
$(document).ready(function(){
    $("#footer-form").submit(function(){
        $.post("http://ukrman.ua/mail.php", {page: "contacts", name: $("#name2").val(), mail: $("#email2").val(), text: $("#text2").val()}, function(data){
            $(".footer-content-send").animate({"opacity" : 0}, 300);
            setTimeout(function(){
                $(".footer-content-send").html("<center><b style='padding: 0 0 15px 0; font-weight: 600;'>Повідомлення відправлено.</b><br>Ми відповімо найближчим часом.</center>");  
                $(".footer-content-send").animate({"opacity" : 1}, 300);  
            }, 500);
            
        });
        return false;
    });
    $("#footer-form2").submit(function(){
        $.post("http://ukrman.ua/mail.php", {page: "inner", mail: $("#email2").val()}, function(data){
            $("#footer-form2").animate({"opacity" : 0}, 300);
            setTimeout(function(){
                $("#footer-form2").html("<center><b style='padding: 0 0 15px 0; font-weight: 600;'>Повідомлення відправлено.</b><br>Ми відповімо найближчим часом.</center>");  
                $("#footer-form2").animate({"opacity" : 1}, 300);  
            }, 500);
            
        });
        return false;
    });
});