<?php
class Path
{
    public $current_path = '/';

    function __construct($path = '/') {
       $this->current_path = $path;
    }

    public function validatePath($dest){
       
        $dest = str_replace('/','',$dest);
    
       return (preg_match("/^[a-zA-Z.]+$/", $dest) == 1);
    }

    public function cd($new_path) {

        if($this->validatePath($new_path)){
            
            $path = explode('/',$this->current_path);
                       
            if (substr($new_path, 0, 1) === "/") {
                $path = array();
            }

            $new_path = explode('/',$new_path);
          
            foreach($new_path as $node){

                if($node == '.'){
                    continue;
                }

                if($node == '..'){
                    array_pop($path);
                }else{
                    array_push($path,$node);
                }
            }

            $this->current_path = implode('/',$path);
        }
    }
}

$path = new Path('a/b/c/d');
$path->cd('../x/../e');
echo $path->current_path;
?>
