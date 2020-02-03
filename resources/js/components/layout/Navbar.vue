<template>
  <nav class="navbar navbar-expand-lg navbar-light navbar-toggleable-sm">
    <div class="container">
      <a href="/" class="navbar-brand">
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
            <a href="group/id=1" class="nav-link active">Accueil</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Groupes</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Utilisateurs</a>
          </li>
          <li class="nav-item dropdown">
            <img
              :src="avatar"
              id="dml_profil"
              class="img-fluid border border-secondary rounded-circle dropdown-toggle"
              width="50px"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            />
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dml_profil">
              <a class="dropdown-item" href="#">Profil</a>
              <a class="dropdown-item" href="#">Paramètres</a>
              <a class="dropdown-item" href="logout">Se déconnecter</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import logo from "../../../assets/img/logo.png";
import avatar from "../../../assets/img/avatar.png";
export default {
  data() {
    return { logo, avatar };
  }
};
</script>