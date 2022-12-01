<?php
/** @var App\Entity\User $user */
/** @var App\Entity\Post[] $posts */
?>

<div class="container">
    <h1>Bienvenue sur le Blog des Champ'Amis ! 🍄</h1>
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Nested row for non-featured blog posts-->
            <div class="row blog">
                <!-- Blog post-->
                <?php
                foreach ($posts as $post) {
                    ?>
                    <a href="/post/<?= $post->getId()?>" class="card mb-4">
                        <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"/>
                        <div class="card-body">
                            <div class="small text-muted"><?= $post->getDate() ?></div>
                            <h2 class="card-title h4"><?= $post->getTitle() ?></h2>
                            <p class="card-text"><?= $post->getContent() ?></p>
                            <div class="btn btn-primary">Lire plus</div>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>






