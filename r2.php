<?php
	session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "congtyxangdau";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
 
}
$iconUrls = [
	1 => 'https://toplist.vn/images/800px/cong-ty-xang-dau-uy-tin-nhat-viet-nam-115083.jpg',
	2 => 'https://iweb.tatthanh.com.vn/pic/3/blog/images/image(2765).png',
	3 => 'data:image/png;base64,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',
	4 => 'http://xangdaudaihung.com//Uploads/images/tin%20tuc/logo-xang-dau-lon.png'
];
$query = "SELECT c.qh_ten, COUNT(*) AS sl_tram 
FROM trambanle a
INNER JOIN phuongxa b ON a.px_ma = b.px_ma
INNER JOIN quanhuyen c ON b.qh_ma = c.qh_ma
WHERE a.ct_ma = 3
GROUP BY c.qh_ten
UNION
SELECT c.qh_ten, 0 AS sl_tram 
FROM quanhuyen c
WHERE c.qh_ma NOT IN (
    SELECT b.qh_ma 
    FROM trambanle a 
    INNER JOIN phuongxa b ON a.px_ma = b.px_ma
    INNER JOIN quanhuyen c ON b.qh_ma = c.qh_ma 
    WHERE a.ct_ma = 3
)
ORDER BY qh_ten ASC;
";

// Execute query and get results
$res = mysqli_query($conn, $query);

// Create an array to store the data for the chart
$rows = array();
$table = array();
$table['cols'] = array(
array('label' => 'District', 'type' => 'string'),
array('label' => 'Number of Petrol Stations', 'type' => 'number'),
);

// Loop through the query results and add the data to the array
while($row = mysqli_fetch_array($res)) {
$sub_array = array();
$sub_array[] = array('v' => $row["qh_ten"]);
$sub_array[] = array('v' => (int) $row["sl_tram"]);
$rows[] = array('c' => $sub_array);
}

// Encode the array in JSON format
$table['rows'] = $rows;
$jsonTable = json_encode($table);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/leaflet-search.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- <link rel="stylesheet" href="css/style2.css" /> -->
</head>

<body>
<style>#left{
    position: absolute;
    left: 0px;
    width: 22%;
    height: 100%;
    border: 1px solid #343434;
    
    ;
}
#map{
    position: absolute;
    right: 5px;
    width: 78%;
    height: 100%;
    border: 1px solid #343434;
 }
.dangxuat {
  position: absolute;
  bottom: 8px;
  left: 14px;
  font-size: 18px;
  width: 90%;
 
}</style>

      
		
      
      
  <div id="left">


  <?php  
		
      if (isset($_SESSION['user'])){ 
        $user= $_SESSION['user'];
        ?> <h3 style="color: #4CAF50;"> <?php echo $user['ct_ten'] ?> </h3>

   <?php } ?>
            <h3 style="color: #4CAF50;">  Quản lý trạm xăng</h3>
         
        <ul class="nav flex-column">
        <li class="nav-item">
    <a style="color:DodgerBlue" class="nav-link" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false">
    <b>Quản lý trạm bán lẻ</b>   </a>
  
  <div class="collapse" id="navbarToggleExternalContent">
    <div>
    <a style="color:red; font-size:90%" class="nav-link" href="add.php"><i class="fas fa-chevron-right"></i> Thêm trạm bán lẻ </a>
    <a style="color:red;font-size:90%" class="nav-link" href="sua.php"><i class="fas fa-chevron-right"></i> Sửa trạm bán lẻ </a>
    </div>
  </div>
  </li>
  <li class="nav-item">
    <a style="color:DodgerBlue; " class="nav-link" href="hienthi.php"><b>Lọc trạm xăng</b> </a>
  </li>
  

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <div id="column_chart" style="top:'0';right:'0';bottom:'0';left:'0'"></div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <li class="nav-item">
    <a style="color:DodgerBlue" class="nav-link" href="char2.php"><b>Thống kê trạm xăng</b> </a>
  </li>
  
  
  <li class="nav-item">
    <a style="color:DodgerBlue" class="nav-link" href="huyen.php"><b>Thống kê trạm xăng</b> </a>
  </li>
  <li class="nav-item">
    <a style="color:DodgerBlue" class="nav-link" data-toggle="collapse" data-target="#navbarToggleExternal" aria-controls="navbarToggleExternalContent" aria-expanded="false">
    <b>Hồ sơ</b>   </a>
  
  <div class="collapse" id="navbarToggleExternal">
  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  </li>
  
