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
            <form @submit.prevent="DoLogin" class="pt-5" method="POST" action="nouveau-groupe.html">
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
              <a
                href="login.html"
                class="_link"
              >S'inscrire</a>
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
.navbar {
  box-shadow: 2px 2px 5px rgba(107, 107, 107, 0.4);
  opacity: 0.9;
  background: #fff;
}

.navbar .nav-item {
  font-size: 1rem;
  padding-right: 20px;
}

.btn-primary {
  background-color: #0069bb !important;
  border-color: #0069bb !important;
}

.btn-primary:hover {
  background-color: #1e76b0 !important;
  border-color: #1e76b0 !important;
}

.navbar .btn-outline-secondary {
  background-color: transparent !important;
  border-color: rgba(114, 114, 114, 1) !important;
  color: rgba(114, 114, 114, 1) !important;
}

.navbar .btn-outline-secondary:hover {
  background-color: transparent !important;
  border-color: rgba(114, 114, 114, 0.5) !important;
  color: rgba(114, 114, 114, 0.5) !important;
}

._link {
  color: rgba(52, 152, 219, 1);
}

._link:hover {
  color: rgba(52, 152, 219, 0.5);
  text-decoration: none;
}

.bg-gray {
  background-color: rgba(247, 248, 250, 1);
}
.line {
  height: 1px;
  background-color: rgba(50, 50, 55, 0.3);
  /*border-bottom: 1px solid rgba(50, 50, 55, 0.6)*/
  box-shadow: 0 1px 5px rgba(50, 50, 55, 0.2);
}
.errorMessage {
  color: rgb(236, 82, 82);
}
.hiddedElement {
  position: fixed;
  opacity: 0;
}
#searchButton {
  display: none;
}
.list-group a {
  color: rgba(100, 100, 100) !important;
}
.list-group a:hover {
  color: rgba(150, 150, 150) !important;
  text-decoration: none;
}
.list-group .active {
  color: #0069bb !important;
  font-weight: bold;
  background-color: transparent !important;
}
#login {
  background-image: url("../../../assets/img/bg.jpg");
  background-size: cover;
  min-height: 800px;
}

#login .primary-overlay {
  background-color: rgba(52, 152, 219, 0.8);
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

#forme {
  box-shadow: 0 0 20px 2px rgba(50, 50, 50, 0.2);
  background-color: white;
  min-height: 750px;
}
input[type="radio"] {
  position: fixed;
  opacity: 0;
}
.radio-label {
  color: rgb(66, 70, 73, 0.5);
  cursor: pointer;
}
footer img {
  opacity: 0.6;
}

footer .bar {
  height: 10px;
  background-color: #0069bb;
}

footer div {
  border-color: #c9c9c9;
}
</style>