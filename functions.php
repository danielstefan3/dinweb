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
    header("Location:$url");
    die();
}

function asset($asset) {
    return DOMAIN . 'assets' . $asset;
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function html_errors_alert($key) {
    global $errors;

    $html="";
    
    if(isset($errors[$key])) {
        $html="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">";
        foreach ($errors[$key] as $error) {
            $html .= "<p class=\"small m-0\">$error</p>";
        }
        $html.="<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
                </button>
                </div>";
    }
    return $html;
}

function html_errors($key) {
    global $errors;

    $html="";

    if(isset($errors[$key])) {
        foreach ($errors[$key] as $error) {
            $html .= "<div class=\"invalid-feedback\">$error</div>";
        }
    }
    return $html;
}

function is_invalid($key) {
    global $errors;

    $html=isset($errors[$key])?"is-invalid":"";
    return $html;
}

function get_series_by_id($id) {
    global $db;

    $sql = $db->prepare("SELECT * FROM series WHERE series_id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();

    $result = $sql->get_result();

    if($result->num_rows == 0){
        return null;
    }
    return $result->fetch_assoc();
}

function get_all_series($limit) {
    global $db;

    $sql = $db->prepare("SELECT * FROM series ORDER BY addtime DESC LIMIT ?");
    $sql->bind_param("i", $limit);
    $sql->execute();

    $result = $sql->get_result();

    if($result->num_rows == 0){
        return null;
    }
    while ($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function uploadImageFile($target_dir, $name_passed, $newfile_name) {
	$target_file = $target_dir . basename($_FILES[$name_passed]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($newfile_name) {
		$target_file = $target_dir . $newfile_name .".". $imageFileType;
	}
	if (file_exists($target_file)) {
		unlink($target_file);
	}
    move_uploaded_file($_FILES[$name_passed]["tmp_name"], $target_file);
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}