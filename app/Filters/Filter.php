<?php

namespace App\Filters;

use Closure;
use Illuminate\Support\Str;

<<<<<<< HEAD
abstract class Filter {

    public function handle($request , Closure $next) {
        if (!request()->has($this->filtername()))
            return $next($request);
=======
abstract class Filter{
    public function handle($request , Closure $next)
    {
        if(! request()->has($this->filtername()))
        return $next($request);

>>>>>>> refs/remotes/origin/main
        return $this->filter($next($request));

    }

    public abstract function filter($builder);

    public function filtername()
    {
        return Str::lower(class_basename($this));
    }

}
<<<<<<< HEAD


?>
=======
>>>>>>> refs/remotes/origin/main
