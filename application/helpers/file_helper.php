<?php
function cek_foto($foto) {
    if(empty($foto)) return false;
    if(file_exists(FCPATH.'uploads/'.$foto)) return true;
    return false;
}