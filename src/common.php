<?php

/**
 * @param $msg
 * @param null $code
 * @param null $data
 */
function displayErrorJSON($msg, $code = NULL, $data = NULL)
{
    $array['message'] = $msg;
    if ($code !== NULL) $array['code'] = $code;
    if ($data !== NULL) $array['data'] = $data;
    echo json_encode($array);
}

/**
 * @param $str
 * @return bool
 */
function valid_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
