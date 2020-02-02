<template>
  <a @click.prevent="Favoris" class="icon mr-3" :href="'#' + data.id">
    <i class="fa fa-heart text-grey active" aria-hidden="true"></i>Like
  </a>
</template>

<script>
import axios from "axios";
import { api_token } from "../../../cfg";
export default {
  props: ["data"],
  methods: {
    Favoris(e) {
      axios.post(
        `/api/${this.$route.params.id}/post/fav/${e.target.hash.replace(
          "#",
          ""
        )}?api_token=${api_token}`
      );
      console.log(e.target.hash.replace("#", ""));
    }
  }
};
</script>

<style>
</style>