<?php

use Illuminate\Database\Seeder;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulo')->insert([
            'titulo' => 'SPA con Laravel y Vue',
            'descripcion' => 'Este proyecto es una SPA hecha con Laravel 5.7 y Vue+vue-router, en el que laravel lo he utilizado como proyecto base en el que tenemos una API a la que se conecta Vue por medio de AxiosJs.',
            'slug'=> 'spa-con-laravel-y-vue',
            'cuerpo' => 
"Este proyecto es una SPA hecha con Laravel 5.7 y Vue+vue-router, en el que laravel lo he utilizado como proyecto base en el que tenemos una API a la que se conecta Vue por medio de AxiosJs.

En el archivo we\b.php de laravel he creado una única ruta ya que de lo demas se ocupará vue-router.

```php
Route::get('/{any}', function () {
		return view('welcome');
})->where('any', '.*');
```

Una vez hecho eso, estamos dejando preparado todo para vue-router, creamos un archivo que contendra nuestras rutas.

```js
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
		mode: 'history',
		routes: [
				{
						path: '/',
						name: 'welcome',
						component: Welcome
				},
				{
						path: '/blog',
						name: 'blog',
						component: Blog,
						props: (route) => ({ query: route.query.page })
				},
				{
						path: '/blog/:slug',
						name: 'articulo',
						component: Articulo,
						props: true
				},
				{
						path: '/publicar',
						name: 'publicar',
						component: Publicar
				}
		]
})
```
Con esto estamos haciendo que vue-router cargue un componente distinto por cada ruta que se use.

Lo dejaré por aca, espero que sea un poco de ayuda 

Saludos a todos.
            ",
        ]);
    }
}
