<template>
    <v-container grid-list-lg>
        <v-layout row wrap>
            <v-flex xs10 offset-xs1>
                <v-card mb-3>
                    <v-card-title>
                        <div>
                            <h4 class="headline">{{ articulo.titulo }}</h4>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <div v-html="com" v-highlight> </div>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn flat >Compartir Articulo</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>

    import hljs from 'highlight.js';
    
    import marked from 'marked';
    window.hljs = hljs;
export default {
    components:{
        marked
    },
    data:function(){
        return {
            articulo:[],
            titulo:"",
            com:""
        }
    },
    props:['slug'],
    created: function(){
        this.fetch(this.slug);
        
    },
    destroyed:function(){
        document.title = "Santos96"
    },
    methods:{
        fetch:function(slug){
            var f =this;
            axios.get('/api/blog/'+slug).then(function(response){
                f.articulo = response.data;
                f.titulo = response.data.titulo;
                document.title = response.data.titulo + " | Santos96";
                f.compiled();
            });
            
            hljs.initHighlightingOnLoad();
        },
        compiled:function(){
            this.com = marked(this.articulo.cuerpo,{sanitize: true});
        }
    }
}

</script>
<style>
@import '~highlight.js/styles/atom-one-dark.css';
</style>


