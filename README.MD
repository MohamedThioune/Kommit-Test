# 📖 Kommit Technical Test – Documentation

Ce projet contient un thème WordPress développé sur mesure, accompagné d’une sauvegarde complète du site et des configurations ACF nécessaires à son bon fonctionnement.  
Le but est de permettre une réinstallation facile du projet et de documenter les choix techniques adoptés.

---

## 📦 Composants du fichier ZIP

- **All In One WP**  
  → Fichier de sauvegarde exporté avec le plugin **All-In-One WP Migration**.  
  Il contient la base de données, les médias, les thèmes et les plugins.

- **FichierHTMLStatique**  
  → Rendu statique du projet pour consultation rapide sans installation WordPress.

- **ACF Export – Sept 14 2025**  
  → Fichier d’export du plugin **Advanced Custom Fields**, permettant de restaurer les groupes de champs nécessaires au projet.

---

## 🗂️ Architecture du projet

L’architecture du thème se compose des fichiers et dossiers suivants :

theme/
├── img/ # Images utilisées dans le thème

├── js/ # Scripts JavaScript spécifiques

├── templates/ # Templates personnalisés

├── footer.php # Pied de page du thème
├── functions.php # Fichier principal des fonctions du thème

├── header.php # En-tête du thème

├── index.php # Point d’entrée principal du thème

├── page.php # Template des pages

├── screenshot.png # Capture d’écran du thème (pour l’aperçu WP)

├── single.php # Template des articles (posts)

└── style.css # Feuille de style principale

└── README.MD # READ ME


---

## ⚙️ Installation

1. **Télécharger et installer WordPress**  
   Récupérez la dernière version depuis [wordpress.org](https://wordpress.org).

2. **Installer le plugin "All-In-One WP Migration"**  
   - Depuis le tableau de bord WordPress → Extensions → Ajouter.  
   - Recherchez *All-In-One WP Migration* et installez-le.  

3. **Importer la sauvegarde fournie**  
   - Rendez-vous dans : *All-In-One WP Migration → Importer*.  
   - Sélectionnez le fichier de sauvegarde transmis (`.wpress`).  
   - Attendez la fin du processus et votre site sera prêt.  

4. **Importer les champs ACF**  
   - Activez le plugin **ACF** (Advanced Custom Fields).  
   - Importez le fichier `ACF Export Sept 14 2025` via :  
     *Custom Fields → Tools → Import*.  

---

## 🎯 Stratégie adoptée

Le projet a été pensé pour répondre à deux contraintes principales : **la flexibilité** et **l’absence de licence ACF Pro**.

- **Première section**  
  → Développée avec des **Custom Fields classiques (ACF)**.  
  Cela permet une édition simple et adaptée à la structure souhaitée.

- **Deuxième et troisième section**  
  → Mise en place via des **CPT (Custom Post Types)**.  
  Cette décision a été prise car ACF Pro (et donc le champ **Repeater**) n’était pas disponible.  
  Les CPT ont donc été utilisés pour gérer des ensembles d’éléments répétitifs.

> ⚠️ **Note importante** :  
> Dans un contexte professionnel avec ACF Pro disponible, l’utilisation d’un **Repeater Field** aurait été préférable pour ces sections.  
> Les CPT rendent le processus plus lourd (gestion de plusieurs écrans, relations post-objet, etc.) alors que des repeaters suffisent largement pour gérer ce type de contenu.

---

## ✅ Conclusion

Ce projet est livré sous forme complète (sauvegarde WordPress + export ACF + rendu statique).  
L’architecture respecte les conventions WordPress, et les choix techniques (CPT vs Repeater) découlent de contraintes de licence.  

Il est donc possible de :  
- **Tester rapidement** via le rendu statique,  
- **Restaurer le site** via All-In-One WP Migration,  
- **Adapter le contenu** via les champs ACF importés.
