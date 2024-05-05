<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Moox\Expiry\Widgets\MyExpiry;
use Moox\Press\Services\Login;
use Moox\Press\Services\RequestPasswordReset;
use Moox\Press\Services\ResetPassword;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->passwordReset(RequestPasswordReset::class, ResetPassword::class)
            ->login(Login::class)
            ->colors([
                'primary' => Color::hex('#005D9D'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                MyExpiry::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([

                // Moox Press
                \Moox\Press\WpPostPlugin::make(),
                \Moox\Press\WpPagePlugin::make(),
                \Moox\Press\WpMediaPlugin::make(),
                \Moox\Press\WpCategoryPlugin::make(),
                \Moox\Press\WpTagPlugin::make(),
                \Moox\Press\WpCommentPlugin::make(),

                // Moox Press Custom
                \Moox\Press\WpWikiPlugin::make(),
                \Moox\Press\WpThemaPlugin::make(),

                // Moox Press Admin
                \Moox\Press\WpUserPlugin::make(),
                \Moox\Press\WpOptionPlugin::make(),

                // Moox Press Meta (optional)
                \Moox\Press\WpPostMetaPlugin::make(),
                \Moox\Press\WpCommentMetaPlugin::make(),
                \Moox\Press\WpUserMetaPlugin::make(),
                \Moox\Press\WpTermMetaPlugin::make(),
                \Moox\Press\WpTermRelationshipPlugin::make(),
                \Moox\Press\WpTermPlugin::make(),
                \Moox\Press\WpTermTaxonomyPlugin::make(),

                // Moox Expiry
                \Moox\Expiry\ExpiryPlugin::make(),

                // Moox Jobs
                \Moox\Jobs\JobsPlugin::make(),
                \Moox\Jobs\JobsWaitingPlugin::make(),
                \Moox\Jobs\JobsFailedPlugin::make(),
                \Moox\Jobs\JobsBatchesPlugin::make(),

                // Moox User
                \Moox\UserDevice\UserDevicePlugin::make(),
                \Moox\UserSession\UserSessionPlugin::make(),
                \Moox\LoginLink\LoginLinkPlugin::make(),

            ]);
    }
}
