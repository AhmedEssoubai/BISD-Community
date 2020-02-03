<template>
  <div id="newPost" class="bg-white p-3 shadow-sm border">
    <form @submit.prevent="AddPost">
      <h3 class="mb-3">Nouveau post</h3>
      <input type="text" name="title" class="form-control my-2" placeholder="Titre du post"/> 
      <textarea
        class="form-control my-2"
        v-model="post.content"
        name="content"
        rows="4"
        placeholder="Partager vos idées"
      ></textarea>
      <div class="custom-file my-2">
        <input
          type="file"
          name="image"
          @change="PushFiles"
          class="custom-file-input"
          id="postImage"
          multiple="multiple"
        />
        <label class="custom-file-label" for="postImage">Choisir image</label>
      </div>
      <label class="label" for="tags">Tags (Separated by comma ',')</label>
      <input
        type="text"
        id="tags"
        name="tags"
        v-model="post.tags"
        class="form-control my-2"
        placeholder="Tags ex: c, php, java etc..."
      />
      <button type="submit" class="btn btn-primary form-control my-2">Publier</button>
    </form>
  </div>
</template>

<script>
function init() {
  return {
    post: {
      content: "",
      images: [],
      tags: []
    }
  };
}
import axios from "axios";
export default {
  data() {
    return init();
  },
  methods: {
    PushFiles(e) {
      for (let i = 0; i < e.target.files.length; i++) {
        let reader = new FileReader();
        reader.onloadend = () => {
          this.post.images.push(reader.result);
        };
        reader.readAsDataURL(e.target.files[i]);
      }

      console.log(this.post.images, e.target.files.length);
    },
    ConvertTags() {
      return this.post.tags.split(/, +/);
    },
    async AddPost() {
      const api_token =
        "45KOKqvLjLPFoQ2YbVcj5tLVFYTSEB43xZsJ0WHJKRND1GWozdQNF20OYJkOQzLpzKsYktgrymXXMtbH";
      this.post.tags = this.ConvertTags();
      await axios.post(
        `/api/${this.$route.params.id}/post?api_token=${api_token}`,
        this.post
      );
      const initalState = init();
      this.post = initalState.post;
    }
  }
};
</script>

<style>
</style>