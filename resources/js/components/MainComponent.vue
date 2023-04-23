<template>
    <div class="App">
        <header class="App-header">
            <nav class="navigation">
                <router-link to="/spa/home"> All Countries </router-link>
                <!-- <router-link to="/spa/detail"> Detail </router-link> -->
                <router-link to="/spa/new-country"> New Country </router-link>
            </nav>
        </header>
        <div class="App-content">
            <router-view />
        </div>
    </div>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.min.css';

    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
