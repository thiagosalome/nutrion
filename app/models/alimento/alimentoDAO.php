<?php
class alimentoDAO{
  
    public function getBy(){
        require "app/bootstrap.php";        
        try{
                       
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    public function insert(alimentoVo $alimento){
        require "app/bootstrap.php"; 
        try{
            
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }       

    public function update(alimentoVo $alimento){                
        require "app/bootstrap.php";
        try{
            
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }   
    } 
    
    public function delete(alimentoVo $alimento){
        require "app/bootstrap.php";
        try{                                       
            

            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }        
    }  
}
?>