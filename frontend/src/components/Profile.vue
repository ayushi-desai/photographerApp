<template>
  <div class="wrapper">
    <div class="profile-div">
      <div class="profile-pic">
        <img src="@/assets/profile.jpeg" alt="Profile picture">
      </div>
      <div class="profile-details">
        <h1 class="profile-title text-grey">Nandhaka Pieris</h1>
        <p class="profile-bio text-grey">Bio</p>
        <h2 class="profile-bio-desc text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
          tempor
          incididunt
          ut labore et dolore magna aliqua.</h2>
      </div>
      <div class="contact-details">
        <p class="text-grey contact-title">Phone</p>
        <p class="text-pink c-detail">123-456-7890</p>
        <p class="text-grey contact-title">Email</p>
        <p class="text-pink c-detail">john.doe@example.com</p>
      </div>
    </div>
    <div class="album-div">
      <div class="card">
        <div class="card-banner">
          <img class="banner-img" src='https://dev-to-uploads.s3.amazonaws.com/uploads/articles/xna5h3bfbgmyrb6py1o7.jpg'
            alt=''>
        </div>
        <div>
          <p class="category-tag">Nandhaka Pieris</p>
        </div>
        <div class="card-body">
          <h2 class="blog-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.</h2>
          <div class="album-details">
            <img class="feature-content" src="@/assets/fillheart.png" />
            <p class="album-date">2023/09/23</p>
          </div>
          <!-- <p class="blog-description">My thoughts on the future of front end web development</p>

          <div class="card-profile">
            <img class="profile-img"
              src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpYJQKSoM7S75P_KMRtQHqAAIPh133CSxByw&usqp=CAU'
              alt=''>
            <div class="card-profile-info">
              <h3 class="profile-name">Eleanor Pea</h3>
              <p class="profile-followers">5.2k followers</p>
            </div>
          </div> -->
        </div>
      </div>
      <div class="card">
        <div class="card-banner">
          <img class="banner-img" src='https://dev-to-uploads.s3.amazonaws.com/uploads/articles/xna5h3bfbgmyrb6py1o7.jpg'
            alt=''>
        </div>
        <div>
          <p class="category-tag">Nandhaka Pieris</p>
        </div>
        <div class="card-body">
          <h2 class="blog-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.</h2>
          <div class="album-details">
            <img class="feature-content" src="@/assets/fillheart.png" />
            <p class="album-date">2023/09/23</p>
          </div>
          <!-- <p class="blog-description">My thoughts on the future of front end web development</p>

          <div class="card-profile">
            <img class="profile-img"
              src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpYJQKSoM7S75P_KMRtQHqAAIPh133CSxByw&usqp=CAU'
              alt=''>
            <div class="card-profile-info">
              <h3 class="profile-name">Eleanor Pea</h3>
              <p class="profile-followers">5.2k followers</p>
            </div>
          </div> -->
        </div>
      </div>
      <div class="card">
        <div class="card-banner">
          <img class="banner-img" src='https://dev-to-uploads.s3.amazonaws.com/uploads/articles/xna5h3bfbgmyrb6py1o7.jpg'
            alt=''>
        </div>
        <div>
          <p class="category-tag">Nandhaka Pieris</p>
        </div>
        <div class="card-body">
          <h2 class="blog-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.</h2>
          <div class="album-details">
            <img class="feature-content" src="@/assets/fillheart.png" />
            <p class="album-date">2023/09/23</p>
          </div>
          <!-- <p class="blog-description">My thoughts on the future of front end web development</p>

          <div class="card-profile">
            <img class="profile-img"
              src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpYJQKSoM7S75P_KMRtQHqAAIPh133CSxByw&usqp=CAU'
              alt=''>
            <div class="card-profile-info">
              <h3 class="profile-name">Eleanor Pea</h3>
              <p class="profile-followers">5.2k followers</p>
            </div>
          </div> -->
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
  overflow: hidden;
  background: white;
  border-radius: 0.5rem;
  position: relative;
  width: 55vh;
  margin: 1rem;
  transition: 250ms all ease-in-out;
  cursor: pointer;
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
  align-items: center;
  justify-content: center;
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