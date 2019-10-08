<?php
include ("conexion.php");
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/fontawesome-all.css">
  <script src="js/fontawesome-all.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abel|Dosis|Quicksand|Rajdhani|Raleway" rel="stylesheet">


  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
<style>
    .container{
        margin: 0 auto; 
        width: 1024px;
        height: 720px;
    }
#map {
        height: 500px;
        width: 100%;
       }
    body {
        background: #f5f5f5;
        font-family: arial;
        font-family: 'Dosis', sans-serif;
        color: gray;

    }
    
    
    .row {
        width: 100%;
        display: flex;
        flex-flow: wrap;
        justify-content:space-between;
        
    }
    .header {
        width: calc(100% - 20px);
         background: white;
        height: 50px;
        margin: 0px;
        margin-bottom: 20px;
        padding: 10px;
    }
    h1 {
        font-size: 1em;
        font-weight: 100;
        padding-left: 10px;
    }
    h3{
        width: 100%;
        margin-bottom: 0;
    }
    .tittle-app{
     display: flex;
    flex-wrap: nowrap;
        justify-content: space-between;
    }
    .right-column {
        margin: 10px;
    }
    .article{
        display: flex;
        flex-wrap: wrap;
    }
    .article figure {
        width: 20%;
        height: auto;
    }
    .article figure img{
        margin-top: 30px;
        width: 100%;
    }
    .article h4{
        width: 40%;
    }
    .article .fecha{
        font-size: 1.2em;
    }
    .article .desc-art{
        width: 65%;
        padding: 10px;
    }
    .article .titulo-art{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .article a{
        width: 20%;
        padding: 5px 10px;
    }
    .article 
    .text-v1 {
        font-size: 1.3em;
        color: gray;
    }
    .text-v2 {
        font-size: 1em;
    }
    .text-v3 {
        font-size: 3em;
    }
    .num-v1{
        font-size: 3em;
    }
        .state{
        width: 28%;
        padding: 2%;
        background: white;
        text-align: center;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .cell-1{
       background: white;
    }
    .cell-1 span{
        width: 50%;
        height: 25px;
    }
    .cell-2{
        background: #edede5;
    }
    .cell-3 {
        padding-top: 40px;
    }
    .cell-3 a{
        padding-top: 10px;
        width: 50%;
        height: 30px;
        padding-left: 20px;
    }


    .flex-row{
        display: flex;
        flex-wrap: wrap;
        
        
    }

    footer{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        margin-top: 30px;
        height: 100px;
        padding-top: 50px;
    }
    
    /* OTROS */
    .shadow{
        background: white;
        -webkit-box-shadow: 0px 0px 15px 1px rgba(179,179,179,0.3);
        -moz-box-shadow: 0px 0px 15px 1px rgba(179,179,179,0.3);
        box-shadow: 0px 0px 15px 1px rgba(179,179,179,0.3);
    }
    .x-line{
        background: none;
        width: 70%;
        border-color: #ffffff3b;
    }
    .num-registros{
        font-size: 6em;
        width: 100%;
        border: 1px solid #5cd0d6;
        border-radius: 50%;
        margin-top: 10px;
    }
    .btn-1{
        text-align: left;
        background: #5cd0d6;
        color: white;
        border-radius: 20px;
        
    }
    .a-btn-v1{
        margin-left: 10px;
    }
    a{
        
        text-decoration: none;
    }
    
    
</style>
                       <?php
    $sql="SELECT * FROM `registro` inner join tipo WHERE registro.id_tipo = tipo.id_tipo";
    
        $rs=ejecutar($sql);
        $maps = ejecutar($sql);
        $articles = ejecutar($sql);
        $filas = mysqli_num_rows($rs);
        $columnas=mysqli_num_fields($rs);  
        ?>
</head>

<body>
    <div class="container">
<div class="row header tittle-app shadow ">
<?php include("twitter-api.php"); 
    require "twitteroauth/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;
    
$connection = new TwitterOAuth("LddoRGfQ5sk0WXvljtLvImIqw", "k9NgAmFqzfDnGx5n6NnlQrCk6YZi5mKGu9L1pa7DnwtuUOXorQ", "960404447120764930-43FQ9wMsSu2MTExKRKnPwZt2RTw50DW", "CtEmXe3rw9P2vALJhQdwhxjFUKO4SRZUO8Wu2aCRPKk61");
$content = $connection->get("account/verify_credentials");
$tweets = $connection->get("search/tweets", ["q" => "asalto", "count" => 20]);



//print_r($content->name);
//var_dump($tweets);
//print_r($tweets);
?>

<h1><span class="text-v1">  <i class="fas fa-user"></i> Registros</span> de inseguridad en México</h1>
    <div class="right-column"><span class="text-v1"> <i class="fab fa-facebook"></i>

    <i class="fab fa-twitter-square"></i></span></div>
</div>
<div class="row shadow">
<div class="row">

    <div class="state  cell-1"><h3><i class="fas fa-signal"></i> Estadísticas:</h3>
    <div class="flex-row">
<?php
     $suceso = (object) [
         "Asalto" => 0,
         "Carterista" => 0,
         "Automóvil" => 0,
         "Arma blanca" => 0,
     ];
    
while($datos=mysqli_fetch_array($rs)){
   foreach($suceso as $tipo => $valor) {
    
    $suceso -> $tipo = ($datos["tipo"] == $tipo) ? $suceso -> $tipo + 1 : $suceso -> $tipo;
    //echo $suceso -> $tipo;
    //echo "-----";
        } 
    } 
foreach($suceso as $tipo => $valor){ ?>
     <span class="text-v2"><?php echo $tipo ?></span> <span class="text-v1"><?php echo $suceso -> $tipo ?></span>
<?php } ?>



    </div>
        
    </div>
<div class="state">
    <div class="flex-row">
        <h3><i class="fas fa-address-book"></i> Registros</h3>
        <span class="num-v1 num-registros"><?php echo $filas ?></span>
    </div>
</div>
<div class="state cell-3">
   <a href="#" class="btn-1"> <i class="fas fa-plus"></i> <span class="a-btn-v1">Agregar caso</span></a>
    <a href="#" class="btn-1"><i class="fas fa-bell"></i> <span class="a-btn-v1">Seguimiento</span></a>
        <a href="#" class="btn-1"><i class="fas fa-user"></i> <span class="a-btn-v1">Contacto</span></a>
</div>
</div>
    <div id="map"></div>


    <script>
     
      function initMap() {
            var locations = [];
            var iconBase = 'img/security-icons/';
            var icons = {
              s_knife: {
                icon: iconBase + 's_knife.png'
              },
              s_gun: {
                icon: iconBase + 's_gun.png'
              },
              s_mask: {
                icon: iconBase + 's_mask.png'
              },    
              s_car: {
                icon: iconBase + 's_car.png'
              }
            };
console.log (icons.s_gun);
            <?php while($datos=mysqli_fetch_array($maps)){ ?>
            <?php $nombre = str_replace(" ","", ($datos["suceso"])); ?>
	        var <?php echo ($nombre); ?> = {
		info: '<strong><?php echo($datos["suceso"]) ?></strong><br>\
					<?php echo($datos["desc"]) ?><br>\
					<a href=" <?php echo($datos["ubicacion"]) ?>">Ver en google maps</a>',
        <?php $latitud_array = explode("@", $datos["ubicacion"]) ?>
        <?php $latitud_string = explode(",", $latitud_array[1]) ?>
        <?php $latitud  = $latitud_string[0] ?>
        <?php $longitud  = $latitud_string[1] ?>
		lat: <?php echo($latitud)  ?>,
		long: <?php echo($longitud)  ?>,
        type: "<?php echo($datos['icono']) ?>"
	}; 
locations.push([ <?php echo $nombre  ?>.info, <?php echo $nombre  ?>.lat, <?php echo $nombre  ?>.long, <?php echo $nombre  ?>.type , <?php echo $datos["id_registro"]  ?>])

        <?php } ?>
	


	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 13,
		center: new google.maps.LatLng(19.401285, -99.159538),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow({});

	var marker, i;

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon: icons[locations[i][3]].icon,
			map: map
		});
         console.log(locations[i][3]);

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}

      }
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyK4VHegIDWQIeSXV3K2-AhHAwg2ZZ1sA&callback=initMap">
    </script>
    <div class="row">
        <?php 
        while($datos=mysqli_fetch_array($articles)){
  
        ?>
        <div class="article">
            <figure class="icono-art">
            <img src="img/security-icons/<?php echo($datos["icono"]) ?>_v2.png">
            </figure>
            <div class="desc-art">
            <h4 class="titulo-art"><span><i class="far fa-clone"></i> Titulo</span><span class="fecha"><i class="far fa-calendar-alt"></i> 10-10-1000</span></h4>
            
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu vulputate sem, et dictum magna. Mauris convallis laoreet lacus, eu pretium dolor feugiat eu. Quisque tempus cursus fermentum. Nullam porta ornare ultrices. Ut laoreet venenatis elit sed ullamcorper. Nam ultricies nulla vitae erat fermentum, non egestas odio varius. Nulla facilisi.</p>

                <p>Praesent congue velit purus, at volutpat magna suscipit vehicula. Pellentesque vel ipsum id ante vehicula tempor ac vitae nisi. Fusce placerat ac lorem a scelerisque. Fusce id condimentum felis. Nulla sed arcu libero. Proin sed feugiat urna. Donec mattis venenatis metus in elementum. Mauris pretium placerat velit. Etiam quis enim vitae ex laoreet maximus sed sed dui. Nunc vestibulum viverra ipsum, eget hendrerit mi lobortis sit amet. Ut sit amet eleifend sem. Vestibulum id diam volutpat, laoreet magna sit amet, euismod elit. Fusce bibendum tellus tortor, non lobortis lectus lacinia tincidunt.</p>
                 <a href="#" class="btn-1"> <i class="fas fa-plus"></i> <span class="">Leer más</span></a>
            </div>
        </div>
        <hr class="x-line">
        <?php } ?>
    </div>
</div>    
        
        
<footer class="shadow">
Este mapa es para cuestiones informativas, todos los datos son extraidos a partir de twitter o de uns ervidor particular.
</footer>    
</div>
    
</body>
</html>