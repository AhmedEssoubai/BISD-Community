<template>
  <!-- POST 1 -->
  <div id="post1" class="bg-white rounded my-5 shadow-sm border">
    <div class="p-3 d-flex align-items-center">
      <a href="#">
        <img :src="data.image" alt="profile image" class="avatare img-fluid rounded-circle" />
      </a>
      <div class="ml-3 d-flex flex-column">
        <a class="_link" href="#">{{ data.compte.nom }}</a>
        <!-- <a class="_sec_link" href="#">
          <span>BISD</span>
        </a>-->
      </div>
    </div>
    <div class="card">
      <img v-if="data.images[0]" :src="data.images[0].chemin" class="card-img-top" alt="post image" />
      <div class="card-body">
        <div class="pb-3">
          <a @click.prevent="Favoris" class="icon mr-3" :href="'#' + data.id">
            <i class="fa fa-heart text-grey active" aria-hidden="true"></i>Like
          </a>
          <a class="icon" href="#">
            <i class="fa fa-bookmark-o text-grey" aria-hidden="true"></i>
          </a>
        </div>
        <h5 class="card-title">Unde laborum quasi porro ea, sint quibusdam dignissimos!</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ data.favorises_user_count}} likes</h6>
        <p class="card-text">{{ ExerpetContent }}</p>
        <p class="card-text">
          <small class="text-muted">{{ data.date_publication }}</small>
        </p>
      </div>
      <div class="card-footer">
        <a href="#">
          <small class="text-muted">{{ data.comments_count}} commetaire</small>
        </a>
      </div>
    </div>
  </div>
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
  },
  computed: {
    ExerpetContent() {
      if (this.data.content) {
        return this.data.content.slice(0, 100) + "...";
      }
    }
  }
};
</script>

<style>
</style>