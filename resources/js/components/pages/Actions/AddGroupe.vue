<template>
  <form @submit.prevent="addGroup">
    <h2 class="mb-5 pt-5 pb-3">Nouveau groupe</h2>
    <div class="form-groupe my-3">
      <label class="control-label" for="label">Nom de groupe</label>
      <input
        v-model="group.nom"
        id="nom"
        type="text"
        class="form-control"
        placeholder="Enter une label"
        required
      />
    </div>
    <div class="form-group my-3">
      <label for="etat">Icon</label>
      <select v-model="group.icon" class="form-control">
        <option value="-1" selected>Chose Icon</option>
        <option value="0">Icon 0</option>
        <option value="1">Icon 1</option>
        <option value="2">Icon 2</option>
        <option value="3">Icon 3</option>
        <option value="4">Icon 4</option>
        <option value="5">Icon 5</option>
        <option value="6">Icon 6</option>
      </select>
    </div>
    <div class="form-group my-3">
      <label for="etat">État</label>
      <select v-model="group.etet" id="etat" class="form-control">
        <option value="public" selected>Public</option>
        <option value="private">Privé</option>
      </select>
    </div>
    <div class="form-groupe mt-5">
      <button type="submit" class="btn btn-primary btn-lg form-control">Créer</button>
    </div>
  </form>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      group: {
        nom: "",
        icon: 0,
        etat: "Public"
      }
    };
  },
  methods: {
    async addGroup() {
      const api_token =
        "45KOKqvLjLPFoQ2YbVcj5tLVFYTSEB43xZsJ0WHJKRND1GWozdQNF20OYJkOQzLpzKsYktgrymXXMtbH";

      console.log("Submit");
      const result = await axios.post(
        `/api/groupe?api_token=${api_token}`,
        this.group
      );
    }
  }
};
</script>

<style>
</style>
