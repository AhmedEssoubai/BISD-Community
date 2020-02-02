<template>
  <footer>
    <div class="border-top border-bottom bg-light">
      <div class="container">
        <div class="row my-3">
          <span class="lead mr-auto my-auto">
            <a class="_link" href="#">A propos</a>
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
  </footer>
</template>

<script>
export default {};
</script>

<style scoped>
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