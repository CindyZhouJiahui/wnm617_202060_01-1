<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/21
 * Time: 9:28
 */

class phps
{
    public $servername = "127.0.0.1";
    public $username = "m_app";
    public $password = "m_app";
    public $dbname = "m_app";
    public $db;

    public function __construct()
    {
        #Connect to database
        $this->db = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        $this->db->query("SET NAMES UTF8");
    }

    public function getUser(){
        $usernames = $_SESSION['username'];
        $sql = "select * from user where username = \"$usernames\"";
        $result = $this->db->query($sql);
        $user =  mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $user;
    }

    public function setUser(){
        if($_POST){
            $id = $_POST["id"];
            $nickname = $_POST["nickname"];
            $head = $_POST["head"];
            $age = $_POST["age"];
            $sex = $_POST["sex"];

            $sql = "UPDATE user SET nickname='".$nickname."', head='".$head."', age= '".$age."', sex= '".$sex."' WHERE id=".$id;

            $result = $this->db->query($sql);

            if ($result) {
                $rt = [
                    "code" => 1,
                    "msg" => "success",
                    "data" => ""
                ];
                echo json_encode($rt);
                die;
            }else{
                $rt = [
                    "code" => 0,
                    "msg" => "error",
                    "data" => ""
                ];
                echo json_encode($rt);
                die;
            }
        }
    }

    public function addPord(){
        if($_POST){
            $img = $_POST["img"];
            $title = $_POST["title"];
            $des = $_POST["des"];
            $coordinate = $_POST["coordinate"];
            $types = $_POST["types"];

            $sql = "INSERT INTO product ( title, img, des, coordinate, types )
                        VALUES
                        ( '".$title."', '".$img."', '".$des."', '".$coordinate."', '".$types."' )";

            $result = $this->db->query($sql);

            if ($result) {
                $rt = [
                    "code" => 1,
                    "msg" => "success",
                    "data" => ""
                ];
                echo json_encode($rt);
                die;
            }else{
                $rt = [
                    "code" => 0,
                    "msg" => "error",
                    "data" => ""
                ];
                echo json_encode($rt);
                die;
            }
        }
    }

    public function getList($types){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        if($types){
            $sql = "SELECT * FROM product where types = \"$types\" ";
        }else{
            $sql = "SELECT * FROM product";
        }

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return  $result;
    }

    public function show($id){
        $sql = "select * from product where id = \"$id\"";
        $result = $this->db->query($sql);
        $is =  mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(!$is){
            header('Location:index.php');
        }

        return $is;
    }

    public function logout(){
        unset($_SESSION['username']);
        header('Location:user.php');
    }

    public function del($id){
        $sql = "DELETE FROM product
	        WHERE id = ".$id;
        $result = $this->db->query($sql);

        header("refresh:1;url=list.php");
    }

    public function edit(){
        if($_POST){
            $id = $_POST["id"];
            $img = $_POST["img"];
            $title = $_POST["title"];
            $des = $_POST["des"];
            $coordinate = $_POST["coordinate"];
            $types = $_POST["types"];

            $sql = "UPDATE product SET img='".$img."', title='".$title."', des= '".$des."', coordinate= '".$coordinate."', types= '".$types."' WHERE id=".$id;

            $result = $this->db->query($sql);

            if ($result) {
                $rt = [
                    "code" => 1,
                    "msg" => "success",
                    "data" => ""
                ];
                echo json_encode($rt);
                die;
            }else{
                $rt = [
                    "code" => 0,
                    "msg" => "error",
                    "data" => ""
                ];
                echo json_encode($rt);
                die;
            }
        }
    }

    public function search($search){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT * FROM product where title LIKE  '%$search%' ";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return  $result;
    }
}