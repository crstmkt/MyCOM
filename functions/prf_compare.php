<?php
function compare_gender($value)
{
            if ($value['gender'] == "0")
            {
               echo "Keine Angabe <br>";
            }
            else if ($value['gender'] == "1")
            {
               echo "Weiblich <br>";
            }
            else if ($value['gender'] == "2")
            {
              echo "Männlich <br>";
            }
}

function compare_smoker($value)
{
           if ($value['smoker'] == "0")
            {
              echo "Ja <br>";
            }
            else if ($value['smoker'] == "1")
            {
              echo  "Nein <br>";
            }
            else if ($value['smoker'] == "2")
            {
              echo "Gelegentlich <br>";
            }
}

function compare_drinker($value)
{
             if ($value['drinker'] == "0")
            {
              echo "Ja <br><br>";
            }
            else if ($value['drinker'] == "1")
            {
              echo "Nein <br><br>";
            }
            else if ($value['drinker'] == "2")
            {
              echo "Gelegentlich <br><br>";
            }
}

function compare_relationship($value)
{
            if ($value['rel_ship_stat'] === "0")
            {
              echo "Keine Angabe";
            }
            else if ($value['rel_ship_stat'] === "1")
            {
              echo "Solo und auf der Suche";
            }
            else if ($value['rel_ship_stat'] === "2")
            {
              echo "Solo und will es bleiben";
            }
            else if ($value['rel_ship_stat'] === "3")
            {
              echo "Glücklich verliebt";
            }
            else if ($value['rel_ship_stat'] === "4")
            {
              echo "Unglücklich verliebt";
            }
            else if ($value['rel_ship_stat'] === "5")
            {
              echo "Glücklich vergeben";
            }
            else if ($value['rel_ship_stat'] === "6")
            {
              echo "Unglücklich vergeben";
            }
            else if ($value['rel_ship_stat'] === "7")
            {
              echo "Glücklich verheiratet";
            }
            else if ($value['rel_ship_stat'] === "8")
            {
              echo "Unglücklich verheiratet";
            }
            else if ($value['rel_ship_stat'] === "9")
            {
              echo "Verlobt";
            } 
            else if ($value['rel_ship_stat'] === "10")
            {
              echo "Auf den richtigen Partner warten";
            } 
            
} 
?>
