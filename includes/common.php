<?php
session_start();

$database = [
    "host" => "localhost",
    "db" => "website",
    "username" => "root",
    "password" => "",
];
define('ROOT_PATH', "/website");

function is_logged(){
    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])){
        return true;
    }else{
        return false;
    }
}

function redirect_to($page){
    $page = ROOT_PATH . "/$page";
    $page = str_replace("//", "/", $page);
    if ($page[0] == "/"){
        $page = substr($page, 1);
    }
    if (!empty($page)){
        header("Location: /$page");
    }
}

function getTypes(array $data = null)
{
    if (empty($data)) return "";
    $len = count($data);
    if ($len > 0) {
        return str_pad("", $len, "s");
    }
    return "";
}

function getMySqli()
{
    global $database;
    $conn = new mysqli($database["host"], $database["username"], $database["password"], $database["db"]);;
    mysqli_set_charset($conn , 'UTF8');
    if ($conn->connect_error) {
        die("Kết nối thất bại: " + $conn->connect_error);
    }
    return $conn;
}

function setup(&$conn, &$query, $data)
{
    $conn = getMySqli();
    $type = getTypes($data);
    $query = $conn->prepare($query);
    if (!empty($data)) {
        $query->bind_param($type, ...$data);
    }
    $query->execute();
}

function db_select($query, array $data = null)
{
    setup($conn, $query, $data);
    $result = $query->get_result();
    return $result;
}

function db_insert($query, array $data = null, $redirect_to = "/index.php")
{
    setup($conn, $query, $data);
    // Chuyển trang khi insert thành công
    if ($query->affected_rows >= 1) {
        redirect_to($redirect_to);
    } else {
        die("Error: " . $query . "<br>" . $conn->error);
    }
    $conn->close();
}
