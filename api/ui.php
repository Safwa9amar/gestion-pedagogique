<?php
$is_toggled = $_SESSION['toggle_sidebar'] ?? false;
if ($is_toggled) {
    $_SESSION['toggle_sidebar'] = false;
} else {
    $_SESSION['toggle_sidebar'] = true;
}