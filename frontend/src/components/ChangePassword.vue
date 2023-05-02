<template>
    <div class="free-trial-popup d-flex justify-content-center align-items-center">
        <div class="trial-popup-section bg-white d-flex flex-column justify-content-center align-items-center ">
            <img src="@/assets/cg-logo.png" class="img-fluid trial-img">

            <h3 class="trial-popup-heading font-weight-bold text-center">Change Password</h3>

            <p class="trial-text">Use the Reset Code sent to your inbox</p>

            <p v-show="error" class="text-sm text-red-500">{{ errorMsg }}</p>
            <form class="signup-form" @submit="cangePassword">
                <div class="form-group">
                    <label class="signup-form-labels" for="resetcode">Email</label>
                    <input id="resetcode" v-model="resetcode" class="form-control signup-form-input" type="text"
                        placeholder="" />
                </div>
                <div class="form-group password-field-group">
                    <label for="password" class="signup-form-labels">Password</label>
                    <input id="password" v-model="password" class="form-control signup-form-input"
                        :type="showPassword ? 'text' : 'password'" placeholder="" />
                    <!-- <img :src="showPassword ? '@/assets/eyehide.png' : '@/assets/eyeshow.png'" @click="toggleShowPassword" /> -->
                    <img src="@/assets/eyehide.png" @click="toggleShowPassword" />
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="signup-form-labels">Confirm Password</label>
                    <input id="confirmPassword" v-model="confirmPassword" class="form-control signup-form-input"
                        type="password" placeholder="" />
                    <div v-if="password !== confirmPassword">
                        Passwords do not match
                    </div>
                </div>
                <div class="text-center">
                    <button class="trial-btn" type="submit">Change Password</button>
                </div>
            </form>

        </div>
    </div>
</template>
<script>

export default {
    name: 'ChangePassword',
    inject: ['axios'],
    data() {
        return {
            resetcode: '',
            password: '',
            error: false,
            showPassword: false,
            errorMsg: `An error occurred, please try again`
        }
    },
    methods: {
        toggleShowPassword(e) {
            e.preventDefault()
            this.showPassword = !this.showPassword;
        },
        toggleShowConfirmPassword(e) {
            e.preventDefault()
            this.showConfirmPassword = !this.showConfirmPassword;
        },
        async cangePassword(e) {
            e.preventDefault()
            try {
                const res = await this.axios.post(`http://127.0.0.1:8000/api/auth/login`, {
                    resetcode: this.resetcode,
                    password: this.password
                });
                console.log(res);

                const { access_token, user } = res.data

                this.$router.push('/')
            } catch (error) {
                console.log(error.response)
                if (error.response.status === 401) {
                    this.errorMsg = "Invalid Credentials"
                }
                this.error = true
                this.resetcode = ''
                this.password = ''
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

.password-field-group {
    position: relative;
}

.password-field-group img {
    position: absolute;
    top: 69%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    width: 18px;
    height: auto;
}
</style>