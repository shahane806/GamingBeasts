<html lang="en">
 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>GamingBeasts</title>
  </head>
  <?php
$audiofile = 0;
$cover = 0;
$cpyright = 0;
$disc = 0;
$search = 0;
if(isset($_GET['search']))
{
    $search = $_GET['search'];
}

if(isset($_GET['disc']))
{
    $disc = $_GET['disc'];
    //  echo "disc : ". $disc."<br>";
}

if(isset($_POST['cpyright']))
{
     $cpyright = $_POST['cpyright'];
      echo "cpyright : ".$cpyright."<br>";
}
if( $disc==$search)
{
    $disc = $search;  
}

  
     if(isset($_FILES['audiofile']))
    {
        $name_file = $_FILES['audiofile']['name'];
        $audiofile = $disc = $name_file;
         $cover = $name_file.'.png';
        $tmp_name = $_FILES['audiofile']['tmp_name'];
        $local_image = "uploaded/";
        move_uploaded_file($tmp_name,$local_image.$name_file);
        $name_file1 = $_FILES['cover']['name'];
        echo "name_file : ".$name_file1."<br>";
         
       $tmp_name1 = $_FILES['cover']['tmp_name'];
       //echo "tmp_name : ".$tmp_name1."<br>";
      $local_image1 = "uploaded/";
     // echo "local_image : ".$local_image1."<br>";
      
       move_uploaded_file($tmp_name1,$local_image1.$cover);
    
    }



   

?>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.mobile-container {
  max-width: 480px;
  margin: auto;
  background-color: #555;
  height: 500px;
  color: white;
  border-radius: 10px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  position: relative;
}

.topnav #myLinks {
  display: none;
}

.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  
  color: white;
}
</style>
  <center>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="https://gamingbeastsmusics.000webhostapp.com/">GBM</a>
  <button class="navbar-toggler" onclick="myFunction()"   type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id = "myLinks">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="https://gamingbeastsmusics.000webhostapp.com/">Home <span class="sr-only">(current)</span></a>
      </li>
      
      
      
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     <button class="btn btn-outline-success my-2 my-sm-0" onclick="myF()">
    Upload
  </button>
    

  </div>
 
</nav>
<hr>
     
<div class="container"style="width: 18rem; "> 
  <div class="card" >
    <img class="card-img-top" src="uploaded/<?php echo $disc;?>.png" alt="Card image cap">
    <div class="card-body">
      
      <h5 class="card-title"><?php echo     $disc;?></h5>
      <p class="card-text"><?php echo     $disc;?></p>
      <a href="<?php echo $cpyright;?>" class="btn btn-primary">Download</a>
    </div>
    </div>
    </div>
  
    <hr>
    <div class="container">
    <div class="audio">
      
        <audio controls autoplay>
            <source src="uploaded/<?php
echo $disc;
?>" type="audio/mpeg" />
        </audio>

        
    </div>
</div>
<hr>
<div class = "container">

<form  style = "display:none;" id="upload" class = "fileup"  method="post" enctype="multipart/form-data">
    <h5 class="card-text">Upload File : </h5>
        
    <input class = "btn btn-primary" type="file" name="audiofile" id="audiofile" onchange="uploadFile()"/>
    <br>
     <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
     <h5 class="card-text">Upload Cover Image : </h5>
      
    <input class = "btn btn-primary" type="file" name="cover" id="cover"  onchange="uploadFile()"/>
    <br>
     <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
    <br>
    
    <input type="text" name="cpyright" id="cpyright"/>
    <input class = "btn btn-primary" type="submit"  value="upload" />
</form>

</div>
   
</div>
</center>
</html>
<?php
class dbopen
{
    protected $server, $pass, $user, $dbname, $flag, $conn;
    
    public function opendb()
    {
        $this->server = "localhost";
        $this->pass   = "(2%u4ZF7_F+UpLOe";
        $this->user   = "id19391166_gbm";
        $this->dbname = "id19391166_af";
      
        $this->conn = new mysqli($this->server,$this->user,$this->pass,$this->dbname) or die("Database Not connected");
        //echo "Database connected<br>";
    }
    public function getcon()
    {
        return $this->conn;
    }
    public function closedb()
    {
        // echo "<br />Closing databases...<br />";
        $this->conn->close();
        //  echo "Database Disconnected<br />";
    }
}
class mf extends dbopen
{
    
    public function insertfile($cover,$filename,$cpyright)
    {
           $conn  = parent::getcon();
        $sql = "INSERT INTO af VALUES ('$cover','$filename','$cpyright');";
        
if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    }
    public function dispfile()
    {
        
        $conn  = parent::getcon();
        $sql = "Select*from af;";
        $r     = $conn->query($sql);
        echo"<hr><div class = 'container'>";

        echo "<center class='card-text'><table>";
        while ($row =$r->fetch_assoc()) {
                     $cov  = $row['cover'];
                   $value =  $row['disc'];
                   $value2 =  $row['ncs_cpyright'];
                
  
                echo '<tr><td><div class="card2"><img class="card-img-top" src="uploaded/'.$cov.' " alt="Card image cap"></div><hr></td><td class= "content"> '.$value.' : ';
                echo "</td><td><a style='margin-left:33px;' class='btn play btn-primary' href = 'index.php?cover=".$cov."&&search=".$value."&&cpyright=".$value2."'> play</a><br/><hr></td></tr>";
               
        }
        echo "</table></center>";
        echo "</div>";

        
       
    }
}




$ob = new mf();
$ob->opendb();
if($audiofile != 0 or $audiofile != NULL)
{
    
    
    $ob->insertfile($cover,$audiofile,$cpyright);
}

$ob->dispfile();
$ob->closedb();
?>
<script>
    function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function myF()
{
    

     var d = document.getElementById("upload").style.display;
     
     switch(d)
     {
         case "block" : {
             document.getElementById("upload").style.display = "none";
         }
         break;
         case "none" : {
             document.getElementById("upload").style.display = "block";
         }
         break;
         default : {
             document.getElementById("upload").style.display = "none";
         }
         break;
     }
    
    
}
</script>
