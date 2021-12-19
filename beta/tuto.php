<?php include('isdefault.php') ?>
<?php
if(!IsVIP($_SESSION['id'])){
  die("Only VIP");
}




?>
<style type="text/css">
	.reds{
		color: red;
	}
	.greens{
		color: green;
	}
	.oranges{
		color: orange;
	}
	input[type=file] {
  background-color: #3CBC8D;
  color: white;
}
</style>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><center><font color="white">
                            <?php if (!$_GET['n']){ ?>
        <div class="col-lg-12 col-xs-12">
  <div class="box-content" align="center">
  <h4 class="box-title">Listes des tutoriels</h4>
  <h3><a href="tuto.php?n=1">🐍 Zone de Propagation</a></h3>
  <h3><a href="tuto.php?n=2"><img src="https://i.imgur.com/GFuljUJ.png" width="25" height="25">&nbsp;&nbsp;Devenir un bon "Manipulateur"</a></h3>
  <h3><a href="tuto.php?n=3"><img src="https://i.imgur.com/nrKKIt3.png" width="25" height="25">&nbsp;&nbsp;Comment infecter un addon</a></h3>
  </div>
  </div>
<?php }elseif($_GET['n'] == 1){ ?>
    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><center><font color="white">
<div class="col-xs-12">
<div class="box-content">
<div align="center"><h4 class="box-title">🐍 Zone de Propagation</h4></div>
<p class="lead">👀  En tant que membre de Ghackdoor vous pouvez 
participer activement au développement de celui-ci (ou plus précisément 
son emprise) , voici donc un listing officiel de zone potentiel 
d'infection sur lequel il faut en priorité s'intéresser</p>
<p><img src="https://i.imgur.com/z7LSFMK.png" width="32" height="32"> <ins><b>RaidForum</b></ins></p>
<p><i class="fa fa-gears"></i> <b>Link:</b> <a href="https://raidforums.com/Forum-Garry-s-Mod" target="_blank">https://raidforums.com/Forum-Garry-s-Mod</a></p>
<p><i class="fa fa-newspaper-o"></i> <b>Description:</b> Semble être 
essentiellement tourné sur le leak, leur catégorie leak sur gmod 
rappelle un poil ce qu'était LeakForum avant de fermer définitivement 
cet aspect du site.</p>
<p><img src="https://i.imgur.com/gfPCY1N.png" width="32" height="32"> <ins><b>CodeFodder</b></ins></p>
<p><i class="fa fa-gears"></i> <b>Link:</b> <a href="https://codefodder.store/" target="_blank">https://codefodder.store</a></p>
<p><i class="fa fa-newspaper-o"></i> <b>Description:</b> L'équipe de 
Citizen a une haine profonde contre gmodstore, ils ont déclaré que selon
 eux le marché d'addons a tué un aspect du jeu, libre à chacun de le 
voir de ce point de vue en attendant pour les titiller ils ont décidé de
 promouvoir cette plateforme qui se définit comme un site d'addons 
gratuit à des fins d'utilisation légitimes... aucune modération n'est 
effectuée sur l'analyse du code il est donc monnaie courante que 
quasiment l'intégralité des addons là-bas soit backdoor cependant 
certains persistée à juste délivrer des addons gmodstore legit.</p>
<p> <ins><b>Leakforum Forum Actif</b></ins></p>
<p><i class="fa fa-gears"></i> <b>Link:</b> <a href="http://leakforum.forumactif.com/f1-addons-gmod-leak" target="_blank">http://leakforum.forumactif.com/f1-addons-gmod-leak</a></p>
<p><img src="https://i.imgur.com/6iWHWL3.png"> <ins><b>NulledBB</b></ins></p>
<p><i class="fa fa-gears"></i> <b>Link:</b> <a href="https://nulledbb.com/forum-Garry-s-Mod-Leaks" target="_blank">https://nulledbb.com/forum-Garry-s-Mod-Leaks</a></p>
<p><img src="https://i.imgur.com/3yzGUFx.png"> <ins><b>Ihax</b></ins></p>
<p><i class="fa fa-gears"></i> <b>Link:</b> <a href="https://ihax.fr/forums/garrys-mod.53/" target="_blank">https://ihax.fr/forums/garrys-mod.53/</a></p>
<div align="right">Tutoriel par Yoh Sambre</div>
</div>
</div>
</div>
</div>
</div>
<?php }elseif ($_GET['n'] == "2") { ?>
    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><center><font color="white">
  <div class="col-xs-12">
<div class="box-content">
<div align="center"><h4 class="box-title"><img src="https://i.imgur.com/GFuljUJ.png" width="18" height="18">&nbsp;&nbsp;Devenir un bon "Manipulateur"</h4></div>
<p class="lead">Voici des façons de faire en cas de visite d'une zone 
potentiellement infectable mais remplie d'obstacles (Aka comment agir 
quoi)</p>
<p><img src="https://i.imgur.com/02J4Rgn.png" width="25" height="25"> <b>Ne foncez pas comme un bourrin avec une phrase toute faite depuis des mois</b></p>
<p><img src="https://i.imgur.com/g3OqL5R.png" width="18" height="18"> Ouai salut, on peut enlever les armes des joueurs tape ça dans ta console!</p>
<p><img src="https://i.imgur.com/odt3YlO.png" width="18" height="18">
 Merci du Tp, je voulais juste t'avertir qu'un mec me parler de cheat 
