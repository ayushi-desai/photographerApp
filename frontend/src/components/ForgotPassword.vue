<template>
    <div class="free-trial-popup d-flex justify-content-center align-items-center">
        <div class="trial-popup-section bg-white d-flex flex-column">
            <div class="text-center">
                <img src="@/assets/cg-logo.png" class="img-fluid trial-img">
            </div>
            <h3 class="trial-popup-heading font-weight-bold text-center">Password Reset Request</h3>

            <p class="trial-text text-center">Have an? <router-link to="/login">Login</router-link></p>

            <p v-show="error" class="text-sm text-red-500">{{ errorMsg }}</p>
            <form class="signup-form" @submit="forgotPassword">
                <div class="form-group">
                    <label class="signup-form-labels" for="email">Email</label>
                    <input id="email" v-model="email" class="form-control signup-form-input" type="email" placeholder="" />
                </div>

                <div class="text-center">
                    <button class="trial-btn" type="submit">Submit Reset Request</button>
                </div>
            </form>

        </div>
    </div>
</template>
<script>

export default {
    name: 'ForgotPasswordPage',
    inject: ['axios'],
    data() {
        return {
            email: '',
            error: false,
            errorMsg: `An error occurred, please try again`
        }
    },
    methods: {
        async forgotPassword(e) {
            e.preventDefault()
            try {
                const res = await this.axios.post(`http://127.0.0.1:8000/api/auth/login`, {
                    email: this.email
                });
                const { access_token, user } = res.data
                window.localStorage.setItem('token', access_token)
                window.localStorage.setItem('userData', JSON.stringify(user))
                this.$router.push('/')
            } catch (error) {
                console.log(error.response)
                if (error.response.status === 401) {
                    this.errorMsg = "Invalid Credentials"
                }
                this.error = true
                this.email = ''
            }
        },
    }
}
</script>

<style>
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