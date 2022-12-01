<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <form action="/addComment/<?= $postId ?>/<?= $postComment ?>" method="post" class="form-com">
                    <h1 class="fw-bolder mb-1">Laissez un commentaire</h1>
                    <textarea class="form-control" name="content" rows="6" required
                              placeholder="Laissez un commentaire ici"></textarea>
                    <input type="hidden">
                    <button class="btn btn-primary btn-form" id="button-add-comment" name="submit" type="submit">Envoyer le
                        commentaire
                    </button>
                </form>
            </section>
        </div>
    </div>
</div>
