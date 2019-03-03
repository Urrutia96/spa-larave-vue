<template>
    <div class="light-grey">
        <v-toolbar>
            <v-toolbar-title>Santos96</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat :to="{ name: 'welcome' }" exact>Link One</v-btn>
                <v-btn flat :to="{ name: 'blog' }">Link Two</v-btn>
                <v-btn flat >Link Three</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <router-view />
        <v-footer>
            <v-spacer></v-spacer>
            <div>Santos </div>
            <div>&copy; {{ new Date().getFullYear() }}</div>
        </v-footer>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
