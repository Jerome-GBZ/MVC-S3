<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="menu-deroulant.css">
    <style>
        *{
          text-decoration: none;
        }

        div{
          text-align: center;
        }

        h1{
          text-align: center;
        }

        h2{
          text-align: center;
        }

        img{
            margin: 50px;
        }

        .arrow{
          margin: 1px;
          width: 30px;
          height: 30px;
        }

        .vignette{
          text-align: center;
        }

        .button {
          background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .gris {background-color: #e7e7e7; color: black;} /* Gris */
/*---------------------------MENU-DEROULANT---------------------------------------*/

#menu-deroulant, #menu-deroulant ul{
padding:0;
margin:0;
list-style:none;
text-align:center;
}
#menu-deroulant li{
display:inline-block;
position:relative;
border-radius:8px;
}

#menu-deroulant li:hover{
border-radius: 8px 8px 0 0;
}

#menu-deroulant ul li{
display:inherit;
border-radius:0;
}
#menu-deroulant ul li:hover{
border-radius:0;
}
#menu-deroulant ul li:last-child{
border-radius:0 0 8px 8px;
}
#menu-deroulant ul{
position:absolute;
z-index: 1000;
max-height:0;
left: 0;
right: 0;
overflow:hidden;
-moz-transition: .8s all .3s;
-webkit-transition: .8s all .3s;
transition: .8s all .3s;
}
#menu-deroulant li:hover ul{
max-height:15em;
}
/* background des liens menus */
#menu-deroulant li:first-child{
background-color: #e7e7e7;

}
#menu-deroulant li:nth-child(2){
background-color: #e7e7e7;

}
#menu-deroulant li:nth-child(3){
background-color: #e7e7e7;
/*background-image:-webkit-linear-gradient(top, #F6AD1A 0%, #9F391A 100%);
background-image:linear-gradient(to bottom, #F6AD1A 0%, #9F391A 100%);*/
}
#menu-deroulant li:last-child{
background-color: #e7e7e7;

}
/* background des liens sous menus */
#menu-deroulant li:first-child li{
background:#e7e7e7;
}
#menu-deroulant li:nth-child(2) li{
background:#e7e7e7;
}
#menu-deroulant li:nth-child(3) li{
background:#e7e7e7;
}
#menu-deroulant li:last-child li{
background:#e7e7e7;
}
/* background des liens menus et sous menus au survol */

#menu-deroulant li:last-child:hover, #menu-deroulant li:last-child li:hover{
background:#e0e0e0;
}
/* les a href */
#menu-deroulant a{
text-decoration:none;
display:block;
padding:8px 32px;
color:#000;
font-family:arial;
}
#menu-deroulant ul a{
padding:8px 0;
}
#menu-deroulant li:hover li a{
color:#000;
text-transform:inherit;
}
#menu-deroulant li:hover a, #menu-deroulant li li:hover a{
color:#fff;
}

/*----------------------------------------------------------------------*/


    </style>

    <title>VINY</title>
  </head>
  <body>
    <div class="top">
      <h1>VINY</h1>
      <button class="button gris ">Accueil</button>
      <div id="menu-deroulant">
        <li><a href="#">Genre</a>
          <ul>
            <li><a href="?genre=rap">Rap</a></li> <!-- ?firstId=0&genre=rap ça c'est cool mais cause des bug sur le nothing-->
            <li><a href="?genre=variété">Variété</a></li>
            <li><a href="?genre=poprock">Poprock</a></li>
            <li><a href="?genre=hardrock">Hardrock</a></li>
            <li><a href="?genre=nothing">Aucun</a></li>
          </ul>
        </li>
      </div>

    </div>

      <?php

      echo "<div class=\"center\">";


        foreach($this->list as $id => $url) {
          echo "<a href=\"../Controler/thisvinyle.ctrl.php?id=", $id, "&firstId=", $this->firstId,"&genre=",$this->genre, "\">
                  <img src=\"http://$url\" alt=\"\" style = \"width:200px; height:200px\">
                </a>";

        }

      echo "</div>";

        echo "<h2>
                  <a href=\"../Controler/shops.ctrl.php?firstId=",$this->prev,"&genre=",$this->genre,"\">
                    <img class=\"arrow\" src=\"../View/gauche.png\" alt=\"\">
                  </a>
                  $this->currentPage
                  <a href=\"../Controler/shops.ctrl.php?firstId=",$this->next,"&genre=",$this->genre,"\">
                    <img class=\"arrow\" src=\"../View/droite.png\" alt=\"\">
                  </a>
              </h2>";


      ?>
  </body>
</html>
