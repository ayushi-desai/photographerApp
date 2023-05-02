<template>
    <div class="free-trial-popup d-flex justify-content-center align-items-center">
        <div class="trial-popup-section bg-white d-flex flex-column">
            <div class="text-center">
                <img src="@/assets/cg-logo.png" class="img-fluid trial-img">
            </div>
            <h3 class="trial-popup-heading font-weight-bold text-center">Register an account</h3>

            <p class="trial-text text-center">Have an Account? <router-link to="/login">Login</router-link></p>

            <p v-show="error" class="text-sm text-red-500">{{ errorMsg }}</p>
            <form class="signup-form" @submit="register">
                <div class="flex-container">
                    <div class="flex-child">
                        <div class="form-group">
                            <label for="name" class="signup-form-labels">Name</label>
                            <input id="name" v-model="name" class="form-control signup-form-input" type="text"
                                placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="phone" class="signup-form-labels">Phone Number</label>
                            <input id="phone" v-model="phone" class="form-control signup-form-input" type="text"
                                placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="password" class="signup-form-labels">Password</label>
                            <input id="password" v-model="password" class="form-control signup-form-input" type="password"
                                placeholder="" />
                        </div>
                    </div>

                    <div class="flex-child">
                        <div class="form-group">
                            <label class="signup-form-labels" for="email">Email</label>
                            <input id="email" v-model="email" class="form-control signup-form-input" type="email"
                                placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="bio" class="signup-form-labels">Bio</label>
                            <input id="bio" v-model="bio" class="form-control signup-form-input" type="text"
                                placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword" class="signup-form-labels">Confirm Password</label>
                            <input id="confirmPassword" v-model="confirmPassword" class="form-control signup-form-input"
                                type="password" placeholder="" />
                            <div v-if="password !== confirmPassword">
                                Passwords do not match
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="trial-btn" type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>
</template>
<script>

export default {
    name: 'RegisterPage',
    inject: ['axios'],
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            bio: '',
            password: '',
            confirmPassword: '',
            error: false,
            errorMsg: `An error occurred, please try again`
        }
    },
    methods: {
        async register(e) {
            e.preventDefault()
            try {
                const res = await this.axios.post(`http://127.0.0.1:8000/api/auth/register`, {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    bio: this.bio,
                    password: this.password
                });
                const { jwt, user } = res.data
                window.localStorage.setItem('jwt', jwt)
                window.localStorage.setItem('userData', JSON.stringify(user))
                // const res2 = await this.axios.get(`http://127.0.0.1:8000/api/auth/login`, {
                //     headers: {
                //         Authorization: `Bearer ${jwt}`,
                //     }
                // })
                this.$router.push('/')
            } catch (error) {
                console.log(error.response)
                if (error.response.status === 401) {
                    this.errorMsg = "Invalid Credentials"
                }
                this.error = true
                this.password = ''
            }
        },
    }
}
</script>

<style>
.trial-img {
    margin-top: 20px;
    width: 50px;
    height: 50px;
}

.flex-container {
    display: flex;
}

.flex-child {
    flex: 1;
}

.flex-child:first-child {
    margin-right: 20px;
}

.trial-btn {
    background-color: #ff6c61;
    color: #ffffff;
    border: none;
    border-radius: 3px;
    padding: 10px 8%;
    margin-top: 20px;
}
</style>