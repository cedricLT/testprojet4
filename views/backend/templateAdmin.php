<?php

$title = 'Administrateur'; ?>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="Jean Forteroche, un Billet simple pour l'Alaska">
<meta name="keywords" content="Blog, Jean Forteroche, un Billet simple pour l'Alaska">

<!--******************Meta Facebook**************-->
<meta property="og:url" content="">
<meta property="og:site_name" content="Velov.fr">
<meta property="og:description" content="Jean Forteroche, un Billet simple pour l'Alaska">
<meta property="og:title" content="Blog, Jean Forteroche, un Billet simple pour l'Alaska">

<!--******************Meta Twitter**************-->

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Jean Forteroche, un Billet simple pour l'Alaska">
<meta name="twitter:url" content="">
<meta name="twitter:description" content="Blog, Jean Forteroche, un Billet simple pour l'Alaska">


<script type="text/javascript" src="views/backend/tinymce/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // type de mode
        mode: "exact",
        // id ou class, des textareas
        elements: "texte,texte2",
        // en mode avancé, cela permet de choisir les plugins
        theme: "advanced",


        // langue
        language: "fr",

        // liste des plugins
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // les outils à afficher
        theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,|,bullist,numlist,|,link,unlink,image,cleanup,code,|,forecolor,backcolor,save",

        // emplacement de la toolbar
        theme_advanced_toolbar_location: "top",
        // alignement de la toolbar
        theme_advanced_toolbar_align: "left",
        // positionnement de la barre de statut
        theme_advanced_statusbar_location: "bottom",
        // permet de redimensionner la zone de texte
        theme_advanced_resizing: true,

        // chemin vers le fichier css
        content_css: "views/backend/tinymce/design-tiny.css",
        // taille disponible
        theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px",
        // couleur disponible dans la palette de couleur
        theme_advanced_text_colors: "33FFFF, 007fff, ff7f00",
        // balise html disponible
        theme_advanced_blockformats: "h1, h2,h3,h4,h5,h6",
        // class disponible
        theme_advanced_styles: "views/backend/tinymce/design-tiny.css"
        // possibilité de définir les class et leurs styles directement avec le code suivant
        /*
        style_formats : [
            {title : \'Bold text\', inline : \'b\'},
            {title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
            {title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
            {title : \'Example 1\', inline : \'span\', classes : \'example1\'},
            {title : \'Example 2\', inline : \'span\', classes : \'example2\'},
            {title : \'Table styles\'},
            {title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
        ],
        */
    });
</script>
