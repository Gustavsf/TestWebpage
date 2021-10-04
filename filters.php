<?php
class FilterSort{
    public $LIKE;
    public $ORDERBY;
    public $emailProviders = array();
       
    public function filterByLike($conn){
        if(isset($_POST['filter_by_email'])){
            $mail = mysqli_real_escape_string($conn, $_POST['filter_by_email']);
            $this->LIKE = "WHERE email LIKE '%$mail%'"; 
        }
        if(!empty($_POST['email_search'])){
            $text = mysqli_real_escape_string($conn, $_POST['email_search']);
            if(isset($_POST['filter_by_email'])){
                $this->LIKE = "WHERE email LIKE '%$text%%$mail'";                    
            } else{
                $this->LIKE = "WHERE email LIKE '%$text%'";
            } 
        }
        return $this->LIKE;                 
    }
    
    public function filterBySort(){
        if(isset($_POST['email_sortA'])){
            $this->ORDERBY = "ORDER BY email ASC";
        }
        if(isset($_POST['email_sortB'])){
            $this->ORDERBY = "ORDER BY email DESC";
        }
        if(isset($_POST['date_sortA'])){
            $this->ORDERBY = "ORDER BY created_date ASC";
        }
        if(isset($_POST['date_sortB'])){
            $this->ORDERBY = "ORDER BY created_date DESC";
        }
        return $this->ORDERBY;       
    }  

    public function getAdress($emailArray){
        foreach($emailArray as $x => $x_value){ 
            $split = explode("@", $x_value['email']);
            if(!in_array($split[1], $this->emailProviders)){
                array_push($this->emailProviders, $split[1]);
            }          
        }
        return $this->emailProviders;       
    }
}

if(isset($_POST['delete'])){
    $id_delete = mysqli_real_escape_string($conn, $_POST['id_delete']);
    $sql2 = "DELETE FROM emails WHERE id = $id_delete";
    mysqli_query($conn, $sql2);
}
?>