 ######   #######     #     ######       #     #  #######     
 #     #  #          # #    #     #      ##   ##  #           
 #     #  #         #   #   #     #      # # # #  #           
 ######   #####    #     #  #     #      #  #  #  #####       
 #   #    #        #######  #     #      #     #  #           
 #    #   #        #     #  #     #      #     #  #           
 #     #  #######  #     #  ######       #     #  #######     

Salut ! si tu lit ce fichier c'est que tu as surement télécharger la dernière version de G(bl)HackDoor !

Merci de suivre attentivement les étapes ci dessous pour procéder à l'installation.

1 - Trouver un hébergement WEB ou alors un VPS, nous vous conseillons de prendre un VPS chez skoali il fera largement l'affaire. (http://skoali.fr/)
Si vous utilisez un VPS penser à installer (https://www.phpmyadmin.net/) voici un tutoriel pour vous aider (https://www.javahelps.com/2018/10/install-mysql-with-phpmyadmin-on-ubuntu.html)
2 - Accèdez au FTP via "Filezilla" pour glisser l'intégralité des fichiers fournit. (https://filezilla-project.org/)
3 - Obtenez un nom de domaine pour le relier à votre site web. Pour des noms de domaines gratuit voici un site web 
proposant les extensions suivantes gratuitement : .ml / .tk / .ga / .gq ... (https://freenom.com/)
4 - Une fois que les 3 étapes ont étés réalisés accèdez à votre site par exemple (https://paneldeouf.ga/) et remplissez les informations demander.
5 - Vous avez terminer l'installation de la database ainsi que des fichiers de G(bl)HackDoor. Il nous vous restez plus qu'a accèdez aux payloads 
pour modifier le liens des musiques ou autres. (http://votresite.ga/beta/payload_list.php) Il vous suffit de cliquer sur EDITER et le code apparaitra.


- INSTALLATION PHPMYADMIN, Apache2 & PHP

Étape 1:
Exécutez la commande suivante à partir du terminal pour installer Apache Server.
sudo apt install apache2

Étape 2:
Démarrez le serveur Apache à l'aide de la commande suivante et visitez http://votresite.fr/ pour voir si le serveur Apache fonctionne. Si vous obtenez « Page par défaut Apache2 Ubuntu », votre serveur Apache est prêt.

sudo service apache2 start

Étape 3:
Installez PHP avec les modules supplémentaires requis par phpMyAdmin.
sudo apt install php php-gettext libapache2-mod-php

Étape 4:
Installez MySQL.
sudo apt install mysql-server

Étape 5:
Essayez de vous connecter à MySQL en utilisant la racine mysql -u. Si vous obtenez un message d'erreur indiquant " ERREUR 1045 (28000): accès refusé à l'utilisateur 'root' @ 'localhost' (en utilisant le mot de passe: NO) ", procédez comme suit. Sinon, continuez à partir de l'étape 6.


5.1: Connectez - vous à MySQL avec sudo.
sudo mysql -u root

5.2: Sélectionnez la base de données mysql.
mysql> USE mysql;

5.3: Mettre à jour la base de données pour utiliser le mysql_native_passwordplugin pour l'utilisateur root.
mysql> UPDATE user SET plugin='mysql_native_password' WHERE User='root';
mysql> FLUSH PRIVILEGES;

5.4: Quittez MySQL.
mysql> exit;

5.5: Redémarrez le serveur MySQL.
sudo service mysql restart

Étape 6:
Installez phpMyAdmin.
sudo apt install phpmyadmin

Répondez oui à " Configurer la base de données pour phpmyadmin avec dbconfig-common? "
Sélectionnez apache2 (en appuyant sur espace) lorsque vous êtes invité à sélectionner " serveur Web pour reconfigurer automatiquement "


Étape 7:
redémarrez le serveur Apache.
sudo service apache2 restart


Étape 8:
visitez http://votesire.fr/phpmyadmin .

Étape 9:
Créer une DataBase du nom que vous souhaitez et retenez le nom pour l'installation par exemple (ghack).


Pour tout autres demande ou aide merci de contacter : Alex.#7331 & Reiko#8698 sur discord.

Aucune aide ne serra fournit si vous n'avez pas d'argent, même pas la peine de nous contacter


:::::::::  :::::::::::  ::::::::   ::::::::  :::    :::  ::::::::  
:+:    :+:     :+:     :+:    :+: :+:    :+: :+:    :+: :+:    :+: 
+:+    +:+     +:+     +:+        +:+    +:+ +:+    +:+ +:+        
+#++:++#+      +#+     +#++:++#++ +#+    +:+ +#+    +:+ +#++:++#++ 
+#+    +#+     +#+            +#+ +#+    +#+ +#+    +#+        +#+ 
#+#    #+#     #+#     #+#    #+# #+#    #+# #+#    #+# #+#    #+# 
#########  ###########  ########   ########   ########   ########  

