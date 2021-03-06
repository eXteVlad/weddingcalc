<?php
    session_start();


function getNumWeather($amDays)
{

    $city = "Astrakhan"; // город. Можно и по-русски написать, например: Брянск
    $mode = "json"; // в каком виде мы получим данные
    $units = "metric"; // Единицы измерения. metric или imperial
    $lang = "ru"; // язык
    $countDay = 7; // количество дней. Максимум 14 дней

// формируем урл для запроса
    $url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=$city&mode=$mode&units=$units&cnt=$countDay&lang=$lang&APPID=a8527f242d3645e8d9d74a4660bf8b40";
// делаем запрос к апи
    $data = @file_get_contents($url);
// если получили данные
    if($data){
        // декодируем полученные данные
        $dataJson = json_decode($data);
        // получаем только нужные данные
        $arrayDays = $dataJson->list;
        // выводим данные
        $i=0;
        $res = 0;
        echo $amDays;
        foreach($arrayDays as $oneDay)
        {

            if($i==$amDays)
            {
                $res = $oneDay->temp->day;
                //echo "Погода: " . $oneDay->weather[0]->description . "<br/>";
            }
            $i = $i + 1;
        }
        return $res;
    }
    else{
        //echo "Сервер не доступен!";
        return "Error";
    }
}
    if(!isset($_SESSION['login']))
    {
        header('location:notlogged.php');
        exit;
    }

    $connect = mysqli_connect("localhost", "root", "", "WeddingBD");
    if ($connect->connect_error)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
$login = $_SESSION['login'];
$sql = "SELECT datediff(marriage_date,sysdate()) a FROM users WHERE login = '$login'";
$result = mysqli_query($connect, $sql);

$m_day = "";

    while($row = $result->fetch_assoc()) {
        $m_day = $row["a"];
    }

$celcious = getNumWeather($m_day)."\xC2\xB0C"