</ul>
             <!-- Button trigger modal -->

            <button type="button" onclick="thongbao()" class="btn btn-danger dangxuat">Đăng Xuất</button>
        </div>
<div id="map"></div>



<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
<script src="js/leaflet-search.js"></script>

<script>

	//sample data values for populate map
	var data = [
		<?php $sql = "SELECT *  from trambanle";
	$result = $conn->query($sql);
	while($row = $result->fetch_array()) {

		$iconUrl = isset($iconUrls[$row['ct_ma']]) ? $iconUrls[$row['ct_ma']] : 'https://example.com/default.png';

		?>
		{"loc":[<?php echo $row['t_lat'] ?>,<?php echo $row['t_long'] ?>], "title":"<?php echo $row['t_ten'] ?>", "icon":"<?php echo $iconUrl ?>"},
		<?php
	  }
?>	  
	];

	var map = L.map('map').setView([10.0279603, 105.7664918], 15);
var layer = new L.TileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
  maxZoom: 20,
  subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
map.addLayer(layer);
// Define icon URLs for different location IDs



	// var map = new L.Map('map', {zoom: 9, center: new L.latLng(data[0].loc) });	//set center from first location

	// map.addLayer(new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer

	 var markersLayer = new L.LayerGroup();	//layer contain searched elements
	 map.addLayer(markersLayer);
	
	function customTip(text,val) {
		return '<a href="#">'+text+'<em style="background:'+text+'; width:14px;height:14px;float:right"></em></a>';
	}

	// Add search control to the map
var searchControl = new L.Control.Search({
  layer: markersLayer,
  buildTip: customTip,
  autoType: false,
  zoom: 18,
  markerLocation: true
}).addTo(map);

// Populate map with markers from sample data
for (i in data) {
  var title = data[i].title,  //value searched
    loc = data[i].loc,       //position found
    iconUrl = data[i].icon,  // icon URL for this location
    icon = new L.Icon({
      iconUrl: iconUrl,
      iconSize: [30, 30]     // Adjust as needed
    }),
    marker = new L.Marker(new L.latLng(loc), {title: title, icon: icon});
  
  marker.bindPopup(title);
  
  // Add marker to the markersLayer
  markersLayer.addLayer(marker);
  
  // Add a listener to the search control to open the popup when a result is clicked
  searchControl.on('search:locationfound', function(e) {
    if (e.layer === marker) {
      marker.openPopup();
    }
  });
}



</script>

<script type="text/javascript"> 
    function thongbao(){
      Swal.fire({
  //title: 'Bạn chưa đăng nhập',
  text: "Bạn có muốn đăng xuất?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Huỷ ',
  confirmButtonText: 'Đăng Xuất'
}).then((result) => {
  if (result.isConfirmed) {
    window.location="logout.php";
  }
})
    }


   

</script>
<script>
    // Load the visualization library and set a callback
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    
    function drawChart() {
        
        // Create the data table from the JSON data
        var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
<?php $q = "SELECT * FROM congtydaumoi where ct_ma = 3 ";
$res = mysqli_query( $conn, $q );

$r = mysqli_fetch_array($res) ?> 
        // Set chart options
        var options = {
            title: 'Số lượng trạm xăng của công ty <?php echo $r['ct_ten'] ?>',
            legend: { position: 'none' },
            vAxis: {
    format: '0'
  },
  colors: ['#76A7FA']
  
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
        chart.draw(data, options);
        $('#myModal').on('shown.bs.modal', function () {
  chart.render();
});
    }

   
</script>
<script type="text/javascript" src="/labs-common.js"></script>

</body>
</html>
