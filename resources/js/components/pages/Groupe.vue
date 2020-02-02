<template>
  <section class="py-5 text-left bg-light" id="groupe">
    <div class="container">
      <div class="row bg-white shadow-sm">
        <div class="col p-0 border">
          <div id="cover"></div>
          <div class="container p-4">
            <div class="row justify-content-between">
              <div class="col-4">
                <h2 class="mb-3">BISD groupe</h2>
                <p class="lead mt-2">Members : 18</p>
              </div>
              <div class="col-2">
                <a class="px-5 py-2 rounded-pill btn btn-primary text-white m-auto">JOIN</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="container">
          <div class="row">
            <NewPost />

            <SideBar />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import NewPost from "./Actions/NewPost";
import SideBar from "../layout/SideBar";

export default {
  components: {
    NewPost,
    SideBar
  }
};
</script>

<style>
</style>