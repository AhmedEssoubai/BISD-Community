<template>
  <div>
    <!-- <nav class="navbar navbar-light navbar-toggleable-sm">
      <div class="container">
        <a href="accueil.html" class="navbar-brand mr-auto">
          <img src="img/logo.png" class="img-fluid" width="160px" />
        </a>
        <a href="#" class="btn btn-outline-secondary navbar-btn mr-2">Se connecter</a>
        <a href="signin.html" class="btn btn-primary navbar-btn">S'inscrire</a>
      </div>
    </nav>-->

    <section id="login">
      <div class="container">
        <div class="row">
          <div id="forme" class="col-sm-6 offset-sm-6 p-5 my-3">
            <form @submit.prevent="DoLogin" class="pt-5" method="POST">
              <h2 class="mb-5 pt-5 pb-3">Se connecter</h2>
              <div class="form-groupe my-4">
                <label class="control-label" for="email">Email:</label>
                <input
                  id="email"
                  type="email"
                  class="form-control"
                  placeholder="Entrer votre email"
                  v-model="login.email"
                />
              </div>
              <div class="form-groupe my-4">
                <label class="control-label" for="motdepass">Mot de passe:</label>
                <input
                  id="motdepass"
                  type="password"
                  class="form-control"
                  v-model="login.password"
                  placeholder="Entrer votre mot de passe"
                />
              </div>
              <div class="form-groupe mt-5">
                <button type="submit" class="btn btn-primary btn-lg form-control">Se connecter</button>
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
              Vous n'avez pas de compte ? veuillez s'inscrire ici :
              <a href="inscrire" class="_link">S'inscrire</a>
            </h5>
          </div>
        </div>
      </div>
    </section>
    <!-- 
    <footer>
      <div class="border-top border-bottom bg-light">
        <div class="container">
          <div class="row my-3">
            <span class="lead mr-auto my-auto">
              <a class="_link" href="apropos.html">A propos</a>
            </span>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row my-3">
          <img src="img/logo.png" class="img-fluid mr-3" width="160px" />
          <span class="lead mr-auto my-auto">Copyright © 2020</span>
          <img src="img/ensa-tanger.png" class="img-fluid" width="80px" />
        </div>
      </div>
      <div class="bar"></div>
    </footer>-->
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      login: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    async DoLogin() {
      await axios.post("/api/login", this.login);
    }
  }
};
</script>

<style scoped>
</style>