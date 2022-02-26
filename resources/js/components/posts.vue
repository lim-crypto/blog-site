<template>
  <div class="post-preview">
    <a :href="link">
      <h2 class="post-title">{{ title }}</h2>
      <h3 class="post-subtitle">{{ subtitle }}</h3>
    </a>
    <p class="post-meta">
      Posted by
       {{ posted_by}}
      {{ created_at }}
      <a href="" @click.prevent="likeIt"
        ><small>{{ likeCount }}</small>
        <i class="fas fa-thumbs-up"></i>

        <!-- <i class="fas fa-thumbs-up" v-if="likeCount == 0"></i> -->
        <!-- <i class="fas fa-thumbs-up" style="color:#0085A1;" v-else ></i> -->
      </a>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      likeCount: 0,
      link: "",
    };
  },
  props: [
    "title",
    "subtitle",
    "posted_by",
    "created_at",
    "postId",
    "login",
    "likes",
    "slug",
  ],
  created() {
    (this.likeCount = this.likes), (this.link = "post/" + this.slug);
  },
  methods: {
    likeIt() {
      if (this.login) {
        axios
          .post("/saveLike", {
            id: this.postId,
          })
          .then((response) => {
            if (response.data == "unlike") {
              this.likeCount--;
            } else {
              this.likeCount++;
            }
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        window.location.href = "/login";
      }
    },
  },
};
</script>