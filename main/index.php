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
$disc=0;
$cpyright = 0;

if (isset($_POST['audiofile'])) {
    $audiofile = $_POST['audiofile'];
}
if(isset($_GET['disc']))
{
    $disc = $_GET['disc'];
}
if(isset($_GET['cpyright']))
{
     $cpyright = $_GET['cpyright'];
}

?>
  <center>
   <div class="container"style="width: 18rem; "> 
<div class="card" >
  <img class="card-img-top" src="../music/cover/<?php echo $disc;?>.png" alt="Card image cap">
  <div class="card-body">
  
    <h5 class="card-title"><?php echo     $disc;?></h5>
    <p class="card-text"><?php echo     $disc;?></p>
    <a href="<?php echo $cpyright?>" class="btn btn-primary">Download</a>
  </div>
</div>
<hr>
</div>
    <div class="container">
    <div class="audio">
      
        <audio controls autoplay>
            <source src="../music/<?php
echo $_GET['disc'];
?>" type="audio/mpeg" />
        </audio>

        
    </div>
</div>
<hr>
<div class = "container">
<form  class ="fileup" method="get" action="index.php">
    <h3 class="card-text">Upload File : </h3>
    <input class = "btn btn-primary" type="file" name="audiofile" id="audiofile" />
    <input type="text" name="cpyright" id="cpyright">
    <input class = "btn btn-primary" type="submit" value="submit" />
</form>
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
        $this->pass   = "123";
        $this->user   = "postgres";
        $this->dbname = "om";
        $this->flag   = 0;
        $this->conn = pg_connect("host = {$this->server} user = {$this->user} password = {$this->pass} dbname = {$this-> dbname } ", $flag = 1) or die("Database Not connected");
        if ($flag == 1) {
            // echo ("Database Connected");
        }
    }
    public function getcon()
    {
        return $this->conn;
    }
    public function closedb()
    {
        // echo "<br />Closing databases...<br />";
        pg_close();
        // echo "Database Disconnected<br />";
    }
}
class mf extends dbopen
{
    private $filename,$cpyright;
    public function insertfile($filename,$cpyright)
    {
      
        $conn  = parent::getcon();
        $query = "insert into af values('$filename','$cpyright');";
        @pg_query($conn, $query);
    }
    public function dispfile()
    {
        
        $conn  = parent::getcon();
        $query = "Select disc,ncs_cpyright from af;";
        $r     = pg_query($conn, $query);
        echo"<hr><div class = 'container'>";

        echo "<center class='card-text'><table>";
        while ($row = pg_fetch_assoc($r)) {
           
                 $value =  $row['disc'];
                 $value2 =  $row['ncs_cpyright'];
                
  
                echo '<tr><td><div class="card2"><img class="card-img-top" src="../music/cover/'. $value.'.png" alt="Card image cap"></div>'.'<hr></td><td class= '.'content'.'>'.$value.' : ';
                echo "</td><td><a style='margin-left:33px;' class='btn play btn-primary' href = 'index.php?disc=".$value."&&cpyright=".$value2."'> play</a><br/><hr></td></tr>";
               
        }
        echo "</table></center>;";
        echo "</div>";

        
       
    }
}




$ob = new mf();
$ob->opendb();
if ($audiofile != 0 && $audiofile != NULL) {
    $ob->insertfile($audiofile,$cpyright);
}
$ob->dispfile();
$ob->closedb();
?>