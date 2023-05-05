<template>
    <router-view />
</template>

<style >
@media only screen and (min-width: 320px) and (max-width: 991.98px) {
    .trial-popup-heading {
        width: 100%;
        font-size: 1.2rem;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .trial-text {
        width: 90%;
        font-size: 0.9rem;
        color: rgba(0, 0, 0, 0.8);
    }
}

@media (min-width: 576px) {
    .trial-popup-section {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (min-width: 768px) {
    .trial-popup-section {
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%;
    }
}

@media only screen and (min-width: 992px) {
    .trial-popup-heading {
        font-size: 1.2rem;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .trial-text {
        font-size: 0.9rem;
        color: rgba(0, 0, 0, 0.8);
    }
}

.signup-bg {
    background-color: rgba(31, 29, 68, 0.95);
    min-height: 100vh;
    width: 100%;
    font-family: "Oswald", sans-serif !important;
}

.free-trial-popup {
    min-height: 100vh;
    width: 70vh;
    text-align: left;
}

.trial-popup-section {
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%;
}

.trial-popup-section {
    padding-top: 20px;
    padding-bottom: 50px;
    border-radius: 10px;
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