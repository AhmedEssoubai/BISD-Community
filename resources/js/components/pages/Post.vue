<template>
  <section class="py-5 text-left bg-light" id="groupe">
    <div class="container">
      <div class="row bg-white shadow border">
        <div class="col p-0">
          <div class="p-3 d-flex align-items-center">
            <a href="#">
              <img :src="avatar" alt="profile image" class="avatare img-fluid rounded-circle" />
            </a>
            <div class="ml-3 d-flex flex-column">
              <a class="_link" href="#">{{ fullName }}</a>
              <a class="_sec_link" href="#">
                <span>BISD</span>
              </a>
            </div>
          </div>
          <div class="card">
            <img v-if="post.data" :src="images[0]" class="card-img-top" alt="post image" />
            <div class="card-body">
              <div class="pb-3">
                <Favorise v-if="post.data" :data="post.data"></Favorise>
                <a class="icon" href="#">
                  <i class="fa fa-bookmark-o text-grey" aria-hidden="true"></i>
                </a>
              </div>
              <h5 class="card-title">Unde laborum quasi porro ea, sint quibusdam dignissimos!</h5>
              <h6
                class="card-subtitle mb-2 text-muted"
                v-if="post.data"
              >{{ post.data.favorises_user_count }} likes</h6>
              <p class="card-text" v-if="post.data">{{ post.data.content }}</p>
              <p class="card-text">
                <small class="text-muted" v-if="post.data">{{ post.data.date_publication }}</small>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-muted" v-if="post.data">{{ post.data.comments_count }} commintes</small>
            </div>
          </div>
          <div class="p-4">
            <ul class="list-unstyled">
              <Comment v-for="(comment, i) in comments" :data="comment" :key="i"></Comment>
            </ul>
            <AddComment></AddComment>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import AddComment from "./Actions/AddComment";
import Comment from "./Child/Comment";
import axios from "axios";
import { api_token } from "../../cfg";
import Favorise from "./Child/Favorise";

export default {
  data() {
    return {
      post: {}
    };
  },
  components: {
    AddComment,
    Comment,
    Favorise
  },
  methods: {
    async GetPost() {
      const res = await axios.get(
        `/api/${this.$route.params.groupe}/post/${this.$route.params.id}?api_token=${api_token}`
      );

      this.post = res;
    }
  },
  mounted() {
    this.GetPost();
  },
  computed: {
    avatar() {
      return this.post.data ? this.post.data.compte.image : "";
    },
    fullName() {
      return this.post.data
        ? `${this.post.data.compte.nom} ${this.post.data.compte.prenom}`
        : "";
    },
    images() {
      return this.post.data ? this.post.data.images : [];
    },
    comments() {
      return this.post.data ? this.post.data.comments : [];
    }
  }
};
</script>

<style>
</style>