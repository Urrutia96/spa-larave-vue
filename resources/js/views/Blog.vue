<template>
    <v-container grid-list-lg>
        <v-layout row wrap>
            <v-flex xs10 offset-xs1 v-for="articulo in data" v-bind:key="articulo.id"> 
                <v-card mb-3>
                    <v-card-title>
                        <div>
                            <h4 class="headline">{{ articulo.titulo }}</h4>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <div> {{ articulo.descripcion }} </div>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn flat :to="{ name : 'articulo', params:{slug:articulo.slug} }">Leer articúlo</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
        <v-btn :to="{ name: 'blog', query: { page: prebPage } }" :disabled="prebPage==null" @click="pagge=prebPage">Previous</v-btn>
        <v-btn :to="{ name: 'blog', query: { page: nextPage } }" :disabled="nextPage==null" @click="pagge=nextPage">Next</v-btn>
    </v-container>
</template>

<script>
export default {
    data: function(){
        return {
            slug: "hola-mundo",
            data: [],
            nextPage:null,
            prebPage:null,
            pagge:1
        }
    },
    mounted: function(){
        if(this.$route.query.page){
            this.pagge = this.$route.query.page;
        }
        this.fetch();
    },
    watch:{
        pagge: function(val){
            this.fetch();
        }
    },
    methods: {
        fetch (){
            var f = this;
            var url ='/api/blog';
            var urlParams = new URLSearchParams(window.location.search);
            if(this.pagge!=null){
                url += '?page='+ this.pagge;
            }
            axios.get(url).then(function (response){
                f.data = response.data.data;
                if(response.data.next_page_url != null){
                    var next = new URLSearchParams(response.data.next_page_url.split('?')[1]);
                    f.nextPage = next.get('page');
                }else{
                    f.nextPage = null;
                }
                if(response.data.prev_page_url != null){
                    var prev =  new URLSearchParams(response.data.prev_page_url.split('?')[1]);
                    f.prebPage = prev.get('page');
                }else{
                    f.prebPage = null;
                }
            });
        },
    }
}
</script>

