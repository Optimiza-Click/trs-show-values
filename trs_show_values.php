<?php
/*
Plugin Name: TRS show values
Description: Table Rate Shipping show old values.
Text Domain: trs-show-values
Version: 0.1
*/

add_action( 'admin_menu',  'trs_admin_menu' );

function trs_admin_menu() 
{	
    $menu = add_menu_page( 'TRS VALUES', 'TRS VALUES', 'read',  
                            'trs-values', 'trs_form', 'dashicons-screenoptions', 50);
}   


function trs_form()
{
    $values = get_option("woocommerce_table_rates");

    echo "<div style='width: 100%;'><table style='width: 100%;'>";
    echo "<tr><td>Row ID</td><td>Entry Type</td><td>Cond Type</td><td>Cond Secondary</td><td>Cond Teriary</td></tr>";
    
    foreach($values as $value)
    {
  
        $id = substr($value["identifier"], strpos($value["identifier"], "-", 5) + 1 );
        echo "<tr><td>".$id."</td><td>Cond</td><td>".$value["cond"]."</td><td>more_than</td><td>".$value["min"]."</td></tr>";
        echo "<tr><td>".$id."</td><td>Cond</td><td>".$value["cond"]."</td><td>less_than</td><td>".$value["max"]."</td></tr>";
        echo "<tr><td>".$id."</td><td>Cost</td><td>".$value["cost"]."</td><td></td><td></td></tr>";
        echo "<tr><td>".$id."</td><td>Desc</td><td></td><td></td><td></td></tr>";
    }
    echo "</table></div>";
}      
                 

?>