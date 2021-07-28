<?php
class FilmModel extends DB{

    public function login($username){
        $qr = "SELECT * FROM users WHERE username='{$username}'";
        return mysqli_query($this->con, $qr);
    }
    public function show(){
        $qr = "SELECT * FROM film";
        return mysqli_query($this->con, $qr);
    }


    public function createFilm(){
        $error = array(array());
        $data = array();
        
        if (!empty($_POST['submit']))
        {
            // Lấy dữ liệu
            $data['fname'] = isset($_POST['fname']) ? $_POST['fname'] : '';
            $data['dname'] = isset($_POST['dname']) ? $_POST['dname'] : '';
            $data['tname'] = isset($_POST['tname']) ? $_POST['tname'] : '';
            $fname=$data['fname'];
            $dname=$data['dname'];
            $tname=$data['tname'];
            // Kiểm tra định dạng dữ liệu
            
            if (empty($data['fname'])){
                $error['fname']['req'] = 'Bạn chưa nhập tên phim';
            }
            
            if (empty($data['dname'])){
                $error['dname']['req']  = 'Bạn chưa nhập tên đạo diễn';
            }
            
 
            if (empty($data['tname'])){
                $error['tname']['req']  = 'Bạn chưa nhập kiểu phim';
            }
            
            // kiểm tra chùng name
            if (!empty($data['fname'])){
                $qr1 = "SELECT * FROM film WHERE name ='$fname'";
                $a=mysqli_query($this->con, $qr1);
                if(mysqli_num_rows($a)>0){
                    $error['fname']['unique']  = 'đã tồn tại tên film';
                };
            }
            
            

            // Lưu dữ liệu
            if (sizeof($error)==1){
                $qr = "INSERT INTO film(name,director,type) VALUES('$fname','$dname','$tname')";
                
                mysqli_query($this->con, $qr);
            }
            
        }
        
        
        return $error;
    }
    public function getFilm($id){
        $qr = "SELECT * FROM film WHERE id=$id";
        $result=mysqli_query($this->con, $qr);
        $row=mysqli_fetch_array($result);
        return $row;
    }
    public function editFilm($id){
        $error = array(array());
        $data = array();
        
        if (!empty($_POST['submit']))
        {
            // Lấy dữ liệu
            $data['fname'] = isset($_POST['fname']) ? $_POST['fname'] : '';
            $data['dname'] = isset($_POST['dname']) ? $_POST['dname'] : '';
            $data['tname'] = isset($_POST['tname']) ? $_POST['tname'] : '';
            $fname=$data['fname'];
            $dname=$data['dname'];
            $tname=$data['tname'];
            // Kiểm tra định dạng dữ liệu
            
            if (empty($data['fname'])){
                $error['fname']['req'] = 'Bạn chưa nhập tên phim';
            }
            
            if (empty($data['dname'])){
                $error['dname']['req']  = 'Bạn chưa nhập tên đạo diễn';
            }
            
 
            if (empty($data['tname'])){
                $error['tname']['req']  = 'Bạn chưa nhập kiểu phim';
            }
            
            // kiểm tra chùng name
            if (!empty($data['fname'])){
                $qr1 = "SELECT name FROM film WHERE name ='$fname' and name<>(SELECT name FROM film WHERE id ='$id' )";
                $a=mysqli_query($this->con, $qr1);
                if(mysqli_num_rows($a)>0){
                    $error['fname']['unique']  = 'đã tồn tại tên film';
                };
            }
            
            

            // Lưu dữ liệu
            if (sizeof($error)==1){
                $qr = "UPDATE film SET name='$fname',director='$dname',type='$tname' WHERE id='$id'";
                
                mysqli_query($this->con, $qr);
            }
            
        }
        return $error;
    }

    public function checkNameCreate($nameCreate){
        $qr1 = "SELECT * FROM film WHERE name ='$nameCreate'";
        $result=mysqli_query($this->con, $qr1);
        if(mysqli_num_rows($result)>0){
            return json_encode(false);
        }
        return json_encode(true);
    }
    public function checkNameEdit($nameEdit,$id){
        $qr1 = "SELECT name FROM film WHERE name ='$nameEdit' and name<>(SELECT name FROM film WHERE id ='$id' )";
        $result=mysqli_query($this->con, $qr1);
        if(mysqli_num_rows($result)>0){
            return json_encode(false);
        }
        return json_encode(true);
    }
    
    public function del($id){
        
        $qr = "DELETE FROM film WHERE id=$id";
        $result=false;
        if(mysqli_query($this->con, $qr)){
            $result=true;
        }
        return $result;
    }
    
    
}
?>