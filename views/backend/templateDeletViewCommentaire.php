<!-- supprimer commentaire dans la viewCommentaireAdmin.php -->
<div class="warning_container">
    <p>Attention vous êtes sur le point de supprimer ce commentaire !</p>
    <div class="warning_button_container">
        <button class="delete_cancel">Annuler</button>
        <button class="delete_confirm"><a
                href="indexAdmin.php?action=supprimComment&id=<?= $donnees['id'] ?>&idPost=<?= $donnees['id_chapitre'] ?>">Supprimer</a>
        </button>

    </div>
</div>

<script src="public/js/deletComment.js"></script>