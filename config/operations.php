<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $Task = $db->check($_POST['Task']);
                $ByWho = $db->check($_POST['ByWho']);
                $Description = $db->check($_POST['Description']);
                $Important = $db->check($_POST['Important']);

                if(str_contains($Task, "<") || str_contains($ByWho, "<") || str_contains($Description, "<") || str_contains($Important, "<")){
                      echo '<div class="alert alert-danger"> Illegal characters </div>';
                    return;
                }

                 if(str_contains($Task, ">") || str_contains($ByWho, ">") || str_contains($Description, ">") || str_contains($Important, "<")){
                      echo '<div class="alert alert-danger"> Illegal characters </div>';
                    return;
                }

                if(strlen($Task) > 10 || strlen($ByWho) > 12 || strlen($Description) > 25 || strlen($Important) > 10){
                      echo '<div class="alert alert-danger"> Too long </div>';
                    return;
                }

                if($this->insert_record($Task,$ByWho,$Description,$Important))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }
 
        function insert_record($a,$b,$c,$d)
        {
            global $db;
            $query = "insert into todos (Task,ByWho, Description,Important) values('$a','$b','$c','$d')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        public function view_record()
        {
            global $db;
            $query = "select * from todos";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select * from todos where ID='$id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $ID = $_POST['ID'];
                $Task = $db->check($_POST['Task']);
                $ByWho = $db->check($_POST['ByWho']);
                $Description = $db->check($_POST['Description']);
                $Important = $db->check($_POST['Important']);

                if($this->update_record($ID,$Task,$ByWho,$Description,$Important ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:view.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

        public function update_record($id,$first,$ByWho,$User,$Important)
        {
            global $db;
            $sql = "update todos set Task='$first', ByWho='$ByWho', Description='$User', Important='$Important' where ID='$id'";
            $result = mysqli_query($db->connection,$sql);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }




        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }


        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from todos where ID='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

      

    }




?>