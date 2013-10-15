<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<? xml version = "1.0" encoding = "UTF-8" ?>';
echo '<items>';
echo    '<item type = "fieldset" name = "data" label = "Price Structure" inputWidth = "auto">';
//echo        '<item type="combo" label="Type" inputWidth="120">';
//echo            '<option text="STD Price" value="STD"/>';
//echo            '<option text="Special Price" value="SP"/>';
//echo            '<option text="Customer Price" value="CP"/>';
//echo        '</item>';
echo        '<item type = "input" name = "name" label = "Login" position = "label-top"/>';
echo        '<item type = "password" name = "pass" label = "Password" position = "label-top"/>';
echo        '<item type = "button" name = "save" value = "Proceed"/>';
echo    '</item>';
echo '</items>';
?>

