<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//common start
function alert($data, $color="danger")
{
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery($sql){
    $con = conn();
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        die("db error". mysqli_error($con));
    }
}

function fetch($sql){   
    $query = mysqli_query(conn(), $sql);
    $rows = mysqli_fetch_assoc($query);    
    return $rows;
}

function fetchALL($sql){   
    $query = mysqli_query(conn(), $sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($rows, $row);
    }
    return $rows;
}

function showTime($timestamp, $format="d-m-y"){
    return date($format, strtotime($timestamp));
}

function countTotal($table, $condition = 1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);    
    return $total['COUNT(id)'];
}

function redirect($l){
    header("location:$l");
}

function linkTo($l){
    echo "<script> location.href='$l'</script>";
}

function short($str, $length="100"){
    return substr($str, 0, $length)."...";
}



function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}


//common end
//auth start

function register(){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $cpassword= $_POST['c-password'];
    if($password == $cpassword){
        $sPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$sPass')";
        runQuery($sql);
        if(runQuery($sql)){
            redirect("login.php");
        }
    }else{
        return alert("Passwords are'nt matched");
    }
}

function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query(conn(),$sql);
    $row= mysqli_fetch_assoc($query);
    if(!$row){
        return alert("email and password don't match");
    }else{
        if(!password_verify($password,$row['password']))
        {
           return alert("Email or password don't match");
        }else{
            session_start();
            $_SESSION['user']=$row;
            redirect("dashboard.php");
            // return alert("User info Ok","success");
        }
    }
}
//auth end

//user start
function user ($id){
    $sql = "SELECT * FROM users WHERE id = $id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}
//user end

//category start
function categoryAdd(){
    $title= $_POST['title'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
    if(runQuery($sql)){
        linkTo("category_add.php");
    }
}

function category($id){
    $sql = "SELECT * FROM categories WHERE id = $id";
    return fetch($sql);
}

function categories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function categoryDelete($id){
    $sql = "DELETE FROM categories WHERE id = $id";
    return (runQuery($sql));
}
function categoryUpdate(){
    $title = $_POST['title'];
    $id = $_POST['id'];
    $sql = "UPDATE categories SET title = '$title' WHERE id = $id";
    return runQuery($sql);
}

function categoryPinToTop($id){
    $sql = "UPDATE categories SET ordering = '0'";//set all ordering to 0
    mysqli_query(conn(),$sql);
    $sql = "UPDATE categories SET ordering = '1' WHERE id = $id"; //set 1 to pin 
    return runQuery($sql);
}

function categoryRemovePin(){
    $sql = "UPDATE categories SET ordering = '0'"; //set 1 to pin 
    return runQuery($sql);
}
//category end

//post start
function postAdd(){
    $title= textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO posts (title,description,category_id,user_id) VALUES ('$title','$description','$category_id','$user_id')";
    if(runQuery($sql)){
        linkTo("post_add.php");
    }
}

function post($id){
    $sql = "SELECT * FROM posts WHERE id = $id";
    return fetch($sql);
}

function posts($limit=9999999){
    if($_SESSION['user']['role']==2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id=$current_user_id LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts LIMIT $limit";
    }
    return fetchAll($sql);    
}

function postDelete($id){
    $sql = "DELETE FROM posts WHERE id = $id";
    return (runQuery($sql));
}
function postUpdate(){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $id = $_POST['id'];
    $sql = "UPDATE posts SET title = '$title', description= '$description', category_id = '$category_id' WHERE id = $id";
    return runQuery($sql);
}
//post end

//front panel start

function fposts($orderCol = "id", $orderType = "DESC"){ 
    $sql = "SELECT * FROM posts ORDER BY $orderCol $orderType";
    return fetchAll($sql);

}
function fcategories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);

}

function fPostByCategory($category_id, $limit="999",$noNeedID = 0){
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND id != $noNeedID ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}

function fSearch($searchKey){
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchKey%' OR description LIKE '%$searchKey%' ORDER BY id DESC";
    return fetchAll($sql);
}
function fSearchByDate($start , $end){
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchAll($sql);
}
//front panel end

//viwer count start

function viewrRecord($userId, $postId,$device){
    $sql = "INSERT INTO viewers (user_id, post_id, device) VALUES ('$userId','$postId','$device')";
    runQuery($sql);
}

function viewerCountByPost($postId){

    $sql = "SELECT * FROM viewers WHERE post_id = $postId";
    return fetchALL($sql);
}

function viewerCountByUser($userId){

    $sql = "SELECT * FROM viewers WHERE user_id = $userId";
    return fetchALL($sql);

}
//viwer count end

//ads start

function ads($id){
    $sql = "SELECT * FROM ads WHERE id = $id";
    return fetch($sql);
}

function adsShow(){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM ads WHERE start <= '$today' AND end > '$today' ";
    // die($sql);
    return fetchALL($sql);
}
function adsAll(){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM ads";
    // die($sql);
    return fetchALL($sql);
}

function adsAdd(){
    $name = $_POST['name'];
    $img = $_POST['img'];
    $link = $_POST['link'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $sql = "INSERT INTO ads (owner_name, photo, link, start, end) VALUES ('$name','$img','link','$start','$end')";
    // die($sql);
    if(runQuery($sql)){
        linkTo("ads_add.php");
    }
    
}


function adsDelete($id){
    $sql = "DELETE FROM ads WHERE id = $id";
    return runQuery($sql);
}
function adsUpdate(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $link = $_POST['link'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $sql = "UPDATE ads SET owner_name = '$name', photo = '$img', link = '$link', start ='$start', end ='$end' WHERE id = $id";
    return runQuery($sql);
}
//ads end

//payment start

function payNow(){
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    //from user update
    $fromUserDetail = user($from);
    if($fromUserDetail['money'] > $amount){
        $leftMoney = $fromUserDetail['money'] - $amount;
        $sql = "UPDATE users SET money = $leftMoney WHERE id=$from";
        mysqli_query(conn(), $sql);
    
        //to user money update
        $toUserDetail = user($to);
        $newAmount = $toUserDetail['money'] + $amount;
        $sql = "UPDATE users SET money = $newAmount WHERE id = $to";
        mysqli_query(conn(), $sql);
    
        //add to transition table
        $sql = "INSERT INTO transition (from_user, to_user, amount, description ) VALUES ($from, $to, $amount, '$description')";
        runQuery($sql);
    }
   
}

function transition($id){
    $sql = "SELECT * FROM transition WHERE id = $id";
    return fetch($sql);
}

function transitions(){
    $user_id = $_SESSION['user']['id'];
    if($_SESSION['user']['role'] == 0){
        $sql = "SELECT * FROM transition";
    }else{
        $sql = "SELECT * FROM transition WHERE from_user = $user_id OR to_user = $user_id";
    }
    return fetchAll($sql);
}

//payment end
function dashboardPosts($limit=9999999){
    if($_SESSION['user']['role']==2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id ='$current_user_id' ORDER BY id DESC LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
    }
    return fetchAll($sql);    
}

function viewerCountByUserDate($userId, $limit=10){

    $sql = "SELECT * FROM viewers WHERE user_id = $userId ORDER BY id DESC LIMIT $limit";
    return fetchALL($sql);

}
//admin dashboar`   