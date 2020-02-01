<template>
  <section class="py-5 text-left bg-light" id="newGroupe">
    <div class="container">
      <div class="row">
        <div class="col-md-5 p-5 my-3 bg-white shadow">
          <h2 class="mb-2 pb-3">Créer votre groupe maintenant !</h2>
          <ul>
            <li class="py-2">Partager vos connaissence avec les membres du groupe.</li>
            <li class="py-2">Vous pouvez mettre le groupe privée ou public selon votre choix.</li>
            <li class="py-2"></li>
          </ul>
        </div>
        <div id="forme" class="col-md-5 offset-sm-1 p-5 my-3 bg-white shadow">
          <AddGroupe />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import AddGroupe from "./Actions/AddGroupe";
export default {
  components: {
    AddGroupe
  }
};
</script>

<style>
</style>
