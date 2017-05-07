[33mcommit 4ebc48ad423ae59f38bf32795d4d7c0757f71fdd[m
Author: NowNewStart <j.gelmar@hotmail.de>
Date:   Sun May 7 18:59:55 2017 +0200

    fix some issues

[1mdiff --git a/.gitignore b/.gitignore[m
[1mindex 2a41229..aaddf61 100644[m
[1m--- a/.gitignore[m
[1m+++ b/.gitignore[m
[36m@@ -9,3 +9,5 @@[m [mHomestead.json[m
 Homestead.yaml[m
 npm-debug.log[m
 .env[m
[32m+[m[32m.floo[m
[32m+[m[32m.flooignore[m
\ No newline at end of file[m
[1mdiff --git a/app/Models/Nade.php b/app/Models/Nade.php[m
[1mindex ae43083..9977b64 100644[m
[1m--- a/app/Models/Nade.php[m
[1m+++ b/app/Models/Nade.php[m
[36m@@ -5,6 +5,7 @@[m [mnamespace App\Models;[m
 use Illuminate\Database\Eloquent\Model;[m
 use App\User;[m
 use Carbon\Carbon;[m
[32m+[m[32muse Auth;[m
 [m
 class Nade extends BaseModel[m
 {[m
[1mdiff --git a/app/Providers/AppServiceProvider.php b/app/Providers/AppServiceProvider.php[m
[1mindex 1b72094..a62f3fc 100644[m
[1m--- a/app/Providers/AppServiceProvider.php[m
[1m+++ b/app/Providers/AppServiceProvider.php[m
[36m@@ -18,11 +18,11 @@[m [mclass AppServiceProvider extends ServiceProvider[m
     public function boot()[m
     {[m
         Schema::defaultStringLength(191);[m
[31m-        View::composer(array('layouts.main', 'nades.nade-form'), function ($view) {[m
[31m-            $viewData = array([m
[32m+[m[32m        View::composer(['layouts.main', 'nades.nade-form'], function ($view) {[m
[32m+[m[32m            $viewData = [[m
             'maps' => Map::all()->sortBy('name'),[m
[31m-            'user' => Auth::user(),[m
[31m-        );[m
[32m+[m[32m            'user' => Auth::user()[m
[32m+[m[32m            ];[m
             $view->with($viewData);[m
         });[m
     }[m
[1mdiff --git a/resources/views/home/home.blade.php b/resources/views/home/home.blade.php[m
[1mindex c2c3b53..b07b8e4 100644[m
[1m--- a/resources/views/home/home.blade.php[m
[1m+++ b/resources/views/home/home.blade.php[m
[36m@@ -65,7 +65,7 @@[m
                     @foreach($nades as $nade)[m
                     <li>[m
                         <a href="#">[m
[31m-                            <i class="{{ Nade::getNadeIcon($nade->type) }}" title="{{ Nade::getNadeTypeLabel($nade->type) }}"></i>[m
[32m+[m[32m                            <i class="{{ \App\Models\Nade::getNadeIcon($nade->type) }}" title="{{ App\Models\Nade::getNadeTypeLabel($nade->type) }}"></i>[m
                             {{{ $nade->title }}}[m
                             <span>{{{ $nade->map->name }}}</span>[m
                         </a>[m
