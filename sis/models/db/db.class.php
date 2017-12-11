<?php 
class Crud{
  
////////////////////////////////////////  
//        variables de conexión       //
////////////////////////////////////////
   private $host = 'localhost';
   private $user = 'de2heed_ciabuly';
   private $pass = 'ciabuly2016%';
   private $bd   = 'de2heed_cia_bd';


//variables para metodos
  private $link;
  protected $sql;

//Conexion para paginador en listados.
  public function conec(){
    $con = mysqli_connect($this->host,$this->user,$this->pass,$this->bd);
    return $con;
  }
  
  public function __construct(){
    try
    {
      $this->link = mysqli_connect($this->host,$this->user,$this->pass,$this->bd);
      if (!$this->link)
      {
        throw new Exception('No se ha podido conectar a la Base de Datos');
      }
      $this->sql="";
    }
    catch (Exception $e)
    {
      echo '<h3>'.$e->getMessage().'</h3>';
    }
  }//end-function


  private function query(){
    try
    {
        mysqli_query($this->link,"SET NAMES 'UTF8'");
        $result = mysqli_query($this->link,$this->sql);
        
     /* NOTA: Descomentar este bloque solo para identificar el error con la base de datos y consultas.
     if (!$result)
      {
        throw new Exception('Error de consulta: '.$this->sql);
      }
      */
      return $result;
    }
    catch (Exception $e)
    {
      echo $e->getMessage();
    }
mysqli_close($this->link);
  }

  protected function dbselect(){
    $result = $this->query();
    $rs = array();
    while ($rst = mysqli_fetch_assoc($result)){ $rs[] = $rst; }
    return $rs;
  }

  protected function dbinsert(){
    return $this->query();
  }

  protected function dbedit(){
    return $this->query();
  }

  protected function dbdelete(){
    $delete = $this->query();
    if (mysqli_affected_rows($this->link)==true) return true;
    return false;
  }

}//end-class

 ?>