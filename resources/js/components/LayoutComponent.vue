<template>
    <div class="light-grey">
        <v-toolbar>
            <v-toolbar-title>Santos96</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat :to="{ name: 'welcome' }" exact>Inicio</v-btn>
                <v-btn flat :to="{ name: 'blog' }">Blog</v-btn>
                <v-btn flat :to="{ name: 'publicar' }">Publicar</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <router-view />
        <v-footer>
            <v-spacer></v-spacer>
            <div><a href="https://github.com/Urrutia96">Santos Urrutia</a></div>
            <div>&copy; {{ new Date().getFullYear() }}</div>
        </v-footer>
    </div>
</template>

