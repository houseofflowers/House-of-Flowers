<?php
require_once 'admin/db.php';

function getSocialLinks($conn) {
    $sql = "SELECT id, name, url, icon_class FROM social_links WHERE name IN ('Facebook', 'Twitter', 'Instagram', 'LinkedIn')";
    $result = mysqli_query($conn, $sql);
    $socialLinks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $socialLinks[] = $row;
    }
    return $socialLinks;
}

function getLocations($conn) {
    $sql = "SELECT id, name FROM locations";
    $result = mysqli_query($conn, $sql);
    $locations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $locations[] = $row;
    }
    return $locations;
}

function getContactInfo($conn) {
    $sql = "SELECT id, type, value FROM contact_info";
    $result = mysqli_query($conn, $sql);
    $contactInfo = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $contactInfo[] = $row;
    }
    return $contactInfo;
}
?>
