<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
        Category::truncate();
    	Tag::truncate();

        $category = new Category;
        $category->name = "Desarrollo web backend";
        $category->save();

        $category = new Category;
        $category->name = "Desarrollo Web Frontend";
        $category->save();

        $category = new Category;
        $category->name = "Frameworks";
        $category->save();

        $category = new Category;
        $category->name = "Editores web";
        $category->save();

        $post = new Post;
        $post->title = "Vue.js";
        $post->url = str_slug($post->title);
        $post->excerpt = "Framework progresivo de Javascript para crear interfaces de forma sencilla y escalable para desarrollar aplicaciones web con diferentes grados de complejidad.";
        $post->body = "Este Framework basa su núcleo principal en la capa de vista con el patrón model-view-controller (Modelo vista controlador) permitiendo relacionar la capa de presentación con la capa lógica del proyecto de forma fácil y eficiente. Adicionalmente, Vue JS permite ser integrado en proyectos ya existentes y no es restrictivo a diferencia de algunos de los Frameworks más populares, los cuales están optimizados para implementarse desde cero, y usualmente son difícil de aplicar en proyectos que ya se encuentran desarrollados en otras tecnologías.";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 2;
        $post->user_id = 3;
        $post->save();
        
        $post->tags()->attach(Tag::create(['name' => 'JavaScript']));
        $post->tags()->attach(Tag::create(['name' => 'Frontend']));

		$post = new Post;
        $post->title = "Angular";
        $post->url = str_slug($post->title);
        $post->excerpt = "Angular es un framework JavaScript, gratuito y Open Source, creado por Google y destinado a facilitar la creación de aplicaciones web modernas de tipo SPA (Single Page Application). ... En septiembre de 2016 Google lanzó la versión definitiva de lo que llamó en su momento Angular 2, y que ahora es simplemente Angular";
        $post->body = "Angular es un framework de desarrollo para JavaScript creado por Google. La finalidad de Angular es facilitarnos el desarrollo de aplicaciones web SPA y además darnos herramientas para trabajar con los elementos de una web de una manera más sencilla y optima. Otro propósito que tiene Angular es la separación completa entre el front-end y el back-end en una aplicación web.";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'JavaScript']));
        $post->tags()->attach(Tag::create(['name' => 'Frontend']));

        $post = new Post;
        $post->title = "Visual Code";
        $post->url = str_slug($post->title);
        $post->excerpt = "Visual Studio Code es un editor de código fuente. Es compatible con varios lenguajes de programación y un conjunto de características que pueden o no estar disponibles para un idioma dado, como se muestra en la siguiente tabla.";
        $post->body = "Visual Studio Code es un editor de código fuente. Es compatible con varios lenguajes de programación y un conjunto de características que pueden o no estar disponibles para un idioma dado, como se muestra en la siguiente tabla. Muchas de las características de Visual Studio Code no están expuestas a través de los menús o la interfaz de usuario. Más bien, se accede a través de la paleta de comandos o a través de archivos .json (por ejemplo, preferencias del usuario). La paleta de comandos es una interfaz de línea de comandos. Sin embargo, desaparece si el usuario hace clic fuera de él o presiona una combinación de teclas en el teclado para interactuar con algo que está fuera de él. Esto también se aplica a los comandos que requieren mucho tiempo. Cuando esto sucede, el comando en progreso se cancela.";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 4;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'editores de texto']));

        $post = new Post;
        $post->title = "Sublime Text 3";
        $post->url = str_slug($post->title);
        $post->excerpt = "Sublime Text es un editor de código multiplataforma, ligero y con pocas concesiones a las florituras. Es una herramienta concebida para programar sin distracciones. Su interfaz de color oscuro y la riqueza de coloreado de la sintaxis, centra nuestra atención completamente.";
        $post->body = "Sublime Text permite tener varios documentos abiertos mediante pestañas, e incluso emplear varios paneles para aquellos que utilicen más de un monitor. Dispone de modo de pantalla completa, para aprovechar al máximo el espacio visual disponible de la pantalla. El programa cuenta “de serie” con 22 combinaciones de color posibles, aunque se pueden conseguir más. Para navegar por el código cuenta con Minimap, un panel que permite moverse por el código de forma rápida.";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'editores de texto']));

        $post = new Post;
        $post->title = "Laravel.";
        $post->url = str_slug($post->title);
        $post->excerpt = "Laravel es uno de los frameworks de código abierto más fáciles de asimilar para PHP. Es simple, muy potente y tiene una interfaz elegante y divertida de usar. Fue creado en 2011 y tiene una gran influencia de frameworks como Ruby on Rails, Sinatra y ASP.NET MVC.";
        $post->body = "El objetivo de Laravel es el de ser un framework que permita el uso de una sintaxis refinada y expresiva para crear código de forma sencilla, evitando el «código espagueti» y permitiendo multitud de funcionalidades. Aprovecha todo lo bueno de otros frameworks y utiliza las características de las últimas versiones de PHP. La mayor parte de su estructura está formada por dependencias, especialmente de Symfony, lo que implica que el desarrollo de Laravel dependa también del desarrollo de sus dependencias.";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'php']));

        $post = new Post;
        $post->title = "PHP.";
        $post->url = str_slug($post->title);
        $post->excerpt = "PHP son las siglas en inglés de “Hypertext Pre-Processor” que al traducirlo al español pierde un poco el sentido, mejor lo analizamos y encontramos que significa “Lenguaje de Programación Interpretado”. Este lenguaje es al que le debemos la visualización de contenido dinámico en las páginas web.";
        $post->body = "PHP son las siglas en inglés de “Hypertext Pre-Processor” que al traducirlo al español pierde un poco el sentido, mejor lo analizamos y encontramos que significa “Lenguaje de Programación Interpretado”. Este lenguaje es al que le debemos la visualización de contenido dinámico en las páginas web. Todo el código PHP es invisible para el usuario, porque todas las interacciones que se desarrollan en este lenguaje son por completo transformadas para que se puedan ver imágenes, variedad de multimedia y los formatos con los que somos capaces de interactuar añadiendo o descargando información de ellos";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'php']));

        $post = new Post;
        $post->title = "Django.";
        $post->url = str_slug($post->title);
        $post->excerpt = "Django es un framework de desarrollo web de código abierto, escrito en Python, que respeta el patrón de diseño conocido como MVC (Modelo–Vista–Controlador). ... Python es usado en todas las partes del framework, incluso en configuraciones, archivos, y en los modelos de datos.";
        $post->body = "Django es un framework de aplicaciones web gratuito y de código abierto (open source) escrito en Python. Un framework web es un conjunto de componentes que te ayudan a desarrollar sitios web más fácil y rápidamente. Cuando construyes un sitio web, siempre necesitas un conjunto de componentes similares: una manera de manejar la autenticación de usuarios (registrarse, iniciar sesión, cerrar sesión), un panel de administración para tu sitio web, formularios, una forma de subir archivos, etc.";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 3;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'phyton']));

    }
}
