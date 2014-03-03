<?php
class AddExpence {
    
    public $ware;
    public $value;
    private $unsorted_data=[];
    
    public function __set($name, $value) {
        $this->unsorted_data[$name]=$value;
    }
    
    public function __get($name) {
        return $this->data[$name];
    }
    
   public function enterWare($ware, $value, $date, $type, $file) {
       
       
       if (mb_strlen($ware) < 4 ) {
           echo  'Името на стоката е твърде кратко!<br/>';
       }
       
      if  (empty($value)) {
         echo  '<p>Цената на стоката е невалидна!</p>';
      }
      
     /* if (!is_integer($value)) {
          throw new InvalidValue('<p>Цената на стоката е невалидна!</p>');
      } */
      
      /* if (empty($value)) {
   *   throw new Exception ('Моля въведете стойност!<br/>'); 
   }*/
      
    
    
       if (mb_strlen($ware) >= 4 && $value > 0 && mb_strlen($value) > 0 && file_exists($file)) {
           $result = $ware . '!' . $value . '!' . $date . '!' . $type . "\n";
           if(file_put_contents($file, $result, FILE_APPEND))
		{
			echo 'Записът е успешен';
		}
           }
       }
       
   }


//class InvalidValue extends Exception {}

//class FileNonExistant extends Exception {}
//NOTICE: check if multiple exceptions are possible.
//http://www.youtube.com/watch?v=SGrZaGMTZRA

//http://php.net/manual/en/class.splfileobject.php
//http://nau4i.me/jupgrade/index.php/php2/12-oop/281-php-oop-try-catch-throw

?>