?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="ru-RU">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2015.2.0.352"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "museconfig.js", "jquery.musemenu.js", "jquery.watch.js", "require.js", "index.css"], "outOfDate":[]};
</script>
  
  <title>Главная</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=3916556066"/>
  <link rel="stylesheet" type="text/css" href="css/master_______-a.css?crc=307027645"/>
  <link rel="stylesheet" type="text/css" href="../css/index.css?crc=3996516172" id="pagesheet"/>
  <!-- JS includes -->
  <!--[if lt IE 9]>
  <script src="scripts/html5shiv.js?crc=4241844378" type="text/javascript"></script>
  <![endif]-->
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width colelem" id="u455-bw">
     <div id="u455"><!-- column -->
      <div class="clearfix" id="u455_align_to_page">
       <div class="clearfix colelem" id="pu456-4"><!-- group -->
        <a class="nonblock nontext MuseLinkActive clearfix grpelem" id="u456-4" href="index.php"><!-- content --><p>Wedding Calculator</p></a>
        <div class="clearfix grpelem" id="pu618-4"><!-- column -->
         <div class="clearfix colelem" id="u618-4"><!-- content -->
             <p><?php echo $_SESSION['login'] ?></p>
         </div>
         <a class="nonblock nontext colelem" id="u621" href="exit.php"><!-- simple frame --></a>
        </div>
       </div>
       <div class="clearfix colelem" id="u457-4"><!-- content -->
        <p>контролируй свою свадьбу</p>
           <?php
           echo "Дней до свадьбы : ".$m_day;
           ?>
       </div>
       <div class="clearfix colelem" id="u458"><!-- group -->
        <nav class="MenuBar clearfix grpelem" id="menuu459"><!-- horizontal box -->
         <div class="MenuItemContainer clearfix grpelem" id="u467"><!-- vertical box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu MuseMenuActive transition clearfix colelem" id="u468" href="index.php"><!-- horizontal box --><div class="MenuItemLabel NoWrap transition clearfix grpelem" id="u471-4"><!-- content --><p>Главная</p></div></a>
         </div>
         <div class="MenuItemContainer clearfix grpelem" id="u474"><!-- vertical box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu transition clearfix colelem" id="u477" href="analysis.php"><!-- horizontal box --><div class="MenuItemLabel NoWrap transition clearfix grpelem" id="u478-4"><!-- content --><p>Анализ</p></div></a>
         </div>
         <div class="MenuItemContainer clearfix grpelem" id="u488"><!-- vertical box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu transition clearfix colelem" id="u491" href="guests.php"><!-- horizontal box --><div class="MenuItemLabel NoWrap transition clearfix grpelem" id="u494-4"><!-- content --><p>Гости</p></div></a>
         </div>
         <div class="MenuItemContainer clearfix grpelem" id="u481"><!-- vertical box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu transition clearfix colelem" id="u482" href="pngGen.php"><!-- horizontal box --><div class="MenuItemLabel NoWrap transition clearfix grpelem" id="u485-4"><!-- content --><p>Приглашение</p></div></a>
         </div>
         <div class="MenuItemContainer clearfix grpelem" id="u460"><!-- vertical box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu transition clearfix colelem" id="u463" href="#"><!-- horizontal box --><div class="MenuItemLabel NoWrap transition clearfix grpelem" id="u466-4"><!-- content --><p><?php echo $celcious; ?></p></div></a>
         </div>
        </nav>
       </div>
      </div>
     </div>
    </div>
    <div class="shadow clearfix colelem" id="u454"><!-- column -->
        <center>
            <!--<p>Дата свадьбы: <?php echo $_SESSION['date'] ?></p>-->
        </center>
     <div class="clearfix colelem" id="u601-6"><!-- content -->
      <!--<p>Ваши расходы:<input id="cost" type="text" size="6" readonly> руб.</p>-->
     </div>
     <div class="shadow clearfix colelem" id="u602"><!-- column -->
      <div class="clearfix colelem" id="u603-4"><!-- content -->
       <p>Невеста</p>
      </div>
      <div class="clearfix colelem" id="u604-9"><!-- content -->
       <ul class="list0 nls-None" id="n604-7">
        <p><label>Свадебное платье</label> <input onfocus="this.select (); fN ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Обручальное кольцо</label> <input onfocus="this.select (); fN ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Ювелирные украшения</label> <input onfocus="this.select (); fN ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Туфли</label> <input onfocus="this.select (); fN ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Аксессуары</label> <input onfocus="this.select (); fN ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
       </ul>
      </div>
         <div class="clearfix colelem" id="n603-4"><!-- content -->
         <p>Затраты на невесту: <input id="nevesta" type="text" size="6" readonly value="0"> руб.</p>
         </div>
     </div>
        <div class="shadow clearfix colelem" id="u602"><!-- column -->
      <div class="clearfix colelem" id="u603-4"><!-- content -->
       <p>Жених</p>
      </div>
      <div class="clearfix colelem" id="u604-9"><!-- content -->
       <ul class="list0 nls-None" id="z604-7">
        <p><label>Костюм</label> <input onfocus="this.select (); fZ ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Обручальное кольцо</label> <input onfocus="this.select (); fZ ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Носки</label> <input onfocus="this.select (); fZ ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Ботинки</label> <input onfocus="this.select (); fZ ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Аксессуары</label> <input onfocus="this.select (); fZ ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
       </ul>
      </div>
        <div class="clearfix colelem" id="n603-4"><!-- content -->
         <p>Затраты на жениха: <input id="zhenih" type="text" size="6" readonly> руб.</p>
         </div>
     </div>
        <div class="shadow clearfix colelem" id="u602"><!-- column -->
      <div class="clearfix colelem" id="u603-4"><!-- content -->
       <p>Услуги</p>
      </div>
      <div class="clearfix colelem" id="u604-9"><!-- content -->
       <ul class="list0 nls-None" id="u604-7">
        <p><label>Ресторан</label> <input input onfocus="this.select (); fU ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Свадебный торт</label> <input input onfocus="this.select (); fU ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Оператор</label> <input input onfocus="this.select (); fU ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
        <p><label>Фотограф</label> <input input onfocus="this.select (); fU ()" onblur="fS ()" type="text" size="5" value="0"> руб.</p>
       </ul>
      </div>
         <div class="clearfix colelem" id="n603-4"><!-- content -->
         <p>Затраты на услуги: <input id="uslugi" type="text" size="6" readonly> руб.</p>
         </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="782" data-content-above-spacer="841" data-content-below-spacer="179"></div>
    <div class="browser_width colelem" id="u450-bw">
     <div id="u450"><!-- group -->
      <div class="clearfix" id="u450_align_to_page">
       <div class="clearfix grpelem" id="u451"><!-- group -->
        <div class="clearfix grpelem" id="u452-4"><!-- content -->
         <p>Wedding Calculator</p>
        </div>
        <div class="clearfix grpelem" id="u453-4"><!-- content -->
         <p>IT-31 TOP (c) 2016</p>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/exit_button_onmouse.jpg?crc=4081403688" alt=""/>
   <img class="preload" src="images/exit_button_onclick.jpg?crc=3912077649" alt=""/>
  </div>
  <!-- Other scripts -->
  
  <script type="text/javascript">
   window.Muse.assets.check=function(){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var a={},b=function(){$('link[type="text/css"]').each(function(){var b=($(this).attr("href")||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);b&&b[1]&&b[2]&&(a[b[1]]=b[2])})},c=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),16);return 0},d=function(d){if("undefined"!==
typeof $){b();$("body").append('<div class="version" style="display:none; width:1px; height:1px;"></div>');for(var f=$(".version"),j=0;j<Muse.assets.required.length;){var h=Muse.assets.required[j],i=h.match(/([\w\-\.]+)\.(\w+)$/),k=i&&i[1]?i[1]:null,i=i&&i[2]?i[2]:null;switch(i.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.addClass(k);var i=c(f.css("color")),l=c(f.css("background-color"));i!=0||l!=0?(Muse.assets.required.splice(j,1),"undefined"!=typeof a[h]&&(i!=
a[h]>>>24||l!=(a[h]&16777215))&&Muse.assets.outOfDate.push(h)):j++;f.removeClass(k);break;case "js":k.match(/^jquery-[\d\.]+/gi)&&typeof $!="undefined"?Muse.assets.required.splice(j,1):j++;break;default:throw Error("Unsupported file type: "+i);}}f.remove()}if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Некоторые файлы на сервере могут отсутствовать или быть некорректными. Очистите кэш-память браузера и повторите попытку. Если проблему не удается устранить, свяжитесь с разработчиками сайта.",d&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),d&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),
alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){d(!0)},5E3):d()}};
var muse_init=function(){require.config({baseUrl:""});require(["museutils","whatinput","jquery.musemenu","jquery.watch"],function(){$(document).ready(function(){try{
window.Muse.assets.check();/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.initWidget('.MenuBar', ['#bp_infinity'], function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(a){if(a&&"function"==typeof a.notify?a.notify():Muse.Assert.fail("Error calling selector function: "+a),false)throw a;}})})};
</script>
<script> 
function fN () {//для целых чисел (в т.ч. < 0) 
for (var t = document.getElementById 
('n604-7').getElementsByTagName ('input'), 
k = j = s = 0; j < t.length; j++) 
if (t [j].value.length && !t [j].value. 
replace (/^\-?\d+/g, '').length) 
{s += t [j].value * 1; k++} 
document.getElementById ('nevesta').value = 
(k == t.length) ? s : '???'; TIM = setTimeout (fN, 10)} 
function fS () {clearTimeout (TIM)} 

function fZ () {//для целых чисел (в т.ч. < 0) 
for (var t = document.getElementById 
('z604-7').getElementsByTagName ('input'), 
k = j = s = 0; j < t.length; j++) 
if (t [j].value.length && !t [j].value. 
replace (/^\-?\d+/g, '').length) 
{s += t [j].value * 1; k++} 
document.getElementById ('zhenih').value = 
(k == t.length) ? s : '???'; TIM = setTimeout (fZ, 10)} 
function fS () {clearTimeout (TIM)} 

function fU () {//для целых чисел (в т.ч. < 0) 
for (var t = document.getElementById 
('u604-7').getElementsByTagName ('input'), 
k = j = s = 0; j < t.length; j++) 
if (t [j].value.length && !t [j].value. 
replace (/^\-?\d+/g, '').length) 
{s += t [j].value * 1; k++} 
document.getElementById ('uslugi').value = 
(k == t.length) ? s : '???'; TIM = setTimeout (fU, 10)} 
function fS () {clearTimeout (TIM)}

</script> 
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=228336483" type="text/javascript" async data-main="scripts/museconfig.js?crc=483509463" onload="requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
