<?php
/** @var App\Entity\User $user */
/** @var App\Entity\Post[] $post */
/** @var App\Entity\Comment[] $comments */
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1"><?=$post->getTitle()?></h1>
                    <div class="text-muted fst-italic mb-2">Posté le <?=$post->getDate()?> par <?=$post->getAuthor()?></div>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?=$post->getContent()?></p>
                </section>
            </article>
            <?php if(isset($admin)){ ?>
                <div class="link link-update">
                    <a href="/update/<?=$post->getId()?>">
                        Modifier l'article
                    </a>
                </div>
                <div class="link link-delete">
                    <a href="/delPost/<?=$post->getId()?>">
                        Supprimer l'article
                    </a>
                </div>
            <?php }?>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h2 class="card-title h4">Commentaires</h2>
                            <?php if (!$comments){?>
                                <p class="fs-5 mb-4">Il n'y a pas de commentaire pour l'instant</p>
                            <?php }?>
                            <div class="btn btn-primary" id="button-comment">
                                <a href="/comment/<?=$post->getId()?>/0">
                                    Ecrire un commentaire
                                </a>
                            </div>
                        </div>
                        <!-- Comment with nested comments-->
                        <div class="mb-4 comments">
                            <?php foreach ($comments as $comment) {
                                if (($comment->getIdComment() == NULL)){
                                    ?>
                                    <div class="comments-bloc">
                                        <!-- Parent comment-->
                                        <div class="mt-4">
                                            <div class="fw-bold"><?= $comment->getAuthor() ?></div>
                                            <p><?= $comment->getContent() ?></p>
                                            <div class="text-muted fst-italic mb-2">Posté le <?= $comment->getDate() ?></div>
                                            <div class="d-flex mt-4 comments-link">
                                                <div class="link">
                                                    <a href="/comment/<?=$post->getId()?>/<?=$comment->getId()?>">
                                                        Répondre
                                                    </a>
                                                </div>
                                                <?php if(isset($admin)){ ?>
                                                <div class="link link-delete">
                                                    <a href="/delComment/<?=$post->getId()?>/<?=$comment->getId()?>">
                                                        Supprimer
                                                    </a>
                                                </div>
                                                <div class="link link-update">
                                                    <a href="/update/<?=$post->getId()?>/<?=$comment->getId()?>">
                                                        Modifier
                                                    </a>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>

                                        <!-- Child comment-->
                                        <?php foreach ($commentsAnswer as $commentAnswer) {
                                            if ($comment->getId() == $commentAnswer->getIdComment()) {
                                                ?>
                                                <div class="d-flex mt-4">
                                                    <div class="ms-3">
                                                        <div class="fw-bold"><?= $commentAnswer->getAuthor() ?></div>
                                                        <p><?= $commentAnswer->getContent() ?></p>
                                                        <div class="text-muted fst-italic mb-2">Posté
                                                            le <?= $commentAnswer->getDate() ?></div>
                                                        <div class="d-flex mt-4 comments-link">
                                                            <!--<div>
                                                                <a href="/comment/<? /*=$post->getId()*/ ?>/<? /*=$commentAnswer->getId()*/ ?>">
                                                                    Répondre
                                                                </a>
                                                            </div>-->
                                                            <?php if (isset($admin)) { ?>
                                                                <div class="link link-delete">
                                                                    <a href="/delComment/<?= $post->getId() ?>/<?= $commentAnswer->getId() ?>">
                                                                        Supprimer
                                                                    </a>
                                                                </div>
                                                                <div class="link link-update">
                                                                    <a href="/update/<?= $post->getId() ?>/<?= $commentAnswer->getId() ?>">
                                                                        Modifier
                                                                    </a>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
