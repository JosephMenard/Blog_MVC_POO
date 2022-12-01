<?php
/** @var App\Entity\User $user */
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <form action="login.php" method="POST" class="form-log">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email-login" class="form-control">
                        <label class="form-label" for="email-login">Adresse mail</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password-login" class="form-control">
                        <label class="form-label" for="password-login">Mot de passe</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" id="submit" class="btn btn-primary btn-block mb-4">Se connecter</button>

                    <!-- Register buttons -->
                    <div class="text-center link">
                        <p>Pas encore membre ? <a href="#!">S'inscrire</a></p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
