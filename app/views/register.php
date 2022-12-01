<?php
/** @var App\Entity\User $user */
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <form action="register.php" method="POST" class="form-log">
                    <div class="form-outline mb-4">
                        <input type="text" id="prenom-register" class="form-control">
                        <label class="form-label" for="prenom-register">Prénom</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="nom-register" class="form-control">
                        <label class="form-label" for="nom-register">Nom</label>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email-register" class="form-control">
                        <label class="form-label" for="email-register">Adresse mail</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password-register" class="form-control">
                        <label class="form-label" for="password-register">Mot de passe</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">S'inscrire</button>

                    <!-- Register buttons -->
                    <div class="text-center link">
                        <p>Déjà membre ? <a href="#!">Se connecter</a></p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
