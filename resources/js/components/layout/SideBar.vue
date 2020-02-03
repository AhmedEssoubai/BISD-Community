<template>
  <!--Groupes list-->
  <div class="col-md-4">
    <div class="bg-white py-3 shadow-sm border">
      <h5 class="mx-3">Votre groupes</h5>
      <div class="list-group py-3">
        <a href="#" class="list-group-item d-flex align-items-center">
          <img class="img-fluid groupe-icon mr-3" :src="gimg"/>
          BISD
        </a>
      </div>
      <div class="text-center">
        <a href="groupes-appartiens.html" class="_link px-3">Afficher tous</a>
      </div>
    </div>
  </div>
</template>

<script>
import gimg from "../../../assets/groupe/group-0.png";
export default {
  data() {
    return { gimg };
  }
};
</script>

<style>
</style>