<?php

session_start();
if(!isset($_SESSION['counter']))
    {
       $_SESSION['counter'] = 0;
    }

?>

<html lang="en">
 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
    protected $songs1;
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
    public function fetchSongs()
    {
      $conn  = parent::getcon();
      $songs1 = array();
  
      $sql = "Select*from af;";
      $r     = $conn->query($sql);
      while ($row =$r->fetch_assoc()) {
      
      $value =  $row['disc'];
      
 array_push($songs1,$value);
 }

      
       return $songs1;
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
class songs extends mf
{
   
   public function Songs1($songsmain,$search)
   {
     
     $cnt =  count($songsmain);
     if (isset($_GET['playSongs'])) {
      $playSongs = $_GET['playSongs'];  
  }
    
    //  echo $_SESSION['counter'];
     if($_SESSION['counter'] <0)
     {
      $_SESSION['counter'] = 0;
     }
     else if($_SESSION['counter']>$cnt)
     {
      $_SESSION['counter'] = $cnt;
     }
    //  echo $playSongs;
      if ($_SESSION['counter'] >= 0) {
        if ($playSongs == "last_page") {
        $_SESSION['counter'] += 1;
        $c = $_SESSION['counter'];
        $search = $songsmain[$c];
          } else if ($playSongs == "first_page") {
              $_SESSION['counter'] -= 1;
              $c = $_SESSION['counter'];
              $search = $songsmain[$c];
              if($c == -1)
              {
              
                $search = $songsmain[$c+1];
              }
          }
           else if ($playSongs == "fast_rewind") {
            $_SESSION['counter'] = 0;
              $c = $_SESSION['counter'];
              $search = $songsmain[$c];
              
          }
           else if ($playSongs == "fast_forward") {
              $_SESSION['counter'] = $cnt-1;
              $c = $_SESSION['counter'];
              $search = $songsmain[$c];
          }if($c >= $cnt)
          {
        
            $search = $songsmain[$cnt-1];
          }
         
          
       
      }
    
      
      
  
     

     echo '<hr>
     
     <div class="container"style="width: 18rem; "> 
       <div class="card" >
         <img class="card-img-top" src="uploaded/'.$search.'.png" alt="Card image cap">
         <div class="card-body">
           
           <h5 class="card-title">'.  $search.'</h5>
           <p class="card-text">'.$search.'</p>
           <a href="uploaded/'.$search.'" class="btn btn-primary">Download</a>
         </div>
         </div>
         </div>
         <hr>
     <div class="container">
     <div class="audio">
     <form class="form-inline my-2 my-lg-0">
                   <input class="material-symbols-outlined btn-primary" name="playSongs" type="submit" value = "fast_rewind"/>
                   <input class="material-symbols-outlined btn-primary"  name="playSongs"type="submit" value = "first_page"/>
             </form>
         <audio controls autoplay>
             <source src="uploaded/'.
  $search.'
 " type="audio/mpeg" />
         </audio>
 
         <form class="form-inline my-2 my-lg-0">
                     <input class="material-symbols-outlined btn-primary" name="playSongs" type="submit" value = "last_page"/>
                   <input class="material-symbols-outlined btn-primary"  name="playSongs"type="submit" value = "fast_forward"/>
                   </form>
     </div>
 </div>';
   }

}




$ob = new songs();
$ob->opendb();
if($audiofile != 0 or $audiofile != NULL)
{
    
    
    $ob->insertfile($cover,$audiofile,$cpyright);
}
$s  = $ob->fetchSongs();
@$ob->Songs1($s,$search);
$ob->dispfile();
$ob->closedb();
?>

   
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
