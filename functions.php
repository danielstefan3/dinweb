<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php

function dd($variable) {
    dump($variable);
    die("END");
    echo "BVármi";
}

function dump($variable) {
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}


function page($page = 'home', $params = []) {
    $url = DOMAIN . "?p=$page";
    if (is_array($params) && count($params) > 0) {
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
    }
    return $url;
}

function redirect($page = 'home', $params= []) {
    $url = page($page,$params);
    header("Location: $url");
    die();
}

function asset($asset) {
    return DOMAIN . $asset;
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function html_errors($key) {
    global $errors;

    $html="";

    if(isset($errors[$key])) {
        foreach ($errors[$key] as $error) {
            $html .= "<p class='input-error'>$error</p>";
        }
    }
    return $html;
}

function get_album_by_id($id) {
    global $db;

    $sql = $db->prepare("SELECT * FROM albums WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();

    $result = $sql->get_result();

    if($result->num_rows == 0){
        return null;
    }
    return $result->fetch_assoc();
}