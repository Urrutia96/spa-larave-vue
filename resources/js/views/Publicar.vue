<template>
    <v-container grid-list-lg>
        <v-layout row wrap>
            <v-flex xs10 offset-xs1>
                <v-card mb-3>
                    <v-form ref="form" @submit.prevent="fetch">
                    <v-card-title>
                        <div>
                            <h4 class="headline">Publicar</h4>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <v-flex>
                            <v-text-field
                                label="Título"
                                placeholder="Título del articulo"
                                box 
                                v-model="titulo"
                            ></v-text-field>
                        </v-flex>
                        <v-flex>
                            <v-textarea
                            box
                            name="input-7-4"
                            label="Descripcion del articulo"
                            placeholder="Descripcion que se mostrara en /blog"
                            v-model="descripcion"
                            ></v-textarea>
                        </v-flex>
                        <v-flex >
                            <markdown-editor v-model="cuerpo" ref="markdownEditor" :highlight="true"></markdown-editor>
                        </v-flex>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn flat type="submit">Publicar</v-btn>
                    </v-card-actions>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import markdownEditor from 'vue-simplemde/src/markdown-editor'
import hljs from 'highlight.js';
import marked from 'marked';
 
  window.hljs = hljs;
export default {
    components: {
      markdownEditor,
      marked
    },
    data:function(){
        return {
            titulo: "",
            descripcion:"",
            cuerpo: ""
        }
    },
    methods:{
        fetch:function(slug){
            var f =this;
            axios.post('/api/blog/create', {
                titulo: f.titulo,
                descripcion: f.descripcion,
                cuerpo: f.cuerpo
            }).then(function(response){
                if(response.data) { 
                    f.$swal('Se ha publicado Correctamente');
                    f.titulo= "";
                    f.descripcion= "";
                    f.cuerpo= "";
                }else{
                    f.$swal('Ha ocurrido un error');
                }
            });
        }
    }
}
hljs.initHighlightingOnLoad();
</script>

<style>
@import '~simplemde/dist/simplemde.min.css';
@import '~highlight.js/styles/atom-one-dark.css';
</style>

