<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <form action="/addPost" method="post" class="form-com">
                    <h1 class="fw-bolder mb-1">Créez un article</h1>

                    <input class="form-control" type="text" name="title" placeholder="Ajoutez un titre" required>
                    <textarea class="form-control" name="content" rows="15" required
                              placeholder="Ajoutez du contenu"></textarea>
                    <input type="hidden">
                    <button class="btn btn-primary btn-form" id="button-add-comment" name="submit" type="submit">Créer l'article
                    </button>
                </form>
            </section>
        </div>
    </div>
</div>
