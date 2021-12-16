<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 * 
 * Meter getProductos y getProducto
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt_productos = null;
    private $stmt_producto  = null;
    private $stmt_borprod  = null;
    private $stmt_modprod  = null;
    private $stmt_creaprod = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton
   
    private function __construct(){
        
       
        try {
            $dsn = "mysql:host=".DB_SERVER.";dbname=empresa;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }

        // Construyo las consultas previamente

        $this->stmt_productos  = $this->dbh->prepare("SELECT * FROM `productos`");
        if ( $this->stmt_productos == false) die (__FILE__.':'.__LINE__.$this->dbh->error);

        $this->stmt_producto   = $this->dbh->prepare("select * from productos where PRODUCTO_NO =:PRODUCTO_NO");
        if ( $this->stmt_producto == false) die ($this->dbh->error);

        $this->stmt_borprod   = $this->dbh->prepare("delete from productos where PRODUCTO_NO =:PRODUCTO_NO");
        if ( $this->stmt_borprod == false) die ($this->dbh->error);

        $this->stmt_modprod   = $this->dbh->prepare("update productos set DESCRIPCION=:DESCRIPCION, PRECIO_ACTUAL=:PRECIO_ACTUAL, STOCK_DISPONIBLE=:STOCK_DISPONIBLE where PRODUCTO_NO=:PRODUCTO_NO");
        if ( $this->stmt_modprod == false) die ($this->dbh->error);

        $this->stmt_creaprod  = $this->dbh->prepare("insert into productos (PRODUCTO_NO,DESCRIPCION,PRECIO_ACTUAL,STOCK_DISPONIBLE) values(?,?,?,?)");
        if ( $this->stmt_creaprod == false) die ($this->dbh->error);
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh->close();
            self::$modelo = null; // Borro el objeto.
        }
    }


    // SELECT Devuelvo la lista de Usuarios
    public function getProductos ():array {
        $tproducto = [];
        $this->stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        
        if ( $this->stmt_productos->execute() ){
            while ( $producto = $this->stmt_productos->fetch()){
               $tproducto[]= $producto;
            }
        }
        return $tproducto;
    }
    
    // SELECT Devuelvo un usuario o false
    public function getProducto (String $PRODUCTO_NO) {
        $producto = false;
        
        $this->stmt_producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $this->stmt_producto->bindParam(':PRODUCTO_NO', $PRODUCTO_NO);
        $result = $this->stmt_producto->execute();
        if ( $result ){
            if ( $obj = $this->stmt_producto->fetch()){
                $producto= $obj;
            }
        }
        return $producto;
    }
    
    // UPDATE
    public function modProducto($producto):bool{
      
        $this->stmt_modprod->bindValue(':PRODUCTO_NO',$producto->PRODUCTO_NO);
        $this->stmt_modprod->bindValue(':DESCRIPCION',$producto->DESCRIPCION);
        $this->stmt_modprod->bindValue(':PRECIO_ACTUAL',$producto->PRECIO_ACTUAL);
        $this->stmt_modprod->bindValue(':STOCK_DISPONIBLE',$producto->STOCK_DISPONIBLE);
        $this->stmt_modprod->execute();
        $resu = ($this->stmt_modprod->rowCount () == 1);
        return $resu;
 
    }

    //INSERT
    public function addProducto($producto):bool{
        $this->stmt_creaprod->execute( [$producto->PRODUCTO_NO, $producto->DESCRIPCION, $producto->PRECIO_ACTUAL, $producto->STOCK_DISPONIBLE]);
        $resu = ($this->stmt_creaprod->rowCount () == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $prod):bool {
        $this->stmt_borprod->bindParam(':PRODUCTO_NO', $prod);
        $this->stmt_borprod->execute();
        $resu = ($this->stmt_borprod->rowCount () == 1);
        return $resu;

    }   
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