y'a 2 minutes, tu devrais installer un anticheat (il est intéressant de 
faussement s'impliquer ainsi car il est *rare* qu'un fondateur achète 
instantanément un anticheat à 10/20 euros, dirigez lentement la 
conversation sur une autre plateforme en priver pour avoir une certaine 
intimité/tranquillité pour réussir à convaincre la personne de prendre 
en leak sans vraiment le dire &gt; un simple "bon au pire tu peux le 
trouver gratuit de toute façon" &gt; si le fondateur se dirige vers CH 
où une autre plate-forme de leak faite votre possible pour lui indiquer 
le lien d'un topic ou plus précisément devait votre ou le script est 
bien évidemment infecté)</p>
<br>
<p><img src="https://i.imgur.com/8go0d2u.png" width="25" height="25"> <b>En
 cas de dérangement par un autre joueur (ça peut arriver) ne perdez pas 
le contrôle de la situation &gt; vous avez commencé la discussion en 
installent un dialogue important il est donc primordial de conserver une
 confiance en soi et une attitude naturelle</b></p>
<p><b><ins>EXEMPLE DE MISE EN SITUATION:</ins></b> Un joueur s'incruste 
dans la conversation et préviens le fondateur des dangers des addons 
gratuits (insinuant que vous essayer de le piéger).</p>
<p><img src="https://i.imgur.com/g3OqL5R.png" width="18" height="18">
 Mais mec haha n'importe quoi pff tes con, je lui dis juste 
**blablabla** (à peine la fin de votre première phrase c'est déjà 
quasiment terminer...plus personne ne vous écoute concrètement &gt; le 
fondateur va être sur ses gardes et il va être bien plus complexe et 
long de se faire une place)</p>
<p><img src="https://i.imgur.com/odt3YlO.png" width="18" height="18">
 Bon déja calme toi, si j'étais un "hacker" comme tu dis je ne serais 
pas ici hein je serais en train de faire apparaitre des squelettes 
merdiques sur l'écran des joueurs ailleurs, là tu vois j'essaye juste 
d'aider un mec qui justement risque de tomber sur des connards 
(définissez les gens qui cheat ou "hack" de manière négative sans pour 
autant en faire trop ça passe comme une blague sur les Roumains dans 
garry's mod) , donc bon tes gentil mais la tu nous gène plus qu'autre 
chose.</p>
<br>
<p><img src="https://i.imgur.com/fqCsUtz.png" width="25" height="25"> <b>Gardez
 votre sang-froid, si vous réussissez à avoir un access FTP (déjà 
félicitations) mais ne pas gâcher cette chance avec des choses futiles 
qui vous feront griller comme étant une personne malveillante. (un 
compte FTP ça se supprime vite ^^ )</b></p>
<p><img src="https://i.imgur.com/g3OqL5R.png" width="18" height="18">
 Le fondateur vous donne les access pour faire des choses minimes (ne 
vous lancez pas comme cofonda à devoir faire des fichiers considérables,
 la rentabilité est bien trop faible.</p>
<p><img src="https://i.imgur.com/odt3YlO.png" width="18" height="18">
 Contentez-vous de proposer une aide légère comme l'installation des 
addons du workshop inutile dans la collection du serveur (#extraction) 
c'est assez rapide à faire via &gt; <a href="https://steamworkshopdownloader.io/">SteamWorkshopDownloader</a></p>
<div align="right">Tutoriel par Yoh Sambre</div>
</div>
</div>
</div>
</div>
</div>
<?php }elseif ($_GET['n'] == "3") { ?>
    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><center><font color="white">
     <div class="col-xs-12">
<div class="box-content">
<div align="center"><h4 class="box-title"><img src="https://i.imgur.com/GFuljUJ.png" width="18" height="18">&nbsp;&nbsp;L'infection d'addon</h4></div>
<p class="lead">Voici les différentes méthode d'ajout d'un serveur dans votre liste Ghackdoor</p>
<p>Les 3 méthodes les plus connu d'injection sont les suivantes:
</p><ul>
<li>La backdoor permanante (aka le script backdoor)</li>
<li>Le luarun (qui est une infection temporaire)</li>
<li>Les exploits d'execution de code qui sont bien plus compliquer à trouver.</li>
</ul>
<p>Mais on va plutôt essayer d'appréhender la première méthode qui est 
une des plus efficaces et qui donc la plus connue des fondateurs de 
serveur.</p>
<p><b><u>VERSION SIMPLE</u></b></p>
<ul>
<li>Télécharger un addon que vous voulez potentiellement infecter.</li>
<li>Ensuite essayer de trouver le côté serveur de l'addon qui est souvent
 dans le dossier lua/autorun/server et prenez un fichier au hasard dans 
ce dossier.</li>
<li>Suite à cela prenez votre code d'infection sur votre dashboard et 
obfusquer le grâce à l'obfuscator ensuite mettez-le simplement à la fin 
du fichier.</li>
<li>Puis rendez-vous dans le tutoriel sur les zones de propagations pour optimiser au mieux vos chances d'infections.</li>
</ul>
<div align="right">Tutoriel par Keeta</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
	
</div>
                            </font>
                        </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 <a href="https://colorlib.com/wp/templates/">G(bl)Hackdoor</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('isdefault_down.php') ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>

<?php

?>