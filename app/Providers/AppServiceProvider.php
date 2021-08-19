<?php

namespace App\Providers;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Collection::macro('flattenTree', function ($childrenField = 'relations')
        {
            $toProcess = $this->items;
            $processed = [];
            while($item = array_shift($toProcess))
            {
                $processed[] = $item;
                if (count((array)$item->$childrenField) > 0) {
                    $children = array_reverse($item->$childrenField->items);
                    foreach ($children as $child) {
                        array_unshift($toProcess,$child);
                    }
                }
            }
            return Collection::make($processed);
        });
    

    }
}
