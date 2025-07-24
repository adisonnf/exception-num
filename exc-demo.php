<?php
class MyException extends Exception{
    private $error;
    function __construct($msg, $error){
        parent::__construct($msg);
        $this->error=$error;
    }
    function __toString(): string{
        $txt="Message: ".$this->getMessage()."\n";
        $txt.=$this->error->__toString();
        return $txt;
    }
}
class Odd{
    private $number;
    function __construct($number){
        $this->number=$number;
    }
    function __tostring(){
        return "This number is odd\n";
    }
}
class Even{
    private $number;
    function __construct($number){
        $this->number=$number;
    }
    function __tostring(){
        return "This number is even\n";
    }
}
for ($count=1; $count<4; $count++){
    $msg = "Attempt #".$count."\n";
    echo "Enter a number: ";
    $number=trim(fgets(STDIN));
    try{
        if ($number%2==0){
        throw new MyException($msg, new Even($number));
        } else{
        throw new MyException($msg, new Odd($number));
        } 
    } catch(Exception $e){
        echo $e;
    }
}
