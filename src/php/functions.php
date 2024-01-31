<?php

function msgErr($msg){
    echo ("<div style='display:block;
           color:#D8000C;
           background:#FFD2D2;
           padding:0.5%;
           width:99%;
           font-size: 15px;'>");
           echo ("&#9888; &nbsp;".$msg."<span style='float: right;'>&#10006;</span></div><br/>");
}

?>