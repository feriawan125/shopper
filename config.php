<?php

$servername = "localhost";
$database = "shopper";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function insert($namatabel, array $namakolom, array $isikolom, $pesanberhasil, $pesangagal)
{
    global $conn;
    try {
        $query = ' insert into ' . $namatabel . '(';
        $temp = '';
        for ($i = 0; $i < count($namakolom); $i++) {
            $query = $query . $namakolom[$i];
            $temp = $temp . '?';
            if ($i < count($namakolom) - 1) {
                $query = $query . ',';
                $temp = $temp . ',';
            }
        }
        $query = $query . ') values ( ';
        for ($i = 0; $i < count($isikolom); $i++) {
            $query = $query . '"' . $isikolom[$i] . '"';
            if ($i < count($isikolom) - 1) {
                $query = $query . ',';
            }
        }
        $query = $query . ')';
        // echo $query;

        if (mysqli_query($conn, $query)) {
        } else {
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function update($namatabel, array $namakolom, array $isikolom, array $wherekolom, array $isiwhere, $pesanberhasil, $pesangagal)
{
    global $conn;
    try {
        $query = ' update ' . $namatabel . ' set ';
        $temp = '';
        for ($i = 0; $i < count($namakolom); $i++) {
            $query = $query . $namakolom[$i];
            if ($i < count($namakolom) - 1) {
                $query = $query . ',';
            }
        }
        $query = $query . ' where ';
        for ($i = 0; $i < count($wherekolom); $i++) {
            $query = $query . $wherekolom[$i] . '=?';
            if ($i < count($wherekolom) - 1) {
                $query = $query . ',';
            }
        }
        // echo $query;

        if (mysqli_query($conn, $query)) {
            echo $pesanberhasil;
        } else {
            echo $pesangagal;
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function delete($namatabel, array $namakolom, array $isikolom, $pesanberhasil, $pesangagal)
{
    global $conn;
    try {
        $query = ' delete from ' . $namatabel . ' where ';

        for ($i = 0; $i < count($namakolom); $i++) {
            $query = $query . $namakolom[$i] . ' = ? ';

            if ($i < count($namakolom) - 1) {
                $query = $query . ' and ';
            }
        }
        // echo $query;

        if (mysqli_query($conn, $query)) {
            echo $pesanberhasil;
        } else {
            echo $pesangagal;
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function select($query)
{
    global $conn;
    $res = mysqli_query($conn, $query);

    return $res;
}

function isSuccess()
{
    global $conn;
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}
