<section class="contet">
	<div>
<script type="text/javascript">

timeend= new Date(2020,9,1);

function time() {
	today = new Date();
	today = Math.floor((timeend-today)/1000);
	tsec=today%60; today=Math.floor(today/60); if(tsec<10)tsec='0'+tsec;
	tmin=today%60; today=Math.floor(today/60); if(tmin<10)tmin='0'+tmin;
	thour=today%24; today=Math.floor(today/24);
	timestr=today +" дней "+ thour+" часов "+tmin+" минут "+tsec+" секунд";
	document.getElementById('t').innerHTML=timestr;
	window.setTimeout("time()",1000);
}
</script>
<body onload="time()">
	<h1>Обратный отсчет времени</h1>
	<p>До открытия нового зоопарка осталось <span id="t" style="font-size:20px"></span>
	<button id="myBtn">Подробнее</button>
</p>

<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Новый зоопарк</h2>
    </div>
    <div class="modal-body">
      <p>Открытие нового зоопарка в городе N 1.10.2020!</p>
      <p>Мы находим по адресу: улица Красноармейская, дом 5, строение 3, вход через тц Орел!</p>
    </div>
    <div class="modal-footer">
      <h3>Связь с нами: 88005555555</h3>
    </div>
  </div>
 <script src="modalwindow.js"></script>
</div>
	</div>
</section>