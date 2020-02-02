<template>
  <div class="border-top mt-4 pt-4">
    <form @submit.prevent="AddComment" method="POST" action>
      <textarea
        v-model="comment.content"
        class="form-control"
        rows="3"
        placeholder="Ajouter un commentaire..."
      ></textarea>
      <input type="submit" class="my-3 form-control" value="Publier" />
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { api_token } from "../../../cfg";

export default {
  props: ["data"],
  data() {
    return {
      comment: {
        content: ""
      }
    };
  },
  methods: {
    async AddComment() {
      await axios.post(
        `/api/${this.$route.params.groupe}/comments/${this.$route.params.id}?api_token=${api_token}`,
        this.comment
      );
    }
  }
};
</script>

<style>
</style>