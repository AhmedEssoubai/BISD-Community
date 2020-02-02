<template>
  <nav class="navbar navbar-expand-lg navbar-light navbar-toggleable-sm">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img :src="logo" class="img-fluid" width="160px" />
      </a>
      <form class="w-50 mw-100 mx-auto" method="GET" action="#">
        <div class="input-group md-form form-sm form-2 bg-light">
          <input
            class="form-control my-0 py-1"
            type="search"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="searchIcon"
          />
          <input type="submit" id="searchButton" value class="input-group-append" />
          <div class="input-group-prepend" id="searchIcon">
            <label for="searchButton" class="input-group-text">
              <i class="fas fa-search text-grey" aria-hidden="true"></i>
            </label>
          </div>
        </div>
      </form>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-3" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link active">Accueil</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Groupes</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Utilisateurs</a>
          </li>
          <li class="nav-item dropdown">
            <img
              src="img/avatar.png"
              id="dml_profil"
              class="img-fluid border border-secondary rounded-circle dropdown-toggle"
              width="50px"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            />
            <div class="dropdown-menu" aria-labelledby="dml_profil">
              <a class="dropdown-item" href="#">Profil</a>
              <a class="dropdown-item" href="#">Paramètres</a>
              <a class="dropdown-item" href="#">Se déconnecter</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import logo from "../../../assets/img/logo.png";
export default {
  data() {
    return { logo };
  }
};
</script>

<style scoped>
.navbar {
  box-shadow: 2px 2px 5px rgb(107, 107, 107);
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
</style>