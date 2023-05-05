<template>
    <div class="free-trial-popup d-flex justify-content-center align-items-center">
        <div class="trial-popup-section bg-white d-flex flex-column">
            <div class="text-center">
                <img src="@/assets/cg-logo.png" class="img-fluid trial-img">
            </div>

            <h3 class="trial-popup-heading font-weight-bold text-center">Login to your account</h3>

            <p class="trial-text">Don't have an Account? <router-link to="/register">Create an Account</router-link></p>

            <p v-show="error" class="text-sm text-red-500">{{ errorMsg }}</p>
            <form class="signup-form" @submit="login">
                <div class="form-group">
                    <label class="signup-form-labels" for="email">Email</label>
                    <input id="email" v-model="email" class="form-control signup-form-input" type="email" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="password" class="signup-form-labels">Password</label>
                    <input id="password" v-model="password" class="form-control signup-form-input" type="text"
                        placeholder="" />
                </div>
                <p class="alredy-have-account">
                    <router-link to="/forgotPassword">Forgot Password ?</router-link>
                </p>
                <div class="text-center">
                    <button class="trial-btn" type="submit">Login</button>
                </div>
            </form>

        </div>
    </div>
</template>
<script>

export default {
    name: 'LoginPage',
    inject: ['axios'],
    data() {
        return {
            email: '',
            password: '',
            error: false,
            errorMsg: `An error occurred, please try again`
        }
    },
    methods: {
        async login(e) {
            e.preventDefault()
            try {
                const res = await this.axios.post(`http://127.0.0.1:8000/api/auth/login`, {
                    email: this.email,
                    password: this.password
                });
                console.log(res);

                const { access_token, userData } = res.data
                window.localStorage.setItem('access_token', access_token)
                window.localStorage.setItem('userData', JSON.stringify(userData))
                this.$router.push('/profile')
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
#app {
    margin: 0 auto;
}

.trial-btn {
    background-color: #ff6c61;
    color: #ffffff;
    border: none;
    border-radius: 3px;
    padding: 10px 8%;
    margin-top: 20px;
}

.trial-img {
    margin-top: 20px;
    width: 50px;
    height: 50px;
}
</style>