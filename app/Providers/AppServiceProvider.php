<?php

declare(strict_types=1);

namespace App\Providers;

use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::automaticallyEagerLoadRelationships();

        Table::configureUsing(
            fn (Table $table): Table => $table
                ->defaultDateDisplayFormat('F j, Y')
                ->defaultTimeDisplayFormat('g:i A')
                ->defaultDateTimeDisplayFormat('F j, Y, g:i A')
                ->deferFilters(false)
                ->deferColumnManager(false)
        );

        Schema::configureUsing(
            fn (Schema $schema): Schema => $schema
                ->defaultDateDisplayFormat('F j, Y')
                ->defaultTimeDisplayFormat('h:i A')
                ->defaultDateTimeDisplayFormat('F j, Y, h:i A')
        );
    }
}
