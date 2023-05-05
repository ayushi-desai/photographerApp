<template>
  <div class="header">
    <div class="sign-out">
      <button class="logout-btn" @click="logout">Sign Out</button>
    </div>
  </div>
  <div class="wrapper">
    <div class="profile-div">
      <div class="profile-pic">
        <img src="@/assets/profile.jpeg" alt="Profile picture">
      </div>
      <div class="profile-details">
        <h1 class="profile-title text-grey">{{ user ? user.name : '' }}</h1>
        <p class="profile-bio text-grey">Bio</p>
        <h2 class="profile-bio-desc text-grey">{{ user ? user.bio : '' }}</h2>
      </div>
      <div class="contact-details">
        <p class="text-grey contact-title">Phone</p>
        <p class="text-pink c-detail">{{ user ? user.phone : '' }}</p>
        <p class="text-grey contact-title">Email</p>
        <p class="text-pink c-detail">{{ user ? user.email : '' }}</p>
      </div>
    </div>
    <div class="album-div">
      <div class="card" v-for="(album, index) in albumData" :key="index">
        <div class="card-banner">
          <img class="banner-img" v-bind:src="album.album_image" alt=''>
        </div>
        <div>
          <p class="category-tag">{{ album.title }}</p>
        </div>
        <div class="card-body">
          <h2 class="blog-title">{{ album.description }}</h2>
          <div class="album-details">
            <img class="feature-content" src="@/assets/fillheart.png" />
            <p class="album-date">{{ album.album_date }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
#app {
  margin: none;
}

.wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.card {
  flex-basis: calc(25.55%);
  margin: 5px;
  background-color: #ccc;
  overflow: hidden;
  background: white;
  border-radius: 0.5rem;
  position: relative;
  margin: 1rem;
  transition: 250ms all ease-in-out;
  cursor: pointer;
}

.logout-btn {
  background-color: #ffffff;
  color: #ff6c61;
  border: none;
  width: max-content;
  border-radius: 3px;
  padding: 10px 8%;
  margin-top: 20px;
}

.banner-img {
  position: absolute;
  object-fit: cover;
  height: 14rem;
  width: 100%;
}

.category-tag {
  font-size: 1rem;
  font-weight: bold;
  color: white;
  /* padding: 0.5rem 1.3rem 0.5rem 1rem; */
  margin: 15rem 1.3rem 0.5rem 1rem;
  position: relative;
  z-index: 1;
  bottom: 3rem;
}

.card-body {
  margin: -2.5rem 2rem 1rem 2rem;
}

.blog-hashtag {
  font-size: 0.9rem;
  font-weight: 500;
  color: #4d97b2;
}

.blog-title {
  line-height: 1.5rem;
  margin: 1rem 0 0.5rem;
  font-size: 1.2rem;
  font-weight: 600;
}

.blog-description {
  color: #616b74;
  font-size: 0.9rem;
}

.card-profile {
  display: flex;
  margin-top: 2rem;
  align-items: center;
}

.profile-img {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 50%;
}

.card-profile-info {
  margin-left: 1rem;
}

.profile-name {
  font-size: 1rem;
}

.profile-followers {
  color: #616b74;
  font-size: 0.9rem;
}

.feature-content {
  width: 20px;
}

.album-date {
  float: right;
  color: #616b74;
  font-size: 0.9rem;
}

.album-div {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.header {
  display: flex;
  flex-direction: row-reverse;
}

.profile-div {
  background-color: #ffffff;
  padding: 3rem;
  margin-top: 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0.5rem;
}

.profile-pic {
  width: 25vh;
  height: 25vh;
  overflow: hidden;
  background: white;
  position: relative;
  border-radius: 50%;
  object-fit: cover;
}

.profile-details {
  width: 100vh;
  overflow: hidden;
  border-radius: 0.5rem;
  position: relative;
  margin: 1rem;
  padding: 0rem 0.5rem;
}

.contact-details {
  width: 50vh;
  overflow: hidden;
  border-radius: 0.5rem;
  position: relative;
  margin: 1rem;
}

.profile-pic img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.name {
  font-size: 36px;
  font-weight: bold;
  margin-right: 20px;
}

.contact-title {
  font-weight: 600;
  font-size: 0.9rem;
}

.text-pink {
  color: #f06179;
}

.c-detail {
  font-size: 0.9rem;
}

.text-grey {
  color: #616b74;
}

.profile-title {
  font-weight: 700;
}

.profile-bio {
  font-weight: 600;
  font-size: 0.9rem;
}

.profile-bio-desc {
  font-weight: 600;
  font-size: 0.9rem;
}
</style>

<script>
import axios from 'axios'
export default {
  name: 'ProfilePage',
  inject: ['axios'],
  albumData: [],
  user: {},
  created() {
    this.getprofile();
    this.getUser();
  },
  methods: {
    getUser() {
      this.user = JSON.parse(window.localStorage.getItem('userData'));
    },
    async getprofile() {
      // Call the logout API endpoint
      const res = await this.axios.get('http://localhost:8000/api/auth/getalbums?user=1')
      if (res) {
        this.albumData = res.data
        console.log(this.albumData);
      }
    },
    logout() {
      // Call the logout API endpoint
      this.axios.post('http://localhost:8000/api/auth/logout')
        .then(() => {
          // If the API call is successful, log the user out locally
          window.localStorage.clear();
          // Navigate to the login page or home page
          this.$router.push('/login');
        })
        .catch(error => {
          console.error(error);
        });
    }
  },
}
</script>