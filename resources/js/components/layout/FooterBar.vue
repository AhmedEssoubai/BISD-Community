<template>
  <footer>
    <div class="border-top border-bottom bg-light">
      <div class="container">
        <div class="row my-3">
          <span class="lead mr-auto my-auto">
            <a class="_link" href="apropos">A propos</a>
          </span>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row my-3">
        <img :src="logo" class="img-fluid mr-3" width="160px" />
        <span class="lead mr-auto my-auto">Copyright © 2020</span>
        <img :src="ensa" class="img-fluid" width="80px" />
      </div>
    </div>
    <div class="bar"></div>
  </footer>
</template>

<script>
import logo from "../../../assets/img/logo.png";
import ensa from "../../../assets/img/ensa-tanger.png";
export default {
  data() {
    return { logo, ensa };
  }
};
</script>
