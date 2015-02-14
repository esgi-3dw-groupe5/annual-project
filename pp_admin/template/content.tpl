<section class="right-block toggle_user" >
    <h2>Utilisateurs</h2>
    <ul>
        <li><h3>Pseudo</h3><h3 class="email">Email</h3><h3>Role</h3></li>
        <?php  render_contents('users'); ?>
    </ul>
</section>

<section class="right-block toggle_article">
    <h2>Articles</h2>
    <ul>
        <li><h3 class="email">Nom</h3><h3>Catégories</h3></li>
        <?php  render_contents('articles'); ?>
    </ul>
</section>

<section id="toggle_all_comment" class="right-block " >
    <h2>Tous les commentaires </h2>
    <ul>
        <li><h3 class="email">Commentaire</h3><h3>Auteur</h3><h3>Status</h3><h3>Posté le :</h3></li>
        <?php  render_contents('commentaires'); ?>
    </ul>
</section>

<section id="toggle_report_comment" class="right-block">
    <h2>Commentaires Signalés :</h2>
    <ul>
        <li><h3 class="email">Commentaire</h3><h3>Auteur</h3><h3>Status</h3><h3>Posté le :</h3></li>
        <?php  render_contents('report_commentaires'); ?>
    </ul>
</section>

<section class="right-block toggle_theme">
    <h2>Thèmes</h2>
    <ul>
        <li><a href="">thème1</a></li>
        <li><a href="">thème2</a></li>

    </ul>
</section>

