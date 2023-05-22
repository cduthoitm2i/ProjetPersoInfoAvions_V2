<!--modal-->
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content text-center">
            <div class="modal-header h5 justify-content-center" style="background-color: #e3f2fd;">J'ai oublié mon mot de passe</div>
            <div class="modal-body px-5">
                <p class="py-2">Renseigner votre adresse mail. </p>
                <div class="form-outline">
                    <input type="email" id="typeEmail" class="form-control my-3" value="cduthoit@live.fr" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" required />
                    <label class="form-label" for="typeEmail"><strong>Saisir votre adresse mail&nbsp;:</strong></label>
                </div>
                <a href="./controllers/MotDePasseOublieCTRLEtape2.php" class="btn w-100" style="background-color: #e3f2fd;">Envoyer un nouveau mot de passe</a>
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="./login.php">Login</a>
                    <a class="" href="./signup.php">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>