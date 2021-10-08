<?php 
   $host = "localhost";
   $user = "root";
   $password = "";
   $db = "pt15317project1";
   $conn = null;
   try {
       $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user,$password);
   } catch (PDOException $e) {
       echo $e->getMessage();
   }
   function dbfetch($sql){
    global $conn;// biến cục bộ truy cập conn vào hàm
    $stmt = $conn->prepare($sql);//nạp câu lệnh vào trong kết nối
    $stmt->execute();//thực thi câu lệnh
    $result = $stmt->fetch();//Tìm ra bản ghi đầu tiên thỏa mãn
    return $result;
   }
   function dbfetchAll($sql){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();//Tìm ra bản ghi tất cả thỏa mãn
    return $result;
   }
   function dbfetchColumn($sql){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();//trả về một cột duy nhất từ ​​hàng tiếp theo của tập kết quả
    return $result;
   }
   function dbexe($sql){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   }
?>