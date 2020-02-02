<template>
  <li class="media my-4">
    <img :src="avatar" class="mr-3 com-avatare rounded-circle" alt="avatar" />
    <div class="media-body">
      <h5 class="mt-0 mb-3">
        <a href="#" class="_link">{{ fullname }}</a>
      </h5>
      <p>{{ data.content }}</p>
      <small class="text-muted">{{ data.date_publication }}</small>
    </div>
  </li>
</template>

<script>
export default {
  props: ["data"],
  mounted() {
    console.log(this.data);
  },
  computed: {
    fullname() {
      return this.data.user
        ? `${this.data.user.nom} ${this.data.user.prenom}`
        : "";
    },
    avatar() {
      return this.data.user ? this.data.user.image : "";
    }
  }
};
</script>

<style>
</style>