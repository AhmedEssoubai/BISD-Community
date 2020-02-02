<template>
  <div class="border-top mt-4 pt-4">
    <form method="POST" action>
      <input value="100" name="postId" hidden />
      <textarea class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
      <input type="submit" class="my-3 form-control" value="Publier" />
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { api_token } from "../../../cfg";

export default {
  props: ["data"],
  methods: {
    AddComment() {}
  }
};
</script>

<style>
</style>