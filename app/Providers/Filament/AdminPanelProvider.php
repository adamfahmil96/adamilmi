<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Indigo,
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->brandName('Adam Fahmil - Admin')
            ->favicon(asset('favicon.ico'))
            ->font('Inter')
            ->topNavigation()
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Content')
                    ->icon('heroicon-o-document-text'),
                NavigationGroup::make()
                    ->label('Portfolio')
                    ->icon('heroicon-o-briefcase'),
                NavigationGroup::make()
                    ->label('Settings')
                    ->icon('heroicon-o-cog-6-tooth'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->renderHook(
                PanelsRenderHook::FOOTER,
                fn (): string => <<<'blade'
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.addEventListener("keydown", function(e) {
                                if (e.key !== "Tab") return;

                                var activeEl = document.activeElement;
                                if (!activeEl) return;

                                var tiptap = activeEl.closest(".tiptap");
                                if (!tiptap) return;

                                var selection = window.getSelection();
                                if (!selection.rangeCount) return;

                                var range = selection.getRangeAt(0);
                                var node = range.startContainer;
                                var pre = node.nodeType === 3 ? node.parentNode.closest("pre") : node.closest("pre");

                                if (!pre) return;

                                e.preventDefault();

                                if (e.shiftKey) {
                                    document.execCommand("outdent", false, null);
                                } else {
                                    document.execCommand("insertText", false, "    ");
                                }
                            });
                        });
                    </script>
                blade,
            )
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
            ]);
    }
}
