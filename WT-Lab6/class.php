<?php
  class Data {
      public $text = "";
	  public $num = 0; 
	  
	  public function Print()
	  {
		  echo "Data: " . $this->text . "<br>";
		  echo "Num: " . $this->num . "<br>";
	  }
  }