<template>
  <div>
    <section id="login">
        <div class="container">
            <div class="row">
                <div id="forme" class="col-md-6 offset-sm-6 p-5 my-3">
                    <form>
                        <h2 class="mb-5 pt-5 pb-3">
                            S'inscrire
                        </h2>
                        <div class="form-groupe my-3">
                            <label class="control-label" for="nom">Entrez votre nom : </label>
                            <input id="nom" name="nom" type="text" class="form-control" placeholder="Entrer votre prenom" required>
                        </div>
                        <div class="form-groupe my-3">
                            <label class="control-label" for="prenom">Entrez votre prenom : </label>
                            <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Entrez votre prenom" required>
                        </div>
                        <div class="form-groupe my-3">
                            <label class="control-label" for="email">Entrez votre address e-mail : </label>
                            <input id="adresse" name="email" type="text" class="form-control" placeholder="Enrer vote email">
                        </div>
                        <div class="form-group  my-3">
                            <label for="exampleInputPassword1">Mot de passe : </label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                        </div>
                        <div class="form-group  my-3">
                            <label for="exampleInputPassword2">Veuillez confimer votre mot de passe : </label>
                            <input type="password" name="passwordConf" class="form-control" id="exampleInputPassword2" placeholder="">
                        </div>
                        <div class="form-group my-3">
                            <label for="niveau">Niveau</label>
                            <select id="niveau" class="form-control">
                              <option selected>Bisd 1</option>
                              <option>Bisd 2</option>
                            </select>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choisir image</label>
                          </div>
                        <div class="form-groupe mt-5">
                            <button type="submit" class="btn btn-primary btn-lg form-control">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="text-secondary">
                        Si vous possédez déjà un compte. <a href="login" class="_link">Se connecter</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      register: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    async DoRegister() {
      await axios.post("/api/register", this.register);
    }
  }
};
</script>

<style scoped>
</style>